<?php

namespace App\Http\Controllers\Admin;

use App\CanhBao;
use App\Repositories\CanhBao\CanhBaoRepositoryInterface;
use App\Repositories\HocVien\HocVienRepositoryInterface;
use App\Validations\Validation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CanhBaoController extends Controller
{
    private $canhBaoRepository;
    private $hocVienRepository;

    public function __construct(
        CanhBaoRepositoryInterface $canhBaoRepository,
        HocVienRepositoryInterface $hocVienRepository
    )
    {
        $this->canhBaoRepository = $canhBaoRepository;
        $this->hocVienRepository = $hocVienRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canhBao = $this->canhBaoRepository->getCanhBao();
        return view('admin.pages.canhbao.index', compact('canhBao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hocVien = $this->hocVienRepository->list();
        return view('admin.pages.canhbao.create', compact('hocVien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validation::validationCanhBao($request);
        $param = $request->all();
        $param['tinh_trang_canh_bao'] = 0;
        $create = $this->canhBaoRepository->create($param);
        if ($create) {
            return redirect('/admin/canh-bao/')->with('status', config('langVN.add.success'));
        }

        return redirect('/admin/canh-bao/')->with('status', config('langVN.add.failed'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CanhBao  $canhBao
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $canhBao = $this->canhBaoRepository->search($request->all());
        return view('admin.pages.canhbao.index', compact('canhBao'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CanhBao  $request
     * @param  \App\CanhBao  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $canhBao = $this->canhBaoRepository->find($id);
        if (!$canhBao) {
            return redirect('/admin/canh-bao/')->with('status', config('langVN.find_err'));
        }

        $delete = $this->canhBaoRepository->delete($id);
        if ($delete) {
            return redirect('/admin/canh-bao')->with('status', config('langVN.canh_bao_delete.success'));
        }

        return redirect('/admin/canh-bao')->with('status', config('langVN.canh_bao_delete.failed'));
    }
}
