# Rafael Joseph Nieves — Portfolio

Plain HTML + CSS only — no frameworks, no JavaScript. Responsive from phone to desktop. The layout uses all three CSS methods, each where it fits best:

- **Float** (+ clearfix): the nav pill, the two-column About and Skills layouts, the home page About card, the drop cap.
- **Flexbox**: rows of buttons and tags, the footer, the stat strip.
- **Grid**: every grid of cards (projects, photo galleries, credentials, home summaries), using `auto-fit` + `minmax()` so columns adapt on their own.

The mobile menu and the project lightboxes are pure CSS (a hidden checkbox and `:target`).

## Folder structure
```
index.html            Cover / landing page (must stay at the root for hosting)
pages/
  about.html          About Me
  skills.html         Skills
  works.html          Sample Works (project case studies + photo viewer)
  credentials.html    Education, leadership, awards, certifications
css/
  style.css           The one main stylesheet — colors/variables, nav, cards, footer,
                      then one clearly labelled section per page
images/               Every image used by the site, in one flat folder
docs/
  code-explainer.html Study guide for explaining the code
```

## To customize
- **Colors**: all colors are CSS variables at the top of `css/style.css` (`:root { ... }`) — change `--accent` to swap the lime highlight.
- **Images**: drop new files in `images/` and reference them as `images/name.jpg` from `index.html`, or `../images/name.jpg` from any file in `pages/`.
- **Projects**: in `pages/works.html` each project is a card plus a matching lightbox `<div id="project-...">` at the bottom of the file.

## To preview locally
Open `index.html` with VS Code's Live Server (the "Go Live" button), or run from this folder:

```bash
python -m http.server 5500
```
