@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles 
                    <a href="{{route('permission.create')}}" class="pull-right">Add New</a>
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
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->title }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td>
                                    <div class="btn-group col-md-12" > 
                                    <form method="POST" action="{{route('permission.destroy',['permission'=>$permission->id])}}">
                                        <input type="hidden" value="DELETE" name="_method">
                                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                                        <input type="submit" value="Delete" class="btn btn-danger pull-right">
                                    </form>    
                                    <form method="GET" action="{{route('permission.edit',['permission'=>$permission->id])}}">
                                        <input type="submit" value="Edit" class="btn btn-primary pull-right">
                                    </form>
                                        
                                    
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--</div>-->

                    {!! $permissions->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
