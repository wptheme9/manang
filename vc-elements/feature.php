<?php
/**
 * Feature
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php

add_action( 'vc_before_init', 'manang_icon_box_integrateWithVC' );
function manang_icon_box_integrateWithVC(){
    vc_map(array(
        "name" => __("Icon Box", "manang") ,
        "base" => "manang_icon_box",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Powerful & versatile Icon Boxes.', 'manang') ,
        "params" => array(
            array(
                "heading" => __("Icon Type?", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "icon_type",
                "value" => array(
                    __("Icon", 'manang') => "icon",
                    __("Image", 'manang') => "image"
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Icon/Image Size", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "icon_image_size",
                "value" => array(
                    __("Small", 'manang') => "icon-small",
                    __("Medium", 'manang') => "icon-med",
                    __("Large", 'manang') => "icon-big",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "attach_image",
                "heading" => __("Icon Image", "manang") ,
                "param_name" => "icon_image",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "icon_type",
                    'value' => array(
                        'image'
                    )
                )
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Icon Class Name", "manang") ,
                "param_name" => "icon_class",
                "value" => "ion-ios-briefcase-outline",
                "description" => __("<a target='_blank' href='http://ionicons.com'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "manang") ,
                "dependency" => array(
                    'element' => "icon_type",
                    'value' => array(
                        'icon'
                    )
                )
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Icon Color", "manang") ,
                "param_name" => "icon_color",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "icon_type",
                    'value' => array(
                        'icon'
                    )
                )
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Icon Background Color", "manang") ,
                "param_name" => "icon_background_color",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "icon_type",
                    'value' => array(
                        'icon'
                    )
                )
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Icon Border Color", "manang") ,
                "param_name" => "icon_border_color",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "icon_type",
                    'value' => array(
                        'icon'
                    )
                )
            ) ,

            array(
                "type" => "colorpicker",
                "heading" => __("Icon Hover Color", "manang") ,
                "param_name" => "icon_hover_color",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "icon_type",
                    'value' => array(
                        'icon'
                    )
                )
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Icon Hover Border Color", "manang") ,
                "param_name" => "icon_hover_border_color",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "icon_type",
                    'value' => array(
                        'icon'
                    )
                )
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Title", "manang") ,
                "param_name" => "title",
                "value" => "",
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "range",
                "heading" => __("Title Font Size", "manang") ,
                "param_name" => "title_font_size",
                "value" => "20",
                "min" => "5",
                "max" => "40",
                "step" => "1",
                "unit" => 'px'
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Title Font Color", "manang") ,
                "param_name" => "title_font_color",
                "value" => "",
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "textarea_html",
                "holder" => "div",
                'toolbar' => 'full',
                "heading" => __("Description", "manang") ,
                "param_name" => "content",
                "value" => __("", "manang") ,
                "description" => __("Enter your description.", "manang")
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Description Font Color", "manang") ,
                "param_name" => "description_font_color",
                "value" => "",
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "dropdown",
                "heading" => __("Position", "manang") ,
                "param_name" => "position",
                "description" => __("This option will position the whole box description.", "manang") ,
                "value" => array(
                    "Top" => "icon-top",
                    "Left" => "icon-left",
                    "Right" => "icon-right",
                )
            ) ,
             array(
                "type" => "dropdown",
                "heading" => __("Style", "manang") ,
                "param_name" => "feature_style",
                "description" => __("This option will position the whole box description.", "manang") ,
                "value" => array(
                    "Boxed" => "boxed-style",
                    "Simple" => "simple",
                )
            ) ,
            // array(
            //     "type" => "textfield",
            //     "heading" => __("Read More URL", "manang") ,
            //     "param_name" => "read_more_url",
            //     "value" => "",
            //     "description" => __("", "manang")
            // ) ,
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "manang") ,
                "param_name" => "el_class",
                "value" => "",
                "description" => __("If you wish to style particular description element differently, then use this field to add a class name.", "manang")
            ),
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_icon_box extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'icon_type'                     => 'icon',
                            'icon_image'                    => '',
                            'icon_class'                    => 'ion-ios-briefcase-outline',
                            'icon_image_size'               => 'small',
                            'icon_color'                    => '',
                            'icon_background_color'         => '',
                            'icon_border_color'             => '',
                            'icon_hover_color'              => '',
                            'icon_hover_border_color'       => '',
                            'position'                         => 'icon-top',
                            'title'                         => '',
                            'title_font_size'               => '20',
                            'title_font_color'              => '',
                            // 'content'           => '',
                            'description_font_color'        => '',
                            'feature_style'                 => 'boxed-style',
                            // 'read_more_url'                 => '',
                            'el_class'                      => ''
                            ),$atts);
               $icon_type = $values['icon_type'];
               $icon_image = $values['icon_image'];
               $icon_class = $values['icon_class'];
               $icon_image_size = $values['icon_image_size'];
               $icon_color = $values['icon_color'];
               $icon_background_color = $values['icon_background_color'];
               $icon_border_color = $values['icon_border_color'];
               $icon_hover_color = $values['icon_hover_color'];
               $icon_hover_border_color = $values['icon_hover_border_color'];
               $position = $values['position'];
               $title = $values['title'];
               $title_font_size = $values['title_font_size'];
               $title_font_color = $values['title_font_color'];
               // $content = $values['content'];
               $description_font_color = $values['description_font_color'];
               $feature_style = $values['feature_style'];
               // $read_more_url = $values['read_more_url'];
               $el_class = $values['el_class'];
               $feature_image = wp_get_attachment_url( $icon_image );
               $title_style = 'style="font-size:' . $title_font_size . 'px; color:'.$title_font_color.'"';
               $description_style = 'style="color:'.$description_font_color.'"';
               $icon_style = 'style="background:'.$icon_background_color.'; border: 2px solid'.$icon_border_color.'"';
                ob_start();
                ?>
                <div class="callout-item <?php echo esc_attr($el_class . ' '. $position . ' '.$feature_style . ' '.$icon_image_size); ?>">
                    <div <?php echo $icon_style; ?> class="callout-icon">
                        <?php if($icon_type == 'icon'){ ?>
                            <i style="color:<?php echo $icon_color; ?>" class="<?php echo esc_attr($icon_class); ?>"></i>
                        <?php }
                        else{ ?>
                                <img src="<?php echo esc_url($feature_image); ?>" alt="">
                            <?php }?>
                    </div>
                    <div class="callout-description">
                        <h3 <?php echo $title_style; ?>><?php echo esc_html($title); ?></h3>
                        <p <?php echo $description_style; ?>><?php echo esc_html($content); ?> </p>
                    </div>
                </div>
                <?php
                $app_styles=".callout-icon:hover i{color: $icon_hover_color} .callout-icon:hover {border: 2px solid $icon_hover_border_color;}";
                 echo '<style type="text/css">'.$app_styles.'</style>';
                // manang_style_function($app_styles);
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}


function manang_style_function($app_styles) {
    echo '<style type="text/css">'.$app_styles.'</style>';
}
add_action( 'wp_footer', 'manang_style_function', 999 );
