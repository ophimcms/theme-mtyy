@extends('themes::thememtyy.layout')

@php
    $years = Cache::remember('all_years', \Backpack\Settings\app\Models\Setting::get('site_cache_ttl', 5 * 60), function () {
        return \Ophim\Core\Models\Movie::select('publish_year')
            ->distinct()
            ->pluck('publish_year')
            ->sortDesc();
    });
@endphp

@section('content')
    <script>
        var body = document.body;
        body.classList.add("library");
        body.classList.add("page");
    </script>
    <main id="main" class="wrapper">
        <div class="content">
            <div class="page-heading">
                <div class="box">
                    <div class="library-box library-box-first scroll-box ovauto">
                        <div class="scroll-content">
                            <div class="library-list"><a href="{{ url()->current() }}"
                                                         class="library-item selected"
                                                         title="{{ $section_name ?? 'Danh Sách Phim' }}">{{ $section_name ?? 'Danh Sách Phim' }}</a>
                            </div>
                        </div>
                    </div>
                    @include('themes::thememtyy.inc.catalog_filter')
                </div>
            </div>
            <div class="module">
                <div class="module-list">
                    <div class="module-items">
                        @if (count($data))
                            @foreach ($data as $movie)
                                @include('themes::thememtyy.inc.section.movie_card')
                            @endforeach
                        @else
                            <p class="text-danger">Không có dữ liệu cho mục này</p>
                        @endif
                    </div>
                </div>
            </div>
            {{ $data->appends(request()->all())->links("themes::thememtyy.inc.pagination") }}
        </div>
    </main>

@endsection
