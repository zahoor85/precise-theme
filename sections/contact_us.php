<!-- Contact Section -->
<?php
$precise_facebook = get_theme_mod('precise_socials_facebook');
$precise_twitter = get_theme_mod('precise_socials_twitter');
$precise_linkedin = get_theme_mod('precise_socials_linkedin');
$precise_googleplus = get_theme_mod('precise_socials_googleplus');

?>
<div id="contact-section" class="text-center">
  <div class="container">
    <div class="section-title wow fadeInDown">
      <h2><strong>Contact</strong> us</h2>
      <hr>
    </div>
    <!-- <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-delay="200ms">
      <div class="col-md-4"> <i class="fa fa-map-marker fa-2x"></i>
        <p>321 Awesome Street<br>
          New York, NY 17022</p>
      </div>
      <div class="col-md-4"> <i class="fa fa-envelope-o fa-2x"></i>
        <p>info@companyname.com</p>
      </div>
      <div class="col-md-4"> <i class="fa fa-phone fa-2x"></i>
        <p> +1 800 123 1234</p>
      </div>
      <div class="clearfix"></div>
    </div> -->
    <div class="col-md-8 col-md-offset-2 wow fadeInUp" data-wow-delay="400ms">
	<h3>Leave us a message</h3>
      <form name="sentMessage" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <button type="submit" class="btn btn-default">Send Message</button>
      </form>
      <div class="social">
        <ul>
        <?php if ($precise_facebook) {?>
          <li><a href="<?=$precise_facebook?>"><i class="fa fa-facebook"></i></a></li>
        <?php }
?>
          <?php if ($precise_twitter) {?>
          <li><a href="<?=$precise_twitter?>"><i class="fa fa-twitter"></i></a></li>
        <?php }
?>
          <?php if ($precise_linkedin) {?>
          <li><a href="<?=$precise_linkedin?>"><i class="fa fa-linkedin"></i></a></li>
        <?php }
?>
          <?php if ($precise_googleplus) {?>
          <li><a href="<?=$precise_googleplus?>"><i class="fa fa-google-plus"></i></a></li>
        <?php }
?>


        </ul>
      </div>
    </div>
  </div>
</div>