# Bottlemart

Bottlemart is a premium web platform for curating and distributing high-quality alcoholic beverages, wines, and spirits in Indonesia.

## Features

- **Premium Curated Catalog**: Exquisite, high-definition catalog of wines, whiskeys, and gins.
- **Interactive Shopping Cart**: Custom-built client-side shopping cart with real-time subtotal calculations.
- **Payment Gateway Sandbox Simulator**: Demonstration checkout page simulating payment options (Credit Card, Virtual Account, E-Wallet, QRIS) for payment gateway testing and approval.
- **Compliance Ready**: Built with all regulatory merchant requirements:
  - 21+ age verification warning banner.
  - Complete store policies (Terms of Service, Privacy Policy, Refund Policy).
  - Physical store details, license descriptors, and official support contact information.

## Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js & npm

### Installation

1. Clone the repository and navigate to the project directory:
   ```bash
   cd apps/bottlemart
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install frontend assets and build:
   ```bash
   npm install
   ```

4. Create environment configuration:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Run the development servers:
   ```bash
   # Terminal 1: Vite asset compilation
   npm run dev

   # Terminal 2: PHP local server
   php artisan serve
   ```

## Payment Gateway Compliance Route

The platform provides a dedicated compliance route ready for verification by **Midtrans** / **Xendit** boarding teams:

- URL: `/shop`
- View: `resources/views/shop.blade.php`
