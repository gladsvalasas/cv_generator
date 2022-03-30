## How to start:

1. composer install
2. npm install
3. copy .env.example .env
3.1 configure ~.env~ file (connection to database)
4. php artisan key:generate
5. php artisan migrate (or php artisan migrate:install)
6. remove _public/storage_ (if exist)
7. php artisan storage:link
8. php artisan serve
9. ???
10. Profit!
