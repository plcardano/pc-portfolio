<footer class="site-footer">
    <div class="footer-container">

        <!-- Footer Main Content -->
        <div class="footer-main">

            <!-- Footer Brand -->
            <div class="footer-brand">
                <div class="footer-logo">
                    <span class="logo-text">PC</span>
                </div>
                <p class="footer-tagline">
                    Building digital experiences with modern web technologies
                </p>
                <div class="footer-social">
                    <a href="https://www.linkedin.com/in/paul-cardano-33714b190" target="_blank" class="social-link linkedin" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a href="https://github.com/plcardano" target="_blank" class="social-link github" aria-label="GitHub">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                    </a>
                    <a href="mailto:plg.cardano@gmail.com" class="social-link email" aria-label="Email">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Footer Navigation -->
            <div class="footer-nav">
                <div class="footer-section">
                    <h4 class="footer-section-title">Navigation</h4>
                    <ul class="footer-links">
                        <li><a href="#hero">Home</a></li>
                        <li><a href="#experience">Experience</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4 class="footer-section-title">Technologies</h4>
                    <ul class="footer-links">
                        <li><a href="#skills">Laravel</a></li>
                        <li><a href="#skills">Vue.js</a></li>
                        <li><a href="#skills">TypeScript</a></li>
                        <li><a href="#skills">MySQL</a></li>
                        <li><a href="#skills">Ionic</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4 class="footer-section-title">Contact Info</h4>
                    <ul class="footer-links">
                        <li><a href="tel:+639422958590">+63 942 2958590</a></li>
                        <li><a href="mailto:plg.cardano@gmail.com">plg.cardano@gmail.com</a></li>
                        <li>Rodriguez, Calabarzon, PH</li>
                        <li class="availability">🟢 Available for opportunities</li>
                    </ul>
                </div>
            </div>

        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p class="copyright">
                    © 2025 Paul Louis Cardano. All rights reserved.
                </p>
                <div class="footer-meta">
                    <span class="built-with">Built with ❤️ using Laravel & Vue.js</span>
                </div>
            </div>
        </div>

    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>

<style>
/* Site Footer */
.site-footer {
    background: var(--bg-primary);
    border-top: 1px solid var(--bg-accent);
    padding: 4rem 0 2rem;
    position: relative;
}

.site-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 1px;
    background: linear-gradient(90deg, transparent, var(--primary-color), transparent);
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

/* Footer Main Content */
.footer-main {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 4rem;
    margin-bottom: 3rem;
}

/* Footer Brand */
.footer-brand {
    max-width: 400px;
}

.footer-logo {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.footer-logo .logo-text {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 800;
    font-size: 2rem;
    letter-spacing: 0.05em;
}

.footer-tagline {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: 2rem;
    font-size: 1rem;
}

/* Social Links */
.footer-social {
    display: flex;
    gap: 1rem;
}

.social-link {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--bg-secondary);
    border: 1px solid var(--bg-accent);
    color: var(--text-secondary);
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.2);
    border-color: var(--primary-color);
    color: var(--primary-color);
}

.social-link.linkedin:hover {
    background: linear-gradient(135deg, #0077b5, #00a0dc);
    color: white;
    border-color: #0077b5;
}

.social-link.github:hover {
    background: linear-gradient(135deg, #333, #555);
    color: white;
    border-color: #333;
}

.social-link.email:hover {
    background: linear-gradient(135deg, #ea4335, #fbbc04);
    color: white;
    border-color: #ea4335;
}

/* Footer Navigation */
.footer-nav {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 2rem;
}

.footer-section-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 1rem;
    position: relative;
    padding-bottom: 0.5rem;
}

.footer-section-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 2px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a {
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
}

.footer-links a:hover {
    color: var(--primary-color);
    transform: translateX(5px);
}

.footer-links li:not(.availability) a::before {
    content: '';
    position: absolute;
    left: -15px;
    top: 50%;
    width: 0;
    height: 1px;
    background: var(--primary-color);
    transition: width 0.3s ease;
    transform: translateY(-50%);
}

.footer-links a:hover::before {
    width: 10px;
}

.footer-links .availability {
    color: var(--text-secondary);
    font-size: 0.9rem;
    margin-top: 0.5rem;
    padding: 0.5rem 0;
    border-top: 1px solid var(--bg-accent);
}

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid var(--bg-accent);
    padding-top: 2rem;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.copyright {
    color: var(--text-muted);
    font-size: 0.9rem;
    margin: 0;
}

.footer-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.built-with {
    color: var(--text-muted);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Responsive Footer */
@media (max-width: 968px) {
    .footer-main {
        grid-template-columns: 1fr;
        gap: 3rem;
    }

    .footer-nav {
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }

    .footer-section:last-child {
        grid-column: 1 / -1;
    }
}

@media (max-width: 768px) {
    .site-footer {
        padding: 3rem 0 1.5rem;
    }

    .footer-container {
        padding: 0 1rem;
    }

    .footer-nav {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .footer-social {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .footer-main {
        gap: 2rem;
    }

    .footer-brand {
        text-align: center;
    }

    .footer-section-title {
        text-align: center;
    }

    .footer-links {
        text-align: center;
    }

    .footer-links a::before {
        display: none;
    }

    .footer-links a:hover {
        transform: none;
    }
}

/* Animation */
.footer-section {
    opacity: 0;
    animation: fadeInUp 0.8s ease forwards;
}

.footer-section:nth-child(1) { animation-delay: 0.1s; }
.footer-section:nth-child(2) { animation-delay: 0.2s; }
.footer-section:nth-child(3) { animation-delay: 0.3s; }

.footer-brand {
    opacity: 0;
    animation: fadeInUp 0.8s ease forwards;
}

.social-link {
    opacity: 0;
    animation: fadeInUp 0.6s ease forwards;
}

.social-link:nth-child(1) { animation-delay: 0.3s; }
.social-link:nth-child(2) { animation-delay: 0.4s; }
.social-link:nth-child(3) { animation-delay: 0.5s; }
</style>