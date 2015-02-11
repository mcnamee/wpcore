<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since WPCore 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'twentyfifteen' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php wpcore_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php wpcore_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfifteen' ); ?></p>
	<?php endif; ?>

	<?php 
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );

		$fields = array(
				'author' => '<div class="form-group"><label for="author">Name<span>(Required)</span></label><input type="text" class="form-control" id="author" name="author" ' . $aria_req . ' value="' .
	        esc_attr( $commenter['comment_author'] ) . '" tabindex="1" /></div>',
				'email' => '<div class="form-group"><label for="email">Email<span>(Required)</span></label><input type="text" class="form-control" id="email" name="email" ' . $aria_req . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="2" /></div>',
				'URL' => '<div class="form-group"><label for="url">Website</label><input type="text" class="form-control" id="url" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" tabindex="3" /></div>'
		);

		$comm = "Leave a Comment";

		$args = array(
			'fields' => apply_filters( 'comment_form_default_fields', $fields),
			'title_reply' => '<h5>'. $comm .'</h5>',
			'cancel_reply_link' => '',
			'comment_field' => '<div class="form-group"><label for="comment">Your Comment</label><textarea id="comment" name="comment" ' . $aria_req . ' class="form-control" tabindex="4" rows="0" cols="0"></textarea></div>',
			'label_submit' => 'Leave a Comment',
			'comment_notes_before' => '',
			'comment_notes_after' => '',
		);
		comment_form($args); 
	?>

</div><!-- .comments-area -->
