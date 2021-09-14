@extends('adminlte::page')
@section('title', 'Edit User')

@section('content_header')
<h5>@if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
    @endif</h5>
@stop
@section('content')
<div class="row">
    <div class="col-12 col-md-12 col-xs-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form class="form-group" action="{{url('admin/users/'.$user->uuid)}}" method="post"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Enter Name" value="{{ $user->name }}"
                            class="form-control">
                        @if ($errors->has('name'))
                        <div class="error">{{$errors->first('name')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('page_js')
<script>
</script>
@stop
