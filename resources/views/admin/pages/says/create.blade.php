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
                        <h1 class="m-0 text-dark">Thêm mới nhận xét</h1>
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
                <form action="{{ url('/admin/says/store') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin nhân xét của người dùng</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="form-group">
                                <label for="ten">Tên người nhận xét</label> <span class="text-danger">*</span>
                                <input type="text" id="ten" name="ten" class="form-control" placeholder="Nguyễn Văn A">
                            </div>
                            <div class="form-group">
                                <label for="lop">Tên lớp theo học</label> <span class="text-danger">*</span>
                                <input type="text" id="lop" name="lop" class="form-control" placeholder="Tiếng Anh gì đó!">
                            </div>
                            <div class="form-group">
                                <label for="noi_dung">Nội dung nhận xét</label> <span class="text-danger">*</span>
                                <textarea name="noi_dung" class="form-control" id="noi_dung" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Hình hiển người nhận xét</label> <span class="text-danger">*</span>
                                <p>- Hình ảnh có định dạng <span class="text-danger">jpg</span> hoặc <span class="text-danger">png</span> và kích thước nhỏ hơn <span class="text-danger">2mb</span></p>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" name="create" class="btn btn-primary float-right" value="Thêm nhận xét">
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
