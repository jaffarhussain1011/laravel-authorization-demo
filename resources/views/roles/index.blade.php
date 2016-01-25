@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles 
                    <a href="{{route('role.create')}}" class="pull-right">Add New</a>
                </div>

                <div class="panel-body">
                    <!--<div class="container">-->
                    
                    <table class="table table-striped">
                        <thead>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->title }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>
                                    <div class="btn-group col-md-12" > 
                                    <form method="POST" action="{{route('role.destroy',['role'=>$role->id])}}">
                                        <input type="hidden" value="DELETE" name="_method">
                                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                                        <input type="submit" value="Delete" class="btn btn-danger pull-right">
                                    </form>    
                                    <form method="GET" action="{{route('role.edit',['role'=>$role->id])}}">
                                        <input type="submit" value="Edit" class="btn btn-primary pull-right">
                                    </form>
                                        
                                    
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--</div>-->

                    {!! $roles->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
