@extends('layouts.app')
@section('content')
    <div class="about-section">
        <h1>Despre noi</h1>
        <p>
            Drumul acesta frumos pe de o parte, dar foarte greu pe de alta parte a debutat in momentul cand am adoptat un catel de pe internet pe nume Leon. La scurt timp, am gasit in fata blocului, o mamica cu 4 pui. Ciudat, pana atunci nu "ii vazusem pe strazi", cand si cand mai duceam mancare in fata blocului stiind ca sunt animale pe strada, dar fara sa "le vedem, sa le cunoastem si sa le simtim".
            Atunci s-a intamplat un declic ... catelul nostru proaspat adoptat fusese si el pe strada precum cei 4 catei din fata blocului ... nu am stat mult pe ganduri, i-am luat de acolo si le-am gasit familii, unul dintre ei ramanand la noi, iar pe pisica am sterilizat-o... bucurie mare ca scapasem de problema, doar ca socoteala de acasa nu se potriveste cu cea din targ. La scurt timp a aparut un alt pui si apoi altul si altul, apoi am descoperit cateii... Erau si ai nimanui... nici pe ei "nu-i mai vazusem" pana atunci.
            O data constientizata problema, durerea si suferinta lor, nu ne-am mai oprit, unul si inca unul... ajungand sa avem constant in grija in jur de 115 animalute cu eforturi, sacrificii, costuri lunare mult peste ce putem duce noi. O vorba spune ca inapoi nu te mai poti intoarce, deci mergem inainte, dar avem nevoie de sustinere ca sa putem continua misiunea. Orice donatie poate face la un moment dat diferenta intre viata si moartea. Fiti alaturi de noi, ajutati-ne pt a putea ajuta animalele nimanui. Multumim!​​
        </p>
    </div>

    <h2 style="text-align:center">Echipa noastra</h2>
    <div class="row-about">
        <div class="column-about">
            <div class="card">
                <img src="/w3images/team1.jpg" alt="Stefan" style="width:100%">
                <div class="container-about">
                    <h2>Stefan Alexandru</h2>
                    <p class="title-about">CEO & Fondator</p>
                    <p>stefanalexandru@firstpuppy.com</p>
                    <a href="{{route('contact.create')}}"><p><button class="button-about">Contact</button></p></a>
                </div>
            </div>
        </div>

        <div class="column-about">
            <div class="card">
                <img src="/w3images/team2.jpg" alt="Eva" style="width:100%">
                <div class="container-about">
                    <h2>Eva Zamfir</h2>
                    <p class="title-about">Director admitere animale</p>
                    <p>evazamfir@firstpuppy.com</p>
                    <a href="{{route('contact.create')}}"><p><button class="button-about">Contact</button></p></a>
                </div>
            </div>
        </div>

        <div class="column-about">
            <div class="card">
                <img src="/w3images/team3.jpg" alt="Robert" style="width:100%">
                <div class="container-about">
                    <h2>Robert Matei</h2>
                    <p class="title-about">Director departament ingrijire medicala animale</p>
                    <p>robertmatei@firstpuppy.com</p>
                    <a href="{{route('contact.create')}}"><p><button class="button-about">Contact</button></p></a>
                </div>
            </div>
        </div>
    </div>
@endsection
