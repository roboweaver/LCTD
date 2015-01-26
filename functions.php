<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function load_styles_and_scripts() {
    wp_enqueue_style('bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('main-styles', get_stylesheet_uri());

    wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery.min.js');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js');
    wp_enqueue_script('iconDock', get_template_directory_uri() . '/js/jqueryjqDoc.min.js');
}

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');

register_nav_menu('lctd-menu', 'LCTD Menu');

register_nav_menu('lctd-left-menu', 'LCTD Left Hand Nav');

$options = array(
    array("name" => "Left Image",
        "type" => "image",
        "id" => "left_header_image",
        "std" => trailingslashit(get_template_directory_uri()) . "images/2_halloween_t14.jpg",
        "label" => __('Left Image', $shortname)
    ),
    array("name" => "Right Image",
        "type" => "image",
        "id" => "right_header_image",
        "std" => trailingslashit(get_template_directory_uri()) . "images/1e_halloween_t14.jpg",
        "label" => __('Right Image', $shortname)
    ),
    array("name" => "ThemeRoller theme",
        "desc" => "ThemeRoller theme to display with",
        "id" => $shortname . "_themeroller_theme",
        "type" => "select",
        "std" => "omnis",
        "options" => get_themeroller_names()
    ),
    array("type" => "close")
);

/**
 * Get the theme names from disk ....
 */
function get_themeroller_names() {
    $path = trailingslashit(get_template_directory()) . "css";
    $return_value = array();

    foreach (new DirectoryIterator($path) as $file) {
        if ($file->isDot()) {
            continue;
        }
        if ($file->isDir()) {
            array_push($return_value, $file->getFilename());
        }
    }
    asort($return_value);
    return $return_value;
}

/**
 * Add our customization options ...
 */
add_action('customize_register', 'lctd_customize');

/**
 * Customize call back
 * 
 * @param type $wp_customize
 */
function lctd_customize($wp_customize) {

    $wp_customize->add_section('lctd_demo_settings', array(
        'title' => 'Demonstration Stuff',
        'priority' => 35,
    ));

    $wp_customize->add_setting('some_setting', array(
        'default' => 'default_value',
    ));

    global $options, $shortname;

    // Register the settings with Validation callback
    // Add settings section
    $wp_customize->add_section('omnis_text_section', array('title' => 'General Settings',
        'priority' => 35,
            )
    );

    foreach ($options as $value) {
        switch ($value['type']) {
            case "open":
            case "close":
            case "title":
                break;
            case "image":
                $wp_customize->add_section(
                        'omnis_logo_section', 
                        array(
                            'title' => 'Logo',
                            'priority' => 35,
                        )
                );
                $wp_customize->add_setting($value['id'], array('default' => $value['std'],));
                $wp_customize->add_control(
                        new WP_Customize_Image_Control(
                            $wp_customize, 
                            $value['id'], 
                            array(
                                'label' => $value['label'],
                                'section' => 'omnis_logo_section',
                                'settings' => $value['id'],
                                'priority' => 1
                                )
                            )
                        );
                break;
            default:
        }
    }
}
