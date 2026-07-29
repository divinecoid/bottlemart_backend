<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bottlemart | Curated Spirits, Wines & Craft Beers</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Vite integration or fallback) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                            serif: ['Playfair Display', 'serif'],
                        },
                        colors: {
                            brandGreen: {
                                50: '#f0f7f4',
                                100: '#dcece4',
                                200: '#bcd9cb',
                                300: '#90bfab',
                                400: '#609f85',
                                500: '#0b663a', /* Forest green matching the logo */
                                600: '#09532f',
                                700: '#074225',
                                800: '#05311c',
                                900: '#032112',
                            }
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: #000000;
        }
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-brandGreen-500 selection:text-white antialiased overflow-x-hidden">

    <!-- Top Age Warning banner -->
    <div class="bg-red-650/10 border-b border-red-500/20 text-red-700 text-center py-2.5 px-4 text-[10px] md:text-xs font-semibold tracking-wider flex items-center justify-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600 shrink-0" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        PERINGATAN: KHUSUS 21 TAHUN KE ATAS | WAJIB MENUNJUKKAN KTP SAAT PENGIRIMAN
    </div>

    <!-- Header Navigation -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-black/5 py-4 px-6 md:px-12 flex justify-between items-center">
        <a href="/" class="flex items-center gap-3">
            <img src="/images/logo.png" alt="Bottlemart Logo" class="h-10 w-auto">
            <span class="font-serif text-2xl font-bold tracking-widest text-black">BOTTLEMART</span>
        </a>
        
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-black/70">
            <a href="/" class="text-brandGreen-500 transition-colors">Home</a>
            <a href="/shop" class="hover:text-brandGreen-500 transition-colors">Browse Shop</a>
            <a href="#experience" class="hover:text-brandGreen-500 transition-colors">Our Experience</a>
            <a href="#about" class="hover:text-brandGreen-500 transition-colors">About Us</a>
        </nav>

        <div>
            <a href="/shop" class="inline-flex items-center justify-center py-2 px-5 rounded-full border border-black bg-black text-white hover:bg-brandGreen-500 hover:border-brandGreen-500 text-xs font-semibold uppercase tracking-wider transition-all duration-300">
                Enter Shop
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative py-28 md:py-40 px-6 md:px-12 overflow-hidden flex items-center justify-center bg-brandGreen-50/50">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(11,102,58,0.06)_0%,transparent_70%)]"></div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span class="text-xs uppercase tracking-widest text-brandGreen-500 font-semibold mb-4 block">Indonesia's Finest Spirits Purveyor</span>
            <h1 class="font-serif text-5xl md:text-7xl font-bold text-black mb-6 leading-[1.1] tracking-tight">
                An Exquisite Journey of Taste & Tradition
            </h1>
            <p class="text-black/60 text-base md:text-xl max-w-2xl mx-auto font-light leading-relaxed mb-10">
                Temukan koleksi wine pilihan, single malt whiskey legendaris, serta botanical gin premium. Dikirim dengan aman langsung ke tempat Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/shop" class="py-4 px-8 rounded-lg bg-brandGreen-500 hover:bg-brandGreen-600 text-white font-semibold text-sm tracking-wider uppercase transition-all duration-300 shadow-xl shadow-brandGreen-500/10 active:scale-95">
                    Explore Our Catalog
                </a>
                <a href="#experience" class="py-4 px-8 rounded-lg bg-white border border-black/10 hover:border-black hover:bg-black/5 text-black font-semibold text-sm tracking-wider uppercase transition-all duration-300">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Experience / Pillars Section -->
    <section id="experience" class="bg-white border-y border-black/5 py-24 px-6 md:px-12">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs uppercase tracking-widest text-brandGreen-500 font-semibold mb-2 block">Why Bottlemart</span>
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-black">Premium Quality & Care</h2>
                <p class="text-black/60 text-sm mt-3 font-light leading-relaxed">
                    Kami mengutamakan keaslian produk, logistik yang aman, serta pemenuhan standar regulasi untuk menjamin kepuasan Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Pillar 1 -->
                <div class="bg-brandGreen-50/30 border border-black/5 p-8 rounded-xl hover:border-brandGreen-500/20 transition-all duration-300">
                    <div class="w-12 h-12 rounded-lg bg-brandGreen-500/10 border border-brandGreen-500/20 flex items-center justify-center text-brandGreen-500 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-xl font-semibold text-black mb-3">100% Original BPOM</h3>
                    <p class="text-black/60 text-xs leading-relaxed font-light">
                        Seluruh produk minuman beralkohol yang kami sediakan memiliki sertifikasi resmi BPOM RI dan diimpor secara legal.
                    </p>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-brandGreen-50/30 border border-black/5 p-8 rounded-xl hover:border-brandGreen-500/20 transition-all duration-300">
                    <div class="w-12 h-12 rounded-lg bg-brandGreen-500/10 border border-brandGreen-500/20 flex items-center justify-center text-brandGreen-500 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 9.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-xl font-semibold text-black mb-3">Temperature Controlled</h3>
                    <p class="text-black/60 text-xs leading-relaxed font-light">
                        Warehouse kami dilengkapi sistem pengatur suhu presisi agar kualitas wine dan wiski tetap terjaga sempurna hingga disajikan.
                    </p>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-brandGreen-50/30 border border-black/5 p-8 rounded-xl hover:border-brandGreen-500/20 transition-all duration-300">
                    <div class="w-12 h-12 rounded-lg bg-brandGreen-500/10 border border-brandGreen-500/20 flex items-center justify-center text-brandGreen-500 mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-serif text-xl font-semibold text-black mb-3">Secure Packing & Delivery</h3>
                    <p class="text-black/60 text-xs leading-relaxed font-light">
                        Pengemasan menggunakan double-wall shockbox khusus botol untuk memastikan produk aman selama perjalanan pengiriman.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Curated Teaser Gallery -->
    <section class="py-24 px-6 md:px-12 max-w-7xl mx-auto w-full">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
            <div>
                <span class="text-xs uppercase tracking-widest text-brandGreen-500 font-semibold mb-2 block">Our Cellar</span>
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-black">Preview Our Collection</h2>
            </div>
            <a href="/shop" class="text-sm font-semibold text-brandGreen-500 hover:text-brandGreen-650 flex items-center gap-1.5 mt-4 md:mt-0 transition-colors group">
                Browse Full Catalog
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Wine Card -->
            <div class="group relative rounded-xl overflow-hidden aspect-[3/4] bg-neutral-100 border border-black/5">
                <img src="/images/wine.png" alt="Wines" class="absolute inset-0 w-full h-full object-cover opacity-90 transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <span class="text-[9px] uppercase tracking-wider bg-brandGreen-500 text-white font-semibold py-0.5 px-2 rounded-full mb-2 inline-block">Old World Reserve</span>
                    <h3 class="font-serif text-2xl font-bold text-white mb-1">Fine Wines</h3>
                    <p class="text-white/80 text-xs font-light">Cabernet, Merlot, Chardonnay</p>
                </div>
            </div>

            <!-- Whiskey Card -->
            <div class="group relative rounded-xl overflow-hidden aspect-[3/4] bg-neutral-100 border border-black/5">
                <img src="/images/whiskey.png" alt="Whiskeys" class="absolute inset-0 w-full h-full object-cover opacity-90 transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <span class="text-[9px] uppercase tracking-wider bg-brandGreen-500 text-white font-semibold py-0.5 px-2 rounded-full mb-2 inline-block">Aged Spirits</span>
                    <h3 class="font-serif text-2xl font-bold text-white mb-1">Single Malts</h3>
                    <p class="text-white/80 text-xs font-light">Scotch, Bourbon, Rye Whiskeys</p>
                </div>
            </div>

            <!-- Gin Card -->
            <div class="group relative rounded-xl overflow-hidden aspect-[3/4] bg-neutral-100 border border-black/5">
                <img src="/images/gin.png" alt="Gins" class="absolute inset-0 w-full h-full object-cover opacity-90 transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <span class="text-[9px] uppercase tracking-wider bg-brandGreen-500 text-white font-semibold py-0.5 px-2 rounded-full mb-2 inline-block">Botanicals</span>
                    <h3 class="font-serif text-2xl font-bold text-white mb-1">Craft Gin & Spirits</h3>
                    <p class="text-white/80 text-xs font-light">Infused Botanicals, Tonic Companions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Store Information (Required for Onboarding) -->
    <section id="about" class="bg-neutral-50 border-t border-black/5 py-16 px-6 md:px-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 text-black">
            <!-- About Merchant -->
            <div>
                <h3 class="font-serif text-2xl font-semibold text-black mb-4">About PT. Bottlemart Retail Indonesia</h3>
                <p class="text-black/70 text-sm leading-relaxed mb-6 font-light">
                    Bottlemart adalah importir dan pengecer resmi minuman beralkohol berlisensi di Indonesia. Seluruh alur transaksi di platform kami telah terintegrasi dengan standar kepatuhan batas usia dan hukum perdagangan yang berlaku di bawah PT. Bottlemart Retail Indonesia.
                </p>
                <div class="flex items-center gap-4 text-xs text-black/50">
                    <span class="border border-black/20 px-2 py-1 rounded">SIUP-MB Licensed</span>
                    <span class="border border-black/20 px-2 py-1 rounded">BPOM Approved</span>
                </div>
            </div>

            <!-- Contact & Compliance Info -->
            <div class="space-y-6">
                <h3 class="font-serif text-2xl font-semibold text-black">Merchant Information</h3>
                
                <div class="space-y-4 text-sm text-black/80 font-light">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brandGreen-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <p class="font-semibold text-black">PT. Bottlemart Retail Indonesia</p>
                            <p class="text-xs text-black/60">Sudirman Central Business District (SCBD), Tower 4A, Senayan, Jakarta, Indonesia</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brandGreen-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <p class="text-xs text-black/60">Customer Support: +62 21 555 8899</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brandGreen-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 00-2 2z" />
                        </svg>
                        <p class="text-xs text-black/60">E-mail: support@bottlemart.my.id</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Policies -->
    <section class="bg-neutral-100 border-t border-black/5 py-12 px-6 md:px-12 text-black">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-xs text-black/70 font-light leading-relaxed">
                <div class="bg-white p-5 rounded-lg border border-black/5">
                    <h4 class="font-semibold text-black mb-2 uppercase tracking-wider text-[10px] text-brandGreen-500">Terms of Service</h4>
                    <p>
                        Dengan memesan produk di toko kami, Anda menyatakan telah berusia minimal 21 tahun. Pemeriksaan KTP fisik/identitas resmi akan dilakukan dengan ketat pada saat serah terima barang.
                    </p>
                </div>
                <div class="bg-white p-5 rounded-lg border border-black/5">
                    <h4 class="font-semibold text-black mb-2 uppercase tracking-wider text-[10px] text-brandGreen-500">Privacy Policy</h4>
                    <p>
                        Kami menjamin keamanan data transaksi dan detail pengiriman pelanggan. Seluruh data sensitif dienkripsi penuh dan hanya digunakan untuk keperluan pemrosesan order serta payment clearance.
                    </p>
                </div>
                <div class="bg-white p-5 rounded-lg border border-black/5">
                    <h4 class="font-semibold text-black mb-2 uppercase tracking-wider text-[10px] text-brandGreen-500">Refund & Cancellation</h4>
                    <p>
                        Pesanan yang belum dikirim dapat dibatalkan untuk refund penuh. Retur produk yang rusak/salah kirim dapat diproses dengan menyertakan bukti video unboxing dalam kurun waktu 24 jam setelah barang sampai.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-neutral-50 py-8 text-center text-xs text-black/45 border-t border-black/5 px-6">
        <p class="mb-2">&copy; 2026 PT. Bottlemart Retail Indonesia. All Rights Reserved.</p>
        <p class="text-black/30">All payments processed securely under Sandbox simulation. Ready for Midtrans / Xendit production configuration.</p>
    </footer>

</body>
</html>
