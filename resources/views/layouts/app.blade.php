<!DOCTYPE html>
<html lang="ru">

@php
    $brand = config('seo.brand', 'ПСМ-Монолит');
    $routeName = request()->route()?->getName();
    $seo = array_merge(config('seo.default', []), config('seo.routes.' . $routeName, []));

    $seoTitle = $seo['title'] ?? $brand;
    $pageTitle = \Illuminate\Support\Str::contains($seoTitle, $brand) ? $seoTitle : $seoTitle . ' — ' . $brand;
    $seoDescription = $seo['description'] ?? '';
    $seoKeywords = $seo['keywords'] ?? '';
    $canonical = url()->current();
    $ogImage = asset('images/base/logo.svg');
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    @if ($seoKeywords)
        <meta name="keywords" content="{{ $seoKeywords }}">
    @endif
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $canonical }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:site_name" content="{{ config('seo.site_name', $brand) }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">

    <link rel="sitemap" type="application/xml" title="Карта сайта" href="{{ url('/sitemap.xml') }}">

    @include('partials.schema')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('partials.header')

    <main class="main">
        @yield('content')
    </main>

    @include('partials.footer')

    @include('partials.order-modal')

</body>

</html>
