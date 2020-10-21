## Coffee Shop Bilboard

- composer install
- npm install && npm run dev
- php artisan migrate
- php artisan db:seed
- composer test or vendor/bin/phpunit

- Page is landing on bilboard route accessable for gests
- For admin make url like -  http://127.0.0.1:8000/admin
- First login will be done with registration
- After Auth::routes(['register' => true]); must be changed to false
- Images are place in public/img folder
- Only small images can be uploaded ~ 40K



