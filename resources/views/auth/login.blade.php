<x-guest-layout>
    <main class="flex-grow flex items-center justify-center px-6 py-20 relative overflow-hidden min-h-screen">

        {{-- Decorative background --}}
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
            <div class="absolute -top-[20%] -left-[10%] w-[60%] h-[60%] bg-surface-container rounded-full blur-[120px] opacity-40"></div>
            <div class="absolute top-[40%] -right-[5%] w-[40%] h-[50%] bg-secondary-fixed opacity-10 rounded-full blur-[100px]"></div>
        </div>

        <div class="w-full max-w-[440px] z-10">

            {{-- Brand --}}
            <div class="mb-12 text-center">
                <a href="/">
                    <h1 class="font-headline font-black text-4xl tracking-tighter text-primary mb-2">E-BookStore</h1>
                    <p class="font-label text-xs uppercase tracking-[0.15em] text-on-surface-variant font-semibold">The Digital Atelier</p>
                </a>
            </div>

            {{-- Login Card --}}
            <div class="bg-surface-container-lowest p-10 md:p-12 shadow-xl border border-outline-variant/10 relative overflow-hidden">
                <div class="mb-10">
                    <h2 class="font-headline font-bold text-2xl text-on-surface tracking-tight">Welcome back</h2>
                    <p class="text-on-surface-variant text-sm mt-1 font-body">Please enter your credentials to access your library.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-8">
                    @csrf

                    {{-- Email --}}
                    <div class="group">
                        <label for="email" class="block font-label text-[10px] uppercase tracking-[0.08em] font-bold text-on-surface-variant mb-2 group-focus-within:text-secondary transition-colors">
                            Email Address
                        </label>
                        <input
                            id="email" name="email" type="email"
                            value="{{ old('email') }}"
                            required autofocus autocomplete="username"
                            placeholder="name@email.com"
                            class="w-full bg-transparent border-0 border-b border-outline-variant/30 py-3 px-0 focus:ring-0 focus:border-secondary text-on-surface placeholder:text-outline-variant/50 transition-all duration-300 font-body"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div class="group">
                        <div class="flex justify-between items-end mb-2">
                            <label for="password" class="block font-label text-[10px] uppercase tracking-[0.08em] font-bold text-on-surface-variant group-focus-within:text-secondary transition-colors">
                                Password
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="font-label text-[10px] uppercase tracking-[0.05em] font-semibold text-on-surface-variant hover:text-secondary transition-colors">
                                    Forgot Password?
                                </a>
                            @endif
                        </div>
                        <input
                            id="password" name="password" type="password"
                            required autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full bg-transparent border-0 border-b border-outline-variant/30 py-3 px-0 focus:ring-0 focus:border-secondary text-on-surface placeholder:text-outline-variant/50 transition-all duration-300 font-body"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Submit --}}
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-primary text-on-primary font-headline font-bold py-5 px-6 text-sm tracking-wide hover:opacity-90 active:scale-[0.98] transition-all duration-300 flex items-center justify-center gap-2">
                            Enter the Atelier
                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                        </button>
                    </div>
                </form>

                <div class="mt-12 text-center">
                    <p class="text-[13px] text-on-surface-variant font-body">
                        New to our collection?
                        <a href="{{ route('register') }}" class="text-primary font-bold hover:text-secondary transition-colors underline decoration-outline-variant/30 underline-offset-4">
                            Create an account
                        </a>
                    </p>
                </div>

                <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-secondary/20 to-transparent"></div>
            </div>

            {{-- Status Strip --}}
            <div class="mt-8 flex justify-between items-center px-4">
                <div class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
                    <span class="font-label text-[10px] uppercase tracking-widest text-on-surface-variant font-bold">Secure Access</span>
                </div>
                <div class="flex gap-4">
                    <span class="material-symbols-outlined text-[16px] text-on-surface-variant">lock</span>
                    <span class="material-symbols-outlined text-[16px] text-on-surface-variant">verified_user</span>
                </div>
            </div>

        </div>
    </main>
</x-guest-layout>
