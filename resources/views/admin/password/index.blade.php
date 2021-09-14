@extends('adminlte::page')

@section('title', 'Password Update')

@section('content_header')
<h1>Change Your Password</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- <div id="app">
       </div> --}}
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <h5>@if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{session()->get('message')}}
                                </div>
                                @endif</h5>
                            <form class="form-horizontal" method="POST" action="{{url('password/update')}}">
                                @method('patch')
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="old_password" id="inputName"
                                            placeholder="Old Password">
                                        @if ($errors->has('old_password'))
                                        <div class="error">{{$errors->first('old_password')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="inputName2" placeholder="New Password">
                                        @if ($errors->has('password_confirmation'))
                                        <div class="error">{{$errors->first('password_confirmation')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" value=""
                                            id="inputEmail" placeholder="Confirm Password">
                                        @if ($errors->has('password'))
                                        <div class="error">{{$errors->first('password')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>


    </div>
</div>
@stop
@section('js')

@stop
