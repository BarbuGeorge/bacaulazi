<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('_meta.php'); ?>
</head>

<body>

	<?php get_header(); ?>

	<main>
		<section class="section s1">
			<div class="bg-primary bg-primary py-4 mb-8 px-6 text-white"><h5 class="mb-0"><?php single_cat_title(); ?></h5></div>
			<div class="row">
				<!-- Check if there is a posts to show -->
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<!-- Mostra numero articoli -->

						<div class="col-xl-4 col-lg-6 col-12">
							<?php get_template_part('templates-parts/news-card'); ?>
						</div>

					<?php endwhile; ?>
				<?php else : ?>
			</div>
			<div class="text-center">
				<h5>Ne pare rau, inca nu avem articole disponibile pentru aceasta categorie.</h5>
			</div>
			<!-- Inserisce barra di ricerca -->
		<?php endif; ?>
		</div>
		</section>

	</main>

	<?php get_footer(); ?>

</body>

</html>