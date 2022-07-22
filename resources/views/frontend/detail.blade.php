@extends('frontend.master')

@section('content')
    <section id="home" class="w3l-banner py-5">
        <div class="container pt-5 pb-md-4">
            <div class="row align-items-center">
                <div class="col-md-12 banner-left pt-md-0 pt-5">
                   <h1>{{ $baiViet->title }}</h1>
                   <br>
                   {!! $baiViet->description !!}
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.block')

@endsection
