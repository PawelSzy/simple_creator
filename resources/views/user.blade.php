@extends('layouts.app')

@section('content')


<div class="col-md-12">
    <h1>Edit User</h1>
    <h2>{{ $user->firstname }} {{ $user->surname }}</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


</div>

{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@edit_user', $user->id] ]) !!}
<div class="col-md-4">

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
{{ Form::password('password', ['class' => 'form-control']) }}

<br /><br />

{{ Form::submit('Save') }}

</div>
{!! Form::close() !!}

@endsection


