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
                    __("Column Based", 'manang') => "column",
                    __("Slider Based", 'manang') => "slider",
                ) ,
                "type" => "dropdown",
            ) ,
            array(
                "param_name" => "columns",
                "heading" => __("Columns", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("2 Column", 'manang') => "2column",
                    __("3 Column", 'manang') => "3column",
                    __("4 Column", 'manang') => "4column",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "param_name" => "display_products",
                "heading" => __("Display Products", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("Recent Products", 'manang') => "recent_product",
                    __("Featured Products", 'manang') => "feat_product",
                    __("Best Selling Products", 'manang') => "best_selling_products",
                    __("Top rated Products", 'manang') => "top_rated_products",
                    __("Sale Products", 'manang') => "sale_products",
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
                            'display_type'      => 'column',
                            'columns'           => '2column',
                            'display_products'  => 'recent_product',
                            'number_products'   => '',
                            'rating_color'      => '',
                            'rem_color'         => '',
                            ),$atts);
               $display_type = $values['display_type'];
               $columns = $values['columns'];
               $display_products = $values['display_products'];
               $number_products = $values['number_products'];
               $rating_color = $values['rating_color'];
               $rem_color = $values['rem_color'];
                ob_start();
                    global $product, $woocommerce_loop, $woocommerce, $post;
                    $product_rating = '';

                    if( ! class_exists( 'WooCommerce' ) ) {
                        echo 'WooCommerce Plugin is not installed!';
                        return false;
                    }

                    wp_enqueue_script( 'wc-add-to-cart-variation' );

                    // $path = pathinfo(__FILE__) ['dirname'];

                    // include ($path . '/config.php');

                    // $id = Mk_Static_Files::shortcode_id();

                    do_action( 'woocommerce_before_single_product' );
                    //Default val
                    $display = 'recent';
                    $count = '-1';
                    $columns = 4;
                    $pagination = 'true';

                    //

                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    switch ($display) {
                        case 'recent':
                           $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $count,
                                'orderby'               => 'date',
                                'order'                 => 'desc',
                                'paged'                 => $paged,
                                'meta_query'            => WC()->query->get_meta_query(),
                            );
                            break;

                        case 'featured':
                            $meta_query   = WC()->query->get_meta_query();
                            $meta_query[] = array(
                                'key'   => '_featured',
                                'value' => 'yes'
                            );
                            $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $count,
                                'orderby'               => 'date',
                                'order'                 => 'desc',
                                'paged'                 => $paged,
                                'meta_query'            => $meta_query,
                            );
                            break;

                        case 'top_rated':
                            add_filter( 'posts_clauses',  array( WC()->query, 'order_by_rating_post_clauses' ) );
                           $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $count,
                                'orderby'               => $orderby,
                                'order'                 => $order,
                                'paged'                 => $paged,
                                'meta_query'            => WC()->query->get_meta_query(),
                            );
                            break;

                        case 'products_on_sale':
                           $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $count,
                                'orderby'               => $orderby,
                                'order'                 => $order,
                                'paged'                 => $paged,
                                'meta_query'            => WC()->query->get_meta_query(),
                                'post__in'                   => array_merge( array( 0 ), wc_get_product_ids_on_sale() ),
                            );
                            break;

                        case 'best_sellings':
                            $args = array(
                                'post_type'             => 'product',
                                'post_status'           => 'publish',
                                'ignore_sticky_posts'   => 1,
                                'posts_per_page'        => $count,
                                'orderby'               => 'meta_value_num',
                                'order'                 => $order,
                                'orderby'               => $orderby,
                                'paged'                 => $paged,
                                'meta_key'               => 'total_sales',
                                'meta_query'            => WC()->query->get_meta_query(),
                            );
                            break;
                    }

                            if(!empty($category)) {
                                $args['tax_query'] = array(
                                    array(
                                        'taxonomy'      => 'product_cat',
                                        'terms'         => array_map( 'sanitize_title', explode( ',', $category ) ),
                                        'field'         => 'slug',
                                    )
                                );
                            }

                    // if (isset($posts) && !empty($posts)) {
                    //     $args['post__in'] = explode(',', $posts);
                    // }

                    // $class[] = $layout.'-layout';
                    // $class[] = $layout.'mk--row';
                    // $class[] = $el_class;


                    /**
                     * Product Loop
                     * ==================================================================================*/
                    $query = new WP_Query( $args );
                    if($query->have_posts()): ?>
                        <div class="product-style2 product-grid product-column-based">



                        <?php while ( $query->have_posts() ) : $query->the_post();
                            global $product;

                            $product_id         = get_the_ID();
                            $cart_page =  do_shortcode('[add_to_cart_url id="'.$product_id.'"]');
                            $wishlist =  do_shortcode('[yith_wcwl_add_to_wishlist product_id="'.$product_id.'"]');

                            // $uid                = uniqid();
                            // $woocommerce_cat    = $mk_options['woocommerce_catalog'];
                            // $quality            = $mk_options['woo_image_quality'] ? $mk_options['woo_image_quality'] : 1;
                            // $grid_width         = $mk_options['grid_width'];
                            // $content_width      = $mk_options['content_width'];
                            // $height             = $mk_options['woo_loop_img_height'];
                            // $product_type       = $product->get_type();
                            $image_hover_src    = '';

                            // thumbnail
                            switch ($columns) {
                            case 4:
                                $column_class = 'mk--col--3-12';
                                // $image_width = round($grid_width/4) - 28;
                            break;
                            case 3:
                                $column_class = 'mk--col--4-12';
                                // $image_width = round($grid_width/3) - 33;
                            break;
                            case 2:
                                $column_class = 'mk--col--1-2';
                                // $image_width = round($grid_width/2) - 38;
                            break;

                            default:
                                $column_class = 'mk--col--1-2';
                                // $image_width = round($grid_width/2) - 38;
                            break;
                        }

                        if ( has_post_thumbnail() ) {
                            $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
                            $image_output_src = $image_src_array[0];
                        }

                            // $product_gallery = get_post_meta( $post->ID, '_product_image_gallery', true );

                            // if ( !empty( $product_gallery ) ) {
                            //     $gallery = explode( ',', $product_gallery );
                            //     $hover_image_id  = $gallery[0];

                            //     if($image_size == 'crop') {
                            //         $image_src_hover_array = wp_get_attachment_image_src($hover_image_id, 'full', true);
                            //         $image_hover_src = mk_image_generator($image_src_hover_array[0], $image_width*$quality, $height*$quality, 'true');
                            //     } else {
                            //         $image_src_hover_array = wp_get_attachment_image_src($hover_image_id, $image_size, true);
                            //         $image_hover_src = $image_src_hover_array[0];
                            //     }
                            // }
                        // }

                                echo wc_get_rating_html( $product->get_average_rating() );


                        // check product stock, add cart a tag url, add cart a tag label and add icon class
                        if ( ! $product->is_in_stock() ) {
                            // $link           = apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ));
                            $label              = apply_filters( 'out_of_stock_add_to_cart_text', __( 'READ MORE', 'mk_framework' ) );
                            $icon_class         = 'mk-moon-search-3';
                            $out_of_stock_badge = '<span class="mk-out-stock"><span>'.__( 'Out of Stock', 'mk_framework' ).'</span></span>';
                        }else {
                            $out_of_stock_badge = '';
                            switch ( $product->get_type() ) {
                                case "variable" :
                                    // $link       = apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
                                    $label          = apply_filters( 'variable_add_to_cart_text', __( 'Select Options', 'mk_framework' ) );
                                    $icon_class     = 'mk-icon-plus';
                                    break;
                                case "grouped" :
                                    // $link       = apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
                                    $label          = apply_filters( 'grouped_add_to_cart_text', __( 'View Options', 'mk_framework' ) );
                                    $icon_class     = 'mk-moon-search-3';
                                    break;
                                case "external" :
                                    // $link       = apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
                                    $label          = apply_filters( 'external_add_to_cart_text', __( 'Read More', 'mk_framework' ) );
                                    $icon_class     = 'mk-moon-search-3';
                                    break;
                                default :
                                    // $link       = apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
                                    $label          = apply_filters( 'add_to_cart_text', __( 'Add to Cart', 'mk_framework' ) );
                                    $icon_class     = 'mk-moon-cart-plus';
                                    break;
                                }
                        }

                        // check product on sale
                        if( $product->is_on_sale() ) {
                            $sale_badge = apply_filters('woocommerce_sale_flash', '<span class="mk-onsale"><span>'.__( 'Sale', 'mk_framework' ).'</span></span>', $post, $product);
                        }else {
                            $sale_badge = '';
                        }
                        // if($mk_options['woocommerce_loop_show_desc'] == 'true') {
                            $item_desc = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
                        // }else {
                            $item_desc = '';
                        // }


                            // echo mk_get_shortcode_view( 'mk_products',  'loop-styles/product-loop-' . $layout,  true,  $shortcodeViewAtts );

                            // $shortcodeViewAtts = array();
                        if ( has_post_thumbnail() ) {
                                $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                $image_output_src = $image_src_array[0];
                            }
                        ?>
                         <div class="grid-col-4 product-wrap">
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
                                        <span class="rating">
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
                        wp_reset_postdata();
                    endif;

                    ?>
                        </div>
                    </div>
                    <!-- </section>
                    </div> -->
                    <?php

                $output = ob_get_clean();
                return $output;
        }
    }
}