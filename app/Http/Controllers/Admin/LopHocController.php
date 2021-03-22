<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ClassStudentExport;
use App\LopHoc;
use App\Models\GiangVien;
use App\Repositories\HocVien\HocVienRepositoryInterface;
use App\Repositories\LopHoc\LopHocRepositoryInterface;
use App\Repositories\MonHoc\MonHocRepositoryInterface;
use App\Repositories\QuaTrinhHoc\QuaTrinhHocRepositoryInterface;
use App\Validations\Validation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\ResponseHelper;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LopHocController extends Controller
{
    /**
     * @var LopHocRepositoryInterface
     */
    private $lopHocRepository;
    private $monHocRepository;
    private $hocVienRepository;
    private $quaTrinhHocRepository;

    /**
     * LopHocController constructor.
     * @param LopHocRepositoryInterface $lopHocRepository
     * @param MonHocRepositoryInterface $monHocRepository
     * @param HocVienRepositoryInterface $hocVienRepository
     * @param QuaTrinhHocRepositoryInterface $quaTrinhHocRepository
     */
    public function __construct(
        LopHocRepositoryInterface $lopHocRepository,
        MonHocRepositoryInterface $monHocRepository,
        HocVienRepositoryInterface $hocVienRepository,
        QuaTrinhHocRepositoryInterface $quaTrinhHocRepository
    )
    {
        $this->lopHocRepository = $lopHocRepository;
        $this->monHocRepository = $monHocRepository;
        $this->hocVienRepository = $hocVienRepository;
        $this->quaTrinhHocRepository = $quaTrinhHocRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lopHoc = $this->lopHocRepository->getAll(config('const.paginate'), 'DESC');
        if (!empty($lopHoc)) {
            foreach ($lopHoc as $lh) {
                $monHoc = $this->monHocRepository->find($lh->ma_mon_hoc);
                $lh->mon_hoc = $monHoc->ten;
                $giangVien = GiangVien::find($lh->ma_giang_vien);
                $lh->giang_vien = $giangVien->ten;
            }
        }

        return view('admin.pages.lophoc.index', compact('lopHoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/lop-hoc')->with('status', config('langVN.permission.err'));
        }

        $monHoc = $this->monHocRepository->list();
        $giangVien = GiangVien::all();
        return view('admin.pages.lophoc.create', compact('monHoc', 'giangVien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/lop-hoc')->with('status', config('langVN.permission.err'));
        }

        Validation::validationLophoc($request);
        $param = $request->all();
        $lichHoc = json_encode($param['lich_hoc']);
        $param['lich_hoc'] = $lichHoc;
        $create = $this->lopHocRepository->create($param);
        if ($create) {
            return redirect('/admin/lop-hoc')->with('status', config('langVN.add.success'));
        }

        return redirect()->back()->with('status', config('langVN.add.failed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LopHoc  $request
     * @param  \App\LopHoc  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $monHoc = $this->monHocRepository->list();
        $giangVien = GiangVien::all();
        $lopHoc = $this->lopHocRepository->find($id);
        if (empty($lopHoc)) {
            return redirect('/admin/lop-hoc')->with('status', config('langVN.find_err'));
        }
        $lichHoc = json_decode($lopHoc->lich_hoc);
        $lopHoc->lich_hoc = $lichHoc;

        // List danh sach hoc vien
        $quaTrinhHoc =  $this->lopHocRepository->listQuaTrinhHoc($id);

        return view('admin.pages.lophoc.edit', compact('monHoc', 'giangVien', 'lopHoc', 'quaTrinhHoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 0) {
            return redirect('/admin/lop-hoc')->with('status', config('langVN.permission.err'));
        }

        Validation::validationLophoc($request);
        $param = $request->all();
        $lichHoc = json_encode($param['lich_hoc']);
        $param['lich_hoc'] = $lichHoc;
        $update = $this->lopHocRepository->update($param, $id);
        if ($update) {
            return redirect('/admin/lop-hoc')->with('status', config('langVN.update.success'));
        }

        return redirect()->back()->with('status', config('langVN.update.failed'));
    }

    /**
     * Function add student to this class
     *
     * @param Request $request
     * @param $id int of student
     * @param $lopHoc int of class
     * @return \Illuminate\Http\RedirectResponse
     */
    public function themHocVien(Request $request, $id, $lopHoc)
    {
        $hocVien = $this->hocVienRepository->find($id);
        if (empty($hocVien)) {
            return redirect()->back()->with('status', config('langVN.update.failed'));
        }
        $lopHoc = $this->lopHocRepository->find($lopHoc);
        $monHoc = null;
        if (!empty($lopHoc)) {
            $monHoc = $this->monHocRepository->find($lopHoc->ma_mon_hoc);
        }
        // Check student already exits
        $checkStudent = $this->lopHocRepository->checkStudentExits($id, $lopHoc);
        if ($checkStudent == false) {
            return redirect()->back()->with('status', config('langVN.add_student.already'));
        }
        $param = [
            'ma_mon_hoc' => $monHoc->id,
            'ma_lop_hoc' => $lopHoc->id,
            'ma_hoc_vien' => $id,
            'thoi_gian_hoc' => $lopHoc->thoi_gian_bat_dau,
            'diem_so' => null,
            'thong_tin' => ' ',
            'tinh_trang_hoc' => 1,
            'hoc_phi' => null,
        ];
        $addToClass = $this->quaTrinhHocRepository->create($param);
        if ($addToClass) {
            $this->quaTrinhHocRepository->addTuition($param);
            return redirect()->back()->with('status', config('langVN.add_student.success'));
        }

        return redirect()->back()->with('status', config('langVN.add_student.failed'));
    }

    /**
     * Function kick out a student of class
     *
     * @param Request $request
     * @param int $id of qua trinh hoc
     * @return \Illuminate\Http\RedirectResponse
     */
    public function kickOut(Request $request, $id)
    {
        $quaTrinhHoc = $this->quaTrinhHocRepository->find($id);
        if (empty($quaTrinhHoc)) {
            return redirect()->back()->with('status', config('langVN.find_err'));
        }
        $delete = $this->quaTrinhHocRepository->delete($quaTrinhHoc->id);
        if ($delete) {
            return redirect()->back()->with('status', config('langVN.remove_student.success'));
        }

        return redirect()->back()->with('status', config('langVN.remove_student.failed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LopHoc  $lopHoc
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $lopHoc = $this->lopHocRepository->search($param);
        if (!empty($lopHoc)) {
            foreach ($lopHoc as $lh) {
                $monHoc = $this->monHocRepository->find($lh->ma_mon_hoc);
                $lh->mon_hoc = $monHoc->ten;
                $giangVien = GiangVien::find($lh->ma_giang_vien);
                $lh->giang_vien = $giangVien->ten;
            }
        }

        return view('admin.pages.lophoc.index', compact('lopHoc'));
    }

    /**
     * Function search student before add to class
     *
     * @param Request $request
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Throwable
     */
    public function searchHocVien(Request $request)
    {
        $param = $request->all();
        $hocVien = $this->hocVienRepository->search($param);
        if (!empty($hocVien)) {
            $template = view('admin.pages.lophoc.searchhocvien', compact('hocVien', 'param'))->render();
            return app()->make(ResponseHelper::class)->success($template);
        }

        return app()->make(ResponseHelper::class)->notFound();
    }

    /**
     * Function export file excel list student of class
     *
     * @param Request $request
     * @param int $id of lop_hoc
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Excel|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function exportStudent(Request $request, $id)
    {
        $lopHoc = $this->lopHocRepository->find($id);
        if (empty($lopHoc)) {
            return redirect('/admin/lop-hoc/' . $id . '/edit')->with('status', config('langVN.find_err'));
        }

        return Excel::download(new ClassStudentExport($id), 'Danh sách học viên lớp ' . $lopHoc->ma_lop . '.xlsx');
    }
}
