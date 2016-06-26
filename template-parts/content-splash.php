<section class="splash--<?php if (is_page()): global $post; if ( isset( $post ) ): echo $post->post_name; endif; endif; ?> <?php if (!is_front_page()): echo 'splash-inside'; endif; ?>">
  <div class="wrap">
    <div class="splash__block container-fluid fade-in--left">
      <div class="splash__header">
        <span class="splash__emph">Lorem</span> ipsum dolor
      </div>
      <div class="splash__body">
        Vivamus sagittis lacus vel augue laoreet rutrum September 17–20. Donec sed odio dui Donec id elit non mieget metus.
      </div>
    </div> <!-- .splash__block -->
  </div> <!-- .container-fluid -->
</section> <!-- .splash -->

