<?php
/**
 * Site-wide settings. Edit the values below — nothing else needs to change.
 *
 * "const" defines a constant: a named value that never changes while the page runs.
 * Pages and templates use them by name, for example SITE_NAME in the footer, so the name,
 * email and links are written in ONE place and shown everywhere.
 */

const SITE_NAME     = 'Rafael Joseph Nieves';
const SITE_SHORT    = 'Rafael Nieves';
const SITE_ROLE     = 'Web & Graphic Designer';
const SITE_LOCATION = 'Marilao, Bulacan, Philippines';

/** Where contact-form messages are emailed. */
const SITE_EMAIL = 'nrafaeljoseph@gmail.com';

/**
 * The "From" address on contact-form emails. Use an address on YOUR domain once the
 * site is live (e.g. no-reply@yourdomain.com) so mail providers don't reject it.
 */
const MAIL_FROM = 'no-reply@localhost';

const SOCIAL = [
    'Instagram' => 'https://www.instagram.com/sephhx_?stkn=MTZzY2hucDFjdWFqMw==',
    'GitHub'    => 'https://github.com/seveii',
];

/** Seconds a visitor must wait between two contact-form submissions. */
const FORM_COOLDOWN = 30;

/*
 * DATABASE (MySQL or MariaDB). The contact form saves each message in the `messages` table
 * that database/schema.sql creates. The defaults below match a fresh local XAMPP install
 * (user "root", no password). On a real web host, change them to the host's values, or set
 * the environment variables PORTFOLIO_DB_DSN, PORTFOLIO_DB_USER and PORTFOLIO_DB_PASS so the
 * password is not written in the code. The DSN is "mysql:host=...;dbname=...;charset=...".
 * If the database cannot be reached, the form still works: it saves to a file instead.
 */
define('DB_DSN',  getenv('PORTFOLIO_DB_DSN') ?: 'mysql:host=127.0.0.1;dbname=portfolio;charset=utf8mb4');
define('DB_USER', getenv('PORTFOLIO_DB_USER') !== false ? getenv('PORTFOLIO_DB_USER') : 'root');
define('DB_PASS', getenv('PORTFOLIO_DB_PASS') !== false ? getenv('PORTFOLIO_DB_PASS') : '');
