<?php
/**
 * Cards
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php

add_action( 'vc_before_init', 'manang_cards_integrateWithVC' );
function manang_cards_integrateWithVC(){
    vc_map(array(
        "name" => __("Cards", "manang") ,
        "base" => "manang_cards",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('', 'manang') ,
        "params" => array(
            array(
                "param_name" => "cardhover_style",
                "heading" => __("Card Hover Style", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("Image Tilt On Hover", 'manang') => "img-tilt-hover",
                    __("Classic Card", 'manang') => "classic-card",
                    __("Simple Card Hover", 'manang') => "simple-card",
                    __("Content On Hover", 'manang') => "content-hover"
                ) ,
                "type" => "dropdown"
            ) ,
            array(
                "param_name" => "card_title",
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Card Title", "manang") ,
                "value" => __("", "manang") ,
            ) ,
            array(
                "param_name"  => "card_desc",
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Card Desc", "manang"),
                "dependency" => array(
                    'element' => "cardhover_style",
                    'value' => array(
                        'img-tilt-hover','simple-card','content-hover'
                    )
                )
            ),
            array(
                "param_name"  => "card_permalink",
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Permalink URL", "manang"),
            ),
            array(
                "param_name"  => "card_permalink_title",
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Add Text", "manang"),
                 "dependency" => array(
                    'element' => "cardhover_style",
                    'value' => array(
                        'simple-card','content-hover'
                    )
                )
            ),
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_cards extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'cardhover_style'   => 'img-tilt-hover',
                            'card_title' => '',
                            'card_desc'          => '',
                            'card_permalink'          => '',
                            'card_permalink_title' => '',
                            ),$atts);
               $cardhover_style = $values['cardhover_style'];
               $card_title = $values['card_title'];
               $card_desc = $values['card_desc'];
               $card_permalink = $values['card_permalink'];
               $card_permalink_title = $values['card_permalink_title'];
                ob_start();
                ?>
                <?php
                switch($cardhover_style){
                        case('img-tilt-hover'): ?>
                            <div class="col-md-4">
                                <a href="<?php echo esc_url($card_permalink); ?>" class="tilter tilter--1">
                                    <figure class="tilter__figure">
                                        <div class="tilter__deco tilter__deco--shine"><div></div></div>
                                        <figcaption class="tilter__caption">
                                            <h3 class="tilter__title"><?php echo esc_html($card_title); ?></h3>
                                            <p class="tilter__description"><?php echo esc_html($card_desc); ?></p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        <?php break;
                        case('classic-card'): ?>
                            <div class="col-md-4">
                                <div class="box classic-simple-hover">
                                    <a href="<?php echo esc_url($card_permalink); ?>">
                                        <div class="box-heading">
                                            <h3 class="title"><?php echo esc_html($card_title); ?></h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php break;
                        case('simple-card'): ?>
                            <div class="col-md-4">
                                <div class="card cover-box">
                                    <div class="wrapper">
                                      <div class="data">
                                        <div class="content">
                                          <h1 class="title"><a href="#"><?php echo esc_html($card_title); ?></p>
                                          <a href="<?php echo esc_url($card_permalink); ?>" class="read"><?php echo esc_html($card_permalink_title); ?></a>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        <?php break;
                        case('content-hover'): ?>
                            <div class="col-md-4">
                                <div class="full-image-box card">
                                    <div class="wrapper">
                                        <div class="data">
                                            <div class="content">
                                              <h1 class="title"><a href="<?php echo esc_url($card_permalink); ?>"><?php echo esc_html($card_title); ?></a></h1>
                                              <p class="text"><?php echo esc_html($card_desc); ?></p>
                                              <a href="<?php echo esc_url($card_permalink); ?>" class="read"><?php echo esc_html($card_permalink_title); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php break;
                    }
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}