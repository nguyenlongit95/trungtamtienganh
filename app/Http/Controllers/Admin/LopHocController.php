<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ClassStudentExport;
use App\LopHoc;
use App\Models\GiangVien;
use App\Repositories\HocPhi\HocPhiRepositoryInterface;
use App\Repositories\HocVien\HocVienRepositoryInterface;
use App\Repositories\LopHoc\LopHocRepositoryInterface;
use App\Repositories\MonHoc\MonHocRepositoryInterface;
use App\Repositories\QuaTrinhHoc\QuaTrinhHocRepositoryInterface;
use App\Validations\Validation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\ResponseHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    private $hocPhiRepository;

    /**
     * LopHocController constructor.
     * @param LopHocRepositoryInterface $lopHocRepository
     * @param MonHocRepositoryInterface $monHocRepository
     * @param HocVienRepositoryInterface $hocVienRepository
     * @param QuaTrinhHocRepositoryInterface $quaTrinhHocRepository
     * @param HocPhiRepositoryInterface $hocPhiRepository
     */
    public function __construct(
        LopHocRepositoryInterface $lopHocRepository,
        MonHocRepositoryInterface $monHocRepository,
        HocVienRepositoryInterface $hocVienRepository,
        QuaTrinhHocRepositoryInterface $quaTrinhHocRepository,
        HocPhiRepositoryInterface $hocPhiRepository
    )
    {
        $this->lopHocRepository = $lopHocRepository;
        $this->monHocRepository = $monHocRepository;
        $this->hocVienRepository = $hocVienRepository;
        $this->quaTrinhHocRepository = $quaTrinhHocRepository;
        $this->hocPhiRepository = $hocPhiRepository;
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
        $studentInClass = DB::table('qua_trinh_hoc')->where('ma_lop_hoc', $id)
            ->select('ma_hoc_vien')->pluck('ma_hoc_vien')
            ->toArray();
        // Select student not in class
        $listStudentNotInClass = DB::table('hoc_vien')->whereNotIn('id', $studentInClass)->get();
        //Response view data
        return view('admin.pages.lophoc.edit', compact(
            'monHoc', 'giangVien', 'lopHoc', 'quaTrinhHoc',
                'listStudentNotInClass'
        ));
    }

    public function addMultiStudent(Request $request, $id)
    {
        $maLopHoc = $id;
        $param = $request->all();
        if (isset($param['studentNotInClass'])) {
            $lopHoc = $this->lopHocRepository->find($id);
            $monHoc = $this->monHocRepository->find($lopHoc->ma_mon_hoc);
            if (is_array($param['studentNotInClass'])) {
                foreach ($param['studentNotInClass'] as $value) {
                    try {
                        $quaTrinhHoc['ma_mon_hoc'] = $monHoc->id;
                        $quaTrinhHoc['ma_lop_hoc'] = $lopHoc->id;
                        $quaTrinhHoc['ma_hoc_vien'] = $value;
                        $quaTrinhHoc['thoi_gian_hoc'] = $lopHoc->thoi_gian_ket_thuc;
                        $quaTrinhHoc['diem_so'] = null;
                        $quaTrinhHoc['thong_tin'] = "";
                        $quaTrinhHoc['tinh_trang_hoc'] = 1;
                        $quaTrinhHoc['hoc_phi'] = $lopHoc->hoc_phi;
                        // Add to table qua_trinh_hoc
                        $this->quaTrinhHocRepository->create($quaTrinhHoc);
                        $hocPhi['ma_hoc_vien'] = $value;
                        $hocPhi['ma_lop_hoc'] = $lopHoc->id;
                        $hocPhi['hoc_phi'] = $lopHoc->hoc_phi;
                        $hocPhi['tinh_trang_nop_hoc_phi'] = 0;
                        $hocPhi['ngay_nop_hoc_phi'] = null;
                        // Add to table hoc_phi
                        $this->hocPhiRepository->create($hocPhi);
                    } catch (\Exception $exception) {
                        Log::error($exception->getMessage());
                        return redirect()->back()->with('status', 'Có lỗi hệ thống, kiểm tra lại kỹ thuật!');
                    }

                }
            }
        }
        return redirect()->back()->with('status', 'Thêm danh sách học viên thành công.');
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
            return redirect('/admin/lop-hoc/' . $id . '/edit')->with('status', config('langVN.update.success'));
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
        if ($this->lopHocRepository->checkMaxStudent($lopHoc) === false) {
            return redirect()->back()->with('status', config('langVN.add_student.max'));
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
        try {
            $this->quaTrinhHocRepository->deleteCost($quaTrinhHoc);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
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
