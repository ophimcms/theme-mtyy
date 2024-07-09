@php
    $logo = setting('site_logo', '');
    $brand = setting('site_brand', '');
    $title = isset($title) ? $title : setting('site_homepage_title', '');
@endphp
<style>
    #result {
        margin-top: 20px;
        background-color: #333333;
        list-style-type: none;
        width: 500px;
        position: absolute;
        top: 32px;
        z-index: 100;
        padding-left: 0;
    }

    .column {
        float: left;
        padding: 5px;
    }

    .lefts {
        text-align: center;
        width: 20%;
    }

    .rights {
        width: 80%;
    }

    .rowsearch:after {
        content: "";
        display: table;
        clear: both;
    }

    #result .rowsearch {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #result .rowsearch p {
        margin-bottom: 1px;
    }

    .rowsearch:hover {
        background-color: #2d2d2d;
    }
</style>
<div class="head head-c header_nav1" id="nav">
    <div class="this-pc flex between">
        <div class="left flex">
            <div class="logo">
                <a class="gen-left-list" href="javascript:"><em class="fa ds-menu"></em></a>
                <a class="logo-brand" href="/">
                    @if ($logo)
                        {!! $logo !!}
                    @else
                        {!! $brand !!}
                    @endif
                </a>
            </div>
            <div class="head-nav ft4 roll bold0 pc-show1 wap-show0">
                <ul class="swiper-wrapper">
                    @foreach ($menu as $item)
                        @if (count($item['children']))
                            <li class="rel head-more-a">
                                <a class="this-get" href="javascript:">{{$item['link']}}<em class="fa nav-more"
                                                                                            style="font-size:18px"></em></a>
                                <div class="head-more none box size" style="display: none;">
                                    @foreach ($item['children'] as $children)
                                        <a href="{{$children['link']}}" class="nav-link">{{$children['name']}}</a>
                                    @endforeach
                                </div>
                            </li>
                        @else
                            <li class="swiper-slide"><a target="_self" href="{{$item['link']}}"
                                                        class="">{{$item['name']}}</a></li>
                        @endif
                    @endforeach
                </ul>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
        <div class="right flex">
            <div class="search-min-box">
                <form id="search" name="s" method="get" action="/">
                    <input id="dsSoInput" type="text" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm"
                           autocomplete="off"
                           class="input">
                    <button id="dsSo" type="submit" class="fa ds-sousuo"></button>
                </form>
                <div class="" id="result"></div>
            </div>
        </div>
    </div>
    <div class="this-wap roll bold0 pc-show1">
        <ul class="swiper-wrapper">
            @foreach ($menu as $item)
                @if (count($item['children']))
                @else
                    <li class="swiper-slide"><a target="_self" href="{{$item['link']}}"
                                                class="">{{$item['name']}}</a></li>
                @endif
            @endforeach
        </ul>
        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
</div>

<script type="text/javascript">
    $('#dsSoInput').on('keyup',function(){
        $("#result").html('');
        $value = $(this).val();
        if(!$value){
            $("#result").html('');
            return;
        }
        $.ajax({
            type: 'get',
            url: '{{ URL::to('search') }}',
            data: {
                'search': $value
            },
            success:function(data){
                $("#result").html('')
                $.each(data, function(key, value){
                    $('#result').append('<a href="'+value.slug+'"><div class="rowsearch"> <div class="column lefts"> <img src="'+value.image+'" width="50" /> </div> <div class="column rights"><p> '+value.title+' ' + '</p><p> '+value.original_title+'| '+value.year+' </p></div> </div></a>' )
                });
            }
        });
    })
    document.body.addEventListener("click", function (event) {
        $("#result").html('');
    });
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
