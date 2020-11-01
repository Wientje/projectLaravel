@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <table style="width:100%">
                        @foreach($users as $user)

                                <tr>
                                    <th>{{$user['name']}}</th>
                                    <th>{{$user['email']}}</th>
                                    <th>{{$user['role']}}</th>
                                </tr>

                        @endforeach
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
