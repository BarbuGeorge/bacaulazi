<nav class="navbar navbar-expand-lg navbar-dark">
	<div class="container-fluid d-flex flex-wrap position-relative px-lg-0 px-4">
		<div class="navbar-brand-wrapper">
			<a class="navbar-brand"  href="<?php echo home_url(); ?>">
				<img alt="logo" src="<?php echo get_template_directory_uri() . '/images/logo.jpg'; ?>" />
			</a>
		</div>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-hamburger">
				<label for="check">
					<input type="checkbox" id="check" />
					<span></span>
					<span></span>
					<span></span>
				</label>
			</span>
		</button>
		<div class="collapse navbar-collapse justify-content-center pb-lg-0 pb-6" id="navbarNav">
			<form class="mb-2 d-lg-none d-flex" action="<?php echo home_url(); ?>" id="search-form" method="get">
				<input class="search-input" type="text" name="s" id="s" value="Cauta..." onblur="if(this.value=='')this.value='Cauta...'"
				onfocus="if(this.value=='Cauta...')this.value=''" />
				<input type="hidden" value="submit" />
			</form>
			<?php wp_nav_menu(array(
				'menu'           => 'nav-menu',
				'theme_location' => '__no_such_location',
				'fallback_cb'    => false,
				'class' => 'top-menu'
			)); ?>
			<a class="me-3 d-lg-none d-flex align-items-center text-white fs-6 mt-2" href="tel:+40769486942">
				<i class="fa-solid fa-phone-flip me-2"></i>
				+40769486942
			</a>
			<div class="py-2 ms-4 d-lg-flex d-none">
				<a class="me-3" href="tel:+40769486942">
					<i class="fa-solid fa-phone-flip"></i>
				</a>
				<a class="text-primary search-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
					<i class="fa-solid fa-search"></i>
				</a>
			</div>
		</div>
	</div>
</nav>

<?php get_template_part('templates-parts/search-modal');?>