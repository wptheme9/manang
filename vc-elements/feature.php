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
    vc_map(array(
        "name" => __("Icon Box", "manang") ,
        "base" => "mk_icon_box2",
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
                "param_name" => "icon_size",
                "value" => array(
                    __("Small", 'manang') => "small",
                    __("Medium", 'manang') => "medium",
                    __("Large", 'manang') => "large",
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
                "param_name" => "icon",
                "value" => "ion-ios-briefcase-outline",
                "description" => __("<a target='_blank' href='ionicons.com'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "manang") ,
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
                "heading" => __("Icon Hover Background Color", "manang") ,
                "param_name" => "icon_hover_background_color",
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
                "param_name" => "title_size",
                "value" => "20",
                "min" => "5",
                "max" => "40",
                "step" => "1",
                "unit" => 'px'
            ) ,
            array(
                "type" => "dropdown",
                "heading" => __("Title Font Weight", "manang") ,
                "param_name" => "title_weight",
                "width" => 150,
                "value" => array(
                    __('Default', "manang") => "inherit",
                    __('Bold', "manang") => "bold",
                    __('Bolder', "manang") => "bolder",
                    __('Normal', "manang") => "normal",
                    __('Light', "manang") => "300"
                ) ,
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Title Font Color", "manang") ,
                "param_name" => "title_color",
                "value" => "",
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "range",
                "heading" => __("Title Top Padding", "manang") ,
                "param_name" => "title_top_padding",
                "value" => "10",
                "min" => "5",
                "max" => "60",
                "step" => "1",
                "unit" => 'px'
            ) ,
            array(
                "type" => "range",
                "heading" => __("Title Bottom Padding", "manang") ,
                "param_name" => "title_bottom_padding",
                "value" => "10",
                "min" => "5",
                "max" => "60",
                "step" => "1",
                "unit" => 'px'
            ) ,

            array(
                "type" => "textarea_html",
                "holder" => "div",
                'toolbar' => 'full',
                "heading" => __("Description", "manang") ,
                "param_name" => "content",
                "value" => __("", "manang") ,
                "description" => __("Enter your content.", "manang")
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Description Font Color", "manang") ,
                "param_name" => "description_color",
                "value" => "",
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "dropdown",
                "heading" => __("Box Align", "manang") ,
                "param_name" => "align",
                "description" => __("This option will align the whole box content.", "manang") ,
                "value" => array(
                    "Center" => "center",
                    "Left" => "left",
                    "Right" => "right",
                )
            ) ,
            array(
                "type" => "textfield",
                "heading" => __("Read More URL", "manang") ,
                "param_name" => "read_more_url",
                "value" => "",
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "manang") ,
                "param_name" => "el_class",
                "value" => "",
                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in Custom CSS Shortcode or Masterkey Custom CSS option.", "manang")
            )
        )
    ));
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_manang_feature extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
           $values =  shortcode_atts( array(
                'icon_type'                     => 'icon',
                'icon_image'                    => '',
                'icon'                          => 'ion-ios-briefcase-outline',
                'icon_size'                     => 'small',
                'icon_color'                    => '',
                'icon_background_color'         => '',
                'icon_border_color'             => '',
                'icon_hover_color'              => '',
                'icon_hover_background_color'   => '',
                'icon_hover_border_color'       => '',
                'title'                         => '',
                'title_size'                    => '20',
                'title_color'                   => '',
                'title_weight'                  => 'inherit',
                'title_top_padding'             => '10',
                'title_bottom_padding'          => '10',
                'content'                       => '',
                'description_color'             => '',
                'animation'                     => '',
                'read_more_url'                 => '',
                'align'                         => 'center',
                'el_class'                      => ''
                ),$atts);
           $feature_image = wp_get_attachment_url( $values['icon_image'] );
            ob_start();
            ?>
            <div class="callout-item icon-top img-icon" data-aos="fade-up">
                <div class="callout-icon">
                    <?php if($values['icon_type'] == 'icon'){ ?>
                        <i class="<?php echo esc_attr($feature_icon_class); ?>"></i>
                    <?php }
                    else{ ?>
                            <img src="<?php echo esc_url($feature_image); ?>" alt="">
                        <?php }?>
                </div>
                <div class="callout-content">
                    <h3><?php echo esc_html($values['title']); ?></h3>
                    <p><?php echo esc_html($values['content']); ?> </p>
                </div>
            </div>
           <?php
            ?>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;

        }
    }
}
