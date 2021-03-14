<?php

namespace App\Http\Controllers\Admin;

use App\HocVien;
use App\Repositories\HocPhi\HocPhiRepositoryInterface;
use App\Repositories\HocVien\HocVienRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validations\Validation;

class HocVienController extends Controller
{
    private $hocvienRepository;
    private $hocPhiRepository;

    public function __construct(
        HocVienRepositoryInterface $hocVienRepository,
        HocPhiRepositoryInterface $hocPhiRepository
    )
    {
        $this->hocvienRepository = $hocVienRepository;
        $this->hocPhiRepository = $hocPhiRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hocVien = $this->hocvienRepository->getAll(config('const.paginate'), 'DESC');
        return view('admin.pages.hocvien.index', compact('hocVien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.hocvien.create');
    }

    /**
     * Store a newly created resource in storage.
     *   trang_thai: 0: da nghi hoc, 1: dang theo hoc
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $param = $request->all();
        Validation::validationHocVien($request);
        $param['trang_thai'] = 1;

        $create = $this->hocvienRepository->create($param);
        if ($create) {
            return redirect('/admin/hoc-vien')->with('status', config('langVN.add.success'));
        } else {
            return redirect()->back()->with('status', config('langVN.add.failed'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   $id
     * @param   \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $hocVien = $this->hocvienRepository->find($id);
        if (empty($hocVien)) {
            return redirect('/admin/hoc-vien')->with('status', config('langVN.find_err'));
        }
        $hocPhi = $this->hocvienRepository->listHocPhi($id);

        return view('admin.pages.hocvien.edit', compact('hocVien', 'hocPhi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HocVien  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $param = $request->all();
        Validation::validationHocVien($request);

        $update = $this->hocvienRepository->update($param, $id);
        if ($update) {
            return redirect('/admin/hoc-vien')->with('status', config('langVN.update.success'));
        } else {
            return redirect()->back()->with('status', config('langVN.update.failed'));
        }
    }

    /**
     * Function controller pay tuition an student now
     *
     * @param Request $request
     * @param int $id of tutition
     * @return \Illuminate\Http\Response
     */
    public function payTuition(Request $request)
    {
        $id = $request->id;
        if ($id == null) {
            return redirect()->back()->with('status', config('langVN.find_err'));
        }
        $hocPhi = $this->hocPhiRepository->find($id);
        if (empty($hocPhi)) {
            return redirect()->back()->with('status', config('langVN.tuition.failed'));
        }
        $param = $request->all();
        $param['tinh_trang_nop_hoc_phi'] = 1;
        $param['ngay_nop_hoc_phi'] = Carbon::now();
        if (isset($param['voucher']) && $param['voucher'] !== null) {
            $calhocPhi = $this->hocPhiRepository->applyVoucher($param['voucher'], $id);
            if ($calhocPhi === false) {
                return redirect()->back()->with('status', 'Voucher không hợp lệ');
            }
            $param['hoc_phi'] = $calhocPhi;
        }
        $update = $this->hocPhiRepository->update($param, $id);
        if ($update) {
            if (isset($param['voucher']) && $param['voucher'] !== null) {
                $this->hocPhiRepository->changeSttVoucher($param['voucher']);
            }

            return redirect()->back()->with('status', config('langVN.tuition.success'));
        }

        return redirect()->back()->with('status', config('langVN.tuition.failed'));
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
        $hocVien = $this->hocvienRepository->search($param);
        return view('admin.pages.hocvien.index', compact('hocVien'));
    }
}
