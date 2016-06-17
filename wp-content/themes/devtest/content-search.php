<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package storto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg"><a href="' .esc_url(get_permalink()). '">';
			the_post_thumbnail('normal-post');
			echo '</a></div>';
		}
	?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php storto_posted_on(); ?>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><i class="fa fa-comment-o spaceRight"></i><?php comments_popup_link( __( 'Leave a comment', 'storto' ), __( '1 Comment', 'storto' ), __( '% Comments', 'storto' ) ); ?></span>
			<?php endif; ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'storto' ), '<span class="edit-link"><i class="fa fa-pencil-square-o spaceRight"></i>', '</span>' ); ?>
		<div class="readMoreLink">
			<a href="<?php echo esc_url(get_permalink()); ?>"><?php _e('Read More', 'storto') ?><i class="fa spaceLeft fa-angle-double-right"></i></a>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->