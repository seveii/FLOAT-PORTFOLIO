<?php
defined('SITE_NAME') or exit; // never run this file directly

/*
 * DATABASE CONNECTION — includes/database.php
 * ----------------------------------------------------------------------------
 * The contact form saves every message in the MySQL table `messages`
 * (created by database/schema.sql). This file holds the two functions that do it:
 *
 *   db()            open the connection (once) and return it
 *   save_message()  insert one message into the table
 *
 * PDO is PHP's standard way to talk to a database. We use it with PREPARED STATEMENTS:
 * the SQL is sent first with placeholders (:name, :email, ...) and the visitor's text is
 * sent separately. The database never treats that text as SQL code, so a visitor cannot
 * attack the site with "SQL injection", whatever they type in the form.
 *
 * If the database is not available (not installed, wrong password, driver missing),
 * these functions do NOT crash the page. They return null / false, and contact.php
 * falls back to saving the message in a file instead.
 */

/** Connect to the database. Returns the PDO object, or null if the connection is not possible. */
function db(): ?PDO
{
    static $pdo = false; // false = "not tried yet", so we connect only once per page

    if ($pdo !== false) {
        return $pdo;
    }
    $pdo = null;

    // Some PHP installs do not have PDO at all, so we check before using it.
    if (!class_exists('PDO')) {
        return $pdo;
    }

    try {
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // problems become exceptions we can catch
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,                   // use real prepared statements
            PDO::ATTR_TIMEOUT            => 3,                       // give up after 3 seconds
        ]);
    } catch (PDOException $e) {
        // Write the reason to the server's error log, never to the visitor's screen.
        error_log('Portfolio database connection failed: ' . $e->getMessage());
        $pdo = null;
    }

    return $pdo;
}

/**
 * Save one contact-form message. Returns true when it is stored in the database.
 * $type is the key of the drop-down choice: website, design, content or other.
 */
function save_message(string $name, string $email, string $type, string $message): bool
{
    $pdo = db();
    if ($pdo === null) {
        return false;
    }

    try {
        // The :placeholders are filled in by execute(), separately from the SQL text.
        $statement = $pdo->prepare(
            'INSERT INTO messages (name, email, need_type, message)
             VALUES (:name, :email, :need_type, :message)'
        );
        return $statement->execute([
            ':name'      => $name,
            ':email'     => $email,
            ':need_type' => $type,
            ':message'   => $message,
        ]);
    } catch (PDOException $e) {
        // For example: the table does not exist yet because schema.sql was not imported.
        error_log('Portfolio could not save the message: ' . $e->getMessage());
        return false;
    }
}
