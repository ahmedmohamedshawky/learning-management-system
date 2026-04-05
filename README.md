# Learning Management System

Brief project README with setup instructions for local development.

## Prerequisites

- PHP 8.1+ (or the version required by the project)
- Composer
- Node.js & npm (for compiling frontend assets)
- MySQL or another supported database

## Setup Instructions

1. Clone the repository:

```bash
git clone <your-repo-url> learning-management-system
cd learning-management-system
```

2. Install PHP dependencies:

```bash
composer install
```

3. Copy `.env.example` to `.env` and generate the app key:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure the `.env` file with your database and service credentials. At minimum set `DB_*` values and `APP_URL`.

5. Run database migrations (and seeders if needed):

```bash
php artisan migrate --seed
```

6. Install frontend dependencies and build assets:

```bash
npm install
npm run dev    # use `npm run build` for production
```

7. Start the development server:

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

Open your browser at http://127.0.0.1:8000

## Next steps / Common commands

- Run tests:

```bash
./vendor/bin/phpunit
```

- Run queue worker:

```bash
php artisan queue:work
```

## Security / API keys

Store API keys and secrets in the `.env` file. Do not commit `.env` to source control. For production, use your platform's secret management.

Example placeholders in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=

STRIPE_KEY=
STRIPE_SECRET=

GEMINI_API_KEY=AIzaSyCozX  [remove this space]  hyhxzS0mPRyhaWipbzo_BoGyJUl0Y
GEMINI_BASE_URL=https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent

YOUTUBE_API_KEY=AIzaSyCozX  [remove this space]  hyhxzS0mPRyhaWipbzo_BoGyJUl0Y
YOUTUBE_BASE_URL=https://www.googleapis.com/youtube/v3/search


```

## How to run the project

Use one of these common workflows to run the app locally.

- Quick local server (development):

```bash
# ensure dependencies and env are prepared
composer install
cp .env.example .env
php artisan key:generate


# run migrations then start server
php artisan migrate
php artisan serve --host=127.0.0.1 --port=8000
```