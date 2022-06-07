<?php


namespace App\Repositories\LopHoc;


use App\Models\LopHoc;
use App\Repositories\Eloquent\EloquentRepository;
use App\Models\QuaTrinhHoc;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LopHocEloquentRepository extends EloquentRepository implements LopHocRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return LopHoc::class;
    }

    /**
     * function search
     *
     * @param $param
     * @return mixed
     */
    public function search($param)
    {
        $lopHoc = LopHoc::on();
        if (isset($param['ten_lop']) && $param['ten_lop'] !== null) {
            $lopHoc->where('ten_lop', 'like', '%' . $param['ten_lop'] . '%');
        }
        if (isset($param['ma_lop']) && $param['ma_lop'] !== null) {
            $lopHoc->where('ma_lop', 'like', '%' . $param['ma_lop'] . '%');
        }

        return $lopHoc->paginate(config('const.paginate'));
    }

    /**
     * @param int $id id cua lop hoc
     * Tinh trang hoc: 1: tốt 2: trung bình 3: không tốt
     * @return mixed
     */
    public function listQuaTrinhHoc($id)
    {
        $quaTrinhHoc = QuaTrinhHoc::join('hoc_vien', 'qua_trinh_hoc.ma_hoc_vien', 'hoc_vien.id')
            ->join('lop_hoc', 'qua_trinh_hoc.ma_lop_hoc', 'lop_hoc.id')
            ->where('qua_trinh_hoc.ma_lop_hoc', $id)
            ->select(
                'hoc_vien.ten', 'hoc_vien.ngay_sinh', 'hoc_vien.email', 'hoc_vien.id',
                'qua_trinh_hoc.thong_tin', 'qua_trinh_hoc.tinh_trang_hoc', 'qua_trinh_hoc.id as qua_trinh_hoc_id'
            )
            ->paginate(config('const.paginate'));

        return $quaTrinhHoc;
    }

    /**
     * Function check students on class
     *
     * @param int $id of students
     * @param int $lopHoc of class
     * @return bool|mixed
     */
    public function checkStudentExits($id, $lopHoc)
    {
        $checkStudent = QuaTrinhHoc::where('ma_hoc_vien', $id)->where('ma_lop_hoc', $lopHoc->id)->count();

        if ($checkStudent > 0) {
            return false;
        }

        return true;
    }

    /**
     * Sql function check max student in class
     *
     * @param $lopHoc
     * @return boolean
     */
    public function checkMaxStudent($lopHoc)
    {
        $totalStudent = QuaTrinhHoc::where('ma_lop_hoc', $lopHoc->id)->count();
        if ($totalStudent >= $lopHoc->so_hoc_vien) {
            return false;
        }
        return true;
    }

    /**
     * Sql function list all lop_hoc using id mon_hoc
     *
     * @param int $idMonHoc
     * @return \Illuminate\Support\Collection
     */
    public function listAllLopHoc($idMonHoc)
    {
        $listLopHoc = DB::table('lop_hoc')->where('ma_mon_hoc', $idMonHoc)
            ->whereNull('deleted_at')->where('thoi_gian_ket_thuc', '>',  Carbon::now())
            ->orderBy('id', 'ASC')->get();
        if (!empty($listLopHoc)) {
            foreach ($listLopHoc as $lopHoc) {
                if ($this->checkMaxStudent($lopHoc) === false) {
                    $lopHoc->max_student = "full";
                } else {
                    $lopHoc->max_student = "ok";
                }
            }
        }
        return $listLopHoc;
    }
}
