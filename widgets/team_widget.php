<?php

add_action('admin_enqueue_scripts', 'precise_team_widget_scripts');

function precise_team_widget_scripts() {

    wp_enqueue_media();

    wp_enqueue_script('precise_team_widget_script', get_template_directory_uri() . '/js/widget-team.js', false, '1.0', true);

}

class precise_team_widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'precise_team-widget',
            __('Precise - Team member widget', 'precisecodes')
        );
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;

        ?>

        <div class="col-md-3 col-sm-6 team wow fadeInUp" data-wow-delay="<?php echo (!empty($instance['load_delay']) ? $instance['load_delay'] : 200); ?>ms">

            <div class="thumbnail">

                <?php if (!empty($instance['image_uri'])): ?>


                    <img src="<?php echo esc_url($instance['image_uri']); ?>" alt="<?php _e('Uploaded image', 'precisecodes');?>" class="img-circle team-img" />


                <?php endif;?>

                <div class="caption">

                    <?php if (!empty($instance['title'])): ?>

                        <h3><?php echo apply_filters('widget_title', $instance['title']); ?></h3>

                    <?php endif;?>

                    <?php if (!empty($instance['position'])): ?>

                        <p><?php echo htmlspecialchars_decode(apply_filters('widget_title', $instance['position'])); ?></p>

                    <?php endif;?>

                </div>



                <ul class="list-inline">
                    <?php
                    ?>

                    <?php if (!empty($instance['fb_link'])): ?>
                        <li><a href="<?php echo apply_filters('widget_title', $instance['fb_link']); ?>" target="<?php echo $precise_team_target; ?>"><i
                                    class="fa fa-facebook"></i></a></li>
                    <?php endif;?>

                    <?php if (!empty($instance['tw_link'])): ?>
                        <li><a href="<?php echo apply_filters('widget_title', $instance['tw_link']); ?>" target="<?php echo $precise_team_target; ?>"><i
                                    class="fa fa-twitter"></i></a></li>
                    <?php endif;?>

                    <?php if (!empty($instance['ln_link'])): ?>
                        <li><a href="<?php echo apply_filters('widget_title', $instance['ln_link']); ?>" target="<?php echo $precise_team_target; ?>"><i
                                    class="fa fa-linkedin"></i></a></li>
                    <?php endif;?>
                    <?php if (!empty($instance['gp_link'])): ?>
                        <li><a href="<?php echo apply_filters('widget_title', $instance['gp_link']); ?>" target="<?php echo $precise_team_target; ?>"><i
                                    class="fa fa-google-plus"></i></a></li>
                    <?php endif;?>


                </ul>


            </div>

        </div>

        <?php

        echo $after_widget;

    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['position'] = stripslashes(wp_filter_post_kses($new_instance['position']));
        //$instance['description'] = stripslashes(wp_filter_post_kses($new_instance['description']));
        $instance['fb_link'] = strip_tags($new_instance['fb_link']);
        $instance['tw_link'] = strip_tags($new_instance['tw_link']);
        $instance['gp_link'] = strip_tags($new_instance['gp_link']);
        $instance['ln_link'] = strip_tags($new_instance['ln_link']);
        $instance['load_delay'] = strip_tags($new_instance['load_delay']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
        return $instance;
    }

    function form($instance) {

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Title', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if (!empty($instance['title'])): echo $instance['title'];endif;?>" class="widefat"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('position'); ?>"><?php _e('Position', 'precisecodes');?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('position'); ?>" id="<?php echo $this->get_field_id('position'); ?>"><?php if (!empty($instance['position'])): echo htmlspecialchars_decode($instance['position']);endif;?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fb_link'); ?>"><?php _e('Facebook link', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('fb_link'); ?>" id="<?php echo $this->get_field_id('fb_link'); ?>" value="<?php if (!empty($instance['fb_link'])): echo $instance['fb_link'];endif;?>" class="widefat">

        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tw_link'); ?>"><?php _e('Twitter link', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('tw_link'); ?>" id="<?php echo $this->get_field_id('tw_link'); ?>" value="<?php if (!empty($instance['tw_link'])): echo $instance['tw_link'];endif;?>" class="widefat">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('gp_link'); ?>"><?php _e('Google plus link', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('gp_link'); ?>" id="<?php echo $this->get_field_id('gp_link'); ?>" value="<?php if (!empty($instance['db_link'])): echo $instance['gp_link'];endif;?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('ln_link'); ?>"><?php _e('Linkedin link', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('ln_link'); ?>" id="<?php echo $this->get_field_id('ln_link'); ?>" value="<?php if (!empty($instance['ln_link'])): echo $instance['ln_link'];endif;?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('load_delay'); ?>"><?php _e('Loading Delay number (200)', 'precisecodes');?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('load_delay'); ?>" id="<?php echo $this->get_field_id('load_delay'); ?>" value="<?php if (!empty($instance['load_delay'])): echo $instance['load_delay'];endif;?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'precisecodes');?></label><br/>

            <?php

            if (!empty($instance['image_uri'])):

                echo '<img class="custom_media_image_team" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="' . __('Uploaded image', 'precisecodes') . '" /><br />';

            endif;

            ?>

            <input type="text" class="widefat custom_media_url_team" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if (!empty($instance['image_uri'])): echo $instance['image_uri'];endif;?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_team" id="custom_media_button_clients" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image', 'precisecodes');?>" style="margin-top:5px;">
        </p>

    <?php

    }

}