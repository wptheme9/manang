<?php
/**
 * Clients
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_clients_integrateWithVC' );
function manang_clients_integrateWithVC(){
    vc_map(array(
        "name" => __("Clients", "manang") ,
        "base" => "manang_clients_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Clients Elements.', 'manang') ,
        "params" => array(
             array(
                "heading" => __("Style", 'manang') ,
                "param_name" => "style",
                "value" => array(
                    __("Slider", 'manang') => "slider",
                    __("Column Display", 'manang') => "column",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Border Style", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "border_style",
                "value" => array(
                    __("Boxed", 'manang') => "boxed",
                    __("Edges", 'manang') => "edged"
                ) ,
                "type" => "dropdown",
                "dependency" => array(
                    'element' => "style",
                    'value' => array(
                        'column'
                    )
                )
            ) ,

            array(
                "heading" => __("Effect", 'manang') ,
                "param_name" => "effect",
                "value" => array(
                    __("Black & White on Hover", 'manang') => "hover-on-bw",
                    __("Colored on Hover", 'manang') => "hover-on-colored",
                    __("None", 'manang') => "",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Logo Height", "manang") ,
                "param_name" => "logo_height",
                "value" => "",
                "description" => __("", "manang")
            ) ,

            array(
                "type" => "checkbox",
                "heading" => __("Auto Play?", "manang") ,
                "param_name" => "autoplay",
                "value" => "",
                "description" => __("", "manang")
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("No of Client to Show", "manang") ,
                "param_name" => "number_post",
                "value" => "",
                "description" => __("", "manang")
            ) ,


        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_clients_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'style'          => 'slider',
                            'border_style'   => 'boxed',
                            'effect'         => 'hover-on-bw',
                            'logo_height'    => '',
                            'autoplay'       => '',
                            'number_post'    => '',
                            ),$atts);
               $style = $values['style'];
               $border_style = $values['border_style'];
               $effect = $values['effect'];
               $logo_height = $values['logo_height'];
               $autoplay = $values['autoplay'];
               $number_post = (empty($values['number_post'])?-1:$values['number_post']);

               $clients_argument = array(
                    'post_type'      => 'manang-clients',
                    'post_status'    => 'publish',
                    'posts_per_page' => $number_post,
                    'orderby'        => 'menu_order date',
                    'order'          => 'desc',
                );
                $clients_query = new WP_Query($clients_argument);

                ob_start();
                if($clients_query->have_posts()):
                    if($style == 'slider'){
                        echo '<div class="client-slider">';
                    }

                    while($clients_query->have_posts()):
                        $clients_query->the_post();

                        $manang_basecamp_clients_link = get_post_meta( get_the_id(), 'manang_basecamp_clients_link', true );
                        $clients_image_id = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

                        if($style == 'column'){
                            echo '<div class="col-md-3 col-sm-6 pad0">';
                        } ?>
                                <div class="item">
                                    <div class="client-image-wrapper <?php echo esc_attr($effect .' '.$border_style); ?>">
                                        <a target="_blank" href="<?php echo esc_url($manang_basecamp_clients_link); ?>"><img style="max-height:<?php echo esc_attr($logo_height) ?>px" src="<?php echo esc_url($clients_image_id[0]) ?>" alt=""></a>
                                    </div>
                                </div>
                            <?php
                        if($style == 'column'){
                            echo '</div>';
                        }
                    endwhile;
                    if($style == 'slider'){
                        echo '</div>';
                    }
                    wp_reset_postdata();
                endif;
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}
