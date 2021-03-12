<?php

namespace App\Http\Controllers\Admin;

use App\HocPhi;
use App\Repositories\HocPhi\HocPhiRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $hocPhi = $this->hocPhiRepository->listHocPhi();
        return view('admin.pages.hocphi.index', compact('hocPhi'));
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
}
