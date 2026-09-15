# Rafael Joseph Nieves — Portfolio

Plain HTML + CSS, no build step, no JavaScript (the mobile menu and the project lightboxes on **Sample Works** are pure CSS, using a hidden checkbox and `:target`).

## Files
- `index.html` — cover / landing page (unique layout)
- `about.html`, `skills.html`, `works.html`, `credentials.html` — shared "float" template (floating pill nav + footer)
- `css/style.css` — everything: colors, fonts, components, responsive rules

## To customize
- **Photos**: every gray/green dashed box is a placeholder (`<div class="media">`). Replace its contents with `<img src="...">` — keep the aspect ratio noted in the label (e.g. 4:5) for the layout to stay intact.
- **Projects**: in `works.html`, each `<!-- Replace this project with your own -->` marks one card + its matching lightbox `<div id="project-N">` at the bottom of the file.
- **Colors**: all colors are CSS variables at the top of `css/style.css` (`:root { ... }`) — change `--accent` to swap the lime highlight for another color.
- **Socials**: footer links (`Instagram`, `Behance`, `GitHub`) are `href="#"` placeholders — drop in your real profile URLs.

## To preview locally
Open `index.html` directly in a browser, or run a local server from this folder (recommended, since `@import` fonts and relative paths behave more reliably over http):

```bash
python -m http.server 5500
```

Then visit `http://localhost:5500`.
