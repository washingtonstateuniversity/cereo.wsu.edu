<?php

get_header();

?>

	<main class="spine-tax-index">

		<?php get_template_part('parts/headers'); ?>

		<section class="row single gutter pad-ends">
			<div class="column one">
				<form role="search" method="get" class="search-form" action="#">
					<label>
						<span class="screen-reader-text">Search for:</span>
						<input type="search" class="search-field" placeholder="Search" value="" name="s" title="Search for:" />
					</label>
					<input type="submit" class="search-submit" value="Search" />
				</form>
			</div>
		</section>
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