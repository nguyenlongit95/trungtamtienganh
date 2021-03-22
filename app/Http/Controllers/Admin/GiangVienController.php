<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SalaryExport;
use App\GiangVien;
use App\Repositories\GiangVien\GiangVienRepositoryInterface;
use App\Repositories\MonHoc\MonHocRepositoryInterface;
use App\Validations\Validation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class GiangVienController extends Controller
{
    /**
     * @var GiangVienRepositoryInterface
     */
    private $giangVienRepository;
    private $monHocRepository;

    /**
     * GiangVienController constructor.
     * @param GiangVienRepositoryInterface $giangVienRepository
     */
    public function __construct(
        GiangVienRepositoryInterface $giangVienRepository,
        MonHocRepositoryInterface $monHocRepository
    )
    {
        $this->giangVienRepository = $giangVienRepository;
        $this->monHocRepository = $monHocRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $giangVien = $this->giangVienRepository->listGiangVien();
        return view('admin.pages.giangvien.index', compact('giangVien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/giang-vien')->with('status', config('langVN.permission.err'));
        }

        $monHoc = $this->monHocRepository->list();
        return view('admin.pages.giangvien.create', compact('monHoc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/giang-vien')->with('status', config('langVN.permission.err'));
        }

        $param = $request->all();
        Validation::validationGiangVien($request);
        $create = $this->giangVienRepository->create($param);
        if ($create) {
            return redirect('/admin/giang-vien/')->with('status', config('langVN.add.success'));
        }

        return redirect('/admin/giang-vien/')->with('status', config('langVN.add.failed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GiangVien  $id
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/giang-vien')->with('status', config('langVN.permission.err'));
        }

        $giangVien = $this->giangVienRepository->find($id);
        if (empty($giangVien)) {
            return redirect('/admin/giang-vien')->with('status', config('langVN.find_err'));
        }
        $monHoc = $this->monHocRepository->list();
        $luong = $this->giangVienRepository->getSalary($id);

        return view('admin.pages.giangvien.edit', compact('giangVien', 'monHoc', 'luong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GiangVien  $giangVien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/giang-vien')->with('status', config('langVN.permission.err'));
        }

        $param = $request->all();
        Validation::validationGiangVien($request);
        $giangVien = $this->giangVienRepository->find($id);
        if (empty($giangVien)) {
            return redirect()->back()->with('status', config('langVN.find_err'));
        }
        $update = $this->giangVienRepository->update($param, $id);
        if ($update) {
            return redirect('/admin/giang-vien/')->with('status', config('langVN.update.success'));
        }

        return redirect('/admin/giang-vien/')->with('status', config('langVN.update.failed'));
    }

    /**
     * Controller charge salary to teacher
     *
     * @param Request $request
     * @param int $id of teacher
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function chargeSalary(Request $request, $id)
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/giang-vien')->with('status', config('langVN.permission.err'));
        }

        $giangVien = $this->giangVienRepository->find($id);
        if (empty($giangVien)) {
            return redirect('/admin/giang-vien')->with('status', config('langVN.find_err'));
        }
        $param = $request->all();
        $charge = $this->giangVienRepository->chargeSalary($param, $id);
        if ($charge) {
            return redirect()->back()->with('status', config('langVN.charge_salary.success'));
        }

        return redirect()->back()->with('status', config('langVN.charge_salary.failed'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GiangVien  $giangVien
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $giangVien = $this->giangVienRepository->search($request->all());
        return view('admin.pages.giangvien.index', compact('giangVien'));
    }

    /**
     * Function controller export salary of teacher
     *
     * @param Request $request
     * @param integer $id of teacher
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportSalary(Request $request, $id)
    {
        $giangVien = $this->giangVienRepository->find($id);
        if (empty($giangVien)) {
            return redirect()->back()->with('status', config('langVN.find_err'));
        }

        return Excel::download(new SalaryExport($giangVien->id), 'Danh sách bảng luong của ' . $giangVien->ten . '.xlsx');
    }
}
