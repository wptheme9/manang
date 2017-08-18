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
    if(!function_exists('manang_get_testimonial_categories_select')):
        function manang_get_testimonial_categories_select() {
            $manang_cat = get_terms( array(
                'taxonomy' => 'testimonial_category',
                'hide_empty' => false,
            ) );
            $results=array();
            $results['Select category'] = "";
            if(! empty( $manang_cat ) && ! is_wp_error( $manang_cat ) ):
                foreach ( $manang_cat as $term ) {
                    $results[$term->name] = $term->term_id;
                }
             endif;
            return $results;
        }
    endif;
    vc_map( array(
        "name"                    => __("Testimonial Section", "manang"),
        "base"                    => "manang_testimonial",
        "description"             => __("Display testimonial section.","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
            array(
                "heading" => __("Testimonial Style", 'manang') ,
                "param_name" => "testimonial_style",
                "value" => array(
                    __("Modern", 'manang') => "modern-style",
                    __("Boxed", 'manang') => "boxed-style",
                    __("Shadow", 'manang') => "shadow-style",
                    __("Classic", 'manang') => "classic-style",
                ) ,
                "type" => "dropdown"
            ) ,
            array(
                "heading" => __("Skin", 'manang') ,
                "param_name" => "skin",
                "value" => array(
                    __("Dark", 'manang') => "content-dark",
                    __("Light", 'manang') => "content-light",
                ) ,
                "type" => "dropdown",
                "dependency" => array(
                    'element' => "testimonial_style",
                    'value' => array(
                        'modern-style'
                    )
                )
            ) ,
            array(
                "heading" => __("Show As:", 'manang') ,
                "param_name" => "show_as",
                "value" => array(
                    __("Column", 'manang') => "column-based",
                    __("Slider", 'manang') => "slider",
                ) ,
                "type" => "dropdown",
                "dependency" => array(
                    'element' => "testimonial_style",
                    'value' => array(
                        'boxed-style','shadow-style','classic-style'
                    )
                )
            ) ,
            array(
                "type"        => "textfield",
                "heading"     => __("Testimonial Count", "manang"),
                "param_name"  => "testimonial_count",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Choose Category", "manang") ,
                "param_name" => "testimonial_category",
                "description" => __("This option will display only the selected categories.", "manang") ,
                "value" => manang_get_testimonial_categories_select(),
            ) ,
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_manang_testimonial extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'testimonial_style'  =>  'modern-style',
                'skin'  =>  'content-dark',
                'show_as'  =>  'content-dark',
                'testimonial_count' => '',
                'testimonial_category' => '',
            ), $atts ) ;
            $testimonial_style=$values['testimonial_style'];
            $skin=$values['skin'];
            $show_as=$values['show_as'];
            $testimonial_count=$values['testimonial_count'];
            $testimonial_category=$values['testimonial_category'];
            ob_start();
            manang_testimonial($testimonial_style,$skin,$testimonial_count,$show_as,$testimonial_category);
            ?>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
