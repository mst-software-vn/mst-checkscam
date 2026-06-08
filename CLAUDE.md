# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Stack

**Laravel 12** (PHP 8.2+) backend with **Vite 7 + Tailwind CSS 4** frontend. Blade templates for all views. Pest PHP for testing. MySQL database with Eloquent ORM. Spatie packages for media, permissions, and sitemaps.

## Commands

```bash
# Full dev environment (Laravel server + queue worker + Vite)
composer dev

# Individual
php artisan serve
npm run dev
php artisan queue:listen

# First-time setup
composer setup           # installs deps, generates key, migrates, links storage, seeds

# Tests
composer test            # all tests (Pest)
php artisan test --filter=TestClassName  # single test

# Linting & formatting
composer lint            # php pint --test (check only)
composer format          # php pint + prettier --write (auto-fix)
```

## Architecture

### Request Flow

```
routes/web.php → Http/Controllers/ → Models → resources/views/
```

Two controller groups:
- **Public** (`app/Http/Controllers/`): Home, Search, Report, Comment, Insurance, Post, Sitemap
- **Admin** (`app/Http/Controllers/Admin/`): Full CRUD for all entities, plus Auth, Dashboard, SearchAnalytics

### Core Domain: Scam Reports

`Report` is the central model. Key status workflow: `pending → approved | rejected` (moderated by admin/moderator). Reports are searched by normalized query terms — phone numbers, bank accounts, Facebook UIDs, or names.

### Search Normalization (Critical)

`app/Helpers/StringHelper.php` is the most important file in the app. `detectQueryType()` classifies input as `bank_account | phone | facebook | uuid | name`, then `normalizeString()` strips formatting. The `SearchController` uses `REGEXP_REPLACE` on the DB to match records regardless of formatting (e.g., `0912345678` matches `84912345678`). Facebook URLs are decomposed to UID/username before querying.

### Models & Relationships

| Model | Key relations |
|-------|--------------|
| `Report` | BelongsTo User (moderator), HasMany Comment |
| `Comment` | BelongsTo Report |
| `Post` | BelongsTo User (author) |
| `Insurance` | standalone, has expiry logic |
| `Banner` | standalone, has time-window activation |
| `User` | roles: `admin` / `moderator` |
| `SearchLog` | append-only (query + IP) |
| `Setting` | key-value app config |

All image-bearing models use **Spatie MediaLibrary** with synchronous conversions (`thumb`, `optimized`).

### Rate Limiting

IP-based limits enforced in controllers (not middleware):
- 3 report submissions per IP per 24h
- 5 comments per report per IP per 24h

### Caching

Search view/count increments are cached per `(query, IP)` for 24h to prevent inflation. Settings are cached via `ConfigHelper`.

### Admin Auth

Custom `AuthController` with session-based login — not Laravel Breeze/Jetstream. Guard is the default `web`. Role check helpers: `isAdmin()`, `isModerator()`.

### Asset Pipeline

Vite entry: `resources/css/app.css` (Tailwind) + `resources/js/app.js`. `@vite` directive in Blade layouts. No JS framework — plain JS with Axios for async calls (search autocomplete, comment actions).

## Key Files

- `routes/web.php` — full route map for public and `/admin` prefix group
- `app/Helpers/StringHelper.php` — search query normalization logic
- `app/Http/Controllers/SearchController.php` — core search with caching and logging
- `app/Models/Report.php` — main domain model with scopes and media config
- `composer.json` — all dev/build/test scripts
