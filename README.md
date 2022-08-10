## About Project
```bash
This is a Employee Management app to manage Employee data.
It is developed in Laravel and livewire using Daisy ui and tailwind css.
```
## Version Details
-php: 7.3|^8.0
-Laravel: 9.0

## Installation Steps

- Make sure your setup is pointed to `/public` directory
- `git clone git@github.com:kishanrank/employee_management.git`
- Copy `.env.example` to `.env` then set your database connection and SMTP details in `.env` file
- Run `composer install` command
- Run `php artisan key:generate` commands
- Run `php artisan migrate --seed` command OR import test database from `employee_management.sql` file
- Delete `public/storage` folder and run `php artisan storage:link`
- Run `npm install` command
- Run `npx tailwindcss init` command
- Run `npm run dev` command
- Run `npm run watch` command
- Run `php artisan serve` command


## Credentials
- Login Page : http://127.0.0.1:8000/login

-Admin Credentials :
    Email : admin@admin.com
    Password : password