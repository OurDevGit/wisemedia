<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Daron
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

add_filter('get_avatar','add_gravatar_class');

function add_gravatar_class($class) { // function for add extra class to img avatar
    $class = str_replace("class='avatar", "class='avatar g-width-70--xs g-height-70--xs g-hor-border-4__solid--white g-box-shadow__primary-v1 g-radius--circle g-margin-b-30--xs", $class);
    return $class;
}

function daron_comment($comment, $args, $depth) { // custom comment list
$class_li = "g-bg-color--white g-hor-centered-row--md";

?>
<li <?php comment_class($class_li); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="g-padding-x-30--xs g-padding-y-30--xs cmsmasters_comment_item">
		<div class="col-sm-2 col-xs-4 g-hor-centered-row__col author_desc comment-author vcard">
			<?php echo get_avatar($comment,$size='48',$default='mysteryman'); ?>
		</div>
		<span class="col-sm-10 g-hor-centered-row__col author_bio">
			<?php printf( ('<h5 class="fn g-font-size-16--xs g-color--primary">%s</h5>'),  esc_html(get_comment_author()) )?>
			<div class="g-font-size-14--xs g-margin-b-20--xs g-margin-b-10--md comment-meta commentmetadata">
				<a href="<?php echo esc_url(htmlspecialchars( get_comment_link( $comment->comment_ID ) )) ?>">
				<?php printf( '%1$s', get_comment_date() ) ?>
				</a>
				<?php edit_comment_link( __( 'Edit Comment', 'daron' ), '<p>', '</p>' ); ?>
			</div>
			<?php comment_text() ?>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php esc_html_e('Your comment is awaiting moderation.', 'daron'); ?></em>
			<br />
			<?php endif; ?>
			<div class="s-btn s-btn--xs s-btn--primary-bg g-radius--50 reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __('Reply', 'daron')))) ?>
			</div>
		</span>
	</div>
<?php
}
?>
<div id="comments" class="comments-area">
	<?php if( have_comments() ) { //We have comments ?>
		<h5 class="g-padding-y-20--xs g-text-center--xs comment-title">
			 <?php
                $comments_number = get_comments_number();
                if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','daron' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s Comment',
                            '%1$s Comments',
                            $comments_number,
                            'comments title',
                            'daron'
                        ),
                        esc_html(number_format_i18n( $comments_number ) ),
                        get_the_title()
                    );
                }
            ?>
		</h5>
		<ol class="comments-list">
			<?php
			$args = array (
					'walker'				=> null,
					'max_depth'				=> '5',
					'style'					=> 'li',
					'callback'				=> 'daron_comment',
					'end-callback'			=> null,
					'type'					=> 'all',
					'reply_text'			=>  __('Reply &raquo;', 'daron'),
					'page'					=> null,
					'per_page'				=> null,
					'avatar_size'			=> 32,
					'reverse_top_level'		=> null,
					'reverse_children'		=> '',
					'format'				=> 'html5',
					'short_ping'			=> false,
					'echo'					=> true
			);
			
			wp_list_comments( $args );
			?>
		</ol>
		<?php if( !comments_open() && get_comments_number() ) { ?>
			<p class="no-comments"><?php esc_html_e('Comments are closed', 'daron'); ?></p>
			<?php
		} //comments open end

	} //have comments end
	?>
	<?php 
	$args = array(
		'class_submit'      => 's-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-70--xs g-margin-b-20--xs',
		'comment_field' => '<p class="g-margin-b-30--xs g-margin-b-50--md g-padding-x-20--xs comment-form-comment">
		<textarea class="form-control s-form-v4__input g-padding-l-0--xs" rows="5" placeholder="' . __( 'Comment', 'daron') . '" id="comment" name="comment" required></textarea></p>',
		'class_form' => 'g-padding-x-30--xs g-padding-y-30--xs'
	);
	
	
	// Add custom meta (ratings) fields to the default comment form
	// Default comment form includes name, email address and website URL
	// Default comment form elements are hidden when user is logged in

	add_filter('comment_form_default_fields', 'custom_fields');
	function custom_fields($fields) {

		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields[ 'author' ] = '<p class="col-sm-6 g-margin-b-30--xs g-margin-b-50--md comment-form-author">'.
		  '<input class="form-control s-form-v4__input g-padding-l-0--xs" required placeholder="' . __( 'Name', 'daron' ) . '" id="author" name="author" type="text" value="'. esc_attr( $commenter['comment_author'] ) .
		  '" size="30" tabindex="1"' . $aria_req . ' /></p>';
		
		$fields[ 'email' ] = '<p class="col-sm-6 g-margin-b-30--xs g-margin-b-50--md  comment-form-email">'.
		  '<input class="form-control s-form-v4__input g-padding-l-0--xs" filter_validate_email required placeholder="' . __( 'Email', 'daron' ) . '" id="email" name="email" type="text" value="'. esc_attr( $commenter['comment_author_email'] ) .
		  '" size="30"  tabindex="2"' . $aria_req . ' /></p>';
	  return $fields;
	}	
	comment_form( $args ); ?>
</div><!-- comments-area -->