<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bottlemart | Premium Spirits & Wine Shop</title>
    
    <!-- Google Fonts: Playfair Display for luxury headers, Inter for clean body -->
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
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #ffffff;
        }
        ::-webkit-scrollbar-thumb {
            background: #e2e2e2;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #0b663a;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-brandGreen-500 selection:text-white">

    <!-- Age Verification Toast -->
    <div id="age-warning" class="bg-red-50 border-b border-red-500/20 text-red-800 text-center py-2.5 px-4 text-xs font-semibold tracking-wider flex items-center justify-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600 shrink-0" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        WARNING: YOU MUST BE 21 YEARS OR OLDER TO PURCHASE ALCOHOL. WE VERIFY ID UPON DELIVERY.
    </div>

    <!-- Header Navigation -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-black/5 py-4 px-6 md:px-12 flex justify-between items-center transition-all duration-300">
        <a href="/" class="flex items-center gap-3">
            <img src="/images/logo.png" alt="Bottlemart Logo" class="h-10 w-auto">
            <span class="font-serif text-2xl font-bold tracking-widest text-black">BOTTLEMART</span>
        </a>
        
        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-black/75">
            <a href="/" class="hover:text-brandGreen-500 transition-colors">Home</a>
            <a href="/shop" class="text-brandGreen-500 transition-colors">Browse Shop</a>
            <a href="/#experience" class="hover:text-brandGreen-500 transition-colors">Our Experience</a>
            <a href="/#about" class="hover:text-brandGreen-500 transition-colors">About Us</a>
        </nav>

        <div class="flex items-center gap-4">
            <!-- Shopping Cart Button -->
            <button onclick="toggleCart()" class="relative p-2.5 rounded-full bg-black/5 border border-black/10 hover:border-brandGreen-500/50 hover:bg-brandGreen-500/10 text-black transition-all duration-300 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:text-brandGreen-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <span id="cart-badge" class="absolute -top-1 -right-1 bg-brandGreen-500 text-white text-[10px] font-bold h-5 w-5 rounded-full flex items-center justify-center scale-0 transition-transform duration-300">0</span>
            </button>
        </div>
    </header>

    <!-- Main Hero Banner -->
    <section class="relative py-20 px-6 md:px-12 text-center overflow-hidden border-b border-black/5 bg-brandGreen-50/50">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(11,102,58,0.06)_0%,transparent_70%)]"></div>
        <div class="max-w-3xl mx-auto relative z-10">
            <span class="text-xs uppercase tracking-widest text-brandGreen-500 font-semibold mb-3 block">Curated Collection</span>
            <h2 class="font-serif text-4xl md:text-6xl font-bold mb-6 text-black leading-tight">Exquisite Spirits for the Discerning Palette</h2>
            <p class="text-black/60 text-base md:text-lg max-w-xl mx-auto font-light leading-relaxed">
                Explore our handpicked selection of premium wines, single malt whiskeys, and artisanal botanical spirits. Ready for swift, secure delivery.
            </p>
        </div>
    </section>

    <!-- Product Catalog Section -->
    <main class="flex-grow py-16 px-6 md:px-12 max-w-7xl mx-auto w-full">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Product 1 -->
            <div class="group bg-white border border-black/5 hover:border-brandGreen-500/30 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                <div class="relative overflow-hidden aspect-square bg-[#fbfbfb]">
                    <img src="/images/wine.png" alt="Château Saint-Hubert Cabernet Sauvignon" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <span class="absolute top-4 left-4 bg-brandGreen-500 text-white font-semibold text-[10px] uppercase tracking-wider py-1 px-2.5 rounded-full shadow-md">Premium Reserve</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between bg-white text-black">
                    <div>
                        <span class="text-xs text-brandGreen-500 font-medium tracking-wider uppercase block mb-1">Red Wine</span>
                        <h3 class="font-serif text-xl font-semibold text-black mb-2">Château Saint-Hubert Cabernet Sauvignon</h3>
                        <p class="text-black/60 text-xs leading-relaxed mb-4">
                            A rich, full-bodied red wine with deep blackberry notes, subtle oak integration, and a long, elegant finish. Perfect for special pairings.
                        </p>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-black/5">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-black/40 uppercase tracking-wider">Price</span>
                            <span class="text-lg font-bold text-brandGreen-500">Rp 1,250,000</span>
                        </div>
                        <button onclick="addToCart('Château Saint-Hubert Cabernet Sauvignon', 1250000, '/images/wine.png')" class="py-2.5 px-4 rounded-lg bg-black hover:bg-brandGreen-500 text-white font-semibold text-xs tracking-wider uppercase transition-all duration-300 shadow-md active:scale-95">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="group bg-white border border-black/5 hover:border-brandGreen-500/30 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                <div class="relative overflow-hidden aspect-square bg-[#fbfbfb]">
                    <img src="/images/whiskey.png" alt="Glenaview Single Malt Whiskey" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <span class="absolute top-4 left-4 bg-brandGreen-500 text-white font-semibold text-[10px] uppercase tracking-wider py-1 px-2.5 rounded-full shadow-md">Aged 21 Years</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between bg-white text-black">
                    <div>
                        <span class="text-xs text-brandGreen-500 font-medium tracking-wider uppercase block mb-1">Whiskey</span>
                        <h3 class="font-serif text-xl font-semibold text-black mb-2">Glenaview Islay Single Malt Scotch</h3>
                        <p class="text-black/60 text-xs leading-relaxed mb-4">
                            Distilled in the heart of Islay. Exudes notes of warm peat smoke, dried fruits, rich dark chocolate, and a whisper of vanilla sweetness.
                        </p>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-black/5">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-black/40 uppercase tracking-wider">Price</span>
                            <span class="text-lg font-bold text-brandGreen-500">Rp 2,890,000</span>
                        </div>
                        <button onclick="addToCart('Glenaview Islay Single Malt Scotch', 2890000, '/images/whiskey.png')" class="py-2.5 px-4 rounded-lg bg-black hover:bg-brandGreen-500 text-white font-semibold text-xs tracking-wider uppercase transition-all duration-300 shadow-md active:scale-95">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="group bg-white border border-black/5 hover:border-brandGreen-500/30 rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col justify-between">
                <div class="relative overflow-hidden aspect-square bg-[#fbfbfb]">
                    <img src="/images/gin.png" alt="Juniper & Herb Dry Gin" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <span class="absolute top-4 left-4 bg-brandGreen-500 text-white font-semibold text-[10px] uppercase tracking-wider py-1 px-2.5 rounded-full shadow-md">Artisanal</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between bg-white text-black">
                    <div>
                        <span class="text-xs text-brandGreen-500 font-medium tracking-wider uppercase block mb-1">Gin</span>
                        <h3 class="font-serif text-xl font-semibold text-black mb-2">Juniper & Herb Botanical Dry Gin</h3>
                        <p class="text-black/60 text-xs leading-relaxed mb-4">
                            Infused with hand-selected local botanicals, fresh cucumber, and crisp juniper berries. A refreshing spirit ideal for the ultimate highball.
                        </p>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-black/5">
                        <div class="flex flex-col">
                            <span class="text-[10px] text-black/40 uppercase tracking-wider">Price</span>
                            <span class="text-lg font-bold text-brandGreen-500">Rp 850,000</span>
                        </div>
                        <button onclick="addToCart('Juniper & Herb Botanical Dry Gin', 850000, '/images/gin.png')" class="py-2.5 px-4 rounded-lg bg-black hover:bg-brandGreen-500 text-white font-semibold text-xs tracking-wider uppercase transition-all duration-300 shadow-md active:scale-95">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Cart Slide-out Drawer -->
    <div id="cart-drawer" class="fixed inset-0 z-50 pointer-events-none transition-all duration-300">
        <!-- Backdrop -->
        <div onclick="toggleCart()" id="cart-backdrop" class="absolute inset-0 bg-black/40 opacity-0 pointer-events-none transition-opacity duration-300"></div>
        
        <!-- Drawer Panel -->
        <div class="absolute right-0 top-0 bottom-0 w-full max-w-md bg-white border-l border-black/5 p-6 flex flex-col justify-between shadow-2xl translate-x-full transition-transform duration-300 pointer-events-auto text-black">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-black/5">
                    <h3 class="font-serif text-lg font-semibold text-black">Your Selection</h3>
                    <button onclick="toggleCart()" class="text-black/60 hover:text-black p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <!-- Cart Items Container -->
                <div id="cart-items" class="mt-6 space-y-4 max-h-[60vh] overflow-y-auto pr-1">
                    <p class="text-black/40 text-center py-12 text-sm">Your cart is empty.</p>
                </div>
            </div>

            <!-- Cart Summary & Checkout -->
            <div class="pt-6 border-t border-black/5">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-sm text-black/60">Subtotal</span>
                    <span id="cart-total" class="text-lg font-bold text-brandGreen-500">Rp 0</span>
                </div>
                <p class="text-[10px] text-black/40 mb-4 text-center">Taxes and delivery shipping fees calculated at checkout.</p>
                <button onclick="goToCheckout()" id="checkout-btn" disabled class="w-full py-3 rounded-lg bg-black disabled:bg-black/5 disabled:text-black/20 disabled:cursor-not-allowed hover:bg-brandGreen-500 text-white font-semibold text-xs tracking-wider uppercase transition-all duration-300">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>

    <!-- Checkout / Payment Simulation Modal -->
    <div id="checkout-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 transition-all duration-300 opacity-0">
        <!-- Backdrop -->
        <div onclick="closeCheckoutModal()" class="absolute inset-0 bg-black/50"></div>
        
        <!-- Modal Box -->
        <div class="relative w-full max-w-lg bg-white border border-black/10 rounded-2xl overflow-hidden shadow-2xl p-6 md:p-8 transform scale-95 transition-transform duration-300 text-black">
            <button onclick="closeCheckoutModal()" class="absolute top-4 right-4 text-black/40 hover:text-black p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <span class="text-[10px] uppercase tracking-widest text-brandGreen-500 font-bold mb-1 block">Payment Gateway Sandbox</span>
            <h3 class="font-serif text-2xl font-semibold text-black mb-6">Payment Simulation</h3>

            <!-- Payment Summary -->
            <div class="bg-neutral-50 rounded-lg p-4 mb-6 border border-black/5">
                <div class="flex justify-between items-center text-sm mb-2 text-black/60">
                    <span>Order Total</span>
                    <span id="modal-subtotal" class="font-semibold text-black">Rp 0</span>
                </div>
                <div class="flex justify-between items-center text-sm mb-2 text-black/60">
                    <span>Delivery & Tax</span>
                    <span class="text-brandGreen-500 font-medium">FREE</span>
                </div>
                <div class="border-t border-black/5 mt-2 pt-2 flex justify-between items-center">
                    <span class="text-sm font-semibold text-black">Grand Total</span>
                    <span id="modal-total" class="text-lg font-bold text-brandGreen-500">Rp 0</span>
                </div>
            </div>

            <!-- Payment Methods Form / Visuals (Midtrans / Xendit Style) -->
            <div class="space-y-4">
                <p class="text-xs text-black/60 font-semibold uppercase tracking-wider mb-2">Select Payment Method (Sandbox Demo)</p>
                
                <div class="grid grid-cols-2 gap-3">
                    <!-- Method 1 -->
                    <label class="relative flex flex-col p-4 rounded-xl border border-black/5 bg-neutral-50 hover:border-brandGreen-500/40 cursor-pointer transition-all duration-200">
                        <input type="radio" name="payment_method" value="cc" class="absolute top-3 right-3 accent-brandGreen-500" checked>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brandGreen-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <span class="text-xs font-semibold text-black">Credit Card</span>
                        <span class="text-[9px] text-black/40">Visa / Mastercard</span>
                    </label>

                    <!-- Method 2 -->
                    <label class="relative flex flex-col p-4 rounded-xl border border-black/5 bg-neutral-50 hover:border-brandGreen-500/40 cursor-pointer transition-all duration-200">
                        <input type="radio" name="payment_method" value="va" class="absolute top-3 right-3 accent-brandGreen-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brandGreen-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                        <span class="text-xs font-semibold text-black">Virtual Account</span>
                        <span class="text-[9px] text-black/40">BCA, Mandiri, BNI</span>
                    </label>

                    <!-- Method 3 -->
                    <label class="relative flex flex-col p-4 rounded-xl border border-black/5 bg-neutral-50 hover:border-brandGreen-500/40 cursor-pointer transition-all duration-200">
                        <input type="radio" name="payment_method" value="ewallet" class="absolute top-3 right-3 accent-brandGreen-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brandGreen-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                        <span class="text-xs font-semibold text-black">E-Wallet</span>
                        <span class="text-[9px] text-black/40">OVO, GoPay, Dana</span>
                    </label>

                    <!-- Method 4 -->
                    <label class="relative flex flex-col p-4 rounded-xl border border-black/5 bg-neutral-50 hover:border-brandGreen-500/40 cursor-pointer transition-all duration-200">
                        <input type="radio" name="payment_method" value="qris" class="absolute top-3 right-3 accent-brandGreen-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-brandGreen-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                        <span class="text-xs font-semibold text-black">QRIS</span>
                        <span class="text-[9px] text-black/40">Universal Scan Code</span>
                    </label>
                </div>

                <div class="pt-6">
                    <button onclick="triggerPayment()" class="w-full py-3 rounded-lg bg-brandGreen-500 hover:bg-brandGreen-600 text-white font-semibold text-xs tracking-wider uppercase transition-all duration-300 shadow-md">
                        Simulate Payment Success
                    </button>
                    <p class="text-[9px] text-black/30 text-center mt-2">
                        Midtrans/Xendit compliance requires active SSL (HTTPS) and functional cart checkout systems.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact & Store Information (Required for Onboarding) -->
    <section id="about" class="bg-neutral-50 border-t border-black/5 py-16 px-6 md:px-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 text-black">
            <!-- About Merchant -->
            <div>
                <h3 class="font-serif text-2xl font-semibold text-black mb-4">About Bottlemart</h3>
                <p class="text-black/60 text-sm leading-relaxed mb-6 font-light">
                    Bottlemart is Indonesia's premier curator of high-quality imported and local alcoholic beverages. Owned and operated under licensed distribution agreements, we ensure absolute authenticity, high-standard storage conditions, and direct secure delivery to adults of age.
                </p>
                <div class="flex items-center gap-4 text-xs text-black/40">
                    <span class="border border-black/20 px-2 py-1 rounded">BPOM Registered</span>
                    <span class="border border-black/20 px-2 py-1 rounded">21+ Strictly Verified</span>
                </div>
            </div>

            <!-- Contact & Compliance Info -->
            <div id="contact" class="space-y-6">
                <h3 class="font-serif text-2xl font-semibold text-black">Merchant Information</h3>
                
                <div class="space-y-4 text-sm text-black/70 font-light">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brandGreen-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <p class="font-semibold text-black">PT. Bottlemart Retail Indonesia</p>
                            <p class="text-xs text-black/50">Sudirman Central Business District (SCBD), Tower 4A, Senayan, Jakarta, Indonesia</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brandGreen-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <p class="text-xs text-black/50">Customer Support: +62 21 555 8899</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-brandGreen-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 00-2 2z" />
                        </svg>
                        <p class="text-xs text-black/50">E-mail: support@bottlemart.my.id</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Store Policies (Crucial for Midtrans/Xendit Approval) -->
    <section id="policies" class="bg-neutral-100 border-t border-black/5 py-12 px-6 md:px-12 text-black">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-serif text-xl font-semibold text-black mb-6 text-center">Store & Payment Policies</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-xs text-black/70 font-light leading-relaxed">
                <div class="bg-white p-5 rounded-lg border border-black/5">
                    <h4 class="font-semibold text-black mb-2 uppercase tracking-wider text-[10px] text-brandGreen-500">Terms of Service</h4>
                    <p>
                        By placing an order on our platform, you certify that you are at least 21 years of age. Identification checks will be executed strictly during delivery. Orders placed by minors will be canceled immediately with no refund.
                    </p>
                </div>
                <div class="bg-white p-5 rounded-lg border border-black/5">
                    <h4 class="font-semibold text-black mb-2 uppercase tracking-wider text-[10px] text-brandGreen-500">Privacy Policy</h4>
                    <p>
                        We secure customer data with industry-standard encryption protocols. Your personal delivery information is only shared with licensed logistics services executing fulfillment, and payment credentials are encrypted by our certified gateway partner.
                    </p>
                </div>
                <div class="bg-white p-5 rounded-lg border border-black/5">
                    <h4 class="font-semibold text-black mb-2 uppercase tracking-wider text-[10px] text-brandGreen-500">Refund & Cancellation</h4>
                    <p>
                        Orders can be canceled prior to shipping for a full refund. Damaged packages or incorrect bottles are eligible for a replacement or store credit if reported with photo/video evidence within 24 hours of delivery.
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

    <!-- Interactive JS Store logic -->
    <script>
        let cart = [];

        function toggleCart() {
            const drawer = document.getElementById('cart-drawer');
            const backdrop = document.getElementById('cart-backdrop');
            
            if (drawer.classList.contains('pointer-events-none')) {
                drawer.classList.remove('pointer-events-none');
                backdrop.classList.remove('opacity-0', 'pointer-events-none');
                backdrop.classList.add('opacity-100');
                drawer.querySelector('.absolute.right-0').classList.remove('translate-x-full');
            } else {
                drawer.classList.add('pointer-events-none');
                backdrop.classList.add('opacity-0', 'pointer-events-none');
                backdrop.classList.remove('opacity-100');
                drawer.querySelector('.absolute.right-0').classList.add('translate-x-full');
            }
        }

        function addToCart(name, price, image) {
            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ name, price, image, quantity: 1 });
            }
            updateCartUI();
            
            // Subtle pop-up animation for cart button
            const cartBadge = document.getElementById('cart-badge');
            cartBadge.classList.add('scale-110');
            setTimeout(() => cartBadge.classList.remove('scale-110'), 200);
        }

        function removeFromCart(name) {
            cart = cart.filter(item => item.name !== name);
            updateCartUI();
        }

        function changeQuantity(name, change) {
            const item = cart.find(item => item.name === name);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    removeFromCart(name);
                } else {
                    updateCartUI();
                }
            }
        }

        function updateCartUI() {
            const container = document.getElementById('cart-items');
            const totalEl = document.getElementById('cart-total');
            const badge = document.getElementById('cart-badge');
            const checkoutBtn = document.getElementById('checkout-btn');

            if (cart.length === 0) {
                container.innerHTML = '<p class="text-black/40 text-center py-12 text-sm">Your cart is empty.</p>';
                totalEl.textContent = 'Rp 0';
                badge.classList.remove('scale-100');
                badge.classList.add('scale-0');
                badge.textContent = '0';
                checkoutBtn.disabled = true;
                return;
            }

            // Update badge
            const totalItems = cart.reduce((acc, item) => acc + item.quantity, 0);
            badge.textContent = totalItems;
            badge.classList.remove('scale-0');
            badge.classList.add('scale-100');
            checkoutBtn.disabled = false;

            // Render items
            let total = 0;
            let html = '';
            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;
                html += `
                    <div class="flex items-center justify-between gap-4 p-3 bg-neutral-50 border border-black/5 rounded-lg">
                        <img src="${item.image}" alt="${item.name}" class="w-12 h-12 rounded object-cover bg-black/5 shrink-0">
                        <div class="flex-grow min-w-0">
                            <h4 class="text-xs font-semibold text-black truncate">${item.name}</h4>
                            <p class="text-[10px] text-brandGreen-500 mt-0.5">Rp ${item.price.toLocaleString('id-ID')}</p>
                        </div>
                        <div class="flex flex-col items-end gap-2 shrink-0">
                            <div class="flex items-center gap-2 border border-black/10 rounded px-1.5 py-0.5 bg-white">
                                <button onclick="changeQuantity('${item.name}', -1)" class="text-black/60 hover:text-black text-xs">-</button>
                                <span class="text-xs text-black min-w-[12px] text-center">${item.quantity}</span>
                                <button onclick="changeQuantity('${item.name}', 1)" class="text-black/60 hover:text-black text-xs">+</button>
                            </div>
                            <span class="text-xs font-bold text-black">Rp ${itemTotal.toLocaleString('id-ID')}</span>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
            totalEl.textContent = `Rp ${total.toLocaleString('id-ID')}`;
        }

        function openCheckoutModal() {
            // Calculate total
            const subtotal = cart.reduce((acc, item) => acc + (item.price * item.quantity), 0);
            
            document.getElementById('modal-subtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
            document.getElementById('modal-total').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;

            // Close cart drawer
            toggleCart();

            // Open modal
            const modal = document.getElementById('checkout-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
                modal.querySelector('.transform').classList.remove('scale-95');
                modal.querySelector('.transform').classList.add('scale-100');
            }, 10);
        }

        function closeCheckoutModal() {
            const modal = document.getElementById('checkout-modal');
            modal.classList.add('opacity-0');
            modal.classList.remove('opacity-100');
            modal.querySelector('.transform').classList.add('scale-95');
            modal.querySelector('.transform').classList.remove('scale-100');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        function goToCheckout() {
            if (cart.length > 0) {
                localStorage.setItem('bottlemart_cart', JSON.stringify(cart));
                window.location.href = '/checkout';
            }
        }
    </script>
</body>
</html>
