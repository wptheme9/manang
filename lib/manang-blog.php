<?php
/**
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php
if ( ! function_exists ( 'manang_latest_blog_shortcode' ) ) {
    function manang_latest_blog_shortcode($atts=array()){
        $shortcode_attributes = shortcode_atts( array(
            'title'        => '',
            'blog_description' => '',
            'number_posts' => '',
            'slide'        => '',
            'column'       => '',
            'effects'      => '',
            'meta'         => '',
            'author_image' => '',
            ), $atts );

        $customizer_options = manang_options();
        $blog_title = ( empty($shortcode_attributes['title'])?$customizer_options['blog_title']:$shortcode_attributes['title'] );
        $blog_sub_title = ( empty($shortcode_attributes['blog_description'])?$customizer_options['blog_sub_title']:$shortcode_attributes['blog_description'] );
        $blog_post_count = ( empty($shortcode_attributes['number_posts'])?$customizer_options['blog_post_count']:$shortcode_attributes['number_posts'] );
        $blog_meta = ( empty($blog_meta_shortcode)?$customizer_options['blog_meta']:$blog_meta_shortcode );



        /* Get all sticky posts */
        $sticky = get_option( 'sticky_posts' );
        $sticky = array_slice( $sticky, 0 );
        if(!empty($sticky)){
            $sticky_count = count($sticky);
            if(!empty($sticky_count) && $sticky_count>$blog_post_count):
                $blog_post_count =  0;
            elseif (!empty($sticky_count) && $blog_post_count>$sticky_count):
                $blog_post_count = $blog_post_count - $sticky_count;
            endif;
        }
        $blog_argument = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $blog_post_count,
            'orderby'       => 'menu_order date',
            'order'          => 'desc',
            );
        $blog_query = new WP_Query($blog_argument);
        ob_start();
        if ($blog_query->have_posts() ) :
            $blog_bg_image = $customizer_options['blog_bg_image'];
            $blog_parallax = $customizer_options['blog_parallax'];
            $id = ($blog_parallax == '1' ? 'parallax' : 'noparallax');
            $one_page_id = (is_page_template( 'page-templates/template-one-page.php' )?'framework-blog':''); ?>
            <!-- Start the  Blog section-->
            <section class="section blog-sec">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6 pad5px">
                            <div class="section-title">
                                <h2><?php echo esc_html($blog_title); ?></h2>
                                <p><?php echo esc_html($blog_sub_title); ?></p>
                                <a class="btn btn-default"><?php esc_html_e( 'View All Posts', 'manang' ); ?></a>
                            </div>
                        </div>
                        <?php
                            $count = 1;
                            /* Start the Loop */
                            while ( $blog_query->have_posts() ) :
                                $blog_query->the_post();
                                if($count%3 == 0){
                                    $div_class = 'col-md-6';
                                }else{
                                    $div_class = 'col-md-3';
                                } ?>
                                <div class="<?php echo esc_attr($div_class); ?> pad5px">
                                    <div class="blog-wrap blog<?php echo esc_attr($count); ?>">
                                        <div class="blog-date">
                                            <span class="day"><?php echo get_the_date('d');  ?></span>
                                            <span class="month"><?php echo get_the_date('M');  ?></span>
                                        </div>
                                        <?php the_title( '<h2>', '</h2>' ); ?>
                                        <p><?php the_excerpt(); ?></p>

                                        <div class="blog-footer">
                                            <div class="author">
                                                <i class="fa fa-user"></i><span><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><?php the_author(); ?></a></span>
                                            </div>
                                            <div class="author">
                                                <i class="fa fa-comments-o"></i><span><?php comments_popup_link( '0', '1', '%', '', '-' ); ?></span>
                                            </div>
                                            <a class="know-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'manang' ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php if( ($count-2)%3==0  && $count<$blog_query->post_count) {
                                        echo '</div>';
                                        echo '<div class="row">';
                                }
                                $count++;
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
             <!-- End the  Blog section-->
             <?php
        endif;
        $output = ob_get_clean();
        return $output;
    }
    add_shortcode( 'manang_blog', 'manang_latest_blog_shortcode');
}