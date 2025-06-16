<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Primary Meta Tags -->
    <meta name="description" content="<?php if (is_single() || is_page()) {echo wp_strip_all_tags(get_the_excerpt());} else {bloginfo('description');}?>">
    <meta name="keywords" content="web developer, portfolio, projects, skills, contact">
    <meta name="author" content="<?php bloginfo('name'); ?>">
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo get_permalink(); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:title" content="<?php if (is_single() || is_page()) {echo get_the_title() . ' - ' . get_bloginfo('name');} else {bloginfo('name') . ' - ' . get_bloginfo('description');}?>">
    <meta property="og:description" content="<?php if (is_single() || is_page()) {echo wp_strip_all_tags(get_the_excerpt());} else {bloginfo('description');}?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:locale" content="en_US">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo get_permalink(); ?>">
    <meta property="twitter:title" content="<?php if (is_single() || is_page()) {echo get_the_title() . ' - ' . get_bloginfo('name');} else {bloginfo('name') . ' - ' . get_bloginfo('description');}?>">
    <meta property="twitter:description" content="<?php if (is_single() || is_page()) {echo wp_strip_all_tags(get_the_excerpt());} else {bloginfo('description');}?>">
    <meta property="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/twitter-image.jpg">
    <meta name="twitter:creator" content="@yourtwitterhandle">
    <meta name="twitter:site" content="@yourtwitterhandle">

    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="application-name" content="<?php bloginfo('name'); ?>">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <!-- Favicon links -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/site.webmanifest">

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Schema.org structured data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "<?php bloginfo('name'); ?>",
        "url": "<?php echo home_url(); ?>",
        "description": "<?php bloginfo('description'); ?>",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo home_url(); ?>/?s={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-container">
            <!-- Logo/Brand -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <span class="logo-text">PC</span>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-label="Toggle Menu" aria-expanded="false">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>

            <!-- Navigation Menu -->
            <nav class="main-navigation" role="navigation">
                <ul class="nav-menu">
                    <!-- <li><a href="#hero" data-section="hero">Home</a></li> -->
                    <li><a href="#experience" data-section="experience">Experience</a></li>
                    <li><a href="#projects" data-section="projects">Projects</a></li>
                    <li><a href="#skills" data-section="skills">Skills</a></li>
                    <li><a href="#contact" data-section="contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

<!-- Add this CSS to your stylesheet -->
<style>
/* Active Navigation Styles */
.nav-menu a.active {
    color: var(--primary-color) !important;
}

.nav-menu a.active::after {
    width: 100% !important;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
}

/* Enhanced hover states for better UX */
.nav-menu a {
    position: relative;
    transition: all 0.3s ease;
}

.nav-menu a::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    transition: width 0.3s ease;
}

.nav-menu a:hover::after {
    width: 100%;
}

/* Mobile active state */
@media (max-width: 768px) {
    .nav-menu a.active {
        background: rgba(16, 185, 129, 0.1);
        border-radius: 6px;
    }

    .nav-menu a.active::after {
        display: none;
    }
}
</style>

<!-- JavaScript for Active Navigation -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all navigation links and sections
    const navLinks = document.querySelectorAll('.nav-menu a[data-section]');
    const sections = document.querySelectorAll('section[id]');
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-navigation');

    // Mobile menu toggle functionality
    if (mobileToggle && mainNav) {
        mobileToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            this.classList.toggle('active');
            mainNav.classList.toggle('active');
        });
    }

    // Close mobile menu when clicking on a link
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                mobileToggle.classList.remove('active');
                mainNav.classList.remove('active');
                mobileToggle.setAttribute('aria-expanded', 'false');
            }
        });
    });

    // Function to update active navigation
    function updateActiveNav() {
        let currentSection = '';
        const scrollPosition = window.pageYOffset + 100; // Offset for header height

        // Find which section is currently in view
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSection = sectionId;
            }
        });

        // Special case for hero section when at the very top
        if (window.pageYOffset < 50) {
            currentSection = 'hero';
        }

        // Update active class on navigation links
        navLinks.forEach(link => {
            const linkSection = link.getAttribute('data-section');

            if (linkSection === currentSection) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }

    // Smooth scrolling for navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const targetPosition = targetSection.offsetTop - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Listen for scroll events
    let ticking = false;

    function onScroll() {
        if (!ticking) {
            requestAnimationFrame(function() {
                updateActiveNav();
                ticking = false;
            });
            ticking = true;
        }
    }

    window.addEventListener('scroll', onScroll);

    // Initial call to set active state
    updateActiveNav();

    // Update on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            mobileToggle.classList.remove('active');
            mainNav.classList.remove('active');
            mobileToggle.setAttribute('aria-expanded', 'false');
        }
    });
});
</script>