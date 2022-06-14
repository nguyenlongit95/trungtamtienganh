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
                        <h1 class="m-0 text-dark">Thêm mới học viên</h1>
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
                <form action="{{ url('/admin/hoc-vien/add') }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" id="ten" name="ten" class="form-control" placeholder="Tên học viên">
                                </div>
                                <div class="form-group">
                                    <label for="tuoi">Ngày sinh</label> <span class="text-danger">*</span>
                                    <input type="date" id="ngay_sinh" name="ngay_sinh" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="dia-chi">Địa chỉ</label> <span class="text-danger">*</span>
                                    <input type="text" id="dia-chi" name="dia_chi" class="form-control" placeholder="Địa chỉ học viên">
                                </div>
                                <div class="form-group">
                                    <label for="so-dien-thoai">Số điện thoại</label> <span class="text-danger">*</span>
                                    <input type="text" id="so-dien-thoai" name="so_dien_thoai" class="form-control" placeholder="0123456789">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                                <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Thêm mới)</span> để thêm mới học viên.</p>
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
                                    <textarea class="form-control" name="thong_tin" id="thong-tin" cols="30" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ten-phi-huynh">Tên phụ huynh</label>
                                    <input type="text" id="ten-phu-huynh" name="ten_phu_huynh" class="form-control" placeholder="Nguyễn Văn A">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="example@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="truong-hoc">Trường đang theo học</label>
                                    <input type="text" id="truong-hoc" class="form-control" placeholder="Trường đang theo học" name="truong_hoc">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <p>- Các thông tin thêm ở phần này là không bắt buộc, có thể bỏ qua <span class="text-danger">*</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 float-left">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm học viên mới vào lớp</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                   <div class="col-md-2 border-right">
                                       <div class="form-group">
                                           <label for="mon-hoc">Chọn môn học</label>
                                           <select name="mon-hoc" id="mon-hoc" class="form-control" onchange="getLopHoc(this.value)">
                                               <option value="">-------</option>
                                               @if(!empty($monHoc))
                                                   @foreach($monHoc as $mh)
                                                    <option value="{{ $mh->id }}">{{ $mh->ten }} - {{ $mh->ma_mon_hoc }}</option>
                                                   @endforeach
                                               @else
                                                   <p class="text-danger">Chưa có môn học.</p>
                                               @endif
                                           </select>
                                       </div>
                                   </div>
                                    <div class="col-md-3 border-right">
                                        <div class="form-group">
                                            <label for="select_class">Chọn lớp học</label>
                                            <select name="lop-hoc" id="select_class" class="form-control">
                                                <option value="">-----</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 border-right">
                                        <div class="form-group">
                                            <label for="input-hoc-phi">Học phí</label>
                                            <input type="text" disabled name="input-hoc-phi" value="" id="input-hoc-phi" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-2 border-right">
                                        <div class="form-group">
                                            <label for="voucher">Voucher - khuyến mại</label>
                                            <input type="text" name="voucher" value="" id="voucher" class="form-control" onchange="checkVoucher($(this).val())">
                                            <p class="text-hide text-danger" id="txt-danger-alert"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 border-right">
                                        <div class="form-group">
                                            <label for="hoc_phi">Số tiền phải nộp</label>
                                            <input type="text" readonly name="hoc_phi" value="" id="hoc_phi" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-1 border-right text-center">
                                        <div class="form-group">
                                            <label for="">Xem in</label>
                                            <input type="button" id="preview-print" disabled value="Xem in" class="btn btn-primary" onclick="previewPrint()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                <div class="col-md-11">
                                    <p>- Sau khi chọn thông tin lớp học, click vào button "<span class="text-danger">Xem in</span>" để xuất file PDF sau đó tiến hành in dữ liệu.</p>
                                </div>
                                <div class="col-md-1">
                                    <input type="submit" name="create" class="btn btn-primary float-right" value="Thêm học viên">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="col-12 float-left" style="opacity: 0">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
                <form class="form" style="max-width: none; width: 420px; line-height: 16px">
                    <p>Anh ngữ Germ</p>
                    <p style="margin-left: 180px;">PHIẾU THU</p>
                    <table>
                        <tbody>
                        <tr>
                            <td class="text-left" style="width: 100px;">Họ và tên</td>
                            <td class="text-right" style="width: 320px;" id="bill-ho-ten">Nguyễn Văn A</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 100px;">Tuổi</td>
                            <td class="text-right" style="width: 320px;" id="bill-tuoi">13/08/1995</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 100px;">Địa chỉ</td>
                            <td class="text-right" style="width: 320px;" id="bill-dia-chi">Hà Nội</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 100px;">Điện thoại</td>
                            <td class="text-right" style="width: 320px;" id="bill-so-dien-thoai">0393803548</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 100px;">Email</td>
                            <td class="text-right" style="width: 320px;" id="bill-email">email@gmail.com</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 100px;">Học lớp</td>
                            <td class="text-right" style="width: 320px;" id="bill-lop-hoc">Tiếng Anh 3</td>
                        </tr>
                        <tr>
                            <td class="text-left" style="width: 100px;">Từ ngày</td>
                            <td class="text-right" style="width: 320px;" id="bill-start-date">Demoabababa</td>
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
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
    <script>
        /**
         * Preview print export pdf file html here
         */
        function previewPrint() {
            let ten = $('#ten').val();
            let tuoi = $('#tuoi').val();
            let dia_chi = $('#dia-chi').val();
            let so_dien_thoai = $('#so-dien-thoai').val();
            let email = $('#email').val();
            let lop_hoc = $('#select_class').val();
            let hoc_phi = $('#hoc_phi').val();
            // Fill data
            $('#bill-ho-ten').text(ten);
            $('#bill-tuoi').text(tuoi);
            $('#bill-dia-chi').text(dia_chi);
            $('#bill-so-dien-thoai').text(so_dien_thoai);
            $('#bill-email').text(email);
            $.ajax({
                url: '{{ url('/admin/hoc-vien/get-lop-hoc-bill') }}',
                type: 'GET',
                data: {
                    lop_hoc: lop_hoc
                }, success: function (res) {
                    if (res === null) {
                        alert('Không tìm được dữ liệu lớp học. Hãy kiển tra lại hệ thống.');
                    } else {
                        $('#bill-lop-hoc').text(res.data.ten_lop); // Call server get class name
                    }
                }
            });
            $('#bill-hoc-phi').text(hoc_phi);
        }

        function getLopHoc(idMonHoc) {
            /**
             * Call Server get all lop_hoc
             */
            $.ajax({
                url : '{{ url('/admin/hoc-vien/get-lop-hoc') }}',
                type: 'GET',
                data: {
                    idMonHoc: idMonHoc
                }, success: function (response) {
                    if (response !== null) {
                        $('#select_class').html(response);
                    } else {
                        console.log('System errors, please check log systems!');
                    }
                }
            });
        }

        /**
         * Check voucher here
         */
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
                            let oldHP = $('#input-hoc-phi').val();
                            let calPer = (oldHP * 10) / 100;
                            $('#hoc_phi').val(oldHP - calPer);
                        }
                    }
                });
            }
        }

        /**
         * jQuery function here
         * Get hoc_phi
         */
        $('#select_class').on('change', function (evt) {
            if ($(this).val() === "") {
                $('#preview-print').attr('disabled', 'true');
                $('#input-hoc-phi').val("");
                $('#hoc_phi').val("");
            } else {
                // Call Server get price of class
                $.ajax({
                    url: '{{ url('/admin/hoc-vien/get-gia-tien-lop-hoc') }}',
                    type: 'GET',
                    data: {
                        idLopHoc:  $(this).val()
                    }, success: function (response) {
                        if (response !== null) {
                            $('#input-hoc-phi').val(response.data.hoc_phi);
                            $('#hoc_phi').val(response.data.hoc_phi);
                            $('#preview-print').removeAttr('disabled');
                            $('#bill-start-date').text(response.data.thoi_gian_bat_dau);
                        } else {
                            alert('Không truy xuất được học phí của lớp học, kiểm tra lại hệ thống!');
                            $('#preview-print').attr('disabled');
                        }
                    }
                })
            }
        });
    </script>

    <script>
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
                    doc.save('Hóa_đơn_'+$('#ten').val()+'.pdf');
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
    </script>

    <style>
        .border-right {
            border-right: 1px double #7e7e7e;
        }
    </style>
@endsection
