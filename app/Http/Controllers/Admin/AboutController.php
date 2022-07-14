<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $about = DB::table('about')->where('id', 1)->first();
        return view('admin.pages.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        try {
            $param = $request->all();
            DB::table('about')->where('id', 1)->update([
                'title' => $param['title'],
                'content' => $param['content'],
            ]);
            return redirect('/admin/about')->with('status', 'Cập nhật thông tin giới thiệu thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/admin/about')->with('status', 'Có lỗi hệ thống, hãy kiểm tra lại!');
        }
    }
}
