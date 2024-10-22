# Takakori

A self-hosted personal finance app.

## Requirements

- PHP 8.1+
- Laravel v10.0+
- Laravel Livewire v3.0+

## Installation

Run the following commands in your terminal-

```bash
git clone git@github.com:milon/takakori.git takakori
cd takakori

cp .env.example .env
composer install

php artisan key:generate
php artisan migrate
php artisan storage:link

php artisan filament:clear-cached-components
```

To import dummy data, run the following command-

```bash
php artisan db:seed
```

If you are using bulk import functionality, run the queue worker from the project background using this command-

```bash
php artisan queue:work

# or running it for a single queue
php artisan queue:work --once

# running it in listener mode, adhere any changes in the code without restarting the worker
php artisan queue:listen
```

## Author

- [Nuruzzaman Milon](https://milon.im)
