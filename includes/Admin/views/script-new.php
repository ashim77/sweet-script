<div class="wrap">
    <h1 class="wp-heading-inline"><?php _e( 'New Script', 'sweet-scripts' ); ?></h1>

    <form method="post" action="options.php">
        <table class="form-table asscript-form-table">
            <!-- Message box field  -->
            <tr>
                <th scope="row">
                    <label for="script_box"><?php echo esc_html__('Script Message','asscript'); ?></label>
                </th>
                <td>
                    <textarea name="script_box" id="script_box" class="regular-text" rows="5"></textarea>
                </td>
            </tr>

            <!-- Status field -->
            <tr>
                <th scope="row">
                    <label for="status"><?php echo esc_html__( 'Status', 'asscript' ); ?></label>
                </th>
                <td>
                <select id="status" name="status" class="regular-text">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                </td>
            </tr>

            <!-- Register the 'asscript_script_for_insert' setting field -->
            <tr>
                <th scope="row">
                    <label for="condition"><?php echo esc_html__( 'Condition', 'asscript' ); ?></label>
                </th>
                <td>
                    <select id="condition" name="condition" class="regular-text">
                        <option value="header">Header</option>
                        <option value="body">Body</option>
                        <option value="footer">Footer</option>
                    </select>
                </td>
            </tr>

            <!-- Register the 'asscript_on_page_id' setting field -->
            <tr>
                <th scope="row">
                    <label for="for_page_ids"><?php echo esc_html__( 'Page IDs', 'asscript' ); ?></label>
                </th>
                <td>
                    <?php 
                        $pages = get_pages(); // Get all pages
                        $selected = isset( $_POST['for_page_ids'] ) ? (array) $_POST['for_page_ids'] : array();

                        $select_multiple = '<select id="for_page_ids" name="for_page_ids" class="regular-text" data-placeholder="Search page ids..." data-allow-clear="true" multiple>';

                        foreach ($pages as $page) {
                            $selected_attr = in_array( $page->ID, $selected ) ? 'selected="selected"' : '';
                            $select_multiple .= '<option value="' . esc_attr( $page->ID ) . '" ' . $selected_attr . '>' . esc_html( $page->post_title ) . '</option>';
                        }
                    
                        $select_multiple .= '</select>';
                    
                        echo $select_multiple;                        
                    ?>
                </td>
            </tr>

            <!-- Register the 'asscript_on_template_type' setting field -->
            <tr>
                <th scope="row">
                    <label for="template_type"><?php echo esc_html__( 'Template Type', 'asscript' ); ?></label>
                </th>
                <td>
                    <?php
                        $tem_text = $_POST['template_type'];

                        $selected = isset( $_POST['template_type'] ) ? (array) $_POST['template_type'] : array();

                        $items = array(
                            'home',
                            'archive',
                            'blog',
                            'single',
                            'single-posts',
                            '404',
                            'search',
                            'loggedin',
                            'product-cat',
                            'shop',
                            'page',
                        );

                        $select_multiple = '<select id="template_type" name="template_type" class="regular-text" data-placeholder="Template Type" data-allow-clear="true" multiple>';

                        foreach ( $items as $name ) {
                            $selected_attr = in_array( $name, $selected ) ? 'selected="selected"' : '';
                            $select_multiple .= '<option value="' . esc_attr( $name ) . '" ' . $selected_attr . '>' . esc_html( $name ) . '</option>';
                        }

                        $select_multiple .= '</select>';

                        echo $select_multiple;                    
                    ?>
                </td>
            </tr>

            <?php 
                /**
                 * [asscript_taxonomies]
                 * @param  string $texonomy
                 * @return [array]
                 */
                function new_asscript_taxonomies( $taxonomy = 'category' ) {
                    $categories = array();

                    $terms = get_terms( array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => true,
                    ));

                    if ( ! empty( $terms ) ) {
                        $categories = wp_list_pluck( $terms, 'term_id', 'name' );
                    }

                    return $categories;
                }
            ?>            

            <!-- Register the 'asscript_select_categories' setting field -->
            <tr>
                <th scope="row">
                    <label for="categories_select"><?php echo esc_html( 'Select Categories', 'asscript' ); ?></label>
                </th>
                <td>
                    <?php
                        $cat_text = $_POST['categories_select'];
                        $selected = isset( $_POST['categories_select'] ) ? (array) $_POST['categories_select'] : array();

                        $asscript_cats = new_asscript_taxonomies();

                        $select_multiple = '<select id="categories_select" name="categories_select" class="regular-text" data-placeholder="Category Select.." data-allow-clear="true" multiple>';

                        foreach ($asscript_cats as $catagory => $cat_id) {
                            $selected_attr = in_array( $cat_id, $selected ) ? 'selected="selected"' : '';
                            $select_multiple .= '<option value="' . esc_attr( $cat_id ) . '" ' . $selected_attr . '>' . esc_html( $catagory ) . '</option>';
                        }

                        $select_multiple .= '</select>';

                        echo $select_multiple;	                    
                    ?>
                </td>
            </tr>

        </table>  
        <?php wp_nonce_field( 'new-script' ); ?>
        <?php submit_button( __( 'Add Script', 'sweet-scripts' ), 'primary', 'submit_script' ); ?>      
    </form>
</div>