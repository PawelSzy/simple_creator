
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

    .modal-user-name {
        color:brown;
    }

    .modal-user-email {
        color: brown;
    }

    .modal-user-text {
        color: rosybrown;
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
                <table>
                    <tr>
                        <th>
                            <span id="modal_firstname"></span>
                            <span id="modal_surname"></span>
                            email: <span id="modal_email"></span>
                        </th>
                    </tr>
                    <tr><td id="modal_user_email">User Email1</td></tr>
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

    <script>
        $(document).ready(function() {
            console.log('outside');
            $('#usersModal').on('show.bs.modal', function (event) {
                console.log('inside');
                var link = $(event.relatedTarget); // Button that triggered the modal
                var email = link.data('email'); // Extract info from data-* attributes
                var firstname = link.data('firstname'); // Extract info from data-* attributes
                var surname = link.data('surname'); // Extract info from data-* attributes
                var modal = $(this);
//        modal.find('.modal-title').text('New message to ' + recipient);
//        modal.find('.modal-body input').val(recipient);


                $('#modal_email').text(email);
                $('#modal_firstname').text(firstname);
                $('#modal_surname').text(surname);
            })
        });
    </script>


@endsection


