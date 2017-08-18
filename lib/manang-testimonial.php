<?php
add_action( 'testimonial_manang', 'manang_testimonial', 10, 5 );
function manang_testimonial($testimonial_style="",$skin="",$testimonial_count="",$show_as="",$testimonial_category=""){
    $testimonial_counts = (empty($testimonial_count)?-1:$testimonial_count);
    $skin_modern = ($testimonial_style == 'modern-style'?$skin:'');
    $show_as_condition = ($testimonial_style != 'modern-style'?$show_as:'');
    $tax_query = '';
    if($testimonial_category!=''){
        $tax_query[] =  array(
            'taxonomy' => 'manang_testimonial_category',
            'field' => 'term_id',
            'terms' => $testimonial_category,
        );
    }
    $testimonial_argument = array(
        'post_type'      => 'manang-testimonial',
        'post_status'    => 'publish',
        'oderby'         => 'menu_order date',
        'order'          => 'desc',
        'posts_per_page' => $testimonial_counts,
        'tax_query' => $tax_query,
        );
    $testimonial_query = new WP_Query($testimonial_argument);
    ob_start();
    if($testimonial_query->have_posts()): ?>
        <!-- Start of testimonial section -->
        <div class="testimonial-content text-center <?php echo esc_attr($testimonial_style .' '.$skin_modern.' '.$show_as_condition); ?>">
            <?php while($testimonial_query->have_posts()):
                $testimonial_query->the_post();
                $manang_basecamp_testimonial_designation = get_post_meta( get_the_id(), 'manang_basecamp_testimonial_designation', true );
                $testimonial_image =  wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
                $testimonial_image_url = $testimonial_image[0];
                switch($testimonial_style){
                    case('modern-style'): ?>
                        <div class="testimonial-slide">
                             <i class="ion-android-hangout"></i>
                            <div class="client-testimonial">
                                <p><?php echo manang_get_excerpt(get_the_id(),200); ?></p>
                            </div>
                            <h3 class="testimonial-title"><?php the_title(); ?>
                                <small class="post"><?php echo esc_html($manang_basecamp_testimonial_designation); ?></small>
                            </h3>
                        </div>
                    <?php break;
                    case('boxed-style'): ?>
                            <div class="testimonial-slide">
                                <div class="client-testimonial">
                                    <p><?php echo manang_get_excerpt(get_the_id(),200); ?></p>
                                </div>
                                <div class="client-img">
                                    <img src="<?php echo esc_url($testimonial_image_url); ?>" alt="">
                                    <i class="ion-android-hangout"></i>
                                </div>
                                <h3 class="testimonial-title"><?php the_title(); ?>
                                    <small class="post"><?php echo esc_html($manang_basecamp_testimonial_designation); ?></small>
                                </h3>
                            </div>
                    <?php break;
                     case('shadow-style'): ?>
                            <div class="testimonial-slide">
                                <div class="client-img">
                                    <img src="<?php echo esc_url($testimonial_image_url); ?>" alt="">
                                </div>
                                <div class="client-testimonial">
                                    <p><?php echo manang_get_excerpt(get_the_id(),200); ?></p>
                                </div>
                                <h3 class="testimonial-title"><?php the_title(); ?>
                                    <small class="post"><?php echo esc_html($manang_basecamp_testimonial_designation); ?></small>
                                </h3>
                            </div>
                    <?php break;
                    case('classic-style'): ?>
                            <div class="testimonial-slide">
                                <p class="description"><?php echo manang_get_excerpt(get_the_id(),200); ?></p>
                                <div class="pic">
                                    <img src="<?php echo esc_url($testimonial_image_url); ?>" alt="">
                                </div>
                                <h3 class="testimonial-title"><?php the_title('<span>','</span>'); ?>
                                    <small><?php echo esc_html($manang_basecamp_testimonial_designation); ?></small>
                                </h3>
                            </div>
                    <?php break;
                }
            endwhile;
             wp_reset_postdata();

            if($testimonial_style == 'modern-style'): ?>
                <div class="slider testimonial-img-wrap <?php echo esc_attr($testimonial_style); ?>">
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
        <?php endif; ?>
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