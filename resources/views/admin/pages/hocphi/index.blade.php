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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách học phí</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/hoc-phi/search') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-group input-group-sm" style="width: 350px;">
                                        <input type="text" name="ten" class="form-control float-right" placeholder="Tên học viên">
                                        <input type="text" name="lop_hoc" class="form-control float-right" placeholder="Tên lớp">
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
                                    <th class="text-center">Lớp học</th>
                                    <th class="text-center">Học Phí</th>
                                    <th class="text-center">Tình trạng nộp học phí</th>
                                    <th class="text-center">Ngày nộp học phí</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($hocPhi))
                                    @foreach($hocPhi as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->ten }}</td>
                                            <td class="text-center">{{ $value->lop_hoc }}</td>
                                            <td class="text-center">{{ number_format($value->hoc_phi, 0) }}</td>
                                            <td class="text-center">
                                                @if($value->tinh_trang_nop_hoc_phi === 0)
                                                    <p class="text-danger">Chưa nộp học phí</p>
                                                @else
                                                    <p class="text-green">Đã nộp học phí</p>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $value->ngay_nop_hoc_phi }}</td>
                                            <td class="text-center">
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="text-danger">Chưa có học phí cần phải nộp</p>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="paginate float-right">
                                @if(!empty($hocPhi))
                                    {!! $hocPhi->render() !!}
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
