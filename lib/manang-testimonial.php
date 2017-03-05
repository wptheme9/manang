<?php
add_action( 'testimonial_manang', 'manang_testimonial', 10, 5 );
function manang_testimonial($testimonial_title="",$testimonial_description="",$testimonial_count="",$testimonial_bg_color="",$testimonial_bg_image=""){
    if(empty($testimonial_count)){
        $testimonial_count = -1;
    }
    $testimonial_argument = array(
        'post_type'      => 'testimonial',
        'post_status'    => 'publish',
        'oderby'         => 'menu_order date',
        'order'          => 'desc',
        'posts_per_page' => $testimonial_count,
        );
    $testimonial_query = new WP_Query($testimonial_argument);
    ob_start();
    if($testimonial_query->have_posts()): ?>
        <!-- Start of testimonial section -->
        <section id="testimonial" class="section testimonial-sec">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2><?php echo esc_html($testimonial_title); ?></h2>
                        <p><?php echo esc_html($testimonial_description); ?></p>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="slider testimonial-content text-center" data-aos="fade-up">
                            <?php while($testimonial_query->have_posts()):
                                $testimonial_query->the_post();
                                $manang_basecamp_testimonial_designation = get_post_meta( get_the_id(), 'manang_basecamp_testimonial_designation', true ); ?>
                                    <div class="testimonial-slide">
                                         <i class="ion-android-hangout"></i>
                                        <div class="client-testimonial">
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                        <h3 class="testimonial-title"><?php the_title(); ?>
                                            <small class="post"><?php echo esc_html($manang_basecamp_testimonial_designation); ?></small>
                                        </h3>
                                    </div>
                            <?php wp_reset_postdata();
                            endwhile; ?>
                        </div>

                        <div class="slider testimonial-img-wrap" data-aos="fade-up">
                             <?php while($testimonial_query->have_posts()):
                                $testimonial_query->the_post();
                                    $testimonial_image =  wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
                                    $testimonial_image_url = $testimonial_image[0]; ?>
                                    <div class="client-img">
                                        <img src="<?php echo esc_url($testimonial_image_url); ?>" alt="">
                                    </div>
                            <?php wp_reset_postdata();
                            endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end of testimonial section -->
    <?php
    endif;
    $output = ob_get_clean();
    echo  $output;
}

if ( ! function_exists ( 'manang_testimonial_shortcode' ) ) {
    function manang_testimonial_shortcode($atts=array()){
        extract(shortcode_atts( array(
                'title' => '',
                'content' => '',
                'testimonial_count' => '',
                'testimonial_bg_color' => '',
                'testimonial_bg_image'  => '',
                ), $atts ));
        $customizer_options = manang_options();
        $testimonial_title           = (!empty($title)?$title:$customizer_options['testimonial_title']);
        $testimonial_description     = (!empty($content)?$content:$customizer_options['testimonial_description']);
        $testimonial_count  = (!empty($testimonial_count)?$testimonial_count:$customizer_options['testimonial_count']);
        $testimonial_bg_color = (!empty($testimonial_bg_color)?$testimonial_bg_color:$customizer_options['testimonial_bg_color']);
        $testimonial_bg_image = (!empty($testimonial_bg_image)?$testimonial_bg_image:$customizer_options['testimonial_bg_image']);
        do_action( 'testimonial_manang', $testimonial_title,$testimonial_description,$testimonial_count,$testimonial_bg_color,$testimonial_bg_image );
    }
    add_shortcode( 'testimonial_manang_shortcode', 'manang_testimonial_shortcode' );
}