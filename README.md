# Run application steps
- install dependecies `composer install`
- install tailwind `npm install -D tailwindcss`
- create MySQL database `test`
- create.env file based on .env.example and set `DB_DATABASE = test`
- run migrations: `php artisan migrate`
- generate aplication key `php artisan key:generate`
- run npm `npm run dev`

#Note
- In the basket cart the same product can be added only once
- admin panel url `http://127.0.0.1:8000/admin/dashboards/main`