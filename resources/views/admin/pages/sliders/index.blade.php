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
                        <h1 class="m-0 text-dark">Quản lý hình ảnh banners</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 text-right">
                        <form action="{{ url('/admin/sliders/change') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="file" id="image" name="image">
                            <input type="submit" class="btn btn-primary" value="Thay thế banner">
                        </form>
                    </div>
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
                            <h3 class="card-title">Banner sẽ hiển thị trên website</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0 text-center">
                            @if(!empty($sliders))
                            <img src="{{ asset('/sliders/' . $sliders->image) }}" alt="">
                            @else
                            <p class="text-danger">Chưa có banner</p>
                            @endif
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
