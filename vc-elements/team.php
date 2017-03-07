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
                "param_name" => "feature_description",
                "value" => __("", "manang") ,
                "description" => __("Total Number Of Team.", "manang")
            ) ,
             array(
                "type" => "dropdown",
                "heading" => __("Choose Category", "manang") ,
                "param_name" => "feature_style",
                "description" => __("This option will display only the selected categories.", "manang") ,
                "value" => manang_get_team_categories_select(),
            ) ,
            array(
                "type" => "textfield",
                "heading" => __("Extra class name", "manang") ,
                "param_name" => "el_class",
                "value" => "",
                "description" => __("If you wish to style particular description element differently, then use this field to add a class name.", "manang")
            ),
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_team_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'style'                => '',
                            'column'               => '',
                            'count'                => '',
                            'select'               => '',
                            'el_class'             => ''
                            ),$atts);
               $style = $values['style'];
               $column = $values['column'];
               $count = $values['count'];
               $select = $values['select'];
               $el_class = $values['el_class'];
                ob_start(); ?>
                <div class="col-md-3">
                    <div class="team-wrap team-classic" data-aos="fade-up">
                        <div class="our-team">
                            <img src="assets/img/team1.jpg" alt=" ">
                            <div class="team-content">
                                <h3 class="title">Williamson</h3>
                                <span class="post">web developer</span>
                                <ul class="social-links">
                                    <li><a href="#"><i class="fa fa-facebook"></i> </a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i> </a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $output = ob_get_clean();
                return $output;
            }
        }
    }
}
