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
                        <h3 class="text-light">Manage Account</h3>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addAccountModal"><i
                                class="bi-plus-circle me-2"></i>Add New Account</button>
                    </div>
                    <table class="table table-striped table-sm text-center align-middle">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Adress</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($accounts as $account)
                            <tr>
                                <td> {{$account->name}}</td>
                                <td> {{$account->phone}}</td>
                                <td> {{$account->gender}}</td>
                                <td> {{$account->status}}</td>
                                <td> {{$account->address}}</td>
                                <td> {{$account->role_id}}</td>
                                <td>
                                    <a href="#" id="{{$account->id}}" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editAccountModal{{$account->id}}"><i class="bi-pencil-square h4"></i></a>
                                    <a href="#" id="{{$account->id}}" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                </td>

                            </tr>
                            {{-- edit employee modal start --}}
                            <form action="{{route('updateAccount', $account->id)}}" method="post" id="edit_account_form" enctype="multipart/form-data">
                                @csrf
                                <div class="modal fade" id="editAccountModal{{$account->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                     data-bs-backdrop="static" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Account</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <input type="hidden" name="id" id="id">
                                            <div class="modal-body p-4 bg-light">
                                                <div class="my-2">
                                                    <label for="email">Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{$account->name}}" required>
                                                </div>
                                                <div class="my-2">
                                                    <label for="phone">Phone</label>
                                                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{$account->phone}}" required>
                                                </div>
                                                <div class="my-2">
                                                    <label for="gender">Gender</label>
                                                    <input type="text" name="gender" id="gender" class="form-control" placeholder="Gender" value="{{$account->gender}}" required>
                                                </div>
                                                <div class="my-2">
                                                    <label for="status">Status</label>
                                                    <input type="text" name="status" id="status" class="form-control" placeholder="Status" value="{{$account->status}}" required>
                                                </div>
                                                <div class="my-2">
                                                    <label for="address">Adress</label>
                                                    <input type="text" name="address" id="address" class="form-control" placeholder="Adress" value="{{$account->address}}" required>
                                                </div>
                                                <input type="hidden" name="role_id" id="role_id" value="{{$account->role_id}}">
                                                <input type="hidden" name="password" id="password" value="{{$account->password}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" id="edit_account_btn" class="btn btn-success">Update Member</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                            {{-- edit employee modal end --}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    {{-- add new member modal start --}}
    <div class="modal fade" id="addAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel"
         data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('storeAccount')}}" method="POST" id="add_account_form" enctype="multipart/form-data">
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
                            <label for="gender">Gender</label>
                            <input type="text" name="gender" class="form-control" placeholder="Gender" required>
                        </div>
                        <div class="my-2">
                            <label for="status">Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Status" required>
                        </div>
                        <div class="my-2">
                            <label for="address">Adress</label>
                            <input type="text" name="address" class="form-control" placeholder="Adress" required>
                        </div>
                        <div class="my-2">
                            <label for="role_id">Role</label>
                            <input type="text" name="role_id" class="form-control" placeholder="Role_id" required>
                        </div>
                        <div class="my-2">
                            <label for="password">Passwprd</label>
                            <input type="text" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_account_btn" class="btn btn-primary">Add Account</button>

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
            // delete employee ajax request
            $(document).on('click', '.deleteIcon', function(e) {
                e.preventDefault();
                e.preventDefault();
                let id = $(this).attr('id');
                // console.log(id);
                let url = '{{ route('destroyAccount',':id')}}';
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
                            }
                        });
                    }
                })
            });

        });
    </script>
    </body>

    </html>
