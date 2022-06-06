<?php


namespace App\Repositories\MonHoc;


interface MonHocRepositoryInterface
{
    /**
     * @param $param
     * @return mixed
     */
    public function search($param);

    /**
     * @return mixed
     */
    public function listAllMH();
}
