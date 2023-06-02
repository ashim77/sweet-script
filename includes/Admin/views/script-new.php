<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'New Script', 'sweet-scripts' ); ?></h1>

    <form action="" method="post">
        <table class="form-table asscript-form-table">
            <!-- Script Name  -->
            <tr>
                <th scope="row">
                    <label for="name"><?php echo esc_html__('Script Name','asscript'); ?></label>
                </th>
                <td>
                    <input type="text" name="name" id="name" class="regular-text form-required" value="">
                </td>
            </tr>

            <!-- Message box field  -->
            <tr>
                <th scope="row">
                    <label for="messages"><?php echo esc_html__('Script Message','asscript'); ?></label>
                </th>
                <td>
                    <textarea name="messages" id="messages" class="regular-text" rows="5"></textarea>
                </td>
            </tr>
        </table>  
        <?php wp_nonce_field( 'new-script' ); ?>
        <?php submit_button( __( 'Add Script', 'sweet-scripts' ), 'primary', 'submit_script' ); ?>      
    </form>
</div>