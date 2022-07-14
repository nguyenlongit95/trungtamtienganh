@extends('admin.master')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('/css/CustomStyle.css') }}">
    <style>
        .hidden {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Quản lý thông tin giới thiệu</h1>
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
                            <h3 class="card-title">Thông tin giới thiệu sẽ hiển thị lên website</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form action="{{ url('/admin/about/update') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br>
                                <label for="title">Tiêu đề mục giới thiệu.</label>
                                <input type="text" id="title" class="form-control" name="title" value="{{ $about->title }}">
                                <br>
                                <label for="content">Nội dung mục giới thiệu</label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $about->content }}</textarea>
                                <br>
                                <input type="submit" class="btn btn-primary float-right" value="Cập nhật mục giới thiệu">
                            </form>
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
