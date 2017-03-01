<?php if ( ! function_exists ( 'manang_testimonial_shortcode' ) ) {
    function manang_testimonial_shortcode($atts=null){
        extract(shortcode_atts( array(
                'title' => '',
                'number_post'  => '',
                'item'    => '',
                'layout'       => '',
                ), $atts )
        );
        $shortcode_attributes = shortcode_atts( array(
            'title'        => '',
            'number_post' => '',
            'item'         => '',
            'layout' => '',
            ), $atts );
        $customizer_options = manang_options();
        $testimonial_item = ( empty($shortcode_attributes['item'])?$customizer_options['testimonial_item']:$shortcode_attributes['item'] );
        $testimonial_layout = ( empty($shortcode_attributes['layout'])?$customizer_options['testimonial_layout']:$shortcode_attributes['layout'] );
        $testimonial_count  = ( empty($shortcode_attributes['number_post'])?$customizer_options['testimonial_count']:$shortcode_attributes['number_post'] );
        $testimonial_title = ( empty($shortcode_attributes['title'])?$customizer_options['testimonial_title']:$shortcode_attributes['title'] );
        $testimonial_bg_image = $customizer_options['testimonial_bg_image'];
        $testimonial_parallax = $customizer_options['testimonial_parallax'];
        $id = ($testimonial_parallax == '1' ? 'parallax' : 'noparallax');
        $testimonial_argument = array(
            'post_type'      => 'testimonial',
            'post_status'    => 'publish',
            'oderby'         => 'menu_order date',
            'order'          => 'desc',
            'posts_per_page' => $testimonial_count,
            );
        $testimonial_query = new WP_Query($testimonial_argument);
        global $post;
        ob_start();
        if($testimonial_query->have_posts()): ?>
            <section class="section testimonial-sec" style="background-image:url(<?php echo (!empty($testimonial_bg_image)?esc_url($testimonial_bg_image):'')?>)">
                <div class="container">
                    <div class="row">
                        <div class="testimonial-wrap">
                            <?php while($testimonial_query->have_posts()):
                                $testimonial_query->the_post();
                                $manang_basecamp_testimonial_designation = get_post_meta( $post->ID, 'manang_basecamp_testimonial_designation', true ); ?>
                                <div class="item">
                                    <div class="testimonial">
                                        <div class="pic">
                                            <img src="<?php echo get_template_directory_uri() . '/assets/img/client.png' ?>" alt="">
                                        </div>
                                        <div class="testimonial-content">
                                            <p class="description"><?php the_excerpt(); ?></p>
                                            <h3 class="testimonial-title"><?php the_title(); ?>
                                                <small class="post"><?php echo esc_html($manang_basecamp_testimonial_designation); ?></small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endif;
        $output = ob_get_clean();
        return $output;
    }
    add_shortcode( 'manang_testimonial', 'manang_testimonial_shortcode' );
}