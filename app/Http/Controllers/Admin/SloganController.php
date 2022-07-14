<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SloganController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $slogan = DB::table('slogans')->first();
        return view('admin.pages.slogan.index', compact('slogan'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        try {
            DB::table('slogans')->where('id', 1)->update([
                'slogan' => $request->slogan
            ]);
            return redirect('/admin/slogan')->with('status', 'Cập nhật slogan thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/admin/slogan')->with('status', 'Có lỗi hệ thống, hãy kiểm tra lại!');
        }
    }
}
