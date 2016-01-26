@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Role</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{route('role.update',['role'=>$role->id])}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $role->title }}">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{ $role->slug }}" >
                        </div>
                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                            <select multiple="true" id="permissions" name="permissions[]" class="form-control">
                                @foreach($pList as $key=>$val)
                                <option value="{{$key}}" @if(in_array($key,$role->permissions()->lists('id','id')->toArray())) selected @endif > 
                                        {{$val}} 
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
