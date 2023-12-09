# Backend-Programming-Exam

This project is a project in case business of bookstore. The user can see list of book by filter, top 10 most famous author, and can input rating for the book.

## Table of Contents
- [About](#about)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)

## About
The project will consist of 3 page:
- Page 1 about list of books
- Page 2 about top 10 most famous author
- Page 3 about rating the book

This project also use dummy data
- 100 fakes author
- 300 fakes book category
- 10.000 fakes books
- 50.000 fakes rating

## Getting Started
### Prerequisites
Before you begin, ensure you have met the following requirements:
- Composer
- PHP version 8.1

### Installation
1. Clone project
git clone --branch main https://github.com/miasetya12/Backend-Programming-Exam.git
2. Install Composer 
composer install
2. Copy dan Rename file .env.example
-> copy file .env.example
-> rename menjadi .env
3. Open file .env
-> rename with the database you want to migrate later.
DB_DATABASE= "your database"
4. Generate a new application key for the Laravel
-> php artisan key:generate
5. Refresh the database and seed the database with sample data 
php artisan migrate:refresh --seed
6. Run to see the project
-> php artisan serve