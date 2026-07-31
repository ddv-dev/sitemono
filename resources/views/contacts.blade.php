@extends('layouts.app')

@section('title', 'Контакты и схема проезда')

@section('content')

    @include('contacts.hero')

    @include('contacts.info')

    @include('contacts.form')

    @include('contacts.requisites')

    @include('contacts.cta')

@endsection
