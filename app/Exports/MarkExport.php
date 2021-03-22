<?php

namespace App\Exports;

use App\Models\QuaTrinhHoc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MarkExport implements FromCollection, WithHeadings
{
    /**
     * @var int id qua_trinh_hoc an student
     */
    private $id;

    /**
     * MarkExport constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Function sql get data mark of student
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $quaTrinhHoc = QuaTrinhHoc::join('mon_hoc', 'qua_trinh_hoc.ma_mon_hoc', 'mon_hoc.id')
            ->join('diem_so', 'qua_trinh_hoc.id', 'diem_so.ma_qua_trinh_hoc')
            ->where('qua_trinh_hoc.id', $this->id)
            ->select(
                'diem_so.id', 'mon_hoc.ten', 'qua_trinh_hoc.thoi_gian_hoc', 'qua_trinh_hoc.tinh_trang_hoc',
                'diem_so.diem'
            )->get();
        if (!empty($quaTrinhHoc)) {
            foreach ($quaTrinhHoc as $value) {
                if ($value->tinh_trang_hoc == 1) {
                    $value->tinh_trang_hoc = "Tốt";
                }
                if ($value->tinh_trang_hoc == 2) {
                    $value->tinh_trang_hoc = "Trung bình";
                }
                if ($value->tinh_trang_hoc == 3) {
                    $value->tinh_trang_hoc = "Không tốt";
                }
            }
        }

        return $quaTrinhHoc;
    }

    /**
     * Add heading column
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'STT',
            'Môn học',
            'Thời gian học',
            'Tình trạng học bài',
            'Điểm',
        ];
    }
}
