<?php
get_header();

if (get_option('show_on_front') == 'page') {

	include get_page_template();

} else {

/* HOME SECTION  */

	$precise_hometitle_show = get_theme_mod('precise_hometitle_show');

	if (isset($precise_hometitle_show) && $precise_hometitle_show != 1):

		get_template_part('sections/home_banner');

	endif;

/* OUR FOCUS SECTION */

	$precise_ourfocus_show = get_theme_mod('precise_ourfocus_show');

	if (isset($precise_ourfocus_show) && $precise_ourfocus_show != 1):

		get_template_part('sections/our_focus');

	endif;

/* Portfilio SECTION */

	$precise_portfolio_show = get_theme_mod('precise_portfolio_show');

	if (isset($precise_portfolio_show) && $precise_portfolio_show != 1):

		get_template_part('sections/portfolio');

	endif;
/* About us SECTION */
	$precise_aboutus_show = get_theme_mod('precise_aboutus_show');

	if (isset($precise_aboutus_show) && $precise_aboutus_show != 1):

		get_template_part('sections/about_us');

	endif;

/* OUR TEAM */

	$precise_ourteam_show = get_theme_mod('precise_ourteam_show');

	if (isset($precise_ourteam_show) && $precise_ourteam_show != 1):

		get_template_part('sections/our_team');

	endif;

/* TESTIMONIALS */

	$precise_testimonials_show = get_theme_mod('precise_testimonials_show');

	if (isset($precise_testimonials_show) && $precise_testimonials_show != 1):

		get_template_part('sections/testimonials');

	endif;

	?>

<?php
/* Contact us */
	get_template_part('sections/contact_us');
}
get_footer();?>
