<?php
/**
 * PC Portfolio Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function pc_portfolio_setup()
{
    // Add theme support for title tag
    add_theme_support('title-tag');

    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add theme support for HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'pc-portfolio'),
    ));
}
add_action('after_setup_theme', 'pc_portfolio_setup');

/**
 * Enqueue Scripts and Styles
 */
function pc_portfolio_scripts()
{
    // Enqueue main stylesheet
    wp_enqueue_style('pc-portfolio-style', get_template_directory_uri() . '/dist/style.min.css', array(), '1.0.0');

    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);

    // Enqueue main JavaScript file
    wp_enqueue_script('pc-portfolio-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);

    // Localize script for AJAX
    wp_localize_script('pc-portfolio-script', 'pc_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('pc_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'pc_portfolio_scripts');

/**
 * Add Viewport Meta Tag
 */
function pc_portfolio_viewport_meta()
{
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
}
add_action('wp_head', 'pc_portfolio_viewport_meta');

/**
 * Custom Excerpt Length
 */
function pc_portfolio_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'pc_portfolio_excerpt_length');

/**
 * Custom Excerpt More
 */
function pc_portfolio_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'pc_portfolio_excerpt_more');

/**
 * Add Custom Body Classes
 */
function pc_portfolio_body_classes($classes)
{
    // Add class for front page
    if (is_front_page()) {
        $classes[] = 'home-page';
    }

    return $classes;
}
add_filter('body_class', 'pc_portfolio_body_classes');

/**
 * Fallback menu for primary navigation
 */
function pc_portfolio_fallback_menu()
{
    echo '<ul class="nav-menu">';
    echo '<li><a href="#hero" data-section="hero">Home</a></li>';
    echo '<li><a href="#experience" data-section="experience">Experience</a></li>';
    echo '<li><a href="#projects" data-section="projects">Projects</a></li>';
    echo '<li><a href="#skills" data-section="skills">Skills</a></li>';
    echo '<li><a href="#contact" data-section="contact">Contact</a></li>';
    echo '</ul>';
}

// ===== SIMPLE EMAIL-ONLY CONTACT FORM =====

/**
 * Start session for form messages
 */
function pc_portfolio_start_session()
{
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'pc_portfolio_start_session');

/**
 * Simple email-only contact form handler
 */
function pc_portfolio_simple_contact_form()
{
    if (isset($_POST['submit_contact']) && wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {

        // Sanitize form data
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        // Validate required fields
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            $_SESSION['form_error'] = "Please fill in all required fields.";
            wp_redirect($_SERVER['REQUEST_URI'] . '#contact');
            exit;
        }

        if (!is_email($email)) {
            $_SESSION['form_error'] = "Please enter a valid email address.";
            wp_redirect($_SERVER['REQUEST_URI'] . '#contact');
            exit;
        }

        // Prepare email
        $to = 'plg.cardano@gmail.com'; // Your email
        $email_subject = 'Portfolio Contact: ' . $subject;

        // Create beautifully formatted email body
        $email_body = "You have received a new message from your portfolio website.\n\n";
        $email_body .= "═══════════════════════════════════════\n";
        $email_body .= "CONTACT FORM SUBMISSION\n";
        $email_body .= "═══════════════════════════════════════\n\n";
        $email_body .= "Name: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n";
        $email_body .= "Subject: " . $subject . "\n";
        $email_body .= "Date: " . date('F j, Y g:i A') . "\n";
        $email_body .= "Website: " . home_url() . "\n\n";
        $email_body .= "Message:\n";
        $email_body .= "───────────────────────────────────────\n";
        $email_body .= $message . "\n";
        $email_body .= "───────────────────────────────────────\n\n";
        $email_body .= "You can reply directly to this email to respond to " . $name . ".\n\n";
        $email_body .= "Best regards,\n";
        $email_body .= "Your Portfolio Contact Form";

        // Set email headers
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: ' . $name . ' <' . $email . '>',
            'Reply-To: ' . $email,
            'X-Mailer: PC Portfolio Contact Form',
        );

        // Send email
        $email_sent = wp_mail($to, $email_subject, $email_body, $headers);

        // Set success/error message
        if ($email_sent) {
            $_SESSION['form_success'] = "Thank you! Your message has been sent successfully. I'll get back to you soon!";
        } else {
            $_SESSION['form_error'] = "Sorry, there was an error sending your message. Please email me directly at plg.cardano@gmail.com";
        }

        // Redirect to prevent form resubmission
        wp_redirect($_SERVER['REQUEST_URI'] . '#contact');
        exit;
    }
}
add_action('init', 'pc_portfolio_simple_contact_form');

/**
 * Test email function
 */
function pc_portfolio_test_email()
{
    if (isset($_GET['test_email']) && current_user_can('manage_options')) {
        $to = 'plg.cardano@gmail.com';
        $subject = 'Test Email from Portfolio Contact Form';
        $message = "This is a test email to verify that your contact form is working properly.\n\n";
        $message .= "If you received this email, your contact form email functionality is working correctly!\n\n";
        $message .= "Test details:\n";
        $message .= "- Sent from: " . home_url() . "\n";
        $message .= "- Time: " . date('F j, Y g:i A') . "\n";
        $message .= "- Server: " . $_SERVER['HTTP_HOST'] . "\n\n";
        $message .= "You can now delete this test email.";

        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            'From: Portfolio Test <noreply@' . $_SERVER['HTTP_HOST'] . '>',
        );

        $sent = wp_mail($to, $subject, $message, $headers);

        if ($sent) {
            wp_die('✅ Test email sent successfully! Check your inbox at plg.cardano@gmail.com<br><br><a href="' . home_url() . '">← Back to Homepage</a>');
        } else {
            wp_die('❌ Test email failed to send. Your server might not be configured for email.<br><br><strong>Alternative solutions:</strong><br>• Use a contact form plugin like Contact Form 7<br>• Configure SMTP in your hosting panel<br>• Use external service like Formspree<br><br><a href="' . home_url() . '">← Back to Homepage</a>');
        }
    }
}
add_action('init', 'pc_portfolio_test_email');

/**
 * Optional: Configure SMTP for better email delivery
 * Uncomment and configure if emails aren't being sent reliably
 */
/*
function pc_portfolio_configure_smtp($phpmailer) {
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.gmail.com';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 587;
$phpmailer->SMTPSecure = 'tls';

// You would need to create an app password for Gmail
$phpmailer->Username = 'your-gmail@gmail.com';
$phpmailer->Password = 'your-app-password';

$phpmailer->From = 'noreply@yoursite.com';
$phpmailer->FromName = 'Portfolio Contact Form';
}
add_action('phpmailer_init', 'pc_portfolio_configure_smtp');
 */

/**
 * Add security headers for contact form
 */
function pc_portfolio_add_security_headers()
{
    if (is_front_page()) {
        // Add basic security headers
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
    }
}
add_action('send_headers', 'pc_portfolio_add_security_headers');

/**
 * Contact form rate limiting (basic spam protection)
 */
function pc_portfolio_contact_rate_limit()
{
    if (isset($_POST['submit_contact'])) {
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $rate_limit_key = 'contact_form_' . md5($user_ip);
        $submission_count = get_transient($rate_limit_key);

        if ($submission_count && $submission_count >= 3) {
            $_SESSION['form_error'] = "Too many submissions. Please wait a few minutes before trying again.";
            wp_redirect($_SERVER['REQUEST_URI'] . '#contact');
            exit;
        }

        // Increment counter
        $new_count = $submission_count ? $submission_count + 1 : 1;
        set_transient($rate_limit_key, $new_count, 300); // 5 minutes
    }
}
add_action('init', 'pc_portfolio_contact_rate_limit', 5);

/**
 * Log contact form submissions (basic logging)
 */
function pc_portfolio_log_contact_submission()
{
    if (isset($_POST['submit_contact']) && wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        $log_entry = date('Y-m-d H:i:s') . ' - Contact form submission from: ' . sanitize_email($_POST['email']) . ' (' . sanitize_text_field($_POST['name']) . ')' . "\n";
        error_log($log_entry, 3, ABSPATH . 'contact_form.log');
    }
}
add_action('init', 'pc_portfolio_log_contact_submission', 1);
