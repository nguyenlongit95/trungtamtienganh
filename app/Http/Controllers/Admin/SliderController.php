<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $sliders = DB::table('sliders')->where('display', 1)
            ->orderBy('id', 'DESC')->first();
        return view('admin.pages.sliders.index', compact('sliders'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function change(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file->move('sliders', $file->getClientOriginalName());
                DB::table('sliders')->where('id', 1)->update([
                    'image' => $file->getClientOriginalName()
                ]);
            }
            return redirect('/admin/sliders/')->with('status', 'Cập nhật banner thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/admin/sliders/')->with('status', 'Có lỗi hệ thống, hãy kiểm tra lại');
        }
    }
}
