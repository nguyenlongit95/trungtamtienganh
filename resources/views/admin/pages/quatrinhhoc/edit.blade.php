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
                        <h1 class="m-0 text-dark">Chi tiết quá trình học của học viên: <span class="text-danger">{{ $hocVien->ten }}</span></h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cơ bản</h3>
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
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $quaTrinhHoc->id  }}</td>
                                        <td>{{ $quaTrinhHoc->mon_hoc }}</td>
                                        <td class="text-center">{{ $quaTrinhHoc->lop_hoc }}</td>
                                        <td class="text-center">{{ $quaTrinhHoc->thoi_gian_hoc }}</td>
                                        <td class="text-center">{{ $quaTrinhHoc->thong_tin }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="paginate">
                                <p>- Tại đây hiển thị thông tin cơ bản của quá trình. <span class="text-danger">*</span></p>
                                <p>- Người quản trị hãy thao tác với các chức năng ở phần dưới. <span class="text-danger">*</span></p>
                                <a class="float-right" href="{{ url('/admin/qua-trinh-hoc/'.$hocVien->id.'/show') }}">Quay lại trang danh sách quá trình học</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thanh phan mo rong -->
                <div class="col-md-6 float-left">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Chỉnh sửa thông tin</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/qua-trinh-hoc/'.$quaTrinhHoc->id.'/update') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="tinh-trang-hoc">Tình trạng theo học của học viên</label>
                                    <select name="tinh_trang_hoc" id="tinh-trang-hoc" class="form-control">
                                        <option @if($quaTrinhHoc->tinh_trang_hoc === 1) selected @endif value="1">Tốt</option>
                                        <option @if($quaTrinhHoc->tinh_trang_hoc === 2) selected @endif value="2">Trung bình</option>
                                        <option @if($quaTrinhHoc->tinh_trang_hoc === 3) selected @endif value="3">Kém</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thong-tin">Thông tin cần nhắc nhở với học viên này <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="thong_tin" id="thong-tin" cols="30" rows="3">{{ $quaTrinhHoc->thong_tin }}</textarea>
                                </div>
                                <div class="form-group">
                                    <p>- Quản lý nhập thông tin cần nhắc nhớ đối với học viên ở mục textarea phía trên.</p>
                                    <p>- Quản lý có thể chọn tình trạng học của học viên ở select box phía trên</p>
                                    <p>- Kích vào nút <span class="text-danger">chỉnh sửa</span> để cập nhật thông tin.</p>
                                    <input class="btn btn-warning float-right" type="submit" value="Chỉnh sửa">
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3 float-left">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Chấm điểm</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/admin/qua-trinh-hoc/'.$quaTrinhHoc->id.'/mark') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="thoi-gian-cham-diem">Thời gian chấm điểm <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="thoi_gian" id="thoi-gian-cham-diem" value="">
                                </div>
                                <div class="form-group">
                                    <label for="diem-so">Điểm số <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="diem" id="diem-so" value="">
                                </div>
                                <div class="form-group">
                                    <p>- Quản lý chọn thời gian chấm điểm phía trên.</p>
                                    <p>- Nhập điểm cho học viên vào ô nhập liệu phía trên, điểm số có thể có điểm phẩy.</p>
                                    <p>- Kích vào nút <span class="text-danger">chấm điểm</span> để cập nhật thông tin.</p>
                                    <input class="btn btn-warning float-right" type="submit" value="Chấm điểm">
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-3 float-left">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Xếp loại</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Điểm từng tháng</label>
                                @if(!empty($listMark))
                                    @foreach($listMark as $mark)
                                    <p><span>Điểm tháng {{ $mark->time }}:</span> {{ $mark->diem }} điểm</p>
                                    @endforeach
                                @else
                                    <p>Học viên chưa có điểm <span class="text-danger">*</span></p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputEstimatedDuration">Xếp loại</label>
                                <h2 class="text-danger font-weight-bold text-center"> {{ $classification['avg'] }} <i class="fa fa-arrow-right font-size-22"></i> {{ $classification['rank'] }} </h2>
                                <p>- Xếp loại dựa vào điểm trung bình với các mốc sau: <span class="text-danger text-bold">A(9->10), B(7->8), C(5->7), D(<=5)</span></p>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>

    <style>
        .font-size-22 {
            font-size: 22px;
        }
    </style>
@endsection
