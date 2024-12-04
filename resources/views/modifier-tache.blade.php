<x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="py-12 w-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <div class="container-fluid">
                    <h1 class="text-center mb-4">MODIFIER UNE TACHE</h1>
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
                        <form action="/modifier/traitement/tache/{{ $tache->id_tache }}" method="POST">
                            @csrf
                            @method('PATCH')
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez le nouveau titre de la tâche..." value="{{$tache->titre}}">
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="description" id="description" placeholder="Entrez la nouvelle description de la tâche..." value="{{$tache->description}}"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="priorite">Priorité</label>
                                    <select name="priorite" class="form-control" value="{{$tache->priorite}}">
                                        <option selected>Sélectionnez la nouvelle priorité de la tâche</option>
                                        <option value="basse">Basse</option>
                                        <option value="moyenne">Moyenne</option>
                                        <option value="haute">Haute</option>
                                    </select>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success">Modifier</button>
                                </div>
                            </form>
                            <br>
                        <div class="text-center">
                          <a href="/task-management" class="btn btn-primary">Annuler</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    </div>
    </x-app-layout>
    