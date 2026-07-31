@extends('layouts.app')

@section('title', 'Доставка бетона по Московской области')

@section('content')

    @include('delivery.hero')

    @include('delivery.trust')

    @include('delivery.zones')

    @include('delivery.cities')

    @include('delivery.autopark')

    @include('partials.footer')

@endsection
