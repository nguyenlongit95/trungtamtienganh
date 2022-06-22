<?php

namespace App\Http\Controllers\Admin;

use App\Exports\HocPhiExport;
use App\HocPhi;
use App\Repositories\HocPhi\HocPhiRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class HocPhiController extends Controller
{
    private $hocPhiRepository;

    public function __construct(HocPhiRepositoryInterface $hocPhiRepository)
    {
        $this->hocPhiRepository = $hocPhiRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lopHoc = DB::table('lop_hoc')->orderBy('id', 'DESC')->paginate(15);
        $chietKhau = DB::table('chiet_khau')->get();
        return view('admin.pages.hocphi.index', compact('lopHoc', 'chietKhau'));
    }

    /**
     * Controller function them chiet khau
     *
     * @param Request $request
     * @param int $id lop_hoc
     * @return \Illuminate\Http\RedirectResponse
     */
    public function themChietKhau(Request $request, $id)
    {
        $param = $request->all();
        if (is_null($param['so_buoi_hoc']) || is_null($param['chiet_khau'])) {
            return redirect()->back()->with('status', 'Nhập sai dữ liệu mời bạn nhập lại!');
        }
        try {
            DB::table('chiet_khau')->insert([
                'chiet_khau' => $param['chiet_khau'],
                'so_buoi_hoc' => $param['so_buoi_hoc'],
                'ma_lop_hoc' => $id
            ]);
            return redirect()->back()->with('status', 'Thêm giá trị chiết khấu thành công!');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('status', 'Có lỗi hệ thống hãy kiểm tra log!');
        }
    }

    /**
     * @param Request $request
     * @param int $id chiet khau
     * @return \Illuminate\Http\RedirectResponse
     */
    public function chinhSuaChietKhau(Request $request, $id)
    {
        $param = $request->all();
        if (is_null($param['so_buoi_hoc']) || is_null($param['chiet_khau'])) {
            return redirect()->back()->with('status', 'Nhập sai dữ liệu mời bạn nhập lại!');
        }
        try {
            DB::table('chiet_khau')->where('id', $id)->update([
                'chiet_khau' => $param['chiet_khau'],
                'so_buoi_hoc' => $param['so_buoi_hoc']
            ]);
            return redirect()->back()->with('status', 'Chỉnh sửa giá trị chiết khấu thành công!');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('status', 'Có lỗi hệ thống hãy kiểm tra log!');
        }
    }

    /**
     * @param Request $request
     * @param int $id chiet khau
     * @return \Illuminate\Http\RedirectResponse
     */
    public function xoaChietKhau(Request $request, $id)
    {
        try {
            DB::table('chiet_khau')->where('id', $id)->delete();
            return redirect()->back()->with('status', 'Xoá giá trị chiết khấu thành công!');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('status', 'Có lỗi hệ thống hãy kiểm tra log!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HocPhi  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $hocPhi = $this->hocPhiRepository->search($param);

        return view('admin.pages.hocphi.index', compact('hocPhi'));
    }

    /**
     * Controller export nuition using date asset
     *
     * @param Request $request
     * @return |null
     */
    public function export(Request $request)
    {
        $param = $request->all();

        return Excel::download(new HocPhiExport($param['start_time'], $param['end_time']), 'Học phí của học viên.xlsx');
    }
}
