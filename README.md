# Laravel Blade Templates Lab (Lab 8)

## Overview

This lab introduces students to **Blade Templates in Laravel**, focusing on creating **dynamic, reusable, and efficient views**. Instead of using a database, data will be mocked using associative arrays within controllers. The goal is to practice **layouts, components, Blade directives, and controller integration** while following Laravel’s best practices.

## Learning Objectives

By completing this lab, students will:

- Understand the role of **Blade templates** in Laravel’s **MVC framework**.
- Create and manage Blade templates using **layout inheritance**.
- Utilize Blade directives like `@if`, `@foreach`, `@include`, and `@yield`.
- Develop **reusable Blade components** and pass dynamic data.
- Integrate Blade templates with **Laravel controllers** using mocked data.
- Apply **best practices** for clean, maintainable, and secure Blade templates.

## Project Setup & Requirements

### 1️⃣ Setup Laravel Project

#### Install Laravel using Composer:

```sh
composer create-project --prefer-dist laravel/laravel BladeLab
```

#### Navigate to the Project Directory:

```sh
cd BladeLab
```

#### Run Laravel Development Server:

```sh
php artisan serve
```

### 2️⃣ Create Blade Layout and Views

#### **Master Layout (app.blade.php)**

Create `resources/views/layouts/app.blade.php`:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.nav')
    <main class="container mt-4">
        @yield('content')
    </main>
    <footer class="text-center py-3">&copy; 2025 Laravel Blade Lab</footer>
</body>
</html>
```

#### **Create Home and About Views**

Create `resources/views/home.blade.php`:

```blade
@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <h1>Welcome to the Home Page</h1>
    @forelse($products as $product)
        <p>{{ $product['name'] }} - ${{ $product['price'] }}</p>
    @empty
        <x-alert type="danger" message="No Products Found."/>
    @endforelse
@endsection
```

Create `resources/views/about.blade.php`:

```blade
@extends('layouts.app')
@section('title', 'About')
@section('content')
    <h1>About Us</h1>
    <p>This is a simple Laravel Blade lab.</p>
@endsection
```

### 3️⃣ Implement Blade Directives

#### **Create a Navigation Partial**

Create `resources/views/partials/nav.blade.php`:

```blade
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">BladeLab</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
            </ul>
        </div>
    </div>
</nav>
```

### 4️⃣ Create Blade Components

#### **Create an Alert Component**

Create `resources/views/components/alert.blade.php`:

```blade
<div class="alert alert-{{ $type }}">
    {{ $message }}
</div>
```

#### **Create a Button Component**

Create `resources/views/components/button.blade.php`:

```blade
<a href="{{ $url }}" class="btn btn-{{ $type }}">
    {{ $text }}
</a>
```

#### **Use the Components**

```blade
<x-button type="primary" text="Go Home" url="/"/>
```

### 5️⃣ Integrate Blade with Controllers

#### **Create a Controller**

```sh
php artisan make:controller PageController
```

#### \*\*Define Methods and Mock Data in \*\*\`\`

```php
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PageController extends Controller {
    public function home() {
        $products = [
            ['id' => 1, 'name' => 'Product A', 'price' => 100],
            ['id' => 2, 'name' => 'Product B', 'price' => 150],
        ];
        return view('home', compact('products'));
    }
    public function about() {
        return view('about');
    }
}
```

#### \*\*Define Routes in \*\*\`\`

```php
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);
```

### 6️⃣ Testing & Validation

- Start the server: `php artisan serve`
- Visit `/` and `/about` in the browser.
- Ensure data is displayed correctly.
- Verify Blade components are rendering.

---

## **Submission Guidelines**

### **GitHub Repository**

- Create a **private GitHub repository** for this lab.
- Organize project files **according to Laravel’s conventions**.

### **README File**

Include:
- **Description of Blade components** used.
- **Screenshots of the views and components**.

## Home Template without Products

<img width="1512" alt="Screenshot 2025-03-15 at 1 49 24 PM" src="https://github.com/user-attachments/assets/b428ed61-ce5d-4a09-97f1-61188d994871" />

## Home Template with Prosucts 
<img width="1512" alt="Screenshot 2025-03-15 at 1 50 57 PM" src="https://github.com/user-attachments/assets/eaba979f-844d-4c81-9c6d-d42bb65015bf" />

## About Page
<img width="1512" alt="Screenshot 2025-03-15 at 1 52 00 PM" src="https://github.com/user-attachments/assets/f14c9f0d-d2fc-48c6-8cf0-85121dc30144" />


---

## **Evaluation Criteria**

| Criteria                                              | Marks   |
| ----------------------------------------------------- | ------- |
| Proper Laravel project setup and configuration        | 10      |
| Accurate creation of Blade layouts and views          | 20      |
| Effective usage of Blade directives                   | 20      |
| Creation and integration of reusable components       | 20      |
| Proper integration with controllers using mocked data | 15      |
| Code quality, structure, and best practices           | 10      |
| Documentation and adherence to submission guidelines  | 5       |
| **Total Marks**                                       | **100** |

---

## **Additional Notes**

- Follow **Laravel's best practices** for file structure and naming.
- Ensure **clean and readable** Blade templates.
- Use **comments** in Blade files to explain complex logic.
- **Maintain academic integrity** (plagiarism will result in disqualification).

