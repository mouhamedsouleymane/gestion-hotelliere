<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .hero-section {
            background: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
            min-height: 100vh;
        }

        .card {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 3rem;
            color: #667eea;
        }

        .btn {
            border-radius: 25px;
            padding: 12px 30px;
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center text-white mb-5 animate-fade-in">
                        <i class="bi bi-building feature-icon text-white mb-3"></i>
                        <h1 class="display-4 fw-bold mb-3">Gestion Hôtelière</h1>
                        <p class="lead fs-4">Système moderne de gestion hôtelière</p>
                    </div>

                    <div class="row g-4 mb-5">
                        <div class="col-md-4">
                            <div class="card h-100 text-center animate-fade-in">
                                <div class="card-body p-4">
                                    <i class="bi bi-calendar-check feature-icon mb-3"></i>
                                    <h5>Réservations</h5>
                                    <p class="text-muted">Gérez facilement vos réservations</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 text-center animate-fade-in">
                                <div class="card-body p-4">
                                    <i class="bi bi-door-open feature-icon mb-3"></i>
                                    <h5>Chambres</h5>
                                    <p class="text-muted">Contrôlez l'état de vos chambres</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 text-center animate-fade-in">
                                <div class="card-body p-4">
                                    <i class="bi bi-graph-up feature-icon mb-3"></i>
                                    <h5>Statistiques</h5>
                                    <p class="text-muted">Analysez vos performances</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        <div class="text-center animate-fade-in">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg me-3">
                                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg me-3">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>Connexion
                                </a>
                                <!--  @if (Route::has('register'))
    <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                                                <i class="bi bi-person-plus me-2"></i>Inscription
                                            </a>
    @endif -->
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
