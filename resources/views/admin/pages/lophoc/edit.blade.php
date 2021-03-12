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
                        <h1 class="m-0 text-dark">Cập nhật thông tin lớp học</h1>
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
                <form action="{{ url('/admin/lop-hoc/' . $lopHoc->id . '/update') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="ma_lop_hoc" value="{{ $lopHoc->id }}">
                    <input type="hidden" id="ma_mon_hoc" value="{{ $lopHoc->ma_mon_hoc }}">
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
                                    <label for="ten-lop">Tên lớp</label> <span class="text-danger">*</span>
                                    <input type="text" id="ten-lop" name="ten_lop" class="form-control" value="{{ $lopHoc->ten_lop }}">
                                </div>
                                <div class="form-group">
                                    <label for="ma-lop">Mã lớp</label> <span class="text-danger">*</span>
                                    <input type="text" id="ma-lop" name="ma_lop" class="form-control" value="{{ $lopHoc->ma_lop }}">
                                </div>
                                <div class="form-group">
                                    <label for="ma-mon-hoc">Môn học</label> <span class="text-danger">*</span>
                                    <select name="ma_mon_hoc" id="ma-mon-hoc" class="form-control">
                                        @if(!empty($monHoc))
                                            @foreach($monHoc as $mH)
                                                <option @if($mH->id === $lopHoc->ma_mon_hoc) selected @endif value="{{ $mH->id }}">{{ $mH->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ma-giang-vien">Giảng viên</label> <span class="text-danger">*</span>
                                    <select name="ma_giang_vien" id="ma-giang-vien" class="form-control">
                                        @if(!empty($giangVien))
                                            @foreach($giangVien as $gV)
                                                <option @if($gV->id === $lopHoc->ma_giang_vien) selected @endif value="{{ $gV->id }}">{{ $gV->ten }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="thoi-gian-bat-dau">Ngày bắt đầu</label> <span class="text-danger">*</span>
                                    <input type="text" id="thoi-gian-bat-dau" name="thoi_gian_bat_dau" class="form-control" value="{{ $lopHoc->thoi_gian_bat_dau }}">
                                </div>
                                <div class="form-group">
                                    <label for="thoi-gian-ket-thuc">Ngày kết thúc</label> <span class="text-danger">*</span>
                                    <input type="text" id="thoi-gian-ket-thuc" name="thoi_gian_ket_thuc" class="form-control" value="{{ $lopHoc->thoi_gian_ket_thuc }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Chỉnh sửa)</span> để thêm mới học viên.</p>
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
                                    <label for="thong-tin">Thông tin lớp học</label>
                                    <textarea class="form-control" name="thong_tin" id="thong-tin" cols="30" rows="3">{{ $lopHoc->thong_tin }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="so-hoc-vien">Số lượng học viên</label> <span class="text-danger">*</span>
                                    <input type="number" id="so-hoc-vien" name="so_hoc_vien" class="form-control" value="{{ $lopHoc->so_hoc_vien }}">
                                </div>
                                <div class="form-group">
                                    <label for="lich_hoc">Lịch học</label> <span class="text-danger">*</span>
                                    <br>
                                    <label for="thu-hai"></label>Thứ hai: <input type="checkbox" @if(in_array(2, $lopHoc->lich_hoc)) checked @endif id="thu-hai" value="2" name="lich_hoc[]">
                                    <label for="thu-ba"></label>Thứ ba: <input type="checkbox" @if(in_array(3, $lopHoc->lich_hoc)) checked @endif id="thu-ba" value="3" name="lich_hoc[]">
                                    <label for="thu-tu"></label>Thứ tư: <input type="checkbox" @if(in_array(4, $lopHoc->lich_hoc)) checked @endif id="thu-tu" value="4" name="lich_hoc[]">
                                    <label for="thu-nam"></label>Thứ năm: <input type="checkbox" @if(in_array(5, $lopHoc->lich_hoc)) checked @endif id="thu-nam" value="5" name="lich_hoc[]">
                                    <br>
                                    <label for="thu-sau"></label>Thứ sáu: <input type="checkbox" @if(in_array(6, $lopHoc->lich_hoc)) checked @endif id="thu-sau" value="6" name="lich_hoc[]">
                                    <label for="thu-bay"></label>Thứ bảy: <input type="checkbox" @if(in_array(7, $lopHoc->lich_hoc)) checked @endif id="thu-bay" value="7" name="lich_hoc[]">
                                    <label for="chu-nhat"></label>Chủ nhật: <input type="checkbox" @if(in_array(8, $lopHoc->lich_hoc)) checked @endif id="chu-nhat" value="8" name="lich_hoc[]">
                                </div>
                                <div class="form-group">
                                    <label for="gio-bat-dau">Giờ lên lớp</label> <span class="text-danger">*</span>
                                    <input type="text" id="gio-bat-dau" name="gio_vao_lop" class="form-control" value="{{ $lopHoc->gio_vao_lop }}">
                                </div>
                                <div class="form-group">
                                    <label for="gio-ket-thuc">Giờ tan lớp</label> <span class="text-danger">*</span>
                                    <input type="text" id="gio-ket-thuc" name="gio_tan_lop" class="form-control" value="{{ $lopHoc->gio_tan_lop }}">
                                </div>
                                <div class="form-group">
                                    <label for="hoc-phi">Học phí (vnd)</label> <span class="text-danger">*</span>
                                    <input type="number" id="hoc-phi" name="hoc_phi" class="form-control" value="{{ $lopHoc->hoc_phi }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" name="create" class="btn btn-primary float-right" value="Chỉnh sửa">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-7 float-left">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách học viên trong lớp</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Tên học viên</th>
                                <th class="text-center">Tuổi</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Lưu ý với học viên</th>
                                <th class="text-center">Tình trạng học bài</th>
                                <th>Loại bỏ học viên</th>
                            </tr>
                            </thead>
                            @if(!empty($quaTrinhHoc))
                                @foreach($quaTrinhHoc as $value)
                                <tbody>
                                    <tr>
                                        <td>{{ $value->ten }}</td>
                                        <td class="text-center">{{ $value->tuoi }}</td>
                                        <td class="text-center">{{ $value->email }}</td>
                                        <td class="text-center">{{ $value->thong_tin }}</td>
                                        <td class="text-center">
                                            @if($value->tinh_trang_hoc === 1)
                                                <p class="text-blue">Tốt</p>
                                            @elseif($value->tinh_trang_hoc === 2)
                                                <p class="text-warning">Trung bình</p>
                                            @else
                                                <p class="text-danger">Kém</p>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('/admin/lop-hoc/hoc-vien/'.$value->id.'/kick-out') }}"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p class="text-danger text-center">Chưa có học viên trong lớp này</p>
                            @endif
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="paginate float-right">
                            @if(!empty($quaTrinhHoc))
                            {!! $quaTrinhHoc->render() !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5 float-left">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Thêm học viên vào lớp</h3>

                        <div class="card-tools">
                            <form>
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="ten" id="ten" class="form-control float-right" placeholder="Tên học viên">

                                    <div class="input-group-append">
                                        <button type="button" onclick="searchHocVien()" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                                <th class="text-center">Email</th>
                                <th class="text-center">Số điện thoại</th>
                                <th class="text-center">Thêm vào lớp</th>
                            </tr>
                            </thead>
                            <tbody id="list-hoc-vien">

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="paginate">
                            <p>- Quản lý hãy tìm kiếm học viên trước khi thêm học viên vào lớp này <span class="text-danger"> * </span></p>
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
    <script>
        function searchHocVien() {
            let _ten = $('#ten').val();
            $.ajax({
                url: 'search-hoc-vien',
                type: 'get',
                data: {
                    ten: _ten,
                    ma_lop_hoc: $('#ma_lop_hoc').val(),
                    ma_mon_hoc: $('#ma_mon_hoc').val(),
                },
                success: function (response) {
                    if (response.code === 200) {
                        $('#list-hoc-vien').html(response.data);
                    } else {
                        $('#list-hoc-vien').html('<p class="text-danger">Không tìm thấy học viên</p>');
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>
@endsection
