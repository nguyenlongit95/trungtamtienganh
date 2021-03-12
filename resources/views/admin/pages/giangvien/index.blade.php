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
                        <h1 class="m-0 text-dark">Quản lý giảng viên</h1>
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
                    <a href="{{ url('/admin/giang-vien/create') }}" class="btn btn-primary text-white">Thêm giảng viên</a>
                </div>
                <br>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách giảng viên</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/giang-vien/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="ten" class="form-control float-right" placeholder="Tên giảng viên">
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
                                    <th>Tên giảng viên</th>
                                    <th class="text-center">Tuổi</th>
                                    <th class="text-center">Địa chỉ</th>
                                    <th class="text-center">Môn học</th>
                                    <th class="text-center">Trường đại học</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($giangVien))
                                    @foreach($giangVien as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->ten }}</td>
                                            <td class="text-center">{{ $value->tuoi }}</td>
                                            <td class="text-center">{{ $value->dia_chi }}</td>
                                            <td class="text-center">{{ $value->mon_hoc }}</td>
                                            <td class="text-center">{{ $value->truong_dai_hoc }}</td>
                                            <td class="text-center">{{ $value->so_dien_thoai }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/giang-vien/' . $value->id . '/edit') }}"><i class="fas fa-pen"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="text-danger">Không có giảng viên</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="paginate float-right">
                                @if(!empty($giangVien))
                                    {!! $giangVien->render() !!}
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
