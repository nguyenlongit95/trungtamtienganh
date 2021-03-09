<?php


namespace App\Repositories\CanhBao;


use App\Models\CanhBao;
use App\Repositories\Eloquent\EloquentRepository;

class CanhBaoEloquentRepository extends EloquentRepository implements CanhBaoRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return CanhBao::class;
    }
}
