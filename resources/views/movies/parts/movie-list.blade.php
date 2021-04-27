@if($movies->isEmpty())
    <h2>Movie list is empty</h2>
@else
    <br>
    <ol>
        @foreach($movies as $movie)
            <li value="{{$movie->id}}">
                <div class="card" >
{{--                    <img src="..." class="card-img-top" alt="...">--}}
                    <div class="card-body">
                        <h5 class="card-title">{{$movie->title}}</h5>
                        <p class="card-text">{{substr($movie->overview, 0, 100)}}...</p>
                        <a href="{{route('movies.show', $movie)}}" class="card-link">View more -></a>
                    </div>
                </div>
            </li>
        @endforeach
    </ol>


@endif
