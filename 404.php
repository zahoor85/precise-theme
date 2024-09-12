<?php
/**
 * The template for displaying 404 pages (Not Found).
 */
get_header();?>


<div id="content" class="site-content not-home-page">

<div class="container">

<div class="content-left-wrap col-md-12">

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<article>



					<h1 class="entry-title"><?php _e('Oops! That page can&rsquo;t be found.', 'zerif-lite');?></h1>



				<div class="entry-content">

					<p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'zerif-lite');?></p>

				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		</main><!-- #main -->

	</div><!-- #primary -->

</div>

</div>
</div>

<?php get_footer();?>