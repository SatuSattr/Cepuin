<x-app-layout>
    <div class="p-8 space-y-8 bg-[#f2f2f2] min-h-screen text-[#1a1a1a]">

        <!-- HEADER -->
        <div class="bg-white border border-gray-200 shadow rounded-2xl p-6">
            <h1 class="text-2xl font-bold mb-1 flex items-center gap-2 text-[#800101]">
                📋 Detail Laporan Pelanggaran
            </h1>
            <p class="text-sm text-gray-600">
                Berikut detail lengkap laporan yang kamu kirimkan.
            </p>
        </div>

        <!-- DETAIL CARD -->
        <div class="bg-white border border-gray-200 shadow rounded-2xl p-6 md:flex md:gap-8">

            <!-- FOTO LAPORAN -->
            <div class="md:w-1/3 w-full mb-6 md:mb-0">
                <div class="w-full aspect-square bg-[#f2f2f2] border border-gray-300 rounded-xl overflow-hidden flex items-center justify-center">
                    @if ($reports->photo_path)
                        <img src="{{ asset('storage/' . $reports->photo_path) }}" 
                             alt="Foto laporan {{ $reports->reported_name }}" 
                             class="object-cover w-full h-full">
                    @else
                        <span class="text-gray-500 text-sm">Tidak ada foto laporan</span>
                    @endif
                </div>
            </div>

            <!-- INFORMASI DETAIL -->
            <div class="flex-1 space-y-6">

                <!-- INFORMASI UTAMA -->
                <div class="border-b border-gray-200 pb-4">
                    <h2 class="text-xl font-bold">
                        {{ $reports->reported_name ?? 'Nama tidak tersedia' }}
                    </h2>
                    <p class="text-gray-600 text-sm mt-1">
                        Kelas: <span class="font-semibold text-[#800101]">{{ $reports->reported_class ?? '-' }}</span>
                    </p>
                    <div class="mt-3">
                        @php
                            $statusColor = match($reports->status) {
                                'dilaporkan' => '#800101', // merah
                                'direview'   => '#eab308', // kuning
                                'diproses'   => '#2563eb', // biru
                                'selesai'    => '#0a5c0a', // hijau
                                default      => '#800101', // (default)
                            };
                        @endphp

                        <span class="px-3 py-1 text-xs font-semibold rounded-full text-white"
                            style="background-color: {{ $statusColor }}">
                            {{ ucfirst($reports->status ?? 'Belum diproses') }}
                        </span>
                    </div>
                </div>

                <!-- INFORMASI DETAIL LAIN -->
                <div class="space-y-3 text-sm">

                    <div class="flex justify-between border-b border-gray-200 pb-2">
                        <span class="text-gray-600">Nama Pelapor</span>
                        <span class="font-medium text-right max-w-xs break-words">{{ Auth::user()->name ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between border-b border-gray-200 pb-2">
                        <span class="text-gray-600">Waktu Kejadian</span>
                        <span class="font-medium">{{ $reports->incident_time ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between border-b border-gray-200 pb-2">
                        <span class="text-gray-600">Deskripsi Kejadian</span>
                        <span class="font-medium text-right max-w-xs break-words">{{ $reports->description ?? 'Tidak ada deskripsi' }}</span>
                    </div>

                    <div class="flex justify-between border-b border-gray-200 pb-2">
                        <span class="text-gray-600">Catatan Konselor</span>
                        <span class="font-medium text-right max-w-xs break-words">
                            {{ $reports->counselor_note ?? 'Belum ada catatan' }}
                        </span>
                    </div>

                    <div class="flex justify-between pb-2">
                        <span class="text-gray-600">Tanggal Pelaporan</span>
                        <span class="font-medium">{{ $reports->created_at ? $reports->created_at->format('d M Y, H:i') : '-' }}</span>
                    </div>
                </div>

                <!-- AKSI -->
                <div class="pt-6 flex justify-end items-center gap-3">
                    @if ($reports->status === 'dilaporkan')
                        <a href="{{ route('student.edit', $reports->id) }}"
                        class="inline-flex items-center gap-2 px-5 py-2 text-sm font-semibold 
                                text-white bg-[#800101] rounded-lg shadow-md 
                                hover:bg-[#660000] active:bg-[#4d0000] transition-all duration-200">
                            Edit
                        </a>
                    @endif

                    <a href="{{ route('student.dashboard') }}"
                    class="inline-flex items-center gap-2 px-5 py-2 text-sm font-semibold 
                            text-[#800101] border border-[#800101] rounded-lg 
                            hover:bg-[#800101] hover:text-white active:bg-[#660000] transition-all duration-200">
                        ← Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>