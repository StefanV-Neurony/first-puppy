<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .container-date {
            display: flex;
        }
    </style>
</head>
<body class="container-date">
<center>
<H1>Contract de adoptie</H1>
<br>
<h3>Data: <span style="font-weight:200; font-style:italic">{{date('d/m/y')}}</h3>
</center>
<br>
<br>
<br>
<h3>Numele contractorului: <span style="font-weight:200; font-style:italic">First-Puppy</span></h3>
<h3>Telefon: <span style="font-weight:200; font-style:italic">0767544376</span></h3>
<h3>Email: <span style="font-weight:200; font-style:italic">first-puppy-contact@mail.com</span></h3>
<br>
<br>
<h2>Date detinator:</h2>
<h3>Numele intreg: <span style="font-weight:200; font-style:italic">{{$utilizator->fullname}}</span></h3>
<h3>Telefon: <span style="font-weight:200; font-style:italic">{{$utilizator->phone}}</span></h3>
<h3>Email: <span style="font-weight:200; font-style:italic">{{$utilizator->email}}</span></h3>
<h3>CNP: <span style="font-weight:200; font-style:italic">{{$utilizator->CNP}}</span></h3>
<h3>Stapanul se angajeaza sa adopte animalul: <span style="font-weight:200; font-style:italic">{{$animal->name}}</span></h3>

<h2>Date animal:</h2>
<h3>Rasa: <span style="font-weight:200; font-style:italic">{{$animal->breed}}</span></h3>
<h3>Culoare : <span style="font-weight:200; font-style:italic">{{$animal->color}}</span></h3>
<h3>Talie: <span style="font-weight:200; font-style:italic">{{$animal->size}}</span></h3>
<h3>Sex: <span style="font-weight:200; font-style:italic">@if($animal->sex == '0')Femela @else Mascul @endif</span></h3>
<h3>Varsta: <span style="font-weight:200; font-style:italic">{{$animal->age}} ani</span></h3>
<h3>Pret adoptie: <span style="font-weight:200; font-style:italic">{{$animal->price}} RON</span></h3>
<h3>Prima vizita: <span style="font-weight:200; font-style:italic">to be added</span></h3>

<h2>Semnatura contractant</h2>
</body>
</html>
