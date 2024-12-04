<x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="py-12 w-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p6 text-gray-900">
                    <div class="container-fluid">
                        <script>
                            $(document).ready(function() {
                                $('#tachesAssigneesTable').DataTable({
                                    ajax: '/api/assigned-task',
                                    columns: [
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
                                    ],
                                    language: {
                                        url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/French.json"
                                    }
                                });
                            });
                        </script>    
                        <h1>Mes tâches assignées</h1>
                        <table class="table" id="tachesAssigneesTable">
                            <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Description</th>
                                    <th>Priorité</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>