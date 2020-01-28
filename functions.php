<?php

function office_master_theme_support(){
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_image_size('slider_image', 1500, 500, true);
}

add_action('after_setup_theme', 'office_master_theme_support');


function office_master_css_js(){

    wp_enqueue_style('google-font-1'/*handler name*/, '//fonts.googleapis.com/css?family=Open+Sans:400,300'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);
    wp_enqueue_style('google-font-2'/*handler name*/, '//fonts.googleapis.com/css?family=PT+Sans'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);
    wp_enqueue_style('google-font-2'/*handler name*/, '//fonts.googleapis.com/css?family=Raleway'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);

    wp_enqueue_style('bootstrap'/*handler name*/, get_template_directory_uri().'/assets/bootstrap/css/bootstrap.css'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);

    wp_enqueue_style('font-awsome'/*handler name*/, get_template_directory_uri().'/assets/css/font-awesome.min.css'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);

    wp_enqueue_style('font-awsome'/*handler name*/, get_template_directory_uri().'/assets/css/font-awesome.min.css'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);
    
    wp_enqueue_style('style'/*handler name*/, get_template_directory_uri().'/assets/css/style.css'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);

    wp_enqueue_style('animate'/*handler name*/, get_template_directory_uri().'/assets/css/animate.min.css'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);
    wp_enqueue_style('style-project'/*handler name*/, get_template_directory_uri().'/assets/css/style-projects.css'/*location */, null/*priority*/, null/*version*/, 'all'/* media =all */);

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('wow-js', get_template_directory_uri().'/js/wow.min.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'office_master_css_js');



function on_page_js_code(){
    ?>
        <script>
            new WOW().init();
        </script>
    <?php
}

add_action('wp_footer', 'on_page_js_code', 30);


function office_master_custom_post(){
    register_post_type('office_master_slider', array(
        'labels'=>array(
            'name'=>'Main Slider',
            'menu_name'=>'Slider Menu',
            'all_items'=>'All Sliders',
            'add_new'=> 'Add New Slider',
            'add_new_item'=> 'Add new slide item',
        ),
        'public'=>true,
        'supports'=>array(
            'title',
            'thumbnail',
            'revisions',
            'custom-fields',
            'page-attributes',
        )
    ));
}

add_action('init', 'office_master_custom_post');