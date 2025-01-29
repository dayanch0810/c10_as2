@extends('layouts.app')
@section('title')
    {{ $league->name }} | League
@endsection
@section('content')
    <div class="container-lg py-4">
        <div class="h4 mb-3">
            {{ $league->name }}
        </div>
        <div class="row row-cols-3 row-cols-sm-4 row-cols-md-5 row-cols-lg-6 g-1 g-sm-2 mb-4">
            @foreach($club as $c)
                <div class="col">
                    @include('app.club')
                </div>
            @endforeach
        </div>
        <div>
            {{ $club->links() }}
        </div>
    </div>
@endsection
