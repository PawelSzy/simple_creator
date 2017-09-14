<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
</head>
<body>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add User</title>

<h1>Add User</h1>

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{!! Form::open(['url' => 'user_add']) !!}

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


