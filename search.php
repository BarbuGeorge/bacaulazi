<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('_meta.php'); ?>
</head>

<body>

	<?php get_header(); ?>

	<main>

		<section class="container ss">
			<div class="row">
				<?php
				$s = get_search_query();
				$args = array(
					's' => $s
				);
				// The Query
				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) {
					_e("<h2 style='font-weight:bold;color:#000'>Rezultate cautarii</h2>");
					while ($the_query->have_posts()) {
						$the_query->the_post();
				?>

						<div class="col-lg-4 mb-lg-8 mb-4">
							<?php get_template_part('templates-parts/news-card'); ?>
						</div>
					<?php
					}
				} else {
					?>
					<h2 class="fw-bold text-center">Din pacate nu avem rezultatele dorite :(</h2>
				<?php } ?>

			</div>
		</section>

	</main>

	<?php get_footer(); ?>

</body>

</html>