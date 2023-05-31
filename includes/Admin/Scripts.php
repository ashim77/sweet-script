<?php 

namespace Sweet\Script\Admin;

class Scripts {
    public function plugin_page() {
        // echo 'Hello From Script List';
        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';

        switch ($action) {
            case 'new' :
                $template = __DIR__ . '/views/script-new.php';
                break;

            case 'edit':
                $template   = __DIR__ . '/views/script-edit.php';
                break;

            case 'view':
                $template = __DIR__ . '/views/script-view.php';
                break;
                
            default:
                $template = __DIR__ . '/views/script-list.php';
                break;    
        }

        if( file_exists( $template ) ) {
            include $template;
        }
    }

    /**
     * Form Handler
     *
     * @return void
     */    
    public function form_handler() {

        if( ! isset( $_POST['submit_script'] ) ) {
            return;
        }

        if( ! wp_verify_nonce( $_POST['_wpnonce'] , 'new-script' ) ) {
            wp_die( 'Are you cheating?' );
        }

        if( ! current_user_can( 'manage_options' ) ) {
            wp_die( 'Are you cheating?' );
        }

        var_dump($_POST);
        exit;
    }
}