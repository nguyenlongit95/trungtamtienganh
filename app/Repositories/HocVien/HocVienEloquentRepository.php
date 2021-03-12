<?php


namespace App\Repositories\HocVien;


use App\Models\HocPhi;
use App\Models\HocVien;
use App\Models\LopHoc;
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

    /**
     * search function
     *
     * @param $param
     * @return mixed
     */
    public function search($param)
    {
        $query = HocVien::on();
        if (isset($param['ten']) && $param['ten'] !== null) {
            $query->where('ten', 'like', '%'. $param['ten'] . '%');
        }

        return $query->paginate(config('const.paginate'));
    }

    /**
     * Function list hoc phi
     *
     * @param int $id of student
     * @return mixed
     */
    public function listHocPhi($id)
    {
        $hocPhi = HocPhi::where('ma_hoc_vien', $id)->whereNull('deleted_at')->orderBy('id', 'DESC')->get();
        if (!empty($hocPhi)) {
            foreach ($hocPhi as $value) {
                $lopHoc = LopHoc::find($value->ma_lop_hoc);
                $value->lop_hoc = $lopHoc->ten_lop;
            }
        }

        return $hocPhi;
    }
}
