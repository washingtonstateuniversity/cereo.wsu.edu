<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="article-header">
		<hgroup>
			<h1 class="article-title"><?php the_title(); ?></h1>
		</hgroup>
	</header>

	<div class="article-body">
		<?php the_content(); ?>
	</div>

</article>