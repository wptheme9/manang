<?php
/**
 * Portfolio
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_portfolio_integrateWithVC' );
function manang_portfolio_integrateWithVC(){
    vc_map(array(
        "name" => __("Portfolio", "manang") ,
        "base" => "manang_portfolio_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Portfolio Elements.', 'manang') ,
        "params" => array(
            array(
                "heading" => __("Portfolio Style", 'manang') ,
                "description" => __("", 'manang') ,
                "param_name" => "portfolio_style",
                "value" => array(
                    __("Grid", 'manang') => "portfolio-grid",
                    __("Masonry", 'manang') => "portfolio-masonry",
                    __("Slider", 'manang') => "portfolio-slider",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Portfolio Hover Effects", 'manang') ,
                "param_name" => "hover_effects",
                "value" => array(
                    __("Classic", 'manang') => "portfolio-classic",
                    __("Modern", 'manang') => "portfolio-modern",
                    __("Simple", 'manang') => "portfolio-simple",
                ) ,
                "type" => "dropdown"
            ) ,

             array(
                "heading" => __("Number Of Columns", 'manang') ,
                "param_name" => "column_numbers",
                "value" => array(
                    __("2 Column", 'manang') => "grid-col-2",
                    __("3 Column", 'manang') => "grid-col-3",
                    __("4 Column", 'manang') => "grid-col-4",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "type" => "checkbox",
                "heading" => __("Show Permalink?", "manang") ,
                "param_name" => "show_permalink",
                "value" => __("", "manang") ,
            ) ,

            array(
                "type" => "checkbox",
                "heading" => __("Show Zoom Link?", "manang") ,
                "param_name" => "show_zoomlink",
                "value" => __("", "manang") ,
            ) ,

            array(
                "type" => "textfield",
                "heading" => __("Number Of Posts", "manang") ,
                "param_name" => "number_posts",
                "value" => "",
                "description" => __("", "manang")
            ) ,

            array(
                "type" => "checkbox",
                "heading" => __("Sortable?", "manang") ,
                "param_name" => "sortable",
                "value" => __("", "manang") ,
                "dependency" => array(
                    'element' => "portfolio_style",
                    'value' => array(
                        'portfolio-grid','portfolio-masonry'
                    )
                )
            ) ,

            array(
                "type" => "checkbox",
                "heading" => __("Padding Or Not?", "manang") ,
                "param_name" => "padding_not",
                "value" => __("", "manang") ,
            ) ,
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_portfolio_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'portfolio_style'       => 'portfolio-grid',
                            'hover_effects'         => 'portfolio-classic',
                            'column_numbers'        => 'grid-col-2',
                            'show_permalink'        => '',
                            'show_zoomlink'         => '',
                            'number_posts'          => '',
                            'sortable'              => '',
                            'padding_not'           => '',
                            ),$atts);
               $portfolio_style = $values['portfolio_style'];
               $hover_effects = $values['hover_effects'];
               $column_numbers = $values['column_numbers'];
               $show_zoomlink = $values['show_zoomlink'];
               $number_posts = $values['number_posts'];
               $sortable = $values['sortable'];
               $padding_not = $values['padding_not'];
               $posts_per_page = (empty($number_posts)?-1:$number_posts);
               $padding_check =($padding_not == 'true'?'add-pad':'pad0');
               $portfolio_arg = array(
                'post_type'      => 'portfolio',
                'posts_per_page'  => $posts_per_page,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          => 'desc',
               );
               $portfolio_query = new WP_Query($portfolio_arg);

                ob_start();
                if($portfolio_query->have_posts()):
                    switch($hover_effects){
                        case('portfolio-classic'): ?>
                            <div class="portfolio-filter portfolio-classic">
                                <?php if($portfolio_style  != 'portfolio-slider' && $sortable == 'true'):
                                    $taxonomy = 'portfolio_category';
                                    $terms = get_terms($taxonomy); // Get all terms of a taxonomy

                                    if ( $terms && !is_wp_error( $terms ) ) : ?>
                                        <div class="button-group filters-button-group">
                                            <button class="button is-checked" data-filter="*">all</button>
                                            <?php foreach ( $terms as $term ) { ?>
                                                <button class="button" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
                                            <?php } ?>
                                        </div>
                                    <?php endif;?>
                                <?php endif; ?>
                                <div class="grid">
                                    <?php while($portfolio_query->have_posts()):
                                        $portfolio_query->the_post();
                                        $portfolio_image_id = get_post_thumbnail_id();
                                        $portfolio_image_size = get_post_meta(get_the_id(), 'manang_basecamp_portfolio_image_size', true);
                                        $designation = get_post_meta(get_the_id(), 'manang_basecamp_portfolio_designation', true);
                                        if($portfolio_style == 'portfolio-grid' || $portfolio_style == 'portfolio-slider'){
                                            $preferred_image_size = 'manang_portfolio_800_800';
                                        }
                                        else{
                                            $preferred_image_size = $portfolio_image_size;
                                            }
                                        $portfolio_img = wp_get_attachment_image_src( $portfolio_image_id,$preferred_image_size );
                                        $terms_slugs_string = '';
                                        $terms = get_the_terms( get_the_id(), 'portfolio_category' );
                                        if ( $terms && ! is_wp_error( $terms ) ) {
                                            $term_slugs_array = array();
                                            foreach ( $terms as $term ) {
                                                $term_slugs_array[] = $term->slug;
                                            }
                                            $terms_slugs_string = join( " ", $term_slugs_array );
                                        } ?>
                                            <div class="element-item grid-col-3 box <?php echo esc_attr($padding_check . ' ' .$terms_slugs_string); ?>" >
                                                <img src="<?php echo esc_url($portfolio_img[0]); ?>" alt="">
                                                <div class="box-content">
                                                    <div class="portfolio-wrap">
                                                        <a href="<?php echo esc_url($portfolio_img[0]); ?>" class="popup-link"><i class="ion-arrow-resize"></i></a>
                                                        <i class="ion-share"></i>
                                                        <h3 class="title"><?php the_title(); ?></h3>
                                                        <small><?php echo esc_html($designation); ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endwhile;
                                    wp_reset_postdata(); ?>
                                </div>
                            </div>
                        <?php break;

                        case('portfolio-modern'): ?>
                        <div class="portfolio-filter portfolio-modern">
                        <!-- Start of button group -->
                            <?php if($portfolio_style  != 'portfolio-slider' && $sortable == 'true'):
                                $taxonomy = 'portfolio_category';
                                $terms = get_terms($taxonomy); // Get all terms of a taxonomy

                                if ( $terms && !is_wp_error( $terms ) ) : ?>
                                    <div class="button-group filters-button-group">
                                        <button class="button is-checked" data-filter="*">all</button>
                                        <?php foreach ( $terms as $term ) { ?>
                                            <button class="button" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
                                        <?php } ?>
                                    </div>
                                <?php endif;?>
                            <?php endif; ?>
                          <!-- End of button group -->

                            <div class="grid">
                                <?php while($portfolio_query->have_posts()):
                                    $portfolio_query->the_post();
                                    $portfolio_image_id = get_post_thumbnail_id();
                                    $portfolio_image_size = get_post_meta(get_the_id(), 'manang_basecamp_portfolio_image_size', true);
                                    $designation = get_post_meta(get_the_id(), 'manang_basecamp_portfolio_designation', true);
                                    if($portfolio_style == 'portfolio-grid' || $portfolio_style == 'portfolio-slider'){
                                        $preferred_image_size = 'manang_portfolio_800_800';
                                    }
                                    else{
                                        $preferred_image_size = $portfolio_image_size;
                                    }
                                    $portfolio_img = wp_get_attachment_image_src( $portfolio_image_id,$preferred_image_size );
                                    $terms_slugs_string = '';
                                    $terms = get_the_terms( get_the_id(), 'portfolio_category' );
                                    if ( $terms && ! is_wp_error( $terms ) ) {
                                        $term_slugs_array = array();
                                        foreach ( $terms as $term ) {
                                            $term_slugs_array[] = $term->slug;
                                        }
                                        $terms_slugs_string = join( " ", $term_slugs_array );
                                    } ?>
                                    <div class="element-item grid-col-3 box <?php echo esc_attr($padding_check . ' ' .$terms_slugs_string); ?>" >
                                        <div class="pic">
                                            <img src="<?php echo esc_url($portfolio_img[0]); ?>" alt="">
                                        </div>
                                        <div class="portfolio-wrap">
                                            <ul class="portfolio-action">
                                                <a href="<?php echo esc_url($portfolio_img[0]); ?>" class="popup-link"><i class="ion-arrow-resize"></i></a>
                                                <i class="ion-share"></i>
                                            </ul>
                                            <div class="over-layer">
                                                <h4 class="post">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    <small><?php echo esc_html($designation); ?></small>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile;
                                    wp_reset_postdata(); ?>
                            </div>
                        </div>
                        <?php break;
                        case('portfolio-simple'): ?>
                            <div class="portfolio-filter portfolio-simple">
                            <!-- Start of button group -->
                                <?php if($portfolio_style  != 'portfolio-slider' && $sortable == 'true'):
                                    $taxonomy = 'portfolio_category';
                                    $terms = get_terms($taxonomy); // Get all terms of a taxonomy

                                    if ( $terms && !is_wp_error( $terms ) ) : ?>
                                        <div class="button-group filters-button-group">
                                            <button class="button is-checked" data-filter="*">all</button>
                                            <?php foreach ( $terms as $term ) { ?>
                                                <button class="button" data-filter="<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
                                            <?php } ?>
                                        </div>
                                    <?php endif;?>
                                <?php endif; ?>
                              <!-- End of button group -->

                                <div class="grid">
                                    <?php while($portfolio_query->have_posts()):
                                        $portfolio_query->the_post();
                                        $portfolio_image_id = get_post_thumbnail_id();
                                        $portfolio_image_size = get_post_meta(get_the_id(), 'manang_basecamp_portfolio_image_size', true);
                                        $designation = get_post_meta(get_the_id(), 'manang_basecamp_portfolio_designation', true);
                                        if($portfolio_style == 'portfolio-grid' || $portfolio_style == 'portfolio-slider'){
                                            $preferred_image_size = 'manang_portfolio_800_800';
                                        }
                                        else{
                                            $preferred_image_size = $portfolio_image_size;
                                        }
                                        $portfolio_img = wp_get_attachment_image_src( $portfolio_image_id,$preferred_image_size );
                                        $terms_slugs_string = '';
                                        $terms = get_the_terms( get_the_id(), 'portfolio_category' );
                                        if ( $terms && ! is_wp_error( $terms ) ) {
                                            $term_slugs_array = array();
                                            foreach ( $terms as $term ) {
                                                $term_slugs_array[] = $term->slug;
                                            }
                                            $terms_slugs_string = join( " ", $term_slugs_array );
                                        } ?>
                                    <div class="element-item grid-col-3 box <?php echo esc_attr($padding_check . ' ' .$terms_slugs_string); ?> " >
                                        <div class="box-content">
                                            <div class="portfolio-wrap">
                                                <h3 class="title"><?php the_title(); ?>
                                                    <small><?php echo esc_html($designation); ?></small>
                                                </h3>
                                                <ul class="portfolio-action">
                                                    <a href="<?php echo esc_url($portfolio_img[0]); ?>" class="popup-link"><i class="ion-arrow-resize"></i></a>
                                                    <i class="ion-share"></i>
                                                </ul>
                                            </div>
                                        </div>
                                        <img src="<?php echo esc_url($portfolio_img[0]); ?>" alt="">
                                    </div>
                                <?php endwhile;
                                    wp_reset_postdata(); ?>
                            </div>
                        </div>
                        <?php break;
                    }
                endif;
                $output = ob_get_clean();
                return $output;
            }
        }
    }
}
