# Takakori

A self-hosted personal finance app.

## Requirements

- PHP 8.1+
- Laravel v10.0+
- Laravel Livewire v3.0+
- Composer

If you don't have php installed in your computer, download it from [php.new](https://php.new/)

## Installation

Run the following commands in your terminal to clone the repository-

```bash
git clone git@github.com:milon/takakori.git takakori
```

Then go to the directory and run the install command-

```bash
cd takakori
./install.sh
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
