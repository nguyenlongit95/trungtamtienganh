@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/CustomStyle.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm mới lớp học</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="col-12">
            @include('admin.layouts.errors')
        </div>

        <section class="content">
            <div class="col-12 float-left">
                <form action="{{ url('/admin/lop-hoc/add') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-8 float-left">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin cơ bản</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <div class="form-group">
                                    <label for="ten">Tên lớp</label> <span class="text-danger">*</span>
                                    <input type="text" id="ten" name="ten_lop" class="form-control" placeholder="Tên lớp học">
                                </div>
                                <div class="form-group">
                                    <label for="ma-lop">Mã lớp</label> <span class="text-danger">*</span>
                                    <input type="text" id="ma-lop" name="ma_lop" class="form-control" placeholder="Mã lớp học">
                                </div>
                                <div class="form-group">
                                    <label for="ma-mon-hoc">Môn học</label> <span class="text-danger">*</span>
                                    <select name="ma_mon_hoc" id="ma-mon-hoc" class="form-control">
                                        @if(!empty($monHoc))
                                            @foreach($monHoc as $mH)
                                            <option value="{{ $mH->id }}">{{ $mH->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ma-giang-vien">Giảng viên</label> <span class="text-danger">*</span>
                                    <select name="ma_giang_vien" id="ma-giang-vien" class="form-control">
                                        @if(!empty($giangVien))
                                            @foreach($giangVien as $gV)
                                        <option value="{{ $gV->id }}">{{ $gV->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thoi-gian-bat-dau">Ngày bắt đầu</label> <span class="text-danger">*</span>
                                    <input type="date" id="thoi-gian-bat-dau" name="thoi_gian_bat_dau" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="thoi-gian-ket-thuc">Ngày kết thúc</label> <span class="text-danger">*</span>
                                    <input type="date" id="thoi-gian-ket-thuc" name="thoi_gian_ket_thuc" class="form-control" placeholder="">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Thêm mới)</span> để thêm mới học viên.</p>
                                <p>- Số buổi học sẽ được nhập dựa trên ngày bắt đầu, ngày kết thúc và số ngày trong tuần.</p>
                                <p>- Quản trị viên cũng có thể nhập số lượng buổi học bằng tay.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 float-left">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin thêm</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="thong-tin">Thông tin lớp học</label>
                                    <textarea class="form-control" name="thong_tin" id="thong-tin" cols="30" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="so-hoc-vien">Số lượng học viên</label> <span class="text-danger">*</span>
                                    <input type="number" id="so-hoc-vien" name="so_hoc_vien" class="form-control" placeholder="8">
                                </div>
                                <div class="form-group">
                                    <label for="lich_hoc">Lịch học</label> <span class="text-danger">*</span>
                                    <br>
                                    <label for="thu-hai"></label>Thứ hai: <input type="checkbox" id="thu-hai" value="2" name="lich_hoc[]">
                                    <label for="thu-ba"></label>Thứ ba: <input type="checkbox" id="thu-ba" value="3" name="lich_hoc[]">
                                    <label for="thu-tu"></label>Thứ tư: <input type="checkbox" id="thu-tu" value="4" name="lich_hoc[]">
                                    <label for="thu-nam"></label>Thứ năm: <input type="checkbox" id="thu-nam" value="5" name="lich_hoc[]">
                                    <br>
                                    <label for="thu-sau"></label>Thứ sáu: <input type="checkbox" id="thu-sau" value="6" name="lich_hoc[]">
                                    <label for="thu-bay"></label>Thứ bảy: <input type="checkbox" id="thu-bay" value="7" name="lich_hoc[]">
                                    <label for="chu-nhat"></label>Chủ nhật: <input type="checkbox" id="chu-nhat" value="8" name="lich_hoc[]">
                                </div>
                                <div class="form-group">
                                    <label for="so-buoi-hoc">Số buổi học:</label> <span class="text-danger">*</span>
                                    <input type="text" id="so-buoi-hoc" name="so_buoi_hoc" class="form-control" placeholder="1">
                                </div>
                                <div class="form-group">
                                    <label for="gio-bat-dau">Giờ lên lớp</label> <span class="text-danger">*</span>
                                    <input type="time" id="gio-bat-dau" name="gio_vao_lop" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="gio-ket-thuc">Giờ tan lớp</label> <span class="text-danger">*</span>
                                    <input type="time" id="gio-ket-thuc" name="gio_tan_lop" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="hoc-phi">Học phí / 1 buổi (vnd)</label> <span class="text-danger">*</span>
                                    <input type="number" id="hoc-phi" name="hoc_phi" class="form-control" placeholder="800000">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" name="create" class="btn btn-primary float-right" value="Thêm mới">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
@endsection
