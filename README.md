# 🚀 Developer Portfolio

Welcome to the source code of my personal **Developer Portfolio**, built with Laravel, Tailwind CSS, and Alpine.js. This project showcases my tech skills, portfolio projects, and provides ways for users and potential clients to get in touch.

## ✨ Features

- Responsive, modern, and techy UI design
- Animated sidebar navigation
- Continuous tech stack carousel
- Contact form with animation and backend handling
- Project portfolio showcase
- Cookie consent banner and privacy policy
- Fully responsive (mobile-first)
- LinkedIn and GitHub integration

## 🛠️ Tech Stack

- **Laravel 12+**
- **Blade Components**
- **Tailwind CSS**
- **Alpine.js**
- **Heroicons & SVG Icons**
- **Mail Configuration (Contact Form)**

## 🧩 Folder Structure

├── app/
│   └── Http/
│       └── Controllers/
│           └── PortfolioController.php
├── resources/
│   └── views/
│       ├── components/
│       │   └── tech-carousel.blade.php
│       ├── layouts/
│       ├── portfolio/
│       │   └── index.blade.php
│       ├── privacy-policy.blade.php
│       ├── welcome.blade.php
├── routes/
│   └── web.php
└── public/
    └── images/


## 📦 Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/portfolio.git
cd portfolio

### 2. Install dependencies

```bash
composer install
npm install && npm run dev

### 3. Configure ENV

```bash
cp .env.example .env
php artisan key:generate


Update .env with your email SMTP credentials for the contact form.

### 4. Run migrations (If needed)

```bash
php artisan migrate


### 5. Serve the app

```bash
php artisan serve

```
Access at: http://localhost:8000