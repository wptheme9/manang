<?php
/**
 * Fancybox
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_fancybox_integrateWithVC' );
function manang_fancybox_integrateWithVC(){
    vc_map(array(
        "name" => __("Fancybox", "manang") ,
        "base" => "manang_fancybox_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Fancybox Elements.', 'manang') ,
        "params" => array(
             array(
                "heading" => __("Icon Or Number?", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "icon_number",
                "value" => array(
                    __("Icon", 'manang') => "icon",
                    __("Number", 'manang') => "number"
                ) ,
                "type" => "dropdown"
            ) ,

             array(
                "type" => "textfield",
                "heading" => __("Icon Class Name", "manang") ,
                "param_name" => "icon_class",
                "value" => "ion-ios-briefcase-outline",
                "description" => __("<a target='_blank' href='ionicons.com'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "manang") ,
                "dependency" => array(
                    'element' => "icon_number",
                    'value' => array(
                        'icon'
                    )
                )
            ) ,

              array(
                "type" => "textfield",
                "heading" => __("Add Number", "manang") ,
                "param_name" => "number_field",
                "value" => "",
                "dependency" => array(
                    'element' => "icon_number",
                    'value' => array(
                        'icon'
                    )
                )
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Title", "manang") ,
                "param_name" => "fancybox_title",
                "value" => __("", "manang") ,
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
                "heading" => __("Fancybox Background Color", "manang") ,
                "param_name" => "fancybox_bg_color",
                "value" => "",
                "description" => __("", "manang")
            ) ,

            array(
                "type" => "colorpicker",
                "heading" => __("Fancybox Content Color", "manang") ,
                "param_name" => "fancybox_content_color",
                "value" => "",
                "description" => __("", "manang")
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Read More Text", "manang") ,
                "param_name" => "read_more_text",
                "value" => "",
                "description" => __("", "manang")
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Read More URL", "manang") ,
                "param_name" => "read_more_url",
                "value" => "",
                "description" => __("", "manang")
            ) ,

        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_fancybox_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'icon_number'              => 'icon',
                            'icon_class'               => '',
                            'number_field'             => '',
                            'fancybox_title'           => '',
                            'content'                  => '',
                            'fancybox_bg_color'        => '',
                            'fancybox_content_color'   => '',
                            'read_more_url'            => '',
                            'read_more_text'           => '',
                            ),$atts);
               $icon_number = $values['icon_number'];
               $icon_class = $values['icon_class'];
               $number_field = $values['number_field'];
               $fancybox_title = $values['fancybox_title'];
               $content = $values['content'];
               $fancybox_bg_color = $values['fancybox_bg_color'];
               $fancybox_content_color = $values['fancybox_content_color'];
               $read_more_url = $values['read_more_url'];
               $read_more_text = $values['read_more_text'];

                ob_start(); ?>
                    <div class="fancybox-item" style="background:<?php esc_attr($fancybox_bg_color); ?>">
                        <h3><?php echo esc_html($fancybox_title); ?></h3>
                        <p><?php echo $content; ?></p>
                        <?php if(!empty($read_more_text && !empty($read_more_url))): ?>
                            <a class="readmore" href="<?php echo esc_url($read_more_url); ?>"><?php echo esc_html($read_more_text); ?><span class="ion-arrow-right-a"></span></a>
                        <?php endif; ?>
                        <?php if($icon_number == 'icon'){ ?>
                            <i class="<?php echo esc_attr($icon_class); ?>"></i>
                            <?php }
                        else { ?>
                            <span><?php echo esc_html($number_field); ?></span>
                        <?php } ?>
                    </div>
                <?php $output = ob_get_clean();
                return $output;
            }
        }
    }
}
