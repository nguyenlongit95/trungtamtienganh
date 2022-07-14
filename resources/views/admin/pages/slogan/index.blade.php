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
                        <h1 class="m-0 text-dark">Quản lý slogan website</h1>
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
                            <h3 class="card-title">Slogan sẽ hiển thị lên website</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form action="{{ url('/admin/slogan/update') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <br>
                                <textarea name="slogan" id="slogan" class="form-control" cols="30" rows="10">{{ $slogan->slogan }}</textarea>
                                <br>
                                <input type="submit" class="btn btn-primary float-right" value="Cập nhật slogan">
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
