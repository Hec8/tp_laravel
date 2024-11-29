<x-app-layout>
    <br><br>
    <main>
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
                <table class="table table-bordered table-striped m-3">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id du projet</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date limite</th>
                            <th>Statut</th>
                            <th>Nom de l'utilisateur associé</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projets as $projet)
                            <tr>
                                <td>{{ $projet->id_projet }}</td>
                                <td>{{ $projet->titre }}</td>
                                <td>{{ $projet->description }}</td>
                                <td>{{ $projet->date_limite }}</td>
                                <td>
                                    <span class="badge {{ $projet->status === 'en cours' ? 'bg-warning text-dark' : 'bg-success text-white' }}">
                                        {{ $projet->status }}
                                    </span>
                                </td>
                                <td>{{ $projet->id }}</td> 
                                <td>                     
                                    <a href="/modifier-projet/{{ $projet->id_projet }}" class="btn btn-info">Modifier</a> 
                                    <a href="/supprimer-projet/{{ $projet->id_projet }}" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <a href="/admin/dashboard" class="btn btn-primary">Retourner sur le dashboard</a>
        </div>
    </main>
</x-app-layout>
