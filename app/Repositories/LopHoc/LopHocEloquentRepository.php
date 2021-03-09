<?php


namespace App\Repositories\LopHoc;


use App\Models\LopHoc;
use App\Repositories\Eloquent\EloquentRepository;

class LopHocEloquentRepository extends EloquentRepository implements LopHocRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return LopHoc::class;
    }
}
