<?php
if ( ! function_exists ( 'manang_clients_shortcode' ) ) {
    function manang_clients_shortcode($atts=array()){
            extract(shortcode_atts( array(
                'number_post' => '',
                'slide' => '',
                'effect' => '',
                ), $atts ));
            $customizer_options = manang_options();
            $client_effect = ( empty($effect)?$customizer_options['client_hover_effect']:$effect );
            $client_count = ( empty($number_post)?$customizer_options['client_count']:$number_post );
            $client_slide_option = ( empty($slide)?$customizer_options['client_slide_option']:$slide);
            $client_title = ( empty($title)?$customizer_options['client_title']:$title );
            $client_argument = array(
                'post_type'      => 'manang-clients',
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          =>  'desc',
                'posts_per_page' => $client_count,
                );
            $client_query = new WP_Query($client_argument);
            ob_start();
            if($client_query->have_posts()):
                $client_bg_image = $customizer_options['client_bg_image']; ?>
                <section class="section client-sec">
                    <div class="container">
                        <div class="row">
                            <div class="client-slider">
                                <?php  while($client_query->have_posts()):
                                            $client_query->the_post();

                                            $client_website = get_post_meta( get_the_id(), 'client_website', true );
                                            $manang_basecamp_clients_link = get_post_meta( get_the_id(), 'manang_basecamp_clients_link', true );
                                            $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
                                            $url = $image_src[0]; ?>
                                            <div class="item">
                                                <div class="client-image-wrapper">
                                                    <a target="_blank" href="<?php echo esc_url($manang_basecamp_clients_link); ?>"><img src="<?php echo $url; ?>" alt=""></a>
                                                </div>
                                            </div> <?php
                                        endwhile;
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
    add_shortcode( 'manang_client', 'manang_clients_shortcode' );
}