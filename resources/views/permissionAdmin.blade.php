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
                        <h3 class="text-light">Permission Admin</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
                                class="bi-plus-circle me-2"></i>Add New Account</button>
                    </div>
                    <form action="#" method="POST" id="permission" enctype="multipart/form-data">
                        <div class="modal-body p-4 bg-light">
                            <input type="hidden" name="emp_id" id="emp_id">
                            <div class="my-2">
                                <label for="create_member">Create member</label>
                                <select id="add_mem">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>

                            </div>
                            <div class="my-2">
                                <label for="create_member">Update member</label>
                                <select id="edit_mem">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>

                            </div>
                            <div class="my-2">
                                <label for="create_member">Delete member</label>
                                <select id="del_mem">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>

                            </div>
                            <div class="my-2">
                                <label for="create_member">Create admin</label>
                                <select id="add_ad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>

                            </div>
                            <div class="my-2">
                                <label for="create_member">Update admin</label>
                                <select id="edit_ad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>

                            </div>
                            <div class="my-2">
                                <label for="create_member">Delete admin</label>
                                <select id="del_ad">
                                    <option value="1">Use</option>
                                    <option value="0">Unuse</option>
                                </select>

                            </div>
                            <input type="hidden" name="role" id="role" value="2">

                        </div>
                        <div class="modal-footer">
                            <button type="button" id="add_permission_btn" class="btn btn-primary">Add permission</button>

                        </div>
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

            // update employee ajax request
            $("#add_permission_btn").click(function(e) {
                e.preventDefault();
                let role = $("input[name=role]").val();
                console.log(role);
                console.log(8882);
                let per_mem_add = $( "#add_mem" ).val();
                let per_mem_edit = $( "#edit_mem" ).val();
                let per_mem_del = $( "#del_mem" ).val();
                let per_ad_add = $( "#add_ad_" ).val();
                let per_ad_edit = $( "#edit_ad" ).val();
                let per_ad_del = $( "#del_mem" ).val();
                let per_sad_add = $( "#add_sad" ).val();
                let per_sad_edit = $( "#edit_sad" ).val();
                let per_sad_del = $( "#del_sad" ).val();
                $("#add_permission_btn").text('Updating...');
                let url = '{{ route('indexPermission')}}';

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
                        per_mem_edit:per_mem_edit,
                        per_mem_del:per_mem_del,
                        per_ad_add:per_ad_add,
                        per_ad_edit:per_ad_edit,
                        per_ad_del:per_ad_del,
                        per_sad_add:per_sad_add,
                        per_sad_edit:per_sad_edit,
                        per_sad_del:per_sad_del,
                    },
                    dataType: 'json',

                    success:function(response){
                        console.log(response);
                        if(response) {
                            $('.success').text(response.success);
                            console.log("success")
                            $("#add_permission_btn").text('Add permission');
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });

        });
    </script>

    </body>

    </html>
