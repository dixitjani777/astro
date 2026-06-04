# Project Status (Dynamic + Admin Modules)

Repo path: `d:\xampp\htdocs\astro`  
Checked on: 2026-05-31

## Stack

- Laravel 12 (PHP ^8.2) + Vite (`composer.json`, `package.json`)
- Default DB in `.env.example`: SQLite

## Completion Summary (estimate)

These are code-based estimates (routes/controllers/views/migrations found). Runtime QA is not performed here.

- **Admin module coverage:** ~85–95% (full CRUD + permissions + UI views are present for most modules)
- **Dynamic frontend coverage:** ~65–80% (CMS/blog/horoscope/enquiry flows are dynamic; “orders/booking/payment” are not full transactional modules)

## Dynamic Frontend (implemented)

- **CMS pages**
  - Public pages can render from DB if a published `CmsPage` exists; otherwise fallback Blade views are used (`app/Http/Controllers/Section.php`).
  - Route: `/page/{slug}`.
- **Blog**
  - Listing + detail by slug (`/blogs`, `/readblog/{post:slug}`).
  - Admin manages categories/posts/comments.
- **Horoscope (dynamic)**
  - Daily horoscope stored in DB; auto-fetch on page load if missing and also scheduled daily (`routes/console.php`).
  - CMS overrides for daily/weekly/monthly/yearly pages via `HoroscopeContent`.
  - Admin can edit daily overrides + CMS text.
- **Enquiries**
  - Central enquiry form endpoint: `POST /enquiries` (throttled + honeypot).
  - Stores enquiries, sends admin + client emails (`app/Http/Controllers/EnquiryController.php`).
  - Account area shows enquiry history for logged-in user (`Account::querystatus()` etc).
- **Chatbot → Enquiry**
  - Session-based chatbot collects details and submits as an `Enquiry` (`ChatbotController`).
- **Ads & Offers**
  - Offers + Ad Banners are pulled from DB and injected into views via `AppServiceProvider` (placements like `sidebar`, `home_top`, etc).
- **Home page dynamic sections**
  - Home sliders + home services pulled from DB (`HomeController`).
- **Pandit Services**
  - Services list is DB-driven (`Panditji::services()`).
- **Auto-translate (UI)**
  - Middleware translates HTML text nodes for GET responses (non-admin), caching translations in DB (`AutoTranslateHtml`, `AiTranslation`, OpenAI Responses API config in `config/auto_translate.php`).

## Admin Panel (implemented modules)

Admin routes are under `/admin/*` and are protected by: `auth`, `admin`, `admin.log`, plus per-route permission keys like `perm:admin.blog`.

- Auth: `/admin/login` (`Admin\\AuthController`)
- Dashboard: `admin.dashboard`
- Enquiries + replies + bulk delete
- Email Inbox (Microsoft Graph client-credentials integration)
- Users management (CRUD + bulk delete)
- Roles management (CRUD + bulk delete)
- CMS Pages (CRUD + bulk delete)
- Blog: Categories, Posts, Comments
- Offers (CRUD + bulk delete)
- Ad Banners (CRUD + bulk delete)
- Global Settings (CRUD + bulk delete)
- Daily Horoscopes (index/edit/update; supports admin override fields)
- Horoscope Contents (CRUD; CMS text per sign/period)
- Home Services (CRUD)
- Home Sliders (CRUD)
- Pandit Services (CRUD)
- SMTP Settings + “test” action (dynamic mail config applied in `AppServiceProvider`)
- Contact Settings
- Activity Logs (index + bulk delete)
- Tools: clear cache

## Auth / Account (frontend)

- Password login (non-admin only): `POST /account/login/password`
- OTP login via email: `GET /account/loginwithotp`, `POST /otp/send`, `POST /otp/verify`
- Password reset: token-based views exist under `resources/views/frontend/account/*`
- Logout: `POST /logout`

## Database (key tables seen in migrations)

- Admin/RBAC: `roles`, `permissions`, `permission_role`, `users.role`
- Content: `cms_pages`, `blog_categories`, `blog_posts`, `blog_comments`
- Horoscope: `daily_horoscopes`, `horoscope_contents`
- UI: `settings`, `offers`, `ad_banners`, `home_services`, `home_sliders`
- Leads/Support: `enquiries`, `enquiry_replies`
- Ops: `activity_logs`
- AI translate cache: `ai_translations`

## Likely Incomplete / Not Implemented Yet (based on missing domain models)

- **Real order/payment system:** no `orders`, `payments`, `transactions` models/migrations found; “orders” page appears to be filtered `enquiries` (`Account::orders()`).
- **Astrologer booking/calls/meet/video calls:** routes/views exist but appear mostly static or enquiry-based (no appointment/calendar/payment models).
- **Inventory/catalog for gemstones/services:** no product/cart/checkout tables found.
- **Admin logout route:** admin login exists; if needed, add a dedicated `/admin/logout`.

## Quick Run Notes

- Install & build: `composer run setup`
- Dev: `composer run dev`
- Migrate: `php artisan migrate`
- Horoscope fetch: `php artisan horoscope:fetch-daily`

