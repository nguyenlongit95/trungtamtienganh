<?php

namespace App\Exports;

use App\Models\LopHoc;
use App\Models\QuaTrinhHoc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClassStudentExport implements FromCollection, WithHeadings
{
    /**
     * @var int id of lop_hoc
     */
    private $id;

    /**
     * ClassStudentExport constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Function get data sql qua_trinh_hoc
     *  trinh_trang_hoc: 1: tốt 2: trung bình 3: không tốt
     * @param int $id of qua_trinh_hoc
     * @return |null
     */
    public function collection()
    {
        $lopHoc = LopHoc::find($this->id);

        if (empty($lopHoc)) {
            return null;
        }

        $quaTrinhHoc = QuaTrinhHoc::join('hoc_vien', 'qua_trinh_hoc.ma_hoc_vien', 'hoc_vien.id')
            ->join('lop_hoc', 'qua_trinh_hoc.ma_lop_hoc', 'lop_hoc.id')
            ->leftJoin('diem_so', 'qua_trinh_hoc.id', 'diem_so.ma_qua_trinh_hoc')
            ->where('qua_trinh_hoc.ma_lop_hoc', $lopHoc->id)
            ->select(
                'hoc_vien.id','hoc_vien.ten', 'hoc_vien.tuoi',
                'lop_hoc.ten_lop', 'lop_hoc.ma_lop',
                'qua_trinh_hoc.thoi_gian_hoc', 'qua_trinh_hoc.thong_tin', 'qua_trinh_hoc.tinh_trang_hoc',
                'hoc_vien.email', 'hoc_vien.so_dien_thoai',
                'diem_so.diem'
            )->get();

        if (!empty($quaTrinhHoc)) {
            foreach ($quaTrinhHoc as $value) {
                if ($value->tinh_trang_hoc === 1) {
                    $value->tinh_trang_hoc = "Tốt";
                }
                if ($value->tinh_trang_hoc === 2) {
                    $value->tinh_trang_hoc = "Trung bình";
                }
                if ($value->tinh_trang_hoc === 3) {
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
            'Mã học viên',
            'Tên học viên',
            'Tuổi',
            'Lớp học',
            'Mã lớp',
            'Thời gian học',
            'Thông tin học viên',
            'Tình trạng học',
            'Email học viên',
            'Số điện thoại',
            'Điểm',
        ];
    }
}
