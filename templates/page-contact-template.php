<?php /* Template Name: Page-Contact */ ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include __DIR__ . ('/../_meta.php'); ?>
</head>

<body class="page-contact-wrapper">

	<?php get_header();?>

	<main class="page-contact">
		<?php get_template_part('templates-parts/page-contact/form-contact');?>
	</main>

	<?php
		get_footer();
	?>

</body>

</html>
