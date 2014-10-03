<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo( 'name' ); ?></title>

		<?php wp_head(); ?>
    </head>
    <body>

		<div>
			<div class="col-md-2 hidden-sm hidden-xs orange"></div>
			<div class="col-md-8">
				<?php get_header(); ?>

				<div class="row">
					<div class="col-md-2 left-nav">

						<?php
						require_once 'BootStrap_Walker_Nav_Menu.php';
						wp_nav_menu( array(
							'menu' => 'lctd-left-menu',
							'menu_class' => 'btn-group-vertical btn-block',
							'container' => 'false',
							'depth' => -1,
							'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
							'walker' => new BootStrap_Walker_Nav_Menu()
						) );
						?>
						<!--
						<a href="/" class="btn btn-info" >Home</a>
						<a href="announcement.html" class="btn btn-info">Announcements</a>
						<a href="donations.htm"  class="btn btn-info">Donations</a>
						<a href="volunteer.html" class="btn btn-info">Volunteer</a>
						<a href="jobs.html" class="btn btn-info">Jobs</a>
						<a href="contactus.html" class="btn btn-info">Contact us</a>
						-->

					</div>

					<div class="col-md-8">
						<?php
//loop to get content
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								the_content();
							endwhile;
						endif;
						?></div>
					<div class="col-md-2">Right Nav goes here</div>
				</div>
				<?php wp_footer(); ?>
			</div>
			<div class="col-md-2 hidden-sm hidden-xs orange" />
		</div>
    </body>
</html>