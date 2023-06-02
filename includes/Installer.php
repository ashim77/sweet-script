<?php 

namespace Sweet\Script;

/** 
 * Installer Class
*/
class Installer {

    /**
     * Run the installer
     * 
     * @return void
    */
    public function run() {
        $this->add_version();
        $this->create_tables();
    }
    /**
     * Code to be executed upon plugin activation
    */
    public function add_version() {
        $installed = get_option( 'sweet-scripts-installed' );
        if( ! $installed ){
            update_option( 'sweet-scripts-installed', time() );
        }

        update_option( 'sweet-scripts-version', SS_VERSION );  
    }

    /**
     * Create neccessery database tables
     * 
     * @return void
    */
    public function create_tables() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}swt_scripts` (
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(100) NOT NULL , 
            `messages` text NOT NULL,
            `created_by` bigint(20) unsigned NOT NULL,
            `created_at` datetime NOT NULL,
            PRIMARY KEY (`id`)
        ) $charset_collate";

        if( !function_exists('bdDelta') ) {
            require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        }

        dbDelta( $schema );

    }

}