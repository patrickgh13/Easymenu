<?php
// General
add_theme_support('post-thumbnails');
add_post_type_support('pages','excerpt');
add_post_type_support('page', 'excerpt');


// Less Compile
add_action('init', 'less_compile');
function less_compile(){
    if(get_option('less_status',1)==1) {
        $dir = dirname(__FILE__);
        include_once $dir . "/css/lessc.inc.php";
        $less = new lessc;
        $less->setPreserveComments(true);
        try {
            $less->setFormatter("compressed");
            //$less->compileFile($dir . "/css/app_" . get_locale() . ".less", $dir . "/css/app_" . get_locale() . ".css");
            $less->compileFile($dir . "/css/app.less", $dir . "/css/app.css");
        } catch (exception $e) {
            echo "fatal error: " . $e->getMessage();
        }
    }
}
add_action('init', 'sidebars');
function sidebars() {
	register_sidebar(
		array(
			'name'          => 'adora',
			'id'            => 'sidebar-1',
			'description'   => 'Article Widgets',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'footer',
			'id'            => 'sidebar-2',
			'description'   => 'footer links',
			'before_widget' => '<section id="%1$s" class="cell large-3 medium-6 small-6 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_shortcode('archive_by_year_and_month','get_archive_by_year_and_month');

function get_archive_by_year_and_month($atts=array()){
    global $wpdb;
    $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC");
    if($years){
        $rueckgabe = '<ul>';
        foreach($years as $year){
            $rueckgabe.='<li class="jahr"><a href="'.get_year_link($year).'">'.$year.'</a>';
            $rueckgabe.='<ul class="monthlist">';
            $months = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_type='post' AND post_status='publish' AND YEAR(post_date) = %d ORDER BY post_date ASC",$year));
            foreach($months as $month){
                $dateObj   = DateTime::createFromFormat('!m', $month);
                $monthName = $dateObj->format('F');
                $rueckgabe.='<li class="month"><a href="'.get_month_link($year,$month).'">'.$monthName.'</a></li>';
            }
            $rueckgabe.='</ul>';
            $rueckgabe.='</li>';
        }
        $rueckgabe.='</ul>';
    }
    return $rueckgabe;
}
add_filter('admin_init', 'less_register_settings');
function less_register_settings(){
    register_setting('general', 'less_status', 'esc_attr');
    add_settings_field('less_status', '<label>'.__('LESS CSS Compiler Status' , 'less_status' ).'</label>' , 'less_settings_fields_html', 'general');
}
function less_settings_fields_html(){
    $value = get_option( 'less_status', '' );
    echo '<fieldset>';
    if($value == 0){
        echo '<label><input type="radio" name="less_status" value="1" /> <span>Enable</span></label><br>';
        echo '<label><input type="radio" name="less_status" value="0" checked="checked" /> <span>Disable</span></label><br>';
    }else{
        echo '<label><input type="radio" name="less_status" value="1" checked="checked" /> <span>Enable</span></label><br>';
        echo '<label><input type="radio" name="less_status" value="0" /> <span>Disable</span></label><br>';
    }
    echo '</fieldset>';
}

// Register Styles and Scripts
if ( !function_exists( 'register_styles_scripts' ) ) :
function register_styles_scripts() {
    // Styles
    wp_register_style( 'foundation'    , get_template_directory_uri() . '/css/foundation.css', array(), '6.5.1' );
    wp_register_style( 'owl'    , get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.8.1' );
    wp_register_style( 'owl-theme'    , get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.8.1' );
    //wp_register_style( 'app'    , get_template_directory_uri() . '/css/app_'.get_locale().'.css', array(), '1.0.0' );
    wp_register_style( 'app'    , get_template_directory_uri() . '/css/app.css', array(), '1.0.0' );


    // Scripts
    wp_register_script( 'jQuery3.3.1'    , get_template_directory_uri() . '/js/vendor/jquery.js', array(), '3.3.1', true );
    wp_register_script( 'foundation'     , get_template_directory_uri() . '/js/vendor/foundation.js', array(), '2.3.4', true );
    wp_register_script( 'owl'     , get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array(), '1.8.1', true );
    wp_register_script( 'isotope'     , get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '', true );
    wp_register_script( 'app'     , get_template_directory_uri() . '/js/app.js', array(), '', true );

    // Load'em All
    wp_enqueue_style( 'foundation' );
        wp_enqueue_style( 'owl' );
        //wp_enqueue_style( 'owl-theme' );
    wp_enqueue_style( 'app' );

    wp_enqueue_script( 'jQuery3.3.1' );
    wp_enqueue_script( 'foundation' );
        wp_enqueue_script( 'owl' );
    wp_enqueue_script( 'isotope' );
    wp_enqueue_script( 'app' );
}
add_action( 'wp_enqueue_scripts', 'register_styles_scripts' );
endif;


// Register Navigation Menus
if ( !function_exists( 'register_adora_menus' ) ) :
function register_adora_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'shop-menu' => __( 'shop Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'register_adora_menus' );
endif;


function my_custom_post_type_archive_where($where,$args){
    $post_type  = isset($args['post_type'])  ? $args['post_type']  : 'post';
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;
}
add_filter( 'getarchives_where','my_custom_post_type_archive_where',10,2);

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );
function woocommerce_custom_single_add_to_cart_text() {
    return __( '+', 'woocommerce' );
}

//The filters.. both are required.
add_filter('gettext', 'change_checkout_btn');
add_filter('ngettext', 'change_checkout_btn');

//function
function change_checkout_btn($checkout_btn){
  $checkout_btn= str_ireplace('اقدام به پرداخت', 'سفارش نهایی', $checkout_btn);
  return $checkout_btn;
}

require_once (dirname(__FILE__) . '/sample/barebones-config.php');

// Translations
