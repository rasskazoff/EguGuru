<?php
/**
 * EduGuru functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EduGuru
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function eduguru_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on EduGuru, use a find and replace
		* to change 'eduguru' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'eduguru', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	//add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Основное меню', 'eduguru' ),
			'top-menu' => esc_html__( 'Верхнее меню', 'eduguru' ),
			'footer-menu' => esc_html__( 'Меню в подвале', 'eduguru' ),
			'bottom-menu' => esc_html__( 'Нижнее меню', 'eduguru' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'eduguru_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'eduguru_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function eduguru_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'eduguru_content_width', 640 );
}
add_action( 'after_setup_theme', 'eduguru_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function eduguru_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'eduguru' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'eduguru' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'eduguru_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function eduguru_scripts() {
	wp_enqueue_style( 'eduguru-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'eduguru-style', 'rtl', 'replace' );

	wp_enqueue_script( 'eduguru-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eduguru_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
//Подключение JS темы
function add_scripts(){

	wp_enqueue_script('jquery');
	wp_enqueue_script("eduguru-js", get_template_directory_uri() . "/assets/js/scripts.min.js");
 }
 
 add_action( 'wp_enqueue_scripts', 'add_scripts'); 

//Склонение слов
function true_wordform($num, $form_for_1, $form_for_2, $form_for_5){
	$num = abs($num) % 100;
	$num_x = $num % 10;
	if ($num > 10 && $num < 20)
		return $form_for_5;
	if ($num_x > 1 && $num_x < 5)
		return $form_for_2;
	if ($num_x == 1) 
		return $form_for_1;
	return $form_for_5;
}
//ajax вывод постов
add_action("wp_ajax_load_more", "load_posts");
add_action("wp_ajax_nopriv_load_more", "load_posts");
function load_posts()
{	

	$posts = new WP_Query(array(
		"post_type"        => "cources",
		"post_status"      => "publish",
		"posts_per_page"   => $_POST['posts'],
		"paged" => $_POST["page"],
		"tag" => $_POST["tags"],
        "cat" => $_POST["cat_id"],

		'meta_key' => 'top',
		'orderby'  => 'meta_value',
		'order' => 'DESC'        
		
		));

	$count = $posts->found_posts;
	$count = true_wordform($count, 'Найден', 'Найдено', 'Найдено') . ' ' . $count . ' ' . true_wordform($count, 'вариант', 'варианта', 'вариантов');
	if( !empty($_POST['filter'])){		
		$html.= '<div id="ajax-add-script"> <script> setPostAjax("'.$count.'",'.$posts->max_num_pages.') </script> </div>';
	}

    if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post();

                $html .= get_template_part('template-parts/content', 'cources');

        endwhile;
    endif;

    wp_reset_postdata();
    die($html);
}
// функция для переадресации на партнерский урл
function partner(){
	
	if (isset($_GET['action'])){
		if ($_GET['action'] == 'partner'){
			if (isset($_GET['id'])){
				echo '<style>body{display:none}</style><script>window.location.href="'.get_fields($_GET['id'])['knopka']['partner_url'].'"</script>';				
			}
		}
	}
}

//функция для wp all import при импортировании спец тегов
function importTags($key, $val){
	
	$key = explode(' ',trim($key))[0];
	
	if($val == 'да'){
		return $key;
	}elseif($val == 'нет'){
		return;
	}elseif($val == 'начинающий'){
		return 'для начинающих';
	}elseif($val == 'средний'){
		return 'для среднего уровня';
	}elseif($val == 'продвинутый'){
		return 'для продвинутых';
	}else{
		return $key.': '.$val;
	}
}

//print_r(importTags("уровень","средний"));
//print_r(importTags('сертификат/диплом - П','да'));
/*
{undefined5};
[importTags("с сертификатом/дипломом",{undefined6})];
[importTags("с трудоустройством",{undefined7})];
[importTags("уровень",{undefined8})];
[importTags("срок обучения",{undefined9})];
[importTags("дата старта",{undefined10})];
[importTags("с рассрочкой",{undefined11})];
*/

function cptui_register_my_cpts_cources() {

	/**
	 * Post Type: Курсы.
	 */

	$labels = [
		"name" => __( "Курсы", "eduguru" ),
		"singular_name" => __( "cource", "eduguru" ),
		"menu_name" => __( "Курсы", "eduguru" ),
		"all_items" => __( "Все", "eduguru" ),
		"add_new" => __( "Добавить", "eduguru" ),
		"add_new_item" => __( "Добавить курс", "eduguru" ),
		"edit_item" => __( "Редактировать курс", "eduguru" ),
		"new_item" => __( "Новый курс", "eduguru" ),
		"view_item" => __( "Посмотреть курс", "eduguru" ),
		"view_items" => __( "Посмотреть курсы", "eduguru" ),
		"search_items" => __( "Поиск курсов", "eduguru" ),
		"not_found" => __( "Курсы не найдены", "eduguru" ),
		"not_found_in_trash" => __( "В корзине нет курсов", "eduguru" ),
		"parent" => __( "Родительский курс", "eduguru" ),
		"featured_image" => __( "Популярные изображения курсов", "eduguru" ),
		"set_featured_image" => __( "Установить избранное изображение для курса", "eduguru" ),
		"remove_featured_image" => __( "Удалить избранное изображение для курса", "eduguru" ),
		"use_featured_image" => __( "Использовать избранное изображение для курса", "eduguru" ),
		"archives" => __( "Архив курсов", "eduguru" ),
		"insert_into_item" => __( "Вставить в курс", "eduguru" ),
		"uploaded_to_this_item" => __( "Загружено в этот курс", "eduguru" ),
		"filter_items_list" => __( "Фильтровать список курсов", "eduguru" ),
		"items_list_navigation" => __( "Навигация по списоку курсов", "eduguru" ),
		"items_list" => __( "Список курсов", "eduguru" ),
		"attributes" => __( "Атрибуты курса", "eduguru" ),
		"name_admin_bar" => __( "Курс", "eduguru" ),
		"item_published" => __( "Курс опубликован", "eduguru" ),
		"item_published_privately" => __( "Курс опубликован в частном порядке", "eduguru" ),
		"item_reverted_to_draft" => __( "Курс возвращен в черновик", "eduguru" ),
		"item_scheduled" => __( "Курс запланирован", "eduguru" ),
		"item_updated" => __( "Курс обновлен", "eduguru" ),
		"parent_item_colon" => __( "Родительский курс", "eduguru" ),
	];

	$args = [
		"label" => __( "Курсы", "eduguru" ),
		"labels" => $labels,
		"description" => "Курсы",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "cources", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-welcome-learn-more",
		"supports" => [ "title", "editor", "thumbnail" ],
		"taxonomies" => [ "category", "post_tag" ],
		"show_in_graphql" => false,
	];

	register_post_type( "cources", $args );
}

add_action( 'init', 'cptui_register_my_cpts_cources' );


function wpse_178511_get_terms_fields( $clauses, $taxonomies, $args ) {
    if ( ! empty( $args['surname'] ) ) {
        global $wpdb;

        $surname_like = $wpdb->esc_like( $args['surname'] );

        if ( ! isset( $clauses['where'] ) )
            $clauses['where'] = '1=1';

        $clauses['where'] .= $wpdb->prepare( " AND t.name LIKE %s OR t.name LIKE %s", "$surname_like%", "% $surname_like%" );
    }

    return $clauses;
}

add_filter( 'terms_clauses', 'wpse_178511_get_terms_fields', 10, 3 );