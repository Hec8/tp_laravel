<x-app-layout>
    <br><br>
   <main>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <div class="container-fluid">
                  <div class="" align="center">
                    <h3>Bienvenue sur la page où vous pourrez gérer tous les comptes utilisateurs du site</h3>
                    <br>
                    <script>
                      $(document).ready(function() {
                          $('#usersTable').DataTable({
                              ajax: '/api/users',
                              columns: [
                                  { data: 'id' },
                                  { data: 'name' },
                                  { data: 'email' },
                                  { data: 'role' },
                                  
                                  {
                                      data: null,
                                      orderable: false,
                                      searchable: false,
                                      render: function(data, type, row) {
                                          return `
                                              <a href="/supprimer-user/${row.id}" class="btn btn-danger m-1">Supprimer</a>
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
                    <h3>Liste des utilisateurs</h3>
                    </div>  
                    @if (session('status')) 
                        <div class="alert alert-success">
                          {{ session('status') }}
                        </div>
                    @endif 
                      <table id="usersTable" class="table table-bordered table-striped m-3">
                          <thead class="thead-dark">
                              <tr>
                                  <th>Identifiant</th>
                                  <th>Username</th>
                                  <th>Email</th>
                                  <th>Rôle</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                      </table>
                    <a href="/admin/dashboard" class="btn btn-primary">Retourner sur le dashboard</a>
                </div>
               </main>
              </div> 
          </div>
      </div>
    </div>
    
</x-app-layout>