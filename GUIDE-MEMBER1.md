# Member 1 (Leader) — step-by-step

## 0. Before anything
- Deadline is **Nov 17, 2026, 5 PM**. The demo window (8:30–11:00 AM daily) is already open. Book your demo early.
- Edit the `$members` array at the top of `resources/views/layouts/app.blade.php` with the 3 real names.

## 1. Create the project (once, leader only)
```bash
composer create-project laravel/laravel Lara-Proj-SECTION-Surname1-Surname2-Surname3
cd Lara-Proj-SECTION-Surname1-Surname2-Surname3
git init
git add .
git commit -m "Initial Laravel setup"
git branch -M main
git remote add origin <your-empty-github-repo-url>
git push -u origin main
```
Then GitHub → Settings → Collaborators → add both groupmates.

## 2. Create your branch
```bash
git checkout -b dev-member1-Surname
```

## 3. Copy in this folder's files (overwrite `routes/web.php`)
```
routes/web.php
resources/views/layouts/app.blade.php
resources/views/home.blade.php
public/css/app.css   public/css/home.css
public/js/app.js     public/js/home.js
README.md            (and docs/screenshots/)
```
Optional cleanup: delete `resources/views/welcome.blade.php` (unused now).

## 4. Commit in small, honest steps (minimum 5 — here are 8)
Do these in order. Open each file, read it, run `php artisan serve` between steps, and commit when it works.
```bash
git add resources/views/layouts/app.blade.php
git commit -m "Add master layout with navbar, footer and stacks"

git add public/css/app.css
git commit -m "Style navbar, footer and buttons with CEMS theme"

git add public/js/app.js
git commit -m "Add mobile menu toggle script"

git add routes/web.php
git commit -m "Add home route"

git add resources/views/home.blade.php
git commit -m "Build Home page hero, theme intro and features"

git add public/css/home.css
git commit -m "Add Home page styles and responsive layout"

git add public/js/home.js
git commit -m "Add hero slider with autoplay, dots and swipe"

git add README.md
git commit -m "Add README"

git push origin dev-member1-Surname
```
Then on GitHub: **Pull Request** `dev-member1-Surname → main`, review, merge.
Do the Pull Request FIRST so Members 2 and 3 can `git pull origin main` and get your layout.

## 5. Expect merge conflicts in routes/web.php
All three of you edit it. When it conflicts, keep **all** the `Route::get(...)` lines (yours + theirs), delete the `<<<<<<<`, `=======`, `>>>>>>>` markers, then commit.

## 6. Submission email
To: daromaguera@carsu.edu.ph
Subject: `Lara Project Submission – Member1, Member2, Member 3` (use real names)
Body: repository link + invitation link.

## 7. Be ready for the "small live change" (you WILL be asked)
| They say… | Where |
|---|---|
| "Make it slide faster/slower" | `home.js` → `var DELAY = 5000;` |
| "Add a 5th slide" | copy an `<article class="slide …">` in `home.blade.php`, add a `.slide--xyz` gradient in `home.css`. Dots build themselves |
| "Change the theme colour" | `app.css` → `:root { --green … }` |
| "Add a nav link" | `$links` array in `layouts/app.blade.php` |
| "Why `url()` not `route()`?" | About/Contact routes belong to other members; `route('about')` would crash the layout until they merge |
| "What does `@stack` do?" | Child pages `@push` their CSS/JS into the layout's `@stack` slot, so each page loads only its own files |
| "How does the slider move?" | `goTo(n)` sets `translateX(-n*100%)` on the flex track; CSS `transition` animates it |
