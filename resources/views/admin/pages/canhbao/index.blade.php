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
                                <form action="{{ url('/admin/canh-bao/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="ten" class="form-control float-right" placeholder="Tên học viên">
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
                                    <th>Tên học viên</th>
                                    <th class="text-center">Loại cảnh báo</th>
                                    <th class="text-center">Nội dung cảnh báo</th>
                                    <th class="text-center">Thời gian cảnh báo</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($canhBao))
                                    @foreach($canhBao as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->ten }}</td>
                                            <td class="text-center">
                                                <!-- 1: Nghỉ học, 2: Điểm thấp 3: Không làm bài tập 4: Không tập trung -->
                                                @if($value->loai_canh_bao === 1)
                                                    <span class="text-danger">Nghỉ học</span>
                                                @elseif($value->loai_canh_bao === 2)
                                                    <span class="text-danger">Điểm thấp</span>
                                                @elseif($value->loai_canh_bao === 3)
                                                    <span class="text-danger">Không làm bài tập</span>
                                                @else
                                                    <span class="text-danger">Không tập trung</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $value->noi_dung_canh_bao }}</td>
                                            <td class="text-center">{{ $value->thoi_gian_canh_bao }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/canh-bao/' . $value->id . '/delete') }}"><i class="fas fa-trash"></i></a>
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
                                @if(!empty($canhBao))
                                    {!! $canhBao->render() !!}
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
