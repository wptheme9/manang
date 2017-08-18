<?php
if ( ! function_exists ( 'manang_portfolio_shortcode' ) ) {
    function manang_portfolio_shortcode($atts=array()){
        extract(shortcode_atts( array(
            'title'        => '',
            'desc'         => '',
            'number_posts' => '',
            'padding'      => '',
            'column'       => '',
            'layout'       => ''), $atts ));
        ob_start();
        $customizer_options = manang_options();
        $portfolio_count    = ( empty($number_posts)?$customizer_options['portfolio_count']:$number_posts );
        $portfolio_title    = ( empty($title)?$customizer_options['portfolio_title']:$title );
        $portfolio_sub_title    = ( empty($desc)?$customizer_options['portfolio_sub_title']:$desc );
        $portfolio_layout   = ( empty($layout)?$customizer_options['portfolio_layout']:$layout );
        $portfolio_column   = ( empty($column)?$customizer_options['portfolio_column']:$column );
        $portfolio_padding  = ( empty($padding)?$customizer_options['portfolio_padding']:$padding );

        $portfolio_argument = array(
            'post_type'      =>  'manang-portfolio',
            'post_status'    =>  'publish',
            'orderby'        => 'menu_order date',
            'order'          => 'desc',
            'posts_per_page' =>  $portfolio_count,
            );
        $portfolio_query = new WP_Query($portfolio_argument);
        if($portfolio_query->have_posts()):
            $portfolio_bg_image = $customizer_options['portfolio_bg_image'];
            $portfolio_parallax = $customizer_options['portfolio_parallax'];
             $portfolio_cat = get_terms( array(
                        'taxonomy' => 'portfolio_category',
                        'hide_empty' => true,
                    ) );
                     ?>
             <!-- Start of portfolio section -->
            <section class="section portfolio-sec portfolio-filter">
                <div class="container">
                    <div class="section-title">
                        <h2><?php echo esc_html($portfolio_title); ?></h2>
                        <p><?php echo esc_html($portfolio_sub_title); ?></p>
                    </div>
                    <div class="row">
                    <!-- Start of button group -->
                        <div class="button-group filters-button-group">
                            <button class="button is-checked" data-filter="*">all</button>
                            <?php
                            if(! empty( $portfolio_cat ) && ! is_wp_error( $portfolio_cat ) ):
                                foreach ($portfolio_cat as $port_value){ ?>
                                 <button class="button" data-filter=".<?php echo esc_html($port_value->slug)?>"><?php echo esc_html($port_value->name); ?></button>
                                 <?php }
                            endif; ?>
                        </div>
                    <!-- End of button group -->

                          <div class="grid">

                            <?php while($portfolio_query->have_posts()):
                                $portfolio_query->the_post();
                                $portfolio_current_term = get_the_terms( get_the_id(), 'portfolio_category' );
                                $portfolio_cat_slug = "";
                                if(! empty( $portfolio_current_term ) && ! is_wp_error( $portfolio_current_term ) ):
                                    foreach ($portfolio_current_term as $port_current_value){ ?>
                                     <?php $portfolio_cat_slug .= $port_current_value->slug ." ";
                                    }
                                endif; ?>
                                <div class="element-item grid-col-3 box <?php echo esc_attr($portfolio_cat_slug); ?> " >
                                    <?php the_post_thumbnail( 'full' ); ?>
                                    <div class="box-content">
                                        <i class="ion-plus"></i>
                                        <?php the_title( '<h3 class="title">', '</h3>' ); ?>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>
            </section>
            <?php
            $output = ob_get_clean();
            return $output;
        endif;
    }
    add_shortcode('manang_portfolio','manang_portfolio_shortcode');
}