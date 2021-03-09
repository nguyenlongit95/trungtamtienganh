<?php


namespace App\Repositories\HocPhi;


use App\Models\HocPhi;
use App\Repositories\Eloquent\EloquentRepository;

class HocPhiEloquentRepository extends EloquentRepository implements HocPhiRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return HocPhi::class;
    }
}
