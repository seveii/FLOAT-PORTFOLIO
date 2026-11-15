<?php
/**
 * BOOTSTRAP — includes/bootstrap.php
 * Loaded first by every page: settings, helper functions, and the content data.
 *
 * "require" pastes another PHP file in at that spot. The order matters:
 *   1. config.php    the site settings (name, email, social links)
 *   2. functions.php the helper functions that the pages call
 *   3. data.php      the content: services, projects, certificates, and so on
 * Each page needs only ONE line to get all of this:  require '../includes/bootstrap.php';
 */
// __DIR__ is the folder this file is in, so INC always points to the includes/ folder.
const INC = __DIR__;

require INC . '/config.php';
require INC . '/functions.php';
require INC . '/data.php';
