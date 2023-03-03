@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Aggiungi Nuovo Progetto</h1>
        </div>
        <div class="col-12">
            <form action="{{ route('admin.projects.store')}} " method="POST">
                @csrf
                {{-- * TITOLO --}}
                <div class="form-group my-3">
                    <label class="control-label">
                        Titolo
                    </label>
                    <input type="text" class="form-control" placeholder="Inserisci Titolo Progetto" id="title" name="title">
                </div>
                {{--* DESCRIZIONE --}}
                <div class="form-group my-3">
                    <label class="control-label">
                        Descrizione
                    </label>
                    <textarea type="text" class="form-control" placeholder="Inserisci Descrizione del Progetto" id="description" name="description"></textarea>
                </div>
                {{--* CATEGORIA --}}
                <div class="form-group my-3">
                    <label class="control-label">
                        Categoria
                    </label>
                    <input type="text" class="form-control" placeholder="Inserisci la Categoria" id="category" name="category">
                </div>
                {{--* IMMAGINE --}}
                <div class="form-group my-3">
                    <label class="control-label">
                        Immagine
                    </label>
                    <input type="file" class="form-control" placeholder="Inserisci l'Immagine" id="image" name="image">
                </div>
                {{--* PUBBLICATO --}}
                <div class="form-group my-3">
                    <label class="control-label">
                        Pubblicato
                    </label>
                    <input type="date" class="form-control" placeholder="Inserisci l'Immagine" id="published" name="published">
                </div>

                <div class="form-group my-3">
                  <button type="submit" class="btn btn-success">SALVA</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
