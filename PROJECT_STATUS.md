# Project Status (Dynamic + Admin Modules)

Repo path: `d:\xampp\htdocs\astro`  
Checked on: 2026-06-06

## Stack

- Laravel 12 (PHP ^8.2) + Vite (`composer.json`, `package.json`)
- Default DB in `.env.example`: SQLite

## Completion Summary

These are code-based estimates only. Runtime QA is not performed here.

- **Admin module coverage:** ~85-95%
- **Dynamic frontend coverage:** ~65-80%

## Completed

### Dynamic Frontend

- CMS pages can render from the database when a published `CmsPage` exists, with Blade fallback views when needed.
- Blog listing and detail pages work, and the admin can manage categories, posts, and comments.
- Daily horoscope content is stored in the database, auto-fetched when missing, and refreshed by a daily scheduler.
- Horoscope CMS overrides exist for daily, weekly, monthly, and yearly pages.
- The enquiry system is implemented with a central `POST /enquiries` endpoint, throttling, honeypot protection, DB storage, and admin/client email notifications.
- The chatbot can collect user details and submit them as an `Enquiry`.
- Offers and ad banners are pulled from the database and injected into views.
- Home page dynamic sections such as sliders and services are database-driven.
- Pandit services are database-driven.
- Auto-translate middleware is in place for non-admin GET responses, with translation caching in the database.

### Admin Panel

- Admin authentication is implemented at `/admin/login`.
- Admin dashboard exists and is protected by auth, admin, activity logging, and permission middleware.
- Enquiries can be listed, viewed, replied to, and bulk deleted.
- Email inbox integration is implemented with Microsoft Graph client-credentials support.
- Users management is implemented with CRUD and bulk delete.
- Roles management is implemented with CRUD and bulk delete.
- CMS Pages management is implemented with CRUD and bulk delete.
- Blog Categories, Posts, and Comments management is implemented.
- Offers and Ad Banners management is implemented with CRUD and bulk delete.
- Global Settings management is implemented with CRUD and bulk delete.
- Daily Horoscopes editing is implemented.
- Horoscope Contents management is implemented with CRUD.
- Home Services, Home Sliders, and Pandit Services management is implemented.
- SMTP Settings editing and test email support are implemented.
- Contact Settings management is implemented.
- Activity Logs viewing and bulk delete are implemented.
- Cache clear tooling is implemented.

### Auth / Account

- Password login for frontend users is implemented.
- OTP login via email is implemented.
- Password reset views and handlers are implemented.
- Logout is implemented through the shared `/logout` endpoint.
- Account settings and password update flows are implemented.

### Database

- Core tables for RBAC, content, horoscope, UI settings, enquiries, replies, activity logs, and translation cache are present in migrations.

## Partially Completed

- Astrologer booking, video call, and meeting flows exist as pages and enquiry intake, but they do not appear to be backed by a full appointment or scheduling system.
- The `My Orders` area is implemented by filtering enquiry records that look order-related, not by a dedicated orders table or transactional order model.
- The payment page exists as static/CMS content, but there is no integrated payment transaction workflow.
- Several booking-related views encourage users to book astrologers or pandits, but the actual fulfillment still appears enquiry-based rather than order-based.

## Pending

- A real order management system with dedicated `orders`, `payments`, or `transactions` models/migrations is not present.
- A full booking engine with calendar availability, appointment slots, and booking lifecycle tracking is not present.
- A product/catalog/cart/checkout system for gemstones or services is not present.
- A dedicated admin logout route is not clearly implemented; admin logout currently appears to share the general logout flow.

## Quick Run Notes

- Install and build: `composer run setup`
- Dev: `composer run dev`
- Migrate: `php artisan migrate`
- Horoscope fetch: `php artisan horoscope:fetch-daily`
