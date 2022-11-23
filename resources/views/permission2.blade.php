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
                        <h3 class="text-light">Permission Super Admin</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
                                class="bi-plus-circle me-2"></i>Add New Account</button>
                    </div>
                    <form action="#" method="POST" id="permission" enctype="multipart/form-data">
                        <div class="modal-body p-4 bg-light">
                            <input type="hidden" name="emp_id" id="emp_id">

                            <div class="my-2">
                                <label for="create_member">Create member</label>
{{--                                <div class="task-cbx" id="1">--}}
{{--                                    <input type="checkbox" unchecked>--}}
{{--                                </div>--}}
                                @can('Create member')
                                <select id="add_mem">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="add_mem">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan
                            </div>

                            <div class="my-2">
                                <label for="create_member">Update member</label>
                                @can('Edit member')
                                <select id="edit_mem">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="edit_mem">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan

                            </div>
                            <div class="my-2">
                                <label for="create_member">Delete member</label>
                                @can('Delete member')
                                <select id="del_mem">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="del_mem">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan

                            </div>
                            <div class="my-2">
                                <label for="create_member">Create admin</label>
                                @can('Create admin')
                                <select id="add_ad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="add_ad">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan

                            </div>
                            <div class="my-2">
                                <label for="create_member">Update admin</label>
                                @can('Edit admin')
                                <select id="edit_ad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="edit_ad">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan

                            </div>
                            <div class="my-2">
                                <label for="create_member">Delete admin</label>
                                @can('Delete admin')
                                <select id="del_ad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="del_ad">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan

                            </div>
                            <input type="hidden" name="role" id="role" value="1">
                            <div class="my-2">
                                <label for="create_member">Create super admin</label>
                                @can('Create super admin')
                                <select id="add_sad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="add_sad">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan

                            </div>
                            <div class="my-2">
                                <label for="create_member">Update super admin</label>
                                @can('Edit super admin')
                                <select id="edit_sad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="edit_sad">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan

                            </div>
                            <div class="my-2">
                                <label for="create_member">Delete super admin</label>
                                @can('Delete super admin')
                                <select id="del_sad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>
                                @else
                                    <select id="del_sad">
                                        <option value="0">Unuse</option>
                                        <option value="1">Use</option>
                                    </select>
                                @endcan

                            </div>
                        </div>
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" id="add_permission_btn" class="btn btn-primary">Add permission</button>--}}

{{--                        </div>--}}
                    </form>

                </div>
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

            $("#add_mem").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#add_mem" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',1)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })

            $("#edit_mem").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#edit_mem" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',2)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })

            $("#del_mem").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#del_mem" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',3)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })

            $("#add_ad").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#add_ad" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',4)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })

            $("#edit_ad").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#edit_ad" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',5)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })

            $("#del_ad").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#del_ad" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',6)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })

            $("#add_sad").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#add_sad" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',7)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })

            $("#edit_sad").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#edit_sad" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',8)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })

            $("#del_sad").click(function(e) {
                let role = $("input[name=role]").val();
                let per_mem_add = $( "#del_sad" ).val();
                console.log(per_mem_add);
                let url = '{{ route('updatePermission',9)}}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        role:role,
                        per_mem_add:per_mem_add,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            })


        });
    </script>

    </body>

    </html>
