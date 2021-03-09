<?php


namespace App\Repositories\QuaTrinhHoc;


use App\Models\QuaTrinhHoc;
use App\Repositories\Eloquent\EloquentRepository;

class QuaTrinhHocEloquentRepository extends EloquentRepository implements QuaTrinhHocRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return QuaTrinhHoc::class;
    }
}
