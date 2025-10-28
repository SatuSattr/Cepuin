@extends('student.layout')



@section('content')
    <section class="px-6 sm:px-10 lg:px-16">
        <div class="mx-auto flex max-w-5xl flex-col gap-6">
            <div
                class="rounded-3xl border border-white/70 bg-primary px-8 py-8 shadow-[0_32px_60px_-24px_rgba(128,1,1,0.35)] backdrop-blur-xl">
                <div class="flex flex-col gap-3">
                    <p class="text-xs uppercase tracking-[4px] text-neutral-400">Buat Laporan</p>
                    <h2 class="text-3xl font-semibold text-[var(--color-secondary)] sm:text-4xl">
                        Ceritakan kejadian yang ingin kamu laporkan.
                    </h2>
                    <p class="text-sm text-neutral-500 sm:text-base">
                        Identitasmu dijaga kerahasiaannya oleh konselor. Isi formulir berikut dengan detail agar proses
                        penanganan lebih cepat.
                    </p>
                </div>
            </div>

            @if ($errors->any())
                <div class="rounded-2xl border border-red-200 bg-red-50 px-6 py-4 text-red-700 shadow-sm shadow-red-100">
                    <div class="flex items-start gap-3">
                        <span
                            class="mt-1 inline-flex h-8 w-8 items-center justify-center rounded-xl bg-red-100 text-red-600">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </span>
                        <div>
                            <p class="font-semibold">Periksa kembali isianmu</p>
                            <ul class="mt-2 list-disc pl-5 text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <div
                class="rounded-3xl border border-white/70 bg-primary px-8 py-10 shadow-[0_28px_60px_-30px_rgba(15,23,42,0.35)] backdrop-blur-xl">
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" class="grid gap-8">
                    @csrf

                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="flex flex-col gap-3">
                            <label for="reported_name"
                                class="text-xs font-semibold uppercase tracking-[3px] text-neutral-500">
                                Nama Terlapor
                            </label>
                            <input type="text" name="reported_name" id="reported_name" value="{{ old('reported_name') }}"
                                placeholder="Masukkan nama siswa yang dilaporkan"
                                class="rounded-2xl border border-neutral-200/70 bg-neutral-50/70 px-4 py-3 text-sm text-neutral-700 placeholder:text-neutral-400 focus:border-[var(--color-secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/20"
                                required>
                        </div>

                        <div class="flex flex-col gap-3">
                            <label for="reported_class"
                                class="text-xs font-semibold uppercase tracking-[3px] text-neutral-500">
                                Kelas Terlapor
                            </label>
                            <input type="text" name="reported_class" id="reported_class"
                                value="{{ old('reported_class') }}" placeholder="Contoh: XI IPA 2"
                                class="rounded-2xl border border-neutral-200/70 bg-neutral-50/70 px-4 py-3 text-sm text-neutral-700 placeholder:text-neutral-400 focus:border-[var(--color-secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/20"
                                required>
                        </div>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="flex flex-col gap-3">
                            <label for="incident_time"
                                class="text-xs font-semibold uppercase tracking-[3px] text-neutral-500">
                                Waktu Kejadian
                            </label>
                            <input type="datetime-local" name="incident_time" id="incident_time"
                                value="{{ old('incident_time') }}"
                                class="rounded-2xl border border-neutral-200/70 bg-neutral-50/70 px-4 py-3 text-sm text-neutral-700 placeholder:text-neutral-400 focus:border-[var(--color-secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/20"
                                required>
                            <p class="text-xs text-neutral-400">
                                Pilih tanggal dan jam saat kejadian berlangsung.
                            </p>
                        </div>

                        <div class="flex flex-col gap-3">
                            <label for="photo_path" class="text-xs font-semibold uppercase tracking-[3px] text-neutral-500">
                                Bukti Foto (Opsional)
                            </label>
                            <label
                                class="flex cursor-pointer flex-col items-center justify-center gap-3 rounded-2xl border border-dashed border-neutral-300 bg-neutral-50/70 px-4 py-6 text-center text-sm text-neutral-500 transition hover:border-[var(--color-secondary)]/40 hover:bg-white">
                                <input type="file" name="photo_path" id="photoInput" accept="image/*" class="hidden">
                                <span
                                    class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-[var(--color-secondary)]/10 text-xl text-[var(--color-secondary)]">
                                    <i class="fa-solid fa-cloud-arrow-up"></i>
                                </span>
                                <div>
                                    <p class="font-medium text-neutral-600">Tarik file ke sini atau pilih dari perangkat</p>
                                    <p class="mt-1 text-xs text-neutral-400">Format JPG, PNG, atau WEBP (maks. 2MB)</p>
                                </div>
                            </label>
                            <div id="previewContainer"
                                class="hidden rounded-2xl border border-neutral-200/70 bg-white px-4 py-4 shadow-inner shadow-neutral-100">
                                <p class="text-xs uppercase tracking-[2px] text-neutral-400">Preview Bukti</p>
                                <img id="previewImage" alt="Preview bukti"
                                    class="mt-3 h-48 w-full rounded-2xl object-cover">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <label for="description" class="text-xs font-semibold uppercase tracking-[3px] text-neutral-500">
                            Kronologi Kejadian
                        </label>
                        <textarea name="description" id="description" rows="6"
                            placeholder="Jelaskan secara rinci kronologi kejadian, pihak yang terlibat, dan lokasi kejadian."
                            class="rounded-2xl border border-neutral-200/70 bg-neutral-50/70 px-4 py-3 text-sm text-neutral-700 placeholder:text-neutral-400 focus:border-[var(--color-secondary)] focus:outline-none focus:ring-2 focus:ring-[var(--color-secondary)]/20"
                            required>{{ old('description') }}</textarea>
                        <p class="text-xs text-neutral-400">
                            Kronologi yang jelas akan membantu konselor memahami situasi dan memberikan tindak lanjut yang
                            tepat.
                        </p>
                    </div>

                    <div class="flex flex-wrap justify-end gap-3">
                        <a href="{{ route('student.dashboard') }}"
                            class="inline-flex items-center gap-2 rounded-2xl border border-neutral-300 bg-white px-5 py-3 text-sm font-medium text-neutral-500 transition hover:border-neutral-400 hover:text-neutral-700">
                            <i class="fa-solid fa-arrow-left-long text-xs"></i>
                            Batal
                        </a>

                        <button type="submit"
                            class="inline-flex items-center gap-2 rounded-2xl bg-[var(--color-secondary)] px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-[rgba(128,1,1,0.25)] transition hover:bg-[#6c0000]">
                            <i class="fa-solid fa-paper-plane text-xs"></i>
                            Kirim Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fileInput = document.getElementById('photoInput');
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('previewImage');

            fileInput?.addEventListener('change', (event) => {
                const file = event.target.files?.[0];
                if (!file) {
                    previewContainer?.classList.add('hidden');
                    previewImage?.removeAttribute('src');
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    if (!previewImage || !previewContainer) return;
                    previewImage.src = e.target?.result;
                    previewContainer.classList.remove('hidden');
                };

                reader.readAsDataURL(file);
            });
        });
    </script>
@endpush
