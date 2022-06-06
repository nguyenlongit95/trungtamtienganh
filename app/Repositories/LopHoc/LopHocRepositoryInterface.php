<?php


namespace App\Repositories\LopHoc;


interface LopHocRepositoryInterface
{
    /**
     * @param $param
     * @return mixed
     */
    public function search($param);

    /**
     * @param int $id id cua lop hoc
     * @return mixed
     */
    public function listQuaTrinhHoc($id);

    /**
     * @param $id int of student
     * @param $lopHoc int id of class
     * @return mixed
     */
    public function checkStudentExits($id, $lopHoc);

    /**
     * @param $lopHoc
     * @return mixed
     */
    public function checkMaxStudent($lopHoc);

    /**
     * @param $idMonHoc
     * @return mixed
     */
    public function listAllLopHoc($idMonHoc);
}
