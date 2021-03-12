<?php


namespace App\Repositories\GiangVien;


interface GiangVienRepositoryInterface
{
    /**
     * @return mixed
     */
    public function listGiangVien();

    /**
     * @param $param
     * @return mixed
     */
    public function search($param);

    /**
     * @param int $id of giang vien
     * @return mixed
     */
    public function getSalary($id);

    /**
     * @param $param
     * @param $id
     * @return mixed
     */
    public function chargeSalary($param, $id);
}
