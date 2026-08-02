@extends('layouts.app')

@section('content')
    <section class="container py-40">
        <div class="sec-label"><span class="sec-label-line"></span>Навигация</div>
        <h1 class="fs-40 fw-bold mb-40">Карта сайта</h1>

        <ul class="sitemap-list">
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['url'] }}" class="fs-20 fw-medium">{{ $link['title'] }}</a>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
