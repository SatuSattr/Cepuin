@extends('student.layout')



@section('content')
    @php
        $statusLabels = [
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

        $summaryCounts = collect($statusLabels)->mapWithKeys(
            fn($label, $key) => [
                $key => $reports->where('status', $key)->count(),
            ],
        );

        $latestReport = $reports->first();
        $totalReports = $reports->count();
        $openReports = $reports->whereIn('status', ['dilaporkan', 'direview', 'diproses'])->count();
    @endphp

    <div class="flex flex-col gap-8">
        <section
            class="rounded-[40px] border border-white/60 bg-primary px-6 py-8 shadow-[0_32px_80px_-48px_rgba(128,1,1,0.55)] backdrop-blur-sm sm:px-10 sm:py-12">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                <div>
                    <p class="text-sm font-medium text-neutral-400">
                        Halo, {{ Str::title(optional(auth()->user())->name ?? 'Siswa') }}
                    </p>
                    <h2 class="mt-2 text-3xl font-semibold text-[var(--color-secondary)] sm:text-4xl">
                        Pantau dan kelola laporanmu dengan nyaman.
                    </h2>
                    <p class="mt-3 max-w-2xl text-sm text-neutral-500 sm:text-base">
                        Setiap laporan yang kamu kirim tercatat rapi dan mudah dipantau. Periksa status tindak lanjut,
                        catatan dari konselor, serta histori pelaporan kapan pun kamu butuhkan.
                    </p>
                </div>

                @if ($latestReport)
                    <div
                        class="flex items-center gap-3 rounded-2xl border border-neutral-200/70 bg-white/70 px-4 py-3 text-xs font-medium text-neutral-500 shadow-sm backdrop-blur">
                        <span
                            class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-[var(--color-secondary)]/10 text-[var(--color-secondary)]">
                            <i class="fa-regular fa-clock"></i>
                        </span>
                        <div>
                            <p class="text-neutral-400">Terakhir diperbarui</p>
                            <p class="font-semibold text-neutral-700">
                                {{ \Illuminate\Support\Carbon::parse($latestReport->updated_at ?? $latestReport->created_at)->translatedFormat('d M Y, H:i') }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            @if (session('success'))
                <div
                    class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50/95 px-5 py-4 text-sm text-emerald-700 shadow-sm shadow-emerald-100">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mt-8 grid gap-6 lg:grid-cols-[minmax(0,1.7fr)_minmax(0,0.95fr)]">
                <div class="flex flex-col gap-6">
                    <div
                        class="flex flex-col justify-between gap-4 rounded-[28px] border border-neutral-100 bg-[var(--color-primary)] px-5 py-5 shadow-sm sm:flex-row sm:items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-[var(--color-secondary)]">
                                Ringkasan Laporan
                            </h3>
                            <p class="text-xs text-neutral-500">
                                Kamu memiliki {{ number_format($totalReports) }} laporan yang tercatat dalam sistem.
                                Pastikan untuk memantau setiap perkembangan dari konselor.
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs uppercase tracking-[3px] text-neutral-400">Total Laporan</p>
                            <p class="mt-1 text-4xl font-semibold text-[var(--color-secondary)]">
                                {{ number_format($totalReports) }}
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div
                            class="rounded-[28px] border border-neutral-100 bg-primary px-5 py-5 shadow-sm transition hover:shadow-md">
                            <p class="text-xs uppercase tracking-[3px] text-neutral-400">Menunggu Tindak Lanjut</p>
                            <p class="mt-3 text-3xl font-semibold text-[var(--color-secondary)]">
                                {{ number_format($openReports) }}
                            </p>
                            <p class="mt-2 text-xs text-neutral-500">
                                Laporan dengan status Dilaporkan, Direview, atau Diproses.
                            </p>
                        </div>
                        <div
                            class="rounded-[28px] border border-neutral-100 bg-white px-5 py-5 shadow-sm transition hover:shadow-md">
                            <p class="text-xs uppercase tracking-[3px] text-neutral-400">Selesai</p>
                            <p class="mt-3 text-3xl font-semibold text-[var(--color-secondary)]">
                                {{ number_format($summaryCounts['selesai'] ?? 0) }}
                            </p>
                            <p class="mt-2 text-xs text-neutral-500">
                                Laporan yang sudah selesai ditangani oleh konselor.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-neutral-100 bg-white px-5 py-5 shadow-sm backdrop-blur">
                    <p class="text-xs uppercase tracking-[3px] text-neutral-400">Status Laporan</p>
                    <div class="mt-4 grid gap-3">
                        @foreach ($summaryCounts as $status => $count)
                            <div
                                class="flex items-center justify-between rounded-2xl border border-neutral-100 bg-white/80 px-4 py-3 shadow-sm">
                                <div class="flex items-center gap-3">
                                    <span
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-[var(--color-secondary)]/10 text-[var(--color-secondary)]">
                                        <i class="fa-solid fa-layer-group text-xs"></i>
                                    </span>
                                    <div>
                                        <p class="text-sm font-semibold text-neutral-700">
                                            {{ $statusLabels[$status] ?? ucfirst($status) }}
                                        </p>
                                        <p class="text-xs text-neutral-400">Status laporan siswa</p>
                                    </div>
                                </div>
                                <span class="text-lg font-semibold text-[var(--color-secondary)]">
                                    {{ number_format($count) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section
            class="rounded-[40px] border border-white/60 bg-white/90 px-6 py-8 shadow-[0_32px_80px_-48px_rgba(15,23,42,0.45)] backdrop-blur-sm sm:px-10 sm:py-10">
            <div
                class="flex flex-col gap-4 border-b border-neutral-200/70 pb-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-[var(--color-secondary)]">
                        Riwayat Laporan
                    </h3>
                    <p class="text-sm text-neutral-500">
                        Pantau tindak lanjut, catatan konselor, dan detail setiap laporan yang pernah kamu kirim.
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-2 text-xs text-neutral-400">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-neutral-200/70 bg-white px-3 py-1.5 text-neutral-500 shadow-sm">
                        <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                        Dilaporkan
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-neutral-200/70 bg-white px-3 py-1.5 text-neutral-500 shadow-sm">
                        <span class="h-2.5 w-2.5 rounded-full bg-blue-400"></span>
                        Direview
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-neutral-200/70 bg-white px-3 py-1.5 text-neutral-500 shadow-sm">
                        <span class="h-2.5 w-2.5 rounded-full bg-indigo-400"></span>
                        Diproses
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-neutral-200/70 bg-white px-3 py-1.5 text-neutral-500 shadow-sm">
                        <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                        Selesai
                    </span>
                </div>
            </div>

            @if ($reports->isEmpty())
                <div
                    class="mt-10 flex flex-col items-center justify-center gap-4 rounded-[32px] border border-dashed border-neutral-200/80 bg-white/80 px-10 py-16 text-center shadow-inner shadow-white/60">
                    <span
                        class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-[var(--color-secondary)]/10 text-3xl text-[var(--color-secondary)]">
                        <i class="fa-regular fa-message"></i>
                    </span>
                    <div>
                        <h4 class="text-lg font-semibold text-neutral-700">Belum ada laporan</h4>
                        <p class="mt-2 text-sm text-neutral-500">
                            Kamu bisa membuat laporan pertama dengan menekan tombol
                            <span class="font-semibold text-[var(--color-secondary)]">"Buat Laporan"</span> di pojok atas.
                        </p>
                    </div>
                </div>
            @else
                <div class="mt-8 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($reports as $report)
                        @php
                            $status = $report->status ?? 'dilaporkan';
                            $statusLabel = $statusLabels[$status] ?? ucfirst($status);
                            $statusClass =
                                $statusStyles[$status] ?? 'bg-neutral-50 text-neutral-600 border border-neutral-200';
                        @endphp
                        <article
                            class="group flex flex-col justify-between rounded-[28px] border border-neutral-200/70 bg-white px-5 py-6 shadow-lg shadow-[rgba(15,23,42,0.08)] transition hover:-translate-y-1 hover:shadow-[0_30px_70px_-32px_rgba(128,1,1,0.45)]">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <p class="text-xs uppercase tracking-[3px] text-neutral-400">Terlapor</p>
                                        <h4 class="text-lg font-semibold text-neutral-700">
                                            {{ $report->reported_name }}
                                        </h4>
                                        <p class="text-xs text-neutral-400">
                                            {{ $report->reported_class }}
                                        </p>
                                    </div>
                                    <span
                                        class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                                        {{ $statusLabel }}
                                    </span>
                                </div>

                                <div class="grid gap-3 text-sm text-neutral-500">
                                    <div
                                        class="flex items-center gap-3 rounded-2xl border border-neutral-200/70 bg-neutral-50/70 px-4 py-3 text-neutral-600">
                                        <span
                                            class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-[var(--color-secondary)]/10 text-[var(--color-secondary)]">
                                            <i class="fa-regular fa-clock"></i>
                                        </span>
                                        <div>
                                            <p class="text-xs uppercase tracking-[2px] text-neutral-400">Waktu Kejadian</p>
                                            <p class="font-medium text-neutral-600">
                                                {{ \Illuminate\Support\Carbon::parse($report->incident_time)->translatedFormat('d M Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="rounded-2xl border border-neutral-200/70 bg-white px-4 py-4">
                                        <p class="text-xs uppercase tracking-[2px] text-neutral-400">Kronologi Singkat</p>
                                        <p class="mt-2 text-sm text-neutral-600">
                                            {{ Str::limit($report->description, 160) }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 flex items-center justify-between border-t border-neutral-100 pt-5 text-sm">
                                <button type="button"
                                    class="inline-flex items-center gap-2 rounded-xl bg-[var(--color-secondary)] px-4 py-2 text-white shadow-md shadow-[rgba(128,1,1,0.25)] transition hover:bg-[#6c0000]"
                                    data-modal-open="report-{{ $report->id }}">
                                    <i class="fa-regular fa-eye text-xs"></i>
                                    Lihat Detail
                                </button>
                                <p class="text-xs text-neutral-400">
                                    Dibuat {{ \Illuminate\Support\Carbon::parse($report->created_at)->diffForHumans() }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
@endsection

@push('modals')
    @foreach ($reports as $report)
        @php
            $status = $report->status ?? 'dilaporkan';
            $statusLabel = $statusLabels[$status] ?? ucfirst($status);
            $statusClass = $statusStyles[$status] ?? 'bg-neutral-50 text-neutral-600 border border-neutral-200';
            $photoUrl = $report->photo_path
                ? \Illuminate\Support\Facades\Storage::disk('public')->url($report->photo_path)
                : null;
        @endphp
        <div id="report-{{ $report->id }}"
            class="modal fixed inset-0 z-50 hidden items-center justify-center bg-black/30 px-4 py-6 backdrop-blur-sm">
            <div
                class="relative w-full max-w-2xl overflow-hidden rounded-3xl border border-white/80 bg-white shadow-[0_40px_80px_-32px_rgba(15,23,42,0.45)]">
                <div class="flex items-center justify-between border-b border-neutral-200/60 px-6 py-5">
                    <div>
                        <p class="text-xs uppercase tracking-[3px] text-neutral-400">Detail Laporan</p>
                        <h4 class="mt-1 text-lg font-semibold text-neutral-700">{{ $report->reported_name }}</h4>
                    </div>
                    <button type="button"
                        class="rounded-xl bg-neutral-100 p-2 text-neutral-500 transition hover:bg-neutral-200/80"
                        data-modal-close>
                        <span class="sr-only">Tutup</span>
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="grid gap-6 px-6 py-6">
                    <div class="flex flex-wrap items-center gap-3">
                        <span
                            class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">
                            {{ $statusLabel }}
                        </span>
                        <div class="text-xs text-neutral-400">
                            Dibuat
                            {{ \Illuminate\Support\Carbon::parse($report->created_at)->translatedFormat('d M Y, H:i') }}
                            ·
                            Diperbarui
                            {{ \Illuminate\Support\Carbon::parse($report->updated_at)->translatedFormat('d M Y, H:i') }}
                        </div>
                    </div>

                    <div class="grid gap-4">
                        <div class="rounded-2xl border border-neutral-200/60 bg-neutral-50/70 px-5 py-4">
                            <p class="text-xs uppercase tracking-[2px] text-neutral-400">Kelas Terlapor</p>
                            <p class="mt-1 text-sm font-medium text-neutral-600">{{ $report->reported_class }}</p>
                        </div>
                        <div class="rounded-2xl border border-neutral-200/60 bg-neutral-50/70 px-5 py-4">
                            <p class="text-xs uppercase tracking-[2px] text-neutral-400">Waktu Kejadian</p>
                            <p class="mt-1 text-sm font-medium text-neutral-600">
                                {{ \Illuminate\Support\Carbon::parse($report->incident_time)->translatedFormat('d M Y, H:i') }}
                            </p>
                        </div>
                        <div class="rounded-2xl border border-neutral-200/60 bg-white px-5 py-4">
                            <p class="text-xs uppercase tracking-[2px] text-neutral-400">Kronologi</p>
                            <p class="mt-2 text-sm leading-relaxed text-neutral-600">{{ $report->description }}</p>
                        </div>
                        <div class="rounded-2xl border border-neutral-200/60 bg-white px-5 py-4">
                            <p class="text-xs uppercase tracking-[2px] text-neutral-400">Catatan Konselor</p>
                            <p class="mt-2 text-sm text-neutral-600">
                                {{ $report->counselor_note ?? 'Belum ada catatan tambahan dari konselor.' }}</p>
                        </div>
                        @if ($photoUrl)
                            <div class="rounded-2xl border border-neutral-200/60 bg-white px-5 py-4">
                                <p class="text-xs uppercase tracking-[2px] text-neutral-400">Bukti Foto</p>
                                <a href="{{ $photoUrl }}" target="_blank"
                                    class="mt-3 block overflow-hidden rounded-2xl border border-neutral-200/70">
                                    <img src="{{ $photoUrl }}" alt="Bukti foto laporan" class="w-full object-cover">
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modalTriggers = document.querySelectorAll('[data-modal-open]');
            const closeButtons = document.querySelectorAll('[data-modal-close]');

            modalTriggers.forEach(trigger => {
                trigger.addEventListener('click', () => {
                    const target = trigger.getAttribute('data-modal-open');
                    const modal = document.getElementById(target);
                    if (!modal) return;

                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                    document.body.classList.add('overflow-hidden');
                });
            });

            closeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const modal = button.closest('.modal');
                    if (!modal) return;

                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    document.body.classList.remove('overflow-hidden');
                });
            });

            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', (event) => {
                    if (event.target === modal) {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                        document.body.classList.remove('overflow-hidden');
                    }
                });
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    document.querySelectorAll('.modal.flex').forEach(modal => {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                        document.body.classList.remove('overflow-hidden');
                    });
                }
            });
        });
    </script>
@endpush
