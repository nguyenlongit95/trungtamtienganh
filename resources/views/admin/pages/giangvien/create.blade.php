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
                        <h1 class="m-0 text-dark">Thêm mới giảng viên</h1>
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
                <form action="{{ url('/admin/giang-vien/add') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" id="ten" name="ten" class="form-control" placeholder="Tên giảng viên">
                                </div>
                                <div class="form-group">
                                    <label for="tuoi">Tuổi</label> <span class="text-danger">*</span>
                                    <input type="number" id="tuoi" name="tuoi" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="dia-chi">Địa chỉ</label> <span class="text-danger">*</span>
                                    <input type="text" id="dia-chi" name="dia_chi" class="form-control" placeholder="Địa chỉ giảng viên">
                                </div>
                                <div class="form-group">
                                    <label for="so-dien-thoai">Số điện thoại</label> <span class="text-danger">*</span>
                                    <input type="text" id="so-dien-thoai" name="so_dien_thoai" class="form-control" placeholder="0123456789">
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Thêm mới)</span> để thêm mới giảng viên.</p>
                                <p>- Thông tin giới thiệu sẽ được hiển thị lên website phía người dùng.</p>
                                <p>- Có thể cho phép giảng viên này được hiển thị lên website phía người dùng không.</p>
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
                                    <label for="truong-dai-hoc">Thông tin giới thiệu <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="truong_dai_hoc" id="truong-dai-hoc" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ma-mon-hoc">Môn học phụ trách <span class="text-danger">*</span></label>
                                    <select name="ma_mon_hoc" class="form-control" id="ma-mon-hoc">
                                        @if(!empty($monHoc))
                                            @foreach($monHoc as $value)
                                                <option value="{{ $value->id }}">{{ $value->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Hình ảnh giảng viên <span class="text-danger">*</span></label>
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                    <p>Hình ảnh lựa chọn ở mục này sẽ được hiển thị trên website (<span class="text-danger">*</span>)</p>
                                </div>
                                <div class="form-group">
                                    <label for="hien_thi">Hiển thị thông tin giảng viên lên website <span class="text-danger">*</span></label>
                                    <select name="hien_thi" id="hien_thi" class="form-control">
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Không hiển thị</option>
                                    </select>
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
