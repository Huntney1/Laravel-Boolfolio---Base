{{-- Index.blade.php --}}
@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista progetti</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Nuovo progetto</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
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
                <td>{{ $project->category }}</td>
                <td>{{ $project->image }}</td>
                <td>{{ $project->published }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('projects.show', $project->id) }}">Visualizza</a>
                    <a class="btn btn-primary" href="{{ route('projects.edit', $project->id) }}">Modifica</a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['projects.destroy', $project->id],
                        'style' => 'display:inline',
                    ]) !!}
                    {!! Form::submit('Elimina', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    {!! $projects->links() !!}
@endsection
