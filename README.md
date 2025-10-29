Here’s a complete **README.md** file for your **Laravel Library Management Mini-System** project — clear, professional, and following the structure from the task PDF you uploaded:

---

````markdown
# 📚 Library Management Mini-System

A simple **Library Management Module** built using **Laravel 12** and **PostgreSQL**, implementing authentication, CRUD operations, relationships, reporting, and seeder data.

---

## 🚀 Features

### 🔐 Authentication System
- User Registration (name, email, password)
- Login / Logout functionality
- Access restricted to authenticated users only
- Redirects to dashboard after login (e.g., *“Welcome to Library Management System”*)

---

## 🧩 Entities & Relationships

### Entities:
1. **Authors**
2. **Books**
3. **Borrow Records**

### Relationships:
- **Author → Books:** One Author can have many Books (`hasMany` / `belongsTo`)
- **Book → Borrow Records:** One Book can have many Borrow Records (`hasMany` / `belongsTo`)

---

## ⚙️ CRUD Operations

### 1. 🧑‍💼 Author CRUD
**Fields:**
- id, name, email, birth_date, timestamps

**Features:**
- Create, edit, delete, and list all authors
- Display total number of books (`withCount('books')`)
- Show all books written by an author

---

### 2. 📘 Book CRUD
**Fields:**
- id, title, author_id (FK), published_year, isbn, timestamps

**Features:**
- Create, edit, delete, and list books
- Each book belongs to an author
- Handle deletion of related books when author is deleted (cascade or restrict)
- Show author name in book list

---

### 3. 📖 Borrow Record CRUD
**Fields:**
- id, book_id (FK), borrower_name, borrowed_at, returned_at (nullable), timestamps

**Features:**
- Create new borrow records
- Update record when returned (`returned_at` set)
- List all borrow records with Book Title and Author Name

---

## 📊 Reporting (Using Eloquent ORM Only)

**1. Books Never Borrowed**
```php
Book::whereDoesntHave('borrowRecords')->get();
````

**2. Top 3 Authors by Borrow Count**

```php
Author::withCount('borrowRecords')
      ->orderByDesc('borrow_records_count')
      ->take(3)
      ->get();
```

**3. Currently Borrowed Books**

```php
BorrowRecord::whereNull('returned_at')
    ->with(['book.author'])
    ->get();
```

---

## 🧱 Database Setup

### Migrations

Run all migrations to create necessary tables:

```bash
php artisan migrate
```

### Seeders

Preload data using seeders:

```bash
php artisan db:seed
# or run both migration and seeding
php artisan migrate --seed
```

**Included Seeders:**

* `AuthorSeeder` – creates at least 5 authors
* `BookSeeder` – creates at least 10 books (each linked to an author)
* `BorrowRecordSeeder` – creates at least 5 borrow records (some unreturned)

---

## 🧪 Bonus (Optional Features)

* Form validation (unique email for authors, unique ISBN for books)
* Soft deletes for books
* Search/filter functionality
* Pagination for listings
* Dashboard summary (total authors, total books, total borrowed books)

---

## 🛠️ Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/md-borno/libary-management-crud.git
cd library-management-mini-system
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Create Environment File

```bash
cp .env.example .env
```

### 4. Configure Database

Update `.env` file:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=library_management
DB_USERNAME=postgres
DB_PASSWORD="your password"
```

### 5. Generate Key

```bash
php artisan key:generate
```

### 6. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

### 7. Start Development Server

```bash
php artisan serve
```

---

## 👤 Example Login Credentials

| Email                                         | Password |
| --------------------------------------------- | -------- |
| [admin@example.com](mailto:admin@example.com) | password |
| [user@example.com](mailto:user@example.com)   | password |

*(You can update credentials in the Users table or seeder.)*

---

## 🧠 Explanation Summary

| Concept            | Description                                                       |
| ------------------ | ----------------------------------------------------------------- |
| **Relationships**  | Author → Books (1:N), Book → Borrow Records (1:N)                 |
| **Queries**        | Eloquent ORM only (`withCount`, `whereDoesntHave`, `orderByDesc`) |
| **Reports**        | Books never borrowed, top authors, currently borrowed books       |
| **Access Control** | Auth middleware restricts CRUD access                             |
| **Data Handling**  | Migration + Seeder setup ensures consistent test data             |

---
