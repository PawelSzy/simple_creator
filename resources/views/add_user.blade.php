<style>
    #add_users {
        margin: 25px;
    }
</style>

@extends('layouts.app')

@section('content')



<div id="add_users">

<div class="col-md-12">
    <h1>Add User</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>

{!! Form::open(['url' => 'user_add']) !!}

<div class="col-md-4">

{{ Form::label('title', 'Firstname') }}<br />
{{ Form::text('firstname', null, ['class' => 'form-control']) }}

<br /><br />

{{ Form::label('title', 'Surname') }}<br />
{{ Form::text('surname', null, ['class' => 'form-control']) }}

<br /><br />

{{ Form::label('title', 'Email') }}<br />
{{ Form::text('email', null, ['class' => 'form-control']) }}

<br /><br />

{{ Form::label('title', 'Password') }}<br />
{{ Form::password('password', ['class' => 'form-control']) }}

<br /><br />

{{ Form::submit('Save') }}

</div>

{!! Form::close() !!}




</div>
@endsection


