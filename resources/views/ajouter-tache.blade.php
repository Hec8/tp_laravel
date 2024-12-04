<x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="py-12 w-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <div class="container-fluid">
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li class="alert alert-danger">{{ $error }}</li>
                      @endforeach
                    </ul>
                    <div class="container">
                        <h1 align="center">Créer une tâche</h1>
                        <form action="{{ route('tache.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="titre">Title</label>
                                <input  name="titre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="priorite">Priorité</label>
                                <select name="priorite" class="form-control">
                                    <option selected>Sélectionnez la priorité</option>
                                    <option value="basse">Basse</option>
                                    <option value="moyenne">Moyenne</option>
                                    <option value="haute">Haute</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_projet">Projet</label> 
                                <select name="id_projet" class="form-control">
                                    <option selected>Sélectionnez le projet associé</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id_projet }}">{{ $project->titre }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Créer</button>
                            </div>
                        </form><br>
                        <a href="{{ route('task-management') }}" class="btn btn-danger">Retour</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</x-app-layout>