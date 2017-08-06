<?php
class Test_Multiple_Forms_Options {

    function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_settings_menu' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }

    function add_plugin_settings_menu() {
        // add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function )
        add_options_page( 'Manang', 'Manang Option', 'manage_options', 'manang-option', array($this, 'manang_api_settings_page') );
    }

    function manang_api_settings_page() {
    ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>Settings</h2>

            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                // settings_fields( $option_group )
                settings_fields( 'manang-sections-settings-group' );
                // do_settings_sections( $page )
                do_settings_sections( 'manang-option' );
            ?>
            <?php submit_button('Save Changes'); ?>
            </form>
        </div>
    <?php
    }

    function register_settings() {

        // add_settings_section( $id, $title, $callback, $page )
        add_settings_section(
            'main-settings-section',
            'Main Settings',
            array($this, 'print_main_settings_section_info'),
            'manang-option'
        );

        // add_settings_field( $id, $title, $callback, $page, $section, $args )
        add_settings_field(
            'gmap-setting',
            'Google MAp Setting',
            array($this, 'manang_input_setting'),
            'manang-option',
            'main-settings-section'
        );

        // register_setting( $option_group, $option_name, $sanitize_callback )
        register_setting( 'manang-sections-settings-group', 'manang_main_settings_arraykey', array($this, 'manang_gmap_settings_validate') );

        // add_settings_section( $id, $title, $callback, $page )
        add_settings_section(
            'manang-settings-section',
            'Mailchimp API',
            array($this, 'gmap_settings_section_info'),
            'manang-option'
        );

        // add_settings_field( $id, $title, $callback, $page, $section, $args )
        add_settings_field(
            'mailchimp-setting',
            'Mailchimp API',
            array($this, 'mailchimp_input_setting'),
            'manang-option',
            'manang-settings-section'
        );

        // register_setting( $option_group, $option_name, $sanitize_callback )
        register_setting( 'manang-sections-settings-group', 'manang_sections_plugin_additonal_settings_arraykey', array($this, 'manang_mailchimp_settings_validate') );
    }

    function print_main_settings_section_info() {
        echo '<p>Main Settings Description.</p>';
    }

    function manang_input_setting() {
        $options = get_option('manang_main_settings_arraykey');
        ?><input type="text" name="manang_main_settings_arraykey[gmap-setting]" value="<?php echo $options['gmap-setting']; ?>" /><?php
    }

    function manang_gmap_settings_validate($arr_input) {
        $options = get_option('manang_main_settings_arraykey');
        $options['gmap-setting'] = trim( $arr_input['gmap-setting'] );
        return $options;
    }

    function gmap_settings_section_info() {
        echo '<p>Additional Settings Description.</p>';
    }

    function mailchimp_input_setting() {
        $options = get_option('manang_sections_plugin_additonal_settings_arraykey');
        ?><input type="text" name="manang_sections_plugin_additonal_settings_arraykey[mailchimp-setting]" value="<?php echo $options['mailchimp-setting']; ?>" /><?php
    }

    function manang_mailchimp_settings_validate($arr_input) {
        $options = get_option('manang_sections_plugin_additonal_settings_arraykey');
        $options['mailchimp-setting'] = trim( $arr_input['mailchimp-setting'] );
        return $options;
    }

}