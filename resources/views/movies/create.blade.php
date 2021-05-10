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

        <div>
            <label for="poster" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 ">
                                                <span>
                                                    <i class="fas fa-plus"></i>
                                                    Upload a photo
                                                </span>
                <input id="poster" name="poster" type="file" class="sr-only">
                @error('poster')
                <div>{{$message}}</div>
                @enderror
            </label>
            <button id="btn-example-file-reset" class="text-red-500 ml-5" type="button"><i class="fas fa-times"></i> Clear image</button>

            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <div id="image_preview">
                    </div>
                </div>
            </div>

        </div>
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
            <div class="input-group">
                <label for="subtitles">Subtitles</label>
                <input type="file" name="subtitles" id="subtitles">
                @error('subtitles')
                <div>{{$message}}</div>
                @enderror

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

        <!--reset input-->
        <script language="javascript" type="text/javascript">
            $(document).ready(function() {
                $('#btn-example-file-reset').on('click', function() {
                    $('#poster').val('');
                    $("#image_preview").html("");
                });
            });
        </script>
        <!--image preview-->
        <script language="javascript" type="text/javascript">
            $(function () {
                $("#poster").change(function () {
                    $("#image_preview").html("");
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    if (regex.test($(this).val().toLowerCase())) {
                        if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                            $("#image_preview").show();
                            $("#image_preview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                        }
                        else {
                            if (typeof (FileReader) != "undefined") {
                                $("#image_preview").show();
                                $("#image_preview").append("<img />");
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    $("#image_preview img").attr("src", e.target.result);
                                }
                                reader.readAsDataURL($(this)[0].files[0]);
                            } else {
                                alert("This browser does not support FileReader.");
                            }
                        }
                    } else {
                        alert("Please upload a valid image file.");
                    }
                });
            });

        </script>

    </form>


@endsection



