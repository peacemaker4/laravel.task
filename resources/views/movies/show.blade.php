@extends('layouts.app')

@section('content')
    <h1>Movie info</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$movie->title}}</h5>
            @if($movie->poster)
                <img width="500px" src="{{ Storage::url($movie->poster) }}">
                @can('update', $movie)
                    <form action="{{route('movies.removePoster',$movie)}}" method="post">
                        @csrf @method('put')
                        <button class="btn btn-danger">Delete poster</button>
                    </form>
                @endcan
                <a class="btn btn-success" href="{{ Storage::url($movie->poster) }}" download>Download</a>
            @endif
            <p class="card-text">{{$movie->overview}}</p>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">Director: {{$movie->director}}</li>
            <li class="list-group-item">Country: {{$movie->country}}</li>
            <li class="list-group-item">Release: {{$movie->release_date}}</li>
            <li class="list-group-item">Added by:
                    {{$movie->user->name}}
            </li>
            @if($movie->subtitles)
                @can('update', $movie)
                    <form action="{{route('movies.removeSubtitles',$movie)}}" method="post">
                        @csrf @method('put')
                        <button class="btn btn-danger">Delete subtitles</button>
                    </form>
                @endcan
                <a class="btn btn-info" href="{{ Storage::url($movie->subtitles) }}" download>Download subtitles</a>
            @endif
        </ul>
        <div class="card-body">
            @can('delete', $movie)
                <form action="{{route('movies.destroy', $movie)}}" method="post">
                    @csrf @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            @endcan
            @can('update', $movie)
                <form method="get" action="{{route('movies.edit', $movie)}}">
                    <button class="btn btn-warning">Edit</button>
                </form>
            @endcan
        </div>
    </div>
@endsection



