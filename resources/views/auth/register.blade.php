<x-guest-layout>
    {{-- Fixed Header --}}
    <header class="fixed top-0 w-full z-50 bg-surface/80 backdrop-blur-xl">
        <div class="flex justify-between items-center px-12 py-8 w-full max-w-screen-2xl mx-auto">
            <a href="/" class="font-headline font-black text-2xl tracking-tighter text-primary">E-BookStore</a>
            <a href="{{ route('login') }}" class="font-headline font-bold tracking-tight uppercase text-xs text-slate-600 hover:text-secondary transition-all duration-300">
                Login
            </a>
        </div>
    </header>

    <main class="flex-grow flex items-center justify-center px-6 pt-32 pb-24">
        <div class="w-full max-w-6xl grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">

            {{-- Left: Editorial Messaging --}}
            <div class="lg:col-span-5 space-y-8 lg:sticky lg:top-40">
                <div class="space-y-4">
                    <span class="font-label text-[10px] tracking-[0.2em] uppercase font-bold text-secondary">The Digital Atelier</span>
                    <h1 class="font-headline text-5xl lg:text-7xl font-extrabold tracking-tighter leading-none text-primary">
                        Join the <br/>Collective.
                    </h1>
                </div>
                <p class="text-on-surface-variant text-lg leading-relaxed max-w-md font-body">
                    Access a curated library of books and timeless narratives. Your journey into the atelier starts here.
                </p>
                <div class="pt-8 border-t border-outline-variant/20 flex flex-col gap-6">
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-secondary">auto_awesome</span>
                        <div>
                            <p class="font-headline font-bold text-sm text-primary uppercase tracking-wider">Curated Selections</p>
                            <p class="text-sm text-on-surface-variant font-body">Hand-picked titles across all genres.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <span class="material-symbols-outlined text-secondary">book_2</span>
                        <div>
                            <p class="font-headline font-bold text-sm text-primary uppercase tracking-wider">Borrow & Buy</p>
                            <p class="text-sm text-on-surface-variant font-body">Flexible reading options for every reader.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Registration Form --}}
            <div class="lg:col-span-7 lg:pl-12">
                <div class="bg-surface-container-lowest p-12 lg:p-20 shadow-xl shadow-slate-900/5 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-secondary/5 -mr-16 -mt-16 rounded-full blur-3xl"></div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-12 relative z-10">
                        @csrf

                        {{-- Name --}}
                        <div class="group">
                            <label for="name" class="block font-label text-[10px] tracking-[0.05em] uppercase font-semibold text-outline group-focus-within:text-secondary transition-colors duration-300 mb-2">
                                Full Name
                            </label>
                            <input
                                id="name" name="name" type="text"
                                value="{{ old('name') }}"
                                required autofocus autocomplete="name"
                                placeholder="John Doe"
                                class="w-full bg-transparent border-0 border-b border-outline-variant/30 px-0 py-3 focus:ring-0 focus:border-secondary transition-all duration-500 placeholder:text-outline-variant/50 text-on-surface text-xl font-body"
                            />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        {{-- Email --}}
                        <div class="group">
                            <label for="email" class="block font-label text-[10px] tracking-[0.05em] uppercase font-semibold text-outline group-focus-within:text-secondary transition-colors duration-300 mb-2">
                                Email Address
                            </label>
                            <input
                                id="email" name="email" type="email"
                                value="{{ old('email') }}"
                                required autocomplete="username"
                                placeholder="you@email.com"
                                class="w-full bg-transparent border-0 border-b border-outline-variant/30 px-0 py-3 focus:ring-0 focus:border-secondary transition-all duration-500 placeholder:text-outline-variant/50 text-on-surface text-xl font-body"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Password --}}
                        <div class="group">
                            <label for="password" class="block font-label text-[10px] tracking-[0.05em] uppercase font-semibold text-outline group-focus-within:text-secondary transition-colors duration-300 mb-2">
                                Secure Password
                            </label>
                            <input
                                id="password" name="password" type="password"
                                required autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full bg-transparent border-0 border-b border-outline-variant/30 px-0 py-3 focus:ring-0 focus:border-secondary transition-all duration-500 placeholder:text-outline-variant/50 text-on-surface text-xl font-body"
                            />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        {{-- Confirm Password --}}
                        <div class="group">
                            <label for="password_confirmation" class="block font-label text-[10px] tracking-[0.05em] uppercase font-semibold text-outline group-focus-within:text-secondary transition-colors duration-300 mb-2">
                                Confirm Password
                            </label>
                            <input
                                id="password_confirmation" name="password_confirmation" type="password"
                                required autocomplete="new-password"
                                placeholder="••••••••"
                                class="w-full bg-transparent border-0 border-b border-outline-variant/30 px-0 py-3 focus:ring-0 focus:border-secondary transition-all duration-500 placeholder:text-outline-variant/50 text-on-surface text-xl font-body"
                            />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        {{-- Submit --}}
                        <div class="pt-6">
                            <button
                                type="submit"
                                class="group relative w-full bg-primary text-on-primary py-5 px-8 font-headline font-bold uppercase tracking-[0.2em] text-xs flex items-center justify-between hover:bg-secondary transition-all duration-500 active:scale-[0.98]">
                                <span>Create Account</span>
                                <span class="material-symbols-outlined transition-transform group-hover:translate-x-1">arrow_forward</span>
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-sm text-on-surface-variant font-body hover:text-secondary transition-colors">
                                Already have an account? <span class="font-bold text-primary">Sign in</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
</x-guest-layout>
