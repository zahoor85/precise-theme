<?php
/**
 * Portfolio section
 */
$precise_portfolio_title = get_theme_mod('precise_portfolio_title', __('Our <strong>Portfolio</strong>', 'precisecodes'));
$precise_portfolio_subtitle = get_theme_mod('precise_portfolio_subtitle', __('Some examples of our work', 'precisecodes'));
$terms = precise_get_main_terms('portfolio_category');
?>

    <div id="works-section" class="text-center">
        <div class="container"> <!-- Container -->
            <div class="section-title wow fadeInDown">
                <?php
if (!empty($precise_portfolio_title)):
	echo '<h2>' . $precise_portfolio_title . '</h2>';
endif;?>
                <hr>
                <div class="clearfix"></div>
                <?php
if (!empty($precise_ourteam_subtitle)):

	echo '<p>' . $precise_ourteam_subtitle . '</p>';

endif;?>            </div>
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <?php if (isset($terms) && count($terms) > 0): foreach ($terms as $term): ?>
							                                <li><a href="#" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
							                            <?php endforeach;endif;?>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="portfolio-items">
<?php reset($terms);if (isset($terms) && count($terms) > 0): $delay = 200;foreach ($terms as $term):

		$args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => 3,
			'orderby' => 'rand',
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio_category',
					'field' => 'slug',
					'terms' => $term->slug,
				),
			),
		);
		$query = new WP_Query($args);
		?>
        <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();
				if ($term->parent):
					$parent = get_term($term->parent, 'portfolio_category');
				else:
					$parent = $term;
				endif;

				$post_thumbnail_id = get_post_thumbnail_id($post);
				$post_thumb = wp_get_attachment_image_url($post_thumbnail_id, 'precise_portfolio_thumb');
				$post_main = wp_get_attachment_image_url($post_thumbnail_id, 'precise_portfolio_main');
				$client = get_post_meta($post->ID, '_portfolio_client', true);
                $wp_terms = wp_return_terms_array($post->ID, 'portfolio_category');
				?>

                    <div class="col-sm-6 col-md-3 col-lg-3 <?php echo $parent->slug; ?>">
                    <div class="portfolio-item wow fadeInUp" data-wow-delay="<?php echo $delay; ?>ms">
                    <div class="hover-bg"> <a href="#" class="portfolio-link" data-toggle="modal" data-target=".portfolio-modal" data-image="<?php echo $post_main; ?>" data-excerpt="<?php the_excerpt();?>" data-content="<?php echo the_content(); ?>" data-client="<?php echo $client; ?>" data-title="<?php the_title();?>" data-category="<?php echo $wp_terms; ?>" >
                    <div class="hover-text">
                    <h4><?php the_title();?></h4>
                    <?php echo $wp_terms; ?>
                    <div class="clearfix"></div>
                    <i class="fa fa-plus"></i> </div>
                    <img src="<?php echo $post_thumb; ?>" class="img-responsive" alt="<?php the_title();?>"> </a> </div>
                    </div>
                    </div>
					<?php $delay += 200;endwhile;endif;?>

					<?php endforeach;endif;?>


                </div>
            </div>
        </div>
    </div>

<script>
jQuery(document).ready(function($){
    $('[data-toggle="modal"]').click(function(e) {
        e.preventDefault();

       var html = '<h2>'+$(this).data('title')+'</h2>';
        html+='<p class="item-intro">'+$(this).data('excerpt')+'</p>';
        html+=' <img class="img-responsive img-centered" src="'+$(this).data('image')+'" alt="'+$(this).data('title')+'">';
        html+=' <p>'+$(this).data('content')+'</p>';
        html+=' <ul class="list-inline">';
        html+= ($(this).data('client') ? ' <li class="client"><strong>Client</strong>: '+$(this).data('client')+'</li>' : '');
        html+='<li class="category"><strong>Category</strong>: '+$(this).data('category')+'</li>';
        html+=' </ul>';
        html+=' <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>';
        $('.modal-body').html(html);

    });
});


</script>
<!-- Portfolio Modal 8 -->
<div class="portfolio-modal modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
            <div class="lr">
                <div class="rl"> </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

