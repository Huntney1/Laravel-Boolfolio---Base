@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Modifica progetto</h2>
            </div>
        </div>
    </div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Attenzione!</strong> C'è stato un problema con l'operazione richiesta.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($project, ['method' => 'PATCH','route' => ['admin.projects.update', $project->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titolo:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Titolo','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrizione:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Descrizione','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Immagine:</strong>
                {!! Form::text('image', null, array('placeholder' => 'Immagine','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>URL:</strong>
                {!! Form::text('url', null, array('placeholder' => 'URL','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Pubblicato:</strong>
                {!! Form::input('date', 'published_date', '2023-03-01', ['class' => 'form-control']) !!}
            </div>
        </div>
