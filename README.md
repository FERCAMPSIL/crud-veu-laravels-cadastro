# vue-laravel-crud

Vue 2.6 + Laravel 6 + Axios CRUD example app


### Installation

1. Clone repo

2. Change to directory

````
cd carros_cadastro
````   

3. Install dependencies

````
composer install
````

4. Copy .env file

```
cp .env.example .env
```

5. Modify `DB_*` value in `.env` with your database config.

6. Generate application key:

````
php artisan key:generate
````

7. Migrate
````
php artisan migrate
````

8. Install Node modules
````
npm install
````

9. Build

````
npm run dev

php artisan serve
````