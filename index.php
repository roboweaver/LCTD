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

		<div class="container-fluid container-height" id="content-area">
			<div class="row row-height">
				<div class="col-md-2 col-height hidden-sm hidden-xs orange"></div>
				<div class="col-md-8 col-height">
					<?php get_header(); ?>
					<div class="row">
						<div class="col-md-2 left-nav">
							<div class="row">
								<?php
								require_once 'Bootstrap_Walker_Nav_Menu.php';
								wp_nav_menu( array(
									'menu' => 'lctd-left-menu',
									'menu_class' => 'btn-group-vertical btn-block',
									'container' => 'false',
									'depth' => -1,
									'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
									'walker' => new BootStrap_Walker_Nav_Menu()
								) );
								?>
							</div>
							<div class="row">
								<div class="col-md-12">
									<b><font face="Tahoma Small Cap" size="2">Click below to<br>
										Donate with PayPal</font></b>
									<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
										<input name="cmd" value="_s-xclick" type="hidden">
										<input name="hosted_button_id" value="1289646" type="hidden">
										<input name="submit" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" align="bottom" border="0" type="image">
										<img src="/images/pixel.gif" height="1" width="1">
									</form>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<a href="http://www.facebook.com/pages/Livermore-Community-Thanksgiving-Dinner/191220754276435" target="_new">
										<img src="<?php echo get_template_directory_uri(); ?>/images/icon-Facebook.png" alt="Find Us On Facebook" height="36" width="36">
									</a>
									<div class="clear">Find us on Facebook</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<?php
							//loop to get content
							if ( have_posts() ) :
								while ( have_posts() ) : the_post();
									the_content();
								endwhile;
							endif;
							?>
						</div>	
					</div>
					<div class="row navbar-inverse footer">
						<div class="col-md-2 hidden-sm hidden-xs"></div>
						<div class="col-md-8">
							<?php get_footer(); ?>
						</div>
						<div class="col-md-2"></div>
					</div>
				</div>
				<div class="col-md-2 col-height hidden-sm hidden-xs orange"></div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>