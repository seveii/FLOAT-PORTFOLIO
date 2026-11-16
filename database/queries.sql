-- ============================================================================
-- Rafael Joseph Nieves — portfolio database
-- File 3 of 3: queries.sql   (example queries to show how the data is used)
--
-- Run schema.sql and data.sql first. Each query is numbered and says what it shows.
-- Concepts used: SELECT, WHERE, ORDER BY, JOIN, LEFT JOIN, GROUP BY, HAVING, COUNT,
-- GROUP_CONCAT, subqueries, a VIEW, and INSERT / UPDATE / DELETE.
-- ============================================================================

USE portfolio;

-- 1. All projects in the order they appear on the Work page.
SELECT id, slug, title, category
FROM projects
ORDER BY sort_order;

-- 2. One project (the page project.php?slug=oasis) with its tools, using a JOIN.
--    Each tool is its own row in project_tools, so the join returns one row per tool.
SELECT p.title, p.role, p.status, t.tool
FROM projects p
JOIN project_tools t ON t.project_id = p.id
WHERE p.slug = 'oasis'
ORDER BY t.sort_order;

-- 3. The same, but the tools of every project in ONE text cell (GROUP BY + GROUP_CONCAT).
SELECT p.title, GROUP_CONCAT(t.tool) AS tools
FROM projects p
JOIN project_tools t ON t.project_id = p.id
GROUP BY p.id, p.title
ORDER BY p.sort_order;

-- 4. How many projects are in each group (the three headings on the Work page).
SELECT project_group, COUNT(*) AS total
FROM projects
GROUP BY project_group
ORDER BY total DESC;

-- 5. Categories that have more than one project (HAVING filters the groups).
SELECT category, COUNT(*) AS total
FROM projects
GROUP BY category
HAVING COUNT(*) > 1;

-- 6. Each service with its example projects. This joins THREE tables through the
--    link table service_projects (a many-to-many relationship).
SELECT s.title AS service, p.title AS example_project
FROM services s
JOIN service_projects sp ON sp.service_id = s.id
JOIN projects p          ON p.id = sp.project_id
ORDER BY s.sort_order, sp.sort_order;

-- 7. How many "What you get" bullets each service has.
SELECT s.title, COUNT(f.id) AS bullets
FROM services s
LEFT JOIN service_features f ON f.service_id = s.id
GROUP BY s.id, s.title;

-- 8. Projects that have a video (a subquery with EXISTS).
SELECT title
FROM projects p
WHERE EXISTS (SELECT 1 FROM project_videos v WHERE v.project_id = p.id);

-- 9. Projects WITHOUT a gallery. LEFT JOIN keeps every project, and the ones with no
--    matching gallery row have NULL in the gallery column.
SELECT p.title
FROM projects p
LEFT JOIN project_gallery g ON g.project_id = p.id
WHERE g.id IS NULL
ORDER BY p.sort_order;

-- 10. The skills of each group and how many there are (the "What I work with" tags).
SELECT g.name AS skill_group, COUNT(s.id) AS skills
FROM skill_groups g
JOIN skills s ON s.group_id = g.id
GROUP BY g.id, g.name
ORDER BY g.sort_order;

-- 11. Certificates with their group (the Certificates page).
SELECT g.name AS certificate_group, c.name, c.issuer, c.date_label
FROM certificate_groups g
JOIN certificates c ON c.group_id = g.id
ORDER BY g.sort_order, c.sort_order;

-- 12. The leadership timeline: each role with its number of detail lines.
SELECT e.date_range, e.role, e.organization, COUNT(i.id) AS details
FROM experience e
LEFT JOIN experience_items i ON i.experience_id = e.id
GROUP BY e.id, e.date_range, e.role, e.organization
ORDER BY e.sort_order;

-- 13. A VIEW is a saved query that behaves like a table. This one is what a project
--     card needs: the card text plus how many tools the project lists.
DROP VIEW IF EXISTS v_project_cards;
CREATE VIEW v_project_cards AS
SELECT p.id, p.slug, p.title, p.category, p.summary, p.cover_image,
       (SELECT COUNT(*) FROM project_tools t WHERE t.project_id = p.id) AS tool_count
FROM projects p;

SELECT title, category, tool_count FROM v_project_cards ORDER BY id LIMIT 5;

-- 14. INSERT: what the contact form does when a visitor sends a message.
INSERT INTO messages (name, email, need_type, message)
VALUES ('Demo Visitor', 'demo@example.com', 'design', 'I need a logo for our student organization.');

-- 15. Read the newest messages first.
SELECT id, name, email, need_type, created_at
FROM messages
ORDER BY id DESC
LIMIT 10;

-- 16. UPDATE: change one project's status. The WHERE clause is important: without it
--     EVERY row would change.
UPDATE projects
SET status = 'Live'
WHERE slug = 'whispr';

-- 17. DELETE: remove the demo message again. The WHERE clause limits it to that row.
DELETE FROM messages
WHERE email = 'demo@example.com';

-- 18. ON DELETE CASCADE: deleting a parent row also deletes its children. To see it,
--     run these two lines in a transaction and ROLLBACK, so nothing is lost.
--       START TRANSACTION;
--       DELETE FROM projects WHERE slug = 'oasis';
--       SELECT COUNT(*) FROM project_tools;   -- the OASIS tools are gone too
--       ROLLBACK;
