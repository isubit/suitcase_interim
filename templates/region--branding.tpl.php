<div<?php print $attributes; ?>>
  <div<?php print $content_attributes; ?>>
    <?php if ($site_name || $site_slogan): ?>

      <?php if ($level_1): ?>
        <?php print $level_1; ?>
      <?php endif; ?>

      <?php if ($level_2): ?>
        <?php if (!$level_3 && $is_front): ?>
          <h1 class="site-name-level-2"><?php print $level_2; ?></h1>
        <?php else: ?>
          <span class="site-name-level-2"><?php print $level_2; ?></span>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($level_3): ?>
        <hr>
        <div class="site-name-slogan">
        <?php if ($is_front): ?>
          <h1 class="site-name-level-3"><?php print $level_3; ?></h1>
        <?php else: ?>
          <span class="site-name-level-3"><?php print $level_3; ?></span>
        <?php endif; ?>
        </div>
      <?php endif; ?>

    <?php endif; ?>
    <?php print $content; ?>
  </div>
</div>
