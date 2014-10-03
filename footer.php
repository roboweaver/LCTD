<!-- Footer -->
<?php
		require_once (trailingslashit( get_template_directory() ) . 'Bootstrap_Walker_Nav_Menu.php');
		wp_nav_menu( array(
			'menu' => 'lctd-left-menu',
			'menu_class' => 'btn-toolbar btn-block',
			'container' => 'false',
			'depth' => -1,
			'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
			'walker' => new BootStrap_Walker_Nav_Menu()
		) );
		?>