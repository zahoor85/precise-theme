<?php

get_header();?>

<div id="content" class="site-content not-home-page">

	<div class="container">

		<div class="content-left-wrap col-md-9">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" role="main">

				<?php
if (have_posts()):

	while (have_posts()): the_post();

		/* Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */

		get_template_part('content', get_post_format());

	endwhile;

else:

	get_template_part('content', 'none');

endif;?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->



	</div><!-- .container -->

<?php get_footer();?>