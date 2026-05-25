import os

base_dir = r"e:\Manjit - system data\test\lexwell-wp-theme"
html_file = os.path.join(base_dir, "index.html")

with open(html_file, 'r', encoding='utf-8') as f:
    content = f.read()

# SPLIT LOGIC
# Header: from start to </header>
header_split = content.find('</header>') + len('</header>')
header_content = content[:header_split]

# Footer: from <footer class="footer-area"> to end
footer_split = content.find('<footer class="footer-area">')
footer_content = content[footer_split:]

# Index: Everything between header and footer
index_content = content[header_split:footer_split]

# WordPress modifications for header.php
# Replace static asset paths with get_template_directory_uri()
# Or better, just add <?php wp_head(); ?> before </head>
header_php = header_content.replace(
    '</head>',
    '    <?php wp_head(); ?>\n</head>'
)
# Update asset paths in header
header_php = header_php.replace('href="assets/', 'href="<?php echo get_template_directory_uri(); ?>/assets/')
header_php = header_php.replace('src="assets/', 'src="<?php echo get_template_directory_uri(); ?>/assets/')

# WordPress modifications for footer.php
# Add <?php wp_footer(); ?> before </body>
footer_php = footer_content.replace(
    '</body>',
    '    <?php wp_footer(); ?>\n</body>'
)
# Update asset paths in footer
footer_php = footer_php.replace('src="assets/', 'src="<?php echo get_template_directory_uri(); ?>/assets/')
footer_php = footer_php.replace('href="assets/', 'href="<?php echo get_template_directory_uri(); ?>/assets/')

# WordPress modifications for index.php
index_php = "<?php get_header(); ?>\n" + index_content.replace('src="assets/', 'src="<?php echo get_template_directory_uri(); ?>/assets/') + "\n<?php get_footer(); ?>"

# Write files
with open(os.path.join(base_dir, "header.php"), "w", encoding="utf-8") as f:
    f.write(header_php)

with open(os.path.join(base_dir, "footer.php"), "w", encoding="utf-8") as f:
    f.write(footer_php)

with open(os.path.join(base_dir, "index.php"), "w", encoding="utf-8") as f:
    f.write(index_php)

# -----------------
# Generate other WP files
# -----------------

# functions.php
functions_php = """<?php
function lexwell_enqueue_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'lexwell-google-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap', array(), null );
    
    // Enqueue Bootstrap Icons
    wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), '1.11.3' );
    
    // Enqueue Bootstrap CSS
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css', array(), '5.3.7' );
    
    // Enqueue Swiper CSS
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0' );
    
    // Theme Main CSS
    wp_enqueue_style( 'lexwell-style', get_template_directory_uri() . '/assets/css/style.css', array('bootstrap'), '1.0.0' );
    // Main WordPress Style (style.css)
    wp_enqueue_style( 'lexwell-wp-style', get_stylesheet_uri(), array('lexwell-style'), '1.0.0' );

    // Enqueue JS
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
?>"""

with open(os.path.join(base_dir, "functions.php"), "w", encoding="utf-8") as f:
    f.write(functions_php)

# style.css (Theme Header)
style_css = """/*
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
"""

with open(os.path.join(base_dir, "style.css"), "w", encoding="utf-8") as f:
    f.write(style_css)

# page.php
page_php = """<?php get_header(); ?>
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
<?php get_footer(); ?>"""

with open(os.path.join(base_dir, "page.php"), "w", encoding="utf-8") as f:
    f.write(page_php)

# single.php
single_php = """<?php get_header(); ?>
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
<?php get_footer(); ?>"""

with open(os.path.join(base_dir, "single.php"), "w", encoding="utf-8") as f:
    f.write(single_php)

print("Theme files generated successfully.")
