<?php

namespace App\Http\Controllers\Admin;

use App\MonHoc;
use App\Repositories\MonHoc\MonHocRepositoryInterface;
use App\Validations\Validation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonHocController extends Controller
{
    private $monHocRepository;

    public function __construct(MonHocRepositoryInterface $monHocRepository)
    {
        $this->monHocRepository = $monHocRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monHoc = $this->monHocRepository->getAll(config('const.paginate'), 'ASC');
        return view('admin.pages.monhoc.index', compact('monHoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->role != 0) {
            return redirect('/mon-hoc')->with('status', config('langVN.permission.err'));
        }

        return view('admin.pages.monhoc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(\Auth::user()->role != 0) {
            return redirect('/mon-hoc')->with('status', config('langVN.permission.err'));
        }

        Validation::validationMonHoc($request);
        $param = $request->all();
        $param['thong_tin'] = "";
        $create = $this->monHocRepository->create($param);
        if ($create) {
            return redirect('/admin/mon-hoc')->with('status', config('langVN.add.success'));
        }

        return redirect()->back()->with('status', config('langVN.add.failed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonHoc  $request
     * @param  \App\MonHoc  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if(\Auth::user()->role != 0) {
            return redirect('/mon-hoc')->with('status', config('langVN.permission.err'));
        }

        $monHoc = $this->monHocRepository->find($id);
        if (empty($monHoc)) {
            return redirect('/admin/mon-hoc')->with('status', config('langVN.find_err'));
        }

        return view('admin.pages.monhoc.edit', compact('monHoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonHoc  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::user()->role != 0) {
            return redirect('/mon-hoc')->with('status', config('langVN.permission.err'));
        }

        Validation::validationMonHoc($request);
        $param = $request->all();
        $param['thong_tin'] = "";
        $create = $this->monHocRepository->update($param, $id);
        if ($create) {
            return redirect('/admin/mon-hoc')->with('status', config('langVN.update.success'));
        }

        return redirect()->back()->with('status', config('langVN.update.failed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonHoc  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $monHoc = $this->monHocRepository->search($param);

        return view('admin.pages.monhoc.index', compact('monHoc'));
    }
}
