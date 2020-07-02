@extends('layouts.app')
@section('content')
    @if(auth()->check() && auth()->user()->type === '0')
    @if(isset($mesaje))
            @foreach($mesaje as $mesaj)
                <div class="card card-body card-body-mesaje">
                <p>Numar mesaj: {{$loop->iteration}}</p>
                <p>Nume: {{$mesaj->name}}</p>
                <p>Metoda de contact preferata : {{$mesaj->contact_back}}</p>
                <p>Mesaj: {{$mesaj->message}}</p>
                <p>Email: {{DB::table('users')->where('id', $mesaj->userid)->pluck('email')->first()}}</p>
                {{ Form::open(array('url' => 'contact/' . $mesaj->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Sterge mesaj', array('class' => 'card-link btn btn-outline-danger')) }}
                {{ Form::close() }}
                </div>
            @endforeach
    @endif
        @else
        <div class="card card-body card-body-mesaje">
        <h1> Nu aveti access la aceasta resursa</h1>
        </div>
    @endif
@endsection
