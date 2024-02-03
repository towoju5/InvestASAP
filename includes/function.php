<?php

function my_custom_menu_page() {
    add_menu_page(
        'My Custom Page',
        'Invest',
        'subscriber',
        'investments',
        'my_custom_menu_callback',
        'dashicons-palmtree',
        20
    );

    add_submenu_page(
        'investments',
        'Submenu Page',
        'New investment',
        'subscriber',
        'investment-plans',
        'plans'
    );
}
add_action('admin_menu', 'my_custom_menu_page');
add_shortcode('investAsap_plans', 'plans');

function my_custom_menu_callback() {
    echo '<div class="wrap">';
    echo '<h1>My Custom Page</h1>';
    echo '</div>';
}

function plans() {
    include_once plugin_dir_path( __FILE__ ) . '../public/plans.php';
}

