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
                        <h1 class="m-0 text-dark">Thêm mới môn học</h1>
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
                <form action="{{ url('/admin/mon-hoc/add') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-12 float-left">
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
                                    <label for="ten">Tên môn học</label> <span class="text-danger">*</span>
                                    <input type="text" id="ten" name="ten" class="form-control" placeholder="Tên môn học">
                                </div>
                                <div class="form-group">
                                    <label for="ma-mon-hoc">Mã môn học</label> <span class="text-danger">*</span>
                                    <input type="text" id="ma-mon-hoc" name="ma_mon_hoc" class="form-control" placeholder="Mã môn học">
                                </div>
                                <div class="form-group">
                                    <label for="thong-tin">Thông tin môn học</label> <span class="text-danger">*</span>
                                    <textarea class="form-control" name="thong_tin" id="thong-tin" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Thêm mới)</span> để thêm mới môn học.</p>
                                <input type="submit" name="add" value="Thêm mới" class="btn btn-primary">
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
