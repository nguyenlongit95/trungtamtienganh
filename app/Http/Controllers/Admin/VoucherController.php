<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Voucher\VoucherRepositoryInterface;
use App\Validations\Validation;
use App\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    /**
     * @var VoucherRepositoryInterface
     */
    private $voucherRepository;

    /**
     * VoucherController constructor.
     * @param VoucherRepositoryInterface $voucherRepository
     */
    public function __construct(VoucherRepositoryInterface $voucherRepository)
    {
        $this->voucherRepository = $voucherRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voucher = $this->voucherRepository->getAll(config('const.paginate'), 'DESC');
        return view('admin.pages.voucher.index', compact('voucher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/voucher')->with('status', config('langVN.permission.err'));
        }

        return view('admin.pages.voucher.create');
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
            return redirect('/admin/voucher')->with('status', config('langVN.permission.err'));
        }

        Validation::validationVoucher($request);
        $param = $request->all();
        $checkVoucherAlready = $this->voucherRepository->checkVoucherAlready($param);
        if ($checkVoucherAlready === false) {
            return redirect('/admin/voucher/create')->with('status', config('langVN.voucher.already'));
        }

        $param['trang_thai_su_dung'] = 0;
        $create = $this->voucherRepository->create($param);
        if ($create) {
            return redirect('/admin/voucher/')->with('status', config('langVN.voucher.create_success'));
        }

        return redirect('/admin/voucher/')->with('status', config('langVN.voucher.create_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voucher  $id
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->role != 0) {
            return redirect('/admin/voucher')->with('status', config('langVN.permission.err'));
        }

        $voucher = $this->voucherRepository->find($id);
        if (empty($voucher)) {
            return redirect('/admin/voucher/')->with('status', config('langVN.voucher.delete_failed'));
        }

        $destroy = $this->voucherRepository->delete($id);
        if ($destroy) {
            return redirect('/admin/voucher/')->with('status', config('langVN.voucher.delete_success'));
        }

        return redirect('/admin/voucher/')->with('status', config('langVN.voucher.delete_failed'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $param = $request->all();
        $voucher = $this->voucherRepository->search($param);

        return view('admin.pages.voucher.index', compact('voucher'));
    }
}
