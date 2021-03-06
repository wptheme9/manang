<?php
/**
 * Pricing
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_pricing_integrateWithVC' );
function manang_pricing_integrateWithVC(){
    vc_map(array(
        "name" => __("Pricing", "manang") ,
        "base" => "manang_pricing_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Pricing Elements.', 'manang') ,
        "params" => array(
             array(
                "heading" => __("How Many Tables?", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "table_number",
                "value" => array(
                    __("Two", 'manang') => "col-md-6",
                    __("Three", 'manang') => "col-md-4",
                    __( "Four", 'manang' ) => "col-md-3",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Table Style", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "pricing_table_style",
                "value" => array(
                    __("Light", 'manang') => "light",
                    __("Dark", 'manang') => "dark",
                    __( 'Image', 'manang' ) => "image",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "param_name" => "number_pricing",
                "heading" => __("Number Of Pricing To Be Displayed", "manang") ,
                "value" => "",
                "type" => "textfield",
            ) ,

        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_pricing_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'table_number'          => 'col-md-6',
                            'pricing_table_style'   => 'light',
                            'number_pricing'        => '',
                            ),$atts);
               $table_number = $values['table_number'];
               $pricing_table_style = $values['pricing_table_style'];
               $number_pricing = $values['number_pricing'];
               $posts_per_page = (empty($number_pricing)?-1:$number_pricing);

               $pricing_argument = array(
                    'post_type'      => 'manang-pricing',
                    'post_status'    => 'publish',
                    'posts_per_page' => $posts_per_page,
                    'orderby'        => 'menu_order date',
                    'order'          => 'desc',
                );
                $pricing_query = new WP_Query($pricing_argument);

                ob_start();
                if($pricing_query->have_posts()):

                    while($pricing_query->have_posts()):
                        $pricing_query->the_post();
                        $plan_name = get_post_meta(get_the_id(), 'manang_basecamp_pricing_plan_name', true);
                        $price = get_post_meta(get_the_id(), 'manang_basecamp_pricing_price', true);
                        $currency = get_post_meta(get_the_id(), 'manang_basecamp_pricing_currency', true);
                        $period = get_post_meta(get_the_id(), 'manang_basecamp_pricing_period', true);
                        $features = get_post_meta(get_the_id(), 'manang_basecamp_pricing_features', true);
                        $button_text = get_post_meta(get_the_id(), 'manang_basecamp_pricing_button_text', true);
                        $button_link = get_post_meta(get_the_id(), 'manang_basecamp_pricing_button_link', true);
                        $featured = get_post_meta(get_the_id(), 'manang_basecamp_pricing_featured', true);
                        $featured_or_not = ($featured == 'on'?'pricing__item--featured':'');
                        $pricing_image_id = get_post_thumbnail_id();
                        $pricing_image_url = wp_get_attachment_image_src( $pricing_image_id, 'full' );

                        switch($pricing_table_style){
                            case( "dark" ): ?>
                                <div class="<?php echo esc_attr($table_number); ?>">
                                    <div class="pricing__item style2 <?php echo esc_attr($featured_or_not); ?>">
                                        <?php if(!empty($plan_name)){ ?>
                                            <h3 class="pricing__title"><?php echo esc_html($plan_name); ?></h3>
                                        <?php } ?>
                                        <div class="pricing__price">
                                            <?php if(!empty($currency) ){ ?>
                                                <span class="pricing__currency"><?php echo esc_html($currency); ?></span>
                                             <?php } ?>
                                            <?php echo esc_html($price);
                                            if(!empty($period)){ ?>
                                                <span class="pricing__period">/ <?php echo esc_html($period); ?></span>
                                            <?php } ?>
                                        </div>
                                        <?php if(!empty($features)){ ?>
                                            <ul class="pricing__feature-list">
                                                <?php foreach($features as $feature){ ?>
                                                    <li class="pricing__feature"><?php echo esc_html($feature); ?></li>
                                                <?php } ?>
                                            </ul>
                                        <?php }
                                        if(!empty($button_link) && !empty($button_text)){ ?>
                                            <a href="<?php echo esc_url($button_link)?>" class="pricing__action"><?php echo esc_html($button_text); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php break;
                            case( "light" ): ?>
                                <div class="<?php echo esc_attr($table_number); ?>">
                                    <div class="pricing__item pricing__item--featured pricing style1 <?php echo esc_attr($featured_or_not); ?>">
                                        <div class="pricing__deco">
                                            <svg class="pricing__deco-img" version="1.1" id="Layer_2" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="100px" viewBox="0 0 300 100" enable-background="new 0 0 300 100" xml:space="preserve">
                                                <path class="deco-layer deco-layer--1" opacity="0.6" fill="#FFFFFF" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" />
                                                <path class="deco-layer deco-layer--2" opacity="0.6" fill="#FFFFFF" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" />
                                                <path class="deco-layer deco-layer--3" opacity="0.7" fill="#FFFFFF" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" />
                                                <path class="deco-layer deco-layer--4" fill="#FFFFFF" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" />
                                            </svg>
                                            <div class="pricing__price">
                                                <?php if(!empty($currency)){ ?>
                                                    <span class="pricing__currency"><?php echo esc_html($currency); ?></span>
                                                <?php } ?>
                                                <?php echo esc_html($price);
                                                if(!empty($period)){ ?>
                                                    <span class="pricing__period">/ <?php echo esc_html($period); ?></span>
                                                <?php } ?>
                                            </div>
                                            <?php if(!empty($plan_name)){ ?>
                                                <h3 class="pricing__title"><?php echo esc_html($plan_name); ?></h3>
                                            <?php } ?>
                                        </div>
                                        <?php if(!empty($features)){ ?>
                                            <ul class="pricing__feature-list">
                                                <?php foreach($features as $feature){ ?>
                                                    <li class="pricing__feature"><?php echo esc_html($feature); ?></li>
                                                <?php } ?>
                                            </ul>
                                        <?php }
                                        if(!empty($button_link) && !empty($button_text)){ ?>
                                            <a href="<?php echo esc_url($button_link)?>" class="pricing__action"><?php echo esc_html($button_text); ?></a>
                                        <?php } ?>

                                    </div>
                                </div>
                            <?php break;
                            case("image"): ?>
                                <div class="<?php echo esc_attr($table_number); ?>">
                                    <div class="pricing__item style3">
                                        <?php if(!empty($pricing_image_url)): ?>
                                            <div class="pricing-image">
                                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $pricing_image_url[0]; ?>" alt=""></a>
                                            </div>
                                        <?php endif; ?>

                                        <?php if(!empty($plan_name)){ ?>
                                            <h3 class="pricing__title"><?php echo esc_html($plan_name); ?></h3>
                                        <?php } ?>
                                        <div class="pricing__price">
                                            <?php if(!empty($currency)){ ?>
                                                <span class="pricing__anim pricing__anim--1">
                                                    <span class="pricing__currency"><?php echo esc_html($currency); ?></span>
                                                </span>
                                            <?php } ?>
                                            <?php echo esc_html($price);
                                            if(!empty($period)){ ?>
                                                <span class="pricing__anim pricing__anim--2">
                                                    <span class="pricing__period">/ <?php echo esc_html($period); ?></span>
                                                </span>
                                            <?php } ?>
                                        </div>
                                        <?php if(!empty($features)){ ?>
                                            <ul class="pricing__feature-list">
                                                <?php foreach($features as $feature){ ?>
                                                    <li class="pricing__feature"><?php echo esc_html($feature); ?></li>
                                                <?php } ?>
                                            </ul>
                                        <?php }
                                        if(!empty($button_link) && !empty($button_text)){ ?>
                                            <a href="<?php echo esc_url($button_link)?>" class="pricing__action"><?php echo esc_html($button_text); ?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php break;
                        }
                    endwhile;
                    wp_reset_postdata();
                endif;
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}
