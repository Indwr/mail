@extends('adminlte::page')

@section('title', 'Compltedl Query')

@section('content_header')
<h5>@if (session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div>
    @endif</h5>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Completed Query</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover dataTable" data-module="customers-dt">
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Organization Name</th>
                            <th>Product Name</th>
                            <th>Location</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $ii = 1;
                        @endphp
                        @foreach ($result as $item)
                        <tr>
                            <td>{{ $ii++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->org_name }}</td>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ $item->location }}</td>
                            <td>{{ $item->message }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $result->links() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
<script>
</script>

@stop
