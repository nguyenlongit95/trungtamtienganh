<div class="w3l-grids-block-5 py-5">
    <section id="grids5-block" class="pt-md-4 pb-md-5 py-4 mb-5">
        <div class="container">
            <div class="title-main text-center mx-auto mb-4">
                <h3 class="title-big">Giới thiệu các lớp học</h3>
            </div>
            <div class="row mt-sm-5 pt-lg-2">
                @if(!empty($blogs))
                    @foreach($blogs as $blog)
                    <div class="col-lg-4 col-sm-6">
                        <div class=" grids5-info">
                            <a href="#blog"><img src="{{ asset('frontend/assets/images/blog1.jpg') }}" alt="" /></a>
                            <div class="blog-info">
                                <h5>{{ \Carbon\Carbon::create($blog->created_at)->format('d-m-Y') }}</h5>
                                <h4><a href="{{ url('/detail/' . $blog->id) }}">{{ $blog->title }}</a></h4>
                                <p>{{ $blog->info }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
</div>
