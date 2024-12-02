<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
    public function getProjets()
{
    return response()->json([
        'data' => Projet::all()
    ]);
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
    $validated = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'date_limite' => 'required|date',
    ]);

    Projet::create([
        'titre' => $validated['titre'],
        'description' => $validated['description'],
        'date_limite' => $validated['date_limite'],
        'status' => 'en cours',
        'id' => Auth::id(), // ID de l'utilisateur connecté
    ]);

    return redirect('/project-management')->with('status', 'Projet créé avec succès.');
}

    public function modifierStatutProjet($id_projet)
    {
        // Trouver le projet via la clé primaire
        $projet = Projet::find($id_projet);
    
        if (!$projet) {
            return redirect('/project-management')->with('status', 'Projet introuvable.');
        }
    
        // Vérifier et mettre à jour le statut
        if ($projet->status === 'en cours') {
            $projet->update(['status' => 'terminé']);
            return redirect('/project-management')->with('status', 'Le projet est marqué comme terminé avec succès.');
        } else {
            return redirect('/project-management')->with('status', 'Le projet est déjà terminé ! Vous ne pouvez que le supprimer maintenant');
        }
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
    public function edit(string $id_projet)
    {
        //
        $projet = Projet::find($id_projet);
        return view('modifier-projet', compact('projet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_projet)
    {
        // Trouver le projet à modifier
        $projet = Projet::findOrFail($id_projet);

        // Validation des données reçues
        $validated = $request->validate([
            'titre' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'date_limite' => 'nullable|date',
        ]);

        // Mise à jour des champs uniquement s'ils sont présents
        $projet->update(array_filter($validated));  

        return redirect('/project-management')->with('status', 'Le projet a bien été modifié');
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
