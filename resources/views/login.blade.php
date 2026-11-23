<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGMA · Sistema Universitario</title>
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

        <!-- Panel izquierdo -->
        <section class="hero">
            <h2 class="hero__title">Toda la gestión académica en un solo lugar.</h2>
            <p class="hero__text">Inscripciones, horarios, notas, herramientas para cada personal de la universidad.</p>

            <ul class="roles" aria-label="Perfiles del sistema">
                <li>Estudiante</li>
                <li>Profesor</li>
                <li>Coordinador</li>
                <li>Secretaría</li>
            </ul>
        </section>

        <!-- Panel derecho -->
        <section class="panel">
            <a class="brand" href="#" aria-label="SIGMA, Sistema Universitario">
                <svg class="brand__mark">
                    <use href="#sigma-mark" />
                </svg>
                <span class="brand__name">SIGMA</span>
            </a>

            <h1 class="panel__title">Bienvenido</h1>
            <p class="panel__sub">Ingresa al Sistema Universitario con tu cuenta</p>

            <form class="form" id="login" action="login.php" method="POST" novalidate>
                <p class="alert" id="alert" role="alert" hidden></p>

                <label class="field">
                    <span class="sr-only">Usuario o Documento</span>
                    <input type="text" name="user" id="user" placeholder="Usuario o Documento"
                        autocomplete="username" required>
                </label>

                <label class="field">
                    <span class="sr-only">Contraseña</span>
                    <input type="password" name="password" id="password" placeholder="Contraseña"
                        autocomplete="current-password" required>
                    <button class="field__eye" type="button" id="toggle" aria-label="Mostrar contraseña"
                        aria-pressed="false">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </label>

                <a class="forgot" href="#" hidden>¿Olvidaste tu contraseña?</a>

                <button class="btn" type="submit">Iniciar sesión</button>
            </form>

            <p class="notice">
                ¿Aún no tienes acceso? Las cuentas las crea Secretaría. Solicítala en la oficina.
            </p>
        </section>

    </main>

    @RegisterServiceWorkerScript
</body>

</html>
