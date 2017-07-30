<?php
/**
 * Portfolio
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_subscribe_integrateWithVC' );
function manang_subscribe_integrateWithVC(){
    vc_map(array(
        "name" => __("Subscribe", "manang") ,
        "base" => "manang_subscribe_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Subscribe Elements.', 'manang') ,
        "params" => array(
            array(
                "heading" => __("Preset Styles", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "preset_style",
                "value" => array(
                    __("Style 1", 'manang') => "style1",
                    __("Style 2", 'manang') => "style2",
                    __("Style 3", 'manang') => "style3",
                    __("Style 4", 'manang') => "style4",
                    __("Style 5", 'manang') => "style5",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Enter Title", "manang") ,
                "param_name" => "enter_title",
                "value" => "",
                "description" => __("", "manang"),
                "dependency" => array(
                    'element' => "preset_style",
                    'value' => array(
                        'style5'
                    )
                )
            ) ,

            array(
                "heading" => __("Button Align", 'manang') ,
                "param_name" => "button_align",
                "value" => array(
                    __("Left", 'manang') => "portfolio-classic",
                    __("Centre", 'manang') => "portfolio-modern",
                    __("Right", 'manang') => "portfolio-modern",
                ) ,
                "type" => "dropdown",
                "dependency" => array(
                    'element' => "preset_style",
                    'value' => array(
                        'style5'
                    )
                )
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Add Email", 'manang') ,
                "param_name" => "admin_email",
                "value" => "",
                "description" => __("", "manang")
            ) ,
        ),
    ));
    if(class_exists('WPBakerySubscribe')){
        class WPBakeryShortCode_manang_subscribe_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'preset_style'       => '',
                            'enter_title'         => '',
                            'button_align'        => '',
                            'admin_email'          => '',
                            ),$atts);
               $preset_style = $values['preset_style'];
               $enter_title = $values['enter_title'];
               $button_align = $values['button_align'];
               $admin_email = $values['admin_email'];
               ob_start();
               ?>
               <div class="subscription-form-wrapper style1">
                    <p class="result"></p>
                    <form class="subscription-form form-wrapper input-group" autocomplete="off" novalidate="true">
                        <input type="email" class="form-control" name="EMAIL" placeholder="Subscribe Email To Get Notified">
                        <button type="submit" id="submit" class="form-submit">Submit</button>
                        <div class="ajax-loader" style="">
                            <img class="contact_spinner" src="assets/img/spinner.gif" alt="">
                        </div>
                    </form>
                </div>

            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
            }
        }
    }
}
