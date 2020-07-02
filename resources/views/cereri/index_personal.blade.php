@extends('layouts.app')
@section('content')
    <h1 class="pageTitle">
Cererile mele
    </h1>
    <div class="container-cereri-general">
        <div class="container-cereri-item">
            @if(isset($cereri))
                <ol class="cereri-general-list">
                    @foreach($cereri as $cerere)
                        <li>
                            <div class="card-cerere-body card-cerere">
                                <h5>Cerere id: {{$cerere->id}}
                                    @if($cerere->status == '1')
                                        <i class="fa fa-check" style="color:greenyellow; text-shadow:0px 0px 5px black;"></i>
                                    @endif
                                    <span class="trigger-card">
                                        <i class="fa fa-sign-in"></i>
                                    </span>
                                </h5>
                                <h5>Postata de: {!! DB::table('users')->where('id', $cerere->userid)->pluck('fullname')->first() !!}</h5>
                                <span class="cerere-content">
                    <strong style="text-shadow:0px 0px 5px black; color:white;"><h6>Nume animal : {{$cerere->animalname}}</h6></strong>
                   <span class="card card-body"> <h6>Descriere animal : {{$cerere->animaldescription}}</h6></span>
                    <a href="{{route('cereri.show', $cerere->id)}}" class="btn btn-success">Vizualizeaza</a>
                        {{ Form::open(array('url' => 'cereri/' . $cerere->id, 'class' => 'form-delete-cerere')) }}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Sterge ', array('class' => 'btn btn-outline-danger')) }}
                                    {{ Form::close() }}
                        </span>
                            </div>
                        </li>
                    @endforeach
                </ol>
            @endif

        </div>
@endsection
