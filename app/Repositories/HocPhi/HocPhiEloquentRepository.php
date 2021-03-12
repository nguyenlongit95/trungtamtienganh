<?php


namespace App\Repositories\HocPhi;


use App\Models\HocPhi;
use App\Models\Voucher;
use App\Repositories\Eloquent\EloquentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class HocPhiEloquentRepository extends EloquentRepository implements HocPhiRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return HocPhi::class;
    }

    /**
     * Function list all hoc phi
     *
     * @return mixed
     * @throws \Exception
     */
    public function listHocPhi()
    {
        $hocPhi = HocPhi::join('hoc_vien', 'hoc_phi.ma_hoc_vien', 'hoc_vien.id')
            ->join('lop_hoc', 'hoc_phi.ma_lop_hoc', 'lop_hoc.id')
            ->select(
                'hoc_phi.id', 'hoc_phi.hoc_phi', 'hoc_phi.tinh_trang_nop_hoc_phi', 'hoc_phi.ngay_nop_hoc_phi',
                'hoc_vien.ten',
                'lop_hoc.ten_lop as lop_hoc'
            )->orderBy('id', 'DESC')->paginate(config('const.paginate'));

        return $this->_mergeAttr($hocPhi);
    }

    /**
     * Function search hoc phi
     *
     * @param array $param key search
     * @return mixed|void
     */
    public function search($param)
    {
        $hocPhi = HocPhi::join('hoc_vien', 'hoc_phi.ma_hoc_vien', 'hoc_vien.id')
            ->join('lop_hoc', 'hoc_phi.ma_lop_hoc', 'lop_hoc.id')
            ->select(
                'hoc_phi.id', 'hoc_phi.hoc_phi', 'hoc_phi.tinh_trang_nop_hoc_phi', 'hoc_phi.ngay_nop_hoc_phi',
                'hoc_vien.ten',
                'lop_hoc.ten_lop as lop_hoc'
            )->where(function ($query) use ($param) {
                if (isset($param['ten'])) {
                    $query->where('hoc_vien.ten', 'like', '%'.$param['ten'].'%');
                }
                if (isset($param['lop_hoc'])) {
                    $query->where('lop_hoc.ten_lop', 'like', '%'.$param['lop_hoc'].'%');
                }
            })->orderBy('id', 'DESC')->paginate(config('const.paginate'));

        return $this->_mergeAttr($hocPhi);
    }

    /**
     * @param $hocPhi
     * @return mixed
     * @throws \Exception
     */
    private function _mergeAttr($hocPhi)
    {
        if (!empty($hocPhi)) {
            foreach ($hocPhi as $value) {
                $time = new Carbon($value->ngay_nop_hoc_phi);
                $value->ngay_nop_hoc_phi = $time->format('Y-m-d');
            }
        }

        return $hocPhi;
    }

    /**
     * Function calculate hoc phi using voucher
     *
     * @param $voucher
     * @param $id
     * @return bool|float|int|mixed
     */
    public function applyVoucher($voucher, $id)
    {
        $hocPhi = HocPhi::find($id);
        $voucher = Voucher::where('ma_voucher', $voucher)->where('thoi_gian_het_han', '>=', Carbon::now())
            ->where('trang_thai_su_dung', 0)->first();
        if (empty($voucher)) {
            return false;
        }
        if ($voucher->giam_gia > 0) {
            $calHocPhi = $hocPhi->hoc_phi - ($hocPhi->hoc_phi * ($voucher->giam_gia / 100));
        } else {
            return false;
        }

        return $calHocPhi;
    }

    /**
     * Function change trang_thai_su_dung of voucher using code
     *
     * @param string $voucher code of voucher
     * @return mixed
     */
    public function changeSttVoucher($voucher)
    {
        try {
            return DB::table('voucher')->where('ma_voucher', $voucher)->update([
                'trang_thai_su_dung' => 1
            ]);
        } catch (\Exception $exception) {
            Log::error($exception);
            return false;
        }
    }
}
