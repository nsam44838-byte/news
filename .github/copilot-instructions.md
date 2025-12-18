## Purpose
Give AI coding agents immediate, actionable context for working in this Laravel-based news site.

## Big picture
- Framework: Laravel (app follows MVC). Entry points: `routes/web.php`, `routes/api.php`.
- Controllers: `app/Http/Controllers` handle requests; validation uses `app/Http/Requests`.
- Models: non-standard location: `app/Http/Models` (examples: `News.php`, `Post.php`, `Category.php`, `Slide.php`, `Settings.php`, `User.php`). Treat these as Eloquent models.
- Views: Blade templates live under `resources/views`.
- Database: migrations in `database/migrations`; seeders in `database/seeders`.
- Assets: Vite-managed front-end; built assets appear in `public/build/assets`.

## Key conventions & patterns (project-specific)
- Models live in `app/Http/Models` instead of the default `app/Models` — always import from that path.
- Soft deletes are used (search for migrations adding `deleted_at`). When adding soft-delete behavior, check existing migration patterns.
- Controllers frequently return Blade views, not JSON, unless in `routes/api.php`.
- Request validation uses dedicated `FormRequest` classes under `app/Http/Requests`.

## Developer workflows (discoverable commands)
- Install PHP deps: `composer install`
- Install JS deps + dev server: `npm install` then `npm run dev` (Vite).
- Build production assets: `npm run build`.
- Environment setup: copy `.env.example` → `.env`, then `php artisan key:generate`.
- Run migrations: `php artisan migrate` (DB connection configured via `.env`).
- Run tests: this project uses Pest/PHPUnit: `./vendor/bin/pest` or `php artisan test`.
- Serve locally: `php artisan serve` (Windows: run from PowerShell/Terminal).

## Integration points & external dependencies
- Backend: Laravel + many vendor packages (see `composer.json`).
- Frontend/build: Vite + npm (see `package.json`, `vite.config.js`).
- Storage: images under `public/images` and `public/storage`; check if `php artisan storage:link` is needed in your environment.

## Files to inspect when implementing features
- Authorization or app-level bindings: `app/Providers/AppServiceProvider.php`.
- Routing and middleware: `routes/web.php`, `routes/api.php`.
- Data schema examples: `database/migrations/*` (look for `create_*_table.php` files like `create_news_table.php`).
- Example controllers and flow: `app/Http/Controllers` (look for patterns of controller → model → view).
- Blade components: `resources/views` and `resources/views/layouts` (e.g., `layouts/navbar.blade.php`).

## Useful examples to copy/adapt
- When adding a new resource/controller, mirror existing patterns: controller methods named `index`, `show`, `create`, `store`, `edit`, `update`, `destroy` and use `app/Http/Requests` for validation.
- When changing DB schema, add a migration file under `database/migrations` and follow the repository naming/timestamp style already present.

## Known gotchas
- Models are under `app/Http/Models` — forgetting this causes wrong imports.
- On Windows, `php artisan storage:link` may require elevated permissions; verify `public/storage` exists.
- Vite dev server must be run after `npm install` for hot asset reloads; built assets are produced to `public/build`.

## How to behave as an AI assistant here
- Be explicit and conservative: change only the files needed for a task and follow existing naming/location conventions (especially model location).
- Reference the concrete files above when suggesting changes (e.g., modify `routes/web.php` and `app/Http/Controllers/MyController.php`).
- When creating migrations or seeds, follow the timestamped filenames in `database/migrations` and add corresponding seeders in `database/seeders` if required.

If anything here is unclear or you want more examples (controller snippets, common migration patterns, or tests), say which area to expand.
