<div class="library-box scroll-box">
    <div class="scroll-content"><a class="library-item library-item-first">Quốc gia</a>
        <div class="library-list">
            @foreach (\Ophim\Core\Models\Region::fromCache()->all() as $item)
            <a class="library-item @if (request('regions') == $item->id)) selected @endif"
               href="/?search={{request('search')}}&regions={{$item->id}}&years={{request('years')}}&types={{request('types')}}&sorts={{request('sorts')}}&categorys={{request('categorys')}}">{{ $item->name }}</a>
            @endforeach
        </div>
    </div>
</div>
<div class="library-box scroll-box">
    <div class="scroll-content"><a class="library-item library-item-first">Thể loại</a>
        <div class="library-list">
            @foreach (\Ophim\Core\Models\Category::fromCache()->all() as $item)
            <a class="library-item @if (request('categorys') == $item->id)) selected @endif"
               href="/?search={{request('search')}}&regions={{request('regions')}}&years={{request('years')}}&types={{request('types')}}&sorts={{request('sorts')}}&categorys={{$item->id}}">{{ $item->name }}</a>
            @endforeach
        </div>
    </div>
</div>
<div class="library-box scroll-box">
    <div class="scroll-content"><a class="library-item library-item-first">Năm</a>
        <div class="library-list">
            @foreach ($years as $year)
            <a class="library-item @if (request('years') == $year)) selected @endif"
               href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&types={{request('types')}}&sorts={{request('sorts')}}&years={{ $year }}">{{ $year }}</a>
            @endforeach
        </div>
    </div>
</div>
<div class="library-box scroll-box">
    <div class="scroll-content"><a class="library-item library-item-first">Định dạng</a>
        <div class="library-list">
            <a class="library-item @if (request('types') == 'series')) selected @endif"
               href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&sorts={{request('sorts')}}&types=series">Phim bộ</a>
            <a class="library-item @if (request('types') == 'single')) selected @endif"
               href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&sorts={{request('sorts')}}&types=single">Phim lẻ</a>
        </div>
    </div>
</div>
<div class="library-box scroll-box">
    <div class="scroll-content"><a class="library-item library-item-first">Sắp xếp</a>
        <div class="library-list">
            <a class="library-item @if (request('sorts') == 'update')) selected @endif"
               href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=update">Thời gian cập nhật</a>
            <a class="library-item @if (request('sorts') == 'create')) selected @endif"
               href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=create">Thời gian đăng</a>
            <a class="library-item @if (request('sorts') == 'year')) selected @endif"
               href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=year">Năm sản xuất</a>
            <a class="library-item @if (request('sorts') == 'view')) selected @endif"
               href="/?search={{request('search')}}&regions={{request('regions')}}&categorys={{request('categorys')}}&years={{request('years')}}&types={{request('types')}}&sorts=view">Lượt xem</a>
        </div>
    </div>
</div>
