<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .custom-link {
        color:rgb(255, 0, 0) !important;
      }
      .custom-position {
        margin-top: 20vh; /* Décale le texte encore plus bas */
      }

    </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Home</a>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link custom-link active" aria-current="page" href="{{ route('login') }}">Projets</a>
              </li>
            </ul>
            <ul class="nav justify-content-end">
              <li><a class="nav-link custom-link" href="{{ url('login') }}">Dashboard</a></li>
              <li><a class="nav-link custom-link" href="{{ route('login') }}">Sign in</a></li>
              <li><a class="nav-link custom-link" href="{{ route('register') }}">Sign up</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      
      <div class="d-flex justify-content-center vh-100 ">
        <div class="text-center mt-5">
            <h1 >Welcome !</h1>
            <p class="fw-medium font-monospace text-center"> Welcome to the site where you can carry out your best Projects </p>
        </div>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

@if (Route::has('login'))
                <nav class="navbar navbar-expand-lg bg-body-tertiary ">
                    <div class="container-fluid">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="navbar-brand">Tableau de bord</a>
                            @else
                                <a href="{{ route('login') }}" class="navbar-brand">Se connecter</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="navbar-brand">S'inscrire</a>
                            @endif
                        @endauth
                    </div>
                </nav>
            @endif