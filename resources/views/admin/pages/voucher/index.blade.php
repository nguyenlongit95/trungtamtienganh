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
                        <h1 class="m-0 text-dark">Quản lý mã khuyến mại</h1>
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
                <div class="col-12 text-right">
                    <a href="{{ url('/admin/voucher/create') }}" class="btn btn-primary text-white">Thêm mã khuyến mại</a>
                </div>
                <br>
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các mã khuyến mại</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/voucher/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 350px;">
                                        <input type="text" name="ten" class="form-control float-right" placeholder="Tên voucher">
                                        <input type="text" name="ma_voucher" class="form-control float-right" placeholder="Mã voucher">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên voucher</th>
                                    <th class="text-center">Mã voucher</th>
                                    <th class="text-center">Thông tin giảm giá</th>
                                    <th class="text-center">Thời gian hết hạn</th>
                                    <th class="text-center">Tình trạng sử dụng</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($voucher))
                                    @foreach($voucher as $value)
                                        <tr>
                                            <td>{{ $value->id  }}</td>
                                            <td>{{ $value->ten }}</td>
                                            <td class="text-center">{{ $value->ma_voucher }}</td>
                                            <td class="text-center">{{ $value->giam_gia }}</td>
                                            <td class="text-center">{{ $value->thoi_gian_het_han }}</td>
                                            <td class="text-center">
                                            @if($value->trang_thai_su_dung === 1)
                                                <span class="text-danger">Đã sử dụng</span>
                                            @else
                                                    <span class="text-green">Chưa sử dụng</span>
                                            @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/voucher/' . $value->id . '/delete') }}" title="Chỉnh sửa {{ $value->name }}"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="text-danger">{{ config('langVN.data_not_found') }}</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="paginate float-right">
                                @if(!empty($voucher))
                                    {!! $voucher->render() !!}
                                @endif
                            </div>
                        </div>
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
