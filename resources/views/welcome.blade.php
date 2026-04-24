<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pertemuan 1 - Premium Portal</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=outfit:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a 40%),
                        radial-gradient(circle at bottom right, #312e81, #0f172a 40%);
        }
        .hero-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.15) 0%, transparent 70%);
            filter: blur(80px);
            z-index: -1;
        }
    </style>
</head>
<body class="h-screen flex items-center justify-center overflow-hidden text-white relative">
    <div class="hero-glow"></div>

    <div class="max-w-xl w-full mx-4">
        <div class="premium-card p-12 text-center relative">
            <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-24 h-24 rounded-3xl bg-indigo-600 shadow-2xl shadow-indigo-600/50 flex items-center justify-center border-4 border-slate-900 rotate-12 transition-transform hover:rotate-0 duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </div>

            <div class="mt-8">
                <h2 class="text-indigo-400 font-bold tracking-widest uppercase text-xs mb-3">Project Showcase</h2>
                <h1 class="text-4xl font-extrabold mb-2 tracking-tight">
                    <span class="gradient-text">Rafli Ramadhani</span>
                </h1>
                <p class="text-xl text-slate-300 font-medium opacity-80">20230140127</p>
                
                <div class="mt-8 pt-8 border-t border-slate-700/50 flex flex-col gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="premium-btn-primary py-4">
                                Enter Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="premium-btn-primary py-4">
                                Sign In to Portal
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="premium-btn bg-slate-800 text-slate-300 hover:bg-slate-700 py-4">
                                    Create New Account
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <p class="mt-8 text-slate-500 text-xs font-medium uppercase tracking-widest">Modul Pertemuan 1 &bull; 2024</p>
        </div>
        
        <div class="mt-8 flex justify-center gap-8 opacity-40 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
            <img src="https://laravel.com/img/logomark.min.svg" alt="Laravel" class="h-8">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="Tailwind" class="h-8">
        </div>
    </div>
</body>
</html>