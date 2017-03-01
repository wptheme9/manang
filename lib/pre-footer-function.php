<?php
if ( ! function_exists ( 'cpm_framework_prefooter' ) ) {
    function cpm_framework_prefooter(){
        $customizer_options = cpm_framework_options();
        $pre_footer_layout = $customizer_options['pre_footer_layout'];
        $pre_footer_class = ($pre_footer_layout == 'prefooter3'?'prefooter-five-col':'');
        if ( is_active_sidebar( 'sidebar-2' ) ||  is_active_sidebar( 'sidebar-3' )  ||  is_active_sidebar( 'sidebar-4' ) ||  is_active_sidebar( 'sidebar-5' ) ||  is_active_sidebar( 'sidebar-6' ) ) :
         ?>
        <!-- Startof footer section -->
        <section class="section cp-footer-sec <?php echo sanitize_html_class($pre_footer_class) . ' ' . sanitize_html_class($pre_footer_layout) ?>">
            <div class="container">
                <div class="row">
                    <?php

                    get_template_part( 'template-parts/pre-footer/'.$pre_footer_layout);
                    ?>
                </div>

            </div>
        </section>

        <!-- End of footer section -->
        <?php
        endif;

    }
}