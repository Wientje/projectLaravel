@extends ('layout')

@section ('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
                @if($carItems)
                <div class="title">
                    <h2>{{$carItems['title']}}</h2>
                    <span class="byline">Did you had any maintenance?</span> </div>
                    <p><img src="{{$carItems['image']}}" alt="" class="image image-full" /> </p>
                    <div>
                        <input data-id="{{$carItems->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $carItems->status ? 'checked' : '' }}>
                    </div>

                    @foreach($carMainItems as $carMainItem)
                        <div class="row">
                            <h4 class="card-title">{{$carMainItem['title']}}</h4>
                            <p class="card-title">{{$carMainItem['description']}}</p>
                            <h4 class="card-title">{{$carMainItem['odometer']}}</h4>
                        </div>
                    @endforeach
                @else
                    <h2>{{$error}}</h2>
                @endif
                <a href="{{route('cars.index')}}">Back to all cars</a>
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
