<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function load_styles_and_scripts() {
    wp_enqueue_style('bootstrap-styles', get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style('main-styles', get_stylesheet_uri());
    
    wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.js');   
	wp_enqueue_script('iconDock', get_template_directory_uri().'/js/jqueryjqDoc.min.js');
}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');

register_nav_menu('lctd-menu', 'LCTD Menu');

register_nav_menu('lctd-left-menu', 'LCTD Left Hand Nav');