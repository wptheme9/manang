<?php
class Test_Multiple_Forms_Options {

    function __construct() {
        add_action( 'admin_menu', array( $this, 'add_api_settings_menu' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }

    function add_api_settings_menu() {
        // add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function )
        add_options_page( 'Manang', 'Manang Option', 'manage_options', 'manang-option', array($this, 'create_api_settings_page') );
    }

    function create_api_settings_page() {
    ?>
<div class="wrap">
    <?php screen_icon(); ?>
    <h2>Settings</h2>

    <form method="post" action="options.php">
    <?php
        // This prints out all hidden setting fields
        // settings_fields( $option_group )
        settings_fields( 'api-forms-main-settings-group' );
        // do_settings_sections( $page )
        do_settings_sections( 'manang-option-main-settings-section' );
    ?>
    <?php submit_button('Save Changes'); ?>
    </form>

    <form method="post" action="options.php">
    <?php
        // This prints out all hidden setting fields
        // settings_fields( $option_group )
        settings_fields( 'api-forms-additional-settings-group' );
        // do_settings_sections( $page )
        do_settings_sections( 'manang-option-additional-settings-section' );
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
            'Instagram API',
            array($this, 'print_main_settings_section_info'),
            'manang-option-main-settings-section'
        );

        // add_settings_field( $id, $title, $callback, $page, $section, $args )
        add_settings_field(
            'some-setting',
            'Add API Key',
            array($this, 'create_input_some_setting'),
            'manang-option-main-settings-section',
            'main-settings-section'
        );

        // register_setting( $option_group, $option_name, $sanitize_callback )
        register_setting( 'api-forms-main-settings-group', 'manang_option_main_settings_arraykey', array($this, 'manang_main_settings_validate') );

        // add_settings_section( $id, $title, $callback, $page )
        add_settings_section(
            'additional-settings-section',
            'Additional Settings',
            array($this, 'print_additional_settings_section_info'),
            'manang-option-additional-settings-section'
        );

        // add_settings_field( $id, $title, $callback, $page, $section, $args )
        add_settings_field(
            'another-setting',
            'Another Setting',
            array($this, 'create_input_another_setting'),
            'manang-option-additional-settings-section',
            'additional-settings-section'
        );

        // register_setting( $option_group, $option_name, $sanitize_callback )
        register_setting( 'api-forms-additional-settings-group', 'test_multiple_forms_plugin_additonal_settings_arraykey', array($this, 'plugin_additional_settings_validate') );
    }

    function print_main_settings_section_info() {
        echo '<p>Main Settings Description.</p>';
    }

    function create_input_some_setting() {
        $options = get_option('manang_option_main_settings_arraykey');
        ?><input type="text" name="manang_option_main_settings_arraykey[some-setting]" value="<?php echo $options['some-setting']; ?>" /><?php
    }

    function manang_main_settings_validate($arr_input) {
        $options = get_option('manang_option_main_settings_arraykey');
        $options['some-setting'] = trim( $arr_input['some-setting'] );
        return $options;
    }

    function print_additional_settings_section_info() {
        echo '<p>Additional Settings Description.</p>';
    }

    function create_input_another_setting() {
        $options = get_option('test_multiple_forms_plugin_additonal_settings_arraykey');
        ?><input type="text" name="test_multiple_forms_plugin_additonal_settings_arraykey[another-setting]" value="<?php echo $options['another-setting']; ?>" /><?php
    }

    function plugin_additional_settings_validate($arr_input) {
        $options = get_option('test_multiple_forms_plugin_additonal_settings_arraykey');
        $options['another-setting'] = trim( $arr_input['another-setting'] );
        return $options;
    }

}