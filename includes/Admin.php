<?php 

namespace Sweet\Script;

class Admin {

    /**
     * Initialize the class
     */
    function __construct() {   
        $script = new Admin\Scripts();
        $this->dispatch_actions( $script );     
        new Admin\Menu( $script );
    }

    public function dispatch_actions( $script ) {
        add_action( 'admin_init', [ $script, 'form_handler' ] );
    }
}