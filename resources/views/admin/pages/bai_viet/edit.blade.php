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
                        <h1 class="m-0 text-dark">Chỉnh sửa bài viết</h1>
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
                <form action="{{ url('/admin/bai-viet/update/' . $baiViet->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin bài viết</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="form-group">
                                <label for="title">Tiêu đề bài viết</label> <span class="text-danger">*</span>
                                <input type="text" id="title" name="title" class="form-control" value="{{ $baiViet->title }}">
                            </div>
                            <div class="form-group">
                                <label for="info">Thông tin giới thiệu</label> <span class="text-danger">*</span>
                                <textarea name="info" class="form-control" id="info" cols="30" rows="3">{{ $baiViet->info }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Thông tin chi tiết</label> <span class="text-danger">*</span>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $baiViet->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="display">Hiển thị trên website</label> <span class="text-danger">*</span>
                                <select class="form-control" name="display" id="display">
                                    <option value="1" @if($baiViet->display === 1) selected @endif>Hiển thị</option>
                                    <option value="0" @if($baiViet->display === 0) selected @endif>Không hiển thị</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Hình hiển thị</label> <span class="text-danger">*</span>
                                <p>- Hình ảnh có định dạng <span class="text-danger">jpg</span> hoặc <span class="text-danger">png</span> và kích thước nhỏ hơn <span class="text-danger">2mb</span></p>
                                <input type="file" id="image" name="image" class="form-control">
                                <img src="{{ asset('/bai_viet/' . $baiViet->image) }}" style="max-height: 300px; max-width: 300px" alt="">
                            </div>
                        </div>
                        <div class="card-footer">
                            <p>- Những trường thông tin có dấu <span class="text-danger">*</span> là bắt buộc phải nhập.</p>
                            <p>- Sau khi nhập xong thông tin trên các trường dữ liệu phía trên quản lý hãy click vào nút <span class="text-danger">(Thêm mới)</span> để thêm mới bài viết.</p>
                            <p>- Thông tin giới thiệu sẽ được hiển thị lên trang chủ của website.</p>
                            <p>- Thông tin chi tiết sẽ hiển thị tại trang chi tiết bài viết.</p>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" name="create" class="btn btn-primary float-right" value="Thêm bài viết">
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('/js/pages/menus/menus.js') }}"></script>
    <script src="{{ asset('/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html?type=Images',
            filebrowserFlashBrowseUrl : '{{ asset('/plugins/') }}' + '/ckfinder/ckfinder.html?type=Flash',
            filebrowserUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '{{ asset('/plugins/') }}' + '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
        });
    </script>
@endsection
