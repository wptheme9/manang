<?php
if(!function_exists('manang_sanitize_url')):
    /**
     * Sanitize URL function for customizer
     *
     * @copyright Copyright (c) 2015, WordPress Theme Review Team
     */
    function manang_sanitize_url( $url ) {
        return esc_url_raw( $url );
    }
endif;

if(!function_exists('manang_sanitize_image')):
    /**
     * Sanitize image URL
     *
     * @copyright Copyright (c) 2015, WordPress Theme Review Team
     */
    function manang_sanitize_image( $image, $setting ) {
        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon',
        );
        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );
        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );
    }
endif;

if(!function_exists('manang_sanitize_select')):
    /**
     * Sanitize checkbox for customizer
     *
     * @copyright Copyright (c) 2015, WordPress Theme Review Team
     */


    /**
     * Sanitize callback select input
     *
     * @copyright Copyright (c) 2015, WordPress Theme Review Team
     */
    function manang_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );

        $control = manang_control_id_from_settings( $setting->id );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $control )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;

if(!function_exists('manang_control_id_from_settings')):
    /**
     * Sanitize numeric value
     *
     * @copyright Copyright (c) 2015, WordPress Theme Review Team
     */

    /**
     * Get typical ID for control from related setting name
     *
     * @param  string $settings settings name.
     * @return string
     */
    function manang_control_id_from_settings( $settings ) {
        $name = trim( $settings, ']' );
        return preg_replace( '/[\[\]]/', '_', $name );
    }
endif;

if(!function_exists('manang_sanitize_text')):
    function manang_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }
endif;

if(!function_exists('manang_sanitize_checkbox')):
    function manang_sanitize_checkbox( $input ) {
        return $input;
    }
endif;

if(!function_exists('manang_sanitize_integer')):
    function manang_sanitize_integer( $input ) {
        return (int)($input);
    }
endif;