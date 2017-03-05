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


add_action( 'vc_before_init', 'manang_feature_integrateWithVC' );
function manang_feature_integrateWithVC(){
    vc_map( array(
        "name"                    => __("Feature Section", "manang"),
        "base"                    => "manang_feature",
        "description"             => __("Display feature section.","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
            array(
                "type"        => "textfield",
                "heading"     => __("Enter Text", "manang"),
                "param_name"  => "feature_title",
            ),
            array(
                "type"        => "textarea",
                "heading"     => __("Enter description Text", "manang"),
                "param_name"  => "feature_description",
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Feature Count", "manang"),
                "param_name"  => "number_post",
            ),
            array(
                "type" => "dropdown",
                "heading" => __( "Effects", "manang" ),
                "param_name" => "feature_effects",
                "value" => array(
                    __('Select','manang') => '',
                    __('Effect 1','manang') => 'feature1',
                    __('Effect 2','manang' ) => 'feature2',
                    __('Effect 3','manang') => 'feature3',
                    __('Effect 4','manang' ) => 'feature4',
                    __('Effect 5','manang') => 'feature5',
                    __('Effect 6','manang' ) => 'feature6',
                    ),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Select Categories", "carpet-court"),
                "param_name" => "categories_select",
                ),
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_manang_feature extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'feature_title'  =>  '',
                'feature_description'  =>  '',
                'number_post'  =>  '',
                'feature_effects' => '',
                'categories_select' => '',
            ), $atts ) ;
            ob_start();
           manang_features_query($feature_category=$values['categories_select'],$number_post=$values['feature_title'],$feature_title=$values['feature_title'],$feature_description=$values['feature_description'],$feature_effects=$values['feature_effects'])
            ?>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
