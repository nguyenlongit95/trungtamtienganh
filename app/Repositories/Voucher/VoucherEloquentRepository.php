<?php


namespace App\Repositories\Voucher;


use App\Models\Voucher;
use App\Repositories\Eloquent\EloquentRepository;

class VoucherEloquentRepository extends EloquentRepository implements VoucherRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Voucher::class;
    }

    /**
     * Function check voucher has already in system
     *
     * @param array $param
     * @return mixed
     */
    public function checkVoucherAlready($param)
    {
        $checkVoucher = Voucher::where('ma_voucher', $param['ma_voucher'])->count();
        if ($checkVoucher > 0) {
            return false;
        }

        return true;
    }

    /**
     * Function search voucher using ten or ma_voucher
     *
     * @param array $param
     * @return mixed
     */
    public function search($param)
    {
        $voucher = Voucher::on();
        if (isset($param['ten']) && $param['ten'] !== null) {
            $voucher->where('ten', 'like', '%' . $param['ten'] . '%');
        }
        if (isset($param['ma_voucher']) && $param['ma_voucher'] !== null) {
            $voucher->where('ma_voucher', 'like', '%' . $param['ma_voucher'] . '%');
        }

        return $voucher->paginate(config('const.paginate'));
    }
}
