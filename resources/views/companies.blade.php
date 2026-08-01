@extends('layouts.app')

@section('title', 'Компаниям — поставки бетона для B2B')

@section('content')

    @include('companies.hero')

    @include('companies.trust')

    @include('companies.conditions')

    @include('companies.docs')

    @include('companies.objects')

@endsection
