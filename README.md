 Cake Bliss — Sweetness of Your Happiness

Cake Bliss is a web-based cake shop application built with **Laravel**, offering a modern and clean frontend for customers and a secure admin panel to manage categories, cakes, orders, and more. The project also includes **REST APIs** for admin operations using Sanctum authentication.
Table of Contents
Project Overview
Features
Tech stack
Installation & Setup
Environment Configuration
Database Setup
Running the Project
API Authentication
API Endpoints
Folder Structure
Usage Guide
Contribution / Notes

 1. Project Overview

Cake Bliss is an online cake store where users can explore cakes, check details, place orders, and search products.
Administrators can log into the admin dashboard to manage:

 Categories
 Cakes
 Orders
 Users
 API access

The project supports Web + API structure, both cleanly separated.

2.Features

Customer Features (Frontend)

 View cakes by category
 View cake details
 Search cakes
 Add to cart & checkout
 Order confirmation page

 Admin Features

 Login & logout
 Manage categories (CRUD)
 Manage cakes (CRUD)
 Manage orders
 API control via Laravel Sanctum

 API Features

Token-based authentication
Separate API controllers
JSON-based CRUD responses

3. Tech Stack

| Layer           | Technology       |
| --------------- | ---------------- |
| Backend         | Laravel 10+      |
| Frontend        | Blade, Bootstrap |
| Authentication  | Laravel   |
| Database        | MySQL            |
| Version Control | Git + GitHub     |


4.Installation & Setup

Clone the project


git clone https://github.com/your-repo/cake-bliss.git
cd cake-bliss


 Install dependencies


composer install
npm install
npm run build

5. Environment Configuration

1. Duplicate .env.example
2. Rename to .env
3. Update database values:
4. DB_DATABASE=cake_bliss
   DB_USERNAME=root
   DB_PASSWORD=
    5. Generate app key
php artisan key:generate

6. Database Setup

Run migrations:

php artisan migrate


7. Running the Project

Start Laravel server:

php artisan serve


 Frontend → `http://localhost:8000`
 Admin → `http://localhost:8000/admin/login`

8. API Authentication (Sanctum)
 Why Sanctum?

Sanctum provides:

 Secure API tokens
 Admin-only access
 No session required
 Works perfectly with SPA / Postman

 Install Sanctum (already done if included)


composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate


9. API Endpoints

 Authentication

| Method | Endpoint             | Description                |
| ------ | -------------------- | -------------------------- |
| POST   | `/api/admin/login`   | Admin login, returns token |
| GET    | `/api/admin/me` | Get admin details          |


Cake APIs

| Method | Endpoint          | Description    |
| ------ | ----------------- | -------------- |
| GET    | `/api/cakes`      | List all cakes |
| POST   | `/api/cakes`      | Create cake    |




10. Folder Structure


app/
 ├── Http/
 │    ├── Controllers/
 │    │     ├── Admin/        → Admin web controllers
 │    │     ├── Api/          → API controllers
 │    │     └── Frontend/     → Public website controllers
 ├── Models/
resources/
 ├── views/
 ├── js/
 ├── css/
routes/
 ├── web.php
 ├── api.php


11. Usage Guide

Admin Login

* Go to: `/admin/login`
* Enter admin credentials (you can seed a default admin)

Manage Categories

* Admin Panel → Categories
* Add, Edit, Delete

Manage Cakes

* Admin Panel → Cakes
* Upload image
* Assign category

Search Function (Frontend)

* Search bar → type “vanilla”, “chocolate”, etc.

Placing Order

Add to cart → Checkout → Confirm Order

12. Notes / Contributing

 Follow Laravel naming conventions
 Keep controllers clean—use Services if project grows
 For frontend API usage, use Axios / Fetch

