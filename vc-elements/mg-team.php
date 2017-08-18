<?php
/**
 * Service
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_team_integrateWithVC' );
function manang_team_integrateWithVC(){
    if(!function_exists('manang_get_team_categories_select')):
        function manang_get_team_categories_select() {
            $manang_cat = get_terms( array(
                'taxonomy' => 'team_category',
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
        "name" => __("Team", "manang") ,
        "base" => "manang_team_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Team Elements.', 'manang') ,
        "params" => array(
            array(
                "heading" => __("Style Option", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "style",
                "value" => array(
                    __("Classic", 'manang') => "classic",
                    __("Fancy", 'manang') => "fancy",
                    __("Simple", 'manang') => "simple",
                    __("Rounded", 'manang') => "rounded",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Choose Column", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "column",
                "value" => array(
                    __("Two Column", 'manang') => "col-md-6",
                    __("Three Column", 'manang') => "col-md-4",
                    __("Four Column", 'manang') => "col-md-3",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Add Post Count", "manang") ,
                "param_name" => "count",
                "value" => __("", "manang") ,
                "description" => __("If left empty, all the posts are shown from team.", "manang")
            ) ,
             array(
                "type" => "dropdown",
                "heading" => __("Choose Category", "manang") ,
                "param_name" => "team_category",
                "description" => __("This option will display only the selected categories.", "manang") ,
                "value" => manang_get_team_categories_select(),
            ) ,
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_team_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'style'                => '',
                            'column'               => 'col-md-4',
                            'count'                => '',
                            'team_category'        => '',
                            ),$atts);
               $style = $values['style'];
               $column = $values['column'];
               $count = $values['count'];
               $team_category = $values['team_category'];

               $team_post_count = (!empty($count)?$count:-1);
                $tax_query = '';
                if($team_category!=''){
                    $tax_query[] =  array(
                        'taxonomy' => 'team_category',
                        'field' => 'term_id',
                        'terms' => $team_category,
                    );
                }
                $team_argument = array(
                    'post_type'      => 'manang-team',
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
                        switch($style){
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
