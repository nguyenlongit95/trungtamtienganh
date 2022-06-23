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
                                    <label for="tuoi">Ngày sinh</label> <span class="text-danger">*</span>
                                    <input type="text" id="tuoi" name="ngay_sinh" class="form-control" value="{{  $hocVien->ngay_sinh }}">
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
                                <p>- Số buổi học sẽ được tính dựa trên số học phí / học phí 1 buổi của lớp đang theo học.</p>
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
                                    <textarea class="form-control" name="thong_tin" id="thong-tin" cols="30" rows="5">{{ $hocVien->thong_tin }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ten-phi-huynh">Tên phụ huynh</label>
                                    <input type="text" id="ten-phu-huynh" name="ten_phu_huynh" class="form-control" value="{{ $hocVien->ten_phu_huynh }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ $hocVien->email }}">
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
                                        <th class="text-center">Số buổi học</th>
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
                                                    <td class="text-center">{{ round($value->so_buoi_hoc) }}</td>
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
                                                <input type="hidden" id="txt_ten_lop_{{ $value->id }}" value="{{ $value->lop_hoc }}">
                                                <input type="hidden" id="txt_hoc_phi_{{ $value->id }}" value="{{ $value->hoc_phi }}">
                                                <input type="hidden" id="txt_so_buoi_hoc_{{ $value->id }}" value="{{ $value->so_buoi_hoc }}">
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
                <form action="{{ url('/admin/hoc-vien/nop-hoc-phi/') }}" method="post" id="form-pay-nuition" enctype="multipart/form-data">
                    <div class="modal-content">
                        <input type="hidden" name='id' id='id-hoc-phi' value=''>
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Nhập mã khuyến mại nếu có</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
{{--                            <textarea name="voucher" class="form-control" id="" cols="30" rows="3" onchange="checkVoucher($(this).val())"></textarea>--}}
{{--                            <p class="text-hide text-danger" id="txt-danger-alert"></p>--}}
                            <br>
                            <label for="hoc-phi">Số buổi học<span class="text-danger">*</span></label>
                            <input type="number" value="" class="form-control" id="so-buoi-hoc" name="so-buoi-hoc" placeholder="">
                            <br>
                            <label for="hoc-phi">Số tiền phải nộp <span class="text-danger">*</span></label>
                            <input type="text" readonly value="" name="hoc-phi" class="form-control" id="hoc-phi">
                            <input type="hidden" id="tmp-id" value="">
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="button" id="preview-print" value="Xem in" class="btn btn-secondary">
                            <button type="submit" class="btn btn-primary">Nộp học phí</button>
                        </div>
                    </div>
                </form>
                <div class="col-12 float-left" style="opacity: 0">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
                    <form class="form" style="max-width: none; width: 420px; line-height: 16px; padding-left: 150px">
                        <p>Anh ngữ Germ</p>
                        <p style="margin-left: 180px;">PHIẾU THU</p>
                        <table>
                            <tbody>
                            <tr>
                                <td class="text-left" style="width: 100px;">Họ và tên</td>
                                <td class="text-right" style="width: 320px;" id="bill-ho-ten">{{ $hocVien->ten }}</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 100px;">Tuổi</td>
                                <td class="text-right" style="width: 320px;" id="bill-tuoi">{{ $hocVien->ngay_sinh }}</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 100px;">Địa chỉ</td>
                                <td class="text-right" style="width: 320px;" id="bill-dia-chi">{{ $hocVien->dia_chi }}</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 100px;">Điện thoại</td>
                                <td class="text-right" style="width: 320px;" id="bill-so-dien-thoai">{{ $hocVien->so_dien_thoai }}</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 100px;">Email</td>
                                <td class="text-right" style="width: 320px;" id="bill-email">{{ $hocVien->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 100px;">Học lớp</td>
                                <td class="text-right" style="width: 320px;" id="bill-lop-hoc">Tiếng Anh 3</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 100px;">Từ ngày</td>
                                <td class="text-right" style="width: 320px;" id="bill-start-date">13/08/1995</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 100px;">Số tiền nộp</td>
                                <td class="text-right" style="width: 320px;" id="bill-hoc-phi">6000000</td>
                            </tr>
                            <tr>
                                <td class="text-left" style="width: 100px;">Ghi chú</td>
                                <td class="text-right" style="width: 320px;"></td>
                            </tr>
                            <tr style="margin-top:15px;">
                                <td class="text-left" style="width: 150px; padding-top: 15px; padding-left: 15px;">Người nộp tiền</td>
                                <td class="text-right" style="width: 320px; padding-top: 15px; padding-right: 15px;">Hà Nội: ngày...tháng...năm....</td>
                            </tr>
                            <tr style="margin-top:15px;">
                                <td class="text-left" style="width: 150px; padding-top: 15px; padding-left: 15px;"></td>
                                <td class="text-right" style="width: 320px; padding-top: 15px; padding-right: 55px;">Người thu tiền</td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
    <script>
        /**
         * Function show modal corrects voucher's
         */
        function _showModalVoucher(id) {
            $('#id-hoc-phi').val(id);
            $('#modal-charge-nuition').modal('show');
            $('#hoc-phi').val($('#txt_hoc_phi_' + id).val());
            $('#so-buoi-hoc').val($('#txt_so_buoi_hoc_' + id).val());
            $('#tmp-id').val(id);
            // Filter data PDF
            let idHocPhi = $('#id-hoc-phi').val();
            /**
             * Call server get lop_hoc
             */
            $.ajax({
                url: '{{ url('/admin/hoc-vien/get-lop-hoc-using-qua-hoc-phi') }}',
                type: 'GET',
                data: {
                    idHocPhi: idHocPhi
                },success: function (response) {
                    if (response !== null) {
                        $('#bill-lop-hoc').text(response.data.ten_lop);
                        $('#bill-start-date').text(response.data.thoi_gian_bat_dau);
                        $('#bill-hoc-phi').text($('#hoc-phi').val());
                    }
                }
            });
        }

        function checkVoucher(voucher) {
            if(voucher === '') {
                $('#txt-danger-alert').addClass('text-hide');
            } else {
                /**
                 * Call server check voucher and show price
                 */
                $.ajax({
                    url: '{{ url('/admin/hoc-vien/check-voucher') }}',
                    type: 'GET',
                    data: {
                        voucher: voucher
                    }, success: function (response) {
                        if (response === 'errors') {
                            $('#txt-danger-alert').text('Voucher không hợp lệ, hãy kiểm tra lại!');
                            $('#txt-danger-alert').removeClass('text-hide');
                            $('#txt-danger-alert').addClass('text-danger');
                            $('#txt-danger-alert').removeClass('text-success');
                            $('#hoc_phi').val($('#input-hoc-phi').val());
                        } else {
                            $('#txt-danger-alert').text('Áp dụng voucher thành công.');
                            $('#txt-danger-alert').removeClass('text-danger');
                            $('#txt-danger-alert').removeClass('text-hide');
                            $('#txt-danger-alert').addClass('text-success');
                            // Upgrade hoc phi
                            let oldHP = $('#hoc-phi').val();
                            let calPer = (oldHP * 10) / 100;alert(calPer);
                            $('#hoc-phi').val(oldHP - calPer);
                            $('#bill-hoc-phi').text(oldHP - calPer);
                        }
                    }
                });
            }
        }

        /**
         * Export PDF here
         */
        (function () {
            var
                form = $('.form'),
                cache_width = form.width(),
                a4 = [595.28, 841.89]; // for a4 size paper width and height

            $('#preview-print').on('click', function () {
                $('body').scrollTop(0);
                createPDF();
            });
            //create pdf
            function createPDF() {
                getCanvas().then(function (canvas) {
                    var
                        img = canvas.toDataURL("image/png"),
                        doc = new jsPDF({
                            unit: 'px',
                            format: 'a4'
                        });
                    doc.addImage(img, 'JPEG', 5, 5);
                    doc.save('Hóa_đơn_'+$('#bill-ho-ten').text()+'.pdf');
                    form.width(cache_width);
                });
            }
            // create canvas object
            function getCanvas() {
                form.width((a4[0] * 1.33333) - 0).css('max-width', 'none');
                return html2canvas(form, {
                    imageTimeout: 2000,
                    removeContainer: true
                });
            }
        }());

        $(document).ready(function () {
            $('#so-buoi-hoc').on('keyup', function (evt) {
                let tmpID = $('#tmp-id').val();
                let hocPhiBasic = $('#txt_hoc_phi_' + tmpID).val();
                // Check discount here!
                $('#hoc-phi').val(hocPhiBasic * $(this).val());
                $('#bill-hoc-phi').text(hocPhiBasic * $(this).val());
            })
        });
    </script>
@endsection
