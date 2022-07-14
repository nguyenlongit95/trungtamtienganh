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
                        <h1 class="m-0 text-dark">Nhận xét của người dùng</h1>
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
                    <a href="{{ url('/admin/says/add') }}" class="btn btn-primary text-white">Thêm nhận xét</a>
                </div>
                <br>
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách nhận xét</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Lớp</th>
                                    <th class="text-center">Nội dung</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($says))
                                        @foreach($says as $say)
                                        <tr class="text-center">
                                            <td>{{ $say->id }}</td>
                                            <td>{{ $say->ten }}</td>
                                            <td>{{ $say->lop }}</td>
                                            <td>{{ $say->noi_dung }}</td>
                                            <td>
                                                <a href="{{ url('/admin/says/edit/' . $say->id) }}"><i class="fa fa-pen"></i></a>
                                                |
                                                <a href="{{ url('/admin/says/delete/' . $say->id) }}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
