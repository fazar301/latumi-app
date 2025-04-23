# Latumi App

A baby spa application built with Laravel.

## Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL
- Git

## Installation

1. Clone the repository:
```bash
git clone https://github.com/your-username/latumi-app.git
cd latumi-app
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install NPM dependencies:
```bash
npm install
```

4. Create environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=latumi
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Run migrations:
```bash
php artisan migrate
```

8. Start the development server:
```bash
php artisan serve
```

9. In a new terminal, start Vite for frontend assets:
```bash
npm run dev
```

The application should now be running at `http://localhost:8000`

## Features

- Baby spa services
- Online booking system
- Service management
- User authentication
- Admin dashboard

## Contributing

1. Create a new branch for your feature:
```bash
git checkout -b feature/your-feature-name
```

2. Make your changes and commit them:
```bash
git add .
git commit -m "Add your feature description"
```

3. Push to your branch:
```bash
git push origin feature/your-feature-name
```

4. Create a Pull Request on GitHub

## License

This project is licensed under the MIT License.
