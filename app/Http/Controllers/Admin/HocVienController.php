<?php

namespace App\Http\Controllers\Admin;

use App\HocVien;
use App\Repositories\HocPhi\HocPhiRepositoryInterface;
use App\Repositories\HocVien\HocVienRepositoryInterface;
use App\Repositories\LopHoc\LopHocRepositoryInterface;
use App\Repositories\MonHoc\MonHocRepositoryInterface;
use App\Repositories\Voucher\VoucherRepositoryInterface;
use App\Support\ResponseHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Validations\Validation;
use Illuminate\Support\Facades\DB;

class HocVienController extends Controller
{
    /**
     * @var HocVienRepositoryInterface
     */
    private $hocvienRepository;
    private $hocPhiRepository;
    private $monHocRepository;
    private $lopHocRepository;
    private $voucherRepository;

    /**
     * HocVienController constructor.
     * @param HocVienRepositoryInterface $hocVienRepository
     * @param HocPhiRepositoryInterface $hocPhiRepository
     * @param MonHocRepositoryInterface $monHocRepository
     * @param LopHocRepositoryInterface $lopHocRepository
     * @param VoucherRepositoryInterface $voucherRepository
     */
    public function __construct(
        HocVienRepositoryInterface $hocVienRepository,
        HocPhiRepositoryInterface $hocPhiRepository,
        MonHocRepositoryInterface $monHocRepository,
        LopHocRepositoryInterface $lopHocRepository,
        VoucherRepositoryInterface $voucherRepository
    )
    {
        $this->hocvienRepository = $hocVienRepository;
        $this->hocPhiRepository = $hocPhiRepository;
        $this->monHocRepository = $monHocRepository;
        $this->lopHocRepository = $lopHocRepository;
        $this->voucherRepository = $voucherRepository;
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
        $monHoc = $this->monHocRepository->listAllMH();
        return view('admin.pages.hocvien.create', compact('monHoc'));
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
        $param['email'] = "";
        $create = $this->hocvienRepository->create($param);
        $lopHoc = $this->lopHocRepository->find($param['lop-hoc']);
        if ($create) {
            // Add to class
            DB::table('qua_trinh_hoc')->insert([
                'ma_mon_hoc' => $param['mon-hoc'],
                'ma_lop_hoc' => $param['lop-hoc'],
                'ma_hoc_vien' => $create->id,
                'thoi_gian_hoc' => $lopHoc->thoi_gian_bat_dau,
                'diem_so' => null,
                'thong_tin' => '',
                'tinh_trang_hoc' => 1,
                'hoc_phi' => null,
            ]);
            // Purchase course
            DB::table('hoc_phi')->insert([
                'ma_hoc_vien' => $create->id,
                'ma_lop_hoc' => $param['lop-hoc'],
                'hoc_phi' => $param['hoc_phi'],
                'tinh_trang_nop_hoc_phi' => 1,
                'ngay_nop_hoc_phi' => Carbon::now(),
            ]);
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
        $param['email'] = "";
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

    /**
     * Controller function render view get all lop_hoc using id mon_hoc and pass param ajax
     *
     * @param Request $request
     * @return array|string
     * @throws \Throwable
     */
    public function getAllLopHoc(Request $request)
    {
        $param = $request->all();
        $listLopHoc = $this->lopHocRepository->listAllLopHoc($param['idMonHoc']);
        return view('admin.pages.hocvien.partials.listAllLopHoc', compact('listLopHoc'))->render();
    }

    /**
     * Controller function get hoc_phi using id_+lop_hoc
     *
     * @param Request $request
     * @return |null
     */
    public function getPriceOfClass(Request $request)
    {
        $param = $request->all();
        $lopHoc = $this->lopHocRepository->find($param['idLopHoc']);
        if (!empty($lopHoc)) {
            return $lopHoc->hoc_phi;
        }
        return null;
    }

    /**
     * Controller function check voucher already
     *
     * @param Request $request
     * @return |null
     */
    public function checkVoucher(Request $request)
    {
        $param = $request->all();
        $checkVoucher = $this->voucherRepository->checkVoucher($param['voucher']);
        if ($checkVoucher) {
            return $checkVoucher->giam_gia;
        }
        return "errors";
    }

    /**
     * @param Request $request
     * @return |null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getLopHocBill(Request $request)
    {
        $param = $request->all();
        $lopHoc = $this->lopHocRepository->find($param['lop_hoc']);
        if (!empty($lopHoc)) {
            return app()->make(ResponseHelper::class)->success($lopHoc);
        }
        return null;
    }

    /**
     * @param Request $request
     * @return |null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getLophocUsingHocPhi(Request $request)
    {
        $param = $request->all();
        $hocPhi = DB::table('hoc_phi')->find($param['idHocPhi']);
        if (empty($hocPhi)) {
            return null;
        }
        $lopHoc = DB::table('lop_hoc')->find($hocPhi->ma_lop_hoc);
        if (empty($lopHoc)) {
            return null;
        }
        return app()->make(ResponseHelper::class)->success($lopHoc);
    }
}
