<?php

add_action('admin_menu', 'register_hijri_calendar_menu_page');
define( 'HCAL_DOMAIN', 'hijri-calendar' );

function register_hijri_calendar_menu_page() {

add_menu_page('Hijri Calendar', 'Hijri Calendar', 'add_users', __FILE__, 'hijri_calendar_usage', plugins_url('hijri-calendar/images/icon.png'));

add_submenu_page(__FILE__, __('Usage', HCAL_DOMAIN ), __('Usage', HCAL_DOMAIN ), 'add_users', __FILE__, 'hijri_calendar_usage');

add_submenu_page(__FILE__, 'Settings', 'Settings', 'manage_options', 'hijri_calendar_settings', 'hijri_calendar_settings_page');

add_submenu_page(__FILE__, 'Server Information', 'Server Information', 'add_users', 'hijri_calendar_server_info', 'hijri_calendar_server_info_menu');

add_action( 'admin_init', 'register_hijri_calendar_settings' );
}

function register_hijri_calendar_settings() {

//register our settings
register_setting( 'hijri_calendar-settings-group', 'hijri_calendar_option1' );}

include "admin/sidebar.php";

function hijri_calendar_usage() {
if ( !current_user_can( 'manage_options' ) )  {
wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}
include "admin/usage.php";
}

function hijri_calendar_settings_page() {
if ( !current_user_can( 'manage_options' ) )  {
wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}
include "admin/settings.php";
}

function hijri_calendar_server_info_menu() {
if ( !current_user_can( 'manage_options' ) )  {
wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}
include "admin/server_info.php";
}
?>