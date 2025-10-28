@php
    $links = [
        [
            'label' => 'Ringkasan',
            'route' => route('student.dashboard'),
            'icon' => 'fa-solid fa-chart-line',
            'active' => request()->routeIs('student.dashboard'),
        ],
        [
            'label' => 'Buat Laporan',
            'route' => route('student.create'),
            'icon' => 'fa-solid fa-circle-plus',
            'active' => request()->routeIs('student.create'),
        ],
        [
            'label' => 'Profil',
            'route' => route('profile.edit'),
            'icon' => 'fa-solid fa-user',
            'active' => request()->routeIs('profile.*'),
        ],
    ];

    $linkBaseClasses = 'flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition shadow-sm';
    $linkActiveClasses = 'bg-white/15 text-white hover:bg-white/25';
    $linkInactiveClasses = 'text-white/70 hover:bg-white/10';
@endphp

<aside
    id="studentSidebar"
    class="fixed inset-y-0 left-0 z-40 h-screen w-72 -translate-x-full transform overflow-hidden bg-[var(--color-secondary)] text-white shadow-xl transition-transform duration-300 ease-in-out lg:translate-x-0 lg:shadow-none"
>
    <div class="flex h-full flex-col overflow-hidden">
        <div class="flex items-center justify-between px-6 pt-10 pb-6 lg:pb-8">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold font-poppins">Cepuin<span class="text-yellow-300">.</span></h1>
                <span class="ml-2 text-sm bg-yellow-400 text-[#800101] px-2 py-1 rounded-full font-medium">Beta</span>
            </div>
            <button
                type="button"
                class="rounded-xl bg-white/10 p-2 text-white transition hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/40 lg:hidden"
                data-sidebar-toggle
                aria-label="Tutup sidebar"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <nav class="px-4">
            <p class="px-2 text-xs font-semibold uppercase tracking-[3px] text-white/50">Navigasi</p>
            <ul class="mt-4 space-y-2 text-sm font-medium">
                @foreach ($links as $link)
                    <li>
                        <a
                            href="{{ $link['route'] }}"
                            class="{{ $linkBaseClasses }} {{ $link['active'] ? $linkActiveClasses : $linkInactiveClasses }}"
                        >
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-white/20">
                                <i class="{{ $link['icon'] }} text-base"></i>
                            </span>
                            {{ $link['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="mt-auto px-4 pb-8">
            <div class="rounded-2xl border border-white/15 bg-white/10 px-4 py-4 text-sm text-white/80">
                <p class="text-xs uppercase tracking-[3px] text-white/50">Halo,</p>
                <p class="mt-1 text-sm font-semibold text-white">
                    {{ Str::limit(auth()->user()?->name ?? 'Siswa', 32) }}
                </p>
                <p class="mt-1 text-xs text-white/60">
                    Tetap pantau pembaruan laporanmu di dashboard.
                </p>
            </div>

            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button
                    type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-white px-4 py-3 text-sm font-semibold text-[var(--color-secondary)] shadow-lg shadow-[rgba(15,23,42,0.18)] transition hover:bg-white/90 focus:outline-none focus:ring-2 focus:ring-white/40"
                >
                    <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
                    Keluar
                </button>
            </form>
        </div>
    </div>
</aside>
