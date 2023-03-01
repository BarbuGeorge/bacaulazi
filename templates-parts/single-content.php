<?php if (has_post_thumbnail()) : ?>
	<div class="single-post-hero" style="background:url('<?php the_post_thumbnail_url(''); ?>')">
	<?php endif; ?>
	<div class="single-post-hero-text">
		<h3 class="text-white d-block"><?php the_title(); ?></h3>
		<?php
		global $post;
		$author_id = $post->post_author;
		echo get_avatar(get_the_author_meta('user_email', $author_id));
		?>
		<h6 class="text-white mb-2 mt-1"><?php the_author_meta('display_name', 1); ?></h6>
		<div class="details d-flex align-items-center text-muted">
			<?php echo get_the_date(); ?> x
			<?php echo get_post_meta(get_the_ID(), 'durata', true); ?>
		</div>
	</div>
	</div>
	<div class="single-post-content">
		<?php the_content(); ?>
		<div class="share-post">
			<div class="text-uppercase fs-6 fw-bold">Share this post</div>
			<div class="share-icons">
			<?php
			$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
				<a class="" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>" title="Share on Facebook">
					<i class="fab fa-xl fa-facebook-f"></i>
				</a>
				<a class="" href="">
					<i class="fab fa-xl fa-linkedin"></i>
				</a>
				<a class="" href="">
					<i class="fab fa-xl fa-twitter"></i>
				</a>
			</div>
		</div>
		<div class="tags">
			Tags:
			<?php
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
    echo $tag->name . ' ';
  }
}
?>
		</div>
		<hr>
		<div class="d-flex flex-column align-items-center mt-10">
			<?php
			global $post;
			$author_id = $post->post_author;
			echo get_avatar(get_the_author_meta('user_email', $author_id));
			?>
			<h6 class="text-dark mb-1 mt-1"><?php the_author_meta('display_name', 1); ?></h6>
			<div class="details text-muted mb-2 mt-1"><?php the_author_meta('description', 1); ?></div>

		</div>
	</div>