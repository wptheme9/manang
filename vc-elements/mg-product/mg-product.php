<?php
/**
 * Product
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php

add_action( 'vc_before_init', 'manang_products_integrateWithVC' );
function manang_products_integrateWithVC(){
    vc_map(array(
        "name" => __("Product", "manang") ,
        "base" => "manang_products",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('', 'manang') ,
        "params" => array(
            array(
                "param_name" => "display_type",
                "heading" => __("Display Type", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("Column Based", 'manang') => "column",
                    __("Slider Based", 'manang') => "slider",
                ) ,
                "type" => "dropdown",
            ) ,
            array(
                "param_name" => "columns",
                "heading" => __("Columns", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("2 Column", 'manang') => "2column",
                    __("3 Column", 'manang') => "3column",
                    __("4 Column", 'manang') => "4column",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "param_name" => "display_products",
                "heading" => __("Display Products", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("Recent Products", 'manang') => "recent_product",
                    __("Featured Products", 'manang') => "feat_product",
                    __("Best Selling Products", 'manang') => "best_selling_products",
                    __("Top rated Products", 'manang') => "top_rated_products",
                    __("Sale Products", 'manang') => "sale_products",
                ) ,
                "type" => "dropdown"
            ) ,
            array(
                "param_name" => "number_products",
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Number Of Posts", "manang") ,
                "value" => __("", "manang") ,
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Product Rating Color", "manang") ,
                "param_name" => "rating_color",
                "value" => "",
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "checkbox",
                "heading" => __("Remove Color On Hover?", "manang") ,
                "param_name" => "rem_color",
                "value" => "",
            ) ,
        ),
    ));
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_manang_products extends WPBakeryShortCode {

        protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'display_type'      => 'column',
                            'columns'           => '2column',
                            'display_products'  => 'recent_product',
                            'number_products'   => '',
                            'rating_color'      => '',
                            'rem_color'         => '',
                            ),$atts);
               $display_type = $values['display_type'];
               $columns = $values['columns'];
               $display_products = $values['display_products'];
               $number_products = $values['number_products'];
               $rating_color = $values['rating_color'];
               $rem_color = $values['rem_color'];
                ob_start();
                ?>
                <?php

                $output = ob_get_clean();
                return $output;
        }
    }
}