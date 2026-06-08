# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Stack

**Laravel 12** (PHP 8.2+) backend with **Vite 7 + Tailwind CSS 4** frontend. Blade templates for all views. Pest PHP for testing. MySQL database with Eloquent ORM. Spatie packages for media, permissions, and sitemaps. Laravel Socialite for Google OAuth.

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

Three controller groups:
- **Public** (`app/Http/Controllers/`): Home, Search, Report, Comment, Insurance, Post, Newfeed/NewfeedPost/NewfeedPostReport, Socialite, Sitemap
- **Admin** (`app/Http/Controllers/Admin/`): Full CRUD for reports, insurances, posts, comments, banners, users, settings, plus Auth, Dashboard, SearchAnalytics, and Newfeed moderation
- All routes for both groups live in the single `routes/web.php` (no separate admin routes file); the admin group is nested under `Route::prefix('admin')` with a `web` `auth` guard

### Core Domain: Scam Reports

`Report` is the central model. Key status workflow: `pending → approved | rejected` (moderated by admin/moderator). Reports are searched by normalized query terms — phone numbers, bank accounts, Facebook UIDs, UUIDs (slugs), or names. The catch-all route `GET /{slug}` (`scammer.show`, last route in `web.php`) renders an individual report's public page — be careful adding new top-level routes above it, or they'll be shadowed.

### Search Normalization (Critical)

`app/Helpers/StringHelper.php` is the most important file in the app. `detectQueryType()` classifies input and returns `[type, formattedQuery]` where type is one of `bank | phone | facebook | uuid | name`. It also normalizes Vietnamese phone formats (`+84`/`84` → `0` prefix) and extracts Facebook UID/username from profile URLs. `normalizeString()` lowercases/collapses whitespace for name comparisons. `SearchController` uses `REGEXP_REPLACE` on the DB to match phone/bank records regardless of formatting (e.g., `0912345678` matches `84912345678`), and matches `uuid` type directly against the report `slug`.

### Khu Mua Bán (Newfeed Marketplace)

A lightweight, Facebook-group-style marketplace bolted onto the scam-checking site (`/newfeed`). Authenticated users (Google OAuth only — see `SocialiteController`) post listings (`NewfeedPost`) via a JSON API (`/api/newfeed/posts`); other users can report posts (`NewfeedPostReport`) for moderation. `AdminNewfeedController` lets admins view/unhide posts that were auto-hidden after accumulating reports. Authorization for deleting a post goes through a `NewfeedPost` policy (`Auth::user()->cannot('delete', $post)`), not manual ownership checks.

### Models & Relationships

| Model | Key relations |
|-------|--------------|
| `Report` | BelongsTo User (`moderator_id`), HasMany Comment |
| `Comment` | BelongsTo Report |
| `Post` | BelongsTo User (`author_id`) |
| `Insurance` | standalone, has expiry logic (`isActive`/`isExpired`/`isExpiringSoon`) |
| `Banner` | standalone, time-window activation via `scopeActive` |
| `NewfeedPost` | BelongsTo User, HasMany NewfeedPostReport, `scopeVisible` |
| `NewfeedPostReport` | BelongsTo NewfeedPost (`post_id`), BelongsTo User (`reporter_id`) |
| `User` | roles: `admin` / `moderator`; HasMany NewfeedPost; `isAdmin()`/`isModerator()`/`isActive()`; Google OAuth via `google_id` |
| `SearchLog` | append-only (query + IP), `isFound()` |
| `Setting` | key-value app config, `getValue`/`setValue` |

`Report`, `Post`, `Insurance`, `Banner`, and `User` implement `HasMedia` (Spatie MediaLibrary) with synchronous conversions (`thumb`, `optimized`) registered in `registerMediaConversions()`.

`Insurance` and `Post` share a single global slug namespace — `StringHelper::generateGlobalUniqueSlug()` checks both tables before assigning a slug.

### Display Masking

Public-facing report/comment data is masked before display via `StringHelper`: `mask_name()`, `mask_id()` (bank/phone/website, keeps first/last chars), `mask_phone()`, `mask_reporter_name()`. Use these helpers rather than writing new ad-hoc masking — they already encode the project's PII display rules.

### Rate Limiting

IP-based limits enforced directly in controllers (not middleware):
- 3 report submissions per IP per 24h (`ReportController::store`, counts `Report` rows by `ip_address`)
- 5 comments per IP per report per 24h (`CommentController::store`, via `CommentHelper::getCommentRateLimitKey` + cache counter)

Newfeed actions (posting, reporting) require Google authentication instead of IP limits — see `NewfeedPostController`/`NewfeedPostReportController`.

### Caching

Search view/count increments are cached per `(query, IP)` for 24h to prevent inflation (`StatsHelper`). Settings are cached via `ConfigHelper`.

### Admin Auth

Custom `Admin\AuthController` with session-based login — not Laravel Breeze/Jetstream. Guard is the default `web`. Role check helpers on `User`: `isAdmin()`, `isModerator()`, `isActive()`. Public-side authentication (for the Newfeed marketplace) is handled separately by `SocialiteController` via Google OAuth, also on the `web` guard.

### Asset Pipeline

Vite entry: `resources/css/app.css` (Tailwind) + `resources/js/app.js`. `@vite` directive in Blade layouts. No JS framework — plain JS with Axios for async calls (search autocomplete, comment actions, Newfeed JSON API).

## Key Files

- `routes/web.php` — full route map for public and `/admin` prefix group (single file, no separate admin routes file)
- `app/Helpers/StringHelper.php` — search query normalization, slug generation, and PII masking logic
- `app/Http/Controllers/SearchController.php` — core search with caching and logging
- `app/Models/Report.php` — main domain model with scopes and media config
- `composer.json` — all dev/build/test scripts
