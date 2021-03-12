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

    /**
     * Function get all canh bao and join table hoc_vien
     *
     * @return mixed
     */
    public function getCanhBao()
    {
        $canhBao = CanhBao::join('hoc_vien', 'canh_bao.ma_hoc_vien', 'hoc_vien.id')->select(
            'canh_bao.loai_canh_bao', 'canh_bao.noi_dung_canh_bao', 'canh_bao.thoi_gian_canh_bao',
            'canh_bao.tinh_trang_canh_bao', 'hoc_vien.ten', 'canh_bao.id'
        )->orderBy('id', 'DESC')->paginate(config('const.paginate'));

        return $canhBao;
    }

    /**
     * Function search canh bao using ten hoc_vien
     *
     * @param array $param
     * @return mixed
     */
    public function search($param)
    {
        $canhBao = CanhBao::join('hoc_vien', 'canh_bao.ma_hoc_vien', 'hoc_vien.id')->select(
            'canh_bao.loai_canh_bao', 'canh_bao.noi_dung_canh_bao', 'canh_bao.thoi_gian_canh_bao',
            'canh_bao.tinh_trang_canh_bao', 'hoc_vien.ten', 'canh_bao.id'
        )->where(function ($query) use ($param) {
            if (isset($param['ten']) && $param['ten'] !== null) {
                $query->where('hoc_vien.ten', 'like', '%' . $param['ten'] . '%');
            }
        })->orderBy('id', 'DESC')->paginate(config('const.paginate'));

        return $canhBao;
    }
}
