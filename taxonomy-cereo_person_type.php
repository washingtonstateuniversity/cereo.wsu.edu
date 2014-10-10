<?php

get_header();

?>

	<main class="spine-tax-index">

		<?php get_template_part('parts/headers'); ?>

		<section class="row single gutter pad-ends">

			<div class="column one">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'articles/person' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!--/column-->

		</section>
		<?php
		/* @type WP_Query $wp_query */
		global $wp_query;

		$big = 99164;
		$args = array(
			'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'       => 'page/%#%',
			'total'        => $wp_query->max_num_pages, // Provide the number of pages this query expects to fill.
			'current'      => max( 1, get_query_var('paged') ), // Provide either 1 or the page number we're on.
		);
		?>
		<footer class="main-footer archive-footer">
			<section class="row side-right pager prevnext gutter">
				<div class="column one">
					<?php echo paginate_links( $args ); ?>
				</div>
				<div class="column two">
					<!-- intentionally empty -->
				</div>
			</section><!--pager-->
		</footer>
	</main>
<?php

get_footer();