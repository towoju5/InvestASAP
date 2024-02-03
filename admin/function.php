<?php

/**
 * Hook menu for admin
 */
// Add to functions.php or a custom plugin file
function add_admin_menus()
{
    add_menu_page(
        'Invest ASAP Settings',
        'Invest ASAP',
        'manage_options',
        'invest-asap',
        'invest_asap_admin',
        'dashicons-palmtree',
    );
}

function invest_asap_admin()
{
    // Your plugin page content goes here
    echo '<h2>Welcome to My Plugin Page</h2>';
}

// Hook the function to the admin menu
add_action('admin_menu', 'add_admin_menus');
