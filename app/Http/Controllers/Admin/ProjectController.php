<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // Classe da non dimenticare
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use DateTime;

class ProjectController extends Controller
{
    //! -INDEX-

    /**
     * Display a listing of the resource.
     * TODO: Mostra l'elenco dei progetti
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         //* Utilizzo del metodo paginate e del metodo with per caricare i dati correlati
         //* e ottenere un numero limitato dei record alla volta
         //! $projects = Project::with('category')->paginate(10);

        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    //! -CREATE-

    /**
     * Show the form for creating a new resource.
     ** Mostra il form e il metodo per creare un nuovo progetto
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    //! -STORE-
    /**
     * Store a newly created resource in storage.
     ** Salva il nuovo progetto nel Database
     *
     * @param  App\Http\Request\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->validated();
        $slug = Project::generateSlug($request->title);

        //*Aggiungo Coppia Chiave Valore All'array $form_data
        $form_data['slug'] = $slug;

        $newProject = new Project;
        /* $project->published = $form_data['published'] ?? true; //! Impostare il campo pubblico su true se non è presente */

        //* Converti la data nel formato desiderato
        if (!empty($form_data['published'])) {
            $date = new DateTime($form_data['published']);
            $form_data['published'] = $date->format('d-m-Y');
            unset($form_data['published']);
        }

        /*  $newProject = new Project;
        $newProject->title = $form_data['title'];
        $newProject->description = $form_data['description'];
        $newProject->category = $form_data['category'];
        $newProject->image = $form_data['image'];
        $newProject->published = $form_data['published'] ?? true; //! Impostare il campo pubblico su true se non è presente
        */

        $newProject->fill($form_data);
        $newProject->save();

        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

    //* -------------------------------------------FINE STORE--------------------------------------------------

    //! -SHOW-

    /**
     * Display the specified resource.
     * TODO: Visualizza la risorsa specificata
     *
     * @param  int  Project  $projectt
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        /* $project = Project::findOrFail($id); */
        return view('admin.projects.show', compact('project'));
    }

    //! -EDIT-

    /**
     * Show the form for editing the specified resource.
     * TODO: Vsualizza il modulo per la modifica della risorsa specificata
     *
     *
     * @param  int Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        /* $project = Project::findOrFail($project); */
        return view('admin.projects.edit', compact('project'));
    }

    //! -UPDATE-

    /**
     * Update the specified resource in storage.
     * TODO: Aggiorna la risorsa specificata nell'archiviazione
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Http\Request\UpdateProjectRequest  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        /* $project = Project::findOrFail($project); */

        $form_data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $form_data['slug'] = $slug;

       $project->update($form_data);
        return redirect()->route('admin.projects.index')->with('message','post modificato correttamente');

        /* $form_data = $request->validate([
            'title' => 'required|max:40',
            'description' => 'nullable',
            'category' => 'required',
            'image' => 'required|url',
            'published' => 'nullable|date_format:Y-m-d H:i:s',
        ]); */

        $form_data['published_at'] = $form_data['published'] ?? null;

        //* Converti la data nel formato desiderato
        if (!empty($form_data['published'])) {
            $date = new DateTime($form_data['published']);
            $form_data['published_at'] = $date->format('d-m-Y');
            unset($form_data['published']);
        }


        $project->update($form_data);
        return redirect()->route('admin.projects.index')->with('message', ' Project successfully modified');
    }

    //! -DESTROY-

    /**
     * Remove the specified resource from storage.
     * TODO: Rimuove la risorsa specificata dall'archiviazione
     *
     * @param  int  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Project deleted successfully.');
    }
}
