<?php

namespace App\Repositories\MonHoc;

use App\Models\MonHoc;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

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

    /**
     * Sql function list all mon_hoc
     *
     * @return mixed
     */
    public function listAllMH()
    {
        return DB::table('mon_hoc')->orderBy('id', 'ASC')->get();
    }
}
