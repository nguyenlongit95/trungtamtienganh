<?php

namespace App\Exports;

use App\Models\HocPhi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HocPhiExport implements FromCollection, WithHeadings
{
    /**
     * @var string start time and end time of record
     */
    private $startTime;
    private $endTime;

    /**
     * HocPhiExport constructor.
     * @param $startTime
     * @param $endTime
     */
    public function __construct($startTime, $endTime)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    /**
     * Sql function get data nuitiion all student using time check
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $hocPhi = HocPhi::join('hoc_vien', 'hoc_phi.ma_hoc_vien', 'hoc_vien.id')
            ->join('lop_hoc', 'hoc_phi.ma_lop_hoc', 'lop_hoc.id')
            ->whereDate('hoc_phi.ngay_nop_hoc_phi', '>=', $this->startTime)
            ->whereDate('hoc_phi.ngay_nop_hoc_phi', '<=', $this->endTime)
            ->where('hoc_phi.tinh_trang_nop_hoc_phi', 1)
            ->select(
                'hoc_phi.id', 'hoc_vien.ten', 'hoc_vien.so_dien_thoai', 'hoc_vien.email',
                'lop_hoc.ten_lop', 'lop_hoc.ma_lop',
                'hoc_phi.hoc_phi', 'hoc_phi.ngay_nop_hoc_phi'
            )->get();

        return $hocPhi;
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
            'Tên',
            'Số điện thoại',
            'Email',
            'Tên lớp',
            'Mã lớp',
            'Học phí',
            'Ngày nộp',
        ];
    }
}
