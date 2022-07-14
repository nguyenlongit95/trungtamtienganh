<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SayController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $says = DB::table('says')->orderBy('id', 'DESC')->get();
        return view('admin.pages.says.index', compact('says'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.pages.says.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $param = $request->all();
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move('says', $file->getClientOriginalName());
                DB::table('says')->insert([
                    'lop' => $param['lop'],
                    'ten' => $param['ten'],
                    'noi_dung' => $param['noi_dung'],
                    'image' => $file->getClientOriginalName()
                ]);
                return redirect('/admin/says/')->with('status', 'Thêm mới nhận xét thành công.');
            } else {
                return redirect('/admin/says/add')->with('status', 'Hãy chọn hình ảnh của người nhận xét.');
            }
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect('/admin/says/add')->with('status', 'Có lỗi hệ thống, hãy kiểm tra lại.');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $say = DB::table('says')->where('id', $id)->first();
        return view('admin.pages.says.edit', compact('say'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $param = $request->all();
        $say = DB::table('says')->where('id', $id)->first();
        if (empty($say)) {
            return redirect('/admin/says/')->with('status', 'Không tìm thấy dữ liệu!');
        }
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move('says', $file->getClientOriginalName());
                DB::table('says')->where('id', $say->id)->update([
                    'lop' => $param['lop'],
                    'ten' => $param['ten'],
                    'noi_dung' => $param['noi_dung'],
                    'image' => $file->getClientOriginalName()
                ]);
                return redirect('/admin/says/')->with('status', 'Chỉnh sửa nhận xét thành công.');
            } else {
                DB::table('says')->where('id', $say->id)->update([
                    'lop' => $param['lop'],
                    'ten' => $param['ten'],
                    'noi_dung' => $param['noi_dung'],
                ]);
                return redirect('/admin/says/add')->with('status', 'Chỉnh sửa nhận xét thành công.');
            }
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect('/admin/says/add')->with('status', 'Có lỗi hệ thống, hãy kiểm tra lại.');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request, $id)
    {
        $say = DB::table('says')->where('id', $id)->first();
        if (empty($say)) {
            return redirect('/admin/says/')->with('status', 'Không tìm thấy dữ liệu!');
        }
        try {
            DB::table('says')->where('id', $id)->delete();
            return redirect('/admin/says/')->with('status', 'Xoá thành công nhận xét!');
        } catch (\Exception $exception) {
            Log::error($exception);
            return redirect('/admin/says/add')->with('status', 'Có lỗi hệ thống, hãy kiểm tra lại.');
        }
    }
}
