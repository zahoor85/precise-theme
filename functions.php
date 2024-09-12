<?php
/**
 * Author : zahoor
 * precisecodes.com
 */
if (!function_exists('precise_codes_setup')):
	function precise_codes_setup() {
		global $content_width;

		if (!isset($content_width)) {
			$content_width = 640;
		}

		/**
		 * RSS FEED etc
		 */
		add_theme_support('automatic-feed-links');

		/*
			     * Enable support for Post Thumbnails on posts and pages.
		*/
		add_theme_support('post-thumbnails');
		/* Set the image size by cropping the image */
		add_image_size('post-thumbnail', 250, 250, true);
		add_image_size('precise_team', 225, 225, true);

		/* Register primary menu */
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'precisecodes'),
		));

		/* Enable support for Post Formats. */
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		/* Enable support for HTML5 markup. */
		add_theme_support('html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
		));

		/* Customizer additions. */
		require get_template_directory() . '/inc/customizer.php';

	}
endif; // precise_codes_setup
add_action('after_setup_theme', 'precise_codes_setup');

function precise_wp_page_menu() {
	echo '<ul class="nav navbar-nav navbar-right">';
	wp_list_pages(array('title_li' => '', 'depth' => 1));

	echo '</ul>';
}

function add_menuclass($ulclass) {
	return preg_replace('/<a /', '<a class="page-scroll"', $ulclass);
}
add_filter('wp_nav_menu', 'add_menuclass');

/**
 * Customize menus for different pages
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'secondary' => __('Secondary Menu'),
		)
	);
}
add_action('init', 'register_my_menus');

/**
 * Add custom class to body
 */
/* Adds extra body classes */

function pc_body_classes($classes) {
	$classes[] = 'page';
	if (is_front_page()) {
		$classes[] = 'front-page';
	} else {
		if (is_page()) {
			$classes[] = $pagename = get_query_var('pagename');
			if ($pagename == 'contact') {
				$classes[] = 'contactus';
			}
		}
	}

	return $classes;
}
add_filter('body_class', 'pc_body_classes');

/**
 * Enqueue scripts and styles.
 */

function precise_codes_scripts() {

	/**
	 * Fonts typo
	 */
	wp_enqueue_style('precise_font_lato', 'http://fonts.googleapis.com/css?family=Lato:400,700,900,300');
	wp_enqueue_style('precise_font_all', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300');

	/**
	 * Bootstrap & Font-Awosome
	 */
	wp_enqueue_style('precise_bootstrap_style', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('precise_fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), 'v1');

	/**
	 * Slider
	 */
	wp_enqueue_style('precise_owlCarousel_style', get_template_directory_uri() . '/css/owl.carousel.css');
	wp_enqueue_style('precise_owlTheme_style', get_template_directory_uri() . '/css/owl.theme.css');

	/**
	 * Stylesheet
	 */
	wp_enqueue_style('precise_preciseCode_style', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_style('precise_animate_style', get_template_directory_uri() . '/css/animate.min.css');

	wp_enqueue_script('jquery');

	/* Modernizr script */
	wp_enqueue_script('precise_modernizr_script', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '20160101', true);

	/* Bootstrap script */
	wp_enqueue_script('precise_bootstrap_script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20160101', true);

	/* Smootscroll script */
	wp_enqueue_script('precise_smoothscroll', get_template_directory_uri() . '/js/SmoothScroll.js', array("jquery"), '20160101', true);

	/* wow script */
	wp_enqueue_script('precise_wow_script', get_template_directory_uri() . '/js/wow.min.js', array("jquery"), '20160101', true);

	/* Isotop script */
	wp_enqueue_script('precise_isoTop_script', get_template_directory_uri() . '/js/jquery.isotope.js', array("jquery"), '20160101', true);

	/* Bootstap validation script */
	wp_enqueue_script('precise_bootstrap_validation_script', get_template_directory_uri() . '/js/jqBootstrapValidation.js', array("jquery"), '20160101', true);

	/* contact validation script */
	wp_enqueue_script('precise_contact_validation_script', get_template_directory_uri() . '/js/contact_me.js', array("jquery"), '20160101', true);

	/* Ajax Nonce */
	$params = array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'ajax_nonce' => wp_create_nonce('contact_form_security'),
	);
	wp_localize_script('precise_contact_validation_script', 'ajax_object', $params);

	/* wow carousel script */
	wp_enqueue_script('precise_wowCarousel_script', get_template_directory_uri() . '/js/owl.carousel.js', array("jquery"), '20160101', true);

	/* precise codes script */
	wp_enqueue_script('precise_preciseCodes_script', get_template_directory_uri() . '/js/main.js', array("jquery"), '20160101', true);

}
add_action('wp_enqueue_scripts', 'precise_codes_scripts');

/**
 * Register widgetized area and update sidebar with default widgets.
 */

function precise_widgets_init() {

	register_sidebar(array(
		'name' => __('Sidebar', 'precisecodes'),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

}

add_action('widgets_init', 'precise_widgets_init');

/*****************************************/
/******          WIDGETS     *************/
/*****************************************/

add_action('widgets_init', 'precise_register_widgets');

function precise_register_widgets() {

	register_widget('precise_ourfocus_widget');
	register_widget('precise_testimonial_widget');
	register_widget('precise_team_widget');
	register_widget('precise_aboutus_widget');

	$precise_codes_sidebars = array('sidebar-ourfocus' => 'sidebar-ourfocus', 'sidebar-testimonials' => 'sidebar-testimonials', 'sidebar-ourteam' => 'sidebar-ourteam', 'sidebar-aboutus' => 'sidebar-aboutus');

	/* Register sidebars */
	foreach ($precise_codes_sidebars as $precise_codes_sidebar):

		if ($precise_codes_sidebar == 'sidebar-ourfocus'):

			$precise_codes_name = __('Our focus section widgets', 'precisecodes');

		elseif ($precise_codes_sidebar == 'sidebar-testimonials'):

			$precise_codes_name = __('Testimonials section widgets', 'precisecodes');

		elseif ($precise_codes_sidebar == 'sidebar-ourteam'):

			$precise_codes_name = __('Our team section widgets', 'precisecodes');

		elseif ($precise_codes_sidebar == 'sidebar-aboutus'):

			$precise_codes_name = __('About us section widgets', 'precisecodes');

		else:

			$precise_codes_name = $precise_codes_sidebar;

		endif;

		register_sidebar(
			array(
				'name' => $precise_codes_name,
				'id' => $precise_codes_sidebar,
				'before_widget' => '',
				'after_widget' => '',
			)
		);

	endforeach;

}

/**************************/
/****** our focus widget */
/************************/
require get_template_directory() . '/widgets/focus_widget.php';

/****************************/
/****** team member widget **/
/***************************/
require get_template_directory() . '/widgets/team_widget.php';

/**************************/
/****** aboutus widget */
/************************/
require get_template_directory() . '/widgets/aboutus_widget.php';

/****************************/
/****** testimonial widget **/
/***************************/
require get_template_directory() . '/widgets/testimonial_widget.php';

/****************************/
/****** Portfolio Post Type **/
/***************************/

require get_template_directory() . '/portfolio-type.php';

add_action('init', 'initialize_cmb_meta_boxes', 9999);
function initialize_cmb_meta_boxes() {
	if (!class_exists('cmb_Meta_Box')) {
		require_once 'inc/metaboxes/init.php';
	}
}

function precise_get_main_terms($taxonomy) {
	if (taxonomy_exists($taxonomy)):
		$terms = get_terms($taxonomy, array('parent' => 0, 'hide_empty' => 0));
		return $terms;
	endif;
	return false;
}
function precise_portfolio_posts($taxonomy, $terms) {
	if (taxonomy_exists($taxonomy) && isset($terms)):
		$terms_array = array();
		foreach ($terms as $term) {
			$terms_array[] = $term->slug;
		}

		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => 3,
			'orderby' => 'rand',
			'tax_query' => array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $terms_array,
				),
			),
		);
		$query_posts = new WP_Query($args);
		return $query_posts;
	endif;
	return null;
}

function load_portfolio_data() {
	$portfolio = (int) $_GET['portfolio'];
	?>
    <!-- Project Details Go Here -->
    <h2>Project Title</h2>
    <p class="item-intro"></p>
    <img class="img-responsive img-centered" src="<?php echo $post_main; ?>" alt="">
    <p></p>
    <ul class="list-inline">
        <li><strong>Client</strong>: </li>
        <li><strong>Category</strong>: </li>
    </ul>
    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>

<?php die();
}
add_action('wp_ajax_load_portfolio_data', 'load_portfolio_data');
add_action('wp_ajax_nopriv_load_portfolio_data', 'load_portfolio_data');

/**
 * Contact us form ajax call & functionality
 */
add_action('wp_ajax_nopriv_contactForm', 'send_contact_form');
add_action('wp_ajax_contactForm', 'send_contact_form');
function send_contact_form() {

	if (empty($_POST['name']) ||
		empty($_POST['email']) ||
		empty($_POST['message']) ||
		!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		echo -1;
		wp_die();
	}
	check_ajax_referer('contact_form_security', 'security');

	$name = $_POST['name'];
	$email_address = $_POST['email'];
	$message = $_POST['message'];
	$toEmail = get_theme_mod('precise_contactus_email');
	// Create the email and send the message
	$to = $toEmail; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
	$email_subject = "Website Contact Form:  $name";
	$email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
	$headers = "From: noreply@precisecodes.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
	$headers .= "Reply-To: $email_address";
	wp_mail($to, $email_subject, $email_body, $headers);
	echo 1;
	wp_die();
}

/**
* WP get post terms and return as array
*/
function wp_return_terms_array($post_id, $taxonomy){
    $term_list = wp_get_post_terms($post_id, $taxonomy, array("fields" => "names"));
    if($term_list){
       return  $term_list = implode(', ',$term_list);
    }
}
?>