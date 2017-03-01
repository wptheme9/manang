<?php
if ( ! function_exists ( 'cpm_framework_custom_shortcode' ) ) {
    function cpm_framework_custom_shortcode($atts=array()){
        extract(shortcode_atts( array(
                'post'       => '',
                'post_count' => '',
                'title'      => '',
                'column'     => '',
                'class'      => '',
                ), $atts ));
        if(post_type_exists( $post )):
            $custom_arguments = array(
                'post_type'      => $post,
                'posts_per_page' => $post_count,
                'order'          => 'desc',
                'orderby'        => 'menu_order',);
            $custom_query = new WP_Query($custom_arguments);

            ob_start();
            if($custom_query->have_posts()): ?>

                <section class="shortcode-section <?php echo sanitize_html_class($class); ?>">
                    <?php if(!empty($title)):?>
                        <div class="section-heading"><h2><?php echo esc_html($title); ?></h2></div>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row">
                                <?php
                                $count = 1;
                                $column_class = 'col-md-4';
                                if($column == '2col'){
                                    $column_class = 'col-md-6';
                                }
                                elseif ($column == '3col') {
                                    $column_class = 'col-md-4';
                                }
                                elseif($column == '4col'){
                                    $column_class = 'col-md-3';
                                }
                                global $post;
                                $count = 1;
                                while($custom_query->have_posts()):
                                    $custom_query->the_post();
                                    $custom_post_image_id = get_post_thumbnail_id();
                                    $custom_post_image = wp_get_attachment_image_src( $custom_post_image_id,'cpm-framework-portfolio-image' );
                                    ?>
                                    <div class="<?php echo sanitize_html_class($column_class); ?> mob-margin-bot">
                                        <div class="shortcode-content-wrap">
                                            <?php if(!empty($custom_post_image)): ?>
                                                <div class="shortcode-image-wrapper"><img src="<?php echo $custom_post_image[0]; ?>">
                                                    <a href="<?php the_permalink(); ?>" class="link"><i class="fa fa-link"></i></a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="shortcode-content-title">
                                                <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                                            </div>

                                            <div class="shortcode-content">
                                                <p><?php echo wp_kses_post(cpm_framework_get_excerpt($post->ID,100)); ?></p>
                                            </div>

                                            <footer class="entry-footer">
                                            <?php
                                                    if ( 'post' === get_post_type() ) { ?>
                                                        <!-- /* translators: used between list items, there is a space after the comma */ -->
                                                            <?php
                                                            $categories_list = get_the_category_list( esc_html__( ' ', 'cpm-framework' ) );
                                                            if ( $categories_list && cpm_framework_categorized_blog() ) {
                                                                printf( '<span class="cat-links"><i class="fa fa-folder-open"></i>' . esc_html__( 'Posted in: %1$s', 'cpm-framework' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                                                            }
                                                            ?>

                                                    <?php
                                                    }
                                                    elseif('portfolio' === get_post_type() ){
                                                        $terms = get_the_terms($post->ID, 'portfolio_category' );
                                                        if ($terms && ! is_wp_error($terms)) :
                                                            foreach ($terms as $term) {
                                                                $url = get_term_link($term->slug, 'portfolio_category');

                                                                echo '<span class="cat-links"><a href="'.esc_url($url).'">'.$term->name.'</a></span>';
                                                            }

                                                        endif;
                                                    }
                                                    elseif('callout' === get_post_type() ){
                                                        $terms = get_the_terms($post->ID, 'callout_category' );
                                                        if ($terms && ! is_wp_error($terms)) :
                                                            foreach ($terms as $term) {
                                                                $url = get_term_link($term->slug, 'callout_category');

                                                                echo '<span class="cat-links"><a href="'.esc_url($url).'">'.$term->name.'</a></span>';
                                                            }

                                                        endif;
                                                    } ?>
                                             </footer><!-- .entry-footer -->
                                        </div>
                                    </div>



                                     <?php
                                    if($column_class=="col-md-4" && $count%3 ==0 && $count < $custom_query->post_count){
                                        echo '</div>';
                                        echo '<div class="row">';
                                    }
                                    elseif($column_class=="col-md-6" && $count%2==0 && $count < $custom_query->post_count){
                                        echo '</div>';
                                        echo '<div class="row">';
                                    }
                                    elseif ($column_class=="col-md-3" && $count%4==0 && $count < $custom_query->post_count) {
                                        echo '</div>';
                                        echo '<div class="row">';
                                    }
                                    $count++;
                                endwhile;
                                wp_reset_postdata(); ?>
                        </div>
                    </div>
                </section>
                <?php
            endif;
            $output = ob_get_clean();
            return $output;
        endif;
        }

    add_shortcode( 'custom', 'cpm_framework_custom_shortcode');
}

if(! function_exists ( 'cpm_framework_shortcode_wrap' ) ):
    function cpm_framework_shortcode_wrap($atts,$content=null){
                ob_start();
                ?>
                <section class="shortcode-wrapped">
                    <div class="container">
                        <?php echo do_shortcode($content); ?>
                    </div>
                </section>
                <?php
                $output = ob_get_clean();
                return $output;
        }
    add_shortcode( 'framework_shortcode_wrap', 'cpm_framework_shortcode_wrap' );
endif;