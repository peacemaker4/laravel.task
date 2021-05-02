@extends('layouts.app')

@section('content')
    <h1>Movies List:</h1>

    @auth
        <a class="btn btn-primary" href="{{route('movies.create')}}" role="button">
            Add movie
        </a>
    @endif

    @component('movies.parts.movie-list', ['movies'=>$movies])@endcomponent
@endsection
