{{-- Index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista progetti</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('admin.projects.create') }}"> Nuovo progetto</a>
            </div>
        </div>
    </div>

    @if (Session('message'))
        <div class="alert alert-success">
            <p>{{ sessino('$message') }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
        <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Categoria</th>
            <th scope="col">immagine</th>
            <th scope="col">Pubblicato</th>
        </tr>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ $project->description }}</td>
                <td><img src="{{ asset('https://picsum.photos/200/300') }}" alt="Project image"></td>
                <td>{{ $project->category }}</td>
                <td>{{ date('d/m/Y', strtotime($project->published)) }}</td>
                <td>
                    {{-- questa rotta visualizza il dettaglio del progetto --}}
                    <a class="btn btn-primary btn-square" href="{{ route('admin.projects.show', $project->id) }}"
                        title="visualizza dettaglio"><i class="fas fa-eye"></i></a>
                    {{-- questa rotta modifica il progetto --}}
                    <a class="btn btn-warning btn-square" href="{{ route('admin.projects.edit', $project->id) }}"
                        title="modifica dettaglio"><i class="fas fa-edit"></i></a>

                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-square btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
@endsection
