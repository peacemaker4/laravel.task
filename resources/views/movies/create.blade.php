<?php
$movie=$movie??null;
?>

@extends('layouts.app')

@section('content')
    <h1>Movie {{$movie ? 'edit' : 'add'}}</h1>


    <form enctype="multipart/form-data" method="post" action="{{$movie? route('movies.update', $movie): route('movies.store')}}">
        @csrf

        @if($movie)
            @method('put')
        @endif


        <div class="card">
            <div class="input-group mb-3">
                <input type="text" class="form-control" value="{{old('title', $movie->title ?? null)}}" id="title" name="title" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
                @error('title')
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input value="{{old('director', $movie->director ?? null)}}" type="text" id="director" name="director" class="form-control" placeholder="Director" aria-label="Director" aria-describedby="basic-addon1">
                @error('director')
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="country">Country</label>
                <select class="form-select" id="country" name="country" >
                    <option>Unknown</option>
                    @foreach($countries as $country)
                        @if($movie)
                            @if($country==$movie->country)
                                <option selected>{{$country}}</option>
                            @endif
                        @else
                            <option>{{$country}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="input-group mb-3">
                <input id="release_date"  value="{{old('release_date', $movie->release_date ?? null)}}" autocomplete="off" class="date form-control mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" type="text" name="release_date" required autofocus />
                @error('release_date')
                <span style="color: red">{{$message}}</span>
                @enderror
            </div>

            <div class="input-group">
                <span class="input-group-text">With textarea</span>
                <textarea class="form-control" aria-label="Overview" id="overview" name="overview">
                    {{old('overview', $movie->overview ?? null)}}
                </textarea>
            </div>

            <button class="btn btn-info">{{$movie ? 'Update' : 'Add'}}</button>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

        <script type="text/javascript">
            $('.date').datepicker({
                format: 'yyyy-mm-dd'
            });
        </script>
    </form>

@endsection



