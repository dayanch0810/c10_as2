@extends('layouts.app')
@section('title')
    c10_as2
@endsection
@section('content')
    @include('home.index.league')
    <div class="container-lg py-4">
        <div class="row g-4">
            <div class="col-sm-6">@include('home.index.club')</div>
            <div class="col-sm-6">@include('home.index.matches')</div>
        </div>
    </div>
@endsection
