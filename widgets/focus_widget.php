<?php

add_action('admin_enqueue_scripts', 'precise_ourfocus_widget_scripts');

function precise_ourfocus_widget_scripts() {

    wp_enqueue_media();
    wp_enqueue_script('precise_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);

}

class precise_ourfocus_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'precise_ourfocus-widget',
            __('Precise - Our focus widget', 'precisecodes')
        );
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>

        <div class="col-md-3 col-sm-6 service wow fadeInUp" data-wow-delay="<?php echo (!empty($instance['load_delay']) ? $instance['load_delay'] : 200); ?>ms"> <i class="fa <?php echo (!empty($instance['fa_class']) ? $instance['fa_class'] : ''); ?>"></i>
            <h4><strong><?php if (!empty($instance['title'])): echo apply_filters('widget_title', $instance['title']);endif;?></strong></h4>
            <?php if (!empty($instance['text'])):

                echo '<p>';
                echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text']));
                echo '</p>';
            endif;
            ?>
        </div>
        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['fa_class'] = strip_tags($new_instance['fa_class']);
        $instance['load_delay'] = strip_tags($new_instance['load_delay']);
        return $instance;

    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if (!empty($instance['title'])): echo $instance['title'];endif;?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description', 'precisecodes');?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if (!empty($instance['text'])): echo htmlspecialchars_decode($instance['text']);endif;?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fa_class'); ?>"><?php _e('Font Awosome Class (e.g fa-class-name)', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('fa_class'); ?>" id="<?php echo $this->get_field_id('fa_class'); ?>" value="<?php if (!empty($instance['fa_class'])): echo $instance['fa_class'];endif;?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('load_delay'); ?>"><?php _e('Loading Delay number (200)', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('load_delay'); ?>" id="<?php echo $this->get_field_id('load_delay'); ?>" value="<?php if (!empty($instance['load_delay'])): echo $instance['load_delay'];endif;?>" class="widefat">
        </p>


    <?php

    }

}