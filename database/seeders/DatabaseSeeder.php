<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedUsers();
        $this->seedTeches();
        $this->seedProjects();
        $this->seedExperiences();
        $this->seedCertificates();
        $this->seedProfile();
    }

    private function seedUsers(): void
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@miv.best',
            'password' => Hash::make('miftakul789'),
        ]);
    }

    // -------------------------------------------------------------------------
    // TECHES
    // -------------------------------------------------------------------------
    private function seedTeches(): void
    {
        $teches = [
            ['name' => 'Javascript', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563550/javascript.svg'],
            ['name' => 'Typescript', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563536/typescript.svg'],
            ['name' => 'TailwindCSS', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563537/tailwindcss.svg'],
            ['name' => 'React', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563542/react.svg'],
            ['name' => 'NextJS', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563546/nextjs.svg'],
            ['name' => 'MongoDB', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563548/mongodb.svg'],
            ['name' => 'PostgreSQL', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563544/postgresql.svg'],
            ['name' => 'Github', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563555/github.svg'],
            ['name' => 'Golang', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563552/golang.svg'],
            ['name' => 'Redis', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto,w_400/v1754563540/redis.svg'],
            ['name' => 'Docker', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/v1768187151/Docker_m7o1hw.svg'],
            ['name' => 'Gitlab', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/v1768187151/GitLab_dx11mz.svg'],
            ['name' => 'Linux', 'icon' => 'https://res.cloudinary.com/dblibr1t2/image/upload/v1768187346/Linux_yz3bmj.svg'],
        ];

        foreach ($teches as $tech) {
            DB::table('teches')->insertOrIgnore([
                'name'       => $tech['name'],
                'icon'       => $tech['icon'],
                'color'      => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ Teches seeded: ' . count($teches) . ' records');
    }

    // -------------------------------------------------------------------------
    // PROJECTS
    // -------------------------------------------------------------------------
    private function seedProjects(): void
    {
        $projects = [
            [
                'title'             => 'Sanggar Tari',
                'description'       => 'This website featuring content related to JKT48. It showcases updates on theater performances, merchandise, and news about the group. The design is minimalistic, with an emphasis on upcoming events and promotional materials. The structure hints at a site for fans to stay informed about JKT48 activities.',
                'url'               => 'https://sanggartari.miftech.web.id',
                'github_link'       => 'https://github.com/MuhammadMiftaa/JKT48-NextJS',
                'web_view_image'    => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754808262/sanggartari-desktop.png',
                'mobile_view_image' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754808260/sanggartari-mobile.png',
                'show'              => true,
                'tech_stack'        => ['Typescript', 'React', 'NextJS', 'TailwindCSS', 'Firebase'],
            ],
            [
                'title'             => 'Tagih Janji',
                'description'       => 'Tagih Janji website is a website article that contains promises from politicians. This website also provides a feature to write articles and upload them publicly.',
                'url'               => 'https://tagih-janji.vercel.app',
                'github_link'       => 'https://github.com/MuhammadMiftaa/Tagih-Janji-MongoDB',
                'web_view_image'    => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754808871/tagihjanji-desktop.png',
                'mobile_view_image' => null,
                'show'              => false,
                'tech_stack'        => ['Typescript', 'React', 'NextJS', 'TailwindCSS', 'MongoDB'],
            ],
            [
                'title'             => 'Shopative',
                'description'       => 'Shopative is a website that provides a platform for users to buy and sell products. It features a dashboard for sellers to manage their products and orders. The design is clean and user-friendly, with a focus on product images and descriptions.',
                'url'               => 'https://shopative-dashboard.vercel.app',
                'github_link'       => 'https://github.com/MuhammadMiftaa/Shopative-Dashboard',
                'web_view_image'    => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754808873/shopative-desktop.png',
                'mobile_view_image' => null,
                'show'              => false,
                'tech_stack'        => ['Typescript', 'React', 'NextJS', 'TailwindCSS', 'MongoDB', 'AWS S3'],
            ],
            [
                'title'             => 'Leksanawara',
                'description'       => 'Leksanawara is a scalable monitoring system that focuses on user convenience and comfort, allowing them to monitor energy consumption in real-time, identify electricity-wasting devices, and make wiser decisions to reduce bills and improve efficiency.',
                'url'               => 'https://leksanawara.vercel.app',
                'github_link'       => 'https://github.com/MuhammadMiftaa/LEKSANAWARA',
                'web_view_image'    => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754808261/leksanawara-desktop.png',
                'mobile_view_image' => null,
                'show'              => true,
                'tech_stack'        => ['Golang', 'Typescript', 'React', 'TailwindCSS', 'PostgreSQL', 'Redis', 'GeminiAI', 'Cloudinary'],
            ],
            [
                'title'             => 'Ngekos',
                'description'       => 'Ngekos is a mobile-focused Online Travel Agency (OTA) website. Ngekos provides 2 main views, namely the dashboard / CMS which is used to manage lodging data by the admin and the landing page for users to book lodging.',
                'url'               => 'https://ngekos.up.railway.app',
                'github_link'       => 'https://github.com/MuhammadMiftaa/Ngekos',
                'web_view_image'    => null,
                'mobile_view_image' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754808871/ngekos-mobile.png',
                'show'              => false,
                'tech_stack'        => ['Laravel 11', 'Filament', 'Midtrans', 'MySQL', 'Twilio', 'TailwindCSS'],
            ],
            [
                'title'             => 'Izy Clean',
                'description'       => 'Designed and developed a responsive and SEO-optimized landing page to promote a professional cleaning service operating in Surabaya and surrounding areas. The website includes key sections such as Home, Services, About Us, Articles, and Contact, aiming to inform potential clients and increase brand visibility. Built using ReactJS and Tailwind CSS, the site was optimized for performance and search engines, successfully indexed on Google for the keyword "Cleaning Service Surabaya", helping the business reach a broader audience online.',
                'url'               => 'https://izyclean.id/',
                'github_link'       => 'https://github.com/MuhammadMiftaa/izyclean',
                'web_view_image'    => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754557747/izyclean-desktop.png',
                'mobile_view_image' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754557738/izyclean-mobile.png',
                'show'              => true,
                'tech_stack'        => ['Typescript', 'React', 'MySQL', 'TailwindCSS', 'SEO'],
            ],
            [
                'title'             => 'Primatrans Group',
                'description'       => 'Developed a responsive landing page for Primatrans Group, a holding company with two subsidiaries: Primatrans Jaya Express (logistics and freight forwarding) and Prima Jaya Sembada (HR outsourcing and staffing solutions). The website showcases each company\'s profile, core services, business history, and strategic partnerships. Built using ReactJS, the landing page is designed to enhance the group\'s digital presence, improve client engagement, and provide a centralized platform for presenting company identity and services to potential partners.',
                'url'               => 'https://primatrans.id/',
                'github_link'       => 'https://github.com/MuhammadMiftaa/primatrans',
                'web_view_image'    => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754557741/primatrans-desktop.png',
                'mobile_view_image' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754557738/primatrans-mobile.png',
                'show'              => true,
                'tech_stack'        => ['Typescript', 'React', 'MySQL', 'TailwindCSS', 'SEO', 'Laravel'],
            ],
            [
                'title'             => 'Refina',
                'description'       => 'Refina is a comprehensive web-based financial management dashboard designed to help users track, analyze, and optimize their personal or business finances. It provides an intuitive interface to record income and expenses, view transaction history within specific time periods, and gain valuable insights into financial performance.',
                'url'               => 'https://refina.miftech.web.id/',
                'github_link'       => 'https://github.com/MuhammadMiftaa/Refina',
                'web_view_image'    => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754562857/refina-desktop.png',
                'mobile_view_image' => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754562856/refina-mobile.png',
                'show'              => true,
                'tech_stack'        => ['Typescript', 'React', 'Vite PWA', 'TailwindCSS', 'OAuth', 'Go Gin', 'Minio', 'SMTP', 'Redis', 'PostgreSQL', 'RabbitMQ', 'Gitlab CI', 'Docker', 'Nginx'],
            ],
            [
                'title'             => 'UMKMGo',
                'description'       => 'UMKMGO is an integrated digital platform designed to empower Indonesian MSMEs through a mobile application and web dashboard that facilitate access to training, certification, and funding programs. By categorizing users into Affirmative and Productive groups, the system ensures targeted assistance while enabling the government to conduct transparent verification and real-time monitoring of business development.',
                'url'               => 'https://pwa-umkmgo.miftech.web.id',
                'github_link'       => 'https://github.com/MuhammadMiftaa/UMKMGo',
                'web_view_image'    => 'https://res.cloudinary.com/dblibr1t2/image/upload/v1768112349/UMKMGo%20Web.png',
                'mobile_view_image' => 'https://res.cloudinary.com/dblibr1t2/image/upload/v1768112349/UMKMGo%20App.png',
                'show'              => true,
                'tech_stack'        => ['Typescript', 'React', 'Vite PWA', 'TailwindCSS', 'PostgreSQL', 'GitlabCI', 'Docker', 'Nginx', 'Minio', 'Vault', 'Go Fiber'],
            ],
        ];

        foreach ($projects as $project) {
            $techStack = $project['tech_stack'];
            unset($project['tech_stack']);

            $projectId = DB::table('projects')->insertGetId([
                'title'             => $project['title'],
                'description'       => $project['description'],
                'url'               => $project['url'],
                'github_link'       => $project['github_link'],
                'web_view_image'    => $project['web_view_image'],
                'mobile_view_image' => $project['mobile_view_image'],
                'show'              => $project['show'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);

            foreach ($techStack as $tech) {
                DB::table('project_tech_stacks')->insert([
                    'project_id' => $projectId,
                    'name'       => $tech,
                    'icon'       => null,
                    'color'      => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('✅ Projects seeded: ' . count($projects) . ' records');
    }

    // -------------------------------------------------------------------------
    // EXPERIENCES
    // -------------------------------------------------------------------------
    private function seedExperiences(): void
    {
        $experiences = [
            [
                'title'       => 'Fullstack Golang & AI',
                'company'     => 'PT. Ruang Raya Indonesia (Ruangguru)',
                'location'    => 'Online',
                'logo'        => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754557037/ruangguru.webp',
                'start_date'  => '2024-09-09',
                'end_date'    => '2024-12-31',
                'tech_stack'  => ['HTML&CSS', 'Golang', 'AI', 'Javascript', 'React', 'GORM', 'PostgreSQL'],
                'job_desks'   => [
                    'Develop web applications using ReactJS, HTML, CSS, and JavaScript, with an understanding of Single Page Applications and responsive design.',
                    'Implement version control using Git and GitHub, including handling merge requests and managing projects in repositories.',
                    'Build and manage RESTful APIs with HTTP methods, while understanding response codes and authentication.',
                    'Use Golang for application development, including CRUD operations, debugging, and integration with PostgreSQL databases.',
                    'Deploy applications to hosting services like Netlify, Vercel, or GitHub Pages, and understand the production build process.',
                ],
            ],
            [
                'title'       => 'Web Developer Intern',
                'company'     => 'PT. Primatrans Jaya Express',
                'location'    => 'Onsite',
                'logo'        => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754557037/primatransjayaexpress.webp',
                'start_date'  => '2025-02-03',
                'end_date'    => '2025-05-03',
                'tech_stack'  => ['HTML&CSS', 'Typescript', 'React', 'Vite PWA', 'Laravel', 'Tailwind', 'MySQL', 'Vue', 'Github', 'SEO'],
                'job_desks'   => [
                    'Designed and developed responsive landing pages and company profile websites using ReactJS and Tailwind CSS.',
                    'Built a Progressive Web App (PWA) for Gokopi\'s sales operation with real-time transaction features.',
                    'Improved and redesigned an existing HRIS dashboard interface built with VueJS.',
                    'Developed admin dashboards and backend APIs using Laravel.',
                    'Conducted frontend-backend integration via REST APIs for real-time data syncing.',
                ],
            ],
            [
                'title'       => 'Backend Developer Intern',
                'company'     => 'PT. Kita Semua Satu (Meda Technology)',
                'location'    => 'Onsite',
                'logo'        => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754557037/medatechnology.jpg',
                'start_date'  => '2025-05-11',
                'end_date'    => '2025-11-11',
                'tech_stack'  => ['Go', 'Pocketbase', 'SQLite', 'PostgreSQL', 'Redis', 'Xendit', 'Postman', 'REST API', 'Gitlab', 'Agile'],
                'job_desks'   => [
                    'Designed and structured relational databases by creating Entity Relationship Diagrams (ERDs) to model data relationships.',
                    'Built and implemented relational databases using PostgreSQL and SQLite, optimizing schema for performance and scalability.',
                    'Developed RESTful APIs to enable seamless integration between frontend and backend systems.',
                    'Refactored codebase to ensure clean, modular, and reusable code, following best practices and design patterns.',
                    'Enhanced API security by implementing input validation and sanitization across all endpoints.',
                    'Automated periodic tasks such as data updates using cron jobs and custom schedulers.',
                    'Implemented Redis caching to improve data retrieval speed and system responsiveness.',
                    'Collaborated with frontend and QA teams to ensure end-to-end functionality, debugging and optimizing backend logic as needed.',
                ],
            ],
        ];

        foreach ($experiences as $experience) {
            $techStack = $experience['tech_stack'];
            $jobDesks  = $experience['job_desks'];
            unset($experience['tech_stack'], $experience['job_desks']);

            $experienceId = DB::table('experiences')->insertGetId([
                'title'      => $experience['title'],
                'company'    => $experience['company'],
                'description' => null,
                'location'   => $experience['location'],
                'website'    => null,
                'logo'       => $experience['logo'],
                'start_date' => $experience['start_date'],
                'end_date'   => $experience['end_date'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($techStack as $tech) {
                DB::table('experience_tech_stacks')->insert([
                    'experience_id' => $experienceId,
                    'name'          => $tech,
                    'icon'          => null,
                    'color'         => null,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }

            foreach ($jobDesks as $jobDesk) {
                DB::table('experience_job_desks')->insert([
                    'experience_id' => $experienceId,
                    'title'         => $jobDesk,
                    'description'   => null,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }
        }

        $this->command->info('✅ Experiences seeded: ' . count($experiences) . ' records');
    }

    // -------------------------------------------------------------------------
    // CERTIFICATES
    // -------------------------------------------------------------------------
    private function seedCertificates(): void
    {
        $certificates = [
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Menggunakan MongoDB di Javascript',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-01-15',
                'expires_at' => '2027-01-15',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522596/certificate/ayro4rnnywierhlboxbp.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Dasar Node.js dan NPM',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-01-08',
                'expires_at' => '2027-01-08',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522599/certificate/aaoqycihstymkmwkjk7c.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Asynchronous dalam Javascript',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2023-12-28',
                'expires_at' => '2026-12-28',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522599/certificate/aaoqycihstymkmwkjk7c.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Kampus Merdeka MSIB Graduation Certificate by Ruangguru',
                'program'    => 'Ruangguru CAMP MSIB',
                'issuer'     => 'Ruangguru',
                'issued_at'  => null,
                'expires_at' => null,
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522421/certificate/eotypmkwnac4ziegixsx.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Implementasi Middleware pada Express.js',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-04-25',
                'expires_at' => '2027-04-25',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522596/certificate/kvcm7exk1oswgc4vwcf1.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar RESTful dengan Express.js',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-01-15',
                'expires_at' => '2027-01-15',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735523784/certificate/cshamh9twilrqm17ehze.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Best Student of Ruangguru Fullstack Golang & AI',
                'program'    => 'Ruangguru CAMP MSIB',
                'issuer'     => 'Ruangguru',
                'issued_at'  => null,
                'expires_at' => null,
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522422/certificate/qy3tp53ulhildqrl38mc.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Appreciation Certificate for Participation as Assistant Mentor',
                'program'    => 'Ruangguru CAMP MSIB',
                'issuer'     => 'Ruangguru',
                'issued_at'  => null,
                'expires_at' => null,
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522422/certificate/mqf2jak2fuj3j5uqvp9z.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Cepat Vue.js',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-01-06',
                'expires_at' => '2027-01-06',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522598/certificate/d1x8e8j65s5l2qv9wvyx.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Top 8 Finalist of Final Project by Ruangguru',
                'program'    => 'Ruangguru CAMP MSIB',
                'issuer'     => 'Ruangguru',
                'issued_at'  => null,
                'expires_at' => null,
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522421/certificate/nzm0linkfzylescshz9i.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Dicoding Online Course',
                'program'    => 'Belajar Dasar Pemrograman Web',
                'issuer'     => 'Dicoding',
                'issued_at'  => '2023-10-24',
                'expires_at' => '2026-10-24',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522595/certificate/syt80vc7shd64pdx5kyz.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Pemrograman PHP',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-07-31',
                'expires_at' => '2027-07-31',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522600/certificate/nqrseoxssdf1hziqw2fn.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Konsep OOP di Javascript',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2023-12-30',
                'expires_at' => '2026-12-30',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522597/certificate/qubpmkofcgnvnvlfiqv9.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar AJAX dan Web API',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2023-12-30',
                'expires_at' => '2026-12-30',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522598/certificate/qeascesajymgfupnfoer.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Membuat Halaman Web Dinamis dengan Express.js dan EJS',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-01-09',
                'expires_at' => '2027-01-09',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522597/certificate/rpyxjlrgt41ksmv0sirs.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Framework Laravel Dasar',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-08-08',
                'expires_at' => '2027-08-08',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522600/certificate/gn1kogbk2rxyiyfrakq1.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Dicoding Online Course',
                'program'    => 'Belajar Membuat Front-End Web untuk Pemula',
                'issuer'     => 'Dicoding',
                'issued_at'  => '2023-12-13',
                'expires_at' => '2026-12-13',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522595/certificate/arreszivzzucckypiysi.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Implementasi Error Handler di Express.js dan Mongoose',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-06-05',
                'expires_at' => '2027-06-05',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522595/certificate/pdgzgnoju2znvvv29mdc.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in MySkill Short Class',
                'program'    => 'Data Analysis',
                'issuer'     => 'MySkill',
                'issued_at'  => '2023-10-18',
                'expires_at' => '2026-10-18',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522599/certificate/p6okcubxhifkqw1rfgxv.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Javascript',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2023-12-26',
                'expires_at' => '2026-12-26',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522599/certificate/tb1t0s5fww7axcbjuotb.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in MySkill Short Class',
                'program'    => 'UX Writing Fundamental',
                'issuer'     => 'MySkill',
                'issued_at'  => '2023-10-17',
                'expires_at' => '2026-10-17',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522599/certificate/lg90h65rio2wiqq0k551.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Dasar Express.js',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-01-09',
                'expires_at' => '2027-01-09',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522597/certificate/vqfwlj0qfv683sqxeadi.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar Javascript DOM',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2023-12-28',
                'expires_at' => '2026-12-28',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522599/certificate/fthkpr63p2bqmpkptkuz.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Participate in Codepolitan Online Course',
                'program'    => 'Belajar MongoDB',
                'issuer'     => 'Codepolitan',
                'issued_at'  => '2024-01-15',
                'expires_at' => '2027-01-15',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1735522596/certificate/sb8gkcilcay1fhfbbcxt.jpg',
                'show'       => true,
            ],
            [
                'title'      => 'Junior Web Developer',
                'program'    => 'Programming and Development Software',
                'issuer'     => 'BNSP',
                'issued_at'  => '2025-01-11',
                'expires_at' => '2028-01-11',
                'image'      => 'https://res.cloudinary.com/dblibr1t2/image/upload/f_auto,q_auto/v1754811383/bnsp.jpg',
                'show'       => true,
            ],
        ];

        foreach ($certificates as $certificate) {
            DB::table('certificates')->insert([
                'title'      => $certificate['title'],
                'program'    => $certificate['program'],
                'issuer'     => $certificate['issuer'],
                'issued_at'  => $certificate['issued_at'],
                'expires_at' => $certificate['expires_at'],
                'image'      => $certificate['image'],
                'show'       => $certificate['show'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ Certificates seeded: ' . count($certificates) . ' records');
    }

    // -------------------------------------------------------------------------
    // PROFILE
    // -------------------------------------------------------------------------
    private function seedProfile(): void
    {
        DB::table('profiles')->insertOrIgnore([
            'fullname'   => 'Muhammad Mifta',
            'nickname'   => 'Mifta',
            'title'      => 'Fullstack Developer',
            'bio'        => null,
            'location'   => 'Surabaya, East Java, Indonesia',
            'website'    => 'https://miftech.web.id',
            'email'      => 'superadmin@miv.best',
            'linkedin'   => null,
            'github'     => 'https://github.com/MuhammadMiftaa',
            'phone'      => null,
            'codewars'   => null,
            'leetcode'   => null,
            'languages'  => 'Indonesian, English',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->command->info('✅ Profile seeded');
    }
}
