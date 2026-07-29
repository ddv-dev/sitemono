@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    @include('partials.hero')

    @include('partials.why')

    @include('partials.calculator')

    @include('partials.services')

    @include('partials.process')

@endsection
