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
api/index.php  vercel.json   only used when deploying on Vercel
```

## Edit the site
- **Text, projects, experience, awards:** edit `includes/data.php`. To add a project, copy an entry in `$projects`, give it a new `slug`, and put its image in `public/assets/img/`.
- **Cover photo:** the first section of `public/index.php`. The wide photo is `cover-pool.webp` and the phone photo is `awards-presidents-list.webp`. Swap the file names in the `<picture>` tag to change them.
- **Certificates:** add an image to `public/assets/img/` and a line to `$certificate_groups` in `data.php`.
- **Project videos:** put an `.mp4` in `public/assets/video/` and add `'videos' => [['file-name', 'Caption']]` to the project.
- **Name, email, social links:** `includes/config.php`.
- **Colors and fonts:** the variables at the top of `public/assets/css/style.css`.

## The contact form
- The message is **emailed** to the address in `config.php` and **also saved** to `data/messages.php` as a backup. Open that file on the server to read them.
- Before going live, set `MAIL_FROM` in `includes/config.php` to an address on your own domain (for example `no-reply@yourdomain.com`), otherwise some mail providers will reject the email.
- Built-in protection: CSRF token, hidden spam trap, input validation, a short cooldown between sends, and email-header injection prevention.

## Deploy on Vercel
The site runs on Vercel through the community `vercel-php` runtime. `vercel.json` and `api/index.php` are already set up.

1. In Vercel choose **Add New, Project** and import this GitHub repository.
2. Framework Preset: **Other**. Leave the build and output settings empty (`vercel.json` already sets the output folder to `public`).
3. Deploy. Every push to `main` redeploys automatically.

On Vercel the contact page shows an **email button** instead of the form, because Vercel has no mail server and cannot save messages. On a normal PHP host the full form is used. Test the Vercel setup locally with `VERCEL=1 php -S localhost:8081 -t public api/index.php`.

## Hosting
This site needs a host that runs PHP (almost any shared hosting does, and Vercel works too). Set the host's web root to the `public/` folder; if it only offers `public_html`, upload the contents of `public/` there and put `includes/` and `data/` next to it, not inside it. **GitHub Pages cannot run PHP.** The previous static version is in the git history if you ever need it back.
