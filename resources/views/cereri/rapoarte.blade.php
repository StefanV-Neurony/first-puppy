@extends('layouts.app')
@section('content')
    @if(auth()->check() && auth()->user()->type === '0')
    <div class="rapoarte-container">
        @foreach($cereri as $cerere)
            <div class="card-cerere-body-rapoarte card-cerere">
                <h5>Nr. crt.: {{$loop->iteration}}</h5>
                <h5>Cerere id: {{$cerere->id}}</h5>
                <h6>Nume animal : {{$cerere->animalname}}</h6>
                <h6>Descriere animal : {{$cerere->animaldescription}}</h6>
                <h6>Nume client contractat: {!! DB::table('users')->where('id', $cerere->userid)->pluck('fullname')->first() !!}</h6>
                <h6> Status cerere: @if($cerere->status == '1')
                        <span style="font-weight:500; font-style:italic; color:green">
                            Cerere aprobata - contract generat
                        </span>
                    @else
                        <span style="color:teal; font-style:italic">Cerere inca in curs de verificare</span>

                    @endif</h6>
                <h6>Data intocmirii: {{$cerere->created_at}}</h6>
                <a href="{{route('cereri.show', $cerere->id)}}" class="btn btn-success">Vizualizeaza</a>
            </div>
        @endforeach

    </div>
        @else <div class="card-cerere-body-rapoarte">
        <h5>Nu aveti access la aceasta resursa.</h5>
    </div>
    @endif
@endsection
