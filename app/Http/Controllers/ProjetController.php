<?php

namespace App\Http\Controllers;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projets = Projet::all();

        return view('project-management', compact('projets'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        return view('ajouter-projet', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $users = User::all();
        $request->validate([ 
            'titre' => 'required',
            'description' => 'required',
            'date_limite' => 'required',
            'status' => 'required',
            'id' => 'required'
        ]);

        $users = User::all();
        $projet = new Projet();
        $projet->titre = $request->titre;
        $projet->description = $request->description;
        $projet->date_limite = $request->date_limite; 
        $projet->status = $request->status;
        $projet->id = $request->id;
        $projet->save();

        return redirect('/ajouter-projet')->with('status', 'Le projet a bien été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_projet)
    {
        //
        $projet = Projet::find($id_projet); 
        $projet->delete();

        return redirect('/project-management')->with('status', 'Le projet a bien été supprimé');
    }
}
