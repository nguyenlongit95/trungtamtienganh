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
                @if(!empty($teachers))
                    @foreach($teachers as $teacher)
                    <div class="col-lg-3 col-6 team-main-19">
                        <div class="column-19">
                            @if (is_null($teacher->avatar))
                                <a href="#team"><img class="img-fluid" src="{{ asset('frontend/assets/images/team1.jpg') }}" alt=" "></a>
                            @else
                                <a href="#team"><img class="img-fluid" src="{{ asset('avatars/' . $teacher->avatar) }}" alt=" "></a>
                            @endif
                        </div>
                        <div class="right-team-9">
                            <h6><a href="#team" class="title-team-32">{{ $teacher->ten_giang_vien }}</a></h6>
                            <p class="sm-text-32">{{ $teacher->ten_mon_hoc }}</p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
