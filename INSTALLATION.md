# Installation Guide

This project is built with Laravel 12 and requires **PHP 8.2 or higher**.

If your current server only has **PHP 8.1 or lower**, this application will **not install or run correctly** until PHP is upgraded. In that case, you have two choices:

1. Upgrade the server to PHP 8.2+.
2. Deploy the application on a different server that already has PHP 8.2+.

## Requirements

- PHP 8.2 or higher
- Composer 2.x
- Node.js 18+ and npm
- MySQL, MariaDB, or SQLite
- Web server: Apache or Nginx
- PHP extensions commonly required by Laravel:
  - `openssl`
  - `pdo`
  - `mbstring`
  - `tokenizer`
  - `xml`
  - `ctype`
  - `json`
  - `fileinfo`
  - `curl`

## Local Installation

1. Clone or copy the project into your web directory.
2. Open a terminal in the project root.
3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Install frontend dependencies:

   ```bash
   npm install
   ```

5. Create the environment file:

   ```bash
   copy .env.example .env
   ```

6. Generate the application key:

   ```bash
   php artisan key:generate
   ```

7. Configure database settings in `.env`.

8. Run migrations:

   ```bash
   php artisan migrate
   ```

9. Build frontend assets:

   ```bash
   npm run build
   ```

10. Start the app:

   ```bash
   php artisan serve
   ```

## Production Installation

1. Make sure the server is running PHP 8.2 or higher.
2. Point the web root to the `public` directory.
3. Install dependencies:

   ```bash
   composer install --no-dev --optimize-autoloader
   npm install
   npm run build
   ```

4. Copy `.env.example` to `.env` and update production values:

   - `APP_NAME`
   - `APP_ENV=production`
   - `APP_KEY`
   - `APP_DEBUG=false`
   - `APP_URL`
   - Database credentials
   - Mail settings

5. Generate the key if needed:

   ```bash
   php artisan key:generate
   ```

6. Run migrations:

   ```bash
   php artisan migrate --force
   ```

7. Clear and cache configuration:

   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   php artisan view:clear
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

8. Set correct permissions for `storage` and `bootstrap/cache`.
9. Set up the scheduler:

   ```bash
   * * * * * php /path/to/project/artisan schedule:run >> /dev/null 2>&1
   ```

## Quick Setup Shortcut

This repository includes a Composer setup script:

```bash
composer run setup
```

That script will:

- install Composer dependencies
- create `.env` if missing
- generate the app key
- run migrations
- install npm packages
- build frontend assets

## Important Note About PHP Version

If your server cannot be upgraded past PHP 8.1, this project must be moved to a PHP 8.2+ server or downgraded to an older Laravel version that supports PHP 8.1. The current codebase is not compatible with PHP 8.1.

## Troubleshooting PHP Version Mismatch

Sometimes `php -v` and `composer install` show different PHP versions. That means Composer is being executed with a different PHP binary than the one shown in your terminal.

If you see an error like:

```text
Root composer.json requires php ^8.2 but your php version (8.1.x) does not satisfy that requirement
```

check which PHP binary is actually being used:

```bash
which php
which composer
php -v
composer -vvv install
```

On servers with multiple PHP versions, run Composer with the correct PHP binary explicitly. Examples:

```bash
/usr/bin/php8.2 composer install
```

or:

```bash
php8.2 composer install
```

If your hosting panel provides PHP selector tools, make sure both these are set to PHP 8.2 or higher:

- the website runtime
- the command-line PHP version used by Composer and Artisan

If the server only has PHP 8.1 available anywhere, this project will not install successfully until PHP 8.2+ is enabled.
