<div class="article-title">
	<h2 class="article-title person-last-name"><?php the_title(); ?></h2>
	<ul class="person-short-info">
		<?php if ( $cereo_person_dept = get_post_meta( get_the_ID(), 'cereo_person_department', true ) ) : ?>
			<li>Department: <?php echo esc_html( $cereo_person_dept ); ?></li>
		<?php endif; ?>
		<?php if ( $cereo_person_theme = get_post_meta( get_the_ID(), 'cereo_person_theme', true ) ) : ?>
			<li>CEREO Theme: <?php echo esc_html( $cereo_person_theme ); ?></li>
		<?php endif; ?>
	</ul>
</div>
<div class="article-body">
	<?php the_content(); ?>
</div>
