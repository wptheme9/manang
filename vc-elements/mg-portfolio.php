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
                    __("Grid", 'manang') => "icon",
                    __("Masonry", 'manang') => "number",
                    __("SLider", 'manang') => "number",
                ) ,
                "type" => "dropdown"
            ) ,

            array(
                "heading" => __("Portfolio Hover Effects", 'manang') ,
                "param_name" => "hover_effects",
                "value" => array(
                    __("Classic", 'manang') => "icon",
                    __("Modern", 'manang') => "number",
                    __("Simple", 'manang') => "number",
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
                            'portfolio_style'       => '',
                            'hover_effects'         => '',
                            'column_numbers'        => '',
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
               $read_more_text = $values['read_more_text'];

                ob_start(); ?>

                <?php $output = ob_get_clean();
                return $output;
            }
        }
    }
}
