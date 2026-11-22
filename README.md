# Rafael Joseph Nieves - Portfolio

A simple portfolio website made with PHP, HTML and CSS. The text is written directly in the pages.

## Files

| File | What it is |
| --- | --- |
| `index.php` | Home page |
| `about.php` | About page (education, experience, skills) |
| `projects.php` | Projects page |
| `certificates.php` | Certificates and awards |
| `contact.php` | Contact form that saves messages in the database |
| `header.php`, `footer.php` | The top and bottom shared by every page (added with `include`) |
| `style.css` | The only stylesheet |
| `images/` | The pictures |
| `database.sql` | Creates the `portfolio` database and the `messages` table |

## Run it

1. Put the folder in XAMPP's `htdocs` and start Apache and MySQL. Or, in a terminal in this folder, run `php -S localhost:8000` and open http://localhost:8000
2. Import `database.sql` in phpMyAdmin. This creates the table the contact form needs.
3. Send a message on the Contact page, then read it in phpMyAdmin with `SELECT * FROM messages ORDER BY id DESC;`

The database settings (host `localhost`, user `root`, no password) are in `contact.php`. Change them if your MySQL is different. With plain `php -S`, PHP also needs the `pdo_mysql` extension turned on.
