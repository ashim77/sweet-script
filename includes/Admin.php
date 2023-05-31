<?php 

namespace Sweet\Script;

class Admin {

    /**
     * Initialize the class
     */
    function __construct() {   
        $this->dispatch_actions();     
        new Admin\Menu();
    }

    public function dispatch_actions() {
        $script = new Admin\Scripts();
        add_action( 'admin_init', [ $script, 'form_handler' ] );
    }
}