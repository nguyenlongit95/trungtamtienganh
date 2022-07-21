<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    protected $slider;
    protected $slogan;
    protected $about;
    protected $say;
    protected $teachers;
    protected $blog;

    /**
     * FrontEndController constructor.
     */
    public function __construct()
    {
        $this->slider = DB::table('sliders')->first();
        $this->slogan = DB::table('slogans')->first();
        $this->about = DB::table('about')->first();
        $this->say = DB::table('says')->orderBy('id', 'DESC')->get();
        $this->teachers = DB::table('giang_vien')
            ->join('mon_hoc', 'mon_hoc.id', '=', 'giang_vien.ma_mon_hoc')
            ->orderBy('giang_vien.id', 'DESC')->select(
                'giang_vien.ten as ten_giang_vien', 'giang_vien.avatar as avatar',
                'mon_hoc.ten as ten_mon_hoc'
            )->get();
        $this->blog = DB::table('bai_viet')->where('display', 1)->whereNull('deleted_at')
            ->orderBy('id', 'DESC')->get();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('frontend.index', [
            'slider' => $this->slider,
            'slogan' => $this->slogan,
            'about' => $this->about,
            'says' => $this->say,
            'teachers' => $this->teachers,
            'blogs' => $this->blog
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail()
    {
        return view('frontend.detail');
    }
}
