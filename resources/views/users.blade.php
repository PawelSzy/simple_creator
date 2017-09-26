
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th, td {
        padding: 15px;
        margin: 25px;
    }

    #users_table {
        margin: 25px;

    }
</style>

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
                    <a href="" data-toggle="modal" data-target="#usersModal">
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <tr><th>Name</th></tr>
                    <tr><td>User Email1</td></tr>
                    <tr><td>User Email2</td></tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection


