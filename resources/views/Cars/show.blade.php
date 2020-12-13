@extends ('layout')

@section ('content')
    <div id="wrapper">
        <div id="page" class="container">
            <tr id="content">
                @if($carItems)
                <div class="title">
                    <h2>{{$carItems['title']}}</h2>
                    <span class="byline">Did you had any maintenance?</span> </div>
                    <p><img src="{{$carItems['image']}}" alt="" class="image image-full" /> </p>

                    <table>
                        <tr>
                            <th>Maintenance</th>
                            <th>Odometer</th>
                            <th>Description</th>
                        </tr>
                        @foreach($maintenanceItems as $maintenanceItem)
                            <tr>
                                <td>{{$maintenanceItem['title']}}</td>
                                <td>{{$maintenanceItem['mileage']}}</td>
                                <td>{{$maintenanceItem['description']}}</td>
                            </tr>
                        @endforeach
                    </table>

                    <form method="post" action="{{ route('maintenance.store' )}}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                            @if($errors->has('title'))
                                <span>{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mileage">Odometer</label>
                            <input type="text" class="form-control" id="mileage" name="mileage" required>
                            @if($errors->has('mileage'))
                                <span>{{ $errors->first('mileage') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Desciption</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                            @if($errors->has('description'))
                                <span>{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <button type="submit">Toevoegen</button>
                    </form>


                    <div>
                        <input data-id="{{$carItems->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $carItems->status ? 'checked' : '' }}>
                    </div>
                @else
                    <h2>{{$error}}</h2>
                @endif
                <a href="{{route('cars.index')}}">Back to all cars</a>
            </div>
{{--            <div id="sidebar">--}}
{{--                <ul class="style1">--}}
{{--                    <li class="first">--}}
{{--                        <h3>Amet sed volutpat mauris</h3>--}}
{{--                        <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <h3>Sagittis diam dolor sit amet</h3>--}}
{{--                        <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <h3>Maecenas ac quam risus</h3>--}}
{{--                        <p><a href="#">In posuere eleifend odio. Quisque semper augue mattis wisi. Pellentesque viverra vulputate enim. Aliquam erat volutpat.</a></p>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>

@endsection
