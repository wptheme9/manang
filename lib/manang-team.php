<?php
/**
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php
if ( ! function_exists ( 'manang_team_shortcode' ) ) {
    function manang_team_shortcode($atts=null) {
        extract( shortcode_atts( array(
            'block_title' => '',
            'block_desc' => '',
            'number_post'   => '',
            'layout'        => '',
        ), $atts ) );

        $customizer_options = manang_options();
        $team_post_count = ( empty($number_post)?$customizer_options['team_count']: $number_post );
        $team_argument = array(
            'post_type'      => 'team',
            'post_status'    => 'publish',
            'posts_per_page' => $team_post_count,
            'orderby'        => 'menu_order date',
            'order'          => 'desc',
        );
        $team_query = new WP_Query($team_argument);
        global $post;
        ob_start();
        if($team_query->have_posts()):
            $team_title = ( empty($block_title)?$customizer_options['team_title']:$block_title );
            $team_sub_title = ( empty($block_desc)?$customizer_options['team_sub_title']:$block_desc );
            ?>
            <!-- Start of portfolio section -->
            <section class="section team-sec">
                <div class="container">
                    <div class="section-title">
                        <h2><?php echo esc_html($team_title); ?></h2>
                        <p><?php echo esc_html($team_sub_title); ?></p>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <?php while($team_query->have_posts()):
                            $team_query->the_post();
                            $manang_basecamp_team_designation = get_post_meta(get_the_id(), 'manang_basecamp_team_designation', true);
                            $manang_basecamp_team_facebook = get_post_meta(get_the_id(), 'manang_basecamp_team_facebook', true);
                            $manang_basecamp_team_twitter = get_post_meta(get_the_id(), 'manang_basecamp_team_twitter', true);
                            $manang_basecamp_team_gmail = get_post_meta(get_the_id(), 'manang_basecamp_team_gmail', true);
                            $manang_basecamp_team_pinterest = get_post_meta(get_the_id(), 'manang_basecamp_team_pinterest', true);

                             ?>
                            <div class="col-md-3">
                                <div class="team-wrap">
                                    <div class="team-img">
                                        <img src="<?php echo get_template_directory_uri(). '/assets/img/team3.jpg' ?>">
                                        <div class="hover-bg">
                                            <ul class="team_social">
                                                <li><a href="<?php echo esc_url($manang_basecamp_team_facebook); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="<?php echo esc_url($manang_basecamp_team_twitter); ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="<?php echo esc_url($manang_basecamp_team_gmail); ?>" target="_blank" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="<?php echo esc_url($manang_basecamp_team_pinterest); ?>" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="team-desc">
                                        <?php the_title( '<h3>', '</h3>' ); ?>
                                        <span><?php echo esc_html($manang_basecamp_team_designation); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
        <?php
        endif;
        $output = ob_get_clean();
        return $output;
    }
    add_shortcode( 'manang_team', 'manang_team_shortcode' );
}
