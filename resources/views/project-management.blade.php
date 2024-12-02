<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <main>
                        <script>
                            $(document).ready(function() {
                                $('#projetsTable').DataTable({
                                    ajax: '/api/projets',
                                    columns: [
                                        { data: 'id_projet' },
                                        { data: 'titre' },
                                        { data: 'description' },
                                        { data: 'date_limite' },
                                        { 
                                            data: 'status',
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
                                                    <a href="/modifier-projet/${row.id_projet}" class="btn btn-info m-1">Modifier</a>
                                                    <a href="/terminer-projet/${row.id_projet}" class="btn btn-success m-1"
                                                       onclick="event.preventDefault(); document.getElementById('terminer-projet-${row.id_projet}').submit();">
                                                        Terminer
                                                    </a>
                                                    <form id="terminer-projet-${row.id_projet}" action="/terminer-projet/${row.id_projet}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                    <a href="/supprimer-projet/${row.id_projet}" class="btn btn-danger m-1">Supprimer</a>
                                                `;
                                            }
                                        }
                                    ],
                                    language: {
                                        url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
                                    }
                                });
                            });
                        </script>                                              
                        <div class="container-fluid">
                            <div class="" align="center">
                                <h3>Bienvenue sur la page où vous pourrez gérer tous les projets qui ont été créés sur le site</h3>
                                <br>
                                <a href="{{ route('ajouter-projet') }}" class="btn btn-warning">Créer un projet</a><br><br>
                                <h3>Liste des projets</h3>
                            </div>  
                
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif 
                
                            @if ($projets->isEmpty())
                                <h1 align="center">Aucun projet créé pour l'instant</h1>
                            @else
                                <table id="projetsTable"  class="table table-bordered table-striped m-3">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id du projet</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Date limite</th>
                                            <th>Statut</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            @endif
                
                            <a href="/admin/dashboard" class="btn btn-primary">Retourner sur le dashboard</a>
                        </div>
                    </main>
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
