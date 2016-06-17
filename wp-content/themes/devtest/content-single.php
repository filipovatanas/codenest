<?php
/**
 * @package storto
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		if ( '' != get_the_post_thumbnail() ) {
			echo '<div class="entry-featuredImg">';
			the_post_thumbnail('normal-post');
			echo '</div>';
		}
	?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'storto' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer smallPart">
		<?php edit_post_link( __( 'Edit', 'storto' ), '<span class="edit-link"><i class="fa fa-pencil-square-o spaceRight"></i>', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
