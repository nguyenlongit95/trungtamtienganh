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
                        <h1 class="m-0 text-dark">Thêm mới học viên</h1>
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
                <form action="{{ url('/admin/hoc-vien/add') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" id="ten" name="ten" class="form-control" placeholder="Tên học viên">
                                </div>
                                <div class="form-group">
                                    <label for="tuoi">Tuổi</label> <span class="text-danger">*</span>
                                    <input type="number" id="tuoi" name="tuoi" class="form-control" placeholder="18">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label> <span class="text-danger">*</span>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="dia-chi">Địa chỉ</label> <span class="text-danger">*</span>
                                    <input type="text" id="dia-chi" name="dia_chi" class="form-control" placeholder="Địa chỉ học viên">
                                </div>
                                <div class="form-group">
                                    <label for="so-dien-thoai">Số điện thoại</label> <span class="text-danger">*</span>
                                    <input type="text" id="so-dien-thoai" name="so_dien_thoai" class="form-control" placeholder="0123456789">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Thêm mới)</span> để thêm mới học viên.</p>
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
                                <label for="thong-tin">Thông tin thêm</label>
                                <textarea class="form-control" name="thong_tin" id="thong-tin" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ten-phi-huynh">Tên phụ huynh</label>
                                <input type="text" id="ten-phu-huynh" name="ten_phu_huynh" class="form-control" placeholder="Nguyễn Văn A">
                            </div>
                            <div class="form-group">
                                <label for="truong-hoc">Trường đang theo học</label>
                                <input type="text" id="truong-hoc" class="form-control" placeholder="Trường đang theo học" name="truong_hoc">
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
