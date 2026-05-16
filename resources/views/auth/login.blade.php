<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login — {{ config('app.name', 'Porto Yogi') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .login-bg { background: linear-gradient(135deg, #f0f9ff 0%, #f8fafc 50%, #fffbeb 100%); }
        .login-card { backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); }
        .float-animation { animation: float 6s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
        .gradient-text { background: linear-gradient(135deg, #0ea5e9, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="login-bg min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
        <div class="absolute top-[-10%] left-[-5%] w-72 h-72 bg-sky-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-96 h-96 bg-amber-500/10 rounded-full blur-3xl"></div>
        <div class="absolute top-[30%] right-[10%] w-48 h-48 bg-sky-300/10 rounded-full blur-3xl"></div>

        <div class="w-full max-w-md relative z-10">
            <div class="text-center mb-8 float-animation">
                <a href="/" class="inline-block">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 w-20 mx-auto mb-4 drop-shadow-lg">
                </a>
                <h1 class="text-2xl font-bold gradient-text">Welcome Back</h1>
                <p class="text-slate-500 text-sm mt-1">Sign in to your admin panel</p>
            </div>

            <div class="login-card bg-white/80 border border-white/50 rounded-2xl shadow-xl p-8">
                @if(session('status'))
                    <div class="mb-4 p-3 text-sm text-green-800 bg-green-50 border border-green-200 rounded-lg">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-slate-700">Email</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </span>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                class="w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-sky-500/50 focus:border-sky-500 transition-all placeholder-slate-400"
                                placeholder="admin@example.com">
                        </div>
                        @error('email') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-slate-700">Password</label>
                        <div class="relative" x-data="{ showPassword: false }">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                            <input id="password" :type="showPassword ? 'text' : 'password'" name="password" required autocomplete="current-password"
                                class="w-full pl-11 pr-12 py-3 bg-white border border-slate-200 rounded-xl text-slate-800 text-sm focus:ring-2 focus:ring-sky-500/50 focus:border-sky-500 transition-all placeholder-slate-400"
                                placeholder="••••••••">
                            <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-slate-400 hover:text-slate-600 transition-colors">
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                <svg x-show="showPassword" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                            </button>
                        </div>
                        @error('password') <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label for="remember_me" class="flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-sky-500 focus:ring-sky-500/50 transition-colors">
                            <span class="ml-2 text-sm text-slate-600">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-sky-500 hover:text-sky-600 font-medium transition-colors">Forgot password?</a>
                        @endif
                    </div>

                    <button type="submit" class="w-full py-3 px-4 bg-sky-500 text-white font-semibold rounded-xl hover:bg-sky-600 focus:ring-4 focus:ring-sky-500/30 transition-all text-sm shadow-lg shadow-sky-500/25 active:scale-[0.98]">
                        Sign In
                    </button>
                </form>
            </div>

            <p class="text-center text-xs text-slate-400 mt-6">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
