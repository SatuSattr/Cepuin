<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard Admin | {{ config('app.name', 'Cepuin') }}</title>

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
    <body class="antialiased ">
        @php
            $statusLabels = $statuses ?? [
                'dilaporkan' => 'Dilaporkan',
                'direview' => 'Direview',
                'diproses' => 'Diproses',
                'selesai' => 'Selesai',
            ];

            $statusStyles = [
                'dilaporkan' => 'bg-amber-50 text-amber-700 border border-amber-200',
                'direview' => 'bg-blue-50 text-blue-700 border border-blue-200',
                'diproses' => 'bg-indigo-50 text-indigo-700 border border-indigo-200',
                'selesai' => 'bg-emerald-50 text-emerald-700 border border-emerald-200',
            ];

            $summaryCounts = [];
            foreach ($statusLabels as $key => $label) {
                $summaryCounts[$key] = $reports->where('status', $key)->count();
            }

            $baseLinkClasses = 'flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition shadow-sm';
            $activeLinkClasses = 'bg-white/15 text-white hover:bg-white/25';
            $inactiveLinkClasses = 'text-white/70 hover:bg-white/10';
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
                            {{-- <li>
                                <a href="#"
                                   class="flex items-center gap-3 rounded-xl px-4 py-3 text-white/80 transition hover:bg-white/10 hover:text-white">
                                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/10">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3" />
                                            <circle cx="12" cy="12" r="9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Pengaturan Akun
                                </a>
                            </li> --}}
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
                                    <h1 class="mt-2 text-3xl font-semibold text-[var(--color-secondary)]">Panel Pengaduan BK</h1>
                                    <p class="mt-3 max-w-xl text-sm text-neutral-500">
                                        Kelola laporan siswa dengan satu tempat terpadu. Pantau status, perbarui catatan konselor, dan lakukan tindak lanjut secara cepat.
                                    </p>
                                </div>
                                <button
                                    class="inline-flex items-center justify-center self-end rounded-2xl border border-[var(--color-secondary)] px-4 py-2 text-sm font-semibold text-[var(--color-secondary)] transition hover:bg-[var(--color-secondary)] hover:text-white focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/30 lg:hidden"
                                    data-sidebar-toggle
                                    aria-controls="sidebar"
                                    aria-expanded="false"
                                >
                                    <span class="sr-only">Buka navigasi</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>

                            @if (session('success'))
                                <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 shadow">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="mt-8 grid gap-8 lg:grid-cols-[minmax(0,1.75fr)_minmax(0,0.9fr)]">
                                <div class="flex flex-col gap-6">
                                    <div class="flex flex-col justify-between gap-4 rounded-[28px] border border-neutral-100 bg-[var(--color-primary)] px-5 py-5 shadow-sm sm:flex-row sm:items-center">
                                        <div>
                                            <h2 class="text-lg font-semibold text-[var(--color-secondary)]">Semua Laporan</h2>
                                            <p class="text-xs text-neutral-500">Tinjau laporan terbaru dan lakukan tindakan yang dibutuhkan.</p>
                                        </div>
                                        <form method="GET" class="flex flex-col gap-2 sm:flex-row sm:items-center">
                                            <label for="status" class="text-xs font-medium text-neutral-500 sm:mr-2">Filter status</label>
                                            <div class="flex items-center gap-2">
                                                <select id="status" name="status" class="rounded-xl border border-neutral-300 bg-white px-3 py-2 text-xs font-medium text-neutral-600 shadow-sm focus:border-[var(--color-secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/30">
                                                    <option value="">Semua status</option>
                                                    @foreach ($statusLabels as $key => $label)
                                                        <option value="{{ $key }}" @selected($statusFilter === $key)>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="inline-flex items-center rounded-xl bg-[var(--color-secondary)] px-3 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-[#5c0101] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/40">
                                                    Terapkan
                                                </button>
                                                @if ($statusFilter)
                                                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center rounded-xl border border-neutral-300 px-3 py-2 text-xs font-medium text-neutral-500 shadow-sm transition hover:border-neutral-400 hover:text-neutral-800">
                                                        Reset
                                                    </a>
                                                @endif
                                            </div>
                                        </form>
                                    </div>

                                    <div class="overflow-hidden rounded-[32px] border border-neutral-100 bg-white shadow-[0_24px_60px_-45px_rgba(128,1,1,0.55)]">
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full border-separate border-spacing-y-3 bg-white">
                                                <thead>
                                                    <tr class="text-left text-xs font-semibold uppercase tracking-[2px] text-neutral-500">
                                                        <th class="px-6 py-4">Pelapor</th>
                                                        <th class="px-6 py-4">Nama Dilaporkan</th>
                                                        <th class="px-6 py-4">Kelas</th>
                                                        <th class="px-6 py-4">Waktu Kejadian</th>
                                                        <th class="px-6 py-4">Status</th>
                                                        <th class="px-6 py-4 text-right">Tindakan</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-sm text-neutral-700">
                                                    @forelse ($reports as $report)
                                                        <tr class="rounded-2xl bg-white shadow-[0_20px_50px_-35px_rgba(128,1,1,0.5)]">
                                                            <td class="px-6 py-4 align-top">
                                                                <div>
                                                                    <p class="font-semibold text-neutral-900">
                                                                        {{ $report->user->name ?? 'User #' . $report->user_id }}
                                                                    </p>
                                                                    <p class="text-xs text-neutral-500">ID {{ $report->user_id }}</p>
                                                                </div>
                                                            </td>
                                                            <td class="px-6 py-4 align-top">
                                                                <p class="font-medium text-neutral-900">{{ $report->reported_name }}</p>
                                                            </td>
                                                            <td class="px-6 py-4 align-top">
                                                                <span class="inline-flex rounded-xl bg-neutral-100 px-3 py-1 text-xs font-medium text-neutral-600">{{ $report->reported_class }}</span>
                                                            </td>
                                                            <td class="px-6 py-4 align-top">
                                                                @php
                                                                    $incidentAt = $report->incident_time ? \Illuminate\Support\Carbon::parse($report->incident_time) : null;
                                                                @endphp
                                                                <p class="font-medium">
                                                                    {{ $incidentAt?->format('d M Y') ?? '-' }}
                                                                </p>
                                                                <p class="text-xs text-neutral-500">
                                                                    {{ $incidentAt?->format('H:i') ?? '' }}
                                                                </p>
                                                            </td>
                                                            <td class="px-6 py-4 align-top">
                                                                @php
                                                                    $badgeClass = $statusStyles[$report->status] ?? 'bg-neutral-100 text-neutral-600 border border-neutral-200';
                                                                @endphp
                                                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold {{ $badgeClass }}">
                                                                    <span class="h-2 w-2 rounded-full bg-current"></span>
                                                                    {{ $statusLabels[$report->status] ?? ucfirst($report->status) }}
                                                                </span>
                                                            </td>
                                                            <td class="px-6 py-4 align-top text-right">
                                                                <button
                                                                    type="button"
                                                                    class="inline-flex items-center gap-2 rounded-xl bg-[var(--color-secondary)] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-[#5c0101] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/40"
                                                                    data-modal-target="modal-report-{{ $report->id }}"
                                                                >
                                                                    Review
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                                        <path d="M2.94 10.94l-.59-.59a1.5 1.5 0 010-2.12l3.82-3.82a1.5 1.5 0 012.12 0l1.17 1.17-5.94 5.94a1 1 0 01-1.41 0z" />
                                                                        <path d="M6.59 14.59l5.94-5.94 1.17 1.17a1.5 1.5 0 010 2.12l-3.82 3.82a1.5 1.5 0 01-2.12 0l-1.17-1.17z" />
                                                                        <path d="M12.71 3.29a1 1 0 011.41 0l2.59 2.59a1 1 0 010 1.41l-1.88 1.88-3.99-3.99 1.87-1.89z" />
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="px-6 py-8 text-center text-sm text-neutral-500">
                                                                Belum ada laporan yang masuk.
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <aside class="space-y-6">
                                    <div class="rounded-[32px] bg-gradient-to-br from-[var(--color-secondary)] to-[#470000] p-6 text-white shadow-[0_30px_60px_-45px_rgba(71,0,0,0.8)]">
                                        <p class="text-xs uppercase tracking-[3px] text-white/70">Total Laporan</p>
                                        <p class="mt-3 text-4xl font-semibold">{{ $reports->count() }}</p>
                                        <p class="mt-1 text-sm text-white/70">Seluruh laporan aktif dalam sistem</p>
                                        <div class="mt-6 grid gap-3">
                                            @foreach ($statusLabels as $key => $label)
                                                <div class="flex items-center justify-between">
                                                    <span class="text-xs font-medium text-white/80">{{ $label }}</span>
                                                    <span class="text-sm font-semibold text-white">{{ $summaryCounts[$key] }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="rounded-[32px] border border-white/70 bg-white/80 p-6 shadow-[0_20px_50px_-35px_rgba(128,1,1,0.4)]">
                                        <p class="text-xs font-semibold uppercase tracking-[3px] text-neutral-400">Catatan Cepat</p>
                                        <div class="mt-4 space-y-4">
                                            <div class="rounded-2xl bg-[var(--color-primary)] px-4 py-3 text-sm text-neutral-600 shadow-sm">
                                                Pastikan setiap laporan minimal mendapat status <strong class="font-semibold text-[var(--color-secondary)]">Direview</strong> dalam 24 jam.
                                            </div>
                                            <div class="rounded-2xl bg-[var(--color-primary)] px-4 py-3 text-sm text-neutral-600 shadow-sm">
                                                Gunakan kolom catatan untuk menyimpan ringkasan konseling atau tindak lanjut ke wali kelas.
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($reports as $report)
            <div
                id="modal-report-{{ $report->id }}"
                class="modal fixed inset-0 z-50 hidden items-center justify-center bg-black/50 px-4 py-8 backdrop-blur-sm"
                role="dialog"
                aria-modal="true"
            >
                <div data-modal-panel class="relative w-full max-w-3xl rounded-3xl bg-white shadow-2xl">
                    <div class="flex items-start justify-between border-b border-neutral-100 px-6 py-5">
                        <div>
                            <p class="text-sm font-medium text-neutral-500">Review Laporan</p>
                            <h3 class="text-xl font-semibold text-[var(--color-secondary)]">{{ $report->reported_name }}</h3>
                        </div>
                        <button class="rounded-full bg-neutral-100 p-2 text-neutral-500 transition hover:bg-neutral-200 hover:text-neutral-700 focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/30" data-modal-close>
                            <span class="sr-only">Tutup</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="grid gap-6 px-6 py-6 lg:grid-cols-[1.2fr_1fr]">
                        <div class="space-y-6">
                            <section class="rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-4">
                                <h4 class="text-sm font-semibold text-neutral-600">Informasi Laporan</h4>
                                <dl class="mt-4 grid gap-3 text-sm text-neutral-600">
                                    <div class="flex justify-between gap-4">
                                        <dt class="font-medium text-neutral-500">Pelapor</dt>
                                        <dd class="text-right">{{ $report->user->name ?? 'User #' . $report->user_id }}</dd>
                                    </div>
                                    <div class="flex justify-between gap-4">
                                        <dt class="font-medium text-neutral-500">Kelas</dt>
                                        <dd class="text-right">{{ $report->reported_class }}</dd>
                                    </div>
                                    <div class="flex justify-between gap-4">
                                        <dt class="font-medium text-neutral-500">Waktu Kejadian</dt>
                                        <dd class="text-right">
                                            @php
                                                $incidentAt = $report->incident_time ? \Illuminate\Support\Carbon::parse($report->incident_time) : null;
                                            @endphp
                                            {{ $incidentAt?->format('d M Y, H:i') ?? '-' }}
                                        </dd>
                                    </div>
                                </dl>
                            </section>

                            <section>
                                <h4 class="text-sm font-semibold text-neutral-600">Deskripsi Kejadian</h4>
                                <div class="mt-3 rounded-2xl border border-neutral-200 bg-white px-4 py-3 text-sm leading-relaxed text-neutral-700 shadow-sm">
                                    {{ $report->description }}
                                </div>
                            </section>

                            <section>
                                <h4 class="text-sm font-semibold text-neutral-600">Catatan Konselor</h4>
                                <form method="POST" action="{{ route('admin.reports.update', $report) }}" class="mt-3 space-y-4">
                                    @csrf
                                    @method('PUT')
                                    <textarea
                                        name="counselor_note"
                                        rows="4"
                                        class="w-full resize-none rounded-2xl border border-neutral-300 bg-neutral-50 px-4 py-3 text-sm text-neutral-700 shadow-sm focus:border-[var(--color-secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/30"
                                        placeholder="Tambahkan catatan tindak lanjut konselor..."
                                    >{{ old('counselor_note', $report->counselor_note) }}</textarea>

                                    <div class="flex flex-col gap-3 border-t border-neutral-200 pt-4 sm:flex-row sm:items-center sm:justify-between">
                                        <label class="text-sm font-medium text-neutral-600">
                                            Ubah Status
                                            <select
                                                name="status"
                                                class="mt-1 w-full rounded-xl border border-neutral-300 bg-white px-3 py-2 text-sm shadow-sm focus:border-[var(--color-secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/30"
                                            >
                                                @foreach ($statusLabels as $key => $label)
                                                    <option value="{{ $key }}" @selected(old('status', $report->status) === $key)>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </label>

                                        <button
                                            type="submit"
                                            class="inline-flex items-center justify-center rounded-xl bg-[var(--color-secondary)] px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-[#5c0101] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/40"
                                        >
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </section>
                        </div>

                        <div class="space-y-6">
                            <section class="rounded-2xl border border-neutral-200 bg-neutral-50 px-4 py-4">
                                <h4 class="text-sm font-semibold text-neutral-600">Lampiran Bukti</h4>
                                @if ($report->photo_path)
                                    <div class="mt-3 overflow-hidden rounded-2xl border border-white shadow-sm">
                                        <img
                                            src="{{ asset('storage/' . $report->photo_path) }}"
                                            alt="Foto laporan"
                                            class="h-56 w-full object-cover"
                                        >
                                    </div>
                                    <a
                                        href="{{ asset('storage/' . $report->photo_path) }}"
                                        target="_blank"
                                        class="mt-3 inline-flex items-center gap-2 text-sm font-medium text-[var(--color-secondary)] transition hover:text-[#5c0101]"
                                    >
                                        Lihat file asli
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 5v14m7-7H5" />
                                        </svg>
                                    </a>
                                @else
                                    <p class="mt-3 text-sm text-neutral-500">Tidak ada bukti foto yang diunggah.</p>
                                @endif
                            </section>

                            <section class="rounded-2xl border border-red-200 bg-red-50 px-4 py-4">
                                <h4 class="text-sm font-semibold text-red-700">Hapus Laporan</h4>
                                <p class="mt-2 text-sm text-red-700/80">
                                    Menghapus laporan akan menghapus seluruh data, termasuk catatan konselor dan foto bukti.
                                </p>
                                <form
                                    method="POST"
                                    action="{{ route('admin.reports.destroy', $report) }}"
                                    class="mt-4"
                                    onsubmit="return confirm('Yakin ingin menghapus laporan ini secara permanen?');"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400/40"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 7h12m-9 0v10m6-10v10M9 3h6a1 1 0 011 1v2H8V4a1 1 0 011-1z" />
                                        </svg>
                                        Hapus Laporan
                                    </button>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

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

                const openModalButtons = document.querySelectorAll('[data-modal-target]');
                const closeModalButtons = document.querySelectorAll('[data-modal-close]');

                const openModal = (modal) => {
                    modal?.classList.remove('hidden');
                    modal?.classList.add('flex');
                    document.body.classList.add('overflow-hidden');
                };

                const closeModal = (modal) => {
                    modal?.classList.add('hidden');
                    modal?.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden');
                };

                openModalButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const modalId = button.getAttribute('data-modal-target');
                        const modal = document.getElementById(modalId);
                        openModal(modal);
                    });
                });

                closeModalButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const modal = button.closest('.modal');
                        closeModal(modal);
                    });
                });

                document.querySelectorAll('.modal').forEach(modal => {
                    modal.addEventListener('click', (event) => {
                        if (event.target === modal) {
                            closeModal(modal);
                        }
                    });
                });

                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape') {
                        document.querySelectorAll('.modal.flex').forEach(modal => closeModal(modal));
                        closeSidebar();
                    }
                });
            });
        </script>
    </body>
</html>
