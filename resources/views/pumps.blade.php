@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    @include('pumps.hero')

    @include('partials.pumps')

    @include('pumps.why')
    @include('pumps.includes')
    @include('pumps.cars')

@endsection
