# Lara-Proj-SECTION-Surname1-Surname2-Surname3

> **Group name:** _(your group name)_
> **Section:** _(e.g., BSIT 2A)_
> **Members:** Surname1 (Member 1, Leader) · Surname2 (Member 2) · Surname3 (Member 3)

## Theme
**CEMS — Campus Event Management System of Caraga State University.** A multi-page Laravel website that
presents how students discover and register for campus events, how organizers create them, and how admins approve them.

## Modules and branches
| Member | Module | Branch |
|---|---|---|
| Member 1 (Leader) | Project setup, master layout (`layouts/app.blade.php`), Home page + hero slider | `dev-member1-Surname` |
| Member 2 | About page | `dev-member2-Surname` |
| Member 3 | Contact page | `dev-member3-Surname` |

## Files per page
| Page | Route | View | CSS | JS |
|---|---|---|---|---|
| Home | `/` | `resources/views/home.blade.php` | `public/css/home.css` | `public/js/home.js` |
| About | `/about` | `about.blade.php` | `public/css/about.css` | `public/js/about.js` |
| Contact | `/contact` | `contact.blade.php` | `public/css/contact.css` | `public/js/contact.js` |

Shared: `layouts/app.blade.php`, `public/css/app.css`, `public/js/app.js`.

## Screenshots
| Home | About | Contact |
|---|---|---|
| ![Home](docs/screenshots/home.png) | ![About](docs/screenshots/about.png) | ![Contact](docs/screenshots/contact.png) |

## How to run
```bash
git clone <repo-url>
cd Lara-Proj-SECTION-Surname1-Surname2-Surname3
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate        # answer "yes" if asked to create the database
php artisan serve          # open http://127.0.0.1:8000
```
Requires PHP 8.2+ and Composer. No `npm` step is needed: pages load plain CSS/JS from `public/`.
