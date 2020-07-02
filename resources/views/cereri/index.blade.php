@extends('layouts.app')
@section('content')
    <h1 class="pageTitle">
        Cereri - toate
    </h1>
    <div class="container-cereri-general">
        <div class="container-cereri-item">
        @if(isset($cereri))
            <ol class="cereri-general-list">
        @foreach($cereri as $cerere)
            <li>
                <div class="card-cerere-body card-cerere">
                    <h5>Cerere id: {{$cerere->id}}<span class="trigger-card"><i class="fa fa-sign-in"></i></span></h5>
                    <h5>Postata de: {!! DB::table('users')->where('id', $cerere->userid)->pluck('fullname')->first() !!}</h5>
                    <span class="cerere-content">
                    <h6>Nume animal : {{$cerere->animalname}}</h6>
                    <h6>Descriere animal : {{$cerere->animaldescription}}</h6>
                    <a href="{{route('cereri.show', $cerere->id)}}" class="btn btn-success">Vizualizeaza</a>
                        {{ Form::open(array('url' => 'cereri/' . $cerere->id, 'class' => 'form-delete-cerere')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Sterge ', array('class' => 'btn btn-outline-danger')) }}
                        {{ Form::close() }}
                    <a class="card-link btn btn-small btn-info" href="{{ URL::to('cereri/' . $cerere->id . '/edit') }}">Editeaza</a>
                        </span>
                </div>
            </li>
        @endforeach
            </ol>
            @endif

    </div>
@endsection
