@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Aggiungi progetto</h4>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'admin.projects.store', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Titolo', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titolo']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Descrizione', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Descrizione']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Immagine', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('image', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('link', 'Link', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Link']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit('Aggiungi', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
