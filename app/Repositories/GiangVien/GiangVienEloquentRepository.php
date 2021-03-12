<?php


namespace App\Repositories\GiangVien;


use App\Models\GiangVien;
use App\Repositories\Eloquent\EloquentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GiangVienEloquentRepository extends EloquentRepository implements GiangVienRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return GiangVien::class;
    }

    /**
     * Function list all giang vien and join table mon_hoc
     *
     * @return mixed
     */
    public function listGiangVien()
    {
        $giangVien = GiangVien::join('mon_hoc', 'giang_vien.ma_mon_hoc', 'mon_hoc.id')
            ->select(
                'giang_vien.id', 'giang_vien.ten', 'giang_vien.tuoi', 'giang_vien.dia_chi', 'giang_vien.truong_dai_hoc',
                'giang_vien.so_dien_thoai', 'mon_hoc.ten as mon_hoc', 'giang_vien.created_at'
            )->orderBy('id', 'DESC')->paginate(config('const.paginate'));

        return $giangVien;
    }

    public function search($param)
    {
        $giangVien = GiangVien::join('mon_hoc', 'giang_vien.ma_mon_hoc', 'mon_hoc.id')
            ->where(function ($query) use ($param) {
                $query->where('giang_vien.ten', 'like', '%'.$param['ten'].'%');
            })->select(
                'giang_vien.id', 'giang_vien.ten', 'giang_vien.tuoi', 'giang_vien.dia_chi', 'giang_vien.truong_dai_hoc',
                'giang_vien.so_dien_thoai', 'mon_hoc.ten as mon_hoc', 'giang_vien.created_at'
            )->orderBy('id', 'DESC')->paginate(config('const.paginate'));

        return $giangVien;
    }

    /**
     * Function list all salary
     *
     * @param int $id of giang vien
     * @return mixed
     * @throws \Exception
     */
    public function getSalary($id)
    {
        $luong = DB::table('luong_giang_vien')->where('ma_giang_vien', $id)->orderBy('id', 'DESC')
            ->paginate(config('const.paginate'));
        if (!empty($luong)) {
            foreach ($luong as $value) {
                $time = new Carbon($value->ngay_tra_luong);
                $value->ngay_tra_luong = $time->format('Y-m-d');
            }
        }

        return $luong;
    }

    /**
     * Function charge salary to teacher
     *
     * @param $param
     * @param $id
     * @return mixed
     */
    public function chargeSalary($param, $id)
    {
        try {
            return DB::table('luong_giang_vien')->insert([
                'ma_giang_vien' => $id,
                'ngay_tra_luong' => $param['ngay_tra_luong'],
                'luong' => $param['luong'],
            ]);
        } catch (\Exception $exception) {
            Log::error($exception);
        }

    }
}
