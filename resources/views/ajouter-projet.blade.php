<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un nouveau projet</title>
</head>
<body>
    <div class="container-fluid">
        <h1>CREER UN PROJET</h1>
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
                <div class="col-4">
                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Entrez le titre du projet...">
                </div><br>
                <div class="col-4">
                    <input type="text" class="form-control" name="description" id="description" placeholder="Entrez la description du projet...">
                </div><br>
                <div class="col-4">
                    <input type="date" class="form-control" name="date_limite" id="date_limite" placeholder="Entrez la date limite du projet...">
                </div><br>
                <select class="col-4" class="form-control" aria-label="Default select example" name="status">
                    <option selected class="form-control">Selectionner le statut</option>
                    <option value="en cours" class="form-control" >En cours</option>
                    <option value="terminé" class="form-control">Terminé</option>
                  </select><br>
                  <select class="col-4" class="form-control" aria-label="Default select example" name="id">
                    <option selected class="form-control">Selectionner l'utilisateur</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" class="form-control">{{ $user->id }}</option>
                    @endforeach
                  </select>
                <br>
                <div class="col-3">
                    <button type="submit" class="btn btn-success">Créer</button>
                </div>
                <br>
            </form>
            <a href="/project-management" class="btn btn-primary">Retour</a>
        </div>
</body>
</html>