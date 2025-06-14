/**
 * PC Portfolio Theme JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Mobile Menu Toggle
        const mobileToggle = $('.mobile-menu-toggle');
        const navigation = $('.main-navigation');
        
        mobileToggle.on('click', function() {
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            
            $(this).attr('aria-expanded', !isExpanded);
            $(this).toggleClass('active');
            navigation.toggleClass('active');
        });

        // Close mobile menu when clicking on nav links
        $('.nav-menu a').on('click', function() {
            mobileToggle.removeClass('active').attr('aria-expanded', 'false');
            navigation.removeClass('active');
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length) {
                mobileToggle.removeClass('active').attr('aria-expanded', 'false');
                navigation.removeClass('active');
            }
        });

        // Smooth scrolling for anchor links
        $('a[href^="#"]').on('click', function(e) {
            const target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 70 // Account for fixed header
                }, 800);
            }
        });

        // Header scroll effect
        let lastScrollTop = 0;
        const header = $('.site-header');
        
        $(window).scroll(function() {
            const scrollTop = $(this).scrollTop();
            
            if (scrollTop > 100) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
            
            lastScrollTop = scrollTop;
        });

        // Skills Animation
        function animateSkills() {
            $('.skill-progress').each(function() {
                const $this = $(this);
                const targetWidth = $this.data('width');
                
                // Check if element is in viewport
                const elementTop = $this.offset().top;
                const elementBottom = elementTop + $this.outerHeight();
                const viewportTop = $(window).scrollTop();
                const viewportBottom = viewportTop + $(window).height();
                
                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    // Animate the width
                    $this.css('width', targetWidth + '%');
                }
            });
        }

        // Trigger skills animation on scroll
        $(window).on('scroll', function() {
            animateSkills();
        });

        // Initial check for skills animation
        animateSkills();

    });

})(jQuery);

document.addEventListener('DOMContentLoaded', function() {
    
    // ===== SAFE NAVIGATION ENHANCEMENT =====
    const navLinks = document.querySelectorAll('.nav-menu a[data-section]');
    const sections = document.querySelectorAll('section[id]');
    const header = document.querySelector('.site-header');
    
    // Create scroll progress bar
    const scrollProgress = document.createElement('div');
    scrollProgress.className = 'scroll-progress';
    document.body.appendChild(scrollProgress);
    
    // ===== SCROLL REVEAL ANIMATIONS =====
    
    // Function to reveal elements on scroll
    function revealOnScroll() {
        const reveals = document.querySelectorAll('.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale');
        
        reveals.forEach(element => {
            const windowHeight = window.innerHeight;
            const elementTop = element.getBoundingClientRect().top;
            const revealPoint = 100;
            
            if (elementTop < windowHeight - revealPoint) {
                element.classList.add('revealed');
            }
        });
    }
    
    // ===== ACTIVE NAVIGATION =====
    
    function updateActiveNav() {
        let currentSection = '';
        const scrollPosition = window.pageYOffset + 100;
        
        // Find current section
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');
            
            if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                currentSection = sectionId;
            }
        });
        
        if (window.pageYOffset < 50) {
            currentSection = 'hero';
        }
        
        // Update active navigation
        navLinks.forEach(link => {
            const linkSection = link.getAttribute('data-section');
            link.classList.toggle('active', linkSection === currentSection);
        });
        
        // Update header scroll effect
        header.classList.toggle('scrolled', window.pageYOffset > 100);
        
        // Update scroll progress
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (window.pageYOffset / docHeight) * 100;
        scrollProgress.style.width = scrollPercent + '%';
    }
    
    // ===== SMOOTH SCROLLING =====
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            
            if (targetSection) {
                const headerHeight = header.offsetHeight;
                const targetPosition = targetSection.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // ===== OPTIMIZED SCROLL HANDLER =====
    
    let ticking = false;
    
    function onScroll() {
        if (!ticking) {
            requestAnimationFrame(function() {
                updateActiveNav();
                revealOnScroll();
                ticking = false;
            });
            ticking = true;
        }
    }
    
    window.addEventListener('scroll', onScroll);
    
    // Initial calls
    updateActiveNav();
    revealOnScroll();
    
    // ===== ENHANCED MOBILE MENU (if exists) =====
    
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mainNav = document.querySelector('.main-navigation');
    
    if (mobileToggle && mainNav) {
        mobileToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            this.classList.toggle('active');
            mainNav.classList.toggle('active');
        });
        
        // Close mobile menu when clicking nav links
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    mobileToggle.classList.remove('active');
                    mainNav.classList.remove('active');
                    mobileToggle.setAttribute('aria-expanded', 'false');
                }
            });
        });
    }

    // ===== MOUSE PARALLAX EFFECT =====
    const heroVisual = document.querySelector('.hero-visual');
    const heroSection = document.querySelector('.hero-section');

    if (heroVisual && heroSection) {
        heroSection.addEventListener('mousemove', function(e) {
            const rect = heroSection.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width;
            const y = (e.clientY - rect.top) / rect.height;

            const moveX = (x - 0.5) * 20;
            const moveY = (y - 0.5) * 20;

            heroVisual.style.transform = `translate(${moveX}px, ${moveY}px)`;
        });

        heroSection.addEventListener('mouseleave', function() {
            heroVisual.style.transform = 'translate(0, 0)';
        });
    }

    // ===== BUTTON RIPPLE EFFECT =====
    const buttons = document.querySelectorAll('.btn');

    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
                z-index: 0;
            `;

            button.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    if (!document.querySelector('#ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'ripple-styles';
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }

    // ===== MAGNETIC BUTTON EFFECT ===== 
    const magneticBtns = document.querySelectorAll('.magnetic-btn');
    
    magneticBtns.forEach(btn => {
        btn.addEventListener('mousemove', function(e) {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            // Subtle magnetic pull
            btn.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px) translateY(-5px) scale(1.05)`;
        });
        
        btn.addEventListener('mouseleave', function() {
            btn.style.transform = '';
        });
    });
    
    // ===== ENHANCED RIPPLE EFFECT =====
    magneticBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = btn.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: radial-gradient(circle, rgba(255,255,255,0.6) 0%, transparent 70%);
                border-radius: 50%;
                transform: scale(0);
                animation: enhancedRipple 0.8s ease-out;
                pointer-events: none;
                z-index: 1;
            `;
            
            btn.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 800);
        });
    });
    
    // Add ripple animation
    if (!document.querySelector('#enhanced-ripple-styles')) {
        const style = document.createElement('style');
        style.id = 'enhanced-ripple-styles';
        style.textContent = `
            @keyframes enhancedRipple {
                0% {
                    transform: scale(0);
                    opacity: 1;
                }
                100% {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    }
});