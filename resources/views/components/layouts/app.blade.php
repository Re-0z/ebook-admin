<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? 'E-BookStore' }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-surface text-on-surface antialiased" style="font-family: 'Inter', sans-serif; background-color: #faf8ff;">
        <livewire:navbar />
        {{ $slot }}
        <footer class="w-full border-t border-slate-100 bg-surface">
            <div class="flex flex-col md:flex-row justify-between items-center w-full px-8 py-12 max-w-7xl mx-auto gap-6">
                <div class="font-headline font-bold uppercase tracking-widest text-slate-900">E-BookStore</div>
                <div class="flex gap-8">
                    <a class="font-body text-sm text-slate-500 hover:text-amber-500 transition-colors" href="#">Privacy</a>
                    <a class="font-body text-sm text-slate-500 hover:text-amber-500 transition-colors" href="#">Terms</a>
                    <a class="font-body text-sm text-slate-500 hover:text-amber-500 transition-colors" href="#">Support</a>
                    <a class="font-body text-sm text-slate-500 hover:text-amber-500 transition-colors" href="#">Authors</a>
                </div>
                <div class="font-body text-sm text-slate-500">© {{ date('Y') }} E-BookStore. Crafted for Readers.</div>
            </div>
            <div class="bg-surface-container-high py-2 px-8">
                <div class="max-w-7xl mx-auto flex justify-between items-center font-label text-[10px] uppercase tracking-widest text-on-surface-variant font-medium">
                    <div class="flex gap-4">
                        <span>E-BookStore</span>
                        <span>System: Active</span>
                    </div>
                    <div>{{ now()->format('H:i') }} UTC+8</div>
                </div>
            </div>
        </footer>
    </body>
</html>
