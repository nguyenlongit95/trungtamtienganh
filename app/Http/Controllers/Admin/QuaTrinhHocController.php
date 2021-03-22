<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MarkExport;
use App\Models\LopHoc;
use App\Models\MonHoc;
use App\QuaTrinhHoc;
use App\Repositories\HocVien\HocVienRepositoryInterface;
use App\Repositories\QuaTrinhHoc\QuaTrinhHocRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class QuaTrinhHocController extends Controller
{
    private $hocVienRepository;
    private $quaTrinhHocRepository;

    /**
     * QuaTrinhHocController constructor.
     * @param HocVienRepositoryInterface $hocVienRepository
     * @param QuaTrinhHocRepositoryInterface $quaTrinhHocRepository
     */
    public function __construct(
        HocVienRepositoryInterface $hocVienRepository,
        QuaTrinhHocRepositoryInterface $quaTrinhHocRepository
    )
    {
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
        $hocVien = $this->hocVienRepository->getAll(config('const.paginate'), 'DESC');
        return view('admin.pages.quatrinhhoc.index', compact('hocVien'));
    }

    /**
     * Function show qua trinh hoc of an student
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(Request $request, $id)
    {
        $hocVien = $this->hocVienRepository->find($id);
        if (empty($hocVien)) {
            return redirect('/admin/qua-trinh-hoc/')->with('status', config('langVN.find_err'));
        }
        $quaTrinhHoc = $this->quaTrinhHocRepository->listOfStudent($hocVien->id);

        return view('admin.pages.quatrinhhoc.show', compact('quaTrinhHoc', 'hocVien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuaTrinhHoc  $id of qua trinh hoc
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $quaTrinhHoc = $this->quaTrinhHocRepository->find($id);
        if (empty($quaTrinhHoc)) {
            return redirect()->back()->with('status', config('langVN.find_err'));
        }
        $maMM = MonHoc::find($quaTrinhHoc->ma_mon_hoc);
        $quaTrinhHoc->mon_hoc = $maMM->ten;
        $lophoc = LopHoc::find($quaTrinhHoc->ma_lop_hoc);
        $quaTrinhHoc->lop_hoc = $lophoc->ten_lop;
        $hocVien = $this->hocVienRepository->find($quaTrinhHoc->ma_hoc_vien);
        $listMark = $this->quaTrinhHocRepository->listMarkOfStudent($id);
        $classification = $this->quaTrinhHocRepository->classification($listMark);

        return view('admin.pages.quatrinhhoc.edit', compact(
            'quaTrinhHoc', 'maMM', 'lophoc', 'hocVien', 'listMark', 'classification'
        ));
    }

    /**
     * Controller update qua trinh hoc of an student
     *
     * @param Request $request
     * @param int $id of qua trinh hoc
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $param = $request->all();
        $update = $this->quaTrinhHocRepository->update($param, $id);
        if ($update) {
            return redirect()->back()->with('status', config('langVN.update.success'));
        }

        return redirect()->back()->with('status', config('langVN.update.failed'));
    }

    /**
     * Controller mark score an student
     *
     * @param Request $request
     * @param int $id of qua trinh hoc
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mark(Request $request, $id)
    {
        $param = $request->all();
        $param['diem'] = (float) $param['diem'];
        if ($param['diem'] > 0) {
            if (!is_float($param['diem'])) {
                return redirect()->back()->with('status', config('langVN.mark.failed'));
            }
                if ($param['diem'] < 0 || $param['diem'] > 10) {
                    return redirect()->back()->with('status', config('langVN.mark.failed'));
                }
                $mark = $this->quaTrinhHocRepository->mark($id, $param);
                if ($mark) {
                    return redirect()->back()->with('status', config('langVN.mark.success'));
                }

                return redirect()->back()->with('status', config('langVN.mark.failed'));
        } else {
            return redirect()->back()->with('status', config('langVN.mark.failed'));
        }
    }

    /**
     * Search the specified resource in storage
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $hocVien = $this->hocVienRepository->search($param);
        return view('admin.pages.quatrinhhoc.index', compact('hocVien'));
    }

    /**
     * Function controller export mark an student using id qua_trinh_hoc of student
     *
     * @param Request $request
     * @param integer $id qua_trinh_hoc
     * @return \Illuminate\Http\RedirectResponse|null
     */
    public function exportMark(Request $request, $id)
    {
        $quaTrinhHoc = $this->quaTrinhHocRepository->find($id);
        if (empty($quaTrinhHoc)) {
            return redirect()->back()->with('status', config('langVN.find_err'));
        }

        $hocVien = $this->hocVienRepository->find($quaTrinhHoc->ma_hoc_vien);
        if (empty($hocVien)) {
            return redirect()->back()->with('status', config('langVN.find_err'));
        }

        return Excel::download(new MarkExport($id), 'Bảng điểm của ' . $hocVien->ten . '.xlsx');
    }
}
