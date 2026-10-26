<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOps Dashboard | Laravel</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --background: #0b1120;
            --panel: #111b2e;
            --border: #26354d;
            --text: #edf4ff;
            --muted: #96a8c3;
            --blue: #60a5fa;
            --green: #34d399;
            --purple: #c4b5fd;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        aside {
            width: 245px;
            padding: 30px 20px;
            background: #0e1728;
            border-right: 1px solid var(--border);
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 45px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        }

        .nav-label {
            color: #7286a3;
            font-size: 11px;
            letter-spacing: 1.5px;
            margin: 25px 10px 12px;
        }

        .nav-item {
            display: block;
            color: var(--muted);
            text-decoration: none;
            padding: 13px 12px;
            border-radius: 9px;
            margin-bottom: 7px;
        }

        .nav-item:hover,
        .nav-item.active {
            background: #1b2b45;
            color: #fff;
        }

        main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 35px;
        }

        .topbar p,
        .muted {
            color: var(--muted);
            font-size: 14px;
            margin-top: 8px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border: 1px solid #176c53;
            border-radius: 30px;
            background: #103328;
            color: var(--green);
            font-size: 13px;
        }

        .dot {
            width: 8px;
            height: 8px;
            background: var(--green);
            border-radius: 50%;
        }

        .hero {
            padding: 40px;
            border: 1px solid #344768;
            border-radius: 22px;
            background:
                radial-gradient(circle at 90% 20%, #354c88 0, transparent 35%),
                linear-gradient(125deg, #172c4d, #18203b 70%);
            margin-bottom: 30px;
        }

        .eyebrow {
            color: #93c5fd;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .hero h2 {
            font-size: clamp(28px, 4vw, 42px);
            line-height: 1.2;
            margin: 17px 0;
            max-width: 650px;
        }

        .hero p {
            color: #c1cee2;
            line-height: 1.8;
            max-width: 650px;
        }

        .hero-button {
            display: inline-block;
            margin-top: 25px;
            background: #60a5fa;
            color: #071427;
            text-decoration: none;
            font-weight: bold;
            padding: 13px 20px;
            border-radius: 9px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin: 35px 0 18px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 13px;
        }

        .stats,
        .tools-grid,
        .architecture {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .card {
            padding: 23px;
            border: 1px solid var(--border);
            border-radius: 16px;
            background: var(--panel);
        }

        .stat-label {
            color: var(--muted);
            font-size: 13px;
        }

        .stat-value {
            font-size: 29px;
            font-weight: bold;
            margin: 15px 0 8px;
        }

        .stat-note {
            color: var(--green);
            font-size: 12px;
        }

        .tool-icon {
            display: grid;
            place-items: center;
            width: 48px;
            height: 48px;
            border-radius: 13px;
            font-size: 23px;
            margin-bottom: 20px;
        }

        .blue { background: #19385c; }
        .green { background: #123b34; }
        .purple { background: #342a56; }

        .card h3 {
            margin-bottom: 11px;
        }

        .card p {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .tool-status {
            display: inline-block;
            margin-top: 18px;
            font-size: 12px;
            color: var(--blue);
        }

        .architecture .card {
            position: relative;
        }

        .layer-number {
            font-size: 12px;
            color: var(--purple);
            margin-bottom: 15px;
        }

        .architecture .card h3 {
            margin-bottom: 10px;
        }

        footer {
            margin-top: 40px;
            padding: 22px 0;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 12px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        @media (max-width: 1050px) {
            .stats,
            .tools-grid,
            .architecture {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            aside {
                width: 200px;
            }
        }

        @media (max-width: 700px) {
            .layout {
                display: block;
            }

            aside {
                width: 100%;
                padding: 18px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .nav-label {
                margin-top: 15px;
            }

            main {
                padding: 20px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .hero {
                padding: 25px;
            }

            .stats,
            .tools-grid,
            .architecture {
                grid-template-columns: 1fr;
            }

            footer {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside>
        <div class="brand">
            <div class="brand-icon">⚙</div>
            <span>DeployFlow</span>
        </div>

        <div class="nav-label">WORKSPACE</div>
        <a href="#overview" class="nav-item active">▦ &nbsp; Overview</a>
        <a href="#tools" class="nav-item">◇ &nbsp; DevOps Tools</a>
        <a href="#architecture" class="nav-item">⌘ &nbsp; Architecture</a>

        <div class="nav-label">PROJECT</div>
        <a href="#deployment" class="nav-item">⇧ &nbsp; Deployment</a>
        <a href="#database" class="nav-item">▤ &nbsp; Database</a>
    </aside>

    <main id="overview">
        <header class="topbar">
            <div>
                <h1>DevOps Dashboard</h1>
                <p>Manage and monitor your Laravel deployment.</p>
            </div>

            <div class="badge">
                <span class="dot"></span>
                Laravel Dashboard
            </div>
        </header>

        <section class="hero">
            <div class="eyebrow">YOUR DEVOPS WORKSPACE</div>
            <h2>Build. Deploy. Scale.</h2>
            <p>
                A Laravel application powered by a three-tier architecture.
                Use GitHub for version control, Ansible for automation, and
                Kubernetes for application deployment and management.
            </p>
            <a href="#architecture" class="hero-button">
                Explore Architecture &rarr;
            </a>
        </section>

        <div class="section-heading" id="deployment">
            <h2>Project Overview</h2>
            <p>Deployment environment</p>
        </div>

        <section class="stats">
            <div class="card">
                <div class="stat-label">Application Framework</div>
                <div class="stat-value">Laravel</div>
                <div class="stat-note">PHP Web Application</div>
            </div>

            <div class="card">
                <div class="stat-label">Automation</div>
                <div class="stat-value">Ansible</div>
                <div class="stat-note">Playbook-based deployment</div>
            </div>

            <div class="card">
                <div class="stat-label">Orchestration</div>
                <div class="stat-value">K8s</div>
                <div class="stat-note">Kubernetes workloads</div>
            </div>
        </section>

        <div class="section-heading" id="tools">
            <h2>DevOps Toolchain</h2>
            <p>Tools used in this project</p>
        </div>

        <section class="tools-grid">
            <div class="card">
                <div class="tool-icon blue">⌘</div>
                <h3>GitHub</h3>
                <p>
                    Store source code, maintain version history,
                    and collaborate on application changes.
                </p>
                <span class="tool-status">Version Control</span>
            </div>

            <div class="card">
                <div class="tool-icon green">⚙</div>
                <h3>Ansible</h3>
                <p>
                    Automate configuration and deploy Kubernetes
                    resources using repeatable playbooks.
                </p>
                <span class="tool-status">Deployment Automation</span>
            </div>

            <div class="card">
                <div class="tool-icon purple">☸</div>
                <h3>Kubernetes</h3>
                <p>
                    Manage application Pods, database workloads,
                    Services, and deployment availability.
                </p>
                <span class="tool-status">Container Orchestration</span>
            </div>
        </section>

        <div class="section-heading" id="architecture">
            <h2>Three-Tier Architecture</h2>
            <p>Application components</p>
        </div>

        <section class="architecture">
            <div class="card">
                <div class="layer-number">TIER 01</div>
                <h3>Presentation</h3>
                <p>
                    Laravel Blade templates, HTML, CSS, and the
                    user interface displayed in the browser.
                </p>
            </div>

            <div class="card">
                <div class="layer-number">TIER 02</div>
                <h3>Application Logic</h3>
                <p>
                    Laravel routes, controllers, validation,
                    services, and business logic.
                </p>
            </div>

            <div class="card" id="database">
                <div class="layer-number">TIER 03</div>
                <h3>Database</h3>
                <p>
                    MySQL stores application records and provides
                    persistent data storage.
                </p>
            </div>
        </section>

        <footer>
            <span>DeployFlow &copy; {{ date('Y') }}</span>
            <span>Laravel + GitHub + Ansible + Kubernetes</span>
        </footer>
    </main>

</div>
</body>
</html>
