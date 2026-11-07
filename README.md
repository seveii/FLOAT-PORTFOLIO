# Rafael Joseph Nieves — Portfolio

A simple, client-facing portfolio built with **PHP, HTML and CSS only**: no JavaScript, no frameworks.

## Run it on your computer
PHP is required. From this folder:

```bash
php -S localhost:8080
```

Then open http://localhost:8080

## What's where
```
index.php  services.php  work.php  about.php  certificates.php  contact.php   the pages
project.php                  one template, shows any project (project.php?slug=whispr)
includes/
  config.php                 your name, email, social links
  data.php                   ALL the content: services, projects, experience, awards, skills
  header.php  footer.php     shared top and bottom of every page
  functions.php              small helpers (safe output, images, project cards)
assets/css/style.css         the one stylesheet
assets/img/                  optimised images (WebP), certificate scans and the favicon
assets/video/                short MP4 clips shown on project pages
data/                        saved contact-form messages (private, blocked from the web)
old-site/                    the previous static HTML version, kept as a backup
```

## Edit the site
- **Text, projects, experience, awards:** edit `includes/data.php`. To add a project, copy an entry in `$projects`, give it a new `slug`, and put its image in `assets/img/`.
- **Cover photo:** the first section of `index.php`. The wide photo is `cover-pool.webp` and the phone photo is `awards-presidents-list.webp`. Swap the file names in the `<picture>` tag to change them.
- **Certificates:** add an image to `assets/img/` and a line to `$certificate_groups` in `data.php`.
- **Project videos:** put an `.mp4` in `assets/video/` and add `'videos' => [['file-name', 'Caption']]` to the project.
- **Name, email, social links:** `includes/config.php`.
- **Colors and fonts:** the variables at the top of `assets/css/style.css`.

## The contact form
- The message is **emailed** to the address in `config.php` and **also saved** to `data/messages.php` as a backup. Open that file on the server to read them.
- Before going live, set `MAIL_FROM` in `includes/config.php` to an address on your own domain (for example `no-reply@yourdomain.com`), otherwise some mail providers will reject the email.
- Built-in protection: CSRF token, hidden spam trap, input validation, a short cooldown between sends, and email-header injection prevention.

## Hosting
This site needs a host that runs PHP (almost any shared hosting does). **GitHub Pages cannot run PHP**, so it can only host the static `old-site/` version. Upload everything except `old-site/` to your PHP host.
