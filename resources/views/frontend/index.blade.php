@extends('frontend.master')

@section('content')
    <section id="home" class="w3l-banner py-5">
        <div class="container pt-5 pb-md-4">
            <div class="row align-items-center">
                <div class="col-md-6 banner-left pt-md-0 pt-5">
                    <h3 class="mb-sm-4 mb-3 title">{{ $slogan->slogan }}</h3>
                </div>
                <div class="col-md-6 banner-right mt-md-0 mt-4">
                    <img class="img-fluid" src="{{ asset('sliders/' . $slider->image) }}" alt="Germ Edication">
                </div>
            </div>
        </div>
    </section>

    <section class="w3l-servicesblock py-md-5 py-4">
        <div class="container pb-2">
            <div class="row align-items-center">
                <div class="col-lg-6 left-wthree-img pr-lg-4">
                    <img src="{{ asset('frontend/assets/images/img1.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 about-right-faq align-self mb-lg-0 mb-5 pl-xl-5">
                    <h6>Giới thiệu</h6>
                    <h3 class="title-big mb-3">{{ $about->title }}</h3>
                    <p class="">{{ $about->content }}</p>
                    <div class="row mt-lg-5 mt-4 mb-2">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center left-insp-art">
                                <img src="{{ asset('frontend/assets/images/book.png') }}" alt="" class="img-fluid mr-3">
                                <h6>Hoàn thiện kỹ năng tiếng Anh</h6>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-sm-0 mt-4">
                            <div class="d-flex align-items-center left-insp-art">
                                <img src="{{ asset('frontend/assets/images/book2.png') }}" alt="" class="img-fluid mr-3">
                                <h6>Lớp học vui vẻ và hiệu quả</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blog section -->
    @include('frontend.layouts.block')
    <!-- //blog section -->

    <!-- testimonials -->
    @include('frontend.layouts.say')
    <!--//testimonials-->

    @include('frontend.layouts.teachers')

@endsection
