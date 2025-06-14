<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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