<?php
add_action('admin_enqueue_scripts', 'precise_testimonial_widget_scripts');

function precise_testimonial_widget_scripts() {

	wp_enqueue_media();

	wp_enqueue_script('precise_testimonial_widget_script', get_template_directory_uri() . '/js/widget-testimonials.js', false, '1.0', true);

}

class precise_testimonial_widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'precise_testimonial-widget',
			__('Precise - Testimonial widget', 'precise-lite')
		);
	}

	function widget($args, $instance) {

		extract($args);

		echo $before_widget;

		?>

			<div class="item">


			<?php if (!empty($instance['text'])): ?>
				<p>
					<?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); ?>
				</p>
			<?php endif;?>


            <p><strong><?php if (!empty($instance['title'])): echo apply_filters('widget_title', $instance['title']), ',';endif;?></strong>
            <?php if (!empty($instance['details'])): ?>
                        <?php echo apply_filters('widget_title', $instance['details']); ?>
					<?php endif;?>
</p>
          </div>


        <?php

		echo $after_widget;

	}

	function update($new_instance, $old_instance) {

		$instance = $old_instance;
		$instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['details'] = strip_tags($new_instance['details']);
		return $instance;

	}

	function form($instance) {
		?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Author', 'precise-lite');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if (!empty($instance['title'])): echo $instance['title'];endif;?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('details'); ?>"><?php _e('Author details', 'precise-lite');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('details'); ?>" id="<?php echo $this->get_field_id('details'); ?>" value="<?php if (!empty($instance['details'])): echo $instance['details'];endif;?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Text', 'precise-lite');?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if (!empty($instance['text'])): echo htmlspecialchars_decode($instance['text']);endif;?></textarea>
        </p>


    <?php

	}

}