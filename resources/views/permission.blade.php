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
                                <td> {{$account->role_id}}</td>
                                <td> {{$account->address}}</td>
                                <td>
                                    <a href="#" id="{{$account->id}}" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editAccountModal{{$account->id}}"><i class="bi-pencil-square h4"></i></a>
                                    <a href="#" id="{{$account->id}}" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

    </body>

    </html>
