<div class="media media_card" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <?php if (!empty($content['media_left'])): ?>
    <div class="media-left">
      <?php print $content['media_left']; ?>
    </div>
  <?php endif; ?>

  <div class="media-body">
    <?php if (!empty($content['media_heading'])): ?>
      <div class="media-heading">
        <?php print $content['media_heading']; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['media_body'])): ?>
      <div class="media-body">
        <?php print $content['media_body']; ?>
      </div>
    <?php endif; ?>
  </div>
</div>