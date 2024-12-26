# Takakori

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/livewire-%234e56a6.svg?style=for-the-badge&logo=livewire&logoColor=white)
![Filament](https://img.shields.io/badge/Filament-FFAA00?style=for-the-badge&logoColor=%23000000)

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

You can also run the following command to do everything at once-
```bash 
composer run dev
```

## Docker

Alternatively you can run this app with docker. Make sure you have docker and docker-compose installed in your computer. We used a tool called [Laravel Sail](https://laravel.com/docs/11.x/sail), which is a wrapper around `docker-compose`. To install the docker dependency run the following command-

```bash
php artisan sail:install
```

> As we would use the `sail` command a lot, it makes sense to have an alias setup for it-
>```bash
>alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
>```

Then run the following command to spin up docker containers-

```bash
./vendor/bin/sail up

# or run it in detached mode
./vendor/bin/sail up -d
```

And to start or stop the containers, run this-

```bash
# start
./vendor/bin/sail start

# stop
./vendor/bin/sail stop
```

To remove the containers, run the following command-

```bash
./vendor/bin/sail down
```

Then visit http://localhost to visit the site.

> By default the app runs on Port `80`. If the port is used by other services, you can override it by changing the value of `APP_PORT` in `.env` file.

## Screenshots

You can see the screenshots [here](/screenshots.md).

## Author

- [Nuruzzaman Milon](https://milon.im)
