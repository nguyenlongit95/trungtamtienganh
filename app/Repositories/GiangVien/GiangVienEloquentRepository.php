<?php


namespace App\Repositories\GiangVien;


use App\Models\GiangVien;
use App\Repositories\Eloquent\EloquentRepository;

class GiangVienEloquentRepository extends EloquentRepository implements GiangVienRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return GiangVien::class;
    }
}
