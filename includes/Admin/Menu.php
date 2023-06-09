<?php 

namespace Sweet\Script\Admin;

/**
 * The Menu handler class
 */
class Menu {

    public $script;

    function __construct( $script ) {
        $this->script = $script;
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
    }

    /**
     * Register admin menu
     *
     * @return void
     */
    public function admin_menu() {
        $parent_slug = 'sweet-script';
        $capability = 'manage_options';

        add_menu_page( 
            __( 'Sweet Script', 'sweet-scripts' ), 
            __( 'Sweet Script', 'sweet-scripts' ), 
            $capability, 
            $parent_slug, 
            [ $this->script, 'plugin_page' ], 
            'dashicons-media-code' 
        );

        add_submenu_page( 
            $parent_slug, 
            __('Script List','sweet-scripts'), 
            __('Script List','sweet-scripts'), 
            $capability, 
            $parent_slug, 
            [ $this->script, 'plugin_page' ] 
        );

        add_submenu_page(
            $parent_slug, 
            __('Script Global Settings','sweet-scripts'), 
            __('Settings','sweet-scripts'), 
            $capability, 
            'sweet-script-settings', 
            [ $this, 'settings_page' ] 
        );

    }
    
    /**
     * Render the Settings page
     *
     * @return void
     */
    public function settings_page() {
        echo 'Hello Settings';
    }
}