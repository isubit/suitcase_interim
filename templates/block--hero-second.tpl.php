<div class="region-hero-inner-inner">
  <figure>
    <img src="<?php print $figure_image_url; ?>" alt="<?php print $figure_image_alt; ?>" >
    <figure class="container-12">
      <?php if (!empty($figcaption_link_url)): ?>
        <figcaption class="grid-12 alpha">
          <a href="<?php print $figcaption_link_url; ?>"><?php print $figcaption_link_text; ?></a>
        </figcaption>
      <?php endif; ?>
    </figure>
  </figure>
</div>