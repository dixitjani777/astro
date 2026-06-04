@php($type = $banner->content_type ?? 'image')

@if($type === 'html' && $banner->embed_html)
    <div class="mt-5 rounded overflow-hidden">
        {!! $banner->embed_html !!}
    </div>
@elseif($type === 'youtube' && ($banner->youtube_embed_src))
    <div class="mt-5">
        <div class="embed-responsive embed-responsive-16by9 rounded overflow-hidden">
            <iframe class="embed-responsive-item" src="{{ $banner->youtube_embed_src }}" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
            {{ $banner->title ?: 'Featured Video' }}
        </h4>
    </div>
@elseif(($banner->image_path))
    <div>
        <a href="{{ $banner->link_url ?: '#!' }}" {{ $banner->link_url ? 'target=_blank rel=noopener' : '' }} class="mt-5 d-block text-center overlay-dark-hover overlay-opacity-2 rounded overflow-hidden">
            <img class="w-100 img-fluid rounded" src="{{ asset($banner->image_path) }}" alt="{{ $banner->title ?: 'Sponsored Ad' }}">
        </a>
        <h4 class="fs--13 text-gray-500 font-weight-normal mt-1 mb-0">
            {{ $banner->title ?: 'Sponsored Ad' }}
        </h4>
    </div>
@endif

