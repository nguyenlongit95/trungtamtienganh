@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/CustomStyle.css') }}">
    <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Thêm mới cảnh báo học viên</h1>
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
                <form action="{{ url('/admin/canh-bao/add') }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="ma-hoc-vien">Chọn học viên</label> <span class="text-danger">*</span>
                                    <select name="ma_hoc_vien" id="ma-hoc-vien" class="form-control" multiple>
                                        @if(!empty($hocVien))
                                            @foreach($hocVien as $value)
                                                <option value="{{ $value->id }}"> {{ $value->ten }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="loai-canh-bao">Loại cảnh báo</label> <span class="text-danger">*</span>
                                    <!-- 1: Nghỉ học, 2: Điểm thấp 3: Không làm bài tập 4: Không tập trung	-->
                                    <select name="loai_canh_bao" class="form-control" id="loai-canh-bao">
                                        <option value="1">Nghỉ học</option>
                                        <option value="2">Điểm thấp</option>
                                        <option value="3">Không làm bài tập</option>
                                        <option value="4">Không tập trung</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="noi-dung-canh-bao">noi_dung_canh_bao</label> <span class="text-danger">*</span>
                                    <textarea name="noi_dung_canh_bao" class="form-control" id="noi-dung-canh-bao" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="thoi-gian-canh-bao">Thời gian cảnh báo</label> <span class="text-danger">*</span>
                                    <input type="date" id="thoi-gian-canh-bao" name="thoi_gian_canh_bao" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Thêm mới)</span> để thêm mới cảnh báo cho học viên.</p>
                                <div class="card-footer">
                                    <input type="submit" name="create" class="btn btn-primary float-right" value="Thêm mới">
                                </div>
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
