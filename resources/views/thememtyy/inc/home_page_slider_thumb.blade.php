<div class="box-width tv4 wow fadeInUp wr-list">
    <div class="title top10">
        <h4 class="title-h cor4"><a target="_self" href="{{$home_page_slider_thumb['link']}}" class="ds-line22 more"><span>{{$home_page_slider_thumb['label']}}</span><span
                    class="this-get"><i class="this-hide">Xem thêm</i><i class="fa ds-jiantouyou"></i></span></a></h4>
    </div>
    <div class="flex wrap border-box public-r hide-a-12">
        <div class="ds-r-hide list-swiper-a">
            <div class="swiper-wrapper">
                @foreach($home_page_slider_thumb['data'] as $movie)
                <div class="public-list-box public-pic-a swiper-slide">
                    <div class="public-list-div public-list-bj">
                        <a target="_self" class="public-list-exp" href="{{$movie->getUrl()}}" title="{{$movie->name}}">
                            <img class="lazy lazy1 gen-movie-img mask-0" referrerpolicy="no-referrer"
                                 src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="
                                 alt="{{$movie->name}} {{ $movie->origin_name }}" data-src="{{$movie->getThumbUrl()}}">
                            <span class="public-bg"></span>
                            <span class="public-list-prb hide ft2">{{$movie->episode_current}}</span>
                            <span class="public-play">
                                <i class="fa ds-bofang1"></i>
                            </span>
                        </a>
                    </div>
                    <div class="public-list-button">
                        <a target="_self" class="time-title hide ft4" href="{{$movie->getUrl()}}" title="{{$movie->name}}">{{$movie->name}}</a>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="swiper-button-prev fa ds-fanhui" href="javascript:"></a><a
                class="swiper-button-next fa ds-jiantouyou" href="javascript:"></a></div>
    </div>
</div>
