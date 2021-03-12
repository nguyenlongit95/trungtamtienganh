<?php


namespace App\Repositories\QuaTrinhHoc;


use App\Models\HocPhi;
use App\Models\LopHoc;
use App\Models\MonHoc;
use App\Models\QuaTrinhHoc;
use App\Repositories\Eloquent\EloquentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuaTrinhHocEloquentRepository extends EloquentRepository implements QuaTrinhHocRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return QuaTrinhHoc::class;
    }

    /**
     * Function list all qua trinh hoc of an student
     *
     * @param $id
     * @return mixed
     */
    public function listOfStudent($id)
    {
        $quaTrinhHoc = QuaTrinhHoc::where('ma_hoc_vien', $id)->orderBy('id', 'DESC')->paginate(config('const.paginate'));
        if (empty($quaTrinhHoc)) {
            return null;
        }
        foreach ($quaTrinhHoc as $value) {
            $maMM = MonHoc::find($value->ma_mon_hoc);
            $value->mon_hoc = $maMM->ten;
            $lophoc = LopHoc::find($value->ma_lop_hoc);
            $value->lop_hoc = $lophoc->ten_lop;
        }

        return $quaTrinhHoc;
    }

    /**
     * Function mark score an student
     *
     * @param $id int of qua trinh hoc
     * @param $param array
     * @return mixed
     */
    public function mark($id, $param)
    {
        return DB::table('diem_so')->insert([
            'ma_qua_trinh_hoc' => $id,
            'thoi_gian' => $param['thoi_gian'],
            'diem' => $param['diem'],
        ]);
    }

    /**
     * Function list all mark of student
     *
     * @param int $id id of qua trinh hoc
     * @return \Illuminate\Support\Collection|mixed
     * @throws \Exception
     */
    public function listMarkOfStudent($id)
    {
        $listMark = DB::table('diem_so')->where('ma_qua_trinh_hoc', $id)
            ->orderBy('id', 'DESC')->get();
        if (!empty($listMark)) {
            foreach ($listMark as $mark) {
                $time = new Carbon($mark->thoi_gian);
                $mark->time = $time->format('Y-m-d');
            }
        }

        return $listMark;
    }

    /**
     * Function classification an student using list score param
     *
     * @param $listMark
     * @return mixed
     */
    public function classification($listMark)
    {
        $classification = [];
        if (empty($listMark)) {
            $classification['avg'] = 0;
            $classification['rank'] = 'Chưa đánh giá';
        }
        $countScore = count($listMark);
        $totalScore = 0;
        foreach ($listMark as $mark) {
            $totalScore = $totalScore + $mark->diem;
        }
        $classification['avg'] = number_format($totalScore / $countScore, 1);
        $classification['rank'] = $this->_renderRank($totalScore / $countScore);

        return $classification;
    }

    /**
     * Function add tuition student
     *
     * @param array $param
     * @return bool|mixed
     */
    public function addTuition($param)
    {
        $lopHoc = LopHoc::find($param['ma_lop_hoc']);
        $hocPhi = new HocPhi();
        $hocPhi->ma_hoc_vien = $param['ma_hoc_vien'];
        $hocPhi->ma_lop_hoc = $param['ma_lop_hoc'];
        $hocPhi->hoc_phi = $lopHoc->hoc_phi;
        $hocPhi->tinh_trang_nop_hoc_phi = 0;
        $hocPhi->ngay_nop_hoc_phi = null;
        try {
            $hocPhi->save();
            return true;
        } catch (\Exception $exception) {
            Log::error($exception);
        }
    }

    /**
     * Private function render rank an student
     *
     * @param double $avg of score
     * @return string
     */
    private function _renderRank($avg)
    {
        if ($avg >= 0 && $avg < 5) {
            return "D";
        } elseif ($avg >= 5 && $avg < 7) {
            return "C";
        } elseif ($avg >= 7 && $avg < 8) {
            return "B";
        } elseif($avg >= 8 && $avg <= 10) {
            return "A";
        } else {
            return '-';
        }
    }
}
