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
                        <h1 class="m-0 text-dark">Quản lý học phí</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
{{--                        <form action="{{ url('/admin/hoc-phi/export') }}" method="post" enctype="multipart/form-data">--}}
{{--                            <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                            <div class="col-md-5 float-left">--}}
{{--                                <div class="col-md-3 float-left padding-top-10">--}}
{{--                                    <label for="start-time" class="float-left">Từ ngày</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-9 float-right">--}}
{{--                                    <input type="date" required class="form-control" id="start-time" name="start_time" value="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-5 float-left">--}}
{{--                                <div class="col-md-3 float-left padding-top-10">--}}
{{--                                    <label for="end-time" class="float-left">Đến ngày</label>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-9 float-left">--}}
{{--                                    <input type="date" required class="form-control" id="end-time" name="end_time" value="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-2 float-right">--}}
{{--                                <input type="submit" class="btn btn-warning" value="Xuất học phí">--}}
{{--                            </div>--}}
{{--                        </form>--}}
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="col-12">
            @include('admin.layouts.errors')
        </div>

        <section class="content">
            <div class="col-12 float-left">
                <div class="col-12 float-left">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách học phí</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/hoc-phi/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 350px;">
                                        <input type="text" name="lop_hoc" class="form-control float-right" placeholder="Tên lớp">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                    </div>
                </div>
                <div class="col-12 float-left">
                    <div class="row">
                        <div class="col-2">Tên lớp</div>
                        <div class="col-2">Mã lớp</div>
                        <div class="col-2">Số học viên</div>
                        <div class="col-2">Số buổi học</div>
                        <div class="col-2">Học phí theo buổi</div>
                        <div class="col-2">Chiết khấu</div>
                    </div>
                    <br>
                    @if(!empty($lopHoc))
                        @foreach($lopHoc as $value)
                            <div class="row" data-toggle="collapse" data-target="#lop_hoc_{{ $value->id }}" style="background: white; line-height: 55px; margin-top: 5px;">
                                <div class="col-2">{{ $value->ten_lop }}</div>
                                <div class="col-2">{{ $value->ma_lop }}</div>
                                <div class="col-2">{{ $value->so_hoc_vien }}</div>
                                <div class="col-2">{{ $value->so_buoi_hoc }}</div>
                                <div class="col-2">{{ number_format($value->hoc_phi, 0) }}</div>
                                <div class="col-2">
                                    <button data-toggle="collapse" data-target="#lop_hoc_{{ $value->id }}" class="btn btn-secondary">Xem chiết khấu</button>
                                </div>
                            </div>
                            <div class="card-body collapse row" data-toggle="collapse" aria-expanded="false" id="lop_hoc_{{ $value->id }}">
                                @if(!empty($chietKhau))
                                    @foreach($chietKhau as $ck)
                                        @if($ck->ma_lop_hoc === $value->id)
                                        <form action="{{ url('/admin/hoc-phi/chinh-sua-chiet-khau/' . $ck->id) }}" method="POST" style="width: 100%; margin-top: 10px;">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="col-4 float-left">
                                                <label for="so_buoi_hoc">Số buổi học <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="so_buoi_hoc" id="so_buoi_hoc" value="{{ $ck->so_buoi_hoc }}">
                                            </div>
                                            <div class="col-4 float-left">
                                                <label for="so_buoi_hoc">Chiết khấu theo số buổi tính theo (%) <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="chiet_khau" id="chiet_khau" value="{{ $ck->chiet_khau }}">
                                            </div>
                                            <div class="col-2 float-left">
                                                <label for="create-chiet-khau">Click vào nút để thêm <span class="text-danger">*</span></label><br>
                                                <input type="submit" class="btn btn-warning" id="create-chiet-khau" value="Chỉnh sửa">
                                            </div>
                                            <div class="col-2 float-left">
                                                <label for="create-chiet-khau">Click vào nút để xoá <span class="text-danger">*</span></label><br>
                                                <a href="{{ url('/admin/hoc-phi/xoa-chiet-khau/' . $ck->id) }}" class="btn btn-danger">Xoá</a>
                                            </div>
                                        </form>
                                        @endif
                                    @endforeach
                                @endif

                                <div class="clear-fix" style="height: 2px; width: 100%; margin-top: 35px;"></div>
                                <form action="{{ url('/admin/hoc-phi/them-chiet-khau/' . $value->id) }}" method="POST" style="width: 100%">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-5 float-left">
                                        <label for="so_buoi_hoc">Số buổi học <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="so_buoi_hoc" id="so_buoi_hoc" placeholder="9">
                                    </div>
                                    <div class="col-5 float-left">
                                        <label for="so_buoi_hoc">Chiết khấu theo số buổi tính theo (%) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="chiet_khau" id="chiet_khau" placeholder="9">
                                    </div>
                                    <div class="col-2 float-left">
                                        <label for="create-chiet-khau" class="text-danger">Click vào nút để thêm *</label><br>
                                        <input type="submit" class="btn btn-primary" id="create-chiet-khau" value="Thêm giá trị chiết khấu">
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="paginate float-right">
                        @if(!empty($lopHoc))
                            {!! $lopHoc->appends($_GET)->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
    <style>
        .padding-top-10 {
            padding-top: 10px;
        }
    </style>
@endsection
