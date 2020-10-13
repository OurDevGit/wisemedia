<?php wp_nonce_field( 'email_action_nonce', 'email_action_nonce' ); ?>

        
<a class="preview button" href="<?php echo admin_url( 'admin.php?page=wise_email_template_send' ) . '&id=' . $post->ID;  ?>" id="send-email">Send Email</a>

<div style="clear: both;"></div>