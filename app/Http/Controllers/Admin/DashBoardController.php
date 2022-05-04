<?php

namespace App\Http\Controllers\Admin;

use App\Factory\NganLuong\NganLuong;
use App\Factory\Paygates\VNPAY\VNPAY;
use App\Factory\Paygates\Paypal\paypal_entry;
use App\Http\Controllers\Controller;
use App\Models\GiangVien;
use App\Models\HocPhi;
use App\Models\HocVien;
use App\Models\LopHoc;
use App\models\LuongGiangVien;
use App\Models\QuaTrinhHoc;
use App\Models\Voucher;
use App\Repositories\LopHoc\LopHocRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function __construct(LopHocRepositoryInterface $lopHocRepository)
    {
    }

    /**
     * Function controller get data and render view dashboard
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $totalStudent = HocVien::count();
        $totalTeacher = GiangVien::count();
        $totalClass = LopHoc::count();
        $totalVoucher = Voucher::count();

        $carbon = Carbon::now();
        $lastMonth = $carbon->format('m');
        $thisYear = $carbon->format('Y');
        $arrListMonth = [];
        for ($i = 1; $i <= $lastMonth; $i++) {
            array_push($arrListMonth, $i);
        }

        $thuHocPhi = $this->calCulateHocPhiTheoThang($arrListMonth);
        $luongGiangVien = $this->calculateLuongGiangVien($arrListMonth);
        $calculateStudent = $this->calculateStudent($arrListMonth);

        $lopHoc = LopHoc::whereMonth('thoi_gian_bat_dau', '>=', $carbon->format('m'))
            ->where('thoi_gian_ket_thuc', '>', Carbon::now()->format('m'))->get();

        return view('admin.pages.dashboard', compact(
            'totalStudent', 'totalTeacher', 'totalClass', 'totalVoucher',
            'thuHocPhi', 'luongGiangVien', 'calculateStudent',
            'lopHoc',
            'thisYear'
        ));
    }

    /**
     * Function get hoc_phi has month
     *
     * @param $arrListMonth
     * @return array
     */
    private function calCulateHocPhiTheoThang($arrListMonth)
    {
        $listHocPhi = [];
        foreach ($arrListMonth as $key=>$value) {
            $hocPhi = HocPhi::whereMonth('ngay_nop_hoc_phi', $value)->sum('hoc_phi');
            $listHocPhi[$value] = (int) $hocPhi;
        }

        return array_values($listHocPhi);
    }

    /**
     * Function tinh toan luong giang vien theo thang
     *
     * @param $arrListMonth
     * @return array
     */
    private function calculateLuongGiangVien($arrListMonth)
    {
        $listLuongGiangVien = [];
        foreach ($arrListMonth as $key=>$value) {
            $salary = LuongGiangVien::whereMonth('ngay_tra_luong', $value)->sum('luong');
            $listLuongGiangVien[$value] = (int) $salary;
        }

        return array_values($listLuongGiangVien);
    }

    /**
     * Function tinh toan so luong hoc vien theo thang
     *
     * @param $arrListMonth
     * @return array
     */
    private function calculateStudent($arrListMonth)
    {
        $listStudent = [];
        foreach ($arrListMonth as $key=>$value) {
            $salary = QuaTrinhHoc::whereMonth('thoi_gian_hoc', $value)->count();
            $listStudent[$value] = (int) $salary;
        }

        return array_values($listStudent);
    }
}
