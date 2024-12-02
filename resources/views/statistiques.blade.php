<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <!-- Card pour les statistiques des projets -->
                            <div class="col-md-6">
                                <div class="card border-primary mb-3">
                                    <div class="card-header bg-primary text-white">
                                        <h4 class="card-title">Statistiques des Projets</h4>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-text">Utilisateur : <strong>{{ Auth::user()->name }}</strong></h5>
                                        <p class="card-text">
                                            <strong>Total de projets créés :</strong> {{ $totalProjects }}
                                        </p>
                                        <p class="card-text">
                                            <strong>Projets en cours :</strong> {{ $ongoingProjects }}
                                        </p>
                                        <p class="card-text">
                                            <strong>Projets terminés :</strong> {{ $completedProjects }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Card pour les statistiques des tâches -->
                            <div class="col-md-6">
                                <div class="card border-success mb-3">
                                    <div class="card-header bg-success text-white">
                                        <h4 class="card-title">Statistiques des Tâches</h4>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-text">Utilisateur : <strong>{{ Auth::user()->name }}</strong></h5>
                                        <p class="card-text">
                                            <strong>Total de tâches créées :</strong> {{ $totalTasks }}
                                        </p>
                                        <p class="card-text">
                                            <strong>Tâches en cours :</strong> {{ $ongoingTasks }}
                                        </p>
                                        <p class="card-text">
                                            <strong>Tâches terminées :</strong> {{ $completedTasks }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>