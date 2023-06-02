<?php 

/**
 * Insert a new Script
 * 
 * @param array $arg
 * 
 * @return int|WP_Error
 */
function swt_inster_script( $args = [] ) {
    global $wpdb;

    if( empty( $args['name' ] ) ) {
        return new \WP_Error( 'no-message', __( 'You must provide a name', 'sweet-scripts' ) );
    }

    $defaults = [
        'name'              => '',
        'messages'          => '',
        'created_by'        => get_current_user_id(),
        'created_at'        => current_time( 'mysql' ),

    ];

    $data = wp_parse_args( $args, $defaults );

    var_dump( $data );

    $inserted = $wpdb->insert(
        "{$wpdb->prefix}swt_scripts", 
        $data, 
        [
            '%s',
            '%s',
            '%d',
            '%s',
        ]
    );

    if( ! $inserted ) {
        return new \WP_Error( 'failed-to-insert', __( 'Failed to insert Data', 'sweet-scripts' ) );
    }

    return $wpdb->insert_id;
}