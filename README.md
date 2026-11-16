# Rafael Joseph Nieves — Portfolio

A simple, client-facing portfolio built with **PHP, HTML and CSS only**: no JavaScript, no frameworks.

## Run it on your computer
PHP is required. From this folder:

```bash
php -S localhost:8080 -t public
```

Then open http://localhost:8080

## What's where
```
public/                      everything the web serves (point your host at this folder)
  index.php  services.php  work.php  about.php  certificates.php  contact.php   the pages
  project.php                one template, shows any project (project.php?slug=whispr)
  assets/css/style.css       the one stylesheet
  assets/img/                optimised images (WebP), certificate scans and the favicon
  assets/video/              short MP4 clips shown on project pages
includes/                    code the pages share (never reachable from the web)
  config.php                 your name, email, social links
  data.php                   ALL the content: services, projects, experience, awards, skills
  header.php  footer.php     shared top and bottom of every page
  functions.php              small helpers (safe output, images, project cards)
data/                        saved contact-form messages (private, outside the web folder)
database/                    SQL files: schema.sql, data.sql, queries.sql (see Database below)
```

## Edit the site
- **Text, projects, experience, awards:** edit `includes/data.php`. To add a project, copy an entry in `$projects`, give it a new `slug`, and put its image in `public/assets/img/`.
- **Cover photo:** the first section of `public/index.php`. The wide photo is `cover-pool.webp` and the phone photo is `awards-presidents-list.webp`. Swap the file names in the `<picture>` tag to change them.
- **Certificates:** add an image to `public/assets/img/` and a line to `$certificate_groups` in `data.php`.
- **Project videos:** put an `.mp4` in `public/assets/video/` and add `'videos' => [['file-name', 'Caption']]` to the project.
- **Name, email, social links:** `includes/config.php`.
- **Colors and fonts:** the variables at the top of `public/assets/css/style.css`.

## The contact form
- The message is **saved in the MySQL database** (the `messages` table, see Database below) and **also emailed** to the address in `config.php`. The code is in `includes/database.php`, and it uses a prepared statement, so what a visitor types can never run as SQL.
- If the database is not available (not installed, wrong password), the message is saved to `data/messages.php` instead, so the form never fails. Open that file on the server to read those.
- Before going live, set `MAIL_FROM` in `includes/config.php` to an address on your own domain (for example `no-reply@yourdomain.com`), otherwise some mail providers will reject the email.
- Built-in protection: CSRF token, hidden spam trap, input validation, a short cooldown between sends, and email-header injection prevention.

## Database (SQL files)
The `database/` folder describes the same content as `includes/data.php` as a MySQL database
(MySQL 8 or MariaDB 10.4+). The website pages still read `data.php`, and the contact form saves its messages in this
database. These files create and fill it.

| File | What it does |
| --- | --- |
| `schema.sql` | Creates the `portfolio` database and 23 tables, with primary keys, foreign keys and `ON DELETE CASCADE`. |
| `data.sql` | Fills the tables with the real content (projects, services, certificates, skills, ...) and one sample message. |
| `queries.sql` | 18 example queries: JOIN, GROUP BY, HAVING, a subquery, a VIEW, INSERT, UPDATE and DELETE. |

To load them, run the three files in order, for example in phpMyAdmin (Import tab) or with:

```bash
mysql -u root -p < database/schema.sql
mysql -u root -p < database/data.sql
mysql -u root -p < database/queries.sql
```

The `messages` table matches the contact form's fields (name, email, need type, message).

### Make the contact form use the database
1. Start MySQL (for example XAMPP's Apache and MySQL) and import `schema.sql`, then `data.sql`, in phpMyAdmin.
2. Check the settings `DB_DSN`, `DB_USER` and `DB_PASS` in `includes/config.php`. The defaults match a fresh XAMPP (database `portfolio`, user `root`, no password). On a real host use its values, or set the environment variables `PORTFOLIO_DB_DSN`, `PORTFOLIO_DB_USER` and `PORTFOLIO_DB_PASS`.
3. PHP needs the `pdo_mysql` extension (XAMPP has it on). With the plain `php -S` server from the PHP download, add `-d extension=pdo_mysql`.
4. Send a message on the contact page, then read it with `SELECT * FROM messages ORDER BY id DESC;` (query 15 in `queries.sql`).

## Hosting
This site needs a host that runs PHP (almost any shared hosting does). Set the host's web root to the `public/` folder; if it only offers `public_html`, upload the contents of `public/` there and put `includes/` and `data/` next to it, not inside it. **GitHub Pages cannot run PHP.** The previous static version is in the git history if you ever need it back.
