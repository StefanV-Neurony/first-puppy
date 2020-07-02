@extends('layouts.app')
@section('content')
    @if(auth()->user()->type == '0')
    <div class="filter-buttons">
        <div class="list-view-button pulse"><i class="fa fa-bars" aria-hidden="true"></i><a> List view</a></div>
        <div class="grid-view-button pulse"><i class="fa fa-th-large" aria-hidden="true"></i> <a>Grid view</a></div>
    </div>

    <ol class="list list-view-filter">
        @foreach($utilizatori as $utilizator)
            <li class="list-item">
                <span class="utilizator-details">
                    <p>Nume logare:{{$utilizator->name}}</p>
                    <p>Nume intreg:{{$utilizator->fullname}}</p>
            <p >Email: {{$utilizator->email}}</p>
                    <p>CNP: {{$utilizator->CNP}}</p>
                    <p>Telefon: {{$utilizator->phone}}</p>

            <p >Tip utilizator:
            @if($utilizator->type === '0')
                Admin
            @else Client
            </p>
    @endif
                </span>
                <div class="actions zoom">
                    @if(auth()->check() && auth()->user()->type === '0')
                        <a href="{{URL::to('utilizatori/' . $utilizator->id . '/edit')}}" class="btn btn-outline-info" data-toggle="modal" data-target=".modalEditare{{$utilizator->id}}"><span><i class="fa fa-pencil"></i>Editeaza</span></a>
                        {{ Form::open(array('url' => 'utilizatori/' . $utilizator->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Sterge utilizator', array('class' => 'card-link btn btn-outline-danger')) }}
                        {{ Form::close() }}


                    @endif

                </div>
            </li>
            <div class="modals">
                <!-- Modal -->
                <div class="modal fade modalEditare{{$utilizator->id}}" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Editam utilizatorul: {{ $utilizator->name }}</h4>
                            </div>
                            <div class="modal-body">
                                {{ Html::ul($errors->all()) }}

                                {{ Form::model($utilizator, array('route' => array('utilizatori.update', $utilizator->id), 'method' => 'PUT')) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Nume') }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('fullname', 'Nume intreg') }}
                                    {{ Form::text('fullname', null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::text('email', null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('CNP', 'CNP') }}
                                    {{ Form::text('CNP', null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('phone', 'Telefon') }}
                                    {{ Form::text('phone', null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('type', 'Tip utilizator') }}
                                    {{ Form::select('type', array('0' => 'Admin', '1' => 'Client'), null, array('class' => 'form-control')) }}
                                </div>

                                {{ Form::submit('Modifica utilizator', array('class' => 'btn btn-primary')) }}

                                {{ Form::close() }}
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
    @endif
    <script>

    </script>
@endsection


