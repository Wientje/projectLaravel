@extends ('layout')

@section ('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>Your cars</h2>
                    <span class="byline">Did you had any maintenance?</span> </div>

                @foreach($carItems as $carItems)
                    <div class="row">
                        <h2 class="card-title">{{$carItems['title']}}</h2>
                        <img class="card-img" src="{{$carItems['image']}}">
                        <a href="{{route('cars.show', $carItems['id'])}}">Watch maintenance of {{$carItems['title']}}</a>
                    </div>
                @endforeach
            </div>
            <div id="sidebar">
                <ul class="style1">
                    <li class="first">
                        <h3>Amet sed volutpat mauris</h3>
                        <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>
                    </li>
                    <li>
                        <h3>Sagittis diam dolor sit amet</h3>
                        <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>
                    </li>
                    <li>
                        <h3>Maecenas ac quam risus</h3>
                        <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
