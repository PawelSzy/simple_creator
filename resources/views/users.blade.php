<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
    }
</style>


<title>Laravel</title>

<h2><a href="/user_add">ADD</a></h2>

<table>
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
</body>


