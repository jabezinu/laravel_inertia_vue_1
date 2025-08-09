# Laravel Vue Todo Application

A simple and elegant todo application built with Laravel, Vue.js, Inertia.js, and Tailwind CSS. This project demonstrates modern full-stack development practices with a clean, professional interface.

## Features

- ✅ **Create Todos** - Add new tasks with title and description
- ✅ **Read Todos** - View all todos with completion status
- ✅ **Update Todos** - Edit existing todos inline or mark as complete/incomplete
- ✅ **Delete Todos** - Remove todos with confirmation
- ✅ **Responsive Design** - Works beautifully on all devices
- ✅ **Professional UI** - Clean interface built with Tailwind CSS
- ✅ **Real-time Updates** - Instant feedback using Inertia.js

## Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Vue.js 3 with Composition API
- **Styling**: Tailwind CSS
- **Database**: SQLite (easily configurable)
- **Build Tool**: Vite
- **SPA Experience**: Inertia.js

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd laravel-vue-todo
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=TodoSeeder
   ```

6. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

7. **Start the server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to see the application.

## Usage

### Adding Todos
- Fill in the title (required) and description (optional)
- Click "Add Todo" to create a new task

### Managing Todos
- **Toggle completion**: Click the checkbox next to any todo
- **Edit**: Click the edit icon to modify title, description, or completion status
- **Delete**: Click the delete icon and confirm to remove a todo

### Navigation
- Use the navigation bar to switch between Home and Todos pages
- Clean, intuitive interface with visual feedback

## Project Structure

```
├── app/
│   ├── Http/Controllers/TodoController.php  # CRUD operations
│   └── Models/Todo.php                      # Todo model
├── database/
│   ├── migrations/create_todos_table.php    # Database schema
│   └── seeders/TodoSeeder.php              # Sample data
├── resources/
│   ├── js/
│   │   ├── Components/Navigation.vue        # Navigation component
│   │   └── Pages/
│   │       ├── Home.vue                     # Home page
│   │       └── Todos/
│   │           ├── Index.vue                # Main todos page
│   │           └── TodoItem.vue             # Individual todo component
│   └── css/app.css                          # Tailwind CSS
└── routes/web.php                           # Application routes
```

## Learning Objectives

This project is perfect for learning:

- **Laravel Fundamentals**: Models, Controllers, Migrations, Routing
- **Vue.js 3**: Composition API, Component communication, Reactivity
- **Inertia.js**: SPA experience without API complexity
- **Tailwind CSS**: Utility-first CSS framework
- **Modern Development**: Vite build tool, ES6+ JavaScript

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
