<?php global $site; global $theme_names; ?>

<div class="wrap">
  <div id="icon-options-general" class="icon32"><br></div>
  <h2><?php _e( 'Custom Footer Settings' ); ?></h2>
  <?php

  $content = array(
    array(
      'title' => 'Footer Content',
      'name' => $site->sitemeta->footer_content->meta_key,
      'type' => 'textarea',
      'object' => $site->sitemeta->footer_content,
      'default_value' => $site->sitemeta->footer_content->meta_value,
      'key' => 'meta_value'
    )
  );

  \WpMvc\FormHelper::render_form( $site, $content );

  ?>
</div>
