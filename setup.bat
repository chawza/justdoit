php artisan db:wipe
php artisan migrate --seed
php artisan storage:link
ECHO "Database has been seeded"
start http://localhost:8000/login
php artisan serve
