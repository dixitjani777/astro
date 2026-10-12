<div class="light-sidebar">
    <div class="light-sidebar-block">
        <h3>Explore</h3>
        <ul class="list-unstyled">
            <li><a href="{{ url('/astrology/about') }}">Astrology</a></li>
            <li><a href="{{ url('/horoscope/about') }}">Horoscope</a></li>
            <li><a href="{{ url('/gemstone/about') }}">Gemstones</a></li>
            <li><a href="{{ url('/panditji/services') }}">Panditji Services</a></li>
            <li><a href="{{ url('/vastu') }}">Vastu Shastra</a></li>
        </ul>
    </div>

    @if(!empty($sidebarAdBanners) && $sidebarAdBanners->isNotEmpty())
        <div class="light-sidebar-block">
            @foreach($sidebarAdBanners as $banner)
                <a href="{{ $banner->link_url ?: '#' }}" @if($banner->link_url) target="_blank" rel="noopener" @endif>
                    <img src="{{ asset('storage/' . ltrim($banner->image_path, '/')) }}" alt="{{ $banner->title ?: 'Advertisement' }}" class="img-responsive">
                </a>
            @endforeach
        </div>
    @endif
</div>
