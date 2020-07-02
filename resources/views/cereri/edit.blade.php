@extends('layouts.app')
@section('content')
    @if(auth()->user()->type == 0)
    <h1 class="chestionar-title">Chestionar adoptie animal - editare</h1>
    <div class="container-create-cerere">
    {{ Html::ul($errors->all()) }}
<div class="serializedForm">
    {!! $cerere->surveyanswer !!}
</div>
    {{ Form::model($cerere, array('route' => array('cereri.update', $cerere->id), 'method' => 'PUT', 'class' => 'form-adoptie form-create-cerere')) }}
    <h3>Informatii animal dat spre adoptie</h3>
    <div class="form-group">
        {{Form::label('animalid', 'ID Animal')}}
        {{Form::text('animalid',$animal->id, array('class' => 'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('animalname', 'Nume animal')}}
        {{Form::text('animalname', $animal->name, array('class' => 'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('animaldescription', 'Descriere animal')}}
        {{Form::text('animaldescription', $animal->description, array('class' => 'form-control'))}}
    </div>
    <div class="form-group">
        <h3>Informatii de contact</h3>
        {{Form::label('numeFull', 'Nume Intreg')}}
        {{Form::text('numeFull',null, array('class' => 'form-control'))}}
        <div class="form-group">
            {{ Form::label('ocupatie', 'Ocupatie') }}
            {{ Form::text('ocupatie', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('adresa', 'Adresa') }}
            {{ Form::text('adresa', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('timpAdresa', 'Timp locuit la adresa') }}
            {{ Form::text('timpAdresa', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('telefon', 'Telefon') }}
            {{ Form::text('telefon', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('oreContact', 'Ore Contact') }}
            {{ Form::text('oreContact', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null, array('class' => 'form-control')) }}
        </div>
        <h3>Casa si familie</h3>
        <div class="form-group">
            {{ Form::label('inputNrAdulti', 'Cati adulti sunt in aceeasi casa cu dumneavoastra?') }}
            {{ Form::text('inputNrAdulti', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inputNrCopii', 'Cati copii sunt in aceeasi casa cu dumneavoastra?') }}
            {{ Form::text('inputNrCopii', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inputCaineCopii', 'Va ramane cainele singur cu copiii? Daca da, de ce?') }}
            {{ Form::text('inputCaineCopii', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inputTipCasa', 'Ce tip de casa aveti?') }}
            {{ Form::select('inputTipCasa', array('0' => 'Simpla', '1' => 'Dubla' , '2'=> 'Duplex', '3'=> 'Garsoniera'), null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inputAmbient', 'Descrieti ambientul') }}
            {{ Form::select('inputAmbient', array('0' => 'Activ', '1' => 'Galagios' , '2'=> 'Linistit', '3'=> 'Galagios'), null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inputChirie', 'Daca stati in chirie, va rugam mentionati regulile proprietarului in legatura cu animalele') }}
            {{ Form::text('inputChirie',  null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inputAlergie', 'Cineva din familie este alergic?') }}
            {{ Form::select('inputChirie',array('0' => 'Da', '1' => 'Nu'),  null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inputAcord', 'Este toata lumea de acord cu un caine?') }}
            {{ Form::select('inputAcord',array('0' => 'Da', '1' => 'Nu'),  null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('inputAtentie', 'Aveti timpul necesar sa ii oferit atentie si afectiune?') }}
            {{ Form::select('inputAtentie',array('0' => 'Da', '1' => 'Nu'),  null, array('class' => 'form-control')) }}
        </div>
        <h3>Despre cainele pe care il doriti</h3>
        <div class="form-group">
            {{Form::label('inputIdee', 'Care este ideea dvs. a unui caine ideal si de ce?')}}
            {{Form::text('inputIdee', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('inputVarsta', 'Varsta dorita a cainelui')}}
            {{Form::text('inputVarsta', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('inputTalie', 'Talia dorita a cainelui')}}
            {{Form::text('inputTalie', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('inputRasa', 'Rasa dorita a cainelui')}}
            {{Form::text('inputRasa', null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('inputSex', 'Sexul dorit al cainelui')}}
            {{Form::select('inputSex', array('0' => 'Femela', '1' => 'Mascul', '2' => 'Mascul castrat', '3' => 'Femela castrata' , '4' => 'Nici o preferinta'), null, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{Form::label('inputCaineZiua', 'Unde o sa petreaca cainele ziua?')}}
            {{Form::text('inputCaineZiua', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputCaineNoapte', 'Unde o sa petreaca cainele noaptea?')}}
            {{Form::text('inputCaineNoapte', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputCaineSingur', 'Cate ore va petrece cainele singur?')}}
            {{Form::text('inputCaineSingur', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputResponsabilPrimar', 'Cine are responsabilitatea primara pentru caine?')}}
            {{Form::text('inputResponsabilPrimar', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputResponsabilFinanciar', 'Cine are responsabilitatea financiara pentru caine?')}}
            {{Form::text('inputResponsabilFinanciar', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputIngrijire', 'Sunteti de acord cu ingrijirea medicala de la un veterinar licentiat?')}}
            {{Form::select('inputIngrijire', array('0' => 'Da', '1' => 'Nu'), array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputInterior', 'Cainele va fi de interior?')}}
            {{Form::select('inputInterior', array('0' => 'Da', '1' => 'Nu'), array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputAfara', 'Cand cainele iese afara, cum este supervizat?')}}
            {{Form::text('inputAfara', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputInterior', 'Cainele va fi de interior?')}}
            {{Form::select('inputIngrijire', array('0' => 'Da', '1' => 'Nu'), array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputContact', 'Sunteti de acord sa ne contactati daca nu mai puteti tine acest caine?')}}
            {{Form::select('inputContact', array('0' => 'Da', '1' => 'Nu'), array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputVizita', 'Sunteti de acord sa fiti vizitat de un reprezentant al First Puppy prin programare?')}}
            {{Form::select('inputVizita', array('0' => 'Da', '1' => 'Nu'), array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputFP', 'Cum ati auzit de First Puppy?')}}
            {{Form::text('inputFP', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('inputGDPR', 'Sunteti de acord cu specificatiile GDPR??')}}
            {{Form::select('inputGDPR', array('0' => 'Da', '1' => 'Nu'), array('class'=>'form-control'))}}
        </div>
        {{ Form::submit('Editeaza formular', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}



    </div>
@else <h1>Nu puteti accesa aceasta resursa.</h1>
    </div>
    @endif
@endsection
