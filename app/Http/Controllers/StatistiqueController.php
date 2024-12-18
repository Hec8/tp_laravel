<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Tache;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $totalProjects = $user->projectUser->count();
            $ongoingProjects = $user->projectUser->where('status', 'en cours')->count();
            $completedProjects = $user->projectUser->where('status', 'terminé')->count();

            $totalTasks = $user->taskUser->count();
            $ongoingTasks = $user->taskUser->where('status', 'en cours')->count();
            $completedTasks = $user->taskUser->where('status', 'terminé')->count();

            // Tâches assignées par l'utilisateur
            $tasksAssignedByUser = Tache::where('id', $user->id)->count();
            $tasksAssignedToUser = Tache::where('assigned_to', $user->id)->count();

            return view('statistiques', compact(
                'totalProjects',
                'ongoingProjects',
                'completedProjects',
                'totalTasks',
                'ongoingTasks',
                'completedTasks',
                'tasksAssignedByUser',
                'tasksAssignedToUser',
            )); 
        }
    }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
