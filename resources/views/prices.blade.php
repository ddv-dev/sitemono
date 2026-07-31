@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    @include('prices.hero')

    @include('partials.calculator')
    @include('prices.terms')
    @include('partials.pumps')

@endsection
