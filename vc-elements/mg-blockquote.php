<?php
/**
 * Block Quote
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php

add_action( 'vc_before_init', 'manang_blockquote_integrateWithVC' );
function manang_blockquote_integrateWithVC(){
    vc_map(array(
        "name" => __("Block Quote", "manang") ,
        "base" => "manang_blockquote",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('', 'manang') ,
        "params" => array(
             array(
                "type" => "textarea_html",
                "holder" => "div",
                'toolbar' => 'full',
                "heading" => __("Blockquote Message", "manang") ,
                "param_name" => "blockquote_message",
                "value" => __("", "manang") ,
            ) ,

            array(
                "heading" => __("Blockquote Style", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "blockquote_style",
                "value" => array(
                    __("Quote Style", 'manang') => "quote",
                    __("Line Style", 'manang') => "line"
                ) ,
                "type" => "dropdown"
            ) ,

             array(
                'type' => 'google_fonts',
                'param_name' => 'text_font',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => __( 'Select Font Family.', 'manang' ),
                        'font_style_description' => __( 'Select Font Style.', 'manang' ),
                    ),
                ),
                'weight' => 0,
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Font Size", "manang") ,
                "param_name" => "font_size",
                "value" => array(
                    "Default" => "default",
                    "Custom" => "custom",
                )
            ) ,

             array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Text Size", "manang"),
                "param_name"  => "text_size",
                 "dependency" => array(
                    'element' => "font_size",
                    'value' => array(
                        'custom'
                    )
                )
            ),
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_blockquote extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'title'              => '',
                            'icon_class'         => 'ion-ios-briefcase-outline',
                            'count_to'           => '',
                            'content_color'      => 'counter-light',
                            'icon_position'      => 'icon-top',
                            ),$atts);
               $title = $values['title'];
               $icon_class = $values['icon_class'];
               $count_to = $values['count_to'];
               $content_color = $values['content_color'];
               $icon_position = $values['icon_position'];
                ob_start();
                ?>

                <?php
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}