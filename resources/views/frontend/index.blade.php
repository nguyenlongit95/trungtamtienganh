@extends('frontend.master')

@section('content')
    <section id="home" class="w3l-banner py-5">
        <div class="container pt-5 pb-md-4">
            <div class="row align-items-center">
                <div class="col-md-6 banner-left pt-md-0 pt-5">
                    <h3 class="mb-sm-4 mb-3 title">This is the new way<br> to Learn
                        <span class="type-js"><span class="text-js">Online</span></span></h3>
                </div>
                <div class="col-md-6 banner-right mt-md-0 mt-4">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/b1.png') }}" alt="Germ Edication">
                </div>
            </div>
        </div>
    </section>

    <div class="w3l-index-block4 pb-5">
        <div class="features-bg pb-lg-5 pt-lg-4 py-4">
            <div class="container">
                <div class="title-main text-center mx-auto mb-md-4">
                    <h3 class="title-big">Lớp học đang hoạt động</h3>
                    <p class="sub-title mt-2">
                        Danh sách lớp học đang hoạt động tại trung tâm, hãy cùng chúng tôi hoàn thiện các kỹ năng tiếng Anh cho trẻ.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 features15-col-text">
                        <a href="courses.html" class="d-flex feature-unit align-items-center">
                            <div class="col-4">
                                <div class="features15-info">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/c2.png') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features15-para">
                                    <h6>$100</h6>
                                    <h4>Learn Code</h4>
                                    <p>Ras effic itur metusga via suscipit</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 features15-col-text">
                        <a href="courses.html" class="d-flex feature-unit align-items-center active">
                            <div class="col-4">
                                <div class="features15-info">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/c3.png') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features15-para">
                                    <h6>Free</h6>
                                    <h4>Science</h4>
                                    <p>Ras effic itur metusga via suscipit</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 features15-col-text">
                        <a href="courses.html" class="d-flex feature-unit align-items-center">
                            <div class="col-4">
                                <div class="features15-info">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/c4.png') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features15-para">
                                    <h6>$100</h6>
                                    <h4>Mathematics</h4>
                                    <p>Ras effic itur metusga via suscipit</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 features15-col-text">
                        <a href="courses.html" class="d-flex feature-unit align-items-center">
                            <div class="col-4">
                                <div class="features15-info">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/c5.png') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features15-para">
                                    <h6>Free</h6>
                                    <h4>Ww Recognize</h4>
                                    <p>Ras effic itur metusga via suscipit</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 features15-col-text">
                        <a href="courses.html" class="d-flex feature-unit align-items-center">
                            <div class="col-4">
                                <div class="features15-info">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/c6.png') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features15-para">
                                    <h6>$100</h6>
                                    <h4>Online Learning</h4>
                                    <p>Ras effic itur metusga via suscipit</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 features15-col-text">
                        <a href="courses.html" class="d-flex feature-unit align-items-center">
                            <div class="col-4">
                                <div class="features15-info">
                                    <img class="img-fluid" src="{{ asset('frontend/assets/images/c1.png') }}" alt=" ">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="features15-para">
                                    <h6>$100</h6>
                                    <h4>Astrology</h4>
                                    <p>Ras effic itur metusga via suscipit</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="w3l-servicesblock py-md-5 py-4">
        <div class="container pb-2">
            <div class="row align-items-center">
                <div class="col-lg-6 left-wthree-img pr-lg-4">
                    <img src="{{ asset('frontend/assets/images/img1.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 about-right-faq align-self mb-lg-0 mb-5 pl-xl-5">
                    <h6>Giới thiệu</h6>
                    <h3 class="title-big mb-3">We provide the best <br>Online Courses</h3>
                    <p class="">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo,
                        ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet.
                        Lorem ipsum viverra feugiat.</p>
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


    <section class="w3l-teams-32-main py-5">
        <div class="teams-32 py-md-4">
            <div class="container">
                <div class="title-main text-center mx-auto mb-4">
                    <h3 class="title-big">Thông tin giảng viên</h3>
                    <p class="sub-title mt-2">
                        Chúng tôi có đội ngũ giáo viên với nhiều năm kinh nghiệm giảng dạy. <br/>
                        Ngoài ra chúng tôi còn có đội ngũ trợ giảng giúp kèm 1-1 với từng học viên để nâng cao và hoàn thiện kỹ năng hơn.
                    </p>
                </div>
                <div class="row main-contteam-32 mt-sm-5 pt-lg-2">
                    <div class="col-lg-3 col-6 team-main-19">
                        <div class="column-19">
                            <a href="#team"><img class="img-fluid" src="{{ asset('frontend/assets/images/team1.jpg') }}" alt=" "></a>
                        </div>
                        <div class="right-team-9">
                            <h6><a href="#team" class="title-team-32">Chris Tina</a></h6>
                            <p class="sm-text-32">Web Designer</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 team-main-19">
                        <div class="column-19">
                            <a href="#team"><img class="img-fluid" src="{{ asset('frontend/assets/images/team2.jpg') }}" alt=" "></a>
                        </div>
                        <div class="right-team-9">
                            <h6><a href="#team" class="title-team-32">Diego Mota</a></h6>
                            <p class="sm-text-32">CSS, HTML</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 team-main-19">
                        <div class="column-19">
                            <a href="#team"><img class="img-fluid" src="{{ asset('frontend/assets/images/team3.jpg') }}" alt=" "></a>
                        </div>
                        <div class="right-team-9">
                            <h6><a href="#team" class="title-team-32">Anton Bone</a></h6>
                            <p class="sm-text-32">UI/UX Designer</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 team-main-19">
                        <div class="column-19">
                            <a href="#team"><img class="img-fluid" src="{{ asset('frontend/assets/images/team4.jpg') }}" alt=" "></a>
                        </div>
                        <div class="right-team-9">
                            <h6><a href="#team" class="title-team-32">Neoye Achi</a></h6>
                            <p class="sm-text-32">Web Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
