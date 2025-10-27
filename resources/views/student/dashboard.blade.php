<x-app-layout>
    <div class="min-h-screen bg-primary text-gray-900 p-8">

        <!-- Header -->
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl border border-secondary/20 overflow-hidden">
            <div class="p-6 border-b border-secondary/20 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h1 class="text-2xl font-bold text-secondary">Daftar Laporan Siswa</h1>

                <div class="flex items-center gap-3 w-full sm:w-auto">

                    <button class="bg-secondary text-white px-4 py-2 rounded-lg hover:bg-secondary/90 transition">
                        + Tambah Laporan
                    </button>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-gray-700">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">Siswa</th>
                            <th class="py-3 px-4 text-left">Laporan</th>
                            <th class="py-3 px-4 text-left">Status</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">
                        <tr class="hover:bg-secondary/5 transition">
                            <td class="py-3 px-4 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Rizky+Saputra" alt="Foto" class="w-8 h-8 rounded-full">
                                <span>Rizky Saputra (XII RPL 2)</span>
                            </td>
                            <td class="py-3 px-4">Laporan keterlambatan masuk sekolah</td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Diproses
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <button class="text-secondary font-medium hover:underline">Detail</button>
                            </td>
                        </tr>

                        <tr class="hover:bg-secondary/5 transition">
                            <td class="py-3 px-4 flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Siti+Nurhaliza" alt="Foto" class="w-8 h-8 rounded-full">
                                <span>Siti Nurhaliza (XI TKJ 1)</span>
                            </td>
                            <td class="py-3 px-4">Laporan kehilangan barang di kelas</td>
                            <td class="py-3 px-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Selesai
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <button class="text-secondary font-medium hover:underline">Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <div class="p-4 border-t border-secondary/20 text-sm text-gray-600 text-center bg-gray-50">
                Menampilkan <span class="font-semibold text-secondary">2</span> laporan dari total <span class="font-semibold">12</span> data siswa
            </div>
        </div>
    </div>
</x-app-layout>
