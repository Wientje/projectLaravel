@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin</div>

                    <div class="card-body">
                        <table style="width:100%">
                            @can('isAdmin')
                                @foreach($users as $user)

                                    <tr>
                                        <td>{{$user['name']}}</td>
                                        <td>{{$user['email']}}</td>
                                        <td>{{$user['role']}}</td>
                                        <td>
                                            <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                                        </td>
                                    </tr>

                                @endforeach
                            @endcan
                            @cannot('isAdmin')
                                <span> Not authorized</span>
                            @endcannot
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: {{ route('admin.changeStatus') }},
                    data: {'status': status, 'users_id': user_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endsection
