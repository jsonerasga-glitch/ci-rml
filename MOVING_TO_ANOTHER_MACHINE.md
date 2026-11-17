# Moving RML CMS to another machine

The database travels with the project:

| File | What it holds |
| --- | --- |
| `app/Database/Data/schema.sql` | every table (`CREATE TABLE IF NOT EXISTS`) |
| `app/Database/Data/data.sql` | every row |
| `app/Database/Migrations/2020-01-01-000000_CreateBaseSchema.php` | migration that creates the tables from `schema.sql` |
| `app/Database/Seeds/InitialDataSeeder.php` | loads `data.sql` into an **empty** database |
| `app/Commands/ExportDatabase.php` | `php spark db:export` – regenerates both `.sql` files |

> `data.sql` contains user accounts (password hashes), customer names and
> calibration records. Keep the repository private.

## 1. On the old machine: export the latest data

```bash
php spark db:export
```

Run this right before you copy the project, so the dump is current. Then copy the
folder (or commit and push).

## 2a. On the new machine – with Docker (recommended)

Needs only Docker Desktop.

```bash
docker compose up -d --build
```

Open <http://localhost:8080>. On first start the container waits for MySQL,
runs `php spark migrate` and loads `data.sql`. On later starts it migrates and
**skips** the data (existing data is never overwritten).

Options (set in the shell before `docker compose up`):

| Variable | Default | Use |
| --- | --- | --- |
| `APP_PORT` | `8080` | host port of the web app |
| `APP_BASE_URL` | `http://localhost:8080/` | set to `http://<LAN-IP>:<port>/` if other PCs will open it – links, CSS and QR codes use it |
| `DB_PORT` | `3307` | connect MySQL Workbench to `localhost:3307`, user `rml` / `rml_password` |
| `RML_ENVIRONMENT` | `production` | `development` shows PHP errors and the debug toolbar |

PowerShell example: `$env:APP_BASE_URL="http://192.168.1.50:8080/"; docker compose up -d --build`

Reload the data from scratch (deletes what is in the Docker database):

```bash
docker compose down -v        # -v removes the database volume
docker compose up -d --build
```

## 2b. On the new machine – without Docker (XAMPP, Herd, Laragon …)

Needs PHP 8.x with `mysqli intl mbstring gd zip curl`, MySQL 8 (or MariaDB 10.5+), and Composer.

```bash
composer install
cp env .env                 # then edit .env: app.baseURL and database.default.*
# create an empty database named in .env, e.g. CREATE DATABASE rml;
php spark migrate
php spark db:seed InitialDataSeeder
php spark serve             # or point your web server at /public
```

To overwrite a database that already has data: set `RML_FORCE_SEED=1` in the
environment and run the seeder again.

## Sample / showcase data (optional)

Nine fictitious worksheets (3 per enabled module, at the Pending, For Verification and
For printing stages) plus sample customers and two logins, for demos:

```bash
php spark db:seed SampleShowcaseSeeder                                  # without Docker
docker compose exec app php spark db:seed SampleShowcaseSeeder          # with Docker
```

Logins (admin login page `/adminLogin`, password `Sample@2026`):
`sample.officer@rml.local` and `sample.verifier@rml.local`. Re-running the seeder resets
the sample records; real records are never touched. The data is in
`app/Database/Data/sample_showcase.json`.

Remove the sample data when you are done (real records stay as they are):

```bash
php spark db:seed RemoveSampleShowcaseSeeder
docker compose exec app php spark db:seed RemoveSampleShowcaseSeeder    # with Docker
```

Run `RemoveSampleShowcaseSeeder` before `php spark db:export`, so the samples are not
copied into `data.sql`.

## Notes

- **Table-name case.** The code uses `imageTable` for the table `imagetable`. Windows
  MySQL ignores case. The Docker MySQL is started with `--lower-case-table-names=1`
  to do the same. On a Linux host without Docker, set
  `lower_case_table_names=1` in `my.cnf` **before** the data directory is first created.
- **Uploads** are in `writable/uploads` (git-ignored). Copy that folder by hand if it has files.
  In Docker it is the `uploads` volume.
- **Time zone.** `app/Config/App.php` sets `appTimezone = 'America/Chicago'`;
  you probably want `'Asia/Manila'`.
