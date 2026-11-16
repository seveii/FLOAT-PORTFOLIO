-- ============================================================================
-- Rafael Joseph Nieves — portfolio database (MySQL 8 / MariaDB 10.4+)
-- File 1 of 3: schema.sql   (creates the database and all the tables)
--
-- Run order:  1) schema.sql   2) data.sql   3) queries.sql (examples)
--
-- WHAT THIS DATABASE DESCRIBES
-- The website's text lives in includes/data.php as PHP arrays. These tables hold
-- the same information in a database, one table per kind of thing. Because one
-- project has many tools, images and bullet points, each "many" part is its own
-- table that points back to its parent with a FOREIGN KEY (a "one-to-many" link).
-- Each table's sort_order column keeps the list in the order shown on the site.
-- The `messages` table stores what visitors send through the contact form.
-- ============================================================================

CREATE DATABASE IF NOT EXISTS portfolio
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE portfolio;

-- Start clean so the file can be run again. Children are dropped before parents,
-- because a table that is pointed to cannot be dropped while another still uses it.
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS messages, certificates, certificate_groups, certifications,
  awards, education, experience_items, experience, skills, skill_groups,
  site_facts, worked_with, project_videos, project_gallery, project_links,
  project_tools, project_points, project_overview, service_projects,
  service_features, process_steps, projects, services;
SET FOREIGN_KEY_CHECKS = 1;

-- ---------------------------------------------------------------- SERVICES --
-- The three services shown on the home page and the Services page.
CREATE TABLE services (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  slug        VARCHAR(40)  NOT NULL,            -- used in the link services.php#web
  title       VARCHAR(120) NOT NULL,
  blurb       VARCHAR(300) NOT NULL,            -- one-sentence description
  good_for    VARCHAR(300) NOT NULL,            -- "Good for: ..." line
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY uq_services_slug (slug)
) ENGINE=InnoDB;

-- The "What you get" bullet list of each service (one service has many bullets).
CREATE TABLE service_features (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  service_id  INT UNSIGNED NOT NULL,
  feature     VARCHAR(200) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_feature_service FOREIGN KEY (service_id)
    REFERENCES services (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- The four working steps (Discover, Plan, Design & build, Deliver).
CREATE TABLE process_steps (
  id           INT UNSIGNED NOT NULL AUTO_INCREMENT,
  step_number  TINYINT UNSIGNED NOT NULL,
  name         VARCHAR(60)  NOT NULL,
  description  VARCHAR(300) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_step_number (step_number)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------- PROJECTS --
CREATE TABLE projects (
  id              INT UNSIGNED NOT NULL AUTO_INCREMENT,
  slug            VARCHAR(60)  NOT NULL,        -- used in project.php?slug=oasis
  title           VARCHAR(120) NOT NULL,
  category        VARCHAR(60)  NOT NULL,        -- Web app, Logo & identity, ...
  summary         VARCHAR(300) NOT NULL,
  cover_image     VARCHAR(80)  NOT NULL,        -- file name in assets/img (no extension)
  image_fit       ENUM('cover','contain') NOT NULL DEFAULT 'cover',
  image_position  VARCHAR(20)  NULL,            -- optional focal point, e.g. '50% 38%'
  project_group   ENUM('design','engineering','game') NOT NULL DEFAULT 'design',
  role            VARCHAR(80)  NOT NULL,
  status          VARCHAR(60)  NOT NULL,
  sort_order      TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY uq_projects_slug (slug)
) ENGINE=InnoDB;

-- Which projects are shown as examples under each service (many-to-many link table:
-- one service has many example projects, and one project can serve many services).
CREATE TABLE service_projects (
  service_id  INT UNSIGNED NOT NULL,
  project_id  INT UNSIGNED NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (service_id, project_id),
  CONSTRAINT fk_sp_service FOREIGN KEY (service_id) REFERENCES services (id) ON DELETE CASCADE,
  CONSTRAINT fk_sp_project FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- The paragraphs of the project's overview text.
CREATE TABLE project_overview (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  project_id  INT UNSIGNED NOT NULL,
  paragraph   TEXT NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_overview_project FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- The bullet points ("what I did").
CREATE TABLE project_points (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  project_id  INT UNSIGNED NOT NULL,
  point_text  TEXT NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_points_project FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- The tools used (the small tags in the project sidebar).
CREATE TABLE project_tools (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  project_id  INT UNSIGNED NOT NULL,
  tool        VARCHAR(80) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_tools_project FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- External links (live site, GitHub, ...).
CREATE TABLE project_links (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  project_id  INT UNSIGNED NOT NULL,
  label       VARCHAR(120) NOT NULL,
  url         VARCHAR(300) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_links_project FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- The picture gallery of a project.
CREATE TABLE project_gallery (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  project_id  INT UNSIGNED NOT NULL,
  image       VARCHAR(80)  NOT NULL,
  caption     VARCHAR(300) NOT NULL,
  image_fit   ENUM('cover','contain') NOT NULL DEFAULT 'cover',
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_gallery_project FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Video clips shown on a project page.
CREATE TABLE project_videos (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  project_id  INT UNSIGNED NOT NULL,
  file_name   VARCHAR(80)  NOT NULL,            -- file in assets/video (no extension)
  caption     VARCHAR(300) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_videos_project FOREIGN KEY (project_id) REFERENCES projects (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ------------------------------------------------------------------- ABOUT --
CREATE TABLE experience (
  id            INT UNSIGNED NOT NULL AUTO_INCREMENT,
  date_range    VARCHAR(60)  NOT NULL,
  role          VARCHAR(100) NOT NULL,
  organization  VARCHAR(200) NOT NULL,
  sort_order    TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE experience_items (
  id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
  experience_id  INT UNSIGNED NOT NULL,
  item           TEXT NOT NULL,
  sort_order     TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_expitem_exp FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE education (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  date_range  VARCHAR(60)  NOT NULL,
  program     VARCHAR(120) NOT NULL,
  school      VARCHAR(160) NOT NULL,
  note        VARCHAR(300) NOT NULL DEFAULT '',
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE awards (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  date_label  VARCHAR(40)  NOT NULL,            -- kept as text, e.g. 'Sep 2025'
  title       VARCHAR(200) NOT NULL,
  issuer      VARCHAR(200) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE certifications (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  date_label  VARCHAR(40)  NOT NULL,
  title       VARCHAR(200) NOT NULL,
  issuer      VARCHAR(250) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE skill_groups (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(80) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY uq_skill_group_name (name)
) ENGINE=InnoDB;

CREATE TABLE skills (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  group_id    INT UNSIGNED NOT NULL,
  skill       VARCHAR(100) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_skill_group FOREIGN KEY (group_id) REFERENCES skill_groups (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ------------------------------------------------------------ CERTIFICATES --
CREATE TABLE certificate_groups (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(80)  NOT NULL,
  lede        VARCHAR(300) NOT NULL,            -- the one-line description under the heading
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY uq_cert_group_name (name)
) ENGINE=InnoDB;

CREATE TABLE certificates (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  group_id    INT UNSIGNED NOT NULL,
  image_file  VARCHAR(80)  NOT NULL,            -- file name in assets/img (no extension)
  name        VARCHAR(160) NOT NULL,
  issuer      VARCHAR(160) NOT NULL,
  date_label  VARCHAR(40)  NOT NULL,
  detail      VARCHAR(100) NOT NULL DEFAULT '',
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  CONSTRAINT fk_cert_group FOREIGN KEY (group_id) REFERENCES certificate_groups (id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ------------------------------------------------------------- HOME PAGE --
CREATE TABLE site_facts (                        -- the highlight list under the intro
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  fact        VARCHAR(200) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE worked_with (                       -- the "Work made for" strip
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(160) NOT NULL,
  sort_order  TINYINT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

-- ---------------------------------------------------------- CONTACT FORM --
-- One row for every message a visitor sends. created_at fills itself in.
-- need_type has the same four choices as the drop-down in contact.php.
CREATE TABLE messages (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name        VARCHAR(100) NOT NULL,
  email       VARCHAR(254) NOT NULL,
  need_type   ENUM('website','design','content','other') NOT NULL,
  message     TEXT NOT NULL,
  created_at  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY idx_messages_created (created_at)
) ENGINE=InnoDB;
