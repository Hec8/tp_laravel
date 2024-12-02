<x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="py-12 w-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <div class="container-fluid">
                    <h1 class="text-center mb-4">MODIFIER UN PROJET</h1>
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
                        <form action="/modifier/traitement/{{ $projet->id_projet }}" method="POST">
                            @csrf
                            @method('PATCH')
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez le nouveau titre du projet..." value="{{$projet->titre}}">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Entrez la nouvelle description du projet..." value="{{$projet->description}}">
                                </div>
                                <div class="mb-3">
                                    <input type="date" class="form-control" name="date_limite" id="date_limite" placeholder="Entrez la nouvelle description du projet..." value="{{$projet->date_limite}}">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success">Modifier</button>
                                </div>
                            </form>
                            <br>
                        <div class="text-center">
                          <a href="/project-management" class="btn btn-primary">Annuler</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    </div>
    </x-app-layout>
    