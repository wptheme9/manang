<?php
/**
 * Services
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_team_integrateWithVC' );
function manang_team_integrateWithVC(){
    if(!function_exists('manang_get_service_categories_select')):
        function manang_get_service_categories_select() {
            $manang_cat = get_terms( array(
                'taxonomy' => 'mg_service_category',
                'hide_empty' => false,
            ) );
            $results=array();
            $results['Select category'] = "";
            if(! empty( $manang_cat ) && ! is_wp_error( $manang_cat ) ):
                foreach ( $manang_cat as $term ) {
                    $results[$term->name] = $term->term_id;
                }
             endif;
            return $results;
        }
    endif;
    vc_map(array(
        "name" => __("Service", "manang") ,
        "base" => "manang_service_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Service Elements.', 'manang') ,
        "params" => array(
            array(
                "heading" => __("Service Layout", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "service_layout",
                "value" => array(
                    __("Boxed Layout", 'manang') => "boxed-layout",
                    __("Simple Hover Layout", 'manang') => "simple-hover",
                    __("Classic Hover Layout", 'manang') => "classic-hover",
                    __("Image Background Layout", 'manang') => "image-background",
                    __("Tabbed Layout", 'manang') => "tabbed-layout",
                ) ,
                "type" => "dropdown"
            ) ,
            array(
                "type" => "textfield",
                "heading" => __("Add Post Count", "manang") ,
                "param_name" => "count",
                "value" => __("", "manang") ,
                "description" => __("If left empty, all the posts are shown from Services.", "manang")
            ) ,

            array(
                "heading" => __("Choose Column", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "column",
                "value" => array(
                    __("Two Column", 'manang') => "grid-col-2",
                    __("Three Column", 'manang') => "grid-col-3",
                    __("Four Column", 'manang') => "grid-col-4",
                ) ,
                "type" => "dropdown"
            ) ,

             array(
                "type" => "dropdown",
                "heading" => __("Choose Category", "manang") ,
                "param_name" => "service_category",
                "description" => __("This option will display only the selected categories.", "manang") ,
                "value" => manang_get_service_categories_select(),
            ) ,
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_service_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'service_layout'        => 'boxed-layout',
                            'column'               => 'grid-col-2',
                            'count'                => '',
                            'service_category'        => '',
                            ),$atts);
               $service_layout = $values['service_layout'];
               $column = $values['column'];
               $count = $values['count'];
               $service_category = $values['service_category'];

               $team_post_count = (!empty($count)?$count:-1);
                $tax_query = '';
                if($service_category!=''){
                    $tax_query[] =  array(
                        'taxonomy' => 'service_category',
                        'field' => 'term_id',
                        'terms' => $service_category,
                    );
                }
                $team_argument = array(
                    'post_type'      => 'team',
                    'post_status'    => 'publish',
                    'posts_per_page' => $team_post_count,
                    'orderby'        => 'menu_order date',
                    'order'          => 'desc',
                    'tax_query' => $tax_query,
                );
                $team_query = new WP_Query($team_argument);
                ob_start();
                if($team_query->have_posts()):

                    while($team_query->have_posts()):
                        $team_query->the_post();
                        $manang_basecamp_team_designation = get_post_meta(get_the_id(), 'manang_basecamp_team_designation', true);
                        $manang_basecamp_team_facebook = get_post_meta(get_the_id(), 'manang_basecamp_team_facebook', true);
                        $manang_basecamp_team_twitter = get_post_meta(get_the_id(), 'manang_basecamp_team_twitter', true);
                        $manang_basecamp_team_gmail = get_post_meta(get_the_id(), 'manang_basecamp_team_gmail', true);
                        $manang_basecamp_team_pinterest = get_post_meta(get_the_id(), 'manang_basecamp_team_pinterest', true);
                        switch($service_layout){
                            case( "classic" ): ?>
                                <div class="<?php echo $column; ?>">
                                    <div class="team-wrap team-classic">
                                        <div class="our-team">
                                            <?php the_post_thumbnail('manang_team_basic'); ?>
                                            <div class="team-content">
                                                <?php the_title( '<h3 class="title">', '</h3>' ); ?>
                                                <span class="post"><?php echo esc_html($manang_basecamp_team_designation); ?></span>
                                                <ul class="social-links">
                                                    <li><a href="<?php echo esc_url($manang_basecamp_team_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="<?php echo esc_url($manang_basecamp_team_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="<?php echo esc_url($manang_basecamp_team_gmail); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="<?php echo esc_url($manang_basecamp_team_pinterest); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break;
                            case( "fancy" ): ?>
                                    <div class="<?php echo $column; ?>">
                                        <div class="team-wrap team-fancy">
                                            <div class="our-team">
                                                <div class="team_img">
                                                    <?php the_post_thumbnail('manang_team_basic'); ?>
                                                    <ul class="social">
                                                        <li><a href="<?php echo esc_url($manang_basecamp_team_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="<?php echo esc_url($manang_basecamp_team_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="<?php echo esc_url($manang_basecamp_team_gmail); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="<?php echo esc_url($manang_basecamp_team_pinterest); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="team-content">
                                                    <?php the_title( '<h3 class="title">', '</h3>' ); ?>
                                                    <span class="post"><?php echo esc_html($manang_basecamp_team_designation); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php break;
                            case( "rounded" ): ?>
                                 <div class="<?php echo $column; ?>">
                                    <div class="team-wrap team-round">
                                        <div class="our-team">
                                            <div class="pic">
                                                <?php the_post_thumbnail('manang_team_round'); ?>
                                                <a href="<?php the_permalink(); ?>" class="pic-bottom"></a>
                                            </div>
                                            <div class="team-prof">
                                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                <span class="post"><?php echo esc_html($manang_basecamp_team_designation); ?></span>
                                                <ul class="team_social">
                                                    <li><a href="<?php echo esc_url($manang_basecamp_team_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="<?php echo esc_url($manang_basecamp_team_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="<?php echo esc_url($manang_basecamp_team_gmail); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href="<?php echo esc_url($manang_basecamp_team_pinterest); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break;
                            case( "simple" ): ?>
                                    <div class="<?php echo $column; ?>">
                                        <div class="team-wrap team-classic">
                                            <div class="our-team">
                                                <?php the_post_thumbnail('manang_team_basic'); ?>
                                                <div class="team-content">
                                                    <?php the_title( '<h3 class="title">', '</h3>' ); ?>
                                                    <span class="post"><?php echo esc_html($manang_basecamp_team_designation); ?></span>
                                                    <ul class="social-links">
                                                        <li><a href="<?php echo esc_url($manang_basecamp_team_facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="<?php echo esc_url($manang_basecamp_team_twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="<?php echo esc_url($manang_basecamp_team_gmail); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="<?php echo esc_url($manang_basecamp_team_pinterest); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php break;
                        }
                        endwhile;
                    wp_reset_postdata();
                endif;
            $output = ob_get_clean();
            return $output;
            }
        }
    }
}
