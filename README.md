# Rafael Joseph Nieves — Portfolio

A simple portfolio built with **plain HTML and CSS only**: no PHP, no JavaScript, no frameworks. It works on any static host, including GitHub Pages.

## Open it on your computer
Double-click `index.html`, or run a small local server from this folder:

```bash
python -m http.server 8080
```

Then open http://localhost:8080

## What's where
```
index.html  services.html  work.html  about.html  certificates.html  contact.html   the pages
projects/                    one page per project (whispr.html, oasis.html, ...)
assets/css/style.css         the one stylesheet
assets/img/                  optimised images (WebP), certificate scans and the favicon
assets/video/                short MP4 clips shown on project pages
assets/logo/                 the logo
```

## Edit the site
- **Text:** open the page and edit the HTML. Project text is in `projects/`.
- **Header and footer:** they are repeated on every page, so change them in each file.
- **Images and certificates:** put the image in `assets/img/` and reference it from the page.
- **Colors and fonts:** the variables at the top of `assets/css/style.css`.

## Contact
The contact page has an **email button** that opens the visitor's email app with a ready-to-fill message, so no server is needed.

## Hosting
Any static host works. On GitHub Pages, set the source to the `main` branch and the `/ (root)` folder.

## The PHP version
The earlier PHP version, where each page was built from shared parts, is in the git history (commit `3a3454e`) if you want it back.
