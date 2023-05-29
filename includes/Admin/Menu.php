<?php 

namespace Sweet\Script\Admin;

/**
 * The Menu handler class
 */
class Menu{

    function __construct()
    {
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
            __( 'Sweet Script', 'sweet-script' ), 
            __( 'Script', 'sweet-script' ), 
            $capability, 
            $parent_slug, 
            [ $this, 'plugin_page' ], 
            'dashicons-welcome-learn-more' 
        );

        add_submenu_page( 
            $parent_slug, 
            __('Script List','sweet-script'), 
            __('Script List','sweet-script'), 
            $capability, 
            $parent_slug, 
            [ $this, 'plugin_page' ] 
        );

        add_submenu_page(
            $parent_slug, 
            __('Script Global Settings','sweet-script'), 
            __('Settings','sweet-script'), 
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