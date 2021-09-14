@extends('adminlte::page')

@section('title', 'Users')

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
                <h3 class="card-title">Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover dataTable" data-module="customers-dt">
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th class="action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $ii = 1;
                        @endphp
                        @foreach ($users as $item)
                        <tr>
                            <td>{{ $ii++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td><span
                                    class="badge badge-{{ ($item->isActive == 1) ? 'success' : 'danger' }}">{{ ($item->isActive == 1) ? 'Published' : 'Disabled' }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle"
                                        data-toggle="dropdown">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="/admin/users/{{ $item->uuid }}/edit">Edit
                                            User</a>
                                        {{-- <a class="dropdown-item cloned-user" data-uuid="{{ $item->uuid }}">Clone
                                        User</a> --}}
                                        <a class="dropdown-item disable-record"
                                            data-status="{{ ($item->isActive == 0) ? '1' : '0' }}"
                                            data-uuid="{{ $item->uuid }}"
                                            href="#">{{ ($item->isActive == 0) ? 'Publish' : 'Disable' }}
                                            User</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('adminlte_js')
<script>
    $(document).ready( function(){
    //     $('.cloned-user').on('click', function(){
    //         var uuid = $(this).data('uuid');
    //         swal({
    //                 title: "Are you sure?",
    //                 text: "Once Cloned, you will not be able to delete this cloned user..!",
    //                 icon: "warning",
    //                 buttons: true,
    //                 dangerMode: true,
    //                 })
    //                 .then((willClone) => {
    //                 if (willClone) {
    //                     $.ajax({
    //                         type: "POST",
    //                         url: "{{ url('admin/users/clone') }}/"+uuid,
    //                         data:{ "_token": "{{ csrf_token() }}",},
    //                         dataType: "json",
    //                         success: function(response){
    //                             if (response.status == 200) {
    //                                 swal(response.message, {
    //                                 icon: "success",
    //                                 });
    //                                 location.reload();
    //                             }else{
    //                                 swal(response.message, {
    //                                 icon: "error",
    //                                 });
    //                             }

    //                         }
    //                      });


    //                 } else {
    //                     swal("User not cloned!");
    //                 }
    //             });
    //    })

       $('.disable-record').on('click', function(){
            var uuid = $(this).data('uuid');
            var status = $(this).data('status');
            var messageStatus = (status == 1) ? 'Enable' : 'Disable';
            swal({
                    title: "Are you sure?",
                    text: "Do you want to "+messageStatus+" this User!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "{{ url('admin/users/disable') }}/"+uuid,
                            data:{ "_token": "{{ csrf_token() }}",status:status},
                            dataType: "json",
                            success: function(response){
                                if (response.status == 200) {
                                    swal(response.message, {
                                    icon: "success",
                                    });
                                    location.reload();
                                }else{
                                    swal(response.message, {
                                    icon: "error",
                                    });
                                }

                            }
                         });


                    } else {
                        swal("Your User is safe!");
                    }
                });
       })

});
</script>

@stop
