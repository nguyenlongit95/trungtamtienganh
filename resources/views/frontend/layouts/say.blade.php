<section class="w3l-companies-hny-6 position-relative">
    <div class="cusrtomer-layout py-5">
        <div class="container py-md-4 py-3">
            <div class="title-heading-w3 text-center mx-auto">
                <h3 class="title-big">Nhận xét của học viên</h3>
            </div>
            @if(!empty($says))
                @foreach($says as $say)
                <div id="owl-demo1" class="owl-carousel owl-theme mt-5">
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('says/' . $say->image) }}" class="img-fluid" alt="/">
                                    </div>
                                    <div class="peopl">
                                        <h3>{{ $say->ten }}</h3>
                                        <p class="indentity">{{ $say->lop }}</p>
                                    </div>
                                </div>
                                <blockquote>
                                    <p>{{ $say->noi_dung }}</p>
                                </blockquote>
                                <quote></quote>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
        <div class="quote-special">
            <i class="fa fa-quote-left" aria-hidden="true"></i>
        </div>
    </div>
</section>
