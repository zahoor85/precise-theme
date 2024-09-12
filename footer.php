<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */

?>
<div id="footer">
  <div class="container">
      <p>Copyright © <?=get_theme_mod('precise_copyright', __('precise_copyright', 'precisecodes'))?></p>
  </div>
</div>

<?php wp_footer();?>

</body>

</html>