<x-app-layout>
    <div class="min-h-screen bg-primary text-gray-900 p-8">

        <!-- Header -->
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl border border-secondary/20 overflow-hidden">
            <div class="p-6 border-b border-secondary/20 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h1 class="text-2xl font-bold text-secondary">Daftar Produk</h1>

                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <input
                        type="text"
                        placeholder="Cari produk..."
                        class="w-full sm:w-64 rounded-lg border-gray-300 focus:border-secondary focus:ring-secondary text-sm"
                    />
                    <button class="bg-secondary text-white px-4 py-2 rounded-lg hover:bg-secondary/90">
                        + Tambah
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">Nama Produk</th>
                            <th class="py-3 px-4 text-left">Kategori</th>
                            <th class="py-3 px-4 text-left">Harga</th>
                            <th class="py-3 px-4 text-center">Stok</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr class="hover:bg-secondary/5 transition">
                            <td class="py-3 px-4">Buku Pemrograman</td>
                            <td class="py-3 px-4">Teknologi</td>
                            <td class="py-3 px-4">Rp75.000</td>
                            <td class="py-3 px-4 text-center">12</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <button class="text-secondary font-medium hover:underline">Edit</button>
                                <button class="text-gray-500 hover:text-secondary">Hapus</button>
                            </td>
                        </tr>

                        <tr class="hover:bg-secondary/5 transition">
                            <td class="py-3 px-4">Buku Fiksi</td>
                            <td class="py-3 px-4">Novel</td>
                            <td class="py-3 px-4">Rp55.000</td>
                            <td class="py-3 px-4 text-center">8</td>
                            <td class="py-3 px-4 text-center space-x-2">
                                <button class="text-secondary font-medium hover:underline">Edit</button>
                                <button class="text-gray-500 hover:text-secondary">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="p-4 border-t border-secondary/20 text-sm text-gray-500 text-center">
                Menampilkan 1–10 dari 20 produk
            </div>
        </div>
    </div>
</x-app-layout>
