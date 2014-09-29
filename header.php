<div class="row navbar-inverse">
	<div class="col-lg-2 col-md-2 col-xs-3"><img src="<?php echo get_template_directory_uri(); ?>/images/2_halloween_t14.jpg" class="img-circle" height="131" width="58"></div>
	<div class="col-lg-8 col-md-8 col-xs-6">
		<h3 class="inverse"><?php bloginfo('name'); ?></h3>
		<p class="inverse text-right"><?php bloginfo('description'); ?></p>
		<!-- A dark one 
		<nav class="navbar" role="navigation">
			<div class="navbar-collapse collapse">
				<?php
				require_once 'Bootstrap_Walker_Nav_Menu.php';
				wp_nav_menu( array(
					'menu' => 'lctd-menu',
					'menu_class' => 'nav navbar-nav',
					'container' => 'false',
					'walker' => new BootStrap_Walker_Nav_Menu()
				) );
				?>
			</div>
		</nav>
		-->
	</div>
	<div class="col-lg-2 col-md-2 col-xs-3"><img class="img-rounded pull-right" src="<?php echo get_template_directory_uri(); ?>/images/1e_halloween_t14.jpg" height="132" width="210"></div>
</div>

