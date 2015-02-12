<?php
/**
 * Custom template tags for WPCore
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *

 */

if ( ! function_exists( 'wpcore_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 */
function wpcore_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'wpcore' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'wpcore' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'wpcore' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'wpcore_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 */
function wpcore_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<li class="sticky-post">%s</li>', __( 'Featured', 'wpcore' ) );
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<li>%1$s<a href="%2$s">%3$s</a></li>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'wpcore' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<li><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></li>',
			_x( 'Posted on', 'Used before publish date.', 'wpcore' ),
			esc_url( get_permalink() ),
			$time_string
		);
	}

	if ( 'post' == get_post_type() ) {
		if ( is_singular() || is_multi_author() ) {
			printf( '<li><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></li>',
				_x( 'Author', 'Used before post author name.', 'wpcore' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'wpcore' ) );
		if ( $categories_list && wpcore_categorized_blog() ) {
			printf( '<li><span class="screen-reader-text">%1$s </span>%2$s</li>',
				_x( 'Categories', 'Used before category names.', 'wpcore' ),
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'wpcore' ) );
		if ( $tags_list ) {
			printf( '<li><span class="screen-reader-text">%1$s </span>%2$s</li>',
				_x( 'Tags', 'Used before tag names.', 'wpcore' ),
				$tags_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<li><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></li>',
			_x( 'Full size', 'Used before full size attachment link.', 'wpcore' ),
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<li>';
		comments_popup_link( __( 'Leave a comment', 'wpcore' ), __( '1 Comment', 'wpcore' ), __( '% Comments', 'wpcore' ) );
		echo '</li>';
	}
}
endif;

/**
 * Determine whether blog/site has more than one category.
 *
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function wpcore_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wpcore_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wpcore_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wpcore_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wpcore_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in {@see wpcore_categorized_blog()}.
 *
 */
function wpcore_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'wpcore_categories' );
}
add_action( 'edit_category', 'wpcore_category_transient_flusher' );
add_action( 'save_post',     'wpcore_category_transient_flusher' );

if ( ! function_exists( 'wpcore_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 */
function wpcore_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'wpcore_get_link_url' ) ) :
/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 *
 * @see get_url_in_content()
 *
 * @return string The Link format URL.
 */
function wpcore_get_link_url() {
	$has_url = get_url_in_content( get_the_content() );

	return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;

if ( ! function_exists( 'wpcore_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function wpcore_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading %s', 'wpcore' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'wpcore_excerpt_more' );
endif;
