<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit User</title>

<h1>Edit User</h1>
<h2>{{ $user->firstname }} {{ $user->surname }}</h2>

{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@edit', $user->id] ]) !!}

{{ Form::label('title', 'Firstname') }}<br />
{{ Form::text('firstname', null, ['class' => 'form-control']) }}

<br /><br />

{{ Form::label('title', 'Surname') }}<br />
{{ Form::text('surname', null, ['class' => 'form-control']) }}

<br /><br />

{{ Form::label('title', 'email') }}<br />
{{ Form::text('email', null, ['class' => 'form-control']) }}

<br /><br />

{{ Form::label('title', 'password') }}<br />
{{ Form::password('password', null, ['class' => 'form-control']) }}

<br /><br />

{{ Form::submit('Save') }}


{!! Form::close() !!}

</body>


