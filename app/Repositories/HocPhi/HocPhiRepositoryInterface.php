<?php


namespace App\Repositories\HocPhi;


interface HocPhiRepositoryInterface
{
    /**
     * @return mixed
     */
    public function listHocPhi();

    /**
     * @param $param
     * @return mixed
     */
    public function search($param);

    /**
     * @param $voucher
     * @return mixed
     */
    public function applyVoucher($voucher, $id);

    /**
     * @param $voucher
     * @return mixed
     */
    public function changeSttVoucher($voucher);
}
