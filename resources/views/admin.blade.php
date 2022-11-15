@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<body class="bg-light">
<div class="container">
    <div class="row my-5">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header bg-danger d-flex justify-content-between align-items-center">
                    <h3 class="text-light">Manage Member</h3>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addMemberModal"><i
                            class="bi-plus-circle me-2"></i>Add New Member</button>
                </div>
                <table class="table table-striped table-sm text-center align-middle">
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
                            <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>

                            <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
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
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_member_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="emp_id" id="emp_id">
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
                        <label for="post">Gender</label>
                        <input type="text" name="gender" id="gender" class="form-control" placeholder="Gender" required>
                    </div>
                    <div class="my-2">
                        <label for="avatar">Status</label>
                        <input type="text" name="status" id="status" class="form-control" placeholder="Status" required>
                    </div>
                    <div class="my-2">
                        <label for="avatar">Adress</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Adress" required>
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
                @csrf
                <div class="modal-body p-4 bg-light">
                    <input type="hidden" name="emp_id" id="emp_id">
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
@endsection
{{-- add new member modal end --}}
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        fetchAllMembers();
                    }
                    $("#add_member_btn").text('Add Member');
                    $("#add_member_form")[0].reset();
                    $("#addMeberModal").modal('hide');
                }
            });

            // edit employee ajax request
            {{--$(document).on('click', '.editIcon', function(e) {--}}
            {{--    e.preventDefault();--}}
            {{--    let id = $(this).attr('id');--}}
            {{--    $.ajax({--}}
            {{--        url: '{{ route('showMember') }}',--}}
            {{--        method: 'get',--}}
            {{--        data: {--}}
            {{--            id: id,--}}
            {{--            _token: '{{ csrf_token() }}'--}}
            {{--        },--}}
            {{--        success: function(response) {--}}
            {{--            $("#name").val(response.name);--}}
            {{--            $("#phone").val(response.phone);--}}
            {{--            $("#gender").val(response.gender);--}}
            {{--            $("#status").val(response.status);--}}
            {{--            $("#address").val(response.address);--}}
            {{--        }--}}
            {{--    });--}}
            {{--});--}}
        });


    });
</script>
</body>

</html>
