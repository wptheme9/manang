<?php
/**
 * Product
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php

add_action( 'vc_before_init', 'manang_products_integrateWithVC' );
function manang_products_integrateWithVC(){
    vc_map(array(
        "name" => __("Product", "manang") ,
        "base" => "manang_products",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('', 'manang') ,
        "params" => array(
            array(
                "param_name" => "display_type",
                "heading" => __("Display Type", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("Column Based", 'manang') => "product-grid product-column-based",
                    __("Slider Based", 'manang') => "product-slider-based",
                ) ,
                "type" => "dropdown",
            ) ,
            array(
                "param_name" => "columns",
                "heading" => __("Columns", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("2 Column", 'manang') => "grid-col-2",
                    __("3 Column", 'manang') => "grid-col-3",
                    __("4 Column", 'manang') => "grid-col-4",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "param_name" => "display_products",
                "heading" => __("Display Products", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("Recent Products", 'manang') => "recent_product",
                    __("Featured Products", 'manang') => "featured",
                    __("Best Selling Products", 'manang') => "best_sellings",
                    __("Top rated Products", 'manang') => "top_rated",
                    __("Sale Products", 'manang') => "products_on_sale",
                ) ,
                "type" => "dropdown"
            ) ,
            array(
                "param_name" => "number_products",
                "type" => "textfield",
                "holder" => "div",
                "heading" => __("Number Of Posts", "manang") ,
                "value" => __("", "manang") ,
            ) ,
            array(
                "type" => "colorpicker",
                "heading" => __("Product Rating Color", "manang") ,
                "param_name" => "rating_color",
                "value" => "",
                "description" => __("", "manang")
            ) ,
            array(
                "type" => "checkbox",
                "heading" => __("Remove Color On Hover?", "manang") ,
                "param_name" => "rem_color",
                "value" => "",
            ) ,
        ),
    ));
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_manang_products extends WPBakeryShortCode {

        protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'display_type'      => 'product-grid product-column-based',
                            'columns'           => 'grid-col-2',
                            'display_products'  => 'recent_product',
                            'number_products'   => '-1',
                            'rating_color'      => '',
                            'rem_color'         => '',
                            ),$atts);
               $display_type = $values['display_type'];
               $columns = $values['columns'];
               $display_products = $values['display_products'];
               $number_products = $values['number_products'];
               $rating_color = $values['rating_color'];
               $rem_color = ($values['rem_color']=='true'?'product-no-hover':'');
               $columns_chk = ($display_type=='product-slider-based'?'':$columns);
                ob_start();
                    global $product, $woocommerce_loop, $woocommerce, $post;
                    $product_rating = '';

                    if( ! class_exists( 'WooCommerce' ) ) {
                        echo 'WooCommerce Plugin is not installed!';
                        return false;
                    }
                    wp_enqueue_script( 'wc-add-to-cart-variation' );

                    do_action( 'woocommerce_before_single_product' );
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    switch ($display_products) {
                        case 'recent_product':
                           $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $number_products,
                                'orderby'               => 'date',
                                'order'                 => 'desc',
                                'paged'                 => $paged,
                                'meta_query'            => WC()->query->get_meta_query(),
                            );
                            break;

                        case 'featured':
                            // $meta_query   = WC()->query->get_meta_query();
                            $meta_query[] = array(
                                'key'   => '_featured',
                                'value' => 'yes'
                            );
                            $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $number_products,
                                'orderby'               => 'date',
                                'order'                 => 'desc',
                                'paged'                 => $paged,
                                'meta_query'            => $meta_query,
                            );
                            break;
                        case 'top_rated':
                            // add_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
                           $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $number_products,
                                'orderby'               => 'date',
                                'order'                 => 'desc',
                                'paged'                 => $paged,
                                'meta_query'            => WC()->query->get_meta_query(),
                            );
                            break;
                        case 'products_on_sale':
                           $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $number_products,
                                'orderby'               => 'date',
                                'order'                 => 'desc',
                                'paged'                 => $paged,
                                // 'meta_query'            => WC()->query->get_meta_query(),
                                'post__in'                   => array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
                            );
                            break;
                        case 'best_sellings':
                            $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $number_products,
                                'orderby'               => 'meta_value_num',
                                'orderby'               => 'date',
                                'order'                 => 'desc',
                                'paged'                 => $paged,
                                'meta_key'               => 'total_sales',
                                'meta_query'            => WC()->query->get_meta_query(),
                            );
                            break;
                    }

                    /**
                     * Product Loop
                     * ==================================================================================*/
                    $query = new WP_Query( $args );
                    if($query->have_posts()): ?>
                        <div class="product-style2 <?php echo esc_attr($display_type); ?>">
                            <?php while ( $query->have_posts() ) : $query->the_post();
                                global $product;
                                $product_id         = get_the_ID();
                                $cart_page =  do_shortcode('[add_to_cart_url id="'.$product_id.'"]');
                                $wishlist =  do_shortcode('[yith_wcwl_add_to_wishlist product_id="'.$product_id.'"]');

                                if ( has_post_thumbnail() ) {
                                    $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                                    $image_output_src = $image_src_array[0];
                                }

                                // check product on sale
                                if( $product->is_on_sale() ) {
                                    $sale_badge = apply_filters('woocommerce_sale_flash', '<span class="mk-onsale"><span>'.__( 'Sale', 'mk_framework' ).'</span></span>', $post, $product);
                                }else {
                                    $sale_badge = '';
                                }
                                if ( has_post_thumbnail() ) {
                                        $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                        $image_output_src = $image_src_array[0];
                                    }
                                ?>
                                 <div class="<?php echo esc_attr($columns_chk); ?> product-wrap">
                                    <div class="product-top">
                                        <?php  if ( has_post_thumbnail() ) { ?>
                                        <img src="<?php echo esc_url($image_output_src); ?>" alt="">
                                        <?php } ?>

                                        <div class="product-icons">
                                            <!-- <a class="wishlist fa fa-heart-o" data-toggle="tooltip" title="Add To Wishlist"></a> -->
                                            <?php echo $wishlist; ?>
                                            <a href="<?php echo $cart_page; ?>" class="add-to-cart" data-toggle="tooltip" title="Add To Cart" aria-hidden="true">Add to Cart</a>
                                            <a class="quick-view fa fa-search" data-toggle="tooltip" title="Quick View"></a>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-desc">
                                            <h3><?php the_title(); ?></h3>
                                            <span class="rating <?php echo esc_attr($rem_color); ?>">
                                              <i class="fa fa-star"></i>
                                              <i class="fa fa-star"></i>
                                              <i class="fa fa-star"></i>
                                              <i class="fa fa-star"></i>
                                              <i class="fa fa-star"></i>
                                            </span>
                                            <?php
                                                echo wc_get_rating_html( $product->get_average_rating() );
                                            ?>
                                            <div class="price">
                                                <span><?php echo $product->get_price_html(); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    <?php endif; ?>
                    <!-- </section>
                    </div> -->
                    <?php

                $output = ob_get_clean();
                return $output;
        }
    }
}