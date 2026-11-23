<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGMA · Dashboard</title>
    <link rel="stylesheet" href="{{ asset('extras/login.css') }}">
    @PwaHead
</head>

<body>

    <!-- Símbolo del logo: Σ facetada (se reutiliza con <use>) -->
    <svg width="0" height="0" style="position:absolute" aria-hidden="true">
        <symbol id="sigma-mark" viewBox="0 0 120 130">
            <polygon points="10,10 110,10 110,30 50,30" fill="#5AA7FF" />
            <polygon points="10,10 50,30 78,65 62,65" fill="#2F80E8" />
            <polygon points="62,65 78,65 50,100 10,120" fill="#25579C" />
            <polygon points="10,120 50,100 110,100 110,120" fill="#1B3A6B" />
            <polygon points="10,10 110,10 106,14 18,14" fill="#CFE6FF" opacity=".7" />
        </symbol>
    </svg>

    <main class="card">
        <section class="hero">
            <h2 class="hero__title">Toda la gestión académica en un solo lugar.</h2>
            <p class="hero__text">Has iniciado sesión correctamente en SIGMA.</p>
        </section>

        <section class="panel">
            <a class="brand" href="{{ route('dashboard') }}" aria-label="SIGMA, Sistema Universitario">
                <svg class="brand__mark">
                    <use href="#sigma-mark" />
                </svg>
                <span class="brand__name">SIGMA</span>
            </a>

            <h1 class="panel__title">Bienvenido, {{ auth()->user()->name }}</h1>
            <p class="panel__sub">{{ auth()->user()->email }}</p>

            <form class="form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn" type="submit">Cerrar sesión</button>
            </form>
        </section>

    </main>

    @RegisterServiceWorkerScript
</body>

</html>
