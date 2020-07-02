@extends('layouts.app')
@section('content')
    <h1 class="pageTitle">
Adauga animal
    </h1>
    @if(auth()->user()->type === '0')
<div class="container-create-cerere">

{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'animale', 'files' => true, 'class'=> 'form-create-cerere')) }}

<div class="form-group">
    {{ Form::label('name', 'Nume') }}
    {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('age', 'Varsta') }}
    {{ Form::text('age', Request::old('age'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('breed', 'Rasa') }}
    {{ Form::text('breed', Request::old('breed'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('size', 'Talie') }}
    {{ Form::text('size', Request::old('size'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('color', 'Culoare') }}
    {{ Form::text('color', Request::old('color'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Descriere') }}
    {{ Form::text('description', Request::old('description'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('price', 'Pret adoptie') }}
    {{ Form::text('price', Request::old('price'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('Sex', 'Sex') }}
    {{ Form::select('sex', array('0' => 'Femela', '1' => 'Mascul'), Request::old('sex'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('type', 'Tip') }}
    {{ Form::select('type', array('0' => 'Normal', '1' => 'Nevoi speciale'), Request::old('type'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
    <input type="file" name="photo" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" >
    @if ($errors->has('photo'))
        <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('photo') }}</strong>
              </span>
    @endif
</div>

{{ Form::submit('Adauga animal', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
    @else <h1> Nu puteti accesa aceasta resursa</h1>
</div>
    @endif
@endsection
