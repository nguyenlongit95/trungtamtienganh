<?php


namespace App\Repositories\HocVien;


interface HocVienRepositoryInterface
{
    /**
     * @param $param
     *
     * @return mixed
     */
    public function search($param);

    /**
     * @param $id
     * @return mixed
     */
    public function listHocPhi($id);
}
