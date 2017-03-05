<?php
/**
 * Service
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php
add_action( 'vc_before_init', 'cc_call_to_action_integrateWithVC2' );
function cc_call_to_action_integrateWithVC2(){
    vc_map( array(
        "name"                    => __("CC Call to Action Button2", "manang"),
        "base"                    => "cc_call_to_action2",
        "description"             => __("Display a button along with text.","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Enter Text", "manang"),
                "param_name"  => "cta_title",
            ),
            array(
                "type"        => "textarea",
                "holder" => "div",
                "heading"     => __("Enter description Text", "manang"),
                "param_name"  => "cta_description",
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Enter Link", "manang"),
                "param_name"  => "button_link",
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Enter Button Text", "manang"),
                "param_name"  => "button_text",
            ),
            array(
                "type"        => "attach_image",
                "heading"     => __("Add Image", "manang"),
                "param_name"  => "cta_bg_image",
            ),
            array(
                "type" => "colorpicker",
                "heading" => __( "Cta Bacground Colo", "manang" ),
                "param_name" => "cta_bg_color",
            ),
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_cc_call_to_action2 extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'cta_title'  =>  '',
                'cta_description'  =>  '',
                'button_text'  =>  '',
                'button_link' => 'javascript:void(0)',
                'cta_bg_image' => '',
                'cta_bg_color' => '',
            ), $atts ) ;
            $cta_bg_image = wp_get_attachment_url( $values['cta_bg_image'] );
            ob_start();
            manang_cta_action($cta_title=$values['cta_title'],$cta_description=$values['cta_description'],$cta_button_link=$values['button_link'],$cta_button_text=$values['button_text'],$cta_bg_color_secondary=$values['cta_bg_color'],$cta_bg_img_secondary=$cta_bg_image)
            ?>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
