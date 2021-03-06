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
}
