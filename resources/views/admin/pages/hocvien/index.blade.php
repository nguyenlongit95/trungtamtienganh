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
                        <h1 class="m-0 text-dark">Quản lý học viên</h1>
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
                    <a href="{{ url('/admin/hoc-vien/create') }}" class="btn btn-primary text-white">Thêm học viên</a>
                </div>
                <br>
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách học viên</h3>

                            <div class="card-tools">
                                <form action="{{ url('/admin/hoc-vien/search') }}" method="post" enctype="multipart/form-data">
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
                                    <th>Tên</th>
                                    <th class="text-center">Tuổi</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($hocVien))
                                    @foreach($hocVien as $hv)
                                    <tr>
                                        <td>{{ $hv->id  }}</td>
                                        <td>{{ $hv->ten }}</td>
                                        <td class="text-center">{{ $hv->ngay_sinh }}</td>
                                        <td class="text-center">{{ $hv->so_dien_thoai }}</td>
                                        <td class="text-center">
                                            @if($hv->trang_thai == 0)
                                                <span class="text-danger">Đã nghỉ học</span>
                                            @else
                                                <span class="text-blue">Đang theo học</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/hoc-vien/' . $hv->id . '/edit') }}" title="Chỉnh sửa {{ $hv->name }}"><i class="fas fa-pen"></i></a>
                                            |
                                            <a href="{{ url('/admin/hoc-vien/' . $hv->id . '/delete') }}"><i class="fa fa-trash"></i></a>
                                            |
                                            <a onclick="warningStudent( {{ $hv->id }} )" href="#" title="Chỉnh sửa {{ $hv->name }}"><i class="fa fa-exclamation-triangle"></i></a>
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
                                @if(!empty($hocVien))
                                    {!! $hocVien->appends($_GET)->links() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <!-- The Modal warning for student -->
    <div class="modal" id="modalWarningStudent">
         <div class="modal-dialog">
         <form action="{{ url('/admin/canh-bao/add') }}" method="post">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Cảnh báo đối với học viên</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="ma-hoc-vien">ID học viên</label> <span class="text-danger">*</span>
                            <input type="text" class="form-control" name="ma_hoc_vien" id="ma-hoc-vien" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="loai-canh-bao">Loại cảnh báo</label> <span class="text-danger">*</span>
                            <!-- 1: Nghỉ học, 2: Điểm thấp 3: Không làm bài tập 4: Không tập trung	-->
                            <select name="loai_canh_bao" class="form-control" id="loai-canh-bao">
                                <option value="1">Nghỉ học</option>
                                <option value="2">Điểm thấp</option>
                                <option value="3">Không làm bài tập</option>
                                <option value="4">Không tập trung</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="noi-dung-canh-bao">noi_dung_canh_bao</label> <span class="text-danger">*</span>
                            <textarea name="noi_dung_canh_bao" class="form-control" id="noi-dung-canh-bao" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="thoi-gian-canh-bao">Thời gian cảnh báo</label> <span class="text-danger">*</span>
                            <input type="date" id="thoi-gian-canh-bao" name="thoi_gian_canh_bao" class="form-control" placeholder="">
                        </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                  <button type="submit" class="btn btn-warning">Cảnh báo</button>
               </div>
            </div>
            </form>
         </div>
      </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
    <script>
        function warningStudent(id) {
            $('#modalWarningStudent').modal('show');
            $('#ma-hoc-vien').val(id);
        }
    </script>
@endsection
