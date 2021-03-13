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
                        <h1 class="m-0 text-dark">Chỉnh sửa học viên</h1>
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
                <form action="{{ url('/admin/hoc-vien/' . $hocVien->id . '/update') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-8 float-left">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin cơ bản</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <div class="form-group">
                                    <label for="ten">Tên</label> <span class="text-danger">*</span>
                                    <input type="text" id="ten" name="ten" class="form-control" value="{{  $hocVien->ten }}">
                                </div>
                                <div class="form-group">
                                    <label for="tuoi">Tuổi</label> <span class="text-danger">*</span>
                                    <input type="number" id="tuoi" name="tuoi" class="form-control" value="{{  $hocVien->tuoi }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label> <span class="text-danger">*</span>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ $hocVien->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="dia-chi">Địa chỉ</label> <span class="text-danger">*</span>
                                    <input type="text" id="dia-chi" name="dia_chi" class="form-control" value="{{ $hocVien->dia_chi }}">
                                </div>
                                <div class="form-group">
                                    <label for="so-dien-thoai">Số điện thoại</label> <span class="text-danger">*</span>
                                    <input type="text" id="so-dien-thoai" name="so_dien_thoai" class="form-control" value="{{ $hocVien->so_dien_thoai }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Chỉnh sửa)</span> để thêm mới học viên.</p>
                                <p>- Tình trạng theo học tại trung tâm, quản lý lựa chọn là đang theo học và đã nghỉ học.</p>
                                <p>- Sau khi cập nhật thì hệ thống sẽ tự động lưu và đưa về trang danh sách học viên.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 float-left">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Thông tin thêm</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="thong-tin">Thông tin thêm</label>
                                    <textarea class="form-control" name="thong_tin" id="thong-tin" cols="30" rows="10">{{ $hocVien->thong_tin }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ten-phi-huynh">Tên phụ huynh</label>
                                    <input type="text" id="ten-phu-huynh" name="ten_phu_huynh" class="form-control" value="{{ $hocVien->ten_phu_huynh }}">
                                </div>
                                <div class="form-group">
                                    <label for="truong-hoc">Trường đang theo học</label>
                                    <input type="text" id="truong-hoc" class="form-control" value="Trường đang theo học" name="{{ $hocVien->truong_hoc }}">
                                </div>
                                <div class="form-group">
                                    <label for="trang-thai">Tình trạng theo học</label>
                                    <select name="trang_thai" id="trang-thai" class="form-control">
                                        <option @if($hocVien->trang_thai == 1) selected @endif value="1">Đang theo học</option>
                                        <option @if($hocVien->trang_thai == 0) selected @endif value="0">Đã nghỉ học</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" name="create" class="btn btn-primary float-right" value="Chỉnh sửa">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 float-left">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách học phí</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th class="text-center">Lớp học</th>
                                        <th class="text-center">Học Phí</th>
                                        <th class="text-center">Tình trạng nộp học phí</th>
                                        <th class="text-center">Ngày nộp học phí</th>
                                        <th class="text-center">Nộp học phí</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($hocPhi))
                                            @foreach($hocPhi as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $hocVien->ten }}</td>
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
                                                        @if($value->tinh_trang_nop_hoc_phi === 0)
                                                            <a onclick="_showModalVoucher( {{ $value->id }} )" class="btn btn-primary text-white">Nộp học phí</a>
                                                        @else
                                                            <button class="btn btn-secondary">Đã nộp học phí</button>
                                                        @endif
                                                    </td>
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
                                <p>- Quản lý sẽ xem lớp mà học viên chưa nộp học phí. <span class="text-danger">*</span></p>
                                <p>- Để nộp học phí thì quản lý kích vào nút <span class="text-danger font-weight-bold">nộp học phí</span> ở lớp tương ứng. <span class="text-danger">*</span></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.content -->
        <div class="modal" id="modal-charge-nuition">
            <div class="modal-dialog">
                <form action="" method="post" id="form-pay-nuition" enctype="multipart/form-data">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Nhập mã khuyến mại nếu có</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <textarea name="voucher" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Nộp học phí</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
    <script>
        function _showModalVoucher(id) {
            let url = 'nop-hoc-phi/' + id;
            $('#form-pay-nuition').attr('action', url);
            $('#modal-charge-nuition').modal('show');
        }
    </script>
@endsection
