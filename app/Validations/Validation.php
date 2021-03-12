<?php

namespace App\Validations;

class Validation
{
    /**
     * Function validate course level source
     *
     * @param $request
     */
    public static function validationHocVien($request)
    {
        $request->validate([
            'ten' => 'required',
            'tuoi' => 'required',
            'email' => 'required',
            'dia_chi' => 'required',
            'so_dien_thoai' => 'required',
        ], [
            'ten.required' => 'Hãy nhập tên học viên',
            'tuoi.required' => 'Hãy nhập tuổi học viên',
            'email.required' => 'Nhập Email của học viên',
            'dia_chi.required' => 'Nhập thông tin địa chỉ của học viên',
            'so_dien_thoai.required' => 'Nhập số điện thoại của học viên',
        ]);
    }

    public static function validationMonHoc($request)
    {
        $request->validate([
            'ten' => 'required',
            'ma_mon_hoc' => 'required',
        ], [
            'ten.required' => 'Hãy nhập tên môn học',
            'ma_mon_hoc.required' => 'Hãy nhập mã môn học',
        ]);
    }

    public static function validationLophoc($request)
    {
        $request->validate([
            'ten_lop' => 'required',
            'ma_lop' => 'required',
            'thong_tin' => 'required',
            'ma_mon_hoc' => 'required',
            'ma_giang_vien' => 'required',
            'so_hoc_vien' => 'required',
            'thoi_gian_bat_dau' => 'required',
            'thoi_gian_ket_thuc' => 'required',
            'lich_hoc' => 'required',
            'hoc_phi' => 'required',
        ], [
            'ten_lop.required' => 'Hãy nhập tên lớp',
            'ma_lop.required' => 'Hãy nhập mã lớp',
            'thong_tin.required' => 'Hãy nhập thông tin lớp học',
            'ma_mon_hoc.required' => 'Hãy chọn môn học của lớp',
            'ma_giang_vien.required' => 'hãy chọn giảng viên cho lớp',
            'so_hoc_vien.required' => 'Nhập số lượng học viên tối đa của lớp',
            'thoi_gian_bat_dau.required' => 'Nhập thời gian bắt đầu lớp học',
            'thoi_gian_ket_thuc.required' => 'Nhập thời gian kết thúc của lớp',
            'lich_hoc.required' => 'Đặt lịch học cho lớp',
            'hoc_phi.required' => 'Nhập học phí của lớp',
        ]);
    }

    public static function validationGiangVien($request)
    {
        $request->validate([
            'ten' => 'required',
            'tuoi' => 'required',
            'dia_chi' => 'required',
            'ma_mon_hoc' => 'required',
            'truong_dai_hoc' => 'required',
            'so_dien_thoai' => 'required',
        ], [
            'ten.required' => 'Nhập tên giảng viên.',
            'tuoi.required' => 'Nhập tuổi giảng viên',
            'dia_chi.required' => 'Nhập địa chỉ của giảng viên',
            'ma_mon_hoc.required' => 'Chọn môn học giảng viên phụ trách',
            'truong_dai_hoc.required' => 'Nhập trường đại học của giảng viên đã theo học.',
            'so_dien_thoai.required' => 'Nhập số điện thoại của giảng viên.',
        ]);
    }

    public static function validationVoucher($request)
    {
        $request->validate([
            'ten' => 'required',
            'ma_voucher' => 'required',
            'giam_gia' => 'required',
            'thoi_gian_het_han' => 'required',
        ], [
            'ten.required' => 'Nhập tên của mã khuyến mại.',
            'ma_voucher.required' => 'Nhập mã định danh khuyến mại.',
            'giam_gia.required' => 'Nhập số tiền được giảm của mã',
            'thoi_gian_het_han.required' => 'Thời gian hết hạn không được để trống.',
        ]);
    }

    public static function validationCanhBao($request)
    {
        $request->validate([
            'ma_hoc_vien' => 'required',
            'loai_canh_bao' => 'required',
            'noi_dung_canh_bao' => 'required',
            'thoi_gian_canh_bao' => 'required',
        ], [
            'ma_hoc_vien.required' => 'Hãy chọn học viên cần cảnh báo',
            'loai_canh_bao.required' => 'Loại cảnh báo giành cho học viên đó là gì?',
            'noi_dung_canh_bao.required' => 'Nhâp nội dung cần cảnh báo',
            'thoi_gian_canh_bao.required' => 'Nhập thời gian cảnh báo với học viên này!',
        ]);
    }
}
