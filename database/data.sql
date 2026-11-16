-- ============================================================================
-- Rafael Joseph Nieves — portfolio database
-- File 2 of 3: data.sql   (fills the tables created by schema.sql)
--
-- The rows below are generated from includes/data.php, so they match the website's
-- real content. Parents are inserted before their children (a foreign key needs the
-- parent row to exist first). Ids are given explicitly so the links are easy to read.
-- ============================================================================

USE portfolio;
SET NAMES utf8mb4;

-- PROJECTS
INSERT INTO projects (id, slug, title, category, summary, cover_image, image_fit, image_position, project_group, role, status, sort_order) VALUES
  (1, 'whispr', 'Whispr', 'Web app', 'An anonymous confession platform where every account still verifies back to one real person.', 'whispr', 'cover', NULL, 'design', 'Design & development', 'Working prototype', 1),
  (2, 'oasis', 'OASIS', 'Web system', 'Attendance and clearance for a college of computer studies: students scan their ID at events, earn points and see if they are cleared.', 'oasis', 'contain', NULL, 'design', 'Team project', 'Live', 2),
  (3, 'dyci-cpe-site', 'DYCI Computer Engineering website', 'Website', 'A dark, circuit-board themed site for a college Computer Engineering program, with a 3D hero built in pure CSS and no JavaScript.', 'cpe-home', 'cover', NULL, 'design', 'Design & development', 'Working site', 3),
  (4, 'bayani-quest', 'Bayani Quest', 'Game', 'A Filipino folklore RPG in the browser: explore a barangay, catch mythical creatures and battle them, all drawn on an HTML5 canvas.', 'game-title', 'cover', NULL, 'game', 'Design & development', 'Playable prototype', 4),
  (5, 'aces-logos', 'ACES and publication logos', 'Logo & identity', 'The ACES emblem, an alternate cherry-blossom mark, and logos for student publications.', 'logo-collage', 'cover', NULL, 'design', 'Logo design', 'Completed', 5),
  (6, 'social-graphics', 'Event & social media graphics', 'Social media', 'Announcements, awareness days, exam reminders and tarpaulins for a college organization.', 'pubmat-grid', 'cover', NULL, 'design', 'Graphic design', 'Completed', 6),
  (7, 'batch6', 'Batch6 Coffee campaign', 'Campaign', 'A campaign set for a coffee brand: poster, banner and discount vouchers, used at a live event booth.', 'campaign-batch6', 'contain', NULL, 'design', 'Campaign design', 'Completed', 7),
  (8, 'newsletter', 'OmneByte newsletter', 'Publication', 'Multi-page newsletter layout for a college of computer studies.', 'newsletter-omnebyte', 'contain', NULL, 'design', 'Layout design', 'Completed', 8),
  (9, 'japan-poster', 'Japan × DYCI exhibit poster', 'Poster', 'An information-packed two-page poster on Japan, built around a red, white and black theme.', 'poster-japan-dyci', 'contain', NULL, 'design', 'Poster design', 'Completed', 9),
  (10, 'icpep-polo', 'ICpEP polo and Aranea jersey', 'Apparel', 'Two sublimation apparel designs: a navy circuit-board polo and a red blackletter basketball jersey.', 'shirt-icpep', 'contain', NULL, 'design', 'Apparel design', 'Polo completed, jersey in progress', 10),
  (11, 'traffic-light-model', 'Miniature traffic light model', 'Engineering project', 'A hand-built town scene with an LED traffic light at its centre, made from craft materials.', 'eng-traffic-light', 'cover', '50% 42%', 'engineering', 'Design & build', 'Completed', 11),
  (12, 'laptop-motherboard', 'Labeled laptop motherboard (Intel i3)', 'Engineering project', 'A framed display of a real laptop motherboard with every major part and power rail labeled.', 'eng-motherboard', 'cover', '50% 38%', 'engineering', 'Group member', 'Completed', 12),
  (13, 'circuit-prototyping', 'Circuit prototyping', 'Engineering project', 'Hands-on circuit building on breadboard and perforated board for Computer Engineering lab work.', 'eng-breadboard', 'cover', '50% 55%', 'engineering', 'Lab work', 'Ongoing coursework', 13);

-- PROJECT OVERVIEW PARAGRAPHS
INSERT INTO project_overview (project_id, paragraph, sort_order) VALUES
  (1, 'Whispr is an anonymous confession board with a modern, youthful look. People post under a made-up name and avatar and never reveal their real identity, but each account still has to prove it belongs to one real, unique person. That keeps the space honest and stops it from being flooded with throwaway accounts.', 1),
  (1, 'Confessions are tagged by category and live hashtags, reacted to with “relate” instead of a like, and discussed in threaded comments. Trending hashtags are worked out from the last 24 hours of real activity, and enough community flags will hide a post until a moderator reviews it.', 2),
  (2, 'OASIS (Officer & Admin System for Involvement & Students) is the attendance and clearance system for the College of Computer Studies at Dr. Yanga’s Colleges, run with the Association of Computer Enthusiast Students (ACES). It replaces paper forms and sign-in sheets: students scan their ID at an event, earn points for every event and requirement, and see how close they are to semester clearance.', 1),
  (2, 'It is three connected sites on one shared database. Students use the student site, officers manage everything from the admin console, and staff at the door use a scanner site. The student login is a split screen in maroon and yellow with a terminal-style form, and the rest of the system uses a dark cyberpunk-style interface with a falling-code background and a full-screen check-in kiosk.', 2),
  (3, 'A website for the BS Computer Engineering program at Dr. Yanga’s Colleges and the ICpEP.SE – DYCI student chapter. It presents the program, laboratories, faculty, officers and admissions in one dark “circuit board” world with orange accents, using the college’s TECH seal as its logo.', 1),
  (3, 'It is written in plain PHP, HTML and CSS with no JavaScript. The hero is a 3D circuit board drawn entirely with CSS transforms, and it tilts toward your cursor. Tabs, selectable career cards and the admissions steps are all built with CSS only.', 2),
  (4, 'Bayani Quest (“bayani” means hero) is a top-down role-playing game inspired by Filipino folklore, played in Filipino. You explore Barangay Maliwanag, talk to villagers, and venture into tall grass and rice fields where creatures from Philippine myth (nilalang) appear: the Tikbalang, Diwata, Nuno sa Punso, Kapre, Santelmo and Sirena.', 1),
  (4, 'The whole game is a single HTML file and runs on a 640 × 480 canvas with crisp pixel-art rendering. Walking, wandering encounters, dialogue, shopping and turn-based battles are all written in plain JavaScript with no game engine.', 2),
  (5, 'A set of logos made for the Association of Computer Enthusiast Students and related student publications. The main emblem for 2025–26 is a bold, three-dimensional mark in deep red and gold with technology icons around the ACES wordmark.', 1),
  (5, 'For events and campaigns with a softer tone, I also designed an alternate cherry-blossom version with the name in katakana. The publication logos each carry a descriptive tagline so the name is easy to understand.', 2),
  (6, 'A running set of publication materials made for the Association of Computer Enthusiast Students and the College of Computer Studies. They cover national holidays and awareness days, exam week reminders, tech news and event announcements.', 1),
  (6, 'Each piece uses the same layout rules, logos and type so the organization is recognisable at a glance, while the style changes to suit the occasion, from playful exam reminders to a serious tribute.', 2),
  (7, 'A coffee campaign called “Sinaglayag”, built around a hand-drawn style with coffee gear illustrations on a crumpled paper texture. The set includes a vertical poster, a wide banner and three discount vouchers.', 1),
  (7, 'The vouchers (30%, 20% and 10% off) are numbered so each one can be tracked, and the designs were used at a real event booth.', 2),
  (8, 'OmneByte is the official newsletter of the College of Computer Studies at Dr. Yanga’s Colleges. I worked on the layout: a front page with a headline story and sidebar items, followed by inner news pages with columns, photos and pull-out headlines.', 1),
  (8, 'The aim was to make dense news content easy to scan, with a clear hierarchy and consistent columns from page to page.', 2),
  (9, 'A two-page poster made for an ASEAN-themed exhibit. The left page introduces Japan with a large headline, a map, food illustration and a temple gate. The right page lists top tourist attractions and fun facts.', 1),
  (9, 'Cherry blossom branches and a limited red, black and white palette tie the two pages together while keeping a lot of text readable.', 2),
  (10, 'A sublimation polo shirt design for the Institute of Computer Engineers of the Philippines. A chevron colour block and a circuit-line pattern rising from the hem make a technical look that still feels clean. The back carries the institute’s full name and the school and organization marks, laid out to stay readable across the shoulders.', 1),
  (10, 'The second design is the “Aranea” basketball jersey, drawn in Adobe Illustrator. Aranea is the Latin word for spider, and the jersey is built around that idea: a deep red, weathered texture, a blackletter name across the chest and a large black spider climbing in from the lower corner, with black trim around the neckline and armholes.', 2),
  (11, 'A small-scale model town built for a Computer Engineering class. A tall black pole at the centre carries a column of LEDs in traffic-light colors, set in a ring of pebbles and surrounded by moss-covered ground.', 1),
  (11, 'Around it sit small huts made from wooden sticks and cardboard, model trees and palms, and a road with dashed lane markings. The scene makes the electronics easy to understand because you can see exactly where the light would stand in a real neighborhood.', 2),
  (12, 'A group project that turns a real Intel i3 laptop motherboard into a study display. The board is mounted in a wooden frame and every important component is identified with a printed label, so anyone can see where the processor, memory and wireless card sit and which supply feeds what.', 1),
  (12, 'Made together with John Kenneth P. Delatina and Thimothy Javier.', 2),
  (13, 'Practical electronics from my Computer Engineering lab sessions. The breadboard circuit shown here is powered through a power-supply module from a 9 V battery, with LEDs, resistors, a trimmer potentiometer and a tangle of color-coded jumper wires.', 1),
  (13, 'The video shows the next step: laying parts out on a perforated prototype board, which is how a tested circuit becomes something more permanent.', 2);

-- PROJECT BULLET POINTS
INSERT INTO project_points (project_id, point_text, sort_order) VALUES
  (1, 'Sign in with Google or Discord, or with email confirmed by a 6-digit code.', 1),
  (1, 'A short, deliberately vague profile adds personality without breaking anonymity.', 2),
  (1, 'Follow requests unlock a private shared drawing canvas between two people, updated live.', 3),
  (1, 'Send a 10–15 second clip of a real song that plays full-screen once and then disappears.', 4),
  (1, 'Uploaded photos are scanned for faces and blocked, so avatars stay anonymous by design.', 5),
  (1, 'Built with a small Node.js and Express back end, vanilla JavaScript on the front end and no framework or build step.', 6),
  (2, 'Student site: log in with a student number, see your points, progress toward clearance, recent activity and a requirements checklist, with a points breakdown shown as a HUD with charts.', 1),
  (2, 'Students also get events and notifications tabs, a profile with photo, bio, talent and hobbies, and a cyberpunk-styled ID card with a barcode, a QR code and a live clearance panel.', 2),
  (2, 'Admin console: a dashboard with live counts and an activity feed, a student roster with ID cards, requirements and events with point values, and bulk import of students from Excel or CSV.', 3),
  (2, 'Admins create student accounts in bulk with temporary passwords. Students must set their own password on first login, and a “forgot my password” request goes to the admin.', 4),
  (2, 'Scanner site: staff pick an event that is open today and launch a full-screen kiosk. Scanning a barcode or QR code records attendance and shows the student their result.', 5),
  (2, 'Scanning only works on the event’s own date, and events limited to one program (BSIT, BSCpE or BSCS) reject students from the others.', 6),
  (2, 'A student is cleared when their points reach the total of the requirements and events that apply to their program.', 7),
  (2, 'Access is enforced in the database rules: admins, scanners and students each get different permissions, and students can only edit their own profile.', 8),
  (3, 'Home page with a 3D CSS circuit board that follows the cursor, using hidden hover zones instead of scripts.', 1),
  (3, 'Program overview with six study areas, nine career paths shown as selectable cards, and a four-step admissions guide.', 2),
  (3, 'Pages for four laboratories, ten faculty members with search, and a news and events section.', 3),
  (3, 'ICpEP.SE – DYCI officers page with search and group filters handled on the server.', 4),
  (3, 'All content is kept as data in one PHP file, so people and events can be updated without touching the page code.', 5),
  (3, 'Inquiry form that saves messages privately on the server, with a hidden spam trap and validation.', 6),
  (3, 'Layout adapts to phones with a CSS-only mobile menu.', 7),
  (4, 'Top-down village and field map with tile textures for grass, sea, wood, lava, a stove, a chest and bookshelves.', 1),
  (4, 'Animated player character with front, back, left and right frames, including a ten-frame walking cycle.', 2),
  (4, 'Random encounters that depend on the terrain: tall grass is the most dangerous, then rice fields, then open grass.', 3),
  (4, 'Six folklore creatures, each with its own type, stats, moves and a description of the myth behind it.', 4),
  (4, 'Turn-based battles with attack, throw an agimat charm to catch the creature, use food to heal, or run away. A party of up to three catches.', 5),
  (4, 'Villagers with typed-out dialogue: a healer who restores your party, a shopkeeper selling agimat and food, a guide and a gossiping child.', 6),
  (4, 'Battle backdrops drawn in code for a night forest, an ocean at night and a lava crater, matching each creature’s habitat.', 7),
  (4, 'Arrow keys to move, Z or Enter to confirm and talk, X to go back.', 8),
  (5, 'ACES 2025–26 emblem: red and gold, with gears, a globe, a robot, a light bulb and code symbols.', 1),
  (5, 'Alternate ACES mark: cherry blossoms with the name written in katakana.', 2),
  (5, 'Publication logos for ALAB, DEEPER and UPDATE.', 3),
  (6, 'Awareness days and holidays such as National Heroes Day, Ninoy Aquino Day and Marcelo del Pilar Day.', 1),
  (6, 'Exam week reminders, a tech news series and the Ignite GenTech event poster.', 2),
  (6, 'Event tarpaulins, including the Chrysalis freshmen orientation.', 3),
  (7, 'Poster and banner with a consistent illustrated look.', 1),
  (7, 'Cut-out voucher designs with different discount levels.', 2),
  (7, 'Designed to be used in print at a live event.', 3),
  (8, 'Front page with a masthead, lead story and section tabs.', 1),
  (8, 'Inner pages with multi-column text, photos and featured stories.', 2),
  (8, 'A consistent grid so every page feels part of one publication.', 3),
  (9, 'Large headline typography with illustrated Japanese elements.', 1),
  (9, 'A “Top 5” attractions column with photos and short descriptions.', 2),
  (9, 'A fun facts panel and decorative cherry blossoms.', 3),
  (10, 'ICpEP polo: navy and white colour blocking with a V-shaped chest panel.', 1),
  (10, 'ICpEP polo: circuit-board pattern as the signature detail, with front and back views prepared for sublimation printing.', 2),
  (10, 'Aranea jersey: blackletter wordmark in cream on a textured red field.', 3),
  (10, 'Aranea jersey: spider illustration cropped off the edge for movement, with black trim to give the jersey its shape.', 4),
  (10, 'Aranea jersey: front and back templates laid out side by side on one artboard in Adobe Illustrator.', 5),
  (11, 'LED traffic light on a handmade pole and base.', 1),
  (11, 'Pebble ring, moss ground, model trees and palms for the landscape.', 2),
  (11, 'Huts built from wooden sticks and cardboard with a thatched look.', 3),
  (11, 'A short video of the model is included below.', 4),
  (12, 'Core parts labeled: processor, RAM, embedded controller, HD audio codec, WLAN, companion chip, clock synthesizer and DCON.', 1),
  (12, 'Storage and card slots labeled: SD/MMC and the internal microSD slot.', 2),
  (12, 'Power rails identified: +5 V, +3.3 V, 3VPCU, +2.8 V, +1.8 V memory, +1.2 V, +1.05 V and VCORE.', 3),
  (12, 'Supporting circuits labeled: battery charger, LCD power and backlight power.', 4),
  (13, 'Breadboard circuit with a power module, LEDs, resistors and a trimmer potentiometer.', 1),
  (13, 'Color-coded jumper wiring to keep the layout readable.', 2),
  (13, 'A video of a circuit being built on a perforated board.', 3);

-- PROJECT TOOLS
INSERT INTO project_tools (project_id, tool, sort_order) VALUES
  (1, 'Node.js', 1),
  (1, 'Express', 2),
  (1, 'WebSockets', 3),
  (1, 'HTML & CSS', 4),
  (1, 'JavaScript', 5),
  (2, 'React', 1),
  (2, 'Vite', 2),
  (2, 'Tailwind CSS', 3),
  (2, 'Firebase Auth', 4),
  (2, 'Cloud Firestore', 5),
  (2, 'Vercel', 6),
  (3, 'PHP', 1),
  (3, 'HTML & CSS', 2),
  (3, 'CSS 3D transforms', 3),
  (3, 'No JavaScript', 4),
  (4, 'HTML5 Canvas', 1),
  (4, 'JavaScript', 2),
  (4, 'Pixel art', 3),
  (5, 'Canva', 1),
  (6, 'Canva', 1),
  (6, 'Adobe Illustrator', 2),
  (7, 'Canva', 1),
  (8, 'Canva', 1),
  (9, 'Canva', 1),
  (10, 'Canva', 1),
  (10, 'Adobe Illustrator', 2),
  (11, 'LEDs', 1),
  (11, 'Model-making materials', 2),
  (12, 'Hardware identification', 1),
  (12, 'Printed labels', 2),
  (12, 'Display frame', 3),
  (13, 'Breadboard', 1),
  (13, 'Perforated board', 2),
  (13, 'LEDs & resistors', 3),
  (13, 'Jumper wires', 4);

-- PROJECT LINKS
INSERT INTO project_links (project_id, label, url, sort_order) VALUES
  (2, 'Open the student site', 'https://softwareengineering-flax.vercel.app/', 1),
  (4, 'View the code on GitHub', 'https://github.com/seveii/GAME-QUEST', 1);

-- PROJECT GALLERY
INSERT INTO project_gallery (project_id, image, caption, image_fit, sort_order) VALUES
  (2, 'oasis-landing', 'The landing page: pick your program, see how it works, then log in', 'contain', 1),
  (2, 'oasis-how-it-works', 'The “Attend. Scan. Get cleared.” section of the student site: events, ID scan and points', 'contain', 2),
  (3, 'cpe-about', 'The about section, with a chip illustration and the reasons to study Computer Engineering', 'cover', 1),
  (3, 'cpe-labs', 'The laboratories page: Sandbox, Nexus, Raise and Inspire labs', 'cover', 2),
  (3, 'cpe-officers', 'The ICpEP.SE – DYCI officers page with search and group tabs', 'cover', 3),
  (4, 'game-village', 'The village of Barangay Maliwanag with its shops, villagers and tall grass', 'cover', 1),
  (4, 'game-dialogue', 'Talking to Aling Maria, the shopkeeper', 'cover', 2),
  (4, 'game-battle', 'A night battle against the Sirena, with attack, agimat, food and run options', 'cover', 3),
  (5, 'logo-aces-2526', 'ACES 2025–26 emblem in red and gold', 'contain', 1),
  (5, 'logo-aces-sakura', 'Alternate ACES mark with cherry blossoms and katakana', 'contain', 2),
  (5, 'logo-alab', 'ALAB logo: Flames of the Philippines', 'contain', 3),
  (5, 'logo-deeper', 'DEEPER logo', 'contain', 4),
  (5, 'logo-update', 'UPDATE logo: Useful Personal Data Access for Teachers and Employees', 'contain', 5),
  (6, 'pubmat-tarpaulin', 'Event tarpaulin designs: Freshmen Orientation, Chrysalis, and ACES banners', 'contain', 1),
  (6, 'design-ignite', 'Ignite GenTech: 3D lettering being built in Adobe Illustrator', 'contain', 2),
  (10, 'design-aranea', 'Aranea basketball jersey, front and back templates in Adobe Illustrator', 'contain', 1);

-- PROJECT VIDEOS
INSERT INTO project_videos (project_id, file_name, caption, sort_order) VALUES
  (11, 'clip-a', 'The traffic light model, shown on camera', 1),
  (13, 'clip-b', 'Building a circuit on a perforated prototype board', 1);

-- SERVICES
INSERT INTO services (id, slug, title, blurb, good_for, sort_order) VALUES
  (1, 'web', 'Web design & development', 'Clear, responsive websites that explain who you are and make it easy for people to get in touch.', 'Small businesses, student organizations, events and personal portfolios.', 1),
  (2, 'graphic', 'Graphic design & branding', 'Logos and print-ready layouts that look consistent, so your brand is recognised wherever it appears.', 'Organizations, publications, events and shops that need a consistent look.', 2),
  (3, 'content', 'Social media & multimedia content', 'Announcements, campaign graphics and edited photo and video that keep your page active and on-brand.', 'Organizations and small brands that post regularly and want it to look polished.', 3);

-- SERVICE FEATURES ("What you get")
INSERT INTO service_features (service_id, feature, sort_order) VALUES
  (1, 'Landing pages and small business or organization sites', 1),
  (1, 'Layouts that work on phones, tablets and desktops', 2),
  (1, 'Contact forms and clear calls to action', 3),
  (1, 'Clean, fast pages with sensible titles and descriptions for search', 4),
  (2, 'Logos and alternate marks', 1),
  (2, 'Posters, tarpaulins and event materials', 2),
  (2, 'Newsletter and publication layouts', 3),
  (2, 'Apparel and merchandise designs', 4),
  (3, 'Announcement and event graphics sized for social media', 1),
  (3, 'Campaign sets: posters, banners and vouchers', 2),
  (3, 'Photo and video editing for event coverage', 3),
  (3, 'A consistent visual style across every post', 4);

-- EXAMPLE PROJECTS UNDER EACH SERVICE
INSERT INTO service_projects (service_id, project_id, sort_order) VALUES
  (1, 1, 1),
  (1, 2, 2),
  (1, 3, 3),
  (2, 5, 1),
  (2, 8, 2),
  (2, 10, 3),
  (3, 6, 1),
  (3, 7, 2);

-- PROCESS STEPS
INSERT INTO process_steps (id, step_number, name, description) VALUES
  (1, 1, 'Discover', 'We talk about your goals, your audience and what you already have: a logo, content, examples you like.'),
  (2, 2, 'Plan', 'I send a short outline or concept direction. We agree on what will be made before any design starts.'),
  (3, 3, 'Design & build', 'I share drafts as I go, you give feedback, and I refine until it is right.'),
  (4, 4, 'Deliver', 'You get the final files or the finished site, plus a handover so you can use it with confidence.');

-- EXPERIENCE
INSERT INTO experience (id, date_range, role, organization, sort_order) VALUES
  (1, 'Aug 2026 – Present', 'Public Relations Officer', 'Institute of Computer Engineers of the Philippines (ICpEP)', 1),
  (2, 'Sep 2024 – Jul 2025', 'Multimedia Director', 'Association of Computer Enthusiast Students (ACES)', 2),
  (3, 'Aug 2023 – Jun 2024', 'Multimedia Editor', 'Association of Computer Enthusiast Students (ACES)', 3),
  (4, 'Jun 2022 – Aug 2023', 'Committee Chair', 'Supreme Student Legislative Government (SSLG)', 4);

-- EXPERIENCE DETAILS
INSERT INTO experience_items (experience_id, item, sort_order) VALUES
  (1, 'Manage the chapter’s official announcements and social media communications.', 1),
  (1, 'Promote seminars, events and activities to Computer Engineering students.', 2),
  (1, 'Coordinate with fellow officers to keep members informed and engaged.', 3),
  (2, 'Led the multimedia team in producing publication materials, photos and videos for events.', 1),
  (2, 'Oversaw the organization’s visual branding and social media content.', 2),
  (2, 'Documented and covered school and organization activities.', 3),
  (3, 'Edited photos and videos for event coverage and social media posts.', 1),
  (3, 'Designed publication materials for announcements and events.', 2),
  (4, 'Led a committee in planning and carrying out student government projects.', 1),
  (4, 'Coordinated with officers and advisers to address student concerns.', 2);

-- EDUCATION
INSERT INTO education (id, date_range, program, school, note, sort_order) VALUES
  (1, 'Aug 2024 – Present', 'BS Computer Engineering', 'Dr. Yanga’s Colleges, Inc.', 'Dean’s Lister: 1st Semester A.Y. 2024–2025 and 2nd Semester A.Y. 2025–2026', 1),
  (2, 'Aug 2023 – May 2024', 'BS Computer Science', 'STI College Caloocan', 'President Dean’s Lister: 1st and 2nd Semester A.Y. 2023–2024', 2),
  (3, 'Jun 2021 – May 2023', 'Senior High School, STEM', 'Colegio de Sto. Niño', 'Graduated with High Honors', 3);

-- AWARDS
INSERT INTO awards (id, date_label, title, issuer, sort_order) VALUES
  (1, 'Sep 2025', '1st Place, ASEAN Exhibit Poster Making', 'Dr. Yanga’s Colleges, Inc.', 1),
  (2, 'May 2023', 'Leadership Award', 'Colegio de Sto. Niño', 2),
  (3, 'May 2023', 'Outstanding Awardee, Research Paper', 'Colegio de Sto. Niño', 3),
  (4, 'May 2023', 'Academic Achiever Award, With Honors (GA 93.00%)', 'Colegio de Sto. Niño', 4),
  (5, 'May 2023', 'Certificate of Academic Excellence (average 92)', 'Colegio de Sto. Niño', 5);

-- CERTIFICATIONS (About page)
INSERT INTO certifications (id, date_label, title, issuer, sort_order) VALUES
  (1, 'Mar 19, 2026', 'AI Image Content Creation, Participant', 'IRCITE 2026 / Philippine Society of Information Technology Educators', 1),
  (2, 'Oct 2026', 'AI Tools Certification Series', 'tixu.ai: Claude for Engineers, Claude, ChatGPT, Lovable, Kling, Nano Banana', 2);

-- SKILL GROUPS
INSERT INTO skill_groups (id, name, sort_order) VALUES
  (1, 'Design & content', 1),
  (2, 'Web', 2),
  (3, 'AI tools', 3),
  (4, 'Working with people', 4);

-- SKILLS
INSERT INTO skills (group_id, skill, sort_order) VALUES
  (1, 'Graphic design', 1),
  (1, 'Logo & identity', 2),
  (1, 'Photo editing', 3),
  (1, 'Video editing', 4),
  (1, 'Social media content', 5),
  (1, 'Canva', 6),
  (2, 'HTML & CSS', 1),
  (2, 'Responsive layout', 2),
  (2, 'JavaScript', 3),
  (2, 'Node.js', 4),
  (2, 'PHP', 5),
  (2, 'Git & GitHub', 6),
  (3, 'Claude', 1),
  (3, 'ChatGPT', 2),
  (3, 'Lovable', 3),
  (3, 'Kling', 4),
  (3, 'Nano Banana', 5),
  (4, 'Event coordination', 1),
  (4, 'Public relations', 2),
  (4, 'Teamwork', 3),
  (4, 'Microsoft Office', 4);

-- CERTIFICATE GROUPS
INSERT INTO certificate_groups (id, name, lede, sort_order) VALUES
  (1, 'AI tools', 'Short courses from tixu.ai on the AI tools I use for research, coding and image and video work.', 1),
  (2, 'Academic awards', 'Awards from Colegio de Sto. Niño, where I finished Senior High School (STEM) with High Honors.', 2);

-- CERTIFICATES
INSERT INTO certificates (group_id, image_file, name, issuer, date_label, detail, sort_order) VALUES
  (1, 'cert-claude-engineers', 'Claude for Engineers', 'tixu.ai', '17 October 2026', '41 lessons', 1),
  (1, 'cert-chatgpt', 'ChatGPT', 'tixu.ai', '3 October 2026', '20 lessons', 2),
  (1, 'cert-lovable', 'Lovable', 'tixu.ai', '3 October 2026', '16 lessons', 3),
  (1, 'cert-kling', 'Kling', 'tixu.ai', '3 October 2026', '16 lessons', 4),
  (1, 'cert-nano-banana', 'Nano Banana', 'tixu.ai', '3 October 2026', '16 lessons', 5),
  (1, 'cert-claude', 'Claude', 'tixu.ai', '1 October 2026', '14 lessons', 6),
  (2, 'cert-achiever-honors-2023', 'Academic Achiever Award, With Honors', 'Colegio de Sto. Niño', '25 May 2023', 'General average of 93.00%', 1),
  (2, 'cert-academic-excellence-2023', 'Certificate of Academic Excellence', 'Colegio de Sto. Niño', '25 May 2023', 'Overall average of 92', 2),
  (2, 'cert-leadership-2023', 'Leadership Award', 'Colegio de Sto. Niño', '25 May 2023', 'For leadership ability and dedication to the school', 3),
  (2, 'cert-outstanding-research-2023', 'Outstanding Awardee, Research Paper', 'Colegio de Sto. Niño', '25 May 2023', 'Outstanding student in Research Paper', 4),
  (2, 'cert-recognition-q3-2023', 'Certificate of Recognition, With Honors', 'Colegio de Sto. Niño', '22 May 2023', '3rd quarter, S.Y. 2022–2023', 5);

-- HOME PAGE HIGHLIGHTS
INSERT INTO site_facts (fact, sort_order) VALUES
  ('Dean’s Lister for 4 semesters', 1),
  ('Led 4 student organization teams', 2),
  ('1st place, ASEAN Exhibit Poster Making', 3),
  ('3rd-year BS Computer Engineering student', 4);

-- "WORK MADE FOR" STRIP
INSERT INTO worked_with (name, sort_order) VALUES
  ('Association of Computer Enthusiast Students', 1),
  ('ICpEP', 2),
  ('Dr. Yanga’s Colleges, Inc.', 3),
  ('Batch6 Coffee', 4);

-- SAMPLE CONTACT MESSAGE (for demonstration only; real messages are added by the contact form)
INSERT INTO messages (name, email, need_type, message) VALUES
  ('Sample Visitor', 'sample@example.com', 'website', 'This is a sample message to show how the contact form data is stored.');
