@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    @include('concrete.hero')
    @include('partials.qualities')

    @include('partials.price')
    @include('partials.calculator')

    @include('concrete.choose')
    @include('concrete.mark')

@endsection
