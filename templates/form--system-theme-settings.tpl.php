<?php $wordmark_path = (theme_get_setting('default_logo', 'suitcase_interim')) ? file_create_url(drupal_get_path('theme', 'suitcase_interim') . '/images/isu.svg') : file_create_url(theme_get_setting('logo_path', 'suitcase_interim')); ?>
<div id="suitcase-interim-header-preview" class="container-12 clearfix">
  <div id="field-container">
    <div id="field-level-1" class="clearfix">
      <div class="grid-6">
        <input type="text" name="level-1" class="form-text-watch" value="<?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_1']['#value']; ?>" placeholder="Enter Wordmark Alternate Text">
      </div>
      <div class="grid-6">
        <input type="text" name="level-1-url" class="form-url-watch" value="<?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_1_url']['#value']; ?>" placeholder="Enter URL">
      </div>
    </div>
    <div id="field-level-2" class="clearfix">
      <div class="grid-6">
        <input type="text" name="level-2" class="form-text-watch" value="<?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_2']['#value']; ?>" placeholder="Enter Department Name">
      </div>
      <div class="grid-6">
        <input type="text" name="level-2-url" class="form-url-watch" value="<?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_2_url']['#value']; ?>" placeholder="Enter URL">
      </div>
    </div>
    <hr>
    <div id="field-level-3" class="clearfix">
      <div class="grid-6">
        <input type="text" name="level-3" class="form-text-watch" value="<?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_3']['#value']; ?>" placeholder="Enter Laboratory Name">
      </div>
      <div class="grid-6">
        <input type="text" name="level-3-url" class="form-url-watch" value="<?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_3_url']['#value']; ?>" placeholder="Enter URL">
      </div>
    </div>
  </div>
  <header>
    <?php if (!empty($form['suitcase_interim_config_logo']['suitcase_interim_config_level_1']['#value'])): ?>
      <img src="<?php print $wordmark_path; ?>" alt="<?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_1']['#value']; ?>" height="24px">
    <?php else: ?>
      <img src="<?php print $wordmark_path; ?>" alt="" height="24px" style="display: none">
    <?php endif; ?>
    <h1><?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_2']['#value']; ?></h1>

    <?php if ($form['suitcase_interim_config_logo']['suitcase_interim_config_level_3']['#value']): ?>
      <hr>
      <h2><?php print $form['suitcase_interim_config_logo']['suitcase_interim_config_level_3']['#value']; ?></h2>
    <?php else: ?>
      <hr style="display:none">
      <h2></h2>
    <?php endif; ?>

  </header>
  <script type="text/javascript">
    (function($) {

      $('#field-level-1 .form-text-watch').bind("propertychange change click keyup input paste", function() {
        if ($(this).val()) {
          $('#field-level-1 .form-text-watch').val($(this).val());
          $('#edit-level-1').val($(this).val());
          $('#suitcase-interim-header-preview header img').attr('alt', $(this).val());
          $('#suitcase-interim-header-preview header img').show();
        } else {
          $('#suitcase-interim-header-preview header img').hide();
        }
      });

      $('#field-level-1 .form-url-watch').bind("propertychange change click keyup input paste", function() {
        $('#field-level-1 .form-url-watch').val($(this).val());
        $('#edit-level-1-url').val($(this).val());
      });

      $('#field-level-2 .form-text-watch').bind("propertychange change click keyup input paste", function() {
        $('#field-level-2 .form-text-watch').val($(this).val());
        $('#edit-level-2').val($(this).val());
        $('#suitcase-interim-header-preview header h1').text($(this).val());
      });
      
      $('#field-level-2 .form-url-watch').bind("propertychange change click keyup input paste", function() {
        $('#field-level-2 .form-url-watch').val($(this).val());
        $('#edit-level-2-url').val($(this).val());
      });

      $('#field-level-3 .form-text-watch').bind("propertychange change click keyup input paste", function() {
        $('#field-level-3 .form-text-watch').val($(this).val());
        $('#edit-level-3').val($(this).val());
        $('#suitcase-interim-header-preview header h2').text($(this).val());
      });

      $('#field-level-3 .form-url-watch').bind("propertychange change click keyup input paste", function() {
        if ($(this).val()) {
          $('#field-level-3 .form-url-watch').val($(this).val());
          $('#edit-level-3-url').val($(this).val());
          $('#suitcase-interim-header-preview header hr').show();
        } else {
          $('#suitcase-interim-header-preview header hr').hide();
        }
      });

    })(jQuery)
  </script>
</div>
