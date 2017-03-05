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
add_action( 'vc_before_init', 'manang_testimonial_integrateWithVC' );
function manang_testimonial_integrateWithVC(){
    vc_map( array(
        "name"                    => __("Testimonial Section", "manang"),
        "base"                    => "manang_testimonial",
        "description"             => __("Display testimonial section.","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Enter Text", "manang"),
                "param_name"  => "testimonial_title",
            ),
            array(
                "type"        => "textarea",
                "holder" => "div",
                "heading"     => __("Enter description Text", "manang"),
                "param_name"  => "testimonial_description",
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Testimonial Count", "manang"),
                "param_name"  => "testimonial_count",
            ),
            array(
                "type"        => "attach_image",
                "heading"     => __("Add Image", "manang"),
                "param_name"  => "testimonial_bg_image",
            ),
            array(
                "type" => "colorpicker",
                "heading" => __( "Bacground Colo", "manang" ),
                "param_name" => "testimonial_bg_color",
            ),
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_manang_testimonial extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'testimonial_title'  =>  '',
                'testimonial_description'  =>  '',
                'testimonial_count'  =>  '',
                'testimonial_bg_color' => '',
                'testimonial_bg_image' => '',
            ), $atts ) ;
            ob_start();
            manang_testimonial($testimonial_title=$values['testimonial_title'],$testimonial_description=$values['testimonial_description'],$testimonial_count=$values['testimonial_count'],$testimonial_bg_color=$values['testimonial_bg_color'],$testimonial_bg_image=$values['testimonial_bg_image']);
            ?>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
