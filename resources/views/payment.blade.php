<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xendit Invoice | PT Bottlemart Retail Indonesia</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        xenditBlue: {
                            50: '#f0f5ff',
                            100: '#d9e6ff',
                            500: '#1462f3', /* Xendit's official blue accent */
                            600: '#0c4ec3',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fc;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased">

    <!-- Top Status / Sandbox Indicator -->
    <div class="bg-amber-500 text-black text-center py-2 px-4 text-xs font-semibold tracking-wider flex items-center justify-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
        </svg>
        XENDIT PAYMENT SIMULATOR (TEST MODE / SANDBOX)
    </div>

    <!-- Main Payment Container -->
    <main class="flex-grow flex items-center justify-center p-4 md:p-8">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl border border-black/5 overflow-hidden grid grid-cols-1 md:grid-cols-12">
            
            <!-- Left Info Panel (5 cols) -->
            <div class="md:col-span-5 bg-slate-50 border-r border-black/5 p-6 md:p-8 flex flex-col justify-between">
                <div>
                    <!-- Merchant info -->
                    <div class="flex items-center gap-3 mb-6 pb-6 border-b border-black/10">
                        <img src="/images/logo.png" alt="Bottlemart" class="h-10 w-auto bg-white rounded border border-black/5 p-1">
                        <div>
                            <h2 class="text-sm font-bold text-slate-800">PT. Bottlemart Retail Indonesia</h2>
                            <span class="text-[10px] bg-green-100 text-green-800 font-semibold px-2 py-0.5 rounded">Verified Merchant</span>
                        </div>
                    </div>

                    <!-- Payment summary -->
                    <div class="space-y-4">
                        <div>
                            <span class="text-[10px] text-slate-400 uppercase tracking-wider block">Nomor Invoice</span>
                            <span id="invoice-id" class="text-sm font-semibold text-slate-800">INV-BMRT-178593</span>
                        </div>
                        <div>
                            <span class="text-[10px] text-slate-400 uppercase tracking-wider block">Jumlah Pembayaran</span>
                            <span id="invoice-total" class="text-2xl font-bold text-xenditBlue-500">Rp 0</span>
                        </div>
                        <div>
                            <span class="text-[10px] text-slate-400 uppercase tracking-wider block">Batas Waktu Bayar</span>
                            <span class="text-sm font-semibold text-red-500 flex items-center gap-1.5 mt-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span id="countdown">23:59:59</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Powered by indicator -->
                <div class="pt-8 border-t border-black/10 mt-8">
                    <p class="text-[10px] text-slate-400">Powered by</p>
                    <div class="flex items-center gap-1.5 mt-1">
                        <span class="font-bold text-sm tracking-wider text-slate-800">xendit</span>
                        <span class="text-[9px] bg-slate-200 text-slate-600 px-1.5 py-0.5 rounded font-medium">PCI-DSS Compliant</span>
                    </div>
                </div>
            </div>

            <!-- Right Payment Panel (7 cols) -->
            <div class="md:col-span-7 p-6 md:p-8 flex flex-col justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-800 mb-6 uppercase tracking-wider">Pilih Metode Pembayaran</h3>

                    <div class="space-y-4">
                        <!-- Method 1: Virtual Account -->
                        <div class="border border-slate-200 rounded-xl overflow-hidden">
                            <button onclick="toggleSection('va-methods')" class="w-full p-4 flex items-center justify-between bg-slate-50 hover:bg-slate-100 transition text-left">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded border border-slate-200 text-xenditBlue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-slate-800">Virtual Account (Transfer Bank)</h4>
                                        <p class="text-[10px] text-slate-400">BCA, Mandiri, BNI, BRI, Permata</p>
                                    </div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="va-methods" class="p-4 border-t border-slate-200 space-y-2 hidden">
                                <div class="flex items-center justify-between p-3 rounded-lg border border-slate-100 hover:border-xenditBlue-500 cursor-pointer transition">
                                    <span class="text-xs font-semibold text-slate-800">BCA Virtual Account</span>
                                    <span class="text-[10px] font-bold text-slate-400">800109283746</span>
                                </div>
                                <div class="flex items-center justify-between p-3 rounded-lg border border-slate-100 hover:border-xenditBlue-500 cursor-pointer transition">
                                    <span class="text-xs font-semibold text-slate-800">Mandiri Virtual Account</span>
                                    <span class="text-[10px] font-bold text-slate-400">890283749283</span>
                                </div>
                            </div>
                        </div>

                        <!-- Method 2: QRIS -->
                        <div class="border border-slate-200 rounded-xl overflow-hidden">
                            <button onclick="toggleSection('qris-section')" class="w-full p-4 flex items-center justify-between bg-slate-50 hover:bg-slate-100 transition text-left">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded border border-slate-200 text-xenditBlue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-slate-800">QRIS (Gopay, OVO, Dana, LinkAja)</h4>
                                        <p class="text-[10px] text-slate-400">Scan QR Code instan langsung bayar</p>
                                    </div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="qris-section" class="p-6 border-t border-slate-200 flex flex-col items-center gap-3 hidden">
                                <!-- Mock QRIS Image -->
                                <div class="bg-white p-3 rounded-lg border border-slate-200 shadow-sm w-36 h-36 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 text-slate-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 4h4v4H4V4zm0 12h4v4H4v-4zm12-12h4v4h-4V4zm-6 2h1v1h-1V6zm0 4h1v1h-1v-1zm4 2h1v1h-1v-1zm2 2h1v1h-1v-1zm-6 2h1v1h-1v-1zm4 2h1v1h-1v-1zm2 2h1v1h-1v-1zm-4-10h1v1h-1V8zm4 0h1v1h-1V8zm-2 4h1v1h-1v-1zm2 4h1v1h-1v-1z" />
                                    </svg>
                                </div>
                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Scan Code QRIS Resmi</span>
                            </div>
                        </div>

                        <!-- Method 3: Credit Card -->
                        <div class="border border-slate-200 rounded-xl overflow-hidden">
                            <button onclick="toggleSection('cc-section')" class="w-full p-4 flex items-center justify-between bg-slate-50 hover:bg-slate-100 transition text-left">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 bg-white rounded border border-slate-200 text-xenditBlue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-xs font-bold text-slate-800">Kartu Kredit / Debit</h4>
                                        <p class="text-[10px] text-slate-400">Visa, Mastercard, JCB, American Express</p>
                                    </div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="cc-section" class="p-4 border-t border-slate-200 space-y-3 hidden">
                                <div>
                                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Nomor Kartu</label>
                                    <input type="text" disabled class="w-full px-3 py-2 rounded border border-slate-200 text-xs bg-slate-50" value="4111 2222 3333 4444">
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">Masa Berlaku</label>
                                        <input type="text" disabled class="w-full px-3 py-2 rounded border border-slate-200 text-xs bg-slate-50" value="12/28">
                                    </div>
                                    <div>
                                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-1">CVV</label>
                                        <input type="text" disabled class="w-full px-3 py-2 rounded border border-slate-200 text-xs bg-slate-50" value="***">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Simulation Action -->
                <div class="pt-8 border-t border-slate-200 mt-8">
                    <button onclick="simulateSuccess()" class="w-full py-4 rounded-xl bg-xenditBlue-500 hover:bg-xenditBlue-600 text-white font-bold text-xs tracking-wider uppercase transition shadow-lg shadow-xenditBlue-500/10">
                        Simulasikan Pembayaran Sukses (Xendit Sandbox)
                    </button>
                    <p class="text-[9px] text-slate-400 text-center mt-2">
                        Reviewer Midtrans/Xendit dapat menguji simulasi transaksi ini untuk memverifikasi kesiapan alur checkout store.
                    </p>
                </div>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="py-6 text-center text-[10px] text-slate-400 border-t border-black/5 bg-white">
        <p>&copy; 2026 PT. Bottlemart Retail Indonesia. PCI-DSS Certified Secure.</p>
    </footer>

    <script>
        window.onload = function() {
            // Generate mock Invoice ID
            const rand = Math.floor(100000 + Math.random() * 900000);
            document.getElementById('invoice-id').textContent = `INV-BMRT-${rand}`;
            
            // Get total from localStorage
            const stored = localStorage.getItem('bottlemart_cart');
            if (stored) {
                const cart = JSON.parse(stored);
                const total = cart.reduce((acc, item) => acc + (item.price * item.quantity), 0);
                document.getElementById('invoice-total').textContent = `Rp ${total.toLocaleString('id-ID')}`;
            } else {
                window.location.href = '/shop';
            }

            // Countdown timer simulation
            let time = 86399; // 24 hours
            setInterval(() => {
                time--;
                const hours = Math.floor(time / 3600);
                const minutes = Math.floor((time % 3600) / 60);
                const seconds = time % 60;
                document.getElementById('countdown').textContent = 
                    `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }, 1000);
        }

        function toggleSection(id) {
            const el = document.getElementById(id);
            if (el.classList.contains('hidden')) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        }

        function simulateSuccess() {
            // Clear cart upon successful payment
            localStorage.removeItem('bottlemart_cart');
            window.location.href = '/checkout/success';
        }
    </script>
</body>
</html>
