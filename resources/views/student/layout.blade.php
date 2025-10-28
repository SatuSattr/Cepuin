<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trim(($title ?? '') . ' | ' . config('app.name', 'Cepuin'), ' |') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/02b1edd5b5.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --color-primary: #f2f2f2;
            --color-secondary: #800101;
            --color-dark: #1f1f1f;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top left, rgba(128, 1, 1, 0.12), transparent 48%), linear-gradient(135deg, #f8f8f8 0%, #ffffff 65%);
            color: var(--color-dark);
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">
    <div class="relative min-h-screen lg:pl-72">
        @include('student.partials.navigation')

        <div id="sidebarOverlay" class="fixed inset-0 z-30 hidden bg-black/30 backdrop-blur-sm lg:hidden"></div>

        <div class="flex min-h-screen flex-col">


            <main class="relative flex-1 bg-[var(--color-secondary)]">
                <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
                    <div class="absolute -top-24 -left-32 hidden h-64 w-64 rounded-full bg-white/10 blur-3xl lg:block">
                    </div>
                    <div
                        class="absolute -bottom-32 right-[-6rem] hidden h-[22rem] w-[22rem] rounded-full bg-white/10 blur-3xl md:block">
                    </div>
                </div>

                <div class="relative z-10 w-full px-5 py-8 sm:px-8 lg:px-12 xl:px-16">
                    <div class="mx-auto w-full max-w-7xl">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    </div>
    </div>

    @stack('modals')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('studentSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const sidebarToggles = document.querySelectorAll('[data-sidebar-toggle]');

            const openSidebar = () => {
                sidebar?.classList.remove('-translate-x-full');
                overlay?.classList.remove('hidden');
                document.body.classList.add('overflow-hidden');
                sidebarToggles.forEach(btn => btn.setAttribute('aria-expanded', 'true'));
            };

            const closeSidebar = () => {
                sidebar?.classList.add('-translate-x-full');
                overlay?.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
                sidebarToggles.forEach(btn => btn.setAttribute('aria-expanded', 'false'));
            };

            sidebarToggles.forEach(btn => {
                btn.addEventListener('click', () => {
                    const isHidden = sidebar?.classList.contains('-translate-x-full');
                    isHidden ? openSidebar() : closeSidebar();
                });
            });

            overlay?.addEventListener('click', closeSidebar);

            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    closeSidebar();
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    closeSidebar();
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
