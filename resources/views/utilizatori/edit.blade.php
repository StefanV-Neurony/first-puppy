@extends('layouts.app')
@section('content')

    @if(auth()->user()->type == 0)
    <h1>Edit {{ $utilizator->name }}</h1>
    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($utilizator, array('route' => array('utilizatori.update', $utilizator->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nume') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('fullname', 'Nume intreg') }}
        {{ Form::text('fullname', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('cnp', 'CNP') }}
        {{ Form::text('cnp', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Telefon') }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('type', 'Tip utilizator') }}
        {{ Form::select('type', array('0' => 'Admin', '1' => 'Client'), null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Modifica utilizator', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
    @else <h1>Nu aveti permisiune sa accesati aceasta resursa.</h1>
    @endif
@endsection

