<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php if ($content): ?>
    <div class="clearfix">
        <div class="pull-right margin-left-10 pos-relative search-form-container"><?php print $content; ?></div>
    </div>
    <?php endif; ?>
  </div>
</div>
