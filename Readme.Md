# Laravel Application

A simple Laravel application for managing articles and users. This project allows users to register, login, and interact with content based on their roles.

## Features
- User registration and authentication
- Role-based access (admin vs regular user)
- Create, edit, and view articles
- Sample data for quick testing
- Simple and intuitive interface

## Installation
1. Clone the repository:
   git clone <https://github.com/Oyewolesyl/Backend-Retake-News-Website>
2. Install dependencies:
   composer install
3. Set up the environment:
   cp .env.example .env
   php artisan key:generate
4. Configure your database in `.env`.
5. Run migrations to set up the database:
   php artisan migrate
6. (Optional) Seed the database with sample data:
   php artisan db:seed
7. Start the development server:
   php artisan serve
8. Visit the app in your browser: http://localhost:8000

## Usage
- Register as a new user or login with existing credentials
- Admin users can create and manage articles
- Regular users can view and interact with content

## Project Structure
- app/          # Application logic
- database/     # Migrations and seeders
- routes/       # Web routes
- resources/    # Views and assets
- public/       # Public assets

## Technologies Used
- Laravel – PHP framework
- MySQL – Database
- Blade – Templating engine

## Notes
- The app comes with sample data for easy testing
- Only run migrations or seeds if database structure changes or you want fresh sample data
- Designed for local development and testing
