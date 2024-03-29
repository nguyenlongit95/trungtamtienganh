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
                        <h1 class="m-0 text-dark">Quản lý lớp học</h1>
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
                @if(\Illuminate\Support\Facades\Auth::user()->role === 0)
                <div class="col-12 text-right">
                    <a href="{{ url('/admin/lop-hoc/create') }}" class="btn btn-primary text-white">Thêm lớp học</a>
                </div>
                @endif
                <br>
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách lớp học</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/lop-hoc/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="ten_lop" class="form-control float-right" placeholder="Tên lớp học">
                                        <input type="text" name="ma_lop" class="form-control float-right" placeholder="Mã lớp học">

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
                                    <th>Tên lớp</th>
                                    <th class="text-center">Mã lớp</th>
                                    <th class="text-center">Môn học</th>
                                    <th class="text-center">Giảng viên</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($lopHoc))
                                    @foreach($lopHoc as $lh)
                                        <tr>
                                            <td>{{ $lh->id  }}</td>
                                            <td>{{ $lh->ten_lop }}</td>
                                            <td class="text-center">{{ $lh->ma_lop }}</td>
                                            <td class="text-center">{{ $lh->mon_hoc }}</td>
                                            <td class="text-center">{{ $lh->giang_vien }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/lop-hoc/' . $lh->id . '/edit') }}" title="Chỉnh sửa {{ $lh->name }}"><i class="fas fa-pen"></i></a>
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
                                @if(!empty($lopHoc))
                                    {!! $lopHoc->appends($_GET)->links() !!}
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
