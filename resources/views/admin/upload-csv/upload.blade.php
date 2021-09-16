@extends('adminlte::page')

@section('title', 'Send Mail')

@section('content_header')
<h1>Upload CSV And Send Mail</h1>
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
                            <form class="form-horizontal" method="POST" action="{{url('csv/upload/store')}}" enctype="multipart/form-data">
                                @method('post')
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Choose CSV</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="file" id="inputName">
                                        @if ($errors->has('file'))
                                        <div class="error">{{$errors->first('file')}}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Upload CSV</button>
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
