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

## Docker

Alternatively you can run this app with docker. Make sure you have docker and docker-compose installed in your computer. To install the docker dependency run the following command-

```bash
php artisan sail:install
```

Then run the following command to up docker containers with `docker-compose`-

```bash
docker-compose up

# or run it in detached mode
docker-compose up -d
```

And to start or stop the containers, run this-

```bash
# start
docker-compose start

# stop
docker-compose stop
```

To remove the containers, run the following command-

```bash
docker-compose down
```

Then visit http://localhost to visit the site.

> By default the app runs on Port `80`. If the port is used by other services, you can override it by changing the value of `APP_PORT` in `.env` file.

## Author

- [Nuruzzaman Milon](https://milon.im)
