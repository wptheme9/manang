<?php
    if ( ! function_exists ( 'manang_counter_shortcode' ) ) {
    function manang_counter_shortcode($atts=array()){

        extract( shortcode_atts( array(
            'number_post'   => '',
            'animation'   => '',
            'layout'        => '',
        ), $atts ) );

        $customizer_options = manang_options();
        $skills_post_count = ( empty($number_post)?$customizer_options['skills_post_count']:$number_post );
        $skills_layout = ( empty($layout)?$customizer_options['skills_layout']:$layout );
        $skills_arg = array(
            'post_type'      => 'manang-counter',
            'posts_per_page' => $skills_post_count,
            'post_status'    => 'publish',
            'orderby'        => 'menu_order date',
            'order'          => 'desc',
            );
        $skills_query = new WP_Query($skills_arg);
        ob_start();
        if($skills_query->have_posts()):
            $skills_bg_image = $customizer_options['skills_bg_image'];
            $skills_parallax = $customizer_options['skills_parallax'];
            ?>
            <div class="counter-sec section">
                <div class="container">
                    <div class="row">
                        <div class="counter-wrap">
                        <?php   while($skills_query->have_posts()):
                                    $skills_query->the_post();
                                    $counter_icon_class = get_post_meta( get_the_id(), 'counter_icon_class', true );
                                    $counter_number = get_post_meta( get_the_id(), 'counter_number', true );
                                    $counter_text = get_post_meta( get_the_id(), 'counter_text', true ); ?>
                                     <div class="col-md-3">
                                        <i class="<?php echo esc_attr($counter_icon_class); ?>"></i>
                                        <h3 class="timer" data-from="0" data-to="<?php echo esc_html($counter_number); ?>" data-speed="2000" data-refresh-interval="50"></h3>
                                        <div class="counter-info">
                                            <span><?php echo esc_html($counter_text); ?></span>
                                        </div>
                                    </div>
                                <?php endwhile;
                                wp_reset_postdata(); ?>


                        </div>
                    </div>
                </div>
            </div>


        <?php endif;
        $output = ob_get_clean();
        return $output;
    }
    add_shortcode( 'manang_counter', 'manang_counter_shortcode' );
}