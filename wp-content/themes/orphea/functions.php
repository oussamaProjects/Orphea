<?php
/**
 * Orphea functions and definitions.
 *
 * @see https://developer.wordpress.org/themes/basics/theme-functions/
 */
if (!function_exists('orphea_setup')) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function orphea_setup()
{
    /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Orphea, use a find and replace
         * to change 'orphea' to the name of your theme in all the template files.
         */
        load_theme_textdomain('orphea', get_template_directory().'/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'orphea'),
            ));

        // For footer.
        register_nav_menus(array(
            'menu-2' => esc_html__('Footer 1', 'orphea'),
            ));
    register_nav_menus(array(
            'menu-3' => esc_html__('Footer 2', 'orphea'),
            ));
    register_nav_menus(array(
            'menu-4' => esc_html__('Footer 3', 'orphea'),
            ));
    register_nav_menus(array(
            'menu-5' => esc_html__('Footer 4', 'orphea'),
            ));
    register_nav_menus(array(
            'menu-6' => esc_html__('Footer 5', 'orphea'),
            ));
    register_nav_menus(array(
            'menu-7' => esc_html__('Footer 6', 'orphea'),
            ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('orphea_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
            )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /*
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
            ));
}
    endif;
    add_action('after_setup_theme', 'orphea_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function orphea_content_width()
{
    $GLOBALS['content_width'] = apply_filters('orphea_content_width', 640);
}
add_action('after_setup_theme', 'orphea_content_width', 0);

/**
 * Register widget area.
 *
 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function orphea_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'orphea'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'orphea'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ));
}
add_action('widgets_init', 'orphea_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function orphea_scripts()
{
    wp_enqueue_style('orphea-font', 'https://fonts.googleapis.com/css?family=Amaranth:400,400i,700,700i|Lato:300,400,700,900" rel="stylesheet"');
    wp_enqueue_style('orphea-style', get_stylesheet_uri());
    wp_enqueue_style('parcial-style', get_template_directory_uri().'/partial-style.css"');
    wp_enqueue_style('other-style', get_template_directory_uri().'/other-css/other_style.css"'); // @todo : insert in global SCSS and rebuild
    wp_enqueue_style('jobs-style', get_template_directory_uri().'/other-css/jobs_style.css"'); // @todo : insert in global SCSS and rebuild - Alexis -> Jobs Offers

    // wp_enqueue_script('jquery', get_template_directory_uri().'/js/libs/jquery/dist/js/jquery.min.js', array(), '20151215', true);
    wp_enqueue_script('tether', get_template_directory_uri().'/js/libs/tether/dist/js/tether.min.js', array(), '20151215', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/libs/bootstrap/dist/js/bootstrap.min.js', array(), '20151215', true);
    wp_enqueue_script('owl.carousel', get_template_directory_uri().'/js/libs/owl.carousel/src/js/owl.carousel.js', array(), '20151215', true);
    wp_enqueue_script('owl.navigation', get_template_directory_uri().'/js/libs/owl.carousel/src/js/owl.navigation.js', array(), '20151 ', true);

    wp_enqueue_script('orphea-script', get_template_directory_uri().'/js/script.js', array('jquery'), '20171110', true);

    /*
    * Ajroudi Mohamed Modification
    **/
    global $post,$wp_query;
    // wp_enqueue_script('orphea-ajax-script', get_template_directory_uri().'/js/script2.js', array('jquery'), '20151215', true);
    wp_localize_script('orphea-script', 'misha_loadmore_params', array(
        'ajaxurl'      => site_url().'/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts'        => serialize($wp_query->query_vars), // everything about your loop is here
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 2,
        'max_page'     => $wp_query->max_num_pages,
        'pageID'       => $post->ID,
    ));
    /*****************************/
    wp_enqueue_script('my_loadmore');
    wp_enqueue_script('orphea-navigation', get_template_directory_uri().'/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('orphea-skip-link-focus-fix', get_template_directory_uri().'/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'orphea_scripts');

/*
 * Disable wp emojicons on front
 */
add_action('init', function () {
    if (is_admin()) {
        return;
    }

    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // filter to remove TinyMCE emojis
    add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
});



/**
 * Implement the Custom Post feature.
 */
require get_template_directory().'/inc/custom-post.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory().'/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory().'/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory().'/inc/customizer.php';

/*
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory().'/inc/jetpack.php';
}

/*
 * Ce qui suit permet la division des formulaires Gravity Forms en ajoutant un champs de devision.
 * Ca sera utilisé pour avoir des formulaires multicolumn(Comme dans le formulaire de telechargement dans la page d'accueil).
 */

if (!class_exists('GF_Field_Column') && class_exists('GF_Field')) {
    class GF_Field_Column extends GF_Field
    {
        public $type = 'column';

        public function get_form_editor_field_title()
        {
            return esc_attr__('Column Break', 'gravityforms');
        }

        public function is_conditional_logic_supported()
        {
            return false;
        }

        public function get_form_editor_field_settings()
        {
            return array(
                    'column_description',
                    'css_class_setting',
            );
        }

        public function get_field_input($form, $value = '', $entry = null)
        {
            return '';
        }

        public function get_field_content($value, $force_frontend_label, $form)
        {
            $is_entry_detail = $this->is_entry_detail();
            $is_form_editor  = $this->is_form_editor();
            $is_admin        = $is_entry_detail || $is_form_editor;

            if ($is_admin) {
                $admin_buttons = $this->get_admin_buttons();

                return $admin_buttons.'<label class=\'gfield_label\'>'.$this->get_form_editor_field_title().'</label>{FIELD}<hr>';
            }

            return '';
        }
    }
}

function register_gf_field_column()
{
    if (!class_exists('GFForms') || !class_exists('GF_Field_Column')) {
        return;
    }
    GF_Fields::register(new GF_Field_Column());
}
add_action('init', 'register_gf_field_column', 20);

function add_gf_field_column_settings($placement, $form_id)
{
    if ($placement == 0) {
        $description = 'Column breaks should be placed between fields to split form into separate columns. You do not need to place any column breaks at the beginning or end of the form, only in the middle.';
        echo '<li class="column_description field_setting">'.$description.'</li>';
    }
}
add_action('gform_field_standard_settings', 'add_gf_field_column_settings', 10, 2);

function filter_gf_field_column_container($field_container, $field, $form, $css_class, $style, $field_content)
{
    if (IS_ADMIN) {
        return $field_container;
    }
    if ($field['type'] == 'column') {
        $column_index = 2;
        foreach ($form['fields'] as $form_field) {
            if ($form_field['id'] == $field['id']) {
                break;
            }
            if ($form_field['type'] == 'column') {
                ++$column_index;
            }
        }

        return '</ul><ul class="'.GFCommon::get_ul_classes($form).' column column_'.$column_index.' '.$field['cssClass'].'">';
    }

    return $field_container;
}
add_filter('gform_field_container', 'filter_gf_field_column_container', 10, 6);

function filter_gf_multi_column_pre_render($form, $ajax, $field_values)
{
    $column_count    = 0;
    $prev_page_field = null;
    foreach ($form['fields'] as $field) {
        if ($field['type'] == 'column') {
            ++$column_count;
        } elseif ($field['type'] == 'page') {
            if ($column_count > 0 && empty($prev_page_field)) {
                $form['firstPageCssClass'] = trim((isset($field['firstPageCssClass']) ? $field['firstPageCssClass'] : '').' gform_page_multi_column gform_page_column_count_'.($column_count + 1));
            } elseif ($column_count > 0) {
                $prev_page_field['cssClass'] = trim((isset($prev_page_field['cssClass']) ? $prev_page_field['cssClass'] : '').' gform_page_multi_column gform_page_column_count_'.($column_count + 1));
            }
            $prev_page_field = $field;
            $column_count    = 0;
        }
    }
    if ($column_count > 0 && empty($prev_page_field)) {
        $form['cssClass'] = trim((isset($form['cssClass']) ? $form['cssClass'] : '').' gform_multi_column gform_column_count_'.($column_count + 1));
    } elseif ($column_count > 0) {
        $prev_page_field['cssClass'] = trim((isset($prev_page_field['cssClass']) ? $prev_page_field['cssClass'] : '').' gform_page_multi_column gform_page_column_count_'.($column_count + 1));
    }

    return $form;
}
add_filter('gform_pre_render', 'filter_gf_multi_column_pre_render', 10, 3);

function after_submission_contact($entry, $form)
{
    //Create a cookie for 1 year
    setcookie('contactDone', '1', time() + 3600 * 24 * 365, '/');
    $_COOKIE['contactDone'] = '1';
}
add_action('gform_after_submission_6', 'after_submission_contact', 10, 2);

function prefix_nav_description($item_output, $item, $depth, $args)
{
    if (!empty($item->description)) {
        $item_output = str_replace($args->link_after.'</a>', '<span class="menu-item-description">'.$item->description.'</span>'.$args->link_after.'</a>', $item_output);
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'prefix_nav_description', 10, 4);

/**
 * Ajroudi Mohammed Edit ***************************************************************************************************.
 **/
function misha_loadmore_ajax_handler()
{
    $queryvars = null;
    $args      = array('posts_per_page' => 3, 'orderby' => 'date', 'order'   => 'DESC');
    if (isset($_POST['query']) && !empty($_POST['query'])) {
        $queryvars = unserialize(stripslashes(htmlspecialchars_decode($_POST['query'])));
        if ($queryvars['pagename'] == 'publications') {
            $args['post_type'] = 'pub';
        }
        if ($queryvars['pagename'] == 'actualites-evenements') {
            $args['post_type'] = 'post';
        }
        if ($queryvars['pagename'] == 'clients') {
            $args['post_type'] = 'client';
        }
    }

    $latest = new WP_Query($args);

    $post_ids = $queryvars['pagename'] != 'clients' ? wp_list_pluck($latest->posts, 'ID') : array();

    $per_page = 6;
    if ($queryvars['pagename'] == 'clients') {
        $per_page = 20;
    } elseif ($queryvars['pagename'] == 'actualites-evenements') {
        $per_page = 9;
    }

    $orderby = $queryvars['pagename'] != 'clients' ? 'date' : 'title';
    $order   = $queryvars['pagename'] != 'clients' ? 'DESC' : 'ASC';

    $args = array(
        'post__not_in'   => $post_ids,
        'posts_per_page' => $per_page,
        'orderby'        => $orderby,
        'order'          => $order,
        'paged'          => $_POST['page'],
    );

    if (isset($queryvars) && !empty($queryvars)) {
        if ($queryvars['pagename'] == 'publications') {
            $args['post_type'] = 'pub';
        }
        if ($queryvars['pagename'] == 'actualites-evenements') {
            $args['post_type'] = 'post';
        }
        if ($queryvars['pagename'] == 'clients') {
            $args['post_type'] = 'client';
        }
    }

    if (isset($_POST['term_pub']) && !empty($_POST['term_pub'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categories_pub',
                'field'    => 'id',
                'terms'    => $_POST['term_pub'],
                ),
            );
    }

    if (isset($_POST['term_client']) && !empty($_POST['term_client'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'type_activite',
                'field'    => 'slug',
                'terms'    => $_POST['term_client'],
                ),
            );
    }

    if (isset($_POST['trierPar']) && !empty($_POST['trierPar'])) {
        $args['order']    = $_POST['trierPar'];
    }

    /* *********** page actualites-evenements */
    if (isset($_GET['type']) && !empty($_GET['type'])) {
        $args['meta_key']      = 'type';
        $args['meta_value']    = $_GET['type'];
    }

    if (isset($_GET['category']) && !empty($_GET['category'])) {
        $args['cat'] = $_GET['category'];
    }
    /* ************ */

    $args['post_status'] = 'publish';

    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
    if (ICL_LANGUAGE_CODE == 'fr') {
        $post_date = get_the_date('d/m/Y');
    } else {
        $post_date = get_the_date('Y/m/d');
    }

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            if (get_post_type() == 'client') {
                get_template_part('template-parts/ajax/content-client');
            } else {
                get_template_part('template-parts/ajax/content');
            }
            // for the test purposes comment the line above and uncomment the below one
            // the_title();
        endwhile;
    endif;

    die;
}
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}

/* *********************************************************************************************************************** */

add_filter('wpseo_breadcrumb_links', 'my_wpseo_breadcrumb_links');
function my_wpseo_breadcrumb_links($links)
{
    if (is_single()) {
        $cpt_object = get_post_type_object(get_post_type());

        if (!$cpt_object->_builtin || get_post_type() == 'post') {
            $slugPage = $cpt_object->rewrite['slug'];

            if (get_post_type() == 'cas_client') {
                $slugPage = '/cas-clients/';
            } elseif (get_post_type() == 'post') {
                $slugPage = '/actualites-evenements/';
            }

            $landing_page = get_page_by_path($slugPage);
            if (ICL_LANGUAGE_CODE != 'fr') {
                $landing_page = get_page(icl_object_id($landing_page->ID, 'page', true, ICL_LANGUAGE_CODE));
            }

            array_splice($links, -1, 0, array(
                array(
                    'id'    => $landing_page->ID,
                ),
            ));
        }
    }

    return $links;
}

//SELECTOR LANGAGE
function language_selector_code_()
{
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if (!empty($languages)) {
        foreach ($languages as $l) {
            if (!$l['active']) {
                //echo'----';
         echo '<a href="'.$l['url'].'">';
                echo $l['language_code'];
                echo '</a>';
            }
        }
    }
}

//OPEN EXTERNAL IN NEW TABS
add_action('wp_head', 'awts_openlinks_innnewtab'); // Write our JS below here
function awts_openlinks_innnewtab()
{
    ?>

<script type='text/javascript'>
//<![CDATA[
//Open External Links in New Window - Script by STCnetwork.org
jQuery(document).ready(function($){
$("#content a[href^=http], #content a[href^=https]")
.each(function(){
if (this.href.indexOf(location.hostname) == -1){
$(this).attr({ "target":"_blank" })}
if (this.href.indexOf(location.hostname) != -1){
if ( $(this).attr('target') == '_blank') {$(this).attr("target", "");}}
});});
//]]>
</script>
<?php

}
