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
                "param_name" => "blockquote_message",
                "type" => "textarea_html",
                "holder" => "div",
                'toolbar' => 'full',
                "heading" => __("Blockquote Message", "manang") ,
                "value" => __("", "manang") ,
            ) ,

            array(
                "param_name" => "blockquote_style",
                "heading" => __("Blockquote Style", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("Quote Style", 'manang') => "quote-style",
                    __("Line Style", 'manang') => "line-style"
                ) ,
                "type" => "dropdown"
            ) ,

             array(
                'param_name' => 'text_font',
                'type' => 'google_fonts',
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => __( 'Select Font Family.', 'manang' ),
                        'font_style_description' => __( 'Select Font Style.', 'manang' ),
                    ),
                ),
                'weight' => 0,
            ),

            array(
                "param_name" => "font_size",
                "type" => "dropdown",
                "heading" => __("Font Size", "manang") ,
                "value" => array(
                    "Default" => "default",
                    "Custom" => "custom",
                )
            ) ,

             array(
                "param_name"  => "text_size",
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Text Size", "manang"),
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
                            'blockquote_message' => '',
                            'blockquote_style'   => 'quote-style',
                            'text_font'          => '',
                            'font_size'          => 'default',
                            'text_size'          => '',
                            ),$atts);
               $blockquote_message = $values['blockquote_message'];
               $blockquote_style = $values['blockquote_style'];
               $text_font = $values['text_font'];
               $font_size = $values['font_size'];
               $text_size = $values['text_size'];
               $quote_line = ($blockquote_style == 'quote-style'?'<i class="fa fa-quote-left" aria-hidden="true"></i>':'');
                ob_start();
                ?>
                <!-- Block quote style -->
                <blockquote class="<?php echo esc_attr($blockquote_style); ?>" style="font-family: <?php echo $text_font; ?>; font-size: <?php echo esc_attr($text_size); ?>px"><?php  echo $quote_line . $blockquote_message; ?></blockquote>
                <?php
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}