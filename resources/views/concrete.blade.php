@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    @include('concrete.hero')
    @include('partials.qualities')

    @include('partials.calculator')


@endsection
