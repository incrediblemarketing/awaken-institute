<?php
global $post;
global $gallerycount;
$gallerycount++;
?>
<article class="gallery__item" id="post-<?php the_ID(); ?>">
	<?php
	$gallery_images = get_field( 'gallery_images' );
	$count          = 0;
	if ( $gallery_images ) :
		?>
		<div class="ba__images" data-toggle="lightbox">
			<?php foreach ( $gallery_images as $image ) : ?>
					<?php if ( $count < 1 ) : ?>
					<div class="image__holder">
						<img src="<?php echo esc_url( $image['sizes']['gallery_thumb'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
					</div>
					<?php endif; ?>
					<?php $count++; ?>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<div class="card__bottom">
		<h2>Case 0<?php echo esc_attr( $gallerycount ); ?></h2>
		<div class="gallery__procedures" >
			<?php the_content(); ?>
		</div>
	</div>

	<div class="lightbox--patient">
		<button data-toggle="lightbox">
			<div class="span__holder">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</button>
			<div class="lightbox--container">
				<div class="col-12">
					<div class="block__content">
						<?php
						get_template_part( 'components/svg/exit-ico' );
						$count = count( $gallery_images );
						if ( $gallery_images ) :
							?>
							<?php if ( $count > 2 ) : ?>
							<div class="ba__images small-images">
						<?php else : ?>
							<div class="ba__images">
						<?php endif; ?>
								<?php foreach ( $gallery_images as $image ) : ?>
										<div class="image__holder">
											<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
										</div>
										<?php $count++; ?>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="card__bottom">
							<h2>Case 0<?php echo esc_attr( $gallerycount ); ?></h2>
							<div class="gallery__procedures">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</article>
