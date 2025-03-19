# WB API Integration

## Database Credentials
- Host: sql.freesqldatabase.com
- Port: 3306
- Database: sql12345678
- Username: sql12345678
- Password: aBcDeFgHiJ
- Tables: products, orders, customers

## Setup
1. Clone repo
2. `composer install`
3. Copy `.env.example` ke `.env`
4. Setup credentials di `.env`
5. `php artisan migrate`
6. `php artisan fetch:api-data`
