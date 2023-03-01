@extends('layouts.app')

@section('title', 'Project')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Portfolio</h1>
            <a href="{{ route('admin.project.create') }}" class="btn btn-primary mb-3">Aggiungi Progetto</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titolo</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">immagine</th>
                        <th scope="col">Pubblicato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $portfolio->title }}</td>
                            <td>{{ $portfolio->description }}</td>
                            <td>
                                <a href="{{ route('portfolios.show', $portfolio->id) }}" class="btn btn-info">Mostra</a>
                                <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-warning">Modifica</a>
                                <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
