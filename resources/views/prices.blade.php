@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    @include('prices.hero')

    @include('partials.pumps')
    @include('partials.price')
    @include('partials.calculator')
    @include('prices.terms')

@endsection
