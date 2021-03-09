<?php


namespace App\Repositories\HocVien;


use App\Models\HocVien;
use App\Repositories\Eloquent\EloquentRepository;

class HocVienEloquentRepository extends EloquentRepository implements HocVienRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return HocVien::class;
    }
}
