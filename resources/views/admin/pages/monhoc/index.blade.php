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
                        <h1 class="m-0 text-dark">Quản lý môn học</h1>
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
                    <a href="{{ url('/admin/mon-hoc/create') }}" class="btn btn-primary text-white">Thêm môn học</a>
                </div>
                <br>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách môn học</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/mon-hoc/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="ten" class="form-control float-right" placeholder="Tên môn học">

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
                                    <th>Tên</th>
                                    <th class="text-center">Mã môn học</th>
                                    <th class="text-center">Thông tin môn học</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($monHoc))
                                    @foreach($monHoc as $mh)
                                        <tr>
                                            <td>{{ $mh->id  }}</td>
                                            <td>{{ $mh->ten }}</td>
                                            <td class="text-center">{{ $mh->ma_mon_hoc }}</td>
                                            <td class="text-center">{{ $mh->thong_tin }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/mon-hoc/' . $mh->id . '/edit') }}" title="Chỉnh sửa {{ $mh->name }}"><i class="fas fa-pen"></i></a>
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
                                @if(!empty($monHoc))
                                    {!! $monHoc->render() !!}
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
