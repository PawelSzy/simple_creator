<link rel="stylesheet" href="{{ asset('css/users.css') }}" />

@extends('layouts.app')

@section('content')

    <div id="users_table">
    <h2><a href="/user_add">ADD</a></h2>

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <table >
        <tr>
            <th>Firstname</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Add details</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user['firstname']}}</td>
                <td>{{ $user['surname']}}</td>
                <td>{{ $user['email']}}</td>
                <td><a href="/user_edit/{{ $user->id }}">edit</a></td>
                <td>
                    <a href="/user_delete/{{ $user->id }}">delete</a>
                </td>
                <td>
                    <a href=""
                       data-toggle="modal"
                       data-target="#usersModal"
                       data-firstname="{{ $user['firstname'] }}"
                       data-surname="{{ $user['surname'] }}"
                       data-email="{{ $user['email'] }}"
                       data-user_id="{{ $user->id }}"

                    >
                        add details
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="usersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    <span class="modal-user-name">
                        <span id="modal_firstname"></span>
                        <span id="modal_surname"></span>
                    </span>
                    <span >
                        <span class="modal-user-text">email:</span>
                        <span class="modal-user-email" id="modal_email"></span>
                    </span>

                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="users-emails-table" class="table table-hover table-responsive table-condensed">
                </table>
            </div>
            <div class="modal-footer">
                <form>
                    <span class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="email" class="col-sm-9" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </span>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/users.js') }}"></script>
@endsection


