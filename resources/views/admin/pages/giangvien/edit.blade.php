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
                        <h1 class="m-0 text-dark">Chỉnh sửa thông tin giảng viên</h1>
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
                <form action="{{ url('/admin/giang-vien/' . $giangVien->id . '/update') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="ten">Tên</label> <span class="text-danger">*</span>
                                    <input type="text" id="ten" name="ten" class="form-control" value="{{ $giangVien->ten }}">
                                </div>
                                <div class="form-group">
                                    <label for="tuoi">Tuổi</label> <span class="text-danger">*</span>
                                    <input type="number" id="tuoi" name="tuoi" class="form-control" value="{{ $giangVien->tuoi }}">
                                </div>
                                <div class="form-group">
                                    <label for="dia-chi">Địa chỉ</label> <span class="text-danger">*</span>
                                    <input type="text" id="dia-chi" name="dia_chi" class="form-control" value="{{ $giangVien->dia_chi }}">
                                </div>
                                <div class="form-group">
                                    <label for="so-dien-thoai">Số điện thoại</label> <span class="text-danger">*</span>
                                    <input type="text" id="so-dien-thoai" name="so_dien_thoai" class="form-control" value="{{ $giangVien->so_dien_thoai }}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Chỉnh sửa)</span> để cập nhật thông tin giảng viên.</p>
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
                                    <label for="truong-dai-hoc">Trường đại học <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="truong_dai_hoc" id="truong-dai-hoc" cols="30" rows="10">{{ $giangVien->truong_dai_hoc }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ma-mon-hoc">Môn học phụ trách <span class="text-danger">*</span></label>
                                    <select name="ma_mon_hoc" class="form-control" id="ma-mon-hoc">
                                        @if(!empty($monHoc))
                                            @foreach($monHoc as $value)
                                                <option @if($value->id === $giangVien->ma_mon_hoc) selected @endif value="{{ $value->id }}">{{ $value->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" name="update" class="btn btn-primary float-right" value="Chỉnh sửa">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="col-7 float-left">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các lần trả lương</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên giảng viên</th>
                                    <th class="text-center">Ngày trả lương</th>
                                    <th class="text-center">Lương</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($luong))
                                    @foreach($luong as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $giangVien->ten }}</td>
                                            <td class="text-center">{{ $value->ngay_tra_luong }}</td>
                                            <td class="text-center">{{ $value->luong }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="text-danger">Chưa có lịch sử trả lương</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <p>- Danh sách các lần trả lương cho giảng viên này.</p>
                        </div>
                    </div>
                </div>

                <div class="col-5 float-left">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Trả lương cho giảng viên</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <form action="{{ url('/admin/giang-vien/'. $giangVien->id .'/charge-salary') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="truong-dai-hoc">Ngày trả lương <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" name="ngay_tra_luong" value="">
                                </div>
                                <div class="form-group">
                                    <label for="luong">Tiền lương <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="luong" value="">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Quản lý chọn ngày trả lương và nhập số tiền sẽ trả cho giảng viên.</p>
                                <input type="submit" name="update" class="btn btn-warning float-right" value="Trả lương">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
@endsection
