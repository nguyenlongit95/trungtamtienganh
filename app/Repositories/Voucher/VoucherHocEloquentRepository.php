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
}
