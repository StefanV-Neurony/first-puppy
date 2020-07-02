@extends('layouts.app')
@section('content')
    <h1 class="pageTitle">
Modifica animal
    </h1>
    @if(auth()->user()->type == 0)
<h1>Edit {{ $animal->name }}</h1><img src="{{$image->path}}"/>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($animal, array('route' => array('animale.update', $animal->id), 'method' => 'PUT')) }}

<div class="form-group">
    {{ Form::label('name', 'Nume') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('age', 'Varsta') }}
    {{ Form::text('age', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('breed', 'Rasa') }}
    {{ Form::text('breed', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('size', 'Talie') }}
    {{ Form::text('size', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('color', 'Culoare') }}
    {{ Form::text('color', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Descriere') }}
    {{ Form::text('description', null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('price', 'Pret adoptie') }}
    {{ Form::text('price', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('Sex', 'Sex') }}
    {{ Form::select('sex', array('0' => 'Femela', '1' => 'Mascul'), null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('type', 'Tip') }}
    {{ Form::select('type', array('0' => 'Normal', '1' => 'Nevoi speciale'), null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('status', 'Adoptat?') }}
    {{ Form::select('status', array('0' => 'Nu', '1' => 'Da'), null, array('class' => 'form-control')) }}
</div>
<div class="form-group">
    <input type="file" name="photo" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" >
    @if ($errors->has('photo'))
        <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('photo') }}</strong>
              </span>
    @endif
</div>

{{ Form::submit('Modifica animal', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
    @else <h1> Nu aveti permisiune sa accesati aceasta resursa</h1>
    @endif
@endsection

