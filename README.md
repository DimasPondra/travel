# Travel
[Laravel 9](https://laravel.com/docs/9.x) for Portfolio.

## Prerequisite

- [Git](https://git-scm.com/downloads)
- [PHP 8.0](https://www.php.net/downloads.php)
- [Composer 2.x](https://getcomposer.org/download/)
### Main Server
- [MySQL 8.0]

## Run locally

Clone the project

```bash
  git clone https://github.com/DimasPondra/travel.git
```

Go to the project directory

```bash
  cd travel
```

Install dependencies

```bash
  composer install
```

Create configuration file

```bash
  cp .env.example .env
```

Modify `.env` to Configure the following variables

- `DB_HOST` - The hostname or IP address of MySQL server
- `DB_DATABASE` - The database created for the application, default is `laravel`
- `DB_USERNAME` - Username to access the database.
- `DB_PASSWORD` - Password to access the database.


Migrate database and setup (seed) the initial tables

```bash
  php artisan migrate --seed
```

### Main Server

Start the server

```bash
  php artisan serve
```
