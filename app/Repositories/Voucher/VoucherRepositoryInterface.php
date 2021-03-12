<?php


namespace App\Repositories\Voucher;


interface VoucherRepositoryInterface
{
    /**
     * @param array $param
     * @return mixed
     */
    public function checkVoucherAlready($param);

    /**
     * @param $param
     * @return mixed
     */
    public function search($param);
}
