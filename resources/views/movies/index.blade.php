@extends('layouts.app')

@section('content')
    <h1>Movies List:</h1>

    <a class="btn btn-primary" href="{{route('movies.create')}}" role="button">
        Add movie
    </a>

    @component('movies.parts.movie-list', ['movies'=>$movies])@endcomponent
@endsection
