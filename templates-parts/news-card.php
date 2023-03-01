<div class="card">
	<div class="card-image">
		<a href="<?php the_permalink(); ?>">
			<img alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" src="<?php the_post_thumbnail_url(''); ?>" class="img-fluid">
		</a>
	</div>
	<div class="card-body px-0">
		<div class="post-date"><?php echo get_the_date();?></div>
		<a class="text-dark" href="<?php the_permalink(); ?>">
			<h5 class="card-title"><?php the_title();?></h5>
		</a>
	</div>
</div>