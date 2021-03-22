<?php

namespace App\Exports;

use App\Models\GiangVien;
use App\models\LuongGiangVien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalaryExport implements FromCollection, WithHeadings
{
    /**
     * @var int id of giang vien
     */
    private $id;

    /**
     * SalaryExport constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Function sql get data salary of teacher
     *
     *  using integer id of teacher
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $salary = GiangVien::join('luong_giang_vien', 'giang_vien.id', 'luong_giang_vien.ma_giang_vien')
            ->where('giang_vien.id', $this->id)
            ->select(
                'giang_vien.id', 'giang_vien.ten', 'giang_vien.tuoi', 'giang_vien.dia_chi', 'giang_vien.so_dien_thoai',
                'luong_giang_vien.ngay_tra_luong', 'luong_giang_vien.luong'
            )->get();

        return $salary;
    }

    /**
     * Add heading column
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Mã giảng viên',
            'Tên',
            'Tuổi',
            'Địa chỉ',
            'Số điện thoại',
            'Ngày trả lương',
            'Lương',
        ];
    }
}
