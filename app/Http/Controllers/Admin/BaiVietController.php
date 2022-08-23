<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaiVietController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $baiViet = DB::table('bai_viet')->whereNull('deleted_at')->orderBy('id', 'DESC')
            ->paginate(15);
        return view('admin.pages.bai_viet.index', compact('baiViet'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $baiViet = DB::table('bai_viet')->whereNull('deleted_at')
            ->where('title', 'like', '%' . $param['title'] . '%')
            ->orderBy('id', 'DESC')
            ->paginate(15);
        return view('admin.pages.bai_viet.index', compact('baiViet'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.bai_viet.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $param = $request->all();
        if ($param == "") {
            return redirect('/admin/bai-viet/create')->with('status', 'Nhập tiêu đề bài viết');
        }
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move('bai_viet', $file->getClientOriginalName());
                $param['image'] = $file->getClientOriginalName();
            }
            DB::table('bai_viet')->insert([
                'title' => $param['title'],
                'info' => $param['info'],
                'description' => $param['description'],
                'display' => $param['display'],
                'image' => $param['image'],
            ]);
            return redirect('/admin/bai-viet/')->with('status', 'Thêm mới bài viết thành công!');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/admin/bai-viet/create')->with('status', 'Có lỗi sảy ra, hãy kiểm tra lại hệ thống!');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $baiViet = DB::table('bai_viet')->where('id', $id)->first();
        return view('admin.pages.bai_viet.edit', compact('baiViet'));
    }

    public function update(Request $request, $id)
    {
        $param = $request->all();
        if ($param == "") {
            return redirect('/admin/bai-viet/create')->with('status', 'Nhập tiêu đề bài viết');
        }
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move('bai_viet', $file->getClientOriginalName());
                $param['image'] = $file->getClientOriginalName();
                DB::table('bai_viet')->where('id', $id)->update([
                    'title' => $param['title'],
                    'info' => $param['info'],
                    'description' => $param['description'],
                    'display' => $param['display'],
                    'image' => $param['image'],
                ]);
            } else {
                DB::table('bai_viet')->where('id', $id)->update([
                    'title' => $param['title'],
                    'info' => $param['info'],
                    'description' => $param['description'],
                    'display' => $param['display'],
                ]);
            }
            return redirect('/admin/bai-viet/')->with('status', 'Chỉnh sửa bài viết thành công!');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/admin/bai-viet/edit/' . $id)->with('status', 'Có lỗi sảy ra, hãy kiểm tra lại hệ thống!');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request, $id)
    {
        try {
           DB::table('bai_viet')->where('id', $id)->update([
               'display' => 0,
               'deleted_at' => Carbon::now()
           ]);
           return redirect('/admin/bai-viet/')->with('status', 'Delete bài viết thành công!');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/admin/bai-viet/create')->with('status', 'Có lỗi sảy ra, hãy kiểm tra lại hệ thống!');
        }
    }
}
