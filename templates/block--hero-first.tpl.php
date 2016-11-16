<div class="region-hero-inner-inner">
  <figure>
    <img src="<?php print $figure_image_url; ?>" alt="<?php print $figure_image_alt; ?>" />
    <?php if (!empty($figcaption_link_url)): ?>
      <div class="container-12">
        <figcaption class="grid-12">
          <a href="<?php print $figcaption_link_url; ?>"><?php print $figcaption_link_text; ?></a>
        </figcaption>
      </div>
    <?php endif; ?>
  </figure>
</div>