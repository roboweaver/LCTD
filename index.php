<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package LCTD
 * @subpackage LCTD
 * @since Livermore Community Thanksgiving Dinner 1.0
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?></title>

        <?php wp_head(); ?>
    </head>
    <body>

        <div class="container-fluid container-height" id="content-area">
            <div class="row row-height">
                <div class="col-md-2 col-height hidden-sm hidden-xs orange"></div>
                <div class="col-md-8 col-height">
                    <?php get_header(); ?>
                    <div class="row">
                        <div class="col-xs-2 col-md-2 left-nav">
                            <div class="row">
                                <?php
                                require_once (trailingslashit(get_template_directory()) . 'BootStrap_Walker_Nav_Menu.php');
                                wp_nav_menu(array(
                                    'menu' => 'lctd-left-menu',
                                    'menu_class' => 'btn-group-vertical btn-block',
                                    'container' => 'false',
                                    'depth' => -1,
                                    'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
                                    'walker' => new BootStrap_Walker_Nav_Menu()
                                ));
                                ?>
                            </div>
                            
                            <?php get_template_part("social"); ?>

                        </div>
                        <div class="col-xs-10 col-md-10">
                            <?php
                            //loop to get content
                            if (have_posts()) :
                                while (have_posts()) : the_post();
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
