<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;

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
        /**
         ** Utilizzo del metodo paginate e del metodo with per caricare i dati correlati
         ** e ottenere un numero limitato dei record alla volta
         *! $projects = Project::with('category')->paginate(10);
         */
        $projects = Project::all();
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
            'title' => 'required|max:40',
            'description' => 'nullable',
            'category' => 'required',
            'image' => 'required|url',
            'url' => 'nullable|url',
            'published' => 'nullable|date',
        ]);

        $validatedData['published'] = $validatedData['published'] ?? true; //! Impostare il campo pubblico su true se non è presente

        // Converti la data nel formato desiderato
        if (!empty($validatedData['published'])) {
            $date = new DateTime($validatedData['published']);
            $validatedData['published'] = $date->format('d-m-Y');
        }

        if ($validatedData['url'] == 'https://picsum.photos/200/300') {
            $validatedData['url'] = $validatedData['image'];
        }


        Project::create($validatedData);
        //! return redirect()->back()->with('message', 'Project created successfully
        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

    //TODO: -------------------------------------------FINE STORE--------------------------------------------------

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
     * @param  int  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        /* $project = Project::findOrFail($project); */
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     * TODO: Aggiorna la risorsa specificata nell'archiviazione
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, $id)
    {
        $project = Project::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|max:40',
            'description' => 'nullable',
            'category' => 'required',
            'image' => 'required|url',
            'url' => 'nullable|url',
            'published' => 'nullable|date',
        ]);

        $validatedData['published'] = $validatedData['published'] ?? true;

        if ($validatedData['url'] == 'https://picsum.photos/200/300') {
            $validatedData['url'] = $validatedData['image'];
        }



        /* Project::create($validatedData); */
        $project->update($validatedData);
        return redirect()->route('admin.projects.index')->with('message', 'Project created successfully.');
    }

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
