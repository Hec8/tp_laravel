<x-app-layout>
  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="py-12 w-50">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                <div class="container-fluid">
                  <h1 class="text-center mb-4">CREER UN PROJET</h1>
                  @if (session('status')) 
                    <div class="alert alert-success">
                      {{ session('status') }}
                    </div>
                  @endif 
                  
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                  </ul>
                  <div class="container-fluid">
                      <form action="/ajouter/traitement" method="POST">
                      @csrf
                          <div class="mb-3">
                              <label for="titre">Titre du projet</label>
                              <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez le titre du projet...">
                          </div>
                          <div class="mb-3">
                            <label for="titre">Description du projet</label>
                              <input type="text" class="form-control" name="description" id="description" placeholder="Entrez la description du projet...">
                          </div>
                          <div class="mb-3">
                            <label for="titre">Date limite</label>
                              <input type="date" class="form-control" name="date_limite" id="date_limite" placeholder="Entrez la date limite du projet...">
                          </div>
                          <div class="d-grid gap-2">
                              <button type="submit" class="btn btn-success">Créer</button>
                          </div>
                          <br>
                      </form>
                      <div class="text-center">
                        <a href="/project-management" class="btn btn-primary">Retour</a>
                      </div>
                  </div>
              </div> 
          </div>
      </div>
  </div>
  </div>
  </x-app-layout>
  