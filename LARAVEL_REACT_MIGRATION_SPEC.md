# RML++ Laravel + React Migration Specification

## 1. Purpose

This document is the implementation handoff for rebuilding the existing RML++ calibration-management application as:

- **Backend:** Laravel, PHP, Eloquent, Form Requests, Policies, API Resources, Jobs, and Laravel migrations.
- **Frontend:** React.js with plain JavaScript (`.js`/`.jsx` only). Do not create TypeScript or `.tsx` files.
- **Database:** MySQL or MariaDB in development and production. SQLite may be used for automated tests where feature-compatible.
- **Documents:** PDF certificate/report generation must preserve the current printable layouts and calculation results.
- **Migration strategy:** Preserve the current database records and business behavior first; improve naming and UX only after parity is proven.

The current source application is CodeIgniter 4. Treat the existing controllers, models, views, JavaScript modules, images, and the deployed database schema as the source of truth. The repository does not contain a complete database migration set or database dump, so no field, relationship, enum, or calculation may be invented when the source or live schema can be inspected.

## 2. Non-negotiable requirements

1. Use Laravel conventions for all new code.
2. Use React JavaScript, never TypeScript and never `.tsx`.
3. Do not expose database tables directly to the browser. Use authenticated Laravel endpoints and API Resources.
4. Preserve existing URLs during the transition through compatibility routes or documented redirects.
5. Preserve all existing calculations, rounding, validation, certificate numbering, correction, verification, and PDF behavior.
6. Every write operation must be authorized server-side. Hiding a button is not authorization.
7. Use database transactions for worksheet saves, standard saves, correction/verification, certificate generation metadata, and multi-row updates.
8. Store uploaded files outside the public directory and serve them through authorized download endpoints or signed URLs.
9. Do not use `dangerouslySetInnerHTML` for user data. Sanitize any legacy HTML that must be rendered.
10. Use POST/PATCH/DELETE for mutations. Do not retain destructive GET endpoints.
11. Use Laravel CSRF protection for same-origin web requests and validate request origin/session behavior.
12. Add automated tests before changing a calculation or workflow.

## 3. Existing application inventory

### 3.1 Current stack and runtime

- CodeIgniter 4 application in `app/`.
- Public assets and front controller in `public/`.
- Runtime files, sessions, logs, cache, and uploads in `writable/`.
- MySQL/MariaDB database named `rml` by default.
- PHP dependencies include Dompdf and several legacy JavaScript libraries.
- Existing browser code includes jQuery, Bootstrap, DataTables, Plotly, Chart.js, QRCode, Formula.js, JStat, and custom module scripts.

### 3.2 Existing top-level feature areas

- Administrator login and authenticated dashboard.
- Guest login and guest dashboard.
- User and guest-user administration.
- Customer management.
- Personnel and verifier management.
- About/application information and configurable defaults.
- Verification queue and pending-for-correction queue.
- Calibration worksheets and certificates for:
  - Electrical meters.
  - Electronic balances.
  - Weighing scales.
  - Test weights.
  - Pressure gauges.
  - Digital thermometers.
  - Thermo-hygrometers.
  - Temperature controllers.
  - Enclosures/temperature enclosures.
  - Digital timers.
  - pH meters.
  - Refractometers.
  - Calipers.
  - Glassware/volumetric equipment.
  - Autoclave/temperature-related worksheet layouts where enabled.
- Standards/reference data for balances, barometers, buffer solutions, chambers, documenting-process calibrators, digital timers, gauge blocks, multi-product calibrators, pH meters, pressure gauges, temperature sources, thermo-hygrometers, thermometers, and test weights.
- CMC data management.
- Worksheet previews, print layouts, draft output, and PDF certificates.
- Images, PAB logos, QR codes, charts, formulas, uncertainty, MPE/PAB, sensitivity, drift, and test-point data.

### 3.3 Source mapping

Use this mapping while implementing. The names below are current source names, not the names that must be used for every new Laravel class.

| Current source | Laravel destination | React destination |
| --- | --- | --- |
| `app/Controllers/*` | Controllers, Actions, Form Requests, Policies, Jobs | API client hooks and page components |
| `app/Models/*` | Eloquent models, query objects, domain services | API response types are plain JS object shapes |
| `app/Views/*` | React pages/components; Blade only for app shell/PDF where appropriate | `resources/js/` |
| `app/Config/Routes.php` | `routes/web.php`, `routes/api.php` | React route definitions |
| `public/js/*.js` | React hooks/components or isolated calculation services | `resources/js/` |
| `public/image/*` | `public/images` or Laravel Storage | Asset imports/API URLs |
| `public/dashboardAsset/*` | `resources/css`, `resources/js`, or retained static assets | Layout/theme components |
| `writable/uploads` | private Laravel disk, with migration/import script | Authorized file preview/download |
| Dompdf calls | PDF service and queued PDF job | Preview/download actions |

## 4. Required discovery before coding

Complete these steps and commit the resulting inventory before implementing the replacement.

### 4.1 Database inventory

Obtain a read-only copy of the deployed `rml` database or a schema-only dump. Record:

- Every table, column, SQL type, nullable flag, default, collation, index, unique constraint, and foreign key.
- Existing primary-key names and whether IDs are integers, strings, certificate numbers, or composite keys.
- All tables referenced by `app/Models`, `app/Controllers`, and raw query strings.
- All lookup/reference values and their current spelling/casing.
- Rows that must not be lost during migration, including soft-deleted or archived rows if present.
- Image/file path formats and whether files are stored as paths, blobs, or serialized values.

Generate `docs/data-dictionary.md` from the actual schema. Each table entry must include:

```text
Table:
Purpose:
Primary key:
Foreign keys:
Status fields and allowed values:
Audit fields:
Columns:
  - name, type, nullable, default, validation, UI label, source usage
Indexes and uniqueness:
Migration notes:
```

Do not mark this migration complete until every request field and every rendered field maps to a known database column or an explicitly documented computed value.

### 4.2 Route inventory

Extract every active and commented route from `app/Config/Routes.php`. Classify each route as:

- Authentication.
- Dashboard/notification.
- User/guest/customer/personnel/about/defaults.
- Worksheet list/create/edit/print/delete.
- Standard list/create/edit/delete/detail-value operations.
- Certificate number checking.
- Correction/verification.
- CMC.
- Layout/preview.

For each route record HTTP method, current path, controller method, parameters, session requirements, request fields, response shape, side effects, and replacement Laravel route name. Commented routes are historical or optional behavior; confirm whether they are required before re-enabling them.

### 4.3 Calculation inventory

Read every active custom calculation file under `public/js` and every related PHP controller/model method. Create a calculation catalog with:

- Input fields and units.
- Formula and source file.
- Precision and rounding point.
- Intermediate values.
- Boundary conditions and divide-by-zero behavior.
- Result fields and pass/fail decision.
- Whether the value is display-only or persisted.
- Equivalent JavaScript and PHP test vectors.

Calculations must have one canonical implementation where possible. If the browser needs immediate feedback, implement a JavaScript mirror and verify it against server-side test vectors; the server remains authoritative.

## 5. Target Laravel architecture

### 5.1 Recommended project layout

```text
app/
  Actions/
    Worksheets/
    Standards/
    Certificates/
  Http/
    Controllers/Web/
    Controllers/Api/
    Middleware/
    Requests/
    Resources/
  Jobs/
  Models/
  Policies/
  Services/
    Calibration/
    Certificates/
    Files/
  Support/
database/
  factories/
  migrations/
  seeders/
resources/
  js/
    app.jsx
    router.jsx
    api/
    components/
    layouts/
    pages/
      auth/
      dashboard/
      customers/
      personnel/
      users/
      worksheets/
      standards/
      certificates/
      settings/
    features/
      calibration/
      standards/
    hooks/
    lib/
  css/
routes/
  web.php
  api.php
storage/app/private/
tests/
  Feature/
  Unit/
```

### 5.2 Backend conventions

- Use Laravel authentication, password hashing, sessions, rate limiting, and validation.
- Use explicit route model binding only after confirming key types.
- Use Form Requests for validation and authorization.
- Use Policies for ownership, role, correction, verification, deletion, and certificate access.
- Keep controllers thin: validate, call an Action/service, return a Resource or redirect.
- Use Eloquent relationships where the schema supports them; use query builders for complex reporting queries.
- Use API Resources with stable names and null handling.
- Use enums/value objects only after the current database values are inventoried.
- Use observers/events only for cross-cutting behavior; keep calculation and status transitions explicit.
- Log important status transitions with actor, timestamp, source IP, worksheet/certificate ID, old value, and new value.
- Add `created_by`, `updated_by`, `verified_by`, `corrected_by`, and timestamps only when compatible with the existing schema or through a documented additive migration.

### 5.3 Frontend conventions

- React JavaScript only: `.js` and `.jsx`; no `.ts`, `.tsx`, interfaces, or type annotations.
- Use React Router for page navigation and nested layouts.
- Use a single authenticated app shell with sidebar, top bar, breadcrumbs, notifications, profile, and responsive content area.
- Use reusable components: `DataTable`, `FilterBar`, `FormField`, `SelectField`, `NumberField`, `DateField`, `FileUpload`, `StatusBadge`, `ConfirmDialog`, `Modal`, `Tabs`, `WorksheetSection`, `CalculationTable`, `CertificatePreview`, and `EmptyState`.
- Keep form state local or in a feature hook; invalidate/refetch after mutations.
- Use accessible labels, keyboard navigation, focus management, table headers, error summaries, and visible validation errors.
- Preserve print CSS and printable certificate dimensions. The browser preview and generated PDF must show the same data.
- Never silently discard unsaved worksheet edits. Warn before navigation when dirty.
- Display server validation errors next to fields and preserve entered values after failure.

## 6. Authentication, roles, and authorization

### 6.1 Login flows

Preserve the two current entry points:

- `/adminLogin`: administrator/internal-user login.
- `/`: guest-user login.

Target routes may be `/login` and `/guest/login`, but add compatibility redirects until all integrations are migrated.

Required behavior:

- Login, logout, session regeneration, password reset/change, lockout/rate limit, and inactive-account handling.
- Redirect internal users to the internal dashboard and guest users to the guest dashboard.
- Prevent authenticated users from opening login pages unless logout is intentional.
- Return `401` for unauthenticated API calls and `403` for unauthorized actions.

### 6.2 Roles and permissions

Do not assume the current role values. Extract them from user records and controller checks. At minimum model these capabilities:

- Manage users.
- Manage guest users.
- Manage customers/personnel/verifiers.
- Create and edit worksheets.
- Submit for correction.
- Correct records.
- Verify records.
- Manage standards.
- Manage defaults/about content.
- Generate/download certificates.
- Manage CMC data.
- Delete records.

Use a role/permission matrix in `docs/authorization-matrix.md`. Every API endpoint and page must map to a permission.

## 7. Global UI specification

### 7.1 App shell

- Left sidebar with grouped navigation: Dashboard, Worksheets, Standards, Master Data, Verification, Reports/Certificates, Settings.
- Sidebar items must be permission-aware.
- Top bar: current user, role, notification count, profile, logout.
- Main content: page title, breadcrumb, optional actions, filters, content card, pagination.
- Mobile layout: collapsible sidebar, horizontally scrollable data tables, stacked form sections.
- Preserve existing branding assets from `public/image`, including RML/DOST/PAB logos where applicable.
- Use a consistent color system for draft, pending correction, corrected, verified, rejected, and archived statuses.

### 7.2 List pages

Every list page must provide:

- Search with server-side debounce.
- Filters appropriate to the module: date range, customer, personnel, status, certificate number, instrument/serial number.
- Sortable columns with a whitelist of allowed sort fields.
- Pagination and total count.
- Row actions based on permission and status.
- Loading, empty, error, and retry states.
- Export/print only where current behavior supports it.
- Confirmation dialog for deletion, with reason where required.

### 7.3 Form pages

Every form must provide:

- A clear section heading and description.
- Required/optional indicator.
- Correct HTML input type and unit suffix.
- Client-side format feedback plus authoritative server validation.
- Numeric min/max/step rules from the current behavior/schema.
- Date and time display in the configured application timezone.
- Select options loaded from API/reference data, not hard-coded when database-driven.
- Save, save-and-continue, cancel, and reset behavior as applicable.
- Dirty-state warning.
- Success/error notification after mutation.

### 7.4 Shared worksheet UI

All worksheet types should use a common page frame:

1. Header: worksheet type, certificate number, status, customer, instrument identity.
2. Metadata: customer, received date, calibration date, due date, personnel, verifier, location, environmental conditions.
3. Instrument details: manufacturer, model, serial number, range, resolution, unit, identification/asset number.
4. Standard/reference selection.
5. Test-point or measurement tables with add/edit/remove row controls.
6. Formula/calculation output with units and precision.
7. Result and decision: pass/fail/conformance/correction state.
8. Remarks, placeholders, uploaded images, logos, and supporting files.
9. Workflow actions: save draft, submit for correction, correct, submit for verification, verify, preview, print, download PDF.

The exact fields in each section must be taken from the matching current view/controller/model and data dictionary. Never collapse fields just because two worksheet types look similar.

## 8. Feature-by-feature requirements

### 8.1 Dashboard and notifications

Pages:

- Internal dashboard.
- Guest dashboard.
- Verification queue.
- Pending-for-correction queue.
- Notification panel/list.

Show current counts per enabled worksheet type, pending verification, pending correction, recent records, and actionable notifications. Counts must be permission-scoped and use efficient aggregate queries. Notification actions must link to the correct worksheet and preserve the user’s return location.

### 8.2 User management

Pages:

- User list.
- Create user.
- Edit/profile.
- Change password.
- Deactivate/delete according to existing policy.
- Guest-user list/create/edit.

Fields to preserve from the source schema and forms include identity, username/login, email/contact, role/type, active status, password/confirmation, and audit/status fields. Extract exact field names, uniqueness, and requiredness before writing migrations. Passwords must be hashed with Laravel’s password hasher and never returned by APIs.

### 8.3 Customer management

Pages:

- Customer list/search.
- Create/edit customer.
- Customer detail and related worksheets.
- Delete/deactivate with referential-integrity checks.
- About/application information page if it is stored separately.

Preserve every customer contact, address, organization, accreditation, and certificate-related field found in the current `Customer` controller, `CustomersModel`, and `Customer` views. Related worksheet counts and recent certificates should be visible where currently available.

### 8.4 Personnel and verifiers

Provide list/create/edit/delete or deactivate flows. Preserve names, titles, identifiers, contact information, signature/approval assets, active status, and relationship to worksheets/certificates if present. Verifier selection must be restricted to active authorized personnel.

### 8.5 Defaults and configuration

Migrate the defaults page and its module-specific values. Group settings by module and show the current value, label, unit, effective date, and editable status. Record who changed a default and when. Changing a default must not retroactively alter a finalized certificate unless the current application explicitly does so; document the chosen behavior.

### 8.6 Worksheet modules

Implement each module as a feature using shared components plus module-specific sections. Preserve the current create, edit, preview, print, correction, verification, delete, image, certificate-number, and calculation behavior.

| Module | Current controller/source | UI requirements |
| --- | --- | --- |
| Electrical meter | `ElectController`, `electricalmeterController` | Electrical metadata, test points, graph/calculation data, images, standards, correction/verification, certificate output |
| Electronic balance | `ElectronicBalanceController` | Balance identity, standard values, measurements, images, worksheet/certificate/print |
| Weighing scale | `WeighingScaleController` | Scale identity, weighing results, placeholders, images, PAB/logo, report/certificate |
| Test weight | `TestWeightController` | Weight identity, alloy, standard values, MPE, PAB, sensitivity, measurements, certificate |
| Pressure gauge | `PressureGaugeController` | Gauge identity, pressure units/conversion, standard details/values, customer data, images, certificate |
| Digital thermometer | `DigitalThermometerController` | Instrument/source identity, temperature points, standard values, prior table, images, correction/verification |
| Thermo-hygrometer | `Thermo_HygrometerController`, `ThermoController` | Temperature/humidity points, chamber/reference standard, previous data, images, certificate |
| Temperature controller | `TemperaturecontrollController`, `TempControlController` | Controller/enclosure metadata, temperature observations, result and certificate |
| Enclosure | `EnclosureController` | Enclosure metadata, sensor/location readings, worksheet layout, certificate |
| Digital timer | `DigitalTimerController` | Timer identity, standard values, time measurements, correction/verification |
| pH meter | `PHmeterController`, `standardPHMeterController` | pH readings, buffer standards, measurements, result, certificate |
| Refractometer | `refractometerController` | Refractive-index metadata/readings, standards, result, certificate |
| Caliper | `CaliperController` | Caliper identity, dimensional points/readings, result, certificate |
| Glassware/volumetric | `GlasswareController` | Glassware identity, volume readings, test points, result, certificate |

For each module create a feature checklist from the source files:

- Page/list route.
- Create form and all fields.
- Edit form and all fields.
- Table columns and filters.
- Related standard/reference selectors.
- Dynamic rows and row validation.
- Calculated fields.
- Server actions and endpoints.
- Correction/verification transitions.
- Image/logo/file behavior.
- Print/PDF templates.
- Delete rules.
- Unit, rounding, and certificate-number rules.

### 8.7 Standards and reference data

Create separate Laravel models/resources/pages for the standards that exist in the current application:

- Balance standards.
- Barometer standards.
- Buffer solution standards and values.
- Chamber standards.
- Documenting process calibrator standards and values.
- Digital timer standards and values.
- Gauge blocks, measurements, and uncertainty.
- Multi-product calibrator standards and values.
- pH meter standards.
- Pressure gauge standards and values.
- Temperature source standards.
- Thermo-hygrometer/thermometer standards, test points, drift, and PRT data.
- Test weight standards, details, values, alloy, MPE, PAB, and sensitivity tests.

Use a consistent master-detail UI:

- Standards table with search, type/status filters, pagination, add/edit/delete.
- Standard detail drawer/page.
- Child tables for values, measurements, test points, drift, uncertainty, or related details.
- Inline add/edit with validation and unsaved-row protection.
- Delete confirmation and dependency warning.

All standard child operations must run in transactions and validate parent ownership/type. Avoid generic polymorphic tables unless the existing schema and relationships justify them.

### 8.8 CMC

Preserve the current CMC page and its full-data load/save/update workflow. Use a normalized schema if possible, but provide a compatibility importer/exporter for existing records. Validate units, ranges, uncertainty values, and instrument/category references. The UI must support table editing, row add/remove, validation, save, and reload without losing unsaved rows.

### 8.9 Certificates, reports, and PDF

Implement a single certificate/report service with template-specific renderers. Required capabilities:

- Certificate-number availability check.
- Preview before final download.
- Draft/preview watermark behavior where current behavior requires it.
- Print view and downloadable PDF.
- Correct logo, header, footer, page numbering, signature, QR code, units, formatting, tables, graphs, and remarks.
- Stable finalized output: a finalized certificate should be reproducible from stored data and template/version metadata.
- Authorization checks for preview/download.
- Queue expensive PDF generation and expose job status if generation is not immediate.
- Store generated files privately with retention/cleanup policy.

Do not construct PDF HTML from unescaped request data. Test all certificate templates with long names, many table rows, missing optional images, multiple pages, and non-ASCII characters.

## 9. API contract

Use `/api/v1` for React data operations. Keep web routes for the app shell and browser redirects.

Recommended patterns:

```text
GET    /api/v1/me
GET    /api/v1/dashboard
GET    /api/v1/notifications
POST   /api/v1/notifications/{notification}/read

GET    /api/v1/customers
POST   /api/v1/customers
GET    /api/v1/customers/{customer}
PATCH  /api/v1/customers/{customer}
DELETE /api/v1/customers/{customer}

GET    /api/v1/worksheets/{type}
POST   /api/v1/worksheets/{type}
GET    /api/v1/worksheets/{type}/{worksheet}
PATCH  /api/v1/worksheets/{type}/{worksheet}
DELETE /api/v1/worksheets/{type}/{worksheet}
POST   /api/v1/worksheets/{type}/{worksheet}/submit-correction
POST   /api/v1/worksheets/{type}/{worksheet}/correct
POST   /api/v1/worksheets/{type}/{worksheet}/submit-verification
POST   /api/v1/worksheets/{type}/{worksheet}/verify
GET    /api/v1/worksheets/{type}/{worksheet}/preview
POST   /api/v1/worksheets/{type}/{worksheet}/pdf

GET    /api/v1/standards/{type}
POST   /api/v1/standards/{type}
PATCH  /api/v1/standards/{type}/{standard}
DELETE /api/v1/standards/{type}/{standard}
```

Use a consistent response shape:

```json
{
  "data": {},
  "meta": {"current_page": 1, "last_page": 1, "per_page": 25, "total": 0},
  "message": null
}
```

Validation errors must use Laravel’s standard field-keyed structure. For dynamic rows use stable keys such as `measurements.0.observed_value`. Document all endpoint request/response examples in `docs/api.md`.

## 10. Database migration and data conversion

### 10.1 Migration order

1. Create a full backup and checksum it.
2. Create Laravel migrations that reproduce the current schema without destructive renames.
3. Add missing indexes and foreign keys only after orphan rows are reported and resolved.
4. Add Laravel-specific audit columns additively where required.
5. Seed lookup/reference rows with idempotent seeders.
6. Import users without plaintext passwords; if hashes are compatible, preserve them, otherwise force a reset.
7. Import customers, personnel, standards, worksheets, child rows, files, and finalized certificates.
8. Verify row counts, sums, status counts, foreign-key coverage, file existence, and certificate-number uniqueness.
9. Run dual-read or read-only comparison against the old application for representative records.
10. Cut over writes only after parity sign-off.

### 10.2 Data conversion rules

- Never run `migrate:fresh` against a production database.
- Write an idempotent import command with dry-run mode, batch size, progress, error CSV/JSON, and resume support.
- Preserve original IDs when safe; otherwise maintain an old-to-new ID map.
- Preserve decimal precision; do not cast measurement values to floating-point in a way that changes certificate output.
- Preserve original status and timestamps where available.
- Normalize only with an explicit mapping table and an audit report.
- Do not delete source rows during import.
- Copy private files and verify SHA-256 checksums.
- Keep a migration manifest containing source row counts, imported counts, skipped rows, and reasons.

## 11. Validation and workflow state machine

Use an explicit status model based on observed current values. The likely lifecycle is:

```text
Draft -> Submitted for correction -> Corrected -> Submitted for verification -> Verified
  |             |                    |                 |
  +-------------+--------------------+-----------------+--> Rejected/Needs correction
```

Do not implement this diagram as fact until existing status values and transitions are confirmed. Each transition must define:

- Allowed current statuses.
- Required fields.
- Allowed roles.
- Actor/audit event.
- Notification.
- Whether edits are locked afterward.
- Whether PDF/certificate generation is allowed.
- How reversal or correction is handled.

Use a service such as `WorksheetWorkflowService` and a transition test for every allowed and disallowed transition.

## 12. Testing requirements

### 12.1 Backend tests

- Authentication and session behavior.
- Role/permission/policy tests for every sensitive action.
- Form Request validation tests, including numeric precision and dynamic rows.
- Model relationship and scope tests.
- Worksheet create/edit/delete tests for every module.
- Standards and child-row transaction tests.
- Certificate-number uniqueness/concurrency tests.
- Correction and verification transition tests.
- File upload authorization and MIME/size tests.
- PDF render smoke tests and representative visual comparison.
- Import command dry-run, idempotency, and row-count tests.

### 12.2 Frontend tests

- Login and route guards.
- List search/filter/pagination.
- Form validation and server-error display.
- Dynamic measurement/test-point rows.
- Dirty-form navigation warning.
- Calculation display against known vectors.
- Workflow buttons by status/permission.
- Preview/PDF/download actions.
- Accessibility checks for forms, tables, dialogs, and keyboard use.

### 12.3 Acceptance test matrix

For every worksheet type, test:

1. Create a draft with the minimum valid data.
2. Save and reopen it.
3. Add, edit, and remove every dynamic child row type.
4. Verify calculated values and rounding.
5. Upload and view permitted images/files.
6. Submit for correction, correct, submit for verification, and verify using authorized users.
7. Confirm unauthorized users cannot perform those transitions.
8. Preview and download the certificate.
9. Confirm list filters, search, sorting, and pagination.
10. Confirm delete/deactivate behavior and related-record protection.

## 13. Security and operations

- Use environment variables for database, mail, cache, queue, storage, and application key.
- Set production `APP_DEBUG=false`.
- Use HTTPS, secure cookies, same-site cookies, and trusted proxy configuration.
- Rate-limit authentication, certificate-number checks, uploads, and expensive PDF generation.
- Validate uploads by MIME, extension, size, image dimensions, and content where possible.
- Store files on a private disk; use signed, authorized responses.
- Escape output and sanitize legacy HTML.
- Use allowlisted sort/filter columns to prevent query manipulation.
- Add structured audit logs for authentication, data changes, status changes, downloads, and deletes.
- Configure queue workers, failed-job monitoring, scheduled cleanup, backups, and health checks.
- Keep secrets and `.env` files out of version control.

## 14. Implementation phases

### Phase 0: Discovery and baseline

- Freeze a source commit and database backup.
- Produce route, data dictionary, calculation, asset, and permissions inventories.
- Capture screenshots/PDF samples for every active module.
- Create representative fixture records.

### Phase 1: Laravel foundation

- Create Laravel application with React/Vite in JavaScript mode.
- Configure database, auth, sessions, cache, queue, private storage, logging, and mail.
- Add base layout, API response convention, exception handling, permissions, audit events, and CI checks.

### Phase 2: Master data and auth

- Implement users, guest users, roles/permissions, customers, personnel, verifiers, defaults, and about content.
- Import and validate master data.

### Phase 3: Shared worksheet infrastructure

- Implement worksheet status/workflow service, shared metadata, file handling, dynamic rows, calculation service, certificate numbering, and PDF service.

### Phase 4: Standards

- Implement standards one family at a time with parent/child transactions and migration tests.

### Phase 5: Worksheet modules

- Port one module at a time, starting with the highest-volume or simplest module.
- Complete backend parity, React UI, calculations, print/PDF, and acceptance tests before starting the next module.

### Phase 6: Verification and cutover

- Run old/new comparison reports.
- Perform user acceptance testing.
- Run rehearsal import and rollback rehearsal.
- Enable compatibility redirects.
- Cut over writes during a controlled maintenance window.
- Retain the old system read-only until sign-off and backup verification.

## 15. Definition of done

The conversion is complete only when:

- Every required active route has a Laravel replacement and React page/action.
- Every current database field used by the app is documented and migrated.
- Every enabled worksheet type can be created, edited, corrected, verified, printed, and downloaded as a PDF.
- Existing records and files are imported with a reconciliation report.
- Calculations match approved source test vectors.
- Authorization tests pass for each role and sensitive action.
- No `.tsx` or TypeScript files exist in the frontend.
- No raw legacy view is required for normal application use.
- PDF layouts are visually approved for one-page and multi-page cases.
- Backups, queue workers, scheduled jobs, logs, health checks, and rollback steps are documented.
- Performance is acceptable with production-like record counts.
- Product owners sign off on route parity, data parity, UI parity, calculations, and certificates.

## 16. Instructions to the implementing AI

When using this document to implement the migration:

1. Inspect the current repository and database before creating migrations or guessing fields.
2. Read the relevant current controller, model, view, JavaScript calculation files, and route definitions for the feature being implemented.
3. Update `docs/data-dictionary.md`, `docs/api.md`, and the authorization matrix as discoveries are made.
4. Implement one vertical slice at a time: migration/model, policy/request, API, React page, calculation, PDF, and tests.
5. Keep changes small and runnable. Run focused tests after each slice.
6. Preserve source behavior first; propose UX improvements separately and do not silently change calculations or status transitions.
7. Report unknowns explicitly. If the database schema or an active deployment behavior is unavailable, stop that feature before inventing a field or relationship.
8. Never delete or overwrite the original application or source database during migration.
9. Before declaring completion, run the full acceptance matrix and attach the reconciliation report.

## 17. Initial commands for the new project

Use commands appropriate to the approved Laravel version and local PHP version. The target frontend must remain JavaScript-only.

```sh
composer create-project laravel/laravel rml-laravel
cd rml-laravel
npm install
npm install react react-dom react-router-dom
npm install axios
npm run build
php artisan migrate
php artisan test
```

If using an authentication starter kit, choose its React/JavaScript option and verify that it does not generate TypeScript or `.tsx` files. Configure the database and storage before importing any production data.

