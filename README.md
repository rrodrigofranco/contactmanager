# Contact Manager

A Laravel 10 CRUD web application for managing contacts.

This project was developed as a technical exercise to demonstrate knowledge of Laravel fundamentals, including resource controllers, validation, soft deletes, authentication, and migrations.

---

## Features

- List all contacts (public access)
- Create a new contact
- View contact details (dedicated page)
- Edit existing contacts
- Soft delete contacts
- Unique validation for contact and email
- Authentication required for create, edit, and delete

---

## Technologies

- PHP 8.1
- Laravel 10
- MySQL / SQLite
- Tailwind CSS (Laravel Breeze)
- Blade Templates

---

## 🗄️ Database Structure

Contacts table:

| Field    | Type    | Description |
|----------|---------|------------|
| id       | bigint  | Primary key |
| name     | string  | Minimum 6 characters |
| contact  | string  | 9 digits, unique |
| email    | string  | Valid email, unique |
| deleted_at | timestamp | Soft delete support |
| created_at | timestamp | Created timestamp |
| updated_at | timestamp | Updated timestamp |

---

## Installation

Clone the repository:

```git clone https://github.com/rrodrigofranco/contactmanager.git```

cd contactmanager

### Install dependencies:
```composer install```

### Copy environment file:
```cp .env.example .env```

### Generate application key:
```php artisan key:generate```

### Run migrations:
```php artisan migrate```

### Start development server:
```php artisan serve```

### Access
```http://127.0.0.1:8000```

