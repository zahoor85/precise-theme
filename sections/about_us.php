<?php
$precise_aboutus_title = get_theme_mod('precise_aboutus_title', __('<strong>About</strong> us', 'precisecodes'));
$precise_aboutus_subtitle = get_theme_mod('precise_aboutus_subtitle', __('We would be happy to share with you our experience and help you understand the potential opportunities involved in  achieving your goals.', 'precisecodes'));

?>
<div id="about-section">
    <div class="container">
        <div class="section-title text-center wow fadeInDown">
            <?php
if (!empty($precise_aboutus_title)):
	echo '<h2>' . $precise_aboutus_title . '</h2>';
endif;?>
            <hr>
            <div class="clearfix"></div>
            <?php
if (!empty($precise_aboutus_subtitle)):
	echo '<p>' . $precise_aboutus_subtitle . '</p>';
endif;?>
        </div>
        <div class="row">
            <div class="col-md-6 wow fadeInLeft">
                 <div id="about-qoutes" class="owl-carousel owl-theme wow fadeInUp" data-wow-delay="200ms">



          <div class="item">


                <p>Don't re–invent the wheel. Add value into every effort we undertake.</p>



          </div>
          <div class="item">

                <p>Pixel perfection, or bust.</p>


          </div>



           <div class="item">

                <p>Do good, feel good. There is a bigger picture.</p>


          </div>

             </div>
             </div>
            <div class="col-md-6 wow fadeInRight">
                <?php
if (is_active_sidebar('sidebar-aboutus')):
	dynamic_sidebar('sidebar-aboutus');
endif;?>

                <div class="space"></div><div class="list-style">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <ul>
                                <li>Yii, Laravel, CodeIgniter</li>
                                <li>Wordpress</li>
                                <li>E-commerce</li>
                                <li>SocialEngine</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-12">
                            <ul>
                                <li>HTML, HTML5</li>
                                <li>CSS, LESS, SASS</li>
                                <li>Responsive Front-End</li>
                                <li>PSD to HTML</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


