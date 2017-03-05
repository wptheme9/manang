<?php
add_action( 'manang_second_cta', 'manang_cta_action', 10, 6 );
function manang_cta_action($cta_title="",$cta_description="",$cta_button_link="",$cta_button_text="",$cta_bg_color_secondary="",$cta_bg_image_secondary=""){
    ob_start(); ?>
    <!-- Start of call toacton video background section -->
    <section class="section cta-sec parallax" style="background-color: <?php echo $cta_bg_color_secondary; ?>; background-image:url(<?php echo esc_url($cta_bg_image_secondary); ?>);">
        <div class="container">
            <div class="row">
                <div class="cta-content" data-aos="fade-up">
                    <?php if(!empty($cta_title)){ ?>
                        <h2 class="cta-title">
                            <?php echo esc_html($cta_title); ?>
                        </h2>
                    <?php }?>
                    <p><?php echo esc_html($cta_description); ?></p>
                    <a href="<?php echo esc_url($cta_button_link); ?>" class="btn btn-default"><?php echo esc_html($cta_button_text) ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php
    $output = ob_get_clean();
    echo  $output;
}

if ( ! function_exists ( 'manang_cta_secondary' ) ) {
    function manang_cta_secondary($atts=array()){
        extract(shortcode_atts( array(
                'title' => '',
                'content' => '',
                'button_text' => '',
                'button_link' => '',
                'cta_bg_color_secondary' => '',
                'cta_bg_image_secondary'  => '',
                ), $atts ));
        $customizer_options = manang_options();
        // print_r($customizer_options);
        // $uploaded_video_url = $customizer_options['cta_bg_video_secondary'];
        $cta_title           = (!empty($title)?$title:$customizer_options['cta_title_secondary']);
        $cta_description     = (!empty($content)?$content:$customizer_options['cta_description_secondary']);
        $cta_button_text     = (!empty($button_text)?$button_text:$customizer_options['cta_button_text_secondary']);
        $cta_button_link     = (!empty($button_link)?$button_link:$customizer_options['cta_button_link_secondary']);
        $cta_bg_color_secondary = (!empty($cta_bg_color_secondary)?$cta_bg_color_secondary:$customizer_options['cta_bg_color_secondary']);
        $cta_bg_image_secondary = (!empty($cta_bg_image_secondary)?$cta_bg_image_secondary:$customizer_options['cta_bg_image_secondary']);
        // $cta_video_audio = ($customizer_options['cta_video_audio'] == 1?'true':'false');
        do_action( 'manang_second_cta', $cta_title,$cta_description,$cta_button_link,$cta_button_text,$cta_bg_color_secondary,$cta_bg_image_secondary );
    }
    add_shortcode( 'cta_center_button_video', 'manang_cta_secondary' );
}