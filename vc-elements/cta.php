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
add_action( 'vc_before_init', 'cc_call_to_action_integrateWithVC2' );
function cc_call_to_action_integrateWithVC2(){
    vc_map( array(
        "name"                    => __("CC Call to Action Button2", "manang"),
        "base"                    => "cc_call_to_action2",
        "description"             => __("Display a button along with text.","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Enter Text", "manang"),
                "param_name"  => "cta_title",
            ),
            array(
                "type"        => "textarea",
                "holder" => "div",
                "heading"     => __("Enter description Text", "manang"),
                "param_name"  => "cta_description",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Padding Top", "manang"),
                "param_name"  => "padding_top",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Padding Bottom", "manang"),
                "param_name"  => "padding_bottom",
            ),
            array(
                "heading" => __("Background?", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "cta_background",
                "value" => array(
                    __("Image Background", 'manang') => "image-bg",
                    __("Video Background", 'manang') => "videobg-wrapper",
                    __("Solid Color", 'manang') => "solid-color",
                    __("Bubble Animated Background", 'manang') => "bubbles",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "attach_image",
                "heading" => __("Upload Image", "manang") ,
                "param_name" => "cta_image",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "cta_background",
                    'value' => array(
                        'image-bg'
                    )
                )
            ) ,

            array(
                "type" => "attach_image",
                "heading" => __("Upload Video", "manang") ,
                "param_name" => "cta_video",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "cta_background",
                    'value' => array(
                        'videobg-wrapper'
                    )
                )
            ) ,

            array(
                "type" => "colorpicker",
                "heading" => __("Choose Color", "manang") ,
                "param_name" => "solid_color",
                "value" => "",
                "description" => __("Add solid color in section.", "manang") ,
                "dependency" => array(
                    'element' => "cta_background",
                    'value' => array(
                        'solid-color'
                    )
                )
            ) ,

            array(
                "type" => "colorpicker",
                "heading" => __("Choose Color", "manang") ,
                "param_name" => "bubble_color",
                "value" => "",
                "description" => __("Add bubble color in section.", "manang") ,
                "dependency" => array(
                    'element' => "cta_background",
                    'value' => array(
                        'bubbles'
                    )
                )
            ) ,

            array(
                "type"        => "textfield",
                "heading"     => __("Enter Button Text", "manang"),
                "param_name"  => "button_text",
            ),

            array(
                "type"        => "textfield",
                "heading"     => __("Enter Link", "manang"),
                "param_name"  => "button_link",
            ),

            array(
                "heading" => __("Style", 'manang') ,
                "description" => __("Choose button position", 'manang') ,
                "param_name" => "cta_style",
                "value" => array(
                    __("Text Left Button Right", 'manang') => "text-left-btn-right",
                    __("All In Center", 'manang') => "text-btn-center",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Content Color", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "cta_content_color",
                "value" => array(
                    __("Dark", 'manang') => "cta-dark",
                    __("Light", 'manang') => "cta-light",
                ) ,
                "type" => "dropdown"
            ) ,

        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_cc_call_to_action2 extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'cta_title'  =>  '',
                'cta_description'  =>  '',
                'padding_top' => '',
                'padding_bottom' => '',
                'cta_background' => 'image-bg',
                'cta_image' => '',
                'cta_video' => '',
                'solid_color' => '',
                'bubble_color' => '',
                'button_text'  =>  '',
                'button_link' => 'javascript:void(0)',
                'cta_style' => 'text-left-btn-right',
                'cta_content_color' => 'cta-dark',

            ), $atts ) ;
            // $cta_bg_image = wp_get_attachment_url( $values['cta_bg_image'] );
            $cta_title = $values['cta_title'];
            $cta_description = $values['cta_description'];
            $padding_top = $values['padding_top'];
            $padding_bottom = $values['padding_bottom'];
            $cta_background = $values['cta_background'];
            $cta_image = wp_get_attachment_url($values['cta_image']);
            $cta_video = wp_get_attachment_url($values['cta_video']);
            $solid_color = $values['solid_color'];
            $bubble_color = $values['bubble_color'];
            $cta_button_link = $values['button_link'];
            $cta_button_text = $values['button_text'];
            $cta_style = $values['cta_style'];
            $cta_content_color = $values['cta_content_color'];
            $cta_bg_img = ($cta_background == 'image-bg'?$cta_image:'');
            $cta_bg_vid = ($cta_background == 'videobg-wrapper'?$cta_video:'');
            $video_data = "data-vide-bg='".esc_url($cta_bg_vid)."' data-vide-options='position: 0% 50%'";
            $video_background_data = (!empty($cta_bg_vid)?$video_data:'');
            if($cta_background == 'solid-color'){
                $cta_background_color = $solid_color;
            }
            elseif($cta_background == 'bubbles'){
                $cta_background_color = $bubble_color;
            }
            else{
                $cta_background_color = "";
            }

            // $cta_bg_color_secondary = $values['cta_bg_color'];
            ob_start();
            ?>
            <section class="section cta-sec parallax <?php echo esc_attr($cta_background . ' '.$cta_style.' '.$cta_content_color); ?>" <?php echo $video_background_data; ?> style="background-color: <?php echo $cta_background_color; ?>; padding-top: <?php echo esc_attr($padding_top); ?>px; padding-bottom: <?php echo esc_attr($padding_bottom); ?>px; background-image:url(<?php echo esc_url($cta_bg_img); ?>);">
                <div class="container">
                    <div class="row">
                        <div class="cta-content">
                            <?php if(!empty($cta_title)){ ?>
                                <h2 class="cta-title">
                                    <?php echo esc_html($cta_title); ?>
                                </h2>
                            <?php }?>
                            <p><?php echo esc_html($cta_description); ?></p>
                            <a href="<?php echo esc_url($cta_button_link); ?>" class="btn btn-default"><?php echo esc_html($cta_button_text) ?></a>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
