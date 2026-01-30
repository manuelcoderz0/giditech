@if($seo)
    <meta name="title" Content="GidiTech">
    <meta name="description" content="{{ @$seo_contents->description ?? $seo->description }}">
    <meta name="keywords" content="{{ implode(',',@$seo_contents->keywords ?? $seo->keywords) }}">
    <link rel="shortcut icon" href="{{ site_favicon() }}" type="image/x-icon">

    <link rel="canonical" href="{{ url()->current() }}" />

    @if ((isset($seo_contents->meta_robots) && $seo_contents->meta_robots) || (isset($seo->meta_robots) && $seo->meta_robots))
        <meta name="robots" content="{{ isset($seo_contents->meta_robots) && $seo_contents->meta_robots ? $seo_contents->meta_robots : $seo->meta_robots }}" />
    @endif
    {{--<!-- Apple Stuff -->--}}
    <link rel="apple-touch-icon" href="{{ site_logo() }}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="">
    {{--<!-- Google / Search Engine Tags -->--}}
    <meta itemprop="name" content="">
    <meta itemprop="description" content="{{ @$seo_contents->description ?? $seo->description }}">
    <meta itemprop="image" content="{{ $seo_image ?? get_image(get_file_path('seo') .'/'. $seo->image) }}">
    {{--<!-- Facebook Meta Tags -->--}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ @$seo_contents->social_title ?? $seo->social_title }}">
    <meta property="og:description" content="{{ @$seo_contents->social_description ?? $seo->social_description }}">
    <meta property="og:image" content="{{ $seo_image ?? get_image(get_file_path('seo') .'/'. $seo->image) }}">
    <meta property="og:image:type" content="image/{{ pathinfo($seo_image ?? get_image(get_file_path('seo') .'/'. $seo->image), PATHINFO_EXTENSION) ?: 'jpeg' }}">
    @php $image_size = explode('x', get_file_size('seo')) @endphp
    <meta property="og:image:width" content="{{ $image_size[0] }}">
    <meta property="og:image:height" content="{{ $image_size[1] }}">
    <meta property="og:url" content="{{ url()->current() }}">
    {{--<!-- Twitter Meta Tags -->--}}
    <meta name="twitter:card" content="summary_large_image">
@endif