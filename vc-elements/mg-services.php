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
            array(
                "type" => "checkbox",
                "heading" => __("Show Permalink?", "manang") ,
                "param_name" => "show_permalink",
                "value" => "",
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
                            'show_permalink' =>    '',
                            ),$atts);
               $service_layout = $values['service_layout'];
               $column = $values['column'];
               $count = $values['count'];
               $service_category = $values['service_category'];
               $show_permalink = $values['show_permalink'];

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
                if($service_query->have_posts()):

                    while($service_query->have_posts()):
                        $service_query->the_post();
                       $service_icon_class = get_post_meta( get_the_id(), 'service_icon_class', true );
                        switch($service_layout){
                            case( "boxed-layout" ): ?>
                                <div class="service-style1">

                                    <div class="grid-col-3">
                                        <div class="serviceBox">
                                            <div class="service-icon">
                                                <i class="<?php echo $service_icon_class ?>"></i>
                                            </div>
                                            <div class="service-content">
                                                <h3><?php the_title(); ?></h3>
                                                <p><?php the_content(); ?> </p>
                                                <?php if($show_permalink == 'true'){ ?>
                                                    <a href="<?php the_permalink(); ?>" class="read">Read more</a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php break;
                            case( "simple-hover" ): ?>
                                    <div class="service-style2">

                                        <div class="grid-col-4">
                                            <div class="serviceBox">
                                                <div class="service-icon">
                                                    <i class="fa fa-globe"></i>
                                                </div>
                                                <h3 class="title"><?php the_title(); ?></h3>
                                                <p class="description">
                                                    <?php the_content(); ?>
                                                </p>
                                                <?php if($show_permalink == 'true'){ ?>
                                                    <a href="<?php the_permalink(); ?>" class="read">Read more</a>
                                                <?php } ?>
                                            </div>
                                        </div>

                                    </div>
                            <?php break;
                            case( "classic-hover" ): ?>
                                <div class="service-style3">
                                    <div class="grid-col-4">
                                        <div class="serviceBox">
                                            <div class="service-icon">
                                                <i class="fa fa-globe"></i>
                                            </div>
                                            <h3 class="title"><?php the_title(); ?></h3>
                                            <p class="description">
                                                <?php the_content(); ?>
                                            </p>
                                            <?php if($show_permalink == 'true'){ ?>
                                                <a href="<?php the_permalink(); ?>" class="read">Read more</a>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            <?php break;
                            case( "image-background" ): ?>
                                    <div class="service-style4">
                                        <div class="grid-col-3">
                                            <div class="serviceBox" style="background-image: url(http://193.235.147.161/product/robojob_pro/wp-content/uploads/2017/06/index-e1497934690801.png);">
                                                <div class="service-icon">
                                                    <i class="ion-ios-people"></i>
                                                </div>
                                                <div class="service-content">
                                                    <h3><?php the_title(); ?></h3>
                                                    <p><?php the_content(); ?> </p>
                                                    <?php if($show_permalink == 'true'){ ?>
                                                        <a href="<?php the_permalink(); ?>" class="read">Read more</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            <?php break;
                            case( "tabbed-layout" ): ?>
                                    <div class="service-tabbed-style">
                                        <div class="tabs tabs-style-bar">
                                            <nav>
                                                <ul>
                                                    <li><a href="#section-bar-1" class="ion-document-text"><span>Description</span></a></li>
                                                    <li><a href="#section-bar-2" class="ion-star"><span>Amenities</span></a></li>
                                                    <li><a href="#section-bar-3" class="ion-gear-b"><span>Extra Amenities</span></a></li>
                                                </ul>
                                            </nav>
                                            <div class="content-wrap">
                                                <section id="section-bar-1">1</section>
                                                <section id="section-bar-2">2</section>
                                                <section id="section-bar-3">3</section>
                                            </div><!-- /content -->
                                        </div><!-- /tabs -->
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
