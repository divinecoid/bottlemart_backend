<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bottlemart | Checkout</title>
    
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
        <a href="/shop" class="text-sm font-medium text-black/60 hover:text-brandGreen-500 transition-colors flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke Toko
        </a>
    </header>

    <!-- Main Content -->
    <main class="flex-grow py-12 px-6 md:px-12 max-w-7xl mx-auto w-full">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Shipping Form (8 cols on lg) -->
            <div class="lg:col-span-7 space-y-8">
                <div>
                    <span class="text-xs uppercase tracking-widest text-brandGreen-500 font-bold mb-1 block">Fulfillment</span>
                    <h2 class="font-serif text-3xl font-bold text-black">Detail Pengiriman</h2>
                    <p class="text-black/60 text-sm mt-1">Lengkapi informasi di bawah untuk melanjutkan ke proses pembayaran.</p>
                </div>

                <form onsubmit="proceedToPayment(event)" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-black/70 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" required class="w-full px-4 py-3 rounded-lg border border-black/10 focus:border-brandGreen-500 focus:outline-none transition text-sm bg-neutral-50" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-black/70 uppercase tracking-wider mb-2">Nomor Telepon (WhatsApp)</label>
                            <input type="tel" required class="w-full px-4 py-3 rounded-lg border border-black/10 focus:border-brandGreen-500 focus:outline-none transition text-sm bg-neutral-50" placeholder="081234567890">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-black/70 uppercase tracking-wider mb-2">Alamat Email</label>
                        <input type="email" required class="w-full px-4 py-3 rounded-lg border border-black/10 focus:border-brandGreen-500 focus:outline-none transition text-sm bg-neutral-50" placeholder="johndoe@email.com">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-black/70 uppercase tracking-wider mb-2">Alamat Rumah Lengkap</label>
                        <textarea required rows="3" class="w-full px-4 py-3 rounded-lg border border-black/10 focus:border-brandGreen-500 focus:outline-none transition text-sm bg-neutral-50" placeholder="Nama Jalan, Blok, No. Rumah, RT/RW, Kelurahan, Kecamatan"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-black/70 uppercase tracking-wider mb-2">Kota</label>
                            <input type="text" required class="w-full px-4 py-3 rounded-lg border border-black/10 focus:border-brandGreen-500 focus:outline-none transition text-sm bg-neutral-50" placeholder="Jakarta Selatan">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-black/70 uppercase tracking-wider mb-2">Kode Pos</label>
                            <input type="text" required class="w-full px-4 py-3 rounded-lg border border-black/10 focus:border-brandGreen-500 focus:outline-none transition text-sm bg-neutral-50" placeholder="12190">
                        </div>
                    </div>

                    <div class="p-4 bg-brandGreen-50 border border-brandGreen-500/10 rounded-lg flex items-start gap-3">
                        <input type="checkbox" required class="mt-1 accent-brandGreen-500">
                        <p class="text-xs text-black/70 leading-relaxed">
                            Saya menyatakan bahwa saya berumur **21 tahun ke atas** dan bersedia menunjukkan kartu identitas resmi (KTP/Passport) pada saat serah terima pengiriman.
                        </p>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-lg bg-black hover:bg-brandGreen-500 text-white font-semibold text-xs tracking-wider uppercase transition-all duration-300 shadow-md">
                        Lanjut ke Pembayaran Simulator
                    </button>
                </form>
            </div>

            <!-- Order Summary (5 cols on lg) -->
            <div class="lg:col-span-5 bg-neutral-50 border border-black/5 p-6 md:p-8 rounded-xl h-fit">
                <h3 class="font-serif text-xl font-bold text-black pb-4 border-b border-black/10 mb-6">Ringkasan Order</h3>
                
                <!-- Items list -->
                <div id="order-items-list" class="space-y-4 mb-6">
                    <!-- Dynamic rendering -->
                </div>

                <div class="space-y-3 pt-6 border-t border-black/10 text-sm">
                    <div class="flex justify-between text-black/60">
                        <span>Subtotal</span>
                        <span id="order-subtotal">Rp 0</span>
                    </div>
                    <div class="flex justify-between text-black/60">
                        <span>Pengiriman</span>
                        <span class="text-brandGreen-500 font-medium">GRATIS</span>
                    </div>
                    <div class="flex justify-between text-black/60">
                        <span>Biaya Administrasi</span>
                        <span class="text-brandGreen-500 font-medium">Rp 0</span>
                    </div>
                    <div class="flex justify-between items-center text-base font-bold text-black pt-3 border-t border-black/5">
                        <span>Total Pembayaran</span>
                        <span id="order-total" class="text-lg text-brandGreen-500">Rp 0</span>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-neutral-50 py-8 text-center text-xs text-black/45 border-t border-black/5 px-6">
        <p>&copy; 2026 PT. Bottlemart Retail Indonesia. All Rights Reserved.</p>
    </footer>

    <script>
        let cart = [];

        window.onload = function() {
            const stored = localStorage.getItem('bottlemart_cart');
            if (stored) {
                cart = JSON.parse(stored);
                renderSummary();
            } else {
                window.location.href = '/shop';
            }
        }

        function renderSummary() {
            const container = document.getElementById('order-items-list');
            const subtotalEl = document.getElementById('order-subtotal');
            const totalEl = document.getElementById('order-total');

            let total = 0;
            let html = '';

            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                html += `
                    <div class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3">
                            <img src="${item.image}" alt="${item.name}" class="w-12 h-12 rounded object-cover bg-white shrink-0 border border-black/5">
                            <div>
                                <h4 class="text-xs font-semibold text-black">${item.name}</h4>
                                <p class="text-[10px] text-black/40 mt-0.5">Jumlah: ${item.quantity}</p>
                            </div>
                        </div>
                        <span class="text-xs font-bold text-black">Rp ${itemTotal.toLocaleString('id-ID')}</span>
                    </div>
                `;
            });

            container.innerHTML = html;
            subtotalEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
            totalEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }

        function proceedToPayment(e) {
            e.preventDefault();
            // Redirect to Xendit payment simulator
            window.location.href = '/checkout/payment';
        }
    </script>
</body>
</html>
