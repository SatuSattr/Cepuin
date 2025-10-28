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

            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <input type="hidden" name="user_id" value="{{ Auth::user()->name }}">
                <input type="hidden" name="status" value="dilaporkan">
                <input type="hidden" name="status" value="dilaporkan">
                <input type="hidden" name="counselor_note" value="Belum ada">

                <!-- NAMA TERLAPOR -->
                <div>
                    <label for="reported_name" class="block text-sm font-semibold mb-1 text-secondary">
                        Nama Terlapor
                    </label>
                    <input 
                        type="text"  
                        name="reported_name" 
                        id="reported_name"
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
                    ></textarea>
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
                    <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, atau WEBP (maks. 2MB)</p>

                    <!-- Preview -->
                    <div class="mt-4 hidden" id="previewContainer">
                        <p class="text-xs text-gray-500 mb-2">Preview bukti foto:</p>
                        <img id="previewImage" 
                             class="w-36 h-48 object-cover rounded-lg border border-gray-300 shadow-md" 
                             alt="Preview Gambar">
                    </div>
                </div>

                <!-- TOMBOL -->
                <div class="flex justify-end gap-3 pt-4">
                    <a 
                        href="/student"
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
                        Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Live Preview Gambar -->
    <script>
        const inputGambar = document.getElementById('photoInput');
        const previewImage = document.getElementById('previewImage');
        const previewContainer = document.getElementById('previewContainer');

        inputGambar.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    previewImage.src = event.target.result;
                    previewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
