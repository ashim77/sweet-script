<?php 

namespace Sweet\Script\Admin;

class Scripts {

    public $errors = [];

    /**
     * Plugin page handler
     * 
     * @return void
     */
    public function plugin_page() {

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

        $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
        $messages = isset( $_POST['messages'] ) ? sanitize_textarea_field( $_POST['messages'] ) : '';

        if( empty( $name ) ) {
            $this->errors['name'] = __( 'Please provide a name', 'sweet-scripts' );
        } 

        if ( ! empty( $this->errors ) ) {
            return;
        }

        $inserted_in = swt_inster_script([
            'name'      => $name,
            'messages'   => $messages,
        ]);

        if( is_wp_error( $inserted_in ) ) {
            wp_die( $inserted_in->get_error_message() );
        }

        $redirected_to = admin_url( 'admin.php?page=sweet-script&inserted=true' );
        wp_redirect( $redirected_to );
        
        exit;
    }
}