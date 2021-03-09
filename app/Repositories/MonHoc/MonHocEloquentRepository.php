<?php


namespace App\Repositories\MonHoc;


use App\Models\MonHoc;
use App\Repositories\Eloquent\EloquentRepository;

class MonHocEloquentRepository extends EloquentRepository implements MonHocRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return MonHoc::class;
    }
}
