<x-app-layout>
    <br><br>
   <main>
    <div class="container-fluid">
      <div class="" align="center">
        <h3>Bienvenue sur la page où vous pourrez gérer tous les comptes du site</h3>
        <br>
        <h3>Liste des utilisateurs</h3>
        </div>  
        @if (session('status')) 
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
        @endif 
          <table class="table table-bordered table-striped m-3">
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
                @foreach ($users as $user)
                  <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->role }}</td>  
                      <td>                      
                          <a href="/supprimer-user/{{ $user->id }}" class="btn btn-danger">Supprimer</a>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
        <a href="/admin/dashboard" class="btn btn-primary">Retourner sur le dashboard</a>
    </div>
   </main>
</x-app-layout>