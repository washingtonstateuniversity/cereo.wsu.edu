<?php

get_header();

?>
   <style>.person-last-name { font-size: 1rem; }</style>
	<main class="spine-tax-index">

		<?php get_template_part('parts/headers'); ?>

		<section class="row single gutter pad-ends">

			<div class="column one" id="accordion">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'articles/person' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!--/column-->

		</section>

	</main>
<?php

get_footer();