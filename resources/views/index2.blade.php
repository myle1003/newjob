@extends('layouts.app')

@section('styles')

@endsection

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <body class="bg-light">
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-danger d-flex justify-content-between align-items-center">
                        <h3 class="text-light">Manage Member</h3>
                        @can('Create member')
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addMemberModal"><i
                                class="bi-plus-circle me-2"></i>Add New Member</button>
                        @endcan
                    </div>
                    <table class="table table-striped table-sm text-center align-middle">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)
                            <tr id="member_id_{{$member->id}}">
                                <td id="1"> {{$member->name}}</td>
                                <td id="2"> {{$member->phone}}</td>
                                <td id="3">
                                    @if($member->gender == 1)
                                        Male
                                    @else Female
                                    @endif
                                </td>
                                <td id="4">
                                    @if($member->status == 1)
                                        Doing
                                    @else Done
                                    @endif
                                </td>
                                <td id="5"> {{$member->address}}</td>
                                <td>
                                    @can('Edit member')
                                    <a href="#" id="{{$member->id}}" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editMemberModal"><i class="bi-pencil-square h4"></i></a>
                                    @endcan

                                    @can('Delete member')
                                    <a href="#" id="{{$member->id}}" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                    @endcan
                                </td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- edit employee modal start --}}
    <div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel1"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" id="edit_member_form" enctype="multipart/form-data">
{{--                    @csrf--}}
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="email">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="my-2">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="my-2">
                            <label for="gender">Gender</label>
{{--                            <div class="my-2">--}}
{{--                            <select id="status" name="status" >--}}
{{--                                <option value="0">Female</option>--}}
{{--                                <option value="1">Male</option>--}}
{{--                            </select>--}}
{{--                                </div>--}}
                            <select name="gender" id="gender">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
{{--                            <input type="text" name="gender" id="gender" class="form-control" placeholder="Gender" required>--}}
                        </div>
                        <div class="my-2">
                            <label for="status">Status</label>
{{--                            <div class="my-2">--}}
{{--                            <select  id="status" name="status" >--}}
{{--                                <option value="0">Doing</option>--}}
{{--                                <option value="1">Done</option>--}}
{{--                            </select>--}}
{{--                            </div>--}}
                            <select name="status" id="status">
                                <option value="1">Doing</option>
                                <option value="0">Done</option>
                            </select>
{{--                            <input type="text" name="status" id="status" class="form-control" placeholder="Status" required>--}}
                        </div>
                        <div class="my-2">
                            <label for="address">Adress</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Adress" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="edit_member_btn" class="btn btn-success">Update Member</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit employee modal end --}}

    {{-- add new member modal start --}}
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" id="add_member_form" enctype="multipart/form-data">
{{--                    @csrf--}}
                    <div class="modal-body p-4 bg-light">
                        <input type="hidden" name="emp_id" id="emp_id">
                        <div class="my-2">
                            <label for="email">Name</label>
                            <input type="text" name="name_add" id="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="my-2">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone_add" id="phone" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="my-2">
                            <label for="post">Gender</label>
                            <select name="gender_add" id="gender_add">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                            </select>
{{--                            <input type="text" name="gender_add" id="gender" class="form-control" placeholder="Gender" required>--}}
                        </div>
                        <div class="my-2">
                            <label for="avatar">Status</label>
                            <select name="status_add" id="status_add">
                                <option value="1">Doing</option>
                                <option value="0">Done</option>
                            </select>
{{--                            <input type="text" name="status_add" id="status" class="form-control" placeholder="Status" required>--}}
                        </div>
                        <div class="my-2">
                            <label for="avatar">Address</label>
                            <input type="text" name="address_add" id="address" class="form-control" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="add_member_btn" class="btn btn-primary">Add Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    {{-- add new member modal end --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {

            // update employee ajax request
            $("#edit_member_btn").click(function(e) {
                e.preventDefault();
                let name = $("input[name=name]").val();
                let phone = $("input[name=phone]").val();
                let gender = $( "#gender" ).val();
                let status = $( "#status" ).val();
                let address = $("input[name=address]").val();
                let id = $("input[name=id]").val();
                console.log(name)
                $("#edit_member_btn").text('Updating...');
                let url = '{{ route('updateMember',':id')}}';
                url = url.replace(':id', id);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        name:name,
                        phone:phone,
                        gender:gender,
                        status:status,
                        address:address
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(gender==1){
                            gender='Male'
                        }
                        else{
                            gender='Female'
                        }
                        if(status==1){
                            status='Doing'
                        }
                        else{
                            status='Done'
                        }
                        if(response) {
                            $('.success').text(response.success);
                            $("#edit_member_btn").text('Update Employee');
                            $("#edit_member_form")[0].reset();
                            $("#editMemberModal").modal('hide');
                            $("#member_id_"+id +' #1').text(name);
                            $("#member_id_"+id +' #2').text(phone);
                            $("#member_id_"+id +' #3').text(gender);
                            $("#member_id_"+id +' #4').text(status);
                            $("#member_id_"+id +' #5').text(address);
                        }
                },
                error: function(error) {
                    console.log(error);
                }
                });
            });

            // edit employee ajax request
            $(document).on('click', '.editIcon', function(e) {
                e.preventDefault();
                let id = $(this).attr('id');
                // console.log(id);
                let url = '{{ route('showMember',':id')}}';
                url = url.replace(':id', id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'get',
                    data: null,
                    success: function(response) {
                        $("#id").val(response.id);
                        $("#name").val(response.name);
                        $("#phone").val(response.phone);
                        $("#gender").val(response.gender);
                        $("#status").val(response.status);
                        $("#address").val(response.address);
                    }
                });
            });



            // add new member ajax request
            $("#add_member_btn").click(function(e) {
                e.preventDefault();
                let name = $("input[name=name_add]").val();
                let phone = $("input[name=phone_add]").val();
                let gender = $( "#gender_add" ).val();
                let status = $( "#status_add" ).val();
                let address = $("input[name=address_add]").val();
                console.log( gender)
                $("#add_member_btn").text('Adding...');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('storeMember') }}',
                    method: 'post',
                    data: {
                        name:name,
                        phone:phone,
                        gender:gender,
                        status:status,
                        address:address
                    },
                    dataType: 'json',
                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            $("#add_member_btn").text('Add Member');
                            $("#add_member_form")[0].reset();
                            $("#addMemberModal").modal('hide');
                            if(gender){
                                gender='Male'
                            }
                            else{
                                gender='Female'
                            }
                            if(status){
                                status='Doing'
                            }
                            else{
                                status='Done'
                            }
                            $('tbody').append('<tr id="member_id_'+response.id+'"><td id="1">'+name+'</td><td id="2">'+phone+'</td><td id="3">'+gender+'</td>' +
                                '<td id="4">'+status+'</td><td id="5">'+address+'</td><td>'+
                                '<a href="#" id="'+ response.id +'"  class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editMemberModal"><i class="bi-pencil-square h4"></i></a> ' +
                                '<a href="#" id="'+ response.id +'" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a> </td></td></tr>')
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            });

            // delete employee ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                e.preventDefault();
                let id = $(this).attr('id');
                // console.log(id);
                let url = '{{ route('destroyMember',':id')}}';
                url = url.replace(':id', id);
                let csrf = '{{ csrf_token() }}';
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: 'delete',
                            data: {
                                id: id,
                                _token: csrf
                            },
                            success: function(response) {
                                console.log(response);
                                $("#member_id_" + id).remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                $("#member_id_"+id).remove()
                            }
                        });
                    }
                })
            });

        });
    </script>
    </body>

    </html>
