<x-app-layout>
    <div class="min-h-screen bg-primary text-gray-900 py-10 px-6">
        <!-- CARD FORM -->
        <div class="max-w-3xl mx-auto bg-white border border-secondary/30 shadow-xl rounded-2xl p-8">
            <!-- HEADER -->
            <h1 class="text-3xl font-bold mb-2 text-secondary">Formulir Laporan Siswa</h1>
            <p class="text-gray-600 mb-8 text-sm">
                Silakan isi formulir di bawah ini untuk melaporkan kejadian seperti pembulian, pemalakan, atau pelanggaran lainnya.
                Identitas pelapor dijaga kerahasiaannya.
            </p>

            <form action="{{ route('student.update', $reports->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                <input type="hidden" name="status" value="{{ old('status', $reports['status']) }}">
                <input type="hidden" name="counselor_note" value="{{ old('counselor_note', $reports['counselor_note']) }}">

                <!-- NAMA TERLAPOR -->
                <div>
                    <label for="reported_name" class="block text-sm font-semibold mb-1 text-secondary">
                        Nama Terlapor
                    </label>
                    <input 
                        type="text"  
                        name="reported_name" 
                        id="reported_name"
                        value="{{ old('reported_name', $reports['reported_name']) }}"
                        class="w-full rounded-lg border border-gray-300 bg-primary text-gray-800 px-4 py-2.5 
                               focus:outline-none focus:ring-2 focus:ring-secondary transition"
                        placeholder="Masukkan nama siswa yang dilaporkan"
                        required
                    />
                </div>

                <!-- KELAS TERLAPOR -->
                <div>
                    <label for="reported_class" class="block text-sm font-semibold mb-1 text-secondary">
                        Kelas Terlapor
                    </label>
                    <input 
                        type="text"  
                        name="reported_class" 
                        id="reported_class"
                        value="{{ old('reported_class', $reports['reported_class']) }}"
                        class="w-full rounded-lg border border-gray-300 bg-primary text-gray-800 px-4 py-2.5 
                               focus:outline-none focus:ring-2 focus:ring-secondary transition"
                        placeholder="Contoh: X IPA 2"
                        required
                    />
                </div>

                <!-- WAKTU KEJADIAN -->
                <div>
                    <label for="incident_time" class="block text-sm font-semibold mb-1 text-secondary">
                        Waktu Kejadian
                    </label>
                    <input 
                        type="datetime-local" 
                        name="incident_time" 
                        id="incident_time"
                        value="{{ old('incident_time', $reports['incident_time']) }}"
                        class="w-full rounded-lg border border-gray-300 bg-primary text-gray-800 px-4 py-2.5 
                               focus:outline-none focus:ring-2 focus:ring-secondary transition"
                        required
                    />
                </div>

                <!-- DESKRIPSI KEJADIAN -->
                <div>
                    <label for="description" class="block text-sm font-semibold mb-1 text-secondary">
                        Deskripsi Kejadian
                    </label>

                    <textarea 
                        name="description" 
                        id="description"
                        rows="4"
                        class="w-full rounded-lg border border-gray-300 bg-primary text-gray-800 px-4 py-2.5 
                            focus:outline-none focus:ring-2 focus:ring-secondary transition"
                        placeholder="Ceritakan secara singkat kejadian yang terjadi..."
                        required
                    >{{ old('description', $reports->description) }}</textarea>
                </div>

                <!-- FOTO KEJADIAN -->
                <div>
                    <label for="photo_path" class="block text-sm font-semibold mb-2 text-secondary">
                        Bukti Foto
                    </label>

                    <input 
                        type="file" 
                        name="photo_path" 
                        id="photoInput"
                        accept="image/*"
                        class="w-full rounded-lg border border-gray-300 bg-primary text-gray-700 px-4 py-2.5 
                            file:bg-secondary file:border-0 file:rounded-lg file:text-sm file:text-white 
                            file:px-4 file:py-2 file:mr-3 hover:file:bg-secondary/90 transition"
                    />
                    <p class="text-xs text-gray-500 mt-1">
                        Format: JPG, PNG, atau WEBP (maks. 2MB)
                    </p>

                    <!-- Preview Container -->
                    <div class="mt-4" id="previewContainer">
                        <p class="text-xs text-gray-500 mb-2">Preview bukti foto:</p>

                        <!-- Foto lama dari database -->
                        @if ($reports->photo_path)
                            <img 
                                id="previewImage" 
                                src="{{ asset('storage/' . $reports->photo_path) }}" 
                                class="w-36 h-48 object-cover rounded-lg border border-gray-300 shadow-md" 
                                alt="Foto lama">
                        @else
                            <img 
                                id="previewImage" 
                                class="w-36 h-48 object-cover rounded-lg border border-gray-300 shadow-md hidden" 
                                alt="Preview Gambar">
                            <p class="text-xs text-gray-400">Belum ada foto yang diunggah.</p>
                        @endif
                    </div>
                </div>

                <!-- TOMBOL -->
                <div class="flex justify-end gap-3 pt-4">
                    <a 
                        href="{{ route('student.show', $reports->id) }}"
                        class="px-6 py-2.5 bg-gray-300 hover:bg-gray-400 rounded-lg text-gray-800 text-sm 
                               font-medium transition-all"
                    >
                        Batal
                    </a>

                    <button 
                        type="submit" 
                        class="px-6 py-2.5 bg-secondary hover:bg-secondary/90 rounded-lg text-white text-sm 
                               font-semibold shadow-md transition-all"
                    >
                        Edit Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>

<!-- SCRIPT PREVIEW FOTO -->
<script>
    const inputFoto = document.getElementById('photoInput');
    const previewImage = document.getElementById('previewImage');
    const previewContainer = document.getElementById('previewContainer');

    inputFoto.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                previewImage.src = event.target.result;
                previewImage.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>
</x-app-layout>
