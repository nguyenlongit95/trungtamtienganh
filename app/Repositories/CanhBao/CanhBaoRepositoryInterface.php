<?php


namespace App\Repositories\CanhBao;


interface CanhBaoRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getCanhBao();

    public function search($param);
}
