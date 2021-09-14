@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
<h1>Update Profile</h1>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- /.col -->
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
                            <h6>

                                @if (isset($emailStatus))
                                @if ($emailStatus->isverify == 0)
                                <div class="alert alert-warning">
                                    <strong>{{$emailStatus->email}}</strong> is not verified yet. Please check your
                                    email for verification email.
                                    <span class="badge badge-primary">
                                        <form method="post" action="{{url('email/resend')}}">
                                            @method('post')
                                            @csrf
                                            <button type="submit">Resend Email</button>
                                        </form>
                                    </span>
                                    <span class="badge badge-primary">
                                        <form method="post" action="{{url('email/cancel')}}">
                                            @method('post')
                                            @csrf
                                            <button type="submit">Cancel</button>
                                        </form>
                                    </span>
                                </div>
                                @endif
                                @endif
                            </h6>
                            <form class="form-horizontal" method="POST" action="{{url('profile/update')}}">
                                @method('patch')
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{Auth::user()->name}}"
                                            name="name" id="inputName" placeholder="First name">
                                        @if ($errors->has('name'))
                                        <div class="error">{{$errors->first('name')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="{{ old('email') }}" name="email"
                                            value="" id="inputEmail" placeholder="{{Auth::user()->email}}">
                                        @if ($errors->has('email'))
                                        <div class="error">{{$errors->first('email')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@stop
@section('js')
<script>
    // alert('hii');
  //       var url = '/api/v1/admin/email/resend'
</script>
@stop
