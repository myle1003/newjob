@extends('layouts.app')

@section('styles')

@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>



    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List member</h3>
                        </div>


                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addMemberModal"><i
                                        class="bi-plus-circle me-2"></i>Add New Member</button>
{{--                                <table class="table table-striped table-sm text-center align-middle">--}}
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Adress</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($members as $member)
                                        <tr>
                                            <td> {{$member->name}}</td>
                                            <td> {{$member->phone}}</td>
                                            <td> {{$member->gender}}</td>
                                            <td> {{$member->status}}</td>
                                            <td> {{$member->address}}</td>
                                            <td>
                                                <a href="#" id="' . $member->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>

                                                <a href="#" id="' . $member->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
{{--                                </table>--}}
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{--         add new member modal start --}}
<div class="modal fade" id="addMemberModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="add_member_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4 bg-light">
                    <div class="my-2">
                        <label for="email">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="my-2">
                        <label for="phone">Phone</label>
                        <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                    </div>
                    <div class="my-2">
                        <label for="post">Gender</label>
                        <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                    </div>
                    <div class="my-2">
                        <label for="avatar">Status</label>
                        <input type="text" name="status" class="form-control" placeholder="Status" required>
                    </div>
                    <div class="my-2">
                        <label for="avatar">Adress</label>
                        <input type="text" name="address" class="form-control" placeholder="Adress" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="add_member_btn" class="btn btn-primary">Add Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--         add new member modal end --}}

@section('scripts')

    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endsection

<script>
    $(function() {

        // add new member ajax request
        $("#add_member_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_member_btn").text('Adding...');
            $.ajax({
                url: '{{ route('storeMember') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Added!',
                            'Member Added Successfully!',
                            'success'
                        )

                    }
                    $("#add_member_btn").text('Add Member');
                    $("#add_member_form")[0].reset();
                    $("#addMeberModal").modal('hide');
                }
            });
        });



</script>
