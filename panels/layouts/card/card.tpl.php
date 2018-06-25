<<?php print $layout_wrapper; print $layout_attributes; ?> class="card <?php print $classes;?> clearfix">

  <?php if (isset($title_suffix['contextual_links'])): ?>
  <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <?php if (!empty($content['card_header'])): ?>
    <div class="card-header">
      <?php print $content['card_header']; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($content['card_image'])): ?>
    <div class="card-image">
      <?php print $content['card_image']; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($content['card_body'])): ?>
    <div class="card-body">
      <?php print $content['card_body']; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($content['card_footer'])): ?>
    <div class="card-footer">
      <?php print $content['card_footer']; ?>
    </div>
  <?php endif; ?>

</<?php print $layout_wrapper ?>>