<?php
/**
 * Precise Theme Customizer
 *
 * @package Precise
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function precise_customize_register($wp_customize) {

	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
	$wp_customize->remove_section('colors');

	/***********************************************/
	/************** GENERAL OPTIONS  ***************/
	/***********************************************/
	if (class_exists('WP_Customize_Panel')):

		$wp_customize->add_panel('panel_general', array(
			'priority' => 30,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('General options', 'precisecodes'),
		));

		$wp_customize->add_section('precise_general_section', array(
			'title' => __('General', 'precisecodes'),
			'priority' => 30,
			'panel' => 'panel_general',
		));

		/* COPYRIGHT */
		$wp_customize->add_setting('precise_copyright', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control('precise_copyright', array(
			'label' => __('Copyright', 'precisecodes'),
			'section' => 'precise_general_section',
			'settings' => 'precise_copyright',
			'priority' => 3,
		));

		$wp_customize->add_section('precise_general_socials_section', array(
			'title' => __('Socials', 'precisecodes'),
			'priority' => 31,
			'panel' => 'panel_general',
		));

		/* facebook */
		$wp_customize->add_setting('precise_socials_facebook', array('sanitize_callback' => 'esc_url_raw', 'default' => '#'));
		$wp_customize->add_control('precise_socials_facebook', array(
			'label' => __('Facebook link', 'precisecodes'),
			'section' => 'precise_general_socials_section',
			'settings' => 'precise_socials_facebook',
			'priority' => 4,
		));
		/* twitter */
		$wp_customize->add_setting('precise_socials_twitter', array('sanitize_callback' => 'esc_url_raw', 'default' => '#'));
		$wp_customize->add_control('precise_socials_twitter', array(
			'label' => __('Twitter link', 'precisecodes'),
			'section' => 'precise_general_socials_section',
			'settings' => 'precise_socials_twitter',
			'priority' => 5,
		));
		/* linkedin */
		$wp_customize->add_setting('precise_socials_linkedin', array('sanitize_callback' => 'esc_url_raw', 'default' => '#'));
		$wp_customize->add_control('precise_socials_linkedin', array(
			'label' => __('Linkedin link', 'precisecodes'),
			'section' => 'precise_general_socials_section',
			'settings' => 'precise_socials_linkedin',
			'priority' => 6,
		));
		/* Google plus */
		$wp_customize->add_setting('precise_socials_googleplus', array('sanitize_callback' => 'esc_url_raw', 'default' => '#'));
		$wp_customize->add_control('precise_socials_googleplus', array(
			'label' => __('Google plus', 'precisecodes'),
			'section' => 'precise_general_socials_section',
			'settings' => 'precise_socials_googleplus',
			'priority' => 7,
		));

	else: /* Old versions of WordPress */

		$wp_customize->add_section('precise_general_section', array(
			'title' => __('General options', 'precisecodes'),
			'priority' => 30,
			'description' => __('Precise theme general options', 'precisecodes'),
		));

		/* COPYRIGHT */
		$wp_customize->add_setting('precise_copyright', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control('precise_copyright', array(
			'label' => __('Copyright', 'precisecodes'),
			'section' => 'precise_general_section',
			'settings' => 'precise_copyright',
			'priority' => 3,
		));
		/* facebook */
		$wp_customize->add_setting('precise_socials_facebook', array('sanitize_callback' => 'esc_url_raw', 'default' => '#'));
		$wp_customize->add_control('precise_socials_facebook', array(
			'label' => __('Facebook link', 'precisecodes'),
			'section' => 'precise_general_section',
			'settings' => 'precise_socials_facebook',
			'priority' => 4,
		));
		/* twitter */
		$wp_customize->add_setting('precise_socials_twitter', array('sanitize_callback' => 'esc_url_raw', 'default' => '#'));
		$wp_customize->add_control('precise_socials_twitter', array(
			'label' => __('Twitter link', 'precisecodes'),
			'section' => 'precise_general_section',
			'settings' => 'precise_socials_twitter',
			'priority' => 5,
		));
		/* linkedin */
		$wp_customize->add_setting('precise_socials_linkedin', array('sanitize_callback' => 'esc_url_raw', 'default' => '#'));
		$wp_customize->add_control('precise_socials_linkedin', array(
			'label' => __('Linkedin link', 'precisecodes'),
			'section' => 'precise_general_section',
			'settings' => 'precise_socials_linkedin',
			'priority' => 6,
		));
		/* Google plus */
		$wp_customize->add_setting('precise_socials_googleplus', array('sanitize_callback' => 'esc_url_raw', 'default' => '#'));
		$wp_customize->add_control('precise_socials_googleplus', array(
			'label' => __('Google plus', 'precisecodes'),
			'section' => 'precise_general_section',
			'settings' => 'precise_socials_googleplus',
			'priority' => 7,
		));

	endif;

	/*****************************************************/
	/**************	HOME TITLE SECTION *******************/
	/****************************************************/
	if (class_exists('WP_Customize_Panel')):

		$wp_customize->add_panel('panel_home_title', array(
			'priority' => 31,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Home title section', 'precisecodes'),
		));

		$wp_customize->add_section('precise_hometitle_section', array(
			'title' => __('Main content', 'precisecodes'),
			'priority' => 1,
			'panel' => 'panel_home_title',
		));

		/* show/hide */
		$wp_customize->add_setting('precise_hometitle_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_hometitle_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide home title section?', 'precisecodes'),
				'section' => 'precise_hometitle_section',
				'priority' => 1,
			)
		);
		/* title first*/
		$wp_customize->add_setting('precise_hometitle_title_first', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG', 'precisecodes')));
		$wp_customize->add_control('precise_hometitle_title_first', array(
			'label' => __('Title First', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_title_first',
			'priority' => 2,
		));
		/* title second*/
		$wp_customize->add_setting('precise_hometitle_title_second', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG', 'precisecodes')));
		$wp_customize->add_control('precise_hometitle_title_second', array(
			'label' => __('Title Second', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_title_second',
			'priority' => 3,
		));
		/* tag line*/
		$wp_customize->add_setting('precise_hometitle_tagline', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG', 'precisecodes')));
		$wp_customize->add_control('precise_hometitle_tagline', array(
			'label' => __('Tag Line', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_tagline',
			'priority' => 4,
		));
		/* button text*/
		$wp_customize->add_setting('precise_hometitle_button_label', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Features', 'precisecodes')));
		$wp_customize->add_control('precise_hometitle_button_label', array(
			'label' => __('Button label', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_button_label',
			'priority' => 5,
		));
		/* button url*/
		$wp_customize->add_setting('precise_hometitle_button_url', array('sanitize_callback' => 'esc_url_raw', 'default' => esc_url(home_url('/')) . '#focus'));
		$wp_customize->add_control('precise_hometitle_button_url', array(
			'label' => __('Button link', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_button_url',
			'priority' => 6,
		));

	else:

		$wp_customize->add_section('precise_hometitle_section', array(
			'title' => __('Home title section', 'precisecodes'),
			'priority' => 31,
		));
		/* show/hide */
		$wp_customize->add_setting('precise_hometitle_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_hometitle_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide home title section?', 'precisecodes'),
				'section' => 'precise_hometitle_section',
				'priority' => 1,
			)
		);
		/* title first*/
		$wp_customize->add_setting('precise_hometitle_title_first', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG', 'precisecodes')));
		$wp_customize->add_control('precise_hometitle_title_first', array(
			'label' => __('Title First', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_title_first',
			'priority' => 2,
		));
		/* title second*/
		$wp_customize->add_setting('precise_hometitle_title_second', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Features', 'precisecodes')));
		$wp_customize->add_control('precise_hometitle_title_second', array(
			'label' => __('Title Second', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_title_second',
			'priority' => 3,
		));
		/* tag line*/
		$wp_customize->add_setting('precise_hometitle_tagline', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('ONE OF THE TOP 10 MOST POPULAR THEMES ON WORDPRESS.ORG', 'precisecodes')));
		$wp_customize->add_control('precise_hometitle_tagline', array(
			'label' => __('Tag Line', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_tagline',
			'priority' => 4,
		));
		/* button text*/
		$wp_customize->add_setting('precise_hometitle_button_label', array('sanitize_callback' => 'esc_url_raw', 'default' => __("What's inside", 'precisecodes')));
		$wp_customize->add_control('precise_hometitle_button_label', array(
			'label' => __('Red button link', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_button_label',
			'priority' => 5,
		));
		/* button url*/
		$wp_customize->add_setting('precise_hometitle_button_url', array('sanitize_callback' => 'precise_sanitize_text', 'default' => esc_url(home_url('/')) . '#focus'));
		$wp_customize->add_control('precise_hometitle_button_url', array(
			'label' => __('Red button label', 'precisecodes'),
			'section' => 'precise_hometitle_section',
			'settings' => 'precise_hometitle_button_url',
			'priority' => 6,
		));

	endif;

	/********************************************************************/
	/*************  OUR FOCUS SECTION **********************************/
	/********************************************************************/
	if (class_exists('WP_Customize_Panel')):
		$wp_customize->add_panel('panel_ourfocus', array(
			'priority' => 32,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Our focus section', 'precisecodes'),
		));
		$wp_customize->add_section('precise_ourfocus_section', array(
			'title' => __('Content', 'precisecodes'),
			'priority' => 1,
			'panel' => 'panel_ourfocus',
		));
		/* show/hide */
		$wp_customize->add_setting('precise_ourfocus_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_ourfocus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our focus section?', 'precisecodes'),
				'section' => 'precise_ourfocus_section',
				'priority' => 1,
			)
		);
		/* our focus title */
		$wp_customize->add_setting('precise_ourfocus_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('FEATURES', 'precisecodes')));
		$wp_customize->add_control('precise_ourfocus_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_ourfocus_section',
			'settings' => 'precise_ourfocus_title',
			'priority' => 2,
		));

		/* our focus subtitle */
		$wp_customize->add_setting('precise_ourfocus_subtitle', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('What makes this single-page WordPress theme unique.', 'precisecodes')));
		$wp_customize->add_control('precise_ourfocus_subtitle', array(
			'label' => __('Our focus subtitle', 'precisecodes'),
			'section' => 'precise_ourfocus_section',
			'settings' => 'precise_ourfocus_subtitle',
			'priority' => 3,
		));

	else:

		$wp_customize->add_section('precise_ourfocus_section', array(
			'title' => __('Our focus section', 'precisecodes'),
			'priority' => 32,

			'description' => __('The main content of this section is customizable in: Customize -> Widgets -> Our focus section. There you must add the "Precise - Our focus widget"', 'precisecodes'),
		));
		/* show/hide */
		$wp_customize->add_setting('precise_ourfocus_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_ourfocus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our focus section?', 'precisecodes'),
				'section' => 'precise_ourfocus_section',
				'priority' => 1,
			)
		);
		/* our focus title */
		$wp_customize->add_setting('precise_ourfocus_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('FEATURES', 'precisecodes')));

		$wp_customize->add_control('precise_ourfocus_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_ourfocus_section',
			'settings' => 'precise_ourfocus_title',
			'priority' => 2,
		));

		/* our focus subtitle */
		$wp_customize->add_setting('precise_ourfocus_subtitle', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('What makes this single-page WordPress theme unique.', 'precisecodes')));
		$wp_customize->add_control('precise_ourfocus_subtitle', array(
			'label' => __('Our focus subtitle', 'precisecodes'),
			'section' => 'precise_ourfocus_section',
			'settings' => 'precise_ourfocus_subtitle',
			'priority' => 3,
		));
	endif;

	/******************************************/
	/**********	Portfolio SECTION **************/
	/******************************************/
	if (class_exists('WP_Customize_Panel')):

		$wp_customize->add_panel('panel_portfolio', array(
			'priority' => 35,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Portfolio section', 'precisecodes'),
		));

		$wp_customize->add_section('precise_portfolio_section', array(
			'title' => __('Content', 'precisecodes'),
			'priority' => 1,
			'panel' => 'panel_portfolio',
		));
		/* portfolio show/hide */
		$wp_customize->add_setting('precise_portfolio_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_portfolio_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide portfolio section?', 'precisecodes'),
				'section' => 'precise_portfolio_section',
				'priority' => 1,
			)
		);
		/* Portfolio title */
		$wp_customize->add_setting('precise_portfolio_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Portfolio', 'precisecodes')));
		$wp_customize->add_control('precise_portfolio_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_portfolio_section',
			'settings' => 'precise_portfolio_title',
			'priority' => 2,
		));
		/* Portfolio subtitle */
		$wp_customize->add_setting('precise_portfolio_subtitle', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.', 'precisecodes')));
		$wp_customize->add_control('precise_portfolio_subtitle', array(
			'label' => __('Portfolio subtitle', 'precisecodes'),
			'section' => 'precise_portfolio_section',
			'settings' => 'precise_portfolio_subtitle',
			'priority' => 3,
		));

	else:

		$wp_customize->add_section('precise_portfolio_section', array(
			'title' => __('Portfolio section', 'precisecodes'),
			'priority' => 35,

			'description' => __('The main content of this section is customizable in: Customize -> Widgets -> Portfolio section. There you must add the "Precise - Team member widget"', 'precisecodes'),
		));
		/* portfolio show/hide */
		$wp_customize->add_setting('precise_portfolio_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_portfolio_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide portfolio section?', 'precisecodes'),
				'section' => 'precise_portfolio_section',
				'priority' => 1,
			)
		);
		/* Portfolio title */
		$wp_customize->add_setting('precise_portfolio_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Portfolio', 'precisecodes')));
		$wp_customize->add_control('precise_portfolio_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_portfolio_section',
			'settings' => 'precise_portfolio_title',
			'priority' => 2,
		));
		/* Portfolio subtitle */
		$wp_customize->add_setting('precise_portfolio_subtitle', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.', 'precisecodes')));
		$wp_customize->add_control('precise_portfolio_subtitle', array(
			'label' => __('Portfolio subtitle', 'precisecodes'),
			'section' => 'precise_portfolio_section',
			'settings' => 'precise_portfolio_subtitle',
			'priority' => 3,
		));

	endif;

	/******************************************/
	/**********	About Us SECTION **************/
	/******************************************/
	if (class_exists('WP_Customize_Panel')):

		$wp_customize->add_panel('panel_aboutus', array(
			'priority' => 35,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('About Us section', 'precisecodes'),
		));

		$wp_customize->add_section('precise_aboutus_section', array(
			'title' => __('Content', 'precisecodes'),
			'priority' => 1,
			'panel' => 'panel_aboutus',
		));
		/* Aboutus show/hide */
		$wp_customize->add_setting('precise_aboutus_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_aboutus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide About us section?', 'precisecodes'),
				'section' => 'precise_aboutus_section',
				'priority' => 1,
			)
		);
		/* Aboutus title */
		$wp_customize->add_setting('precise_aboutus_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('About us', 'precisecodes')));
		$wp_customize->add_control('precise_aboutus_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_aboutus_section',
			'settings' => 'precise_aboutus_title',
			'priority' => 2,
		));
		/* Aboutus subtitle */
		$wp_customize->add_setting('precise_aboutus_subtitle', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.', 'precisecodes')));
		$wp_customize->add_control('precise_aboutus_subtitle', array(
			'label' => __('About Us subtitle', 'precisecodes'),
			'section' => 'precise_aboutus_section',
			'settings' => 'precise_aboutus_subtitle',
			'priority' => 3,
		));

	else:

		$wp_customize->add_section('precise_aboutus_section', array(
			'title' => __('About us section', 'precisecodes'),
			'priority' => 35,

			'description' => __('The main content of this section is customizable in: Customize -> Widgets -> Portfolio section. There you must add the "Precise - Team member widget"', 'precisecodes'),
		));
		/* about us show/hide */
		$wp_customize->add_setting('precise_aboutus_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_aboutus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide about us section?', 'precisecodes'),
				'section' => 'precise_aboutus_section',
				'priority' => 1,
			)
		);
		/* About us title */
		$wp_customize->add_setting('precise_aboutus_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('About us', 'precisecodes')));
		$wp_customize->add_control('precise_aboutus_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_aboutus_section',
			'settings' => 'precise_aboutus_title',
			'priority' => 2,
		));
		/* Aboutus subtitle */
		$wp_customize->add_setting('precise_aboutus_subtitle', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.', 'precisecodes')));
		$wp_customize->add_control('precise_aboutus_subtitle', array(
			'label' => __('About us subtitle', 'precisecodes'),
			'section' => 'precise_aboutus_section',
			'settings' => 'precise_aboutus_subtitle',
			'priority' => 3,
		));

	endif;

	/******************************************/
	/**********	OUR TEAM SECTION **************/
	/******************************************/
	if (class_exists('WP_Customize_Panel')):

		$wp_customize->add_panel('panel_ourteam', array(
			'priority' => 35,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Our team section', 'precisecodes'),
		));

		$wp_customize->add_section('precise_ourteam_section', array(
			'title' => __('Content', 'precisecodes'),
			'priority' => 1,
			'panel' => 'panel_ourteam',
		));
		/* our team show/hide */
		$wp_customize->add_setting('precise_ourteam_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_ourteam_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our team section?', 'precisecodes'),
				'section' => 'precise_ourteam_section',
				'priority' => 1,
			)
		);
		/* our team title */
		$wp_customize->add_setting('precise_ourteam_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('YOUR TEAM', 'precisecodes')));
		$wp_customize->add_control('precise_ourteam_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_ourteam_section',
			'settings' => 'precise_ourteam_title',
			'priority' => 2,
		));
		/* our team subtitle */
		$wp_customize->add_setting('precise_ourteam_subtitle', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.', 'precisecodes')));
		$wp_customize->add_control('precise_ourteam_subtitle', array(
			'label' => __('Our team subtitle', 'precisecodes'),
			'section' => 'precise_ourteam_section',
			'settings' => 'precise_ourteam_subtitle',
			'priority' => 3,
		));

	else:

		$wp_customize->add_section('precise_ourteam_section', array(
			'title' => __('Our team section', 'precisecodes'),
			'priority' => 35,

			'description' => __('The main content of this section is customizable in: Customize -> Widgets -> Our team section. There you must add the "Precise - Team member widget"', 'precisecodes'),
		));
		/* our team show/hide */
		$wp_customize->add_setting('precise_ourteam_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_ourteam_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our team section?', 'precisecodes'),
				'section' => 'precise_ourteam_section',
				'priority' => 1,
			)
		);
		/* our team title */
		$wp_customize->add_setting('precise_ourteam_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('YOUR TEAM', 'precisecodes')));
		$wp_customize->add_control('precise_ourteam_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_ourteam_section',
			'settings' => 'precise_ourteam_title',
			'priority' => 2,
		));
		/* our team subtitle */
		$wp_customize->add_setting('precise_ourteam_subtitle', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Prove that you have real people working for you, with some nice looking profile pictures and links to social media.', 'precisecodes')));
		$wp_customize->add_control('precise_ourteam_subtitle', array(
			'label' => __('Our team subtitle', 'precisecodes'),
			'section' => 'precise_ourteam_section',
			'settings' => 'precise_ourteam_subtitle',
			'priority' => 3,
		));

	endif;
	/**********************************************/
	/**********	TESTIMONIALS SECTION **************/
	/**********************************************/
	if (class_exists('WP_Customize_Panel')):

		$wp_customize->add_panel('panel_testimonials', array(
			'priority' => 36,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Testimonials section', 'precisecodes'),
		));

		$wp_customize->add_section('precise_testimonials_section', array(
			'title' => __('Testimonials section', 'precisecodes'),
			'priority' => 1,
			'panel' => 'panel_testimonials',
		));
		/* testimonials show/hide */
		$wp_customize->add_setting('precise_testimonials_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_testimonials_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide testimonials section?', 'precisecodes'),
				'section' => 'precise_testimonials_section',
				'priority' => 1,
			)
		);
		/* testimonials title */
		$wp_customize->add_setting('precise_testimonials_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Testimonials', 'precisecodes')));
		$wp_customize->add_control('precise_testimonials_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_testimonials_section',
			'settings' => 'precise_testimonials_title',
			'priority' => 2,
		));

	else:

		$wp_customize->add_section('precise_testimonials_section', array(
			'title' => __('Testimonials section', 'precisecodes'),
			'priority' => 36,
			'description' => __('The main content of this section is customizable in: Customize -> Widgets -> Testimonials section. There you must add the "Precise - Testimonial widget"', 'precisecodes'),
		));
		/* testimonials show/hide */
		$wp_customize->add_setting('precise_testimonials_show', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control(
			'precise_testimonials_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide testimonials section?', 'precisecodes'),
				'section' => 'precise_testimonials_section',
				'priority' => 1,
			)
		);

		/* testimonials subtitle */
		$wp_customize->add_setting('precise_testimonials_title', array('sanitize_callback' => 'precise_sanitize_text'));
		$wp_customize->add_control('precise_testimonials_title', array(
			'label' => __('Title', 'precisecodes'),
			'section' => 'precise_testimonials_section',
			'settings' => 'precise_testimonials_title',
			'priority' => 2,
		));

	endif;

	/*******************************************************/
	/************	CONTACT US SECTION *********************/
	/*******************************************************/

	$precise_contact_us_section_description = '';

	$wp_customize->add_section('precise_contactus_section', array(
		'title' => __('Contact us section', 'precisecodes'),
		'description' => $precise_contact_us_section_description,
		'priority' => 38,
	));
	/* contact us show/hide */
	$wp_customize->add_setting('precise_contactus_show', array('sanitize_callback' => 'precise_sanitize_text'));
	$wp_customize->add_control(
		'precise_contactus_show',
		array(
			'type' => 'checkbox',
			'label' => __('Hide contact us section?', 'precisecodes'),
			'section' => 'precise_contactus_section',
			'priority' => 1,
		)
	);
	/* contactus title */
	$wp_customize->add_setting('precise_contactus_title', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Get in touch', 'precisecodes')));
	$wp_customize->add_control('precise_contactus_title', array(
		'label' => __('Contact us section title', 'precisecodes'),
		'section' => 'precise_contactus_section',
		'settings' => 'precise_contactus_title',
		'priority' => 2,
	));
	/* contactus subtitle */
	$wp_customize->add_setting('precise_contactus_subtitle', array('sanitize_callback' => 'precise_sanitize_text'));
	$wp_customize->add_control('precise_contactus_subtitle', array(
		'label' => __('Contact us section subtitle', 'precisecodes'),
		'section' => 'precise_contactus_section',
		'settings' => 'precise_contactus_subtitle',
		'priority' => 3,
	));

	/* contactus email */
	$wp_customize->add_setting('precise_contactus_email', array('sanitize_callback' => 'precise_sanitize_text'));

	$wp_customize->add_control('precise_contactus_email', array(
		'label' => __('Email address', 'precisecodes'),
		'section' => 'precise_contactus_section',
		'settings' => 'precise_contactus_email',
		'priority' => 4,
	));

	/* contactus button label */
	$wp_customize->add_setting('precise_contactus_button_label', array('sanitize_callback' => 'precise_sanitize_text', 'default' => __('Send Message', 'precisecodes')));

	$wp_customize->add_control('precise_contactus_button_label', array(
		'label' => __('Button label', 'precisecodes'),
		'section' => 'precise_contactus_section',
		'settings' => 'precise_contactus_button_label',
		'priority' => 5,
	));

}
add_action('customize_register', 'precise_customize_register');
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function precise_customize_preview_js() {
	wp_enqueue_script('precise_customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
}
add_action('customize_preview_init', 'precise_customize_preview_js');
function precise_sanitize_text($input) {
	return wp_kses_post(force_balance_tags($input));
}
function precise_sanitize_pro_version($input) {
	return $input;
}
function precise_sanitize_number($input) {
	return force_balance_tags($input);
}