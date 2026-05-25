const fs = require('fs');
const path = require('path');

const baseDir = 'e:/Manjit - system data/test/lexwell-wp-theme';
const htmlFile = path.join(baseDir, 'index.html');

let content = fs.readFileSync(htmlFile, 'utf8');

// SPLIT LOGIC
const headerSplitIndex = content.indexOf('</header>') + '</header>'.length;
let headerContent = content.substring(0, headerSplitIndex);

const footerSplitIndex = content.indexOf('<footer class="footer-area">');
let footerContent = content.substring(footerSplitIndex);

let indexContent = content.substring(headerSplitIndex, footerSplitIndex);

// WordPress modifications for header.php
let headerPhp = headerContent.replace('</head>', '    <?php wp_head(); ?>\n</head>');
headerPhp = headerPhp.replace(/href="assets\//g, 'href="<?php echo get_template_directory_uri(); ?>/assets/');
headerPhp = headerPhp.replace(/src="assets\//g, 'src="<?php echo get_template_directory_uri(); ?>/assets/');

// WordPress modifications for footer.php
let footerPhp = footerContent.replace('</body>', '    <?php wp_footer(); ?>\n</body>');
footerPhp = footerPhp.replace(/src="assets\//g, 'src="<?php echo get_template_directory_uri(); ?>/assets/');
footerPhp = footerPhp.replace(/href="assets\//g, 'href="<?php echo get_template_directory_uri(); ?>/assets/');

// WordPress modifications for index.php
let indexPhp = "<?php get_header(); ?>\n" + indexContent.replace(/src="assets\//g, 'src="<?php echo get_template_directory_uri(); ?>/assets/') + "\n<?php get_footer(); ?>";

// Write files
fs.writeFileSync(path.join(baseDir, 'header.php'), headerPhp, 'utf8');
fs.writeFileSync(path.join(baseDir, 'footer.php'), footerPhp, 'utf8');
fs.writeFileSync(path.join(baseDir, 'index.php'), indexPhp, 'utf8');

// Generate other WP files
const functionsPhp = `<?php
function lexwell_enqueue_scripts() {
    wp_enqueue_style( 'lexwell-google-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap', array(), null );
    wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), '1.11.3' );
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css', array(), '5.3.7' );
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0' );
    wp_enqueue_style( 'lexwell-style', get_template_directory_uri() . '/assets/css/style.css', array('bootstrap'), '1.0.0' );
    wp_enqueue_style( 'lexwell-wp-style', get_stylesheet_uri(), array('lexwell-style'), '1.0.0' );

    wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js', array(), '5.3.7', true );
    wp_enqueue_script( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0', true );
    wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.12.5', true );
    wp_enqueue_script( 'lexwell-script', get_template_directory_uri() . '/assets/js/script.js', array('bootstrap-bundle', 'swiper-bundle', 'gsap'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'lexwell_enqueue_scripts' );

function lexwell_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'lexwell' ),
        'footer'  => __( 'Footer Menu', 'lexwell' ),
    ) );
}
add_action( 'after_setup_theme', 'lexwell_theme_setup' );
?>`;
fs.writeFileSync(path.join(baseDir, 'functions.php'), functionsPhp, 'utf8');

const styleCss = `/*
Theme Name: Lexwell WP Theme
Theme URI: http://example.com/lexwell/
Author: Antigravity AI
Author URI: http://example.com/
Description: A custom WordPress theme for Lexwell Advisors based on static HTML layout.
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: lexwell
*/

/* Core styles are located in assets/css/style.css */
`;
fs.writeFileSync(path.join(baseDir, 'style.css'), styleCss, 'utf8');

const pagePhp = `<?php get_header(); ?>
<main id="main-content" class="container" style="padding-top: 150px; padding-bottom: 80px;">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            echo '<h1>' . get_the_title() . '</h1>';
            the_content();
        endwhile;
    endif;
    ?>
</main>
<?php get_footer(); ?>`;
fs.writeFileSync(path.join(baseDir, 'page.php'), pagePhp, 'utf8');

const singlePhp = `<?php get_header(); ?>
<main id="main-content" class="container" style="padding-top: 150px; padding-bottom: 80px;">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            echo '<h1>' . get_the_title() . '</h1>';
            the_content();
        endwhile;
    endif;
    ?>
</main>
<?php get_footer(); ?>`;
fs.writeFileSync(path.join(baseDir, 'single.php'), singlePhp, 'utf8');

// Optional: remove index.html since we now have the php files. But we can leave it as reference.

console.log('WordPress files generated successfully.');
