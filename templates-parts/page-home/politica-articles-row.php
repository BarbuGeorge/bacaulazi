<section class="news">
	<?php
	$catObj = get_category_by_slug('politica');
	$catName = $catObj->name ;?>
	<div class="bg-primary py-4 mb-8 px-6">
		<h5 class="text-light mb-0">
			<?php
			echo $catName;; ?>
		</h5>
	</div>
	<div class="row">
		<?php
		$wpb_all_query = new WP_Query(array(
			'post_type' =>
			'post', 'category_name' => $catName, 'post_status' => 'publish',
			'orderby' => 'date', 'order' => 'ASC',
			'posts_per_page' => 3,
		)); ?>
		<?php if ($wpb_all_query->have_posts()) : ?>
			<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
				<div class="col-lg-4">
					<?php get_template_part('templates-parts/news-card'); ?>
				</div>
		<?php endwhile;
		endif; ?>
		<?php wp_reset_query(); ?>
	</div>
</section>