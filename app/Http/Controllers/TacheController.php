<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projet;
use App\Models\Tache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notifications\TaskAssigned;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $taches = Tache::where('id', $user->id)->get();

        return view('task-management', compact('taches'));
    }

    public function getTaches()
    {
        $user = Auth::user();
        $taches = Tache::where('id', $user->id)->get();

        return response()->json([
            'data' => $taches
        ]);
    }

    public function getTachesAssignees()
    {
        $user = Auth::user();
        $taches = Tache::where('assigned_to', $user->id)->get();

        return response()->json([
            'data' => $taches
        ]);
    }

    public function modifierStatutTache($id_tache)
    {
        // Trouver la tâche via la clé primaire
        $tache = Tache::find($id_tache);
    
        if (!$tache) {
            return redirect('/task-management')->with('status', 'Tâche introuvable.');
        }
    
        // Vérifier et mettre à jour le statut
        if ($tache->statut === 'en cours') {
            $tache->update(['statut' => 'terminé']);
            return redirect('/task-management')->with('status', 'La tâche est marquée comme terminé avec succès.');
        } else {
            return redirect('/task-management')->with('status', 'La tâche est déjà terminé ! Vous ne pouvez que la supprimer maintenant');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $projects = Projet::all();
        return view('ajouter-tache', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'priorite' => 'required',
            'id_projet' => 'required',
        ]);
    
        Tache::create([
            'titre' => $validated['titre'],
            'description' => $validated['description'],
            'statut' => 'en cours',
            'priorite' => $validated['priorite'],
            'id_projet' => $validated['id_projet'],
            'id' => Auth::id(),
        ]);

        return redirect()->route('task-management')->with('status', 'La tache a été créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function showAssignForm($id_tache)
    {
        $tache = Tache::findOrFail($id_tache);
        return view('assigner-tache', compact('tache'));
    }

    public function delegate(Request $request, $id_tache)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $tache = Tache::findOrFail($id_tache);
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Utilisateur non trouvé']);
        }

        $tache->assigned_to = $user->id;
        $tache->save();

        $assignerName = Auth::user()->name; // Nom de l'utilisateur qui a assigné la tâche
        $projectName = $tache->project->titre; // Nom du projet

        $user->notify(new TaskAssigned($tache, $assignerName, $projectName));

        return redirect()->route('task-management')->with('status', 'La tâche a été assignée avec succès');
    }

    public function taskManagement()
{
    $user = Auth::user();
    $taches = Tache::where('assigned_to', $user->id)->get();

    return view('mes-taches', compact('taches'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_tache) 
    {
        //
        $tache = Tache::find($id_tache);
        return view('modifier-tache', compact('tache'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_tache)
    {
        //
        // Trouver la tâche à modifier
        $tache = Tache::findOrFail($id_tache);

        // Validation des données reçues
        $validated = $request->validate([
            'titre' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'priorite' => 'nullable|string',
        ]);

        // Mise à jour des champs uniquement s'ils sont présents
        $tache->update(array_filter($validated));  

        return redirect('/task-management')->with('status', 'La tâche a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tache)
    {
        //
        $tache = Tache::find($id_tache); 
        $tache->delete();

        return redirect('/task-management')->with('status', 'La tâche a bien été supprimé');
    
    }
}
