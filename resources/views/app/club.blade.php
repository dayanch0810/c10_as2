@extends('layouts.app')
@section('title')
    {{ $league->name }} | League
@endsection
@section('content')
    <div class="container-lg py-4">
        <div class="h4 mb-3">
            {{ $league->name }}
        </div>

        <div>
            {{ $club->links() }}
        </div>
    </div>
@endsection
