<section class="pt-9 pb-0">
	<div class="row justify-content-between">

		<!-- Loop Stirea Saptamanii -->
		<div class="col-lg-9 col-12 stirea-saptamanii">
			<h4>Stirea saptamanii</h4>
			<?php
			$wpb_all_query = new WP_Query(array(
				'post_type' =>
				'post', 'category_name' => 'stirea-saptamanii', 'post_status' => 'publish',
				'orderby' => 'date','order'=>'ASC',
				'posts_per_page' => 1,
			)); ?>
			<?php if ($wpb_all_query->have_posts()) : ?>
				<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
					<?php get_template_part('templates-parts/news-card');?>
				<?php endwhile;
			endif; ?>
			<?php wp_reset_query(); ?>
		</div>

		<!-- Loop Alte Stiri -->
		<div class="col-lg-3 col-12 alte-stiri">
		<h4>Alte stiri</h4>
		<?php
			$wpb_all_query = new WP_Query(array(
				'post_type' =>
				'post', 'category_name' => 'stiri', 'post_status' => 'publish',
				'orderby' => 'date','order'=>'ASC',
				'posts_per_page' => 3,
			)); ?>
			<?php if ($wpb_all_query->have_posts()) : ?>
				<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
					<?php get_template_part('templates-parts/news-card');?>
				<?php endwhile;
			endif; ?>
			<?php wp_reset_query(); ?>
		</div>
	</div>
		<!-- Loop Ultimele Stiri -->
		<div class="ultimele-stiri mt-7">
				<h4>Ultimele Stiri</h4>
				<div class="row">
					<?php
					$wpb_all_query = new WP_Query(array(
						'post_type' =>
						'post', 'category_name' => 'stiri', 'post_status' => 'publish',
						'orderby' => 'date','order'=>'DESC',
						'posts_per_page' => 4,
					)); ?>
					<?php if ($wpb_all_query->have_posts()) : ?>
						<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
							<div class="col-lg-3 col-12">
								<?php get_template_part('templates-parts/news-card');?>
							</div>
						<?php endwhile;
					endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
</section>