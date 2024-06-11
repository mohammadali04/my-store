<section class="client_review">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div dir="ltr" class="client_review_slider owl-carousel owl-loaded owl-drag">



                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-2250px, 0px, 0px); transition: all 0.25s ease 0s; width: 5250px;">
                            @php
                            use App\Models\front\FavoriteComment;
                            $comments=FavoriteComment::all();
                            @endphp
                            @foreach($comments as $comment)
                            <div class="owl-item cloned" style="width: 750px;">
                                <div dir="rtl" class="single_client_review">
                                    <p>{{$comment->FavoriteComment()->first()->body}}</p>
                                    <h5>{{$comment->FavoriteComment()->first()->name}}</h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav"><button role="presentation" type="button" class="owl-prev"> <i
                                class="ti-angle-left"></i> </button><button role="presentation" type="button"
                            class="owl-next"><i class="ti-angle-right"></i> </button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div>
    </div>
</section>