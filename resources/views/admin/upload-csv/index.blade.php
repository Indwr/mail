@extends('adminlte::page')

@section('title', 'Total Mails')

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
                <h3 class="card-title">Total Mails</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover dataTable" data-module="customers-dt">
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                            <th>Email Count</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $ii = 1;
                        @endphp
                        @foreach ($mails as $item)
                        <tr>
                            <td>{{ $ii++ }}</td>
                            <td>{{ $item->count }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $mails->links() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
<script>
</script>

@stop
