<?php
/**
 * Divider
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_divider_integrateWithVC' );
function manang_divider_integrateWithVC(){
    vc_map(array(
        "name" => __("Divider", "manang") ,
        "base" => "manang_divider_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Divider Elements.', 'manang') ,
        "params" => array(
             array(
                "heading" => __("Divider Style", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "divider_style",
                "value" => array(
                    __("Single Dotted", 'manang') => "single-dotted",
                    __("Double Dotted", 'manang') => "double-dotted",
                    __("Gradient Divider", 'manang') => "gradient-divider",
                    __("Solid Divider", 'manang') => "solid-divider",
                    __("Double Solid Divider", 'manang') => "double-solid-divider",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "colorpicker",
                "heading" => __("Divider Color", "manang") ,
                "param_name" => "divider_color",
                "value" => "",
                "description" => __("", "manang"),
                "dependency" => array(
                    'element' => "divider_style",
                    'value' => array(
                        'single-dotted','double-dotted','solid-divider','double-solid-divider'
                    )
                )
            ) ,

            array(
                "type" => "colorpicker",
                "heading" => __("Color First", "manang") ,
                "param_name" => "color_first",
                "value" => "",
                "description" => __("", "manang"),
                "dependency" => array(
                    'element' => "divider_style",
                    'value' => array(
                        'gradient-divider'
                    )
                )
            ) ,

             array(
                "type" => "colorpicker",
                "heading" => __("Color Second", "manang") ,
                "param_name" => "color_second",
                "value" => "",
                "description" => __("", "manang"),
                "dependency" => array(
                    'element' => "divider_style",
                    'value' => array(
                        'gradient-divider'
                    )
                )
            ) ,

            array(
                "heading" => __("Divider Width", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "divider_width",
                "value" => array(
                    __("Fullwidth", 'manang') => "fullwidth",
                    __("Custom", 'manang') => "custom"
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Enter Custom Width", "manang") ,
                "param_name" => "custom_width",
                "value" => "",
                "dependency" => array(
                    'element' => "divider_width",
                    'value' => array(
                        'custom'
                    )
                )
            ) ,

              array(
                "type" => "textfield",
                "heading" => __("Padding Top", "manang") ,
                "param_name" => "padding_top",
                "value" => "",
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Padding Bottom", "manang") ,
                "param_name" => "padding_bottom",
                "value" => __("", "manang") ,
            ) ,

            array(
                "heading" => __("Divider Align", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "divider_align",
                "value" => array(
                    __("Left", 'manang') => "divider-align-left",
                    __("Right", 'manang') => "divider-align-right",
                    __("Center", 'manang') => "divider-align-center"
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Divider Height", "manang") ,
                "param_name" => "divider_height",
                "value" => "",
                "description" => __("", "manang")
            ) ,

        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_divider_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'divider_style'      => 'single-dotted',
                            'divider_color'      => '',
                            'color_first'        => '',
                            'color_second'       => '',
                            'divider_width'      => 'fullwidth',
                            'custom_width'       => '',
                            'padding_top'        => '',
                            'padding_bottom'     => '',
                            'divider_align'      => 'divider-align-left',
                            'divider_height'      => '',
                            ),$atts);
               $divider_style = $values['divider_style'];
               $divider_color = $values['divider_color'];
               $color_first = $values['color_first'];
               $color_second = $values['color_second'];
               $divider_width = $values['divider_width'];
               $custom_width = $values['custom_width'];
               $padding_top = $values['padding_top'];
               $padding_bottom = $values['padding_bottom'];
               $divider_align = $values['divider_align'];
               $divider_height = $values['divider_height'];
               if($divider_style == 'single-dotted'){
                    $dott_style = 'style="border-top: 1px dashed '.$divider_color.';"';
               }
               elseif($divider_style=='double-dotted'){
                    $dott_style = 'style="border-top: 1px dashed '.$divider_color.'; border-bottom: 1px dashed'.$divider_color.';"';
               }
               elseif($divider_style=='gradient-divider'){
                    $dott_style = 'style="background: linear-gradient(to right, '.$color_first.' 0%, '.$color_second.' 100% ';
               }
               elseif($divider_style=='solid-divider'){
                    $dott_style = 'style="background:'.$divider_color.';"';
               }
               elseif($divider_style=='double-solid-divider'){
                    $dott_style = 'style="border-top: 1px solid '.$divider_color.'; border-bottom: 1px solid'.$divider_color.';"';
               }
               else{
                    $dott_style = "";
               }

                ob_start(); ?>
                   <!-- dotted divied -->
                <div class="divider <?php echo esc_attr($divider_width . ' ' .$divider_align); ?>" style="width: <?php echo $custom_width; ?>px; padding-top: <?php echo esc_attr($padding_top); ?>px padding-bottom: <?php echo esc_attr($padding_bottom); ?>px height: <?php echo esc_attr($divider_height); ?>px">
                    <div class="<?php echo esc_attr($divider_style); ?>" <?php echo $dott_style; ?>></div>
                </div>

                <?php $output = ob_get_clean();
                return $output;
            }
        }
    }
}
