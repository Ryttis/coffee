## Coffee Shop Bilboard

- in file .env setup database name and FILESYSTEM_DRIVER=public
- composer install
- npm install && npm run dev
- php artisan key:generate
- php artisan migrate
- php artisan storage:link
- php artisan db:seed
- composer test or vendor/bin/phpunit

- Page is landing on bilboard route accessable for gests
- For admin make url like -  http://127.0.0.1:8000/admin
- First login will be done with registration
- After admin registration  Auth::routes(['register' => true]) in web.php can be changed to false
- Images are place in /pictures folder


Good luck



