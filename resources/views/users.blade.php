
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

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif



<div id="users_table">
    <h2><a href="/user_add">ADD</a></h2>

    <table >
        <tr>
            <th>Firstname</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
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
            </tr>
        @endforeach
    </table>
</div>

@endsection


