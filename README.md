# E-Commerce API

A scalable RESTful API built with Laravel 13 using Clean Architecture (Controller → Service → Model) for modern e-commerce platforms.

## 🚀 Overview

This project is a production-ready e-commerce backend built with best practices and clean architecture principles. It emphasizes scalability, maintainability, and testability.

### User Flow
- User registers and logs in with token-based authentication
- User manages their account and profile
- User browses products organized by categories
- User adds products to their shopping cart
- User creates orders from cart items
- System processes payments via Stripe integration
- User can track their orders and order history

## 🧰 Tech Stack

- **Laravel 13** - Web framework
- **PHP 8.3+** - Server language
- **MySQL** - Database
- **Laravel Sanctum** - Token-based API authentication
- **Stripe PHP SDK v20.0** - Payment processing
- **Spatie Permission** - Role-based permissions
- **Pest 4.4** - Testing framework
- **Vite** - Frontend build tool
- **Tailwind CSS 4.0** - Styling
- **Axios** - HTTP client

## ✨ Key Features

- User registration and authentication with Sanctum tokens
- Role-based access control with authorization policies
- Product catalog with category hierarchy
- Shopping cart with real-time inventory validation
- Order management with status tracking
- Secure Stripe payment integration with webhooks
- Database transactions for data consistency
- Clean & testable layered architecture
- Rate limiting (60 requests/minute)
- RESTful API endpoints with proper error handling

## 📐 Project Architecture

This project follows a clean layered architecture:

```
Controller → Service → Model
```

### Layer Responsibilities

- **Controller** - Handles HTTP requests & responses, request validation, delegates business logic to services
- **Service** - Contains core business logic, manages transactions, handles complex operations
- **Model** - Represents database entities with relationships (Eloquent ORM)

### Additional Components

- **Policies** - Authorization rules for resource protection
- **Requests** - Form request validation classes
- **Resources** - API response transformers
- **HttpResponse** - Standardized response trait

## 📂 Folder Structure

```
app/
├── Http/
│   ├── Controllers/          # Request handlers
│   │   ├── AuthenticationController.php
│   │   ├── ProductController.php
│   │   ├── CategoryController.php
│   │   ├── CartController.php
│   │   ├── OrderController.php
│   │   ├── UserController.php
│   │   └── PaymentController.php
│   ├── Requests/             # Form request validation
│   └── Resources/            # API response transformers
├── Services/                 # Business logic layer
│   ├── CartServices.php
│   └── OrderServices.php
├── Models/                   # Eloquent ORM models
│   ├── User.php
│   ├── Product.php
│   ├── Category.php
│   ├── Cart.php
│   ├── CartItem.php
│   ├── Order.php
│   └── OrderItem.php
├── Policies/                 # Authorization policies
│   ├── ProductPolicy.php
│   ├── CartPolicy.php
│   ├── OrderPolicy.php
│   └── UserPolicy.php
├── HttpResponse.php          # Standardized response trait
└── Providers/                # Service providers
```

## 🔌 API Documentation
Postman Doc URL : https://documenter.getpostman.com/view/47220640/2sBXqFPNij
**Base URL**: `/api/v1`

All endpoints use the `/api/v1` prefix and are rate-limited to **60 requests per minute**.

### Authentication

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| POST | `/register` | Register new user | ❌ |
| POST | `/login` | User login | ❌ |
| POST | `/logout` | User logout | ✅ |

### Users

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/users` | List all users | ✅ |
| GET | `/users/{id}` | Get user details | ✅ |
| PUT | `/users/{id}` | Update user | ✅ |
| DELETE | `/users/{id}` | Delete user | ✅ |
| GET | `/users/{user}/products` | Get user's products | ✅ |
| GET | `/users/{user}/orders` | Get user's orders | ✅ |
| GET | `/users/{user}/cart` | Get user's cart | ✅ |

### Products

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/products` | List all products (paginated) | ✅ |
| POST | `/products` | Create product | ✅ |
| GET | `/products/{id}` | Get product details | ✅ |
| PATCH | `/products/{id}` | Update product | ✅ |
| DELETE | `/products/{id}` | Delete product | ✅ |
| GET | `/products/{product}/category` | Get product categories | ✅ |

### Categories

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/categories` | List all categories | ✅ |
| POST | `/categories` | Create category | ✅ |
| GET | `/categories/{id}` | Get category | ✅ |
| PUT | `/categories/{id}` | Update category | ✅ |
| DELETE | `/categories/{id}` | Delete category | ✅ |
| GET | `/categories/{id}/products` | Get products in category | ✅ |

### Cart

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| GET | `/carts` | List carts | ✅ |
| GET | `/carts/activeCart` | Get user's active cart | ✅ |
| POST | `/carts/addProduct` | Add product to cart | ✅ |
| PATCH | `/carts` | Update cart items | ✅ |
| DELETE | `/carts/deleteProduct/{product_id}` | Remove product from cart | ✅ |
| DELETE | `/carts` | Clear entire cart | ✅ |

### Orders

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| POST | `/orders` | Create order | ✅ |
| GET | `/orders` | List orders | ✅ |

### Payments

| Method | Endpoint | Description | Auth |
|--------|----------|-------------|------|
| POST | `/webhook` | Stripe webhook handler | ❌ |

## ⚙️ Installation & Setup

### Prerequisites

- PHP 8.3 or higher
- Composer
- MySQL 8.0+
- Node.js 16+
- Stripe Account (for payments)

### Quick Start

```bash
git clone https://github.com/yourusername/ecommerce-api.git
cd ecommerce-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

Or use the automated setup script:

```bash
composer run setup
```

## 🔐 Environment Variables

Configure these in your `.env` file:

```env
APP_NAME=EcommerceAPI
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce_api_project
DB_USERNAME=root
DB_PASSWORD=

STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...
```

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run with coverage
php artisan test --coverage

# Run specific test
php artisan test tests/Feature/AuthenticationTest.php
```

## 📌 Notes

- This project follows clean architecture principles for scalability
- All business logic is centralized in Service layer
- Database transactions ensure data consistency
- Authorization policies protect resources
- API responses follow a standardized format

## 📬 Contact

- **Author**: Your Name
- **Email**: your.email@example.com
- **GitHub**: [Your GitHub Profile](https://github.com)
- **LinkedIn**: [Your LinkedIn Profile](https://linkedin.com)

