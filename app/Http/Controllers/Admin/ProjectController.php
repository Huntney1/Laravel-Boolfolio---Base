<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * TODO: Mostra l'elenco dei progetti
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     * TODO: Mostra il form e il metodo per creare un nuovo progetto
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     * TODO: Salva il nuovo progetto nel Database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'category' => 'required',
            'image' => 'required|url',
            'url' => 'nullable|url',
            'published' => 'nullable|date',
        ]);

        // nuova istanza di Project e validazione dei valori
        $project = new Project;
        $project->title = $validatedData['title'];
        $project->description = $validatedData['description'];
        $project->category = $validatedData['category'];
        $project->image = $validatedData['image'];
        $project->url = $validatedData['url'];
        $project->published = $validatedData['published'] ?? true; //! Impostare il campo pubblico su true se non è presente

        $project->save();

        if ($validatedData['url'] == 'https://picsum.photos/200/300') {
            $project->url = $validatedData['image'];
            $project->save();
        }

        return redirect(route('admin.projects.index'))->with('success', 'Project created successfully.');


      /*   if ($validatedData['url'] == 'https://picsum.photos/200/300') $validatedData['url'] = $validatedData['image'];

        $validatedData['published'] = true;
        Project::create($validatedData); */

    }



    /**
     * Display the specified resource.
     * TODO: Visualizza la risorsa specificata
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     * TODO: Vsualizza il modulo per la modifica della risorsa specificata
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     * TODO: Aggiorna la risorsa specificata nell'archiviazione
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * TODO: Rimuove la risorsa specificata dall'archiviazione
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        if ($project) {
            $project->delete();

            return redirect()->route('admin.project.index')->with('success','Progetto cancellato con successo!');

        } else {
            return redirect()->route('admin.project.index')->with('error','Progetto non trovato!');
        }
    }
}
