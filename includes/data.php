<?php
defined('SITE_NAME') or exit; // never run this file directly

/**
 * All of the site's content lives here. Edit text, add a project, or reorder things in
 * this one file and every page updates.
 *
 * To add a project: copy an entry in $projects, give it a unique 'slug', and drop its
 * image(s) in assets/img/.
 */

/* ---------- Services ---------- */
$services = [
    [
        'slug'  => 'web',
        'title' => 'Web design & development',
        'blurb' => 'Clear, responsive websites that explain who you are and make it easy for people to get in touch.',
        'gets'  => [
            'Landing pages and small business or organization sites',
            'Layouts that work on phones, tablets and desktops',
            'Contact forms and clear calls to action',
            'Clean, fast pages with sensible titles and descriptions for search',
        ],
        'fits'  => 'Small businesses, student organizations, events and personal portfolios.',
        'work'  => ['whispr', 'oasis', 'dyci-cpe-site'],
    ],
    [
        'slug'  => 'graphic',
        'title' => 'Graphic design & branding',
        'blurb' => 'Logos and print-ready layouts that look consistent, so your brand is recognised wherever it appears.',
        'gets'  => [
            'Logos and alternate marks',
            'Posters, tarpaulins and event materials',
            'Newsletter and publication layouts',
            'Apparel and merchandise designs',
        ],
        'fits'  => 'Organizations, publications, events and shops that need a consistent look.',
        'work'  => ['aces-logos', 'newsletter', 'icpep-polo'],
    ],
    [
        'slug'  => 'content',
        'title' => 'Social media & multimedia content',
        'blurb' => 'Announcements, campaign graphics and edited photo and video that keep your page active and on-brand.',
        'gets'  => [
            'Announcement and event graphics sized for social media',
            'Campaign sets: posters, banners and vouchers',
            'Photo and video editing for event coverage',
            'A consistent visual style across every post',
        ],
        'fits'  => 'Organizations and small brands that post regularly and want it to look polished.',
        'work'  => ['social-graphics', 'batch6'],
    ],
];

/* ---------- How I work (a real sequence, so these are numbered) ---------- */
$process = [
    ['Discover', 'We talk about your goals, your audience and what you already have: a logo, content, examples you like.'],
    ['Plan', 'I send a short outline or concept direction. We agree on what will be made before any design starts.'],
    ['Design & build', 'I share drafts as I go, you give feedback, and I refine until it is right.'],
    ['Deliver', 'You get the final files or the finished site, plus a handover so you can use it with confidence.'],
];

/* ---------- Projects ----------
 * 'fit' controls how the cover image sits in its card: 'cover' fills the box,
 * 'contain' shows the whole image (best for logos, posters and wide layouts).
 */
$projects = [
    [
        'slug'     => 'whispr',
        'title'    => 'Whispr',
        'category' => 'Web app',
        'summary'  => 'An anonymous confession platform where every account still verifies back to one real person.',
        'cover'    => 'whispr',
        'fit'      => 'cover',
        'role'     => 'Design & development',
        'status'   => 'Working prototype',
        'tools'    => ['Node.js', 'Express', 'WebSockets', 'HTML & CSS', 'JavaScript'],
        'overview' => [
            'Whispr is an anonymous confession board with a modern, youthful look. People post under a made-up name and avatar and never reveal their real identity, but each account still has to prove it belongs to one real, unique person. That keeps the space honest and stops it from being flooded with throwaway accounts.',
            'Confessions are tagged by category and live hashtags, reacted to with “relate” instead of a like, and discussed in threaded comments. Trending hashtags are worked out from the last 24 hours of real activity, and enough community flags will hide a post until a moderator reviews it.',
        ],
        'points'   => [
            'Sign in with Google or Discord, or with email confirmed by a 6-digit code.',
            'A short, deliberately vague profile adds personality without breaking anonymity.',
            'Follow requests unlock a private shared drawing canvas between two people, updated live.',
            'Send a 10–15 second clip of a real song that plays full-screen once and then disappears.',
            'Uploaded photos are scanned for faces and blocked, so avatars stay anonymous by design.',
            'Built with a small Node.js and Express back end, vanilla JavaScript on the front end and no framework or build step.',
        ],
    ],
    [
        'slug'     => 'oasis',
        'title'    => 'OASIS',
        'category' => 'Web system',
        'summary'  => 'Attendance and clearance for a college of computer studies: students scan their ID at events, earn points and see if they are cleared.',
        'cover'    => 'oasis',
        'fit'      => 'contain',
        'role'     => 'Team project',
        'status'   => 'Live',
        'tools'    => ['React', 'Vite', 'Tailwind CSS', 'Firebase Auth', 'Cloud Firestore', 'Vercel'],
        'links'    => [
            ['Open the student site', 'https://softwareengineering-flax.vercel.app/'],
        ],
        'overview' => [
            'OASIS (Officer & Admin System for Involvement & Students) is the attendance and clearance system for the College of Computer Studies at Dr. Yanga’s Colleges, run with the Association of Computer Enthusiast Students (ACES). It replaces paper forms and sign-in sheets: students scan their ID at an event, earn points for every event and requirement, and see how close they are to semester clearance.',
            'It is three connected sites on one shared database. Students use the student site, officers manage everything from the admin console, and staff at the door use a scanner site. The student login is a split screen in maroon and yellow with a terminal-style form, and the rest of the system uses a dark cyberpunk-style interface with a falling-code background and a full-screen check-in kiosk.',
        ],
        'points'   => [
            'Student site: log in with a student number, see your points, progress toward clearance, recent activity and a requirements checklist, with a points breakdown shown as a HUD with charts.',
            'Students also get events and notifications tabs, a profile with photo, bio, talent and hobbies, and a cyberpunk-styled ID card with a barcode, a QR code and a live clearance panel.',
            'Admin console: a dashboard with live counts and an activity feed, a student roster with ID cards, requirements and events with point values, and bulk import of students from Excel or CSV.',
            'Admins create student accounts in bulk with temporary passwords. Students must set their own password on first login, and a “forgot my password” request goes to the admin.',
            'Scanner site: staff pick an event that is open today and launch a full-screen kiosk. Scanning a barcode or QR code records attendance and shows the student their result.',
            'Scanning only works on the event’s own date, and events limited to one program (BSIT, BSCpE or BSCS) reject students from the others.',
            'A student is cleared when their points reach the total of the requirements and events that apply to their program.',
            'Access is enforced in the database rules: admins, scanners and students each get different permissions, and students can only edit their own profile.',
        ],
        'gallery'  => [
            ['oasis-landing', 'The landing page: pick your program, see how it works, then log in', 'contain'],
            ['oasis-how-it-works', 'The “Attend. Scan. Get cleared.” section of the student site: events, ID scan and points', 'contain'],
        ],
    ],
    [
        'slug'     => 'dyci-cpe-site',
        'title'    => 'DYCI Computer Engineering website',
        'category' => 'Website',
        'summary'  => 'A dark, circuit-board themed site for a college Computer Engineering program, with a 3D hero built in pure CSS and no JavaScript.',
        'cover'    => 'cpe-home',
        'fit'      => 'cover',
        'role'     => 'Design & development',
        'status'   => 'Working site',
        'tools'    => ['PHP', 'HTML & CSS', 'CSS 3D transforms', 'No JavaScript'],
        'overview' => [
            'A website for the BS Computer Engineering program at Dr. Yanga’s Colleges and the ICpEP.SE – DYCI student chapter. It presents the program, laboratories, faculty, officers and admissions in one dark “circuit board” world with orange accents, using the college’s TECH seal as its logo.',
            'It is written in plain PHP, HTML and CSS with no JavaScript. The hero is a 3D circuit board drawn entirely with CSS transforms, and it tilts toward your cursor. Tabs, selectable career cards and the admissions steps are all built with CSS only.',
        ],
        'points'   => [
            'Home page with a 3D CSS circuit board that follows the cursor, using hidden hover zones instead of scripts.',
            'Program overview with six study areas, nine career paths shown as selectable cards, and a four-step admissions guide.',
            'Pages for four laboratories, ten faculty members with search, and a news and events section.',
            'ICpEP.SE – DYCI officers page with search and group filters handled on the server.',
            'All content is kept as data in one PHP file, so people and events can be updated without touching the page code.',
            'Inquiry form that saves messages privately on the server, with a hidden spam trap and validation.',
            'Layout adapts to phones with a CSS-only mobile menu.',
        ],
        'gallery'  => [
            ['cpe-about', 'The about section, with a chip illustration and the reasons to study Computer Engineering', 'cover'],
            ['cpe-labs', 'The laboratories page: Sandbox, Nexus, Raise and Inspire labs', 'cover'],
            ['cpe-officers', 'The ICpEP.SE – DYCI officers page with search and group tabs', 'cover'],
        ],
    ],
    [
        'slug'     => 'bayani-quest',
        'group'    => 'game',
        'title'    => 'Bayani Quest',
        'category' => 'Game',
        'summary'  => 'A Filipino folklore RPG in the browser: explore a barangay, catch mythical creatures and battle them, all drawn on an HTML5 canvas.',
        'cover'    => 'game-title',
        'fit'      => 'cover',
        'role'     => 'Design & development',
        'status'   => 'Playable prototype',
        'tools'    => ['HTML5 Canvas', 'JavaScript', 'Pixel art'],
        'links'    => [
            ['View the code on GitHub', 'https://github.com/seveii/GAME-QUEST'],
        ],
        'overview' => [
            'Bayani Quest (“bayani” means hero) is a top-down role-playing game inspired by Filipino folklore, played in Filipino. You explore Barangay Maliwanag, talk to villagers, and venture into tall grass and rice fields where creatures from Philippine myth (nilalang) appear: the Tikbalang, Diwata, Nuno sa Punso, Kapre, Santelmo and Sirena.',
            'The whole game is a single HTML file and runs on a 640 × 480 canvas with crisp pixel-art rendering. Walking, wandering encounters, dialogue, shopping and turn-based battles are all written in plain JavaScript with no game engine.',
        ],
        'points'   => [
            'Top-down village and field map with tile textures for grass, sea, wood, lava, a stove, a chest and bookshelves.',
            'Animated player character with front, back, left and right frames, including a ten-frame walking cycle.',
            'Random encounters that depend on the terrain: tall grass is the most dangerous, then rice fields, then open grass.',
            'Six folklore creatures, each with its own type, stats, moves and a description of the myth behind it.',
            'Turn-based battles with attack, throw an agimat charm to catch the creature, use food to heal, or run away. A party of up to three catches.',
            'Villagers with typed-out dialogue: a healer who restores your party, a shopkeeper selling agimat and food, a guide and a gossiping child.',
            'Battle backdrops drawn in code for a night forest, an ocean at night and a lava crater, matching each creature’s habitat.',
            'Arrow keys to move, Z or Enter to confirm and talk, X to go back.',
        ],
        'gallery'  => [
            ['game-village', 'The village of Barangay Maliwanag with its shops, villagers and tall grass', 'cover'],
            ['game-dialogue', 'Talking to Aling Maria, the shopkeeper', 'cover'],
            ['game-battle', 'A night battle against the Sirena, with attack, agimat, food and run options', 'cover'],
        ],
    ],
    [
        'slug'     => 'aces-logos',
        'title'    => 'ACES and publication logos',
        'category' => 'Logo & identity',
        'summary'  => 'The ACES emblem, an alternate cherry-blossom mark, and logos for student publications.',
        'cover'    => 'logo-collage',
        'fit'      => 'cover',
        'role'     => 'Logo design',
        'status'   => 'Completed',
        'tools'    => ['Canva'],
        'overview' => [
            'A set of logos made for the Association of Computer Enthusiast Students and related student publications. The main emblem for 2025–26 is a bold, three-dimensional mark in deep red and gold with technology icons around the ACES wordmark.',
            'For events and campaigns with a softer tone, I also designed an alternate cherry-blossom version with the name in katakana. The publication logos each carry a descriptive tagline so the name is easy to understand.',
        ],
        'points'   => [
            'ACES 2025–26 emblem: red and gold, with gears, a globe, a robot, a light bulb and code symbols.',
            'Alternate ACES mark: cherry blossoms with the name written in katakana.',
            'Publication logos for ALAB, DEEPER and UPDATE.',
        ],
        'gallery'  => [
            ['logo-aces-2526', 'ACES 2025–26 emblem in red and gold', 'contain'],
            ['logo-aces-sakura', 'Alternate ACES mark with cherry blossoms and katakana', 'contain'],
            ['logo-alab', 'ALAB logo: Flames of the Philippines', 'contain'],
            ['logo-deeper', 'DEEPER logo', 'contain'],
            ['logo-update', 'UPDATE logo: Useful Personal Data Access for Teachers and Employees', 'contain'],
        ],
    ],
    [
        'slug'     => 'social-graphics',
        'title'    => 'Event & social media graphics',
        'category' => 'Social media',
        'summary'  => 'Announcements, awareness days, exam reminders and tarpaulins for a college organization.',
        'cover'    => 'pubmat-grid',
        'fit'      => 'cover',
        'role'     => 'Graphic design',
        'status'   => 'Completed',
        'tools'    => ['Canva', 'Adobe Illustrator'],
        'overview' => [
            'A running set of publication materials made for the Association of Computer Enthusiast Students and the College of Computer Studies. They cover national holidays and awareness days, exam week reminders, tech news and event announcements.',
            'Each piece uses the same layout rules, logos and type so the organization is recognisable at a glance, while the style changes to suit the occasion, from playful exam reminders to a serious tribute.',
        ],
        'points'   => [
            'Awareness days and holidays such as National Heroes Day, Ninoy Aquino Day and Marcelo del Pilar Day.',
            'Exam week reminders, a tech news series and the Ignite GenTech event poster.',
            'Event tarpaulins, including the Chrysalis freshmen orientation.',
        ],
        'gallery'  => [
            ['pubmat-tarpaulin', 'Event tarpaulin designs: Freshmen Orientation, Chrysalis, and ACES banners', 'contain'],
            ['design-ignite', 'Ignite GenTech: 3D lettering being built in Adobe Illustrator', 'contain'],
        ],
    ],
    [
        'slug'     => 'batch6',
        'title'    => 'Batch6 Coffee campaign',
        'category' => 'Campaign',
        'summary'  => 'A campaign set for a coffee brand: poster, banner and discount vouchers, used at a live event booth.',
        'cover'    => 'campaign-batch6',
        'fit'      => 'contain',
        'role'     => 'Campaign design',
        'status'   => 'Completed',
        'tools'    => ['Canva'],
        'overview' => [
            'A coffee campaign called “Sinaglayag”, built around a hand-drawn style with coffee gear illustrations on a crumpled paper texture. The set includes a vertical poster, a wide banner and three discount vouchers.',
            'The vouchers (30%, 20% and 10% off) are numbered so each one can be tracked, and the designs were used at a real event booth.',
        ],
        'points'   => [
            'Poster and banner with a consistent illustrated look.',
            'Cut-out voucher designs with different discount levels.',
            'Designed to be used in print at a live event.',
        ],
    ],
    [
        'slug'     => 'newsletter',
        'title'    => 'OmneByte newsletter',
        'category' => 'Publication',
        'summary'  => 'Multi-page newsletter layout for a college of computer studies.',
        'cover'    => 'newsletter-omnebyte',
        'fit'      => 'contain',
        'role'     => 'Layout design',
        'status'   => 'Completed',
        'tools'    => ['Canva'],
        'overview' => [
            'OmneByte is the official newsletter of the College of Computer Studies at Dr. Yanga’s Colleges. I worked on the layout: a front page with a headline story and sidebar items, followed by inner news pages with columns, photos and pull-out headlines.',
            'The aim was to make dense news content easy to scan, with a clear hierarchy and consistent columns from page to page.',
        ],
        'points'   => [
            'Front page with a masthead, lead story and section tabs.',
            'Inner pages with multi-column text, photos and featured stories.',
            'A consistent grid so every page feels part of one publication.',
        ],
    ],
    [
        'slug'     => 'japan-poster',
        'title'    => 'Japan × DYCI exhibit poster',
        'category' => 'Poster',
        'summary'  => 'An information-packed two-page poster on Japan, built around a red, white and black theme.',
        'cover'    => 'poster-japan-dyci',
        'fit'      => 'contain',
        'role'     => 'Poster design',
        'status'   => 'Completed',
        'tools'    => ['Canva'],
        'overview' => [
            'A two-page poster made for an ASEAN-themed exhibit. The left page introduces Japan with a large headline, a map, food illustration and a temple gate. The right page lists top tourist attractions and fun facts.',
            'Cherry blossom branches and a limited red, black and white palette tie the two pages together while keeping a lot of text readable.',
        ],
        'points'   => [
            'Large headline typography with illustrated Japanese elements.',
            'A “Top 5” attractions column with photos and short descriptions.',
            'A fun facts panel and decorative cherry blossoms.',
        ],
    ],
    [
        'slug'     => 'icpep-polo',
        'title'    => 'ICpEP polo and Aranea jersey',
        'category' => 'Apparel',
        'summary'  => 'Two sublimation apparel designs: a navy circuit-board polo and a red blackletter basketball jersey.',
        'cover'    => 'shirt-icpep',
        'fit'      => 'contain',
        'role'     => 'Apparel design',
        'status'   => 'Polo completed, jersey in progress',
        'tools'    => ['Canva', 'Adobe Illustrator'],
        'overview' => [
            'A sublimation polo shirt design for the Institute of Computer Engineers of the Philippines. A chevron colour block and a circuit-line pattern rising from the hem make a technical look that still feels clean. The back carries the institute’s full name and the school and organization marks, laid out to stay readable across the shoulders.',
            'The second design is the “Aranea” basketball jersey, drawn in Adobe Illustrator. Aranea is the Latin word for spider, and the jersey is built around that idea: a deep red, weathered texture, a blackletter name across the chest and a large black spider climbing in from the lower corner, with black trim around the neckline and armholes.',
        ],
        'points'   => [
            'ICpEP polo: navy and white colour blocking with a V-shaped chest panel.',
            'ICpEP polo: circuit-board pattern as the signature detail, with front and back views prepared for sublimation printing.',
            'Aranea jersey: blackletter wordmark in cream on a textured red field.',
            'Aranea jersey: spider illustration cropped off the edge for movement, with black trim to give the jersey its shape.',
            'Aranea jersey: front and back templates laid out side by side on one artboard in Adobe Illustrator.',
        ],
        'gallery'  => [
            ['design-aranea', 'Aranea basketball jersey, front and back templates in Adobe Illustrator', 'contain'],
        ],
    ],
    [
        'slug'     => 'traffic-light-model',
        'group'    => 'engineering',
        'title'    => 'Miniature traffic light model',
        'category' => 'Engineering project',
        'summary'  => 'A hand-built town scene with an LED traffic light at its centre, made from craft materials.',
        'cover'    => 'eng-traffic-light',
        'fit'      => 'cover',
        'pos'      => '50% 42%',
        'role'     => 'Design & build',
        'status'   => 'Completed',
        'tools'    => ['LEDs', 'Model-making materials'],
        'overview' => [
            'A small-scale model town built for a Computer Engineering class. A tall black pole at the centre carries a column of LEDs in traffic-light colors, set in a ring of pebbles and surrounded by moss-covered ground.',
            'Around it sit small huts made from wooden sticks and cardboard, model trees and palms, and a road with dashed lane markings. The scene makes the electronics easy to understand because you can see exactly where the light would stand in a real neighborhood.',
        ],
        'points'   => [
            'LED traffic light on a handmade pole and base.',
            'Pebble ring, moss ground, model trees and palms for the landscape.',
            'Huts built from wooden sticks and cardboard with a thatched look.',
            'A short video of the model is included below.',
        ],
        'videos'   => [
            ['clip-a', 'The traffic light model, shown on camera'],
        ],
    ],
    [
        'slug'     => 'laptop-motherboard',
        'group'    => 'engineering',
        'title'    => 'Labeled laptop motherboard (Intel i3)',
        'category' => 'Engineering project',
        'summary'  => 'A framed display of a real laptop motherboard with every major part and power rail labeled.',
        'cover'    => 'eng-motherboard',
        'fit'      => 'cover',
        'pos'      => '50% 38%',
        'role'     => 'Group member',
        'status'   => 'Completed',
        'tools'    => ['Hardware identification', 'Printed labels', 'Display frame'],
        'overview' => [
            'A group project that turns a real Intel i3 laptop motherboard into a study display. The board is mounted in a wooden frame and every important component is identified with a printed label, so anyone can see where the processor, memory and wireless card sit and which supply feeds what.',
            'Made together with John Kenneth P. Delatina and Thimothy Javier.',
        ],
        'points'   => [
            'Core parts labeled: processor, RAM, embedded controller, HD audio codec, WLAN, companion chip, clock synthesizer and DCON.',
            'Storage and card slots labeled: SD/MMC and the internal microSD slot.',
            'Power rails identified: +5 V, +3.3 V, 3VPCU, +2.8 V, +1.8 V memory, +1.2 V, +1.05 V and VCORE.',
            'Supporting circuits labeled: battery charger, LCD power and backlight power.',
        ],
    ],
    [
        'slug'     => 'circuit-prototyping',
        'group'    => 'engineering',
        'title'    => 'Circuit prototyping',
        'category' => 'Engineering project',
        'summary'  => 'Hands-on circuit building on breadboard and perforated board for Computer Engineering lab work.',
        'cover'    => 'eng-breadboard',
        'fit'      => 'cover',
        'pos'      => '50% 55%',
        'role'     => 'Lab work',
        'status'   => 'Ongoing coursework',
        'tools'    => ['Breadboard', 'Perforated board', 'LEDs & resistors', 'Jumper wires'],
        'overview' => [
            'Practical electronics from my Computer Engineering lab sessions. The breadboard circuit shown here is powered through a power-supply module from a 9 V battery, with LEDs, resistors, a trimmer potentiometer and a tangle of color-coded jumper wires.',
            'The video shows the next step: laying parts out on a perforated prototype board, which is how a tested circuit becomes something more permanent.',
        ],
        'points'   => [
            'Breadboard circuit with a power module, LEDs, resistors and a trimmer potentiometer.',
            'Color-coded jumper wiring to keep the layout readable.',
            'A video of a circuit being built on a perforated board.',
        ],
        'videos'   => [
            ['clip-b', 'Building a circuit on a perforated prototype board'],
        ],
    ],
];

/* ---------- About: experience, education, awards, certifications, skills ---------- */
$experience = [
    [
        'dates' => 'Aug 2026 – Present',
        'role'  => 'Public Relations Officer',
        'org'   => 'Institute of Computer Engineers of the Philippines (ICpEP)',
        'items' => [
            'Manage the chapter’s official announcements and social media communications.',
            'Promote seminars, events and activities to Computer Engineering students.',
            'Coordinate with fellow officers to keep members informed and engaged.',
        ],
    ],
    [
        'dates' => 'Sep 2024 – Jul 2025',
        'role'  => 'Multimedia Director',
        'org'   => 'Association of Computer Enthusiast Students (ACES)',
        'items' => [
            'Led the multimedia team in producing publication materials, photos and videos for events.',
            'Oversaw the organization’s visual branding and social media content.',
            'Documented and covered school and organization activities.',
        ],
    ],
    [
        'dates' => 'Aug 2023 – Jun 2024',
        'role'  => 'Multimedia Editor',
        'org'   => 'Association of Computer Enthusiast Students (ACES)',
        'items' => [
            'Edited photos and videos for event coverage and social media posts.',
            'Designed publication materials for announcements and events.',
        ],
    ],
    [
        'dates' => 'Jun 2022 – Aug 2023',
        'role'  => 'Committee Chair',
        'org'   => 'Supreme Student Legislative Government (SSLG)',
        'items' => [
            'Led a committee in planning and carrying out student government projects.',
            'Coordinated with officers and advisers to address student concerns.',
        ],
    ],
];

$education = [
    ['Aug 2024 – Present', 'BS Computer Engineering', 'Dr. Yanga’s Colleges, Inc.', 'Dean’s Lister: 1st Semester A.Y. 2024–2025 and 2nd Semester A.Y. 2025–2026'],
    ['Aug 2023 – May 2024', 'BS Computer Science', 'STI College Caloocan', 'President Dean’s Lister: 1st and 2nd Semester A.Y. 2023–2024'],
    ['Jun 2021 – May 2023', 'Senior High School, STEM', 'Colegio de Sto. Niño', 'Graduated with High Honors'],
];

$awards = [
    ['Sep 2025', '1st Place, ASEAN Exhibit Poster Making', 'Dr. Yanga’s Colleges, Inc.'],
    ['May 2023', 'Leadership Award', 'Colegio de Sto. Niño'],
    ['May 2023', 'Outstanding Awardee, Research Paper', 'Colegio de Sto. Niño'],
    ['May 2023', 'Academic Achiever Award, With Honors (GA 93.00%)', 'Colegio de Sto. Niño'],
    ['May 2023', 'Certificate of Academic Excellence (average 92)', 'Colegio de Sto. Niño'],
];

$certifications = [
    ['Mar 19, 2026', 'AI Image Content Creation, Participant', 'IRCITE 2026 / Philippine Society of Information Technology Educators'],
    ['Oct 2026', 'AI Tools Certification Series', 'tixu.ai: Claude for Engineers, Claude, ChatGPT, Lovable, Kling, Nano Banana'],
];

/* ---------- Certificate scans (shown on certificates.php) ----------
 * Each entry: [image name in assets/img, title, issuer, date, detail] */
$certificate_groups = [
    'AI tools' => [
        'lede'  => 'Short courses from tixu.ai on the AI tools I use for research, coding and image and video work.',
        'items' => [
            ['cert-claude-engineers', 'Claude for Engineers', 'tixu.ai', '17 October 2026', '41 lessons'],
            ['cert-chatgpt', 'ChatGPT', 'tixu.ai', '3 October 2026', '20 lessons'],
            ['cert-lovable', 'Lovable', 'tixu.ai', '3 October 2026', '16 lessons'],
            ['cert-kling', 'Kling', 'tixu.ai', '3 October 2026', '16 lessons'],
            ['cert-nano-banana', 'Nano Banana', 'tixu.ai', '3 October 2026', '16 lessons'],
            ['cert-claude', 'Claude', 'tixu.ai', '1 October 2026', '14 lessons'],
        ],
    ],
    'Academic awards' => [
        'lede'  => 'Awards from Colegio de Sto. Niño, where I finished Senior High School (STEM) with High Honors.',
        'items' => [
            ['cert-achiever-honors-2023', 'Academic Achiever Award, With Honors', 'Colegio de Sto. Niño', '25 May 2023', 'General average of 93.00%'],
            ['cert-academic-excellence-2023', 'Certificate of Academic Excellence', 'Colegio de Sto. Niño', '25 May 2023', 'Overall average of 92'],
            ['cert-leadership-2023', 'Leadership Award', 'Colegio de Sto. Niño', '25 May 2023', 'For leadership ability and dedication to the school'],
            ['cert-outstanding-research-2023', 'Outstanding Awardee, Research Paper', 'Colegio de Sto. Niño', '25 May 2023', 'Outstanding student in Research Paper'],
            ['cert-recognition-q3-2023', 'Certificate of Recognition, With Honors', 'Colegio de Sto. Niño', '22 May 2023', '3rd quarter, S.Y. 2022–2023'],
        ],
    ],
];

$skills = [
    'Design & content' => ['Graphic design', 'Logo & identity', 'Photo editing', 'Video editing', 'Social media content', 'Canva'],
    'Web'              => ['HTML & CSS', 'Responsive layout', 'JavaScript', 'Node.js', 'PHP', 'Git & GitHub'],
    'AI tools'         => ['Claude', 'ChatGPT', 'Lovable', 'Kling', 'Nano Banana'],
    'Working with people' => ['Event coordination', 'Public relations', 'Teamwork', 'Microsoft Office'],
];

/* ---------- Short highlights shown on the home page ---------- */
$facts = [
    'Dean’s Lister for 4 semesters',
    'Led 4 student organization teams',
    '1st place, ASEAN Exhibit Poster Making',
    '3rd-year BS Computer Engineering student',
];

/* Organizations the work was made for (plain text, not logos). */
$worked_with = [
    'Association of Computer Enthusiast Students',
    'ICpEP',
    'Dr. Yanga’s Colleges, Inc.',
    'Batch6 Coffee',
];
