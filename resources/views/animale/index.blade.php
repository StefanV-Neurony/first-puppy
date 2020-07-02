@extends('layouts.app')


@section('content')
    <h1 class="pageTitle">
Toate animalele
    </h1>
<div class="filter-buttons">
    @if(auth()->check() && auth()->user()->type === '0')
    <div class="add-animal-button pulse"><a  class="btn btn-success" href="{{route('animale.create')}}">Adauga animal nou <i class="fa fa-plus" aria-hidden="true"></i></a></div>
    @endif
    <div class="list-view-button pulse"><i class="fa fa-bars" aria-hidden="true"></i><a> List view</a></div>
    <div class="grid-view-button pulse"><i class="fa fa-th-large" aria-hidden="true"></i> <a>Grid view</a></div>
</div>

<ol class="list list-view-filter">
    @foreach($animale as $animal)
        <li class="list-item">
            <img src="{{asset('storage/uploads/'. $animal->name . '.jpg')}}" class= "img-thumbnail animal-image">
            <span class="animal-details">
                    <p>Nume: {{$animal->name}}</p>
                    <p>Rasa: {{$animal->breed}}</p>
                    <p>Varsta: {{$animal->age}}</p>
                    <p>Sex: @if($animal->sex == '0') Femela @else Mascul @endif</p>
                    <p>Descriere: {{$animal->description}}</p>
                    <p>Pret adoptie: {{$animal->price}}</p>
                    <p>Status animal: @if($animal->status == '1')Adoptat @else Valabil @endif</p>
                </span>
            <div class="actions zoom">
                <a href="{{route('animale.show', $animal->id)}}" class="btn btn-outline-success animal-show" data-toggle="modal" data-target=".modalVizualizare{{$animal->id}}"><span><i class="fa fa-plus"></i></span></a>

                @if(auth()->check() && auth()->user()->type === '0')
                    <a href="{{URL::to('animale/' . $animal->id . '/edit')}}" class="btn btn-outline-info" data-toggle="modal" data-target=".modalEditare{{$animal->id}}"><span><i class="fa fa-pencil"></i>Editeaza</span></a>
                    {{ Form::open(array('url' => 'animale/' . $animal->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Sterge animal', array('class' => 'card-link btn btn-outline-danger')) }}
                    {{ Form::close() }}


                @endif

            </div>
        </li>
        <div class="modals">
            <!-- Modal -->
            <div class="modal fade modalVizualizare{{$animal->id}}" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Vizualizam pe: {{ $animal->name }}</h4>
                        </div>
                        <div class="modal-body">
                                <div class="jumbotron text-center">
                                    <h2>{{ $animal->name }}</h2>
                                    <img src="{{asset('storage/uploads/'. $animal->name . '.jpg')}}" class= "img-thumbnail animal-image">
                                    <p>
                                        <strong>Varsta:</strong> {{ $animal->age }} ani<br>
                                        <strong>Rasa:</strong> {{ $animal->breed }}
                                        <strong>Sex:</strong>
                                        @if($animal->sex !== '0')
                                            Mascul
                                        @else Femela
                                        @endif
                                        <br>
                                        <strong>Talie:</strong> {{ $animal->size }}cm
                                        <strong>Culoare:</strong> {{ $animal->color }}<br>
                                        <strong>Descriere:</strong> {{ $animal->description }}
                                        <strong>Tip:</strong>
                                        @if($animal->type === '0')
                                            Fara nevoi speciale
                                        @else Cu nevoi speciale
                                        @endif
                                    </p>
                                    @if($animal->status == 0)
                                        <a href="{{route('cereri.create', $animal->id)}}" class="btn btn-outline-success">Adopta-ma!</a>
                                    @else <H1> Animalul este adoptat!</H1>
                                    @endif
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal fade modalEditare{{$animal->id}}" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Editam animalul: {{ $animal->name }}</h4>
                        </div>
                        <div class="modal-body">
                            @if(auth()->check() &&  auth()->user()->type == 0)

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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @endforeach
</ol>
@endsection


