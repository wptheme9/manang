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
add_action( 'vc_before_init', 'manang_section_title_integrateWithVC2' );
function manang_section_title_integrateWithVC2(){
    vc_map( array(
        "name"                    => __("Section Title", "manang"),
        "base"                    => "section_title",
        "description"             => __("","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
              array(
                "heading" => __("Style", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "style",
                "value" => array(
                    __("Simple", 'manang') => "title-simple",
                    __("Modern", 'manang') => "title-modern",
                    __("Classic", 'manang') => "title-classic",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Add Image Or Icon?", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "image_icon",
                "value" => array(
                    __("Image", 'manang') => "image",
                    __("Icon", 'manang') => "icon",
                    __("None", 'manang') => "none",
                ) ,
                "type" => "dropdown",
                "dependency" => array(
                    'element' => "style",
                    'value' => array(
                        'title-simple'
                    )
                )
            ) ,

            array(
                "type" => "attach_image",
                "heading" => __("Upload Image", "manang") ,
                "param_name" => "section_title_image",
                "value" => "",
                "description" => __("", "manang") ,
                "dependency" => array(
                    'element' => "image_icon",
                    'value' => array(
                        'image'
                    )
                )
            ) ,
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Enter Class Name", "manang"),
                "description" => __("<a target='_blank' href='http://ionicons.com'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "manang") ,
                "param_name"  => "section_title_icon",
                 "dependency" => array(
                    'element' => "image_icon",
                    'value' => array(
                        'icon'
                    )
                )
            ),

            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Add Single Letter", "manang"),
                "description" => __( 'Add Single Shadow Letter Like A,B,C ', 'manang' ),
                "param_name"  => "shadow_letter",
                  "dependency" => array(
                    'element' => "style",
                    'value' => array(
                        'title-modern'
                    )
                )
            ),

            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Add shadow text", "manang"),
                "param_name"  => "shadow_text",
                  "dependency" => array(
                    'element' => "style",
                    'value' => array(
                        'title-classic'
                    )
                )
            ),

            array(
                "heading" => __("Title Position", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "title_position",
                "value" => array(
                    __("Left", 'manang') => "float-left",
                    __("Right", 'manang') => "float-right",
                    __("Center", 'manang') => "float-none",
                ) ,
                "type" => "dropdown"
            ) ,


            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Title", "manang"),
                "param_name"  => "title",
            ),
            array(
                "type"        => "textarea",
                "holder" => "div",
                "heading"     => __("Description", "manang"),
                "param_name"  => "description",
            ),

            array(
                "type" => "colorpicker",
                "heading" => __("Title Color", "manang") ,
                "param_name" => "title_color",
                "value" => "",
                "description" => __("Add Title color.", "manang") ,
            ) ,

            array(
                "type" => "colorpicker",
                "heading" => __("Description Font Color", "manang") ,
                "param_name" => "description_color",
                "value" => "",
                "description" => __("Add description color.", "manang") ,
            ) ,
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_section_title extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'style'  =>  'title-simple',
                'image_icon'  =>  'image',
                'section_title_image' => '',
                'section_title_icon' => '',
                'shadow_letter' => '',
                'shadow_text' => '',
                'title_position' => 'float-left',
                'title' => '',
                'description' => '',
                'title_color'  =>  '',
                'description_color' => '',

            ), $atts ) ;
            // $cta_bg_image = wp_get_attachment_url( $values['cta_bg_image'] );
            $style = $values['style'];
            $image_icon = $values['image_icon'];
            $section_title_image = wp_get_attachment_url($values['section_title_image']);
            $section_title_icon = $values['section_title_icon'];
            $shadow_letter = $values['shadow_letter'];
            $shadow_text = $values['shadow_text'];
            $title_position = $values['title_position'];
            $title = $values['title'];
            $description = $values['description'];
            $title_color = $values['title_color'];
            $description_color = $values['description_color'];


            if($style == 'title-classic'){
                $shadow_letter_text = $shadow_text;
            }
            elseif($style == 'title-modern'){
                $shadow_letter_text = $shadow_letter;
            }
            else{
                $shadow_letter_text = "";
            }

            if($image_icon == 'image'){
                $image_icon_src = "<img src='".esc_url($section_title_image)."'>";
            }
            elseif($image_icon == 'icon'){
                $image_icon_src = "<i class='".esc_attr($section_title_icon)."'></i>";
            }
            else{
                $image_icon_src = "";
            }

            ob_start(); ?>
            <div class="section-title <?php echo esc_attr($style .' ' .$title_position); ?>">
                <?php if($style == 'title-classic' || $style == 'title-modern'){ ?>
                    <h1 class="shadow-title"><?php echo esc_html($shadow_letter_text); ?></h1>
                <?php }
                else {
                    if(!empty($image_icon_src)){
                        echo $image_icon_src;
                    }
                } ?>
                <div class="title-content">
                    <h2 style="color:<?php echo $title_color; ?>"><?php echo esc_html($title); ?></h2>
                    <p style="color:<?php echo $description_color; ?>"><?php echo esc_html($description); ?></p>
                </div>
            </div>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
