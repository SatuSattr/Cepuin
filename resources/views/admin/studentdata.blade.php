<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Data Siswa | {{ config('app.name', 'Cepuin') }}</title>

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
    </head>
    <body class="antialiased">
        @php
            $baseLinkClasses = 'flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition shadow-sm';
            $activeLinkClasses = 'bg-white/15 text-white hover:bg-white/25';
            $inactiveLinkClasses = 'text-white/70 hover:bg-white/10';
            $stats = $stats ?? [];
            $summaryCards = [
                [
                    'label' => 'Pelapor Aktif',
                    'value' => $stats['unique_reporters'] ?? 0,
                    'icon' => 'fa-solid fa-user-check',
                    'description' => 'Siswa yang pernah mengirim laporan.',
                ],
                [
                    'label' => 'Siswa Dilaporkan',
                    'value' => $stats['unique_reported'] ?? 0,
                    'icon' => 'fa-solid fa-user-shield',
                    'description' => 'Nama siswa yang tercatat dalam laporan.',
                ],
                [
                    'label' => 'Total Laporan',
                    'value' => $stats['total_reports'] ?? 0,
                    'icon' => 'fa-solid fa-clipboard-list',
                    'description' => 'Akumulasi laporan yang diterima.',
                ],
            ];

            if (! empty($stats['most_active_reporter'])) {
                $summaryCards[] = [
                    'label' => 'Pelapor Teraktif',
                    'value' => $stats['most_active_reporter']['count'],
                    'icon' => 'fa-solid fa-users',
                    'description' => $stats['most_active_reporter']['name'],
                ];
            }

            if (! empty($stats['most_reported_student'])) {
                $summaryCards[] = [
                    'label' => 'Paling Sering Dilaporkan',
                    'value' => $stats['most_reported_student']['count'],
                    'icon' => 'fa-solid fa-user-exclamation',
                    'description' => $stats['most_reported_student']['name'],
                ];
            }
        @endphp

        <div class="min-h-screen lg:flex">
            <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 w-72 transform bg-[var(--color-secondary)] text-white shadow-xl transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:shadow-none">
                <div class="flex h-full flex-col">
                    <div class="flex items-center justify-between px-6 pt-10 pb-6 lg:pb-8">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-white/20 text-2xl font-semibold">
                                <i class="fa-solid fa-school-flag"></i>
                            </span>
                            <div>
                                <p class="text-xs uppercase tracking-[4px] text-white/60">Dashboard</p>
                                <p class="text-lg font-semibold">Cepuin</p>
                            </div>
                        </div>
                        <button
                            class="rounded-xl bg-white/10 p-2 text-white transition hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/40 lg:hidden"
                            data-sidebar-toggle
                            aria-controls="sidebar"
                            aria-expanded="false"
                        >
                            <span class="sr-only">Tutup navigasi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <nav class="px-4">
                        <p class="px-2 text-xs font-semibold uppercase tracking-[3px] text-white/50">Navigasi</p>
                        <ul class="mt-4 space-y-2 text-sm font-medium">
                            <li>
                                <a href="{{ route('admin.dashboard') }}"
                                   class="{{ $baseLinkClasses }} {{ request()->routeIs('admin.dashboard') ? $activeLinkClasses : $inactiveLinkClasses }}">
                                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/20">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7h18M3 12h18M3 17h18" />
                                        </svg>
                                    </span>
                                    Semua Laporan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.studentdata') }}"
                                   class="{{ $baseLinkClasses }} {{ request()->routeIs('admin.studentdata') ? $activeLinkClasses : $inactiveLinkClasses }}">
                                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/20">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5V4a1 1 0 00-1-1H3a1 1 0 00-1 1v16h5" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 20v-6h10v6m-7-6v-3a2 2 0 014 0v3" />
                                        </svg>
                                    </span>
                                    Data Siswa
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="mt-auto px-6 pb-8 pt-6">

                        <div class="mt-6 rounded-3xl border border-white/10 bg-white/5 p-5">
                            <p class="text-xs uppercase tracking-[3px] text-white/60">Akun</p>
                            <div class="mt-3 flex items-center gap-3 text-sm text-white/80">
                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-white/15 text-base font-semibold">
                                    {{ strtoupper(substr(optional(auth()->user())->name ?? 'A', 0, 1)) }}
                                </span>
                                <div>
                                    <p class="font-semibold text-white">{{ optional(auth()->user())->name ?? 'Admin' }}</p>
                                    <p class="text-xs text-white/60">{{ optional(auth()->user())->email ?? 'admin@example.com' }}</p>
                                </div>
                            </div>

                            <form action="{{ route('logout') }}" method="POST" class="mt-5">
                                @csrf
                                <button type="submit"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-white/15 px-4 py-2 text-sm font-semibold text-white transition hover:bg-white/25 focus:outline-none focus:ring-2 focus:ring-white/40">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 4.5A1.5 1.5 0 014.5 3h6a1.5 1.5 0 011.5 1.5V7a.75.75 0 01-1.5 0V4.5h-6v11h6V13a.75.75 0 011.5 0v2.5a1.5 1.5 0 01-1.5 1.5h-6A1.5 1.5 0 013 15.5v-11z" clip-rule="evenodd" />
                                        <path d="M12.22 9.22a.75.75 0 010 1.06l-2.47 2.47a.75.75 0 101.06 1.06l1.97-1.97 1.97 1.97a.75.75 0 101.06-1.06l-2.47-2.47a.75.75 0 010-1.06l2.47-2.47a.75.75 0 10-1.06-1.06L12.81 7.5l-1.97-1.97a.75.75 0 10-1.06 1.06l2.44 2.63z" />
                                    </svg>
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </aside>

            <div id="sidebarOverlay" class="fixed inset-0 z-30 hidden bg-black/40 backdrop-blur-sm lg:hidden"></div>

            <div class="relative flex min-h-screen flex-1 flex-col bg-[var(--color-secondary)] lg:ml-30 lg:h-screen lg:overflow-y-auto">
                <div class="pointer-events-none absolute inset-0 -z-10 overflow-hidden">
                    <div class="absolute -top-24 -left-36 hidden h-72 w-72 rounded-full bg-[var(--color-secondary)]/12 blur-3xl lg:block"></div>
                    <div class="absolute -bottom-32 right-[-6rem] hidden h-[26rem] w-[26rem] rounded-full bg-[var(--color-secondary)]/12 blur-3xl md:block"></div>
                </div>

                <div class="relative z-10 w-full px-4 py-8 sm:px-6 lg:px-8">
                    <div class="mx-auto flex w-full max-w-6xl flex-col gap-8">
                        <section class="rounded-[40px] border border-white/60 bg-white/90 px-6 py-6 shadow-[0_40px_80px_-48px_rgba(128,1,1,0.55)] backdrop-blur sm:px-10 sm:py-[5rem]">
                            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                                <div>
                                    <p class="text-sm font-medium text-neutral-400">Halo, {{ optional(auth()->user())->name ?? 'Admin' }}</p>
                                    <h1 class="mt-2 text-3xl font-semibold text-[var(--color-secondary)]">Data Interaksi Siswa</h1>
                                    <p class="mt-3 max-w-2xl text-sm text-neutral-500">
                                        Lihat ringkasan siswa yang aktif melaporkan dan nama-nama yang paling sering dilaporkan. Gunakan data ini untuk memetakan kebutuhan pendampingan dan tindak lanjut konseling.
                                    </p>
                                </div>
                                <div class="inline-flex items-center gap-3 self-start rounded-3xl border border-[var(--color-secondary)]/10 bg-[var(--color-secondary)]/5 px-4 py-3 text-[var(--color-secondary)]">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-[var(--color-secondary)]/10">
                                        <i class="fa-solid fa-chart-pie text-lg"></i>
                                    </span>
                                    <div>
                                        <p class="text-xs uppercase tracking-[3px] text-[var(--color-secondary)]/60">Update</p>
                                        <p class="text-sm font-semibold">Rekap laporan terbaru</p>
                                        <p class="text-xs text-[var(--color-secondary)]/70">Perbarui data secara berkala untuk analisis yang akurat.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                                @foreach ($summaryCards as $card)
                                    <article class="group relative overflow-hidden rounded-3xl border border-[var(--color-secondary)]/10 bg-white shadow-[0_30px_50px_-40px_rgba(128,1,1,0.55)] transition hover:-translate-y-1 hover:shadow-[0_40px_60px_-40px_rgba(128,1,1,0.6)]">
                                        <div class="absolute -right-6 -top-6 h-32 w-32 rounded-full bg-[var(--color-secondary)]/5 transition group-hover:scale-110"></div>
                                        <div class="relative p-6">
                                            <div class="flex items-center justify-between">
                                                <div class="rounded-2xl bg-[var(--color-secondary)]/10 p-3 text-[var(--color-secondary)]">
                                                    <i class="{{ $card['icon'] }}"></i>
                                                </div>
                                                <span class="text-xs font-semibold uppercase tracking-wider text-[var(--color-secondary)]/50">Statistik</span>
                                            </div>
                                            <p class="mt-6 text-sm font-medium text-neutral-500">{{ $card['label'] }}</p>
                                            <p class="mt-2 text-3xl font-semibold text-[var(--color-secondary)]">
                                                {{ number_format($card['value']) }}
                                            </p>
                                            <p class="mt-4 text-xs leading-relaxed text-neutral-500">{{ $card['description'] }}</p>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </section>

                        <section class="rounded-[40px] border border-white/60 bg-white/90 px-6 py-6 shadow-[0_40px_80px_-48px_rgba(128,1,1,0.55)] backdrop-blur sm:px-10 sm:py-12">
                            <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                                <div>
                                    <h2 class="text-2xl font-semibold text-[var(--color-secondary)]">Relasi Pelapor &amp; Terlapor</h2>
                                    <p class="mt-2 max-w-2xl text-sm text-neutral-500">
                                        Tinjau pasangan siswa yang terlibat dalam laporan. Setiap baris menunjukkan seberapa sering seorang pelapor melaporkan nama tertentu dan kapan terakhir kali laporan tersebut diterima.
                                    </p>
                                </div>
                                <div class="flex items-center gap-3 rounded-3xl border border-[var(--color-secondary)]/10 bg-[var(--color-secondary)]/5 px-4 py-3 text-sm text-[var(--color-secondary)]">
                                    <i class="fa-solid fa-filter-circle-dollar text-base"></i>
                                    <span>Urut berdasarkan jumlah laporan terbanyak</span>
                                </div>
                            </div>

                            <div class="mt-8 overflow-hidden rounded-3xl border border-neutral-100 shadow-sm">
                                @if ($reportPairs->isEmpty())
                                    <div class="flex flex-col items-center justify-center gap-4 px-6 py-16 text-center text-neutral-500">
                                        <span class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-[var(--color-secondary)]/10 text-[var(--color-secondary)]">
                                            <i class="fa-regular fa-face-smile-beam text-2xl"></i>
                                        </span>
                                        <div>
                                            <p class="text-sm font-semibold text-neutral-600">Belum ada data laporan</p>
                                            <p class="mt-1 text-xs text-neutral-500">Saat siswa mengirim laporan, ringkasan pasangan pelapor dan terlapor akan muncul di sini.</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="relative max-h-[28rem] overflow-y-auto">
                                        <table class="min-w-full divide-y divide-neutral-200 text-left text-sm">
                                            <thead class="bg-neutral-50 text-xs uppercase tracking-wider text-neutral-500">
                                                <tr>
                                                    <th scope="col" class="px-6 py-4 font-semibold">Pelapor</th>
                                                    <th scope="col" class="px-6 py-4 font-semibold">Nama Dilaporkan</th>
                                                    <th scope="col" class="px-6 py-4 font-semibold text-center">Jumlah Laporan</th>
                                                    <th scope="col" class="px-6 py-4 font-semibold text-right">Terakhir Dilaporkan</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-neutral-100 bg-white">
                                                @foreach ($reportPairs as $row)
                                                    <tr class="transition hover:bg-[var(--color-primary)]/40">
                                                        <td class="px-6 py-4">
                                                            <div class="flex items-center gap-3">
                                                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-[var(--color-secondary)]/10 text-[var(--color-secondary)] font-semibold">
                                                                    {{ strtoupper(substr($row['reporter_name'], 0, 1)) }}
                                                                </span>
                                                                <div>
                                                                    <p class="font-semibold text-neutral-700">{{ $row['reporter_name'] }}</p>
                                                                    <p class="text-xs text-neutral-400">Pelapor</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div>
                                                                <p class="font-semibold text-neutral-700">{{ $row['reported_name'] }}</p>
                                                                <p class="text-xs text-neutral-400">Terlaporkan</p>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            <span class="inline-flex items-center justify-center rounded-full bg-[var(--color-secondary)]/10 px-4 py-1 text-sm font-semibold text-[var(--color-secondary)]">
                                                                {{ number_format($row['total_reports']) }}x
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 text-right text-sm text-neutral-500">
                                                            @if ($row['last_report_at'])
                                                                {{ \Illuminate\Support\Carbon::parse($row['last_report_at'])->format('d M Y, H:i') }}
                                                            @else
                                                                <span class="text-neutral-400">-</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                const sidebarToggles = document.querySelectorAll('[data-sidebar-toggle]');

                const openSidebar = () => {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                    sidebarToggles.forEach(btn => btn.setAttribute('aria-expanded', 'true'));
                };

                const closeSidebar = () => {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                    sidebarToggles.forEach(btn => btn.setAttribute('aria-expanded', 'false'));
                };

                sidebarToggles.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const isHidden = sidebar.classList.contains('-translate-x-full');
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
    </body>
</html>
