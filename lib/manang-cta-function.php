<?php
if ( ! function_exists ( 'manang_cta_priary' ) ) {
    function manang_cta_priary($atts=array()){
        extract(shortcode_atts( array(
                'title' => '',
                'sub_title' => '',
                'content' => '',
                'button_text' => '',
                'button_link' => ''
                ), $atts ));
    $customizer_options  = manang_options();
    $cta_bg_image        = $customizer_options['cta_bg_img'];
    $cta_title           = (!empty($title)?$title:$customizer_options['cta_title']);
    $cta_sub_title       = (!empty($sub_title)?$title:$customizer_options['cta_sub_title']);
    $cta_description     = (!empty($content)?$content:$customizer_options['cta_description']);
    $cta_button_text     = (!empty($button_text)?$button_text:$customizer_options['cta_button_text']);
    $cta_button_link     = (!empty($button_link)?$button_link:$customizer_options['cta_button_link']);
    $cta_parallax_choice = $customizer_options['cta_parallax'];
    $id = ($cta_parallax_choice == '1' ? 'parallax' : 'noparallax');
    $one_page_id = (is_page_template( 'page-templates/template-one-page.php' )?'framework-cta':'');
    ob_start();
    ?>

    <div class="section about-sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="aboutus-wrapper">
                            <div class="about-us-title">
                                <?php if(!empty($cta_title)){ ?>
                                    <span><?php echo esc_html($cta_title); ?></span>
                                <?php }
                                if(!empty($cta_sub_title)){ ?>
                                    <h2><?php echo esc_html($cta_sub_title); ?></h2>
                                <?php } ?>
                            </div>
                            <div class="about-us-desc">
                                <p><?php echo esc_html($cta_description); ?></p>
                                <a href="<?php echo esc_url($cta_button_link); ?>" class="btn btn-default"><?php echo esc_html($cta_button_text) ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    $output = ob_get_clean();
    return $output;
    }
    add_shortcode( 'cta_center_button_image', 'cpm_framework_cta_center_button_img' );
}
add_action( 'manang_second_cta', 'manang_cta_action', 10, 4 );
function manang_cta_action($cta_title="",$cta_description="",$cta_button_link="",$cta_button_text=""){
    ob_start(); ?>
    <!-- Start of call toacton video background section -->
    <section class="section cta-sec">
        <div class="container">
            <div class="row">
                <div class="cta-content">
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
                'button_link' => ''
                ), $atts ));
        $customizer_options = manang_options();
        $uploaded_video_url = $customizer_options['cta_bg_video_secondary'];
        $cta_title           = (!empty($title)?$title:$customizer_options['cta_title_secondary']);
        $cta_description     = (!empty($content)?$content:$customizer_options['cta_description_secondary']);
        $cta_button_text     = (!empty($button_text)?$button_text:$customizer_options['cta_button_text_secondary']);
        $cta_button_link     = (!empty($button_link)?$button_link:$customizer_options['cta_button_link_secondary']);
        $cta_video_audio = ($customizer_options['cta_video_audio'] == 1?'true':'false');
        do_action( 'manang_second_cta', $cta_title,$cta_description,$cta_button_link,$cta_button_text );
    }
    add_shortcode( 'cta_center_button_video', 'manang_cta_secondary' );
}