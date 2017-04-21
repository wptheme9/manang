<?php
/**
 * Instagram
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php
add_action( 'vc_before_init', 'manang_instagram_integrateWithVC2' );
function manang_instagram_integrateWithVC2(){
    vc_map( array(
        "name"                    => __("Instagram", "manang"),
        "base"                    => "instagram",
        "description"             => __("","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Add Username", "manang"),
                "param_name"  => "username",
            ),

            array(
                "type"        => "checkbox",
                "holder" => "div",
                "heading"     => __("Autoplay?", "manang"),
                "param_name"  => "autoplay",
            ),
             array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Number Of Images", "manang"),
                "param_name"  => "image_count",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Add Text", "manang"),
                "param_name"  => "add_text",
            ),
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_instagram extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'username' => '',
                'autoplay' => '',
                'add_text' => '',
                'image_count' => '',

            ), $atts ) ;

            $username = $values['username'];
            $autoplay = $values['autoplay'];
            $add_text = $values['add_text'];
            $image_count = $values['image_count'];
            $limit = empty( $image_count ) ? 9 : $image_count;


            ob_start();
            if ( $username != '' ) {
                $media_array = scrape_instagram( $username );
                if ( is_wp_error( $media_array ) ) {
                    echo wp_kses_post( $media_array->get_error_message() );
                } else {

                    // filter for images only?
                    if ( $images_only = apply_filters( 'manang_images_only', FALSE ) ) {
                        $media_array = array_filter( $media_array, array( $this, 'images_only' ) );
                    }
                    // slice list down to required limit
                    $media_array = array_slice( $media_array, 0, $limit );
                    $media_array = '';
                    if(!empty($media_array)): ?>
                       <section class="section instagram">
                            <div class="instagram-slider">
                                <h4><?php echo esc_html($add_text); ?></h4>
                                <div class="instagram-wrap">
                                    <?php foreach ( $media_array as $item ) { ?>
                                                 <div class="insta-img">
                                                    <img src="<?php echo esc_url( $item['large'] ) ?>" alt="">
                                                </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php
                }
            }
        $output = ob_get_clean();
        return $output;
        }
    }
}
