<?php
/*
Plugin Name: Custom footer
Plugin URI: https://github.com/mittmedia/portal
Description: Adds a custom footer text.
Version: 1.0.0
Author: Fredrik Sundström
Author URI: https://github.com/fredriksundstrom
License: MIT
*/

/*
Copyright (c) 2012 Fredrik Sundström

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/

require_once( 'wp_mvc-1.0.0/init.php' );

$custom_footer_app = new \WpMvc\Application();

$custom_footer_app->init( 'CustomFooter', WP_PLUGIN_DIR . '/custom_footer' );

// WP: Add pages
add_action( "network_admin_menu", "custom_footer" );
function custom_footer()
{
  add_submenu_page( 'settings.php', 'Custom Footer Settings', 'Custom Footer', 'Super Admin', 'custom_footer_settings', 'custom_footer_settings_page');
}

function custom_footer_settings_page()
{
  global $custom_footer_app;
  
  $custom_footer_app->footer_controller->index();
}
