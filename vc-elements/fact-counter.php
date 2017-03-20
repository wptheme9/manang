<?php
/**
 * Fact Counter
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php

add_action( 'vc_before_init', 'manang_fact_counter_integrateWithVC' );
function manang_fact_counter_integrateWithVC(){
    vc_map(array(
        "name" => __("Fact Counters", "manang") ,
        "base" => "manang_fact_counter",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('', 'manang') ,
        "params" => array(
             array(
                "type" => "textfield",
                "heading" => __("Title", "manang") ,
                "param_name" => "title",
                "value" => "",
                "description" => __("Add Title", "manang")
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Icon Class Name", "manang") ,
                "param_name" => "icon_class",
                "value" => "ion-ios-briefcase-outline",
                "description" => __("<a target='_blank' href='http://ionicons.com'>Click here</a> to get the icon class name (or any other font icons library that you have installed in the theme)", "manang") ,
            ) ,

             array(
                "type" => "textfield",
                "heading" => __("Count Upto", "manang") ,
                "param_name" => "count_to",
                "value" => "",
                "description" => __("Add Number to count", "manang")
            ) ,

            array(
                "heading" => __("Content Color", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "content_color",
                "value" => array(
                    __("Light", 'manang') => "counter-light",
                    __("Dark", 'manang') => "counter-dark"
                ) ,
                "type" => "dropdown"
            ) ,

             array(
                "type" => "dropdown",
                "heading" => __("Icon Position", "manang") ,
                "param_name" => "icon_position",
                "description" => __("This option will fix the position of the added icon.", "manang") ,
                "value" => array(
                    "Top" => "icon-top",
                    "Left" => "icon-left",
                )
            ) ,
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_fact_counter extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'title'              => '',
                            'icon_class'         => 'ion-ios-briefcase-outline',
                            'count_to'           => '',
                            'content_color'      => 'counter-light',
                            'icon_position'      => 'icon-left',
                            ),$atts);
               $title = $values['title'];
               $icon_class = $values['icon_class'];
               $count_to = $values['count_to'];
               $content_color = $values['content_color'];
               $icon_position = $values['icon_position'];
                ob_start();
                ?>
               <div class="counter-wrap <?php echo esc_attr($icon_position . ' '.$content_color); ?>">
                    <i class="<?php echo esc_attr($icon_class); ?>"></i>
                    <div class="counter-info">
                        <h3 class="timer" data-from="0" data-to="<?php echo esc_html($count_to); ?>" data-speed="2000" data-refresh-interval="50"><?php echo esc_html($count_to); ?></h3>
                        <span><?php echo esc_html($title); ?></span>
                    </div>
                </div>

                <?php
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}