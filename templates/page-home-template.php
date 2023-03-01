<?php /* Template Name: Page-home */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__ . ('/../_meta.php'); ?>
</head>

<body>

	<?php get_header();?>

	<main class="page-home">
		<?php get_template_part('templates-parts/page-home/mixed-articles');?>
		<?php get_template_part('templates-parts/page-home/politica-articles-row');?>
		<?php get_template_part('templates-parts/page-home/sanatate-articles-row');?>
		<?php get_template_part('templates-parts/page-home/sport-articles-row');?>
	</main>

	<?php
		get_footer();
	?>

</body>

</html>
