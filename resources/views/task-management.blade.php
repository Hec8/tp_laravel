<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <main>
                        <script>
                            $(document).ready(function() {
                                $('#tachesTable').DataTable({
                                    ajax: '/api/task',
                                    columns: [
                                        { data: 'id_tache' },
                                        { data: 'titre' },
                                        { data: 'description' },
                                        { data: 'priorite' },
                                        { 
                                            data: 'statut',
                                            render: function(data, type, row) {
                                                const badgeClass = data === 'en cours' ? 'bg-warning text-dark' : 'bg-success text-white';
                                                return `<span class="badge ${badgeClass}">${data}</span>`;
                                            }
                                        },
                                        {
                                            data: null,
                                            orderable: false,
                                            searchable: false,
                                            render: function(data, type, row) {
                                                return `
                                                    <a href="/modifier-tache/${row.id_tache}" class="btn btn-info m-1">Modifier</a>
                                                    <a href="/terminer-tache/${row.id_tache}" class="btn btn-success m-1"
                                                       onclick="event.preventDefault(); document.getElementById('terminer-tache-${row.id_tache}').submit();">
                                                        Terminer 
                                                    </a>
                                                    <form id="terminer-tache-${row.id_tache}" action="/terminer-tache/${row.id_tache}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                    <a href="/assigner-tache/${row.id_tache}" class="btn btn-warning m-1">Assigner</a>
                                                    <a href="/supprimer-tache/${row.id_tache}" class="btn btn-danger m-1">Supprimer</a>
                                                `;
                                            }
                                        },
                                    ],
                                    language: {
                                        url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
                                    }
                                });
                            });
                        </script>                                              
                        <div class="container-fluid">
                            <div class="" align="center">
                                <h3>Bienvenue sur la page où vous pourrez gérer vos taches et en assigner à d'autres utilisateurs</h3>
                                <br>
                                <a href="{{ route('ajouter-tache') }}" class="btn btn-warning">Créer une tâche</a><br><br>
                                <h3>Liste des tâches</h3>
                            </div>  
                
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif 
                                <table id="tachesTable"  class="table table-bordered table-striped m-3">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id de la tâche</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Priorite</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            <a href="/mes-taches" class="btn btn-primary">Voir les tâches qu'on m'a assigné</a><br><br>
                            <a href="/user/dashboard" class="btn btn-danger">Retourner sur le dashboard</a>
                            
                        </div>
                    </main>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
