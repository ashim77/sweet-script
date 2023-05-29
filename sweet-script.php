<?php

/**
 * Plugin Name: Sweet Script
 * Description: This plugin allows you to insert scripts or code in your header and footer
 * Plugin URI: https://iamashim.com/
 * Author: Ashim Kumar
 * Author URI: https://iamaashim.com/
 * Version: 1.0
 * Requires at least: 5.0
 * Requires PHP: 5.2
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: sweetcode
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The plugin main final class
 */
final class Sweet_Script
{
    const version = '1.0.0';

    public function __construct()
    {
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate']);

        add_action('plugins_loaded', [$this, 'init_plugin']);
    }

    /**
     * Initialize a singleton instance
     *
     * @return \Sweet_Script
     */
    public static function init()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants()
    {
        define('SS_VERSION', self::version);
        define('SS_FILE', __FILE__);
        define('SS_PATH', __DIR__);
        define('SS_URL', plugins_url('', SS_FILE));
        define('SS_ASSETS', SS_URL . '/assets');
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin()
    {
        if (is_admin()) {
            new Sweet\Script\Admin();
        } else {
            // Code for front-end functionality
        }
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate()
    {
        // Code to be executed upon plugin activation
    }
}

/**
 * Initializes the main plugin
 *
 * @return \Sweet_Script
 */
function Sweet_Script()
{
    return Sweet_Script::init();
}

// Kick-off the plugin
Sweet_Script();