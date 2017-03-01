<?php
if(!function_exists('manang_features_query')){
    function manang_features_query($callout_category="",$number_post="",$service_title="",$service_description=""){
        ob_start();
        $tax_query = '';
        if($callout_category!=''){
            $tax_query[] =  array(
                'taxonomy' => 'feature_category',
                'field' => 'slug',
                'terms' => $callout_category,
            );
        }
        $features_argument = array(
                                    'post_type'      => 'feature',
                                    'posts_per_page' => $number_post,
                                    'orderby'        => 'menu_order date',
                                    'order'          => 'desc',
                                    'post_status'    => 'publish',
                                    'tax_query' => $tax_query,
                                    );

        $features_query = new WP_Query( $features_argument );
        // print_r($features_query);
        if($features_query->have_posts()){
         ?>
            <section class="section callout-sec">
                <div class="container">
                    <div class="section-title">
                        <h2><?php echo esc_html($service_title); ?></h2>
                        <p><?php echo esc_html($service_description);?></p>
                    </div>

                    <div class="callout-wrap">
                        <div class="row">
                            <?php
                            while($features_query->have_posts()){
                                $features_query->the_post();
                                $feature_icon_class = get_post_meta( get_the_id(), 'feature_icon_class', true ); ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="callout-item">
                                        <div class="callout-icon">
                                            <i class="<?php echo esc_html($feature_icon_class); ?>"></i>
                                        </div>
                                        <div class="callout-content">
                                            <?php the_title( '<h3>', '</h3>'); ?>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>

                            <?php }
                            wp_reset_postdata(); ?>


                        </div>
                    </div>
                </div>
            </section>
        <?php }
        echo  ob_get_clean();
    }
    add_action( 'manang_query_features', 'manang_features_query', 10, 4 );
}

if ( ! function_exists ( 'manang_features_shortcode' ) ) {
    function manang_features_shortcode( $atts=array()) {

        extract( shortcode_atts( array(
            'feature_title' => '',
            'feature_description' => '',
            'number_post'   => '',
            'column'        => '',
            'effects'       => '',
            'category'      => '',
        ), $atts ) );
        $customizer_options = manang_options();
        $feature_post_count = ( empty($number_post)?$customizer_options['feature_post_count']:$number_post );
        $service_parallax = $customizer_options['service_parallax'];
        $service_bg_image = $customizer_options['service_bg_image'];
        $feature_title = ( empty($feature_title)?$customizer_options['feature_title']:$feature_title );
        $feature_description = ( empty($feature_description)?$customizer_options['feature_description']:$feature_description );
        $id = ($service_parallax == '1' ? 'parallax' : 'noparallax');
        $callout_category = ( empty($category)?$customizer_options['callout_category']:$category );

        do_action( 'manang_query_features', $callout_category,$feature_post_count,$feature_title,$feature_description );
    }
    add_shortcode( 'manang_features', 'manang_features_shortcode' );
}