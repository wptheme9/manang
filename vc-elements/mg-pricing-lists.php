<?php
/**
 * Event Timeline
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_pricing_lists_integrateWithVC' );
function manang_pricing_lists_integrateWithVC(){
    vc_map(array(
        "name" => __("Pricing Lists", "manang") ,
        "base" => "manang_pricing_lists_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Pricing Lists Elements.', 'manang') ,
        "params" => array(
            array(
                "param_name" => "title",
                "heading" => __("Title", "manang") ,
                "value" => "",
                "type" => "textfield",
            ) ,
            array(
                "param_name" => "description",
                "heading" => __("Description", "manang") ,
                "value" => "",
                "type" => "textarea",
            ) ,
            array(
                "type" => "attach_image",
                "heading" => __("Image", "manang") ,
                "param_name" => "pricing_image",
                "value" => "",
            ) ,
            array(
                "param_name" => "price",
                "heading" => __("Enter Price", "manang") ,
                "value" => "",
                "type" => "textfield",
            ) ,
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_pricing_lists_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'title'    => '',
                            'description'      => '',
                            'pricing_image'         => '',
                            'price'     => '',
                            ),$atts);
               $title = $values['title'];
               $description = $values['description'];
               $pricing_image = $values['pricing_image'];
               $price = $values['price'];
               $pricing_image = wp_get_attachment_url( $pricing_image );

                ob_start(); ?>
                    <div class="product-menu-item row">
                        <?php if(!empty($pricing_image)) { ?>
                            <div class="menu-img">
                                <img src="<?php echo esc_url($pricing_image); ?>" alt=""></a>
                            </div>
                        <?php }
                        if(!empty($title) || !empty($description)) { ?>
                            <div class="menu-item-desc">
                                <h3><?php echo esc_html($title); ?></h3>
                                <p><?php echo esc_html($description); ?></p>
                            </div>
                        <?php }
                        if(!empty($price)){ ?>
                            <div class="menu-item-price">
                                <span><?php echo esc_html($price); ?></span>
                            </div>
                        <?php } ?>
                    </div>
                <?php $output = ob_get_clean();
                return $output;
            }
        }
    }
}
