{{-- Index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 my-4">
            <div class="pull-left">
                <h2>Lista Progetti</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.projects.create') }}"> Nuovo progetto</a>
            </div>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-striped">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Slug</th>
            <th scope="col">Categoria</th>
            <th scope="col">immagine</th>
            <th scope="col">Pubblicato</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td>{{ $project->slug }}</td>
                <td>{{ $project->category }}</td>
                <td><img src="{{ asset($project->image) }}" alt="Project image"></td>
                <td>{{ date('d/m/Y H:i', strtotime($project->published)) }}</td>

                <td>
                    {{-- questa rotta visualizza il dettaglio del progetto --}}
                    <a class="btn btn-primary btn-square" href="{{ route('admin.projects.show', $project->slug) }}"
                        title="visualizza dettaglio"><i class="fas fa-eye"></i></a>
                    {{-- questa rotta modifica il progetto --}}
                    <a class="btn btn-warning btn-square" href="{{ route('admin.projects.edit', $project->slug) }}"
                        title="modifica dettaglio"><i class="fas fa-edit"></i></a>

                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-square btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
