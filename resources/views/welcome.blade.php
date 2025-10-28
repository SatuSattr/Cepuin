<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cepuin - Sistem Pengaduan Siswa Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f2f2f2 0%, #e8e8e8 100%);
            position: relative;
            overflow-x: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60%;
            background: linear-gradient(135deg, #800101 0%, #a50101 100%);
            clip-path: polygon(0 40%, 100% 0, 100% 100%, 0 100%);
            z-index: -1;
        }
        .btn-primary {
            background-color: #800101;
        }
        .btn-primary:hover {
            background-color: #6a0000;
        }
        .header-bg {
            background-color: rgba(128, 1, 1, 0.95);
        }
        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(128, 1, 1, 0.15);
            position: relative;
            overflow: hidden;
        }
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(128, 1, 1, 0.1);
            z-index: -1;
        }
        .floating-shape-white {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            z-index: -1;
        }
        .shape-1 {
            width: 120px;
            height: 120px;
            top: 15%;
            left: 8%;
            animation: float 8s ease-in-out infinite;
        }
        .shape-2 {
            width: 80px;
            height: 80px;
            bottom: 25%;
            right: 12%;
            animation: float 6s ease-in-out infinite;
        }
        .shape-3 {
            width: 150px;
            height: 150px;
            top: 60%;
            left: 5%;
            animation: float 10s ease-in-out infinite;
        }
        .shape-4 {
            width: 90px;
            height: 90px;
            top: 20%;
            right: 10%;
            animation: float 7s ease-in-out infinite;
        }
        .shape-5 {
            width: 110px;
            height: 110px;
            bottom: 15%;
            left: 15%;
            animation: float 9s ease-in-out infinite;
        }
        .shape-6 {
            width: 70px;
            height: 70px;
            top: 45%;
            right: 20%;
            animation: float 5s ease-in-out infinite;
        }
        .shape-7 {
            width: 100px;
            height: 100px;
            top: 30%;
            left: 20%;
            animation: float 8s ease-in-out infinite;
        }
        .shape-8 {
            width: 60px;
            height: 60px;
            bottom: 30%;
            right: 25%;
            animation: float 6s ease-in-out infinite;
        }
        .shape-9 {
            width: 130px;
            height: 130px;
            bottom: 10%;
            right: 8%;
            animation: float 11s ease-in-out infinite;
        }
        .shape-white-1 {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation: float 7s ease-in-out infinite;
        }
        .shape-white-2 {
            width: 120px;
            height: 120px;
            bottom: 20%;
            right: 15%;
            animation: float 9s ease-in-out infinite;
        }
        .shape-white-3 {
            width: 60px;
            height: 60px;
            top: 50%;
            left: 15%;
            animation: float 5s ease-in-out infinite;
        }
        .shape-white-4 {
            width: 100px;
            height: 100px;
            bottom: 40%;
            right: 5%;
            animation: float 8s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }
        .input-focus:focus {
            border-color: #800101;
            box-shadow: 0 0 0 3px rgba(128, 1, 1, 0.1);
        }
        .upload-area {
            border: 2px dashed #800101;
            background: rgba(128, 1, 1, 0.05);
            transition: all 0.3s ease;
        }
        .upload-area:hover {
            background: rgba(128, 1, 1, 0.1);
            border-color: #6a0000;
        }
        .accent-line {
            height: 4px;
            background: linear-gradient(90deg, #800101, #ff4d4d);
            border-radius: 2px;
            margin: 20px 0;
        }
        .pulse-dot {
            width: 8px;
            height: 8px;
            background: #800101;
            border-radius: 50%;
            margin-right: 10px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.5); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }
        .title-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .info-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .user-profile {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .corner-decoration {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid #800101;
        }
        .corner-tl {
            top: -1px;
            left: -1px;
            border-right: none;
            border-bottom: none;
            border-top-left-radius: 12px;
        }
        .corner-tr {
            top: -1px;
            right: -1px;
            border-left: none;
            border-bottom: none;
            border-top-right-radius: 12px;
        }
        .corner-bl {
            bottom: -1px;
            left: -1px;
            border-right: none;
            border-top: none;
            border-bottom-left-radius: 12px;
        }
        .corner-br {
            bottom: -1px;
            right: -1px;
            border-left: none;
            border-top: none;
            border-bottom-right-radius: 12px;
        }
        /* FAQ Section Styles */
        .faq-section {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .faq-item {
            background: white;
            border: 2px solid rgba(128, 1, 1, 0.1);
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            border-color: #800101;
            box-shadow: 0 10px 25px rgba(128, 1, 1, 0.1);
            transform: translateY(-2px);
        }

        .faq-question {
            color: #800101;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            color: #6a0000;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.3s ease;
            opacity: 0;
        }

        .faq-answer.open {
            max-height: 500px;
            opacity: 1;
        }

        .faq-icon {
            transition: transform 0.3s ease;
            color: #800101;
        }

        .faq-icon.open {
            transform: rotate(180deg);
        }

        .faq-badge {
            background: linear-gradient(135deg, #800101, #a50101);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
        }

        .faq-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
        }

        /* Animasi untuk FAQ */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .faq-animate {
            animation: fadeInUp 0.6s ease forwards;
        }
        /* Footer Styles */
.footer-bg {
    background: linear-gradient(135deg, #800101 0%, #600000 100%);
}

.footer-divider {
    border-color: rgba(255, 255, 255, 0.2);
}

.footer-link {
    transition: all 0.3s ease;
    position: relative;
}

.footer-link:hover {
    color: #fbbf24;
    transform: translateX(5px);
}

.footer-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -2px;
    left: 0;
    background-color: #fbbf24;
    transition: width 0.3s ease;
}

.footer-link:hover::after {
    width: 100%;
}

.social-icon {
    transition: all 0.3s ease;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.social-icon:hover {
    background-color: #fbbf24;
    border-color: #fbbf24;
    transform: translateY(-3px);
}

.newsletter-input {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.3);
    transition: all 0.3s ease;
}

.newsletter-input:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: #fbbf24;
    box-shadow: 0 0 0 2px rgba(251, 191, 36, 0.2);
}

.newsletter-btn {
    background: linear-gradient(135deg, #fbbf24, #f59e0b);
    transition: all 0.3s ease;
}

.newsletter-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(245, 158, 11, 0.4);
}

.back-to-top {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s ease;
}

.back-to-top:hover {
    background: #fbbf24;
    transform: translateY(-3px);
}
    </style>
</head>
<body class="min-h-screen">
    <!-- Floating Background Shapes -->
    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
    <div class="floating-shape shape-4"></div>
    <div class="floating-shape shape-5"></div>
    <div class="floating-shape shape-6"></div>
    <div class="floating-shape shape-7"></div>
    <div class="floating-shape shape-8"></div>
    <div class="floating-shape shape-9"></div>
    
    <!-- White shapes on red background -->
    <div class="floating-shape-white shape-white-1"></div>
    <div class="floating-shape-white shape-white-2"></div>
    <div class="floating-shape-white shape-white-3"></div>
    <div class="floating-shape-white shape-white-4"></div>

    <!-- Header -->
    <header class="header-bg text-white py-4 px-6 shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold font-poppins">Cepuin<span class="text-yellow-300">.</span></h1>
                <span class="ml-2 text-sm bg-yellow-400 text-[#800101] px-2 py-1 rounded-full font-medium">Beta</span>
            </div>
            
            <!-- Dynamic User Section -->
            <div id="userSection">
                <!-- User Profile (akan diisi oleh Laravel saat login) -->
                @auth
                <div class="flex items-center space-x-3 user-profile px-4 py-2 rounded-lg">
                    <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center overflow-hidden border-2 border-yellow-300">
                        @if(Auth::user()->profile_photo_path)
                            <img src="{{ Auth::user()->profile_photo_path }}" alt="Profile" class="w-full h-full object-cover">
                        @else
                            <span class="text-[#800101] font-bold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <div class="text-sm">
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-yellow-200">
                            @if(Auth::user()->role === 'admin')
                                Admin
                            @elseif(Auth::user()->role === 'counselor')
                                Konselor BK
                            @else
                                Siswa
                            @endif
                        </p>
                    </div>
                </div>
                @else
                <!-- Login/Register Buttons (tampil saat belum login) -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-sm hover:text-yellow-200 transition font-medium">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-yellow-400 text-[#800101] px-4 py-2 rounded-md text-sm font-semibold hover:bg-yellow-300 transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                        Daftar
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12 px-4 relative z-10">
        <div class="container mx-auto max-w-2xl">
            <!-- Judul Halaman -->
            <div class="text-center mb-10">
                <h1 class="text-5xl font-bold text-[#800101] mb-6 title-shadow font-poppins">Laporkan Kejadian</h1>
                
                <!-- Info Card yang Lebih Menarik -->
                <div class="info-card rounded-2xl p-6 shadow-xl border border-white/20 mb-8">
                    <div class="flex items-center justify-center mb-3">
                        <div class="pulse-dot"></div>
                        <h3 class="text-xl font-bold text-[#800101]">Sampaikan Laporan Anda</h3>
                    </div>
                    <p class="text-gray-700 text-center mb-4">Laporkan kejadian dengan aman dan terjamin kerahasiaannya. Konselor BK siap membantu Anda.</p>
                    <div class="accent-line"></div>
                    <div class="flex justify-center space-x-6 mt-4 text-sm">
                        <div class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium">Aman & Rahasia</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <svg class="w-4 h-4 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium">Cepat & Efisien</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Laporan -->
            <div class="form-container rounded-2xl p-8 relative">
                
                <form id="reportForm">
                    <!-- Nama Siswa -->
                    <div class="mb-6">
                        <label for="studentName" class="text-gray-700 text-sm font-semibold mb-3 flex items-center">
                            <div class="w-2 h-2 bg-[#800101] rounded-full mr-2"></div>
                            Nama Siswa yang Dilaporkan
                        </label>
                        <input type="text" id="studentName" name="studentName" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl input-focus transition-all duration-300" placeholder="Masukkan nama siswa" required>
                    </div>
                    
                    <!-- Kelas -->
                    <div class="mb-6">
                        <label for="class" class="text-gray-700 text-sm font-semibold mb-3 flex items-center">
                            <div class="w-2 h-2 bg-[#800101] rounded-full mr-2"></div>
                            Kelas
                        </label>
                        <select id="class" name="class" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl input-focus transition-all duration-300" required>
                            <option value="" disabled selected>Pilih kelas</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>
                    
                    <!-- Waktu Kejadian -->
                    <div class="mb-6">
                        <label for="incidentTime" class="text-gray-700 text-sm font-semibold mb-3 flex items-center">
                            <div class="w-2 h-2 bg-[#800101] rounded-full mr-2"></div>
                            Waktu Kejadian
                        </label>
                        <input type="datetime-local" id="incidentTime" name="incidentTime" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl input-focus transition-all duration-300" required>
                    </div>
                    
                    <!-- Kronologi -->
                    <div class="mb-6">
                        <label for="chronology" class="text-gray-700 text-sm font-semibold mb-3 flex items-center">
                            <div class="w-2 h-2 bg-[#800101] rounded-full mr-2"></div>
                            Kronologi
                        </label>
                        <textarea id="chronology" name="chronology" rows="4" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl input-focus transition-all duration-300" placeholder="Jelaskan kronologi kejadian secara detail" required></textarea>
                    </div>
                    
                    <!-- Upload Bukti Foto -->
                    <div class="mb-8">
                        <label for="evidence" class="text-gray-700 text-sm font-semibold mb-3 flex items-center">
                            <div class="w-2 h-2 bg-[#800101] rounded-full mr-2"></div>
                            Upload Bukti Foto
                        </label>
                        <div class="flex items-center justify-center w-full">
                            <label for="evidence" class="upload-area flex flex-col items-center justify-center w-full h-32 rounded-xl cursor-pointer transition-all duration-300">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-[#800101]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-[#800101] font-medium"><span class="font-semibold">Klik untuk upload</span></p>
                                    <p class="text-xs text-gray-600">PNG, JPG, JPEG (Maks. 5MB)</p>
                                </div>
                                <input id="evidence" name="evidence" type="file" class="hidden" accept="image/*" />
                            </label>
                        </div>
                        <div id="fileName" class="text-sm text-[#800101] font-medium mt-3 text-center"></div>
                    </div>
                    
                    <!-- Tombol Kirim -->
                    <button type="submit" class="w-full bg-gradient-to-r from-[#800101] to-[#a50101] text-white py-4 px-4 rounded-xl font-semibold hover:from-[#6a0000] hover:to-[#8a0000] transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-yellow-400 focus:ring-opacity-50 text-lg shadow-lg transform hover:scale-[1.02] relative overflow-hidden group">
                        <span class="relative z-10">Kirim Laporan</span>
                        <div class="absolute inset-0 bg-yellow-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </button>
                </form>
                
                <!-- Keterangan Tambahan -->
                <div class="mt-8 p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl border border-gray-200">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-[#800101] mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <p class="text-sm text-gray-700 font-medium">Dengan mengirim laporan, Anda menyetujui bahwa informasi yang diberikan adalah benar dan sah.</p>
                            <p class="text-sm text-gray-600 mt-2">Laporan Anda akan ditangani secara rahasia oleh tim konselor (BK).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

        <!-- FAQ Section -->
    <section class="py-16 px-4 relative">
        <!-- Background Shapes untuk FAQ -->
        <div class="floating-shape shape-10" style="width: 100px; height: 100px; top: 10%; right: 10%; animation: float 8s ease-in-out infinite;"></div>
        <div class="floating-shape shape-11" style="width: 80px; height: 80px; bottom: 20%; left: 8%; animation: float 6s ease-in-out infinite;"></div>
        
        <div class="container mx-auto max-w-4xl">
            <!-- Header FAQ -->
            <div class="text-center mb-12">
                <h2 class="text-5xl font-bold text-white mb-4 title-shadow">FAQ</h2>
                <p class="text-white title-shadow text-lg max-w-2xl mx-auto">
                    Temukan jawaban untuk pertanyaan umum seputar sistem pengaduan Cepuin
                </p>
            </div>

            <!-- FAQ Container -->
            <div class="faq-section rounded-2xl p-8 shadow-xl">
                <div class="faq-grid">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item rounded-xl p-6 faq-animate" style="animation-delay: 0.1s;">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="faq-question text-lg font-semibold flex items-start">
                                <span class="w-2 h-2 bg-[#800101] rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Apa itu Cepuin dan bagaimana cara kerjanya?
                            </h3>
                            <svg class="faq-icon w-5 h-5 text-yellow-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 pl-5">
                                Cepuin adalah sistem pengaduan digital yang memungkinkan siswa melaporkan kejadian secara aman kepada konselor BK. 
                                Setelah laporan dikirim, tim BK akan meninjau dan menindaklanjuti laporan Anda dengan kerahasiaan terjamin.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item rounded-xl p-6 faq-animate" style="animation-delay: 0.2s;">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="faq-question text-lg font-semibold flex items-start">
                                <span class="w-2 h-2 bg-[#800101] rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Apakah laporan saya benar-benar rahasia?
                            </h3>
                            <svg class="faq-icon w-5 h-5 text-yellow-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 pl-5">
                                Ya, kerahasiaan laporan Anda dijamin. Hanya konselor BK yang berwenang yang dapat mengakses laporan. 
                                Identitas pelapor dilindungi dan tidak akan disebarluaskan tanpa persetujuan.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item rounded-xl p-6 faq-animate" style="animation-delay: 0.3s;">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="faq-question text-lg font-semibold flex items-start">
                                <span class="w-2 h-2 bg-[#800101] rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Berapa lama proses penanganan laporan?
                            </h3>
                            <svg class="faq-icon w-5 h-5 text-yellow-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 pl-5">
                                Tim BK akan menindaklanjuti laporan dalam 1-3 hari kerja. Untuk kasus darurat, penanganan akan dilakukan lebih cepat. 
                                Anda dapat memantau status laporan melalui akun Anda.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="faq-item rounded-xl p-6 faq-animate" style="animation-delay: 0.4s;">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="faq-question text-lg font-semibold flex items-start">
                                <span class="w-2 h-2 bg-[#800101] rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Jenis kejadian apa saja yang bisa dilaporkan?
                            </h3>
                            <svg class="faq-icon w-5 h-5 text-yellow-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 pl-5">
                                Anda dapat melaporkan berbagai kejadian seperti bullying, pelecehan, masalah akademik, konflik antar siswa, 
                                masalah psikologis, atau situasi lain yang membutuhkan bantuan konselor BK.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="faq-item rounded-xl p-6 faq-animate" style="animation-delay: 0.5s;">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="faq-question text-lg font-semibold flex items-start">
                                <span class="w-2 h-2 bg-[#800101] rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Apakah saya perlu login untuk melapor?
                            </h3>
                            <svg class="faq-icon w-5 h-5 text-yellow-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 pl-5">
                                Ya, untuk memastikan keamanan dan validitas laporan, Anda perlu login terlebih dahulu. 
                                Jika belum memiliki akun, Anda dapat mendaftar secara gratis dengan email siswa yang valid.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="faq-item rounded-xl p-6 faq-animate" style="animation-delay: 0.6s;">
                        <div class="flex items-start justify-between mb-4">
                            <h3 class="faq-question text-lg font-semibold flex items-start">
                                <span class="w-2 h-2 bg-[#800101] rounded-full mt-2 mr-3 flex-shrink-0"></span>
                                Bagaimana jika laporan saya sangat mendesak?
                            </h3>
                            <svg class="faq-icon w-5 h-5 text-yellow-400 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                        <div class="faq-answer">
                            <p class="text-gray-600 pl-5">
                                Untuk kasus darurat yang membutuhkan penanganan segera, silakan hubungi langsung konselor BK 
                                atau guru piket. Sistem online ini untuk laporan non-darurat yang dapat ditindaklanjuti dalam waktu 24 jam.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- CTA Section di bawah FAQ -->
                <div class="text-center mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-2xl font-bold text-[#800101] mb-4">Masih Ada Pertanyaan?</h3>
                    <p class="text-gray-600 mb-6">Tim support kami siap membantu Anda</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="#" class="bg-[#800101] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#6a0000] transition-all duration-300 transform hover:scale-105">
                            Hubungi Konselor BK
                        </a>
                        <a href="#" class="border-2 border-[#800101] text-[#800101] px-6 py-3 rounded-lg font-semibold hover:bg-[#800101] hover:text-white transition-all duration-300">
                            Lihat Panduan Lengkap
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Footer -->
    <footer class="footer-bg text-white pt-16 pb-8 px-4 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-10 left-10 w-20 h-20 border-2 border-white rounded-full"></div>
            <div class="absolute bottom-20 right-20 w-16 h-16 border-2 border-white rounded-full"></div>
            <div class="absolute top-1/2 left-1/4 w-12 h-12 border-2 border-white rounded-full"></div>
        </div>

        <div class="container mx-auto max-w-6xl relative z-10">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Brand Column -->
                <div class="lg:col-span-1">
                    <div class="flex items-center mb-6">
                        <h2 class="text-2xl font-bold">Cepuin<span class="text-yellow-300">.</span></h2>
                        <span class="ml-2 text-xs bg-yellow-400 text-[#800101] px-2 py-1 rounded-full">Beta</span>
                    </div>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        Sistem pengaduan siswa digital yang membantu melaporkan kejadian secara aman kepada konselor BK dengan kerahasiaan terjamin.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="social-icon w-10 h-10 rounded-full flex items-center justify-center hover:bg-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon w-10 h-10 rounded-full flex items-center justify-center hover:bg-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon w-10 h-10 rounded-full flex items-center justify-center hover:bg-yellow-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.017z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-yellow-300">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Beranda</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Tentang Kami</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Cara Melapor</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Kebijakan Privasi</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Syarat & Ketentuan</a></li>
                    </ul>
                </div>

                <!-- Layanan -->
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-yellow-300">Layanan</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Pengaduan Online</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Konseling BK</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Status Laporan</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">Bantuan Darurat</a></li>
                        <li><a href="#" class="footer-link text-gray-300 hover:text-yellow-300">FAQ</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-yellow-300">Berita Terbaru</h3>
                    <p class="text-gray-300 mb-4">Dapatkan update terbaru tentang sistem pengaduan kami</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Email Anda" class="newsletter-input w-full px-4 py-3 rounded-lg text-white placeholder-gray-400 focus:outline-none">
                        <button type="submit" class="newsletter-btn w-full px-4 py-3 rounded-lg font-semibold text-gray-900 hover:shadow-lg">
                            Berlangganan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Divider -->
            <div class="footer-divider border-t pt-8 mb-8"></div>

            <!-- Bottom Footer -->
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-300 text-sm mb-4 md:mb-0">
                    <p>&copy; 2024 Cepuin. Hak cipta dilindungi. Dibangun dengan ❤ untuk komunitas sekolah.</p>
                </div>
                <div class="flex items-center space-x-6 text-sm text-gray-300">
                    <a href="#" class="footer-link hover:text-yellow-300">Kebijakan Privasi</a>
                    <a href="#" class="footer-link hover:text-yellow-300">Syarat Layanan</a>
                    <a href="#" class="footer-link hover:text-yellow-300">Peta Situs</a>
                </div>
            </div>
        </div>

        <!-- Back to Top Button -->
        <button onclick="scrollToTop()" class="back-to-top fixed bottom-6 left-6 w-12 h-12 rounded-full flex items-center justify-center text-white hover:bg-yellow-400 transition-all duration-300 z-50">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>
    </footer>

    <!-- Admin Login Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="{{ route('login') }}" class="bg-gradient-to-r from-[#800101] to-[#a50101] text-white px-5 py-3 rounded-xl shadow-xl hover:from-[#6a0000] hover:to-[#8a0000] transition-all duration-300 flex items-center transform hover:scale-105">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Masuk sebagai Admin
        </a>
    </div>

    <script>
        // File upload display
        document.getElementById('evidence').addEventListener('change', function(e) {
            const fileName = document.getElementById('fileName');
            if (this.files.length > 0) {
                fileName.textContent = '✓ File terpilih: ' + this.files[0].name;
                fileName.classList.add('text-green-600');
            } else {
                fileName.textContent = '';
                fileName.classList.remove('text-green-600');
            }
        });

        // Form submission
        document.getElementById('reportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simple validation
            const studentName = document.getElementById('studentName').value;
            const className = document.getElementById('class').value;
            const incidentTime = document.getElementById('incidentTime').value;
            const chronology = document.getElementById('chronology').value;
            
            if (!studentName || !className || !incidentTime || !chronology) {
                alert('Harap lengkapi semua field yang wajib diisi!');
                return;
            }
            
            // In a real implementation, this would send the form data to the server
            // For now, we'll just show a success message
            alert('Laporan berhasil dikirim! Terima kasih telah menggunakan Cepuin.\n\nTim BK akan segera menindaklanjuti laporan Anda.');
            this.reset();
            document.getElementById('fileName').textContent = '';
            document.getElementById('fileName').classList.remove('text-green-600');
        });

        // Add current datetime as default for incident time
        document.addEventListener('DOMContentLoaded', function() {
            const now = new Date();
            // Format to YYYY-MM-DDTHH:MM
            const formatted = now.toISOString().slice(0, 16);
            document.getElementById('incidentTime').value = formatted;
        });
        // FAQ Interaction
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');
                const icon = item.querySelector('.faq-icon');
                
                question.addEventListener('click', () => {
                    // Close all other FAQ items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            const otherAnswer = otherItem.querySelector('.faq-answer');
                            const otherIcon = otherItem.querySelector('.faq-icon');
                            otherAnswer.classList.remove('open');
                            otherIcon.classList.remove('open');
                        }
                    });
                    
                    // Toggle current item
                    answer.classList.toggle('open');
                    icon.classList.toggle('open');
                });
            });
        });
        // Back to Top Function
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Show/hide back to top button based on scroll position
        window.addEventListener('scroll', function() {
            const backToTopBtn = document.querySelector('.back-to-top');
            if (window.scrollY > 300) {
                backToTopBtn.style.opacity = '1';
                backToTopBtn.style.visibility = 'visible';
            } else {
                backToTopBtn.style.opacity = '0';
                backToTopBtn.style.visibility = 'hidden';
            }
        });
    </script>
</body>
</html>