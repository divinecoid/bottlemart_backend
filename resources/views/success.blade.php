<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bottlemart | Transaksi Sukses</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
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
                                500: '#0b663a',
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
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-brandGreen-500 selection:text-white">

    <!-- Header Navigation -->
    <header class="bg-white border-b border-black/5 py-4 px-6 md:px-12 flex justify-between items-center">
        <a href="/" class="flex items-center gap-3">
            <img src="/images/logo.png" alt="Bottlemart Logo" class="h-10 w-auto">
            <span class="font-serif text-2xl font-bold tracking-widest text-black">BOTTLEMART</span>
        </a>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-16 px-6 md:px-12 max-w-2xl mx-auto w-full">
        <div class="text-center space-y-6">
            
            <!-- Success Icon -->
            <div class="mx-auto w-16 h-16 rounded-full bg-brandGreen-50 border border-brandGreen-500/20 flex items-center justify-center text-brandGreen-500 mb-6 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <span class="text-xs uppercase tracking-widest text-brandGreen-500 font-bold mb-1 block">Payment Complete</span>
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-black">Pembayaran Berhasil!</h2>
            <p class="text-black/60 text-sm max-w-md mx-auto font-light leading-relaxed">
                Terima kasih atas pesanan Anda. Transaksi pembayaran Anda telah berhasil disimulasikan menggunakan Xendit Sandbox.
            </p>

            <!-- Order Confirmation Card -->
            <div class="bg-neutral-50 rounded-xl p-6 border border-black/5 text-left text-xs text-black/70 space-y-3.5 max-w-md mx-auto">
                <div class="flex justify-between pb-2 border-b border-black/5">
                    <span class="font-bold text-black uppercase tracking-wider text-[10px]">Detail Transaksi</span>
                    <span class="text-brandGreen-500 font-semibold" id="trans-date">30 Juli 2026</span>
                </div>
                <div class="flex justify-between">
                    <span>Status Transaksi</span>
                    <span class="bg-green-100 text-green-800 font-semibold px-2 py-0.5 rounded text-[10px] uppercase">Berhasil (Paid)</span>
                </div>
                <div class="flex justify-between">
                    <span>Metode Pembayaran</span>
                    <span class="font-semibold text-black">Xendit Sandbox (Virtual Account/QRIS)</span>
                </div>
                <div class="flex justify-between">
                    <span>Estimasi Pengiriman</span>
                    <span class="font-semibold text-black">1-2 Hari Kerja (Jakarta Area)</span>
                </div>
                <div class="pt-2 border-t border-black/5 text-[10px] text-black/50 leading-relaxed">
                    Pengiriman minuman beralkohol mewajibkan verifikasi KTP fisik penerima saat kurir tiba di alamat tujuan.
                </div>
            </div>

            <div class="pt-6">
                <a href="/" class="inline-block py-3 px-8 rounded-lg bg-black hover:bg-brandGreen-500 text-white font-semibold text-xs tracking-wider uppercase transition-all duration-300 shadow-md">
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-neutral-50 py-8 text-center text-xs text-black/45 border-t border-black/5 px-6">
        <p>&copy; 2026 PT. Bottlemart Retail Indonesia. All Rights Reserved.</p>
    </footer>

    <script>
        window.onload = function() {
            // Set dynamic formatted date
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const today  = new Date();
            document.getElementById('trans-date').textContent = today.toLocaleDateString("id-ID", options);
        }
    </script>
</body>
</html>
