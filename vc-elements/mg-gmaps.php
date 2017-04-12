<?php
/**
 * Maps
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php
add_action( 'vc_before_init', 'manang_gmaps_integrateWithVC2' );
function manang_gmaps_integrateWithVC2(){
    vc_map( array(
        "name"                    => __("Google Maps", "manang"),
        "base"                    => "manang_gmaps",
        "description"             => __("","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address1: Latitude", "manang"),
                "param_name"  => "add1_lattitude",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address1: Longitude", "manang"),
                "param_name"  => "add1_longitude",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address1: Address", "manang"),
                "param_name"  => "add1_address",
            ),

            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address2: Latitude", "manang"),
                "param_name"  => "add2_lattitude",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address2: Longitude", "manang"),
                "param_name"  => "add2_longitude",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address2: Address", "manang"),
                "param_name"  => "add2_address",
            ),

            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address3: Latitude", "manang"),
                "param_name"  => "add3_lattitude",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address3: Longitude", "manang"),
                "param_name"  => "add3_longitude",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Address3: Address", "manang"),
                "param_name"  => "add3_address",
            ),

             array(
                "type"        => "textfield",
                "heading"     => __("Custom Map Heihgt", "manang"),
                "param_name"  => "map_height",
            ),

            array(
                "type"        => "textfield",
                "heading"     => __("Zoom Control", "manang"),
                "param_name"  => "zoom_control",
            ),

            array(
                "type"        => "textfield",
                "heading"     => __("Scroll Control", "manang"),
                "param_name"  => "scroll_control",
            ),

            array(
                "heading" => __("Map Type", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "map_type",
                "value" => array(
                    __("Road", 'manang') => "image-bg",
                    __("Satellite", 'manang') => "videobg-wrapper",
                    __("Hybrid", 'manang') => "solid-color",
                    __("Terrain", 'manang') => "bubbles",
                ) ,
                "type" => "dropdown"
            ) ,
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_manang_gmaps extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'add1_lattitude'  =>  '',
                'add1_longitude'  =>  '',
                'add1_address' => '',
                'add2_lattitude'  =>  '',
                'add2_longitude'  =>  '',
                'add2_address' => '',
                'add3_lattitude'  =>  '',
                'add3_longitude'  =>  '',
                'add3_address' => '',
                'map_height' => '',
                'zoom_control' => '',
                'scroll_control' => '',
                'map_type' => '',

            ), $atts ) ;
            $add1_lattitude = $values['add1_lattitude'];
            $add1_longitude = $values['add1_longitude'];
            $add1_address = $values['add1_address'];
            $add2_lattitude = $values['add2_lattitude'];
            $add2_longitude = $values['add2_longitude'];
            $add2_address = $values['add2_address'];
            $add3_lattitude = $values['add3_lattitude'];
            $add3_longitude = $values['add3_longitude'];
            $add3_address = $values['add3_address'];
            $map_height = $values['map_height'];
            $zoom_control = $values['zoom_control'];
            $scroll_control = $values['scroll_control'];
            $map_type = $values['map_type'];
            ob_start();
            ?>

            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
