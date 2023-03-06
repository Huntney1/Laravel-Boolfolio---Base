

@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-between my-2">
                <div>
                    <h2>Dettaglio: {{ $project->title }}</h2>
                </div>
                <div>
                    <a href="{{route('admin.projects.index')}}" class="btn btn-primary">Torna all'Elenco</a>
                </div>
            </div>

            <div class="col-12">
                <strong>Progetto</strong>
                <p>{{ $project->id }}</p>

                <strong>Titolo</strong>
                <p>{{ $project->title }}</p>

                <strong>Descrizione</strong>
                <p>{{ $project->description }}</p>

                <strong>Categoria</strong>
                <p>{{ $project->category }}</p>

                <strong class="mt-3">Immagine</strong>
                <div>{{ $project->image }}</div>
                <div>
                    <img src="{{ asset('https://picsum.photos/200/300') }}" alt="Project image">
                </div>

                <strong>Pubblicato</strong>
                <p>{{ date('d/m/Y H:i:s', strtotime($project->published)) }}</p>

            </div>
        </div>
    </div>
@endsection
