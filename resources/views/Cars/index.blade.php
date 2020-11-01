@extends ('layout')

@section ('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                <div class="title">
                    <h2>Your cars</h2>
                    <span class="byline">Did you had any maintenance?</span> </div>


                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @can('isUser')
                    @foreach($carItems as $carItem)
                        <div class="row">
                            <h2 class="card-title">{{$carItem['title']}}</h2>
{{--                            <h3 class="card-title">{{$carItems ?? ''->user->name}}</h3>--}}
                            <img class="card-img" src="{{$carItem['image']}}">
                            <a href="{{route('cars.show', $carItem['id'])}}">Watch maintenance of {{$carItem['title']}}</a>
                        </div>
                    @endforeach
                @endcan
                    <div>
                        <h3><a href="{{route('cars.create')}}">Add a car to your collection</a></h3>
                    </div>
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
