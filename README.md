# Subscription Billing Backend - Laravel API

This backend project is a Subscription Billing System built using Laravel. It handles user subscriptions, payment plans, and transaction management. The core features include:

- User Plan Subscriptions
- Payment Method Handling
- Transaction History Recording
- Automatic Payment Processing (with Cronjob)
- API Endpoints ready for frontend integration

This system is designed for SaaS platforms needing flexible subscription management and invoicing.

## Features

- Subscription CRUD (Create, View, Cancel)
- Transaction recording (success, pending, failed)
- Transaction history API
- Unit tested with PHPUnit
- Cronjob for auto-processing pending payments

## Technologies

- PHP 8.x
- Laravel 10.x
- MySQL
- Sanctum (Authentication)
- PHPUnit (Unit Testing)

## Installation

- **git clone**
- **Once the project is created, navigate to its directory using the cd command:**

```bash
git clone https://github.com/your-username/subscription-billing-backend.git
cd subscription-billing-backend
```

- **Install dependencies**
```bash
composer install
```

- **Copy .env and configure your database**
```bash
cp .env.example .env
php artisan key:generate
```

- **Update database credentials in .env**
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=my_database
DB_USERNAME=my_username
DB_PASSWORD=my_password
```

- **Run migrations**
```bash
php artisan migrate
```

- **Run seeders**
```bash
php artisan db:seed
```

- **Serve the application**
```bash
php artisan serve
```

- **Running Cron Job**
```bash
php artisan schedule:work
```

- **Run all unit tests**
```bash
php artisan test
```
