# RML++

RML++ is a web-based calibration management system for RML DOST IV-A. It is built on CodeIgniter 4 and manages calibration worksheets, standards, certificates, users, customers, and generated PDF reports.

## Features

- Administrator and guest-user authentication with role-protected routes.
- User, guest, customer, personnel, and application-default management.
- Calibration records and worksheets for electrical meters, electronic balances, weighing scales, test weights, pressure gauges, thermometers, thermo-hygrometers, temperature controllers, enclosures, digital timers, pH meters, refractometers, calipers, and glassware.
- Standard values, test points, drift data, MPE/PAB data, sensitivity tests, and supporting reference records.
- Verification and correction workflows for calibration records.
- Certificate and report previews plus PDF generation through Dompdf.
- Dashboard notifications and pending-record views.

## Requirements

- PHP 7.3 or newer (PHP 8.x is also supported by `composer.json`).
- Composer.
- MySQL or MariaDB with the PHP `mysqli` extension.
- PHP extensions: `curl`, `intl`, `json`, and `mbstring`.
- A web server configured with `public/` as its document root, or PHP's built-in development server.

## Installation

1. Install the PHP dependencies:

   ```sh
   composer install
   ```

2. Create a local environment file from the supplied template:

   ```sh
   cp env .env
   ```

   On Windows PowerShell, use `Copy-Item env .env` instead.

3. Edit `.env` and configure the application URL and database connection. The default configuration in `app/Config/Database.php` expects:

   ```ini
   database.default.hostname = localhost
   database.default.database = rml
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   ```

   Set credentials appropriate for the environment. Do not commit `.env` or production credentials.

4. Provision the database schema and required reference data. This repository does not currently include application migrations or a database dump, so the compatible `rml` schema must be obtained from the project deployment or database administrator.

5. Ensure `writable/` and its subdirectories are writable by the PHP process. They are used for cache, logs, sessions, and uploads.

## Running locally

From the project root, start CodeIgniter's development server:

```sh
php spark serve
```

Open the URL printed by the command, usually `http://localhost:8080`. The application front controller is `public/index.php`; when using Apache or Nginx, point the virtual host document root to `public/` rather than the repository root.

The primary routes are:

- `/` — guest login.
- `/adminLogin` — administrator login.
- `/dashboard` — authenticated user dashboard.
- `/guestDashboard` — authenticated guest dashboard.

Most application routes require the `auth` filter. Login routes use the `noauth` filter.

## Running with Docker

### Prerequisites

- Install and start Docker Desktop (or Docker Engine with the Compose plugin).
- Make sure Docker is running and verify it with `docker version`.
- Obtain a compatible `rml` database schema and reference-data dump. The current repository does not include migrations or an initialized database.

### Start the application

Run these commands from the project root:

```sh
docker compose up --build
```

The first build installs the PHP dependencies and required extensions. Compose then starts the application container and a MySQL 8.0 database. Open `http://localhost:8080` when both services are running. The application container serves `public/` through Apache.

To run in the background:

```sh
docker compose up --build -d
docker compose ps
```

View application logs with:

```sh
docker compose logs -f app
```

### Import the database

The database starts empty. If a compatible SQL dump is available at `path/to/schema.sql`, copy and import it after the database becomes healthy:

```sh
docker compose cp path/to/schema.sql db:/tmp/schema.sql
docker compose exec db sh -c 'mysql -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" < /tmp/schema.sql'
```

On Windows PowerShell, replace `path/to/schema.sql` with the actual dump path, for example `.database\rml.sql`.

After importing the database, visit `/`, `/adminLogin`, or `/dashboard` according to the account type available in the imported data.

### Stop and reset

Stop the containers while keeping database data and uploads:

```sh
docker compose down
```

To remove the containers and all Compose-managed data, including the database and uploads:

```sh
docker compose down -v
```

The sample database credentials in `docker-compose.yml` are intended for local development only. Change them before using the stack outside a local environment, and update both the MySQL and application settings together.

## Testing

Run the PHPUnit suite with:

```sh
composer test
```

The PHPUnit configuration uses the testing database group, configured for SQLite in `app/Config/Database.php`. Keep test data separate from development or production data.

## Project structure

| Path | Purpose |
| --- | --- |
| `app/Config` | Application, database, filter, and route configuration |
| `app/Controllers` | HTTP controllers and calibration workflows |
| `app/Models` | Database models for users, customers, worksheets, standards, and certificates |
| `app/Views` | HTML views, worksheets, dashboards, and certificate layouts |
| `public` | Front controller and public CSS, JavaScript, images, and uploads |
| `system` | CodeIgniter framework source |
| `writable` | Runtime cache, logs, sessions, and uploaded files |
| `spark` | CodeIgniter command-line utility |

## Deployment notes

- Serve only the `public/` directory.
- Set `CI_ENVIRONMENT` to `production` in `.env` for production deployments.
- Use a dedicated database user with only the permissions required by the application.
- Back up the database and `writable/uploads/` according to the deployment's retention policy.
- Keep debug output, development credentials, and `.env` out of version control.

## License

This project is released under the MIT License. See [LICENSE](LICENSE) for details.
