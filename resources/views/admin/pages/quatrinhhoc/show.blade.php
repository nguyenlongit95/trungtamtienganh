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
                        <h1 class="m-0 text-dark">Quá trình học của học viên: <span class="text-danger">{{ $hocVien->ten }}</span></h1>
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
                            <h3 class="card-title">Danh sách học viên</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Môn học</th>
                                    <th class="text-center">Lớp học</th>
                                    <th class="text-center">Thời gian học</th>
                                    <th class="text-center">Thông tin</th>
                                    <th class="text-center">Tình trạng học</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($quaTrinhHoc))
                                    @foreach($quaTrinhHoc as $value)
                                        <tr>
                                            <td>{{ $value->id  }}</td>
                                            <td>{{ $value->mon_hoc }}</td>
                                            <td class="text-center">{{ $value->lop_hoc }}</td>
                                            <td class="text-center">{{ $value->thoi_gian_hoc }}</td>
                                            <td class="text-center">{{ $value->thong_tin }}</td>
                                            <td class="text-center">
                                                @if($value->tinh_trang_hoc === 1)
                                                    <span class="text-green">Tốt</span>
                                                @elseif($value->tinh_trang_hoc === 2)
                                                    <span class="">Trung bình</span>
                                                @else
                                                    <span class="text-danger">Kém</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-primary" href="{{ url('/admin/qua-trinh-hoc/' . $value->id . '/edit') }}" title="Chỉnh sửa {{ $hocVien->ten }}">Cập nhật</a>
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
                                @if(!empty($quaTrinhHoc))
                                    {!! $quaTrinhHoc->appends($_GET)->links() !!}
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
