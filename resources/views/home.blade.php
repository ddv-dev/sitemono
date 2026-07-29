@extends('layouts.app')

@section('title', 'Главная')

@section('content')

    @include('home.hero')

    @include('home.why')

    @include('home.calculator')

    @include('home.services')

    @include('home.process')

    @include('partials.contacts')

@endsection
