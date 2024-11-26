### How to Install
1. Clone the project
2. Go to the project root directory and run `composer install` and `npm install`
3. Create `.env` file and copy content from `.env.example`
4. Run `php artisan key:generate` from terminal
5. Change database information in `.env`
6. Run migrations by executing `php artisan migrate` , Then Run  `php artisan db:seed` to use faker settings in database,
7. Start the project by running `php artisan serve`

### Demo Account
- AdminURL: http://127.0.0.1:8000/admin
- Email: test@example.com
- Password: password


