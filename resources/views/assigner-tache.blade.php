<x-app-layout>
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="py-12 w-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Assigner la tâche</h1>
                        <form action="{{ route('delegate-tache', $tache->id_tache) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email de l'utilisateur à assigner</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Assigner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>