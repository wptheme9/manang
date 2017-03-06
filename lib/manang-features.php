<?php
if(!function_exists('manang_features_query')){
    function manang_features_query($feature_category="",$number_post="-1",$feature_title="",$feature_description="",$feature_effects=""){
        if ( ! display_header_text() ) :
            $output = '.site-title,
                    .site-description {
                        position: absolute;
                        clip: rect(1px, 1px, 1px, 1px);
                    }';
            // If the user has set a custom color for the text use that.
            else :
            $output ='.site-title a,
                    .site-description {
                        color: #'.esc_attr( $header_text_color ).'}';
            endif;
            return $output;
        }
    }
    add_action( 'manang_query_features', 'manang_features_query', 10, 5 );