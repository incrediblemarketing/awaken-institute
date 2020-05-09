<?php
get_header(); ?>

<div class="block block--page_header">
	<?php get_template_part( 'components/blocks/page_header' ); ?>
</div>

<div class="container-fluid page__gallery">
  <div class="row">
		<div class="col-xxl-2 offset-xxl-1 col-lg-3">
			<div class="widget">
				<h3>Filter Gallery</h3>
				<ul class="gallery--procedures">
					<?php
					$terms = get_terms(
						array(
							'taxonomy' => 'gallery_procedures',
							'child_of' => 0,
						)
					);
					?>
					<?php foreach ( $terms as $term ) : ?>
					<li data-set-procedure="<?php echo $term->term_id; ?>"><?php echo ( $term->term_id == $procedure ) ? 'class="active"' : ''; ?> <?php echo $term->name; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="col-lg-9 content--area">
			<?php if ( have_posts() ) : ?>
				<div id="grid__gallery" class="grid__gallery">
					<?php while ( have_posts() ) : ?>
						<?php the_post(); ?>
						<div id="archive-box" data-set-procedure="5"></div>
					<?php endwhile; ?> 
				</div>
				<button data-toggle="load-more" class="btn btn-primary">Load More</button>
			<?php else : ?>
				<?php get_template_part( 'components/post-not-found' ); ?>
			<?php endif; ?>
	  </div>
  </div>
</div>

<?php get_footer(); ?>
