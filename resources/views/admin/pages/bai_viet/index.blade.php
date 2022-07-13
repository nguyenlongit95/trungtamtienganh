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
                        <h1 class="m-0 text-dark">Quản lý cảnh báo giành cho học viên</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 text-right">
                        <a href="{{ url('/admin/bai-viet/add') }}" class="btn btn-primary">Thêm bài viết</a>
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
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách cảnh báo</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/bai-viet/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="title" class="form-control float-right" placeholder="Tên bài viết">
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
                                    <th>Tiêu đề bài viết</th>
                                    <th class="text-center">Nội dung cơ bản</th>
                                    <th class="text-center">Hiển thị trên website</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($baiViet))
                                        @foreach($baiViet as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->info }}</td>
                                                <td class="text-center">
                                                    @if($value->display === 0)
                                                        <p class="text-secondary">Không hiển thị trên website</p>
                                                    @else
                                                        <p class="text-success">Hiển thị trên website</p>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('/admin/bai-viet/edit/' . $value->id) }}"><i class="fa fa-pen"></i></a>
                                                    |
                                                    <a href="{{ url('/admin/bai-viet/delete/' . $value->id) }}"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="paginate float-right">
                                @if(!empty($baiViet))
                                    {!! $baiViet->appends($_GET)->links() !!}
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
