<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RageTools - Home</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    :root {
        --bg-primary: #0a0a0f;
        --bg-secondary: #12121a;
        --bg-card: #1a1a26;
        --bg-hover: #232333;
        --text-primary: #f0f0f5;
        --text-secondary: #9494a8;
        --text-muted: #5a5a70;
        --border-color: #2a2a3a;
        --accent: #6c8cff;
        --accent-hover: #5a7ae0;
        --accent-glow: rgba(108, 140, 255, 0.15);
        --radius: 16px;
        --shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        background: var(--bg-primary);
        color: var(--text-primary);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        overflow-x: hidden;
    }

    /* Animated background gradient */
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 15% 20%, rgba(239, 68, 68, 0.08) 0%, transparent 40%),
            radial-gradient(circle at 85% 80%, rgba(108, 140, 255, 0.08) 0%, transparent 40%),
            radial-gradient(circle at 50% 50%, rgba(167, 139, 250, 0.04) 0%, transparent 60%);
        pointer-events: none;
        z-index: 0;
    }

    /* Page content */
    .container {
        position: relative;
        z-index: 1;
        flex: 1;
        max-width: 1400px;
        width: 100%;
        margin: 0 auto;
        padding: 80px 24px 60px;
        display: flex;
        flex-direction: column;
    }

    /* Hero section */
    .hero {
        text-align: center;
        margin-bottom: 64px;
        animation: fadeInUp 0.6s ease;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid var(--border-color);
        border-radius: 100px;
        font-size: 12px;
        font-weight: 500;
        color: var(--text-secondary);
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 24px;
    }

    .hero-badge .dot-green {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #4ade80;
        box-shadow: 0 0 8px #4ade80;
        animation: pulse 2s ease-in-out infinite;
    }

    .hero-badge .dot-red {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #de4a4a;
        box-shadow: 0 0 8px #de4a4a;
        animation: pulse 2s ease-in-out infinite;
    }

    .hero-badge .dot-orange {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #f97316;
        box-shadow: 0 0 8px #f97316;
        animation: pulse 2s ease-in-out infinite;
    }

    /* GTA IV */
    .hero-badge .dot-blue {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #38bdf8;
        box-shadow: 0 0 8px #38bdf8;
        animation: pulse 2s ease-in-out infinite;
    }
	
	.hero-badge .dot-pink {
		width: 6px;
		height: 6px;
		border-radius: 50%;
		background: #ec4899;
		box-shadow: 0 0 8px #ec4899;
		animation: pulse 2s ease-in-out infinite;
	}

    /* RDR */
    .hero-badge .dot-gold {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #d6a85f;
        box-shadow: 0 0 8px #d6a85f;
        animation: pulse 2s ease-in-out infinite;
    }

    .hero h1 {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        line-height: 0;
        width: 100%;
    }

    .hero h1 .brand-img {
        display: block;
        height: clamp(56px, 9vw, 96px);
        width: auto;
        max-width: 90vw;
        object-fit: contain;
        margin: 0 auto;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }

    .hero p {
        font-size: clamp(15px, 2vw, 18px);
        color: var(--text-secondary);
        max-width: 640px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* Cards grid — 4 columns on desktop */
    .grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 64px;
    }

    .card {
        position: relative;
        background: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: var(--radius);
        padding: 20px 16px;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        min-height: 200px;
        animation: fadeInUp 0.6s ease backwards;
    }

    .card:nth-child(1) { animation-delay: 0.05s; }
    .card:nth-child(2) { animation-delay: 0.1s; }
    .card:nth-child(3) { animation-delay: 0.15s; }
    .card:nth-child(4) { animation-delay: 0.2s; }
    .card:nth-child(5) { animation-delay: 0.25s; }
    .card:nth-child(6) { animation-delay: 0.3s; }
    .card:nth-child(7) { animation-delay: 0.35s; }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: var(--card-accent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at top right, var(--card-glow) 0%, transparent 60%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .card:hover {
        border-color: var(--card-accent);
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4), 0 0 0 1px var(--card-accent);
    }

    .card:hover::before,
    .card:hover::after {
        opacity: 1;
    }

    .card-icon {
        width: 52px;
        height: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 14px;
        background: var(--card-icon-bg);
        border: 1px solid var(--card-accent);
        transition: transform 0.3s ease;
    }

    .card-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        image-rendering: -webkit-optimize-contrast;
    }

    .card:hover .card-icon {
        transform: scale(1.2) rotate(-3deg);
    }

    .card-title {
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 6px;
        letter-spacing: -0.01em;
        line-height: 1.2;
    }

    .card-desc {
        font-size: 12px;
        color: var(--text-secondary);
        line-height: 1.5;
        flex: 1;
    }

    .card-footer {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 14px;
        font-size: 12px;
        font-weight: 600;
        color: var(--card-accent);
    }

    .card-footer .arrow {
        transition: transform 0.3s ease;
    }

    .card:hover .card-footer .arrow {
        transform: translateX(4px);
    }

    /* Per-card theming */
    .card-rdr {
        --card-accent: #ef4444;
        --card-glow: rgba(239, 68, 68, 0.12);
        --card-icon-bg: rgba(239, 68, 68, 0.1);
    }

    .card-gta {
        --card-accent: #4ade80;
        --card-glow: rgba(74, 222, 128, 0.12);
        --card-icon-bg: rgba(74, 222, 128, 0.1);
    }
	
	.card:nth-child(8) { animation-delay: 0.4s; }
	
	.card-mncla {
		--card-accent: #3b00a8;
		--card-glow: rgba(59, 0, 168, 0.14);
		--card-icon-bg: rgba(59, 0, 168, 0.1);
	}

    .card-mp3 {
        --card-accent: #f97316;
        --card-glow: rgba(249, 115, 22, 0.12);
        --card-icon-bg: rgba(249, 115, 22, 0.1);
    }

    /* GTA IV */
    .card-gta4 {
        --card-accent: #38bdf8;
        --card-glow: rgba(56, 189, 248, 0.14);
        --card-icon-bg: rgba(56, 189, 248, 0.1);
    }

    /* RDR */
    .card-rdr-original {
        --card-accent: #d6a85f;
        --card-glow: rgba(214, 168, 95, 0.14);
        --card-icon-bg: rgba(214, 168, 95, 0.1);
    }

    .card-creator {
        --card-accent: #6c8cff;
        --card-glow: rgba(108, 140, 255, 0.12);
        --card-icon-bg: rgba(108, 140, 255, 0.1);
    }

    .card-converter {
        --card-accent: #a78bfa;
        --card-glow: rgba(167, 139, 250, 0.12);
        --card-icon-bg: rgba(167, 139, 250, 0.1);
    }

    /* Footer */
    .footer {
        position: relative;
        z-index: 1;
        text-align: center;
        padding: 32px 24px;
        border-top: 1px solid var(--border-color);
        font-size: 13px;
        color: var(--text-muted);
    }

    .footer a {
        color: var(--text-secondary);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .footer a:hover {
        color: var(--text-primary);
    }

    .footer .sep {
        margin: 0 10px;
        opacity: 0.4;
    }

    /* Responsive — drop to 3, 2 columns as the screen narrows */
    @media (max-width: 1100px) {
        .grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }

    @media (max-width: 900px) {
        .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
    }

    @media (max-width: 640px) {
        .auth-corner {
            top: 14px;
            right: 14px;
            gap: 6px;
        }
        .auth-corner .auth-link {
            font-size: 12px;
            padding: 6px 12px;
        }
        .auth-corner .auth-user .uname {
            display: none;
        }

        .container {
            padding: 60px 16px 40px;
        }

        .hero {
            margin-bottom: 40px;
        }

        .grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
            margin-bottom: 40px;
        }

        .card {
            padding: 16px 14px;
            min-height: 180px;
        }

        .card-icon {
            width: 44px;
            height: 44px;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .card-title {
            font-size: 14px;
        }

        .card-desc {
            font-size: 11px;
        }
    }

    @media (max-width: 420px) {
        .grid {
            grid-template-columns: 1fr;
        }

        .card {
            min-height: auto;
        }
    }

    ::selection {
        background: #6c8cff;
        color: white;
    }
</style>

</head>
<body>

<div class="container">
    <div class="hero">
        <h1>
            <img src="/assets/images/brand.png" class="brand-img" alt="RageTools">
        </h1>
        <p>A toolkit for RAGE engine modding. Explore native functions, generate boilerplate scripts, and convert data between formats — streamlining the workflow from research to implementation.</p>
        <span class="sep">·</span>
        <p>25,039 Natives Available</p>
		
        <div class="hero-badge" style="margin-top: 15px;">
            <span class="dot-red"></span>
            RDR2 <span class="sep">·</span> 7,132
        </div>

        <div class="hero-badge">
            <span class="dot-green"></span>
            GTA5 <span class="sep">·</span> 6,701
        </div>

        <div class="hero-badge">
            <span class="dot-orange"></span>
            MP3 <span class="sep">·</span> 3,813
        </div>

        <div class="hero-badge">
            <span class="dot-blue"></span>
            GTA4 <span class="sep">·</span> 2,630
        </div>

        <div class="hero-badge">
            <span class="dot-gold"></span>
            RDR <span class="sep">·</span> 3,496
        </div>
		
		<div class="hero-badge">
			<span class="dot-pink"></span>
			MNCLA <span class="sep">·</span> 1,267
		</div>
    </div>

    <div class="grid">

        <a href="rdr2.php" class="card card-rdr">
            <div class="card-icon">
                <img src="assets/images/rdr2ndb.png" alt="RDR2 NativeDB" />
            </div>
            <div class="card-title">RDR2 NativeDB</div>
            <div class="card-desc">Browse, search, and inspect Red Dead Redemption 2 native functions with full parameter details.</div>
            <div class="card-footer">
                Explore <span class="arrow">→</span>
            </div>
        </a>

        <a href="gta5.php" class="card card-gta">
            <div class="card-icon">
                <img src="assets/images/gta5ndb.png" alt="GTA5 NativeDB" />
            </div>
            <div class="card-title">GTA5 NativeDB</div>
            <div class="card-desc">Search the complete Grand Theft Auto V native function database with signatures and hashes.</div>
            <div class="card-footer">
                Explore <span class="arrow">→</span>
            </div>
        </a>

        <a href="mp3.php" class="card card-mp3">
            <div class="card-icon">
                <img src="assets/images/mp3ndb.png" alt="MP3 NativeDB" />
            </div>
            <div class="card-title">MP3 NativeDB</div>
            <div class="card-desc">Browse and inspect Max Payne 3 native functions with full parameter details and live signature generation.</div>
            <div class="card-footer">
                Explore <span class="arrow">→</span>
            </div>
        </a>

        <a href="gta4.php" class="card card-gta4">
            <div class="card-icon">
                <img src="assets/images/gta4ndb.png" alt="GTA4 NativeDB" />
            </div>
            <div class="card-title">GTA4 NativeDB</div>
            <div class="card-desc">Browse and inspect Grand Theft Auto IV native functions with full parameter details and native hashes.</div>
            <div class="card-footer">
                Explore <span class="arrow">→</span>
            </div>
        </a>

        <a href="rdr.php" class="card card-rdr-original">
            <div class="card-icon">
                <img src="assets/images/rdrndb.png" alt="RDR NativeDB" />
            </div>
            <div class="card-title">RDR NativeDB</div>
            <div class="card-desc">Browse and inspect Red Dead Redemption native functions with full parameter details and native hashes.</div>
            <div class="card-footer">
                Explore <span class="arrow">→</span>
            </div>
        </a>
		
		<a href="mncla.php" class="card card-mncla">
			<div class="card-icon">
				<img src="assets/images/mnclandb.png" alt="MNCLA NativeDB" />
			</div>
			<div class="card-title">MNCLA NativeDB</div>
			<div class="card-desc">Browse and inspect Midnight Club: Los Angeles native functions with full parameter details and native hashes.</div>
			<div class="card-footer">
				Explore <span class="arrow">→</span>
			</div>
		</a>

        <a href="creator.php" class="card card-creator">
            <div class="card-icon">
                <img src="assets/images/gen.png" alt="Script Generator" />
            </div>
            <div class="card-title">Script Generator</div>
            <div class="card-desc">Generate C++ command classes with proper includes, templates, and boilerplate code.</div>
            <div class="card-footer">
                Generate <span class="arrow">→</span>
            </div>
        </a>

        <a href="converter.php" class="card card-converter">
            <div class="card-icon">
                <img src="assets/images/convert.png" alt="Converter" />
            </div>
            <div class="card-title">Converter</div>
            <div class="card-desc">Convert Model/Ped Lists via URL or paste to TXT, LUA, C++, JSON & More.</div>
            <div class="card-footer">
                Convert <span class="arrow">→</span>
            </div>
        </a>

    </div>
</div>

<footer class="footer">
    RageTools <span class="sep">·</span>
    <a href="https://github.com/Deadlineem/RAGE-Tools" target="_blank" rel="noopener">GitHub</a>
</footer>

</body>
</html>
