<?php
/**
 * Latest Post
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_latest_post_integrateWithVC' );
function manang_latest_post_integrateWithVC(){
    vc_map(array(
        "name" => __("Latest Post", "manang") ,
        "base" => "manang_latest_post_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Latest Post Elements.', 'manang') ,
        "params" => array(
             array(
                "heading" => __("Post Layout", 'manang') ,
                "param_name" => "post_layout",
                "value" => array(
                    __("Simple", 'manang') => "style1",
                    __("Classic", 'manang') => "style2",
                    __("Modern", 'manang') => "style3",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Display Type", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "display_type",
                "value" => array(
                    __("Column", 'manang') => "blog-post-column",
                    __("Slider", 'manang') => "blog-post-slider"
                ) ,
                "type" => "dropdown",
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("No of Posts to Show", "manang") ,
                "param_name" => "number_post",
                "value" => "",
            ) ,

            array(
                "type" => "checkbox",
                "heading" => __("Use Boxshadow?", "manang") ,
                "param_name" => "box_shadow",
                "value" => "",
            ) ,


        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_latest_post_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'post_layout'          => 'style1',
                            'display_type'   => 'blog-post-column',
                            'number_post'    => '',
                            'box_shadow' => '',
                            ),$atts);
               $post_layout = $values['post_layout'];
               $display_type = $values['display_type'];
               $number_post = (empty($values['number_post'])?-1:$values['number_post']);
               $box_shadow = $values['box_shadow'];

               $latest_post_argument = array(
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'posts_per_page' => $number_post,
                    'orderby'        => 'menu_order date',
                    'order'          => 'desc',
                );
                $latest_post_query = new WP_Query($latest_post_argument);

                ob_start();
                if($latest_post_query->have_posts()):
                    if($display_type == 'blog-post-column'){
                        echo '<div class="blog-post-column">';
                    }
                    else{
                        echo '<div class="blog-post-slider">';

                    }
                        $box_shadow_checked = ($box_shadow == 'true'?'box-shadow':'');
                        while($latest_post_query->have_posts()):
                            $latest_post_query->the_post();

                            $latest_post_image_id = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>

                            <div class="blog-wrap <?php echo esc_attr($post_layout .' '.$box_shadow_checked); ?>">
                                <?php
                                switch($post_layout){
                                    case( "style1" ): ?>
                                            <div class="blog-img">
                                                <img src="<?php echo esc_url($latest_post_image_id[0]); ?>" alt="">
                                            </div>
                                            <div class="blog-meta">
                                                <div class="date">
                                                    <i class="fa fa-calendar"></i><span><?php echo get_the_date('M d, Y');  ?></span>
                                                </div>
                                                <div class="author">
                                                    <i class="fa fa-user"></i><span><?php the_author(); ?></span>
                                                </div>
                                                <div class="author">
                                                    <i class="fa fa-comments-o"></i><span><?php comments_popup_link( '0', '1', '%', '', '-' ); ?></span>
                                                </div>
                                            </div>
                                            <?php the_title( '<h2>', '</h2>' ); ?>
                                            <p><?php echo manang_get_excerpt(get_the_id(),200); ?></p>
                                            <a href="<?php the_permalink() ?>" class="btn btn-default"><?php esc_html_e( 'Read More', 'manang' ); ?></a>
                                    <?php break;
                                    case( "style2" ): ?>
                                            <img src="<?php echo esc_url($latest_post_image_id[0]); ?>" alt="">
                                            <div class="post-review">
                                                <div class="post-date">
                                                    <?php echo get_the_date('d');  ?><small><?php echo get_the_date('M');  ?></small>
                                                </div>
                                                <h3 class="post-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h3>
                                                <ul class="post-comment">
                                                    <li><?php echo __( 'By ', 'manang' );
                                                    the_author();
                                                    comments_popup_link( '0', '1', '%', '', '-' ); ?></li>
                                                </ul>
                                            </div>
                                             <p><?php echo manang_get_excerpt(get_the_id(),200); ?></p>
                                            <a href="<?php the_permalink(); ?>" class="btn btn-default"><?php esc_html_e( 'Read More', 'manang' ); ?></a>
                                    <?php break;
                                    case( "style3" ): ?>
                                         <div class="blog-image">
                                            <img src="<?php echo esc_url($latest_post_image_id[0]); ?>" alt="">
                                            <div class="blog-date">
                                                <span class="tags">fashion</span>
                                            </div>
                                        </div>

                                        <div class="blog-footer">
                                            <?php the_title( '<h2>', '</h2>' ); ?>
                                            <div class="author">
                                                <i class="fa fa-user"></i><span><?php the_author(); ?></span>
                                            </div>
                                            <div class="author">
                                                <i class="fa fa-comments-o"></i><span><?php comments_popup_link( '0', '1', '%', '', '-' ); ?></span>
                                            </div>
                                            <a class="know-more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'manang' ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    <?php break;
                                    }
                            echo '</div>';
                            endwhile;
                        echo '</div>';
                    wp_reset_postdata();
                endif;
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}
