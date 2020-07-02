@extends('layouts.app')

@section('content')
    <h1 class="pageTitle">
Acasa
    </h1>
    <!-- The video -->
    <video autoplay muted loop id="myVideo">
        <source src="{{asset('images/video_prezentare.mp4')}}" type="video/mp4">
    </video>

    <!-- Optional: some overlay text to describe the video -->
    <div class="content">
        <h1>First Puppy</h1>
        <h2>Un adăpost pentru toți cățeii. Găsește-ți un partener de viață chiar aici!</h2>
        <div class="content-block">
            <h3 class="title">Cele mai noi animăluțe venite în adăpostul nostru:</h3>
            <ul class="animal-list">
                @foreach($animale as $animal)
                    <li class="animal-list-item">
                            <div class="animal-card">
                                <a href="{{route('animale.show', $animal->id)}}"><img src="{{asset('storage/uploads/'. $animal->name . '.jpg')}}" class="rounded-circle dogImage"></a> <br/>                                <div class="animal-card-container">
                                    <h4><b>{{$animal->name}}</b></h4>
                                    <p>{{$animal->breed}}</p>
                                    <p>{{$animal->age}} ani</p>
                                </div>
                            </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
