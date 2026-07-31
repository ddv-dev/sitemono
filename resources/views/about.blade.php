@extends('layouts.app')

@section('title', 'О заводе')

@section('content')

    @include('about.hero')

    @include('about.qualities')

    @include('about.process')

    @include('about.lab')

    @include('about.production')

    @include('about.documents')

@endsection
