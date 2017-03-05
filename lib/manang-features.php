<?php
if(!function_exists('manang_features_query')){
    function manang_features_query($feature_category="",$number_post="-1",$feature_title="",$feature_description="",$feature_effects=""){
        ob_start();
        $tax_query = '';
        if($feature_category!=''){
            $tax_query[] =  array(
                'taxonomy' => 'feature_category',
                'field' => 'slug',
                'terms' => $feature_category,
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
            <section id="service" class="section callout-sec">
                <div class="container">
                    <div class="section-title">
                        <h2><?php echo esc_html($feature_title); ?></h2>
                        <p><?php echo esc_html($feature_description);?></p>
                    </div>
                    <?php $icon_left = ($feature_effects == 'feature4'?'icon-left':''); ?>
                    <div class="callout-wrap <?php echo $icon_left; ?>" >
                        <div class="row">
                            <?php
                            $count=1;
                            while($features_query->have_posts()){
                                $features_query->the_post();
                                $feature_icon_class = get_post_meta( get_the_id(), 'feature_icon_class', true );
                                get_template_part('template-parts/features/'.$feature_effects);
                                if( $count%3 == 0 && $count<$features_query->post_count) {
                                    echo '</div>';
                                    echo '<div class="row">';
                                }
                            }
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
        echo  ob_get_clean();
    }
    add_action( 'manang_query_features', 'manang_features_query', 10, 5 );
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
        $feature_parallax = $customizer_options['feature_parallax'];
        $feature_bg_image = $customizer_options['feature_bg_image'];
        $feature_title = ( empty($feature_title)?$customizer_options['feature_title']:$feature_title );
        $feature_description = ( empty($feature_description)?$customizer_options['feature_description']:$feature_description );
        $feature_category = ( empty($category)?$customizer_options['feature_category']:$category );
        $feature_effects = ( empty($effects)?$customizer_options['feature_effects']:$effects);

        do_action( 'manang_query_features', $feature_category,$feature_post_count,$feature_title,$feature_description,$feature_effects );
    }
    add_shortcode( 'manang_features', 'manang_features_shortcode' );
}