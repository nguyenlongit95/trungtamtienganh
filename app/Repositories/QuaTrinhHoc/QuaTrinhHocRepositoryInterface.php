<?php


namespace App\Repositories\QuaTrinhHoc;


interface QuaTrinhHocRepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function listOfStudent($id);

    /**
     * @param $id int of qua trinh hoc
     * @param $param array
     * @return mixed
     */
    public function mark($id, $param);

    /**
     * @param $id
     * @return mixed
     */
    public function listMarkOfStudent($id);

    /**
     * @param $listMark
     * @return mixed
     */
    public function classification($listMark);

    /**
     * @param $param
     * @return mixed
     */
    public function addTuition($param);
}
