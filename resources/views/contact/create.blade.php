@extends('layouts.app')
@section('content')
        <div class="container-create-cerere">
            {{ Html::ul($errors->all()) }}

            {{ Form::open(array('url' => 'contact', 'files' => true, 'class'=> 'form-contact')) }}
            <div class="form-title">
                <h4>Hai la noi sa bem o cafea, sau lasa-ne un mesaj ! :)</h4>
            </div>
            <div class="form-group">
                {{ Form::label('name', 'Nume') }}
                {{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('contact_back', 'Modalitate de contact') }}
                {{ Form::text('contact_back', Request::old('contact_back'), array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('message', 'Mesajul dvs.') }}
                {{ Form::text('message', Request::old('message'), array('class' => 'form-control')) }}
            </div>

            {{ Form::submit('Trimite mesaj', array('class' => 'button-contact')) }}
            <div class="form-group">
                <p>Telefon: 0767544376</p>
                <p>Email: contact@firstpuppy.com</p>
            </div>
        {{ Form::close() }}
@endsection
