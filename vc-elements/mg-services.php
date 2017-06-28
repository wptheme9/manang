<?php
/**
 * Services
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_services_integrateWithVC' );
function manang_services_integrateWithVC(){
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
                    __("Boxed Layout", 'manang') => "service-style1",
                    __("Simple Hover Layout", 'manang') => "service-style2",
                    __("Classic Hover Layout", 'manang') => "service-style3",
                    __("Image Background Layout", 'manang') => "service-style4",
                    __("Tabbed Layout", 'manang') => "service-tabbed-style",
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
                "type" => "dropdown",
                "dependency" => array(
                    'element' => "service_layout",
                    'value' => array(
                        'boxed-layout','simple-hover','classic-hover','image-background'
                    )
                )
            ) ,

             array(
                "type" => "dropdown",
                "heading" => __("Choose Category", "manang") ,
                "param_name" => "service_category",
                "description" => __("This option will display only the selected categories.", "manang") ,
                "value" => manang_get_service_categories_select(),
            ) ,
            array(
                "type" => "checkbox",
                "heading" => __("Show Permalink?", "manang") ,
                "param_name" => "show_permalink",
                "value" => "",
                "dependency" => array(
                    'element' => "service_layout",
                    'value' => array(
                        'service-style1','service-style2','service-style3','service-style4'
                    )
                )
            ) ,
            array(
                "type" => "textfield",
                "heading" => __("Add Button Text?", "manang") ,
                "param_name" => "button_text",
                "value" => "",
                "dependency" => array(
                    'element' => "service_layout",
                    'value' => array(
                        'service-style1','service-style2','service-style3','service-style4'
                    )
                )
            ) ,
            array(
                "type" => "textfield",
                "heading" => __("Add Excerpt Count", "manang") ,
                "param_name" => "excerpt_count",
                "value" => "200",
                "dependency" => array(
                    'element' => "service_layout",
                    'value' => array(
                        'service-style1','service-style2','service-style3','service-style4'
                    )
                )
            ) ,
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_service_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'service_layout'        => 'service-style1',
                            'column'               => 'grid-col-2',
                            'count'                => '',
                            'service_category'        => '',
                            'show_permalink' =>    '',
                            'button_text' => '',
                            'excerpt_count' => '200',
                            ),$atts);
               $service_layout = $values['service_layout'];
               $column = $values['column'];
               $count = $values['count'];
               $service_category = $values['service_category'];
               $show_permalink = $values['show_permalink'];
               $button_text = $values['button_text'];
               $excerpt_count = $values['excerpt_count'];

               $service_post_count = (!empty($count)?$count:-1);
                $tax_query = '';
                if($service_category!=''){
                    $tax_query[] =  array(
                        'taxonomy' => 'mg_service_category',
                        'field' => 'term_id',
                        'terms' => $service_category,
                    );
                }
                $service_argument = array(
                    'post_type'      => 'service',
                    'post_status'    => 'publish',
                    'posts_per_page' => $service_post_count,
                    'orderby'        => 'menu_order date',
                    'order'          => 'desc',
                    'tax_query' => $tax_query,
                );
                $service_query = new WP_Query($service_argument);
                ob_start();
                if($service_query->have_posts()): ?>
                    <div class="<?php echo $service_layout ?>">
                    <?php if($service_layout == 'service-tabbed-style'){ ?>
                        <div class="tabs tabs-style-bar"><nav><ul>
                    <?php }
                    while($service_query->have_posts()):
                        $service_query->the_post();
                        $service_image_id = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        $service_icon_class = get_post_meta( get_the_id(), 'service_icon_class', true );
                        switch($service_layout){
                            case( "service-style1" ): ?>
                                    <div class="<?php echo $column; ?>">
                                        <div class="serviceBox">
                                            <div class="service-icon">
                                                <i class="<?php echo $service_icon_class ?>"></i>
                                            </div>
                                            <div class="service-content">
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php echo manang_get_excerpt(get_the_id(),$excerpt_count); ?> </p>
                                                <?php if($show_permalink == 'true'){ ?>
                                                    <a href="<?php the_permalink(); ?>" class="read"><?php echo esc_html($button_text); ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php break;
                            case( "service-style2" ): ?>
                                    <div class="<?php echo $column; ?>">
                                        <div class="serviceBox">
                                            <div class="service-icon">
                                                <i class="<?php echo $service_icon_class ?>"></i>
                                            </div>
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <p class="description">
                                                <?php echo manang_get_excerpt(get_the_id(),$excerpt_count); ?>
                                            </p>
                                            <?php if($show_permalink == 'true'){ ?>
                                                <a href="<?php the_permalink(); ?>" class="read"><?php echo esc_html($button_text); ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                            <?php break;
                            case( "service-style3" ): ?>
                                    <div class="<?php echo $column; ?>">
                                        <div class="serviceBox">
                                            <div class="service-icon">
                                                <i class="<?php echo $service_icon_class ?>"></i>
                                            </div>
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <p class="description">
                                                <?php echo manang_get_excerpt(get_the_id(),$excerpt_count); ?>
                                            </p>
                                            <?php if($show_permalink == 'true'){ ?>
                                                <a href="<?php the_permalink(); ?>" class="read"><?php echo esc_html($button_text); ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                            <?php break;
                            case( "service-style4" ): ?>
                                    <div class="<?php echo $column; ?>">
                                        <div class="serviceBox" style="background-image: url(<?php echo esc_url($service_image_id[0]); ?>);">
                                            <div class="service-icon">
                                                <i class="<?php echo $service_icon_class ?>"></i>
                                            </div>
                                            <div class="service-content">
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php echo manang_get_excerpt(get_the_id(),$excerpt_count); ?> </p>
                                                <?php if($show_permalink == 'true'){ ?>
                                                    <a href="<?php the_permalink(); ?>" class="read"><?php echo esc_html($button_text); ?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php break;
                            case( "tabbed-layout" ): ?>
                                <li><a href="#<?php echo sanitize_title(get_the_title()); ?>" class="<?php echo $service_icon_class ?>"><span><?php the_title(); ?></span></a></li>
                            <?php break;
                        }
                        endwhile;
                    wp_reset_postdata(); ?>
                    </div>
                    <?php if($service_layout == 'service-tabbed-style'): ?>
                        </ul></nav>
                        <div class="content-wrap">
                             <?php while($service_query->have_posts()):
                                $service_query->the_post(); ?>
                                    <section id="<?php echo sanitize_title(get_the_title()); ?>"><?php the_content(); ?></section>
                            <?php wp_reset_postdata();
                            endwhile; ?>
                        </div><!-- /content --></div></div>
                    <?php endif;
                endif;
            $output = ob_get_clean();
            return $output;
            }
        }
    }
}
