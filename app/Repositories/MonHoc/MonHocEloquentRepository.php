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

    /**
     * @param $param
     * @return mixed
     */
    public function search($param)
    {
        $query = MonHoc::on();
        if (isset($param['ten']) && $param['ten'] !== null) {
            $query->where('ten', 'like', '%'.$param['ten'].'%');
        }

        return $query->paginate(config('const.paginate'));
    }
}
