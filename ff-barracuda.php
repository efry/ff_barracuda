<?php
/*
Plugin Name: Barracuda
Plugin URI:  http://fusionfarm.com
Description: This describes barracuda plugin in a short sentence
Author:      Fusionfarm
Author URI:  http://fusionfarm.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Version: 1.0.7
Domain Path: /languages
Text Domain: Barracuda
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once( WPMU_PLUGIN_DIR . '/class-pluginupdater.php' );
if ( is_admin() ) {
    new FFGitHubPluginUpdater( __FILE__, 'efry', "ff_barracuda" );
}

require(ABSPATH . WPINC . '/pluggable.php');

global $current_user;
get_currentuserinfo();

add_action('admin_menu', 'barracuda_admin_menu');
function barracuda_admin_menu(){
    add_menu_page( 'Barracuda', 'Barracuda', 'manage_options', 'ff-barracuda/forms/barracuda-settings-form.php', '', plugins_url( "img/fusionfarm-icon.png", __FILE__ ), 1069);
}


add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'barracuda-script-handle', plugins_url('/js/barracuda-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}


add_action( 'admin_init', 'barracuda_plugin_settings' );
function barracuda_plugin_settings() {
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_active_color' );
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_inactive_color' );
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_recent_drafts');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_plugins');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_incoming_links');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_recent_comments');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_secondary');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_activity');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_right_now');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_quick_press');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_dashboard_primary');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_welcome_panel');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_pre_site_transient_update_core');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_pre_site_transient_update_plugins');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_pre_site_transient_update_themes');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_lcs');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_wp_wpseo-dashboard-overview');
    register_setting( 'barracuda-plugin-settings-group', 'barracuda_header_image');
}


register_activation_hook(__FILE__,'register_barracuda');
function register_barracuda(){
    add_option('barracuda_active_color', '#ea2529', '', 'yes');
    add_option('barracuda_inactive_color', '#3a3a3a', '', 'yes');
    add_option('barracuda_wp_dashboard_recent_drafts', '1', '', 'yes');
    add_option('barracuda_wp_dashboard_plugins', '1', '', 'yes');
    add_option('barracuda_wp_dashboard_incoming_links', '1', '', 'yes');
    add_option('barracuda_wp_dashboard_recent_comments', '1', '', 'yes');
    add_option('barracuda_wp_dashboard_secondary', '1', '', 'yes');
    add_option('barracuda_wp_dashboard_activity', '1', '', 'yes');
    add_option('barracuda_wp_dashboard_right_now', '1', '', 'yes');
    add_option('barracuda_wp_dashboard_quick_press', '1', '', 'yes');
    add_option('barracuda_wp_dashboard_primary', '1', '', 'yes');
    add_option('barracuda_wp_welcome_panel', '1', '', 'yes');
    add_option('barracuda_wp_pre_site_transient_update_core', '1', '', 'yes');
    add_option('barracuda_wp_pre_site_transient_update_plugins', '1', '', 'yes');
    add_option('barracuda_wp_pre_site_transient_update_themes', '1', '', 'yes');
    add_option('barracuda_lcs', '0', '', 'yes');
    add_option('barracuda_wp_wpseo-dashboard-overview', '1', '', 'yes');
    add_option('barracuda_header_image','', '', 'yes');
}
register_deactivation_hook(__FILE__,'register_barracuda_remove');
function register_barracuda_remove(){
    delete_option('barracuda_active_color');
    delete_option('barracuda_inactive_color');
    delete_option('barracuda_wp_dashboard_recent_drafts');
    delete_option('barracuda_wp_dashboard_plugins');
    delete_option('barracuda_wp_dashboard_incoming_links');
    delete_option('barracuda_wp_dashboard_recent_comments');
    delete_option('barracuda_wp_dashboard_secondary');
    delete_option('barracuda_wp_dashboard_activity');
    delete_option('barracuda_wp_dashboard_right_now');
    delete_option('barracuda_wp_dashboard_quick_press');
    delete_option('barracuda_wp_dashboard_primary');
    delete_option('barracuda_wp_welcome_panel');
    delete_option('barracuda_wp_pre_site_transient_update_core');
    delete_option('barracuda_wp_pre_site_transient_update_plugins');
    delete_option('barracuda_wp_pre_site_transient_update_themes');
    delete_option('barracuda_lcs');
    delete_option('barracuda_wp_wpseo-dashboard-overview');
    delete_option('barracuda_header_image');
}

//****** ADMIN PAGE STYLES AND OVERWRITES ******//
function fd_admin_footer_text($left){
    $left = '<a href="http://fusionfarm.com/contact/" target="_blank"><img src="' . plugins_url('/img/header-logo.png', __FILE__) . '" width="100" align="left" style="padding:5px 10px 0 0;"/>' . esc_html__('A DIGITAL MARKETING & CREATIVE AGENCY ', 'text-domain') . '</a>';
    return $left;
}
add_filter('admin_footer_text', 'fd_admin_footer_text');

function remove_dashboard_meta() {
        $wp_welcome_panel = get_option('barracuda_wp_welcome_panel');
        $wp_news_widget = get_option('barracuda_wp_dashboard_primary');
        $wp_quick_draft = get_option('barracuda_wp_dashboard_quick_press');
        $wp_at_a_glance = get_option('barracuda_wp_dashboard_right_now');
        $wp_activity = get_option('barracuda_wp_dashboard_activity');
        $wp_secondary = get_option('barracuda_wp_dashboard_secondary');
        $wp_recent_comments = get_option('barracuda_wp_dashboard_recent_comments');
        $wp_incoming_links = get_option('barracuda_wp_dashboard_incoming_links');
        $wp_dash_plugins = get_option('barracuda_wp_dashboard_plugins');
        $wp_recent_drafts = get_option('barracuda_wp_dashboard_recent_drafts');
        
        if($wp_incoming_links == '0'){
            remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        }
        if($wp_dash_plugins == '0'){
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        }
        if($wp_news_widget == '0'){
            remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        }
        if($wp_secondary == '0'){
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        }
        if($wp_quick_draft == '0'){
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        }
        if($wp_recent_drafts == '0'){
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        }
        if($wp_recent_comments == '0'){
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        }
        if($wp_activity == '0'){
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
        }
        if($wp_at_a_glance == '0'){
            remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        }
        if($wp_welcome_panel == '0'){
            remove_action( 'welcome_panel', 'wp_welcome_panel' );
        } else {
            add_action('welcome_panel', 'wp_welcome_panel');
        }
}
add_action( 'admin_menu', 'remove_dashboard_meta' );

// function remove_core_updates(){
//     global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
// }
// $core_updates = get_option('barracuda_wp_pre_site_transient_update_core');
// $plugin_updates = get_option('barracuda_wp_pre_site_transient_update_plugins');
// $theme_updates = get_option('barracuda_wp_pre_site_transient_update_themes');

// if( $current_user->user_login != 'webapps' && $current_user->user_login != 'project.team' ){
//     if($core_updates == '0'){    
//         add_filter('pre_site_transient_update_core','remove_core_updates');
//     } else {
//         remove_filter('pre_site_transient_update_core','remove_core_updates');
//     }
//     if($plugin_updates == '0'){
//         add_filter('pre_site_transient_update_plugins','remove_core_updates');
//     } else {
//         remove_filter('pre_site_transient_update_plugins','remove_core_updates');
//     }
//     if($theme_updates == '0'){
//         add_filter('pre_site_transient_update_themes','remove_core_updates');
//     } else {
//         remove_filter('pre_site_transient_update_themes','remove_core_updates');
//     }
// }

function custom_admin_logo() {
    $active_color = get_option('barracuda_active_color');
    $inactive_color = get_option('barracuda_inactive_color');
    $lcs = get_option('barracuda_lcs');
    $wp_yoast_seo = get_option('barracuda_wp_wpseo-dashboard-overview');
    $header_img_get = get_option('barracuda_header_image');
    if($header_img_get != null){
        $header_img = get_option('barracuda_header_image');
    } else {
        $header_img = plugins_url('/img/footer-logo.png', __FILE__);
    }
    echo '
        <style type="text/css">
            #wp-admin-bar-wp-logo { 
                display: none;
            }
            
            .wp-admin #wpadminbar #wp-admin-bar-site-name {
                background-image: url('.$header_img.') !important;
                background-size: 100px !important;
                background-repeat: no-repeat !important;
                background-position: 50% 50% !important;
            }
            
            #wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar .ab-top-menu>li:hover>.ab-item, #wpadminbar .ab-top-menu>li>.ab-item:focus, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus {
                background: rgba(0,0,0,0.25) !important;
            }
            #wpwrap {
                /*background-image: url('.get_bloginfo('stylesheet_directory').'/img/fusionfarm-idea-box.png) !important;
                background-position: 54% 50%;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 56%;*/

            }
            #wpbody {
                /*background-color: rgba(251,251,251,0.8);*/
            }
            .wp-admin #wpadminbar #wp-admin-bar-site-name.hover .ab-sub-wrapper {
                /*display: none;*/
            }
            .wp-admin #wpadminbar #wp-admin-bar-site-name>.ab-item {
                width: 100px;
                padding: 0px 10px;
            }
            .wp-admin #wpadminbar #wp-admin-bar-site-name>.ab-item:before {
                content: "" !important;
            }
            #wpadminbar .ab-top-menu>li.hover>.ab-item, #wpadminbar .ab-top-menu>li:hover>.ab-item, #wpadminbar .ab-top-menu>li>.ab-item:focus, #wpadminbar.nojq .quicklinks .ab-top-menu>li>.ab-item:focus {
                color: '.$active_color.' !important;
            }
            #wpadminbar .quicklinks .menupop ul li a:focus, #wpadminbar .quicklinks .menupop ul li a:focus strong, #wpadminbar .quicklinks .menupop ul li a:hover, #wpadminbar .quicklinks .menupop ul li a:hover strong, #wpadminbar .quicklinks .menupop.hover ul li a:focus, #wpadminbar .quicklinks .menupop.hover ul li a:hover, #wpadminbar li #adminbarsearch.adminbar-focused:before, #wpadminbar li .ab-item:focus:before, #wpadminbar li a:focus .ab-icon:before, #wpadminbar li.hover .ab-icon:before, #wpadminbar li.hover .ab-item:before, #wpadminbar li:hover #adminbarsearch:before, #wpadminbar li:hover .ab-icon:before, #wpadminbar li:hover .ab-item:before, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus, #wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover {
                color: '.$active_color.' !important;
            }
            #wpadminbar>#wp-toolbar a:focus span.ab-label, #wpadminbar>#wp-toolbar li.hover span.ab-label, #wpadminbar>#wp-toolbar li:hover span.ab-label {
                color: '.$active_color.' !important;
            }
            #wpadminbar li.hover>.ab-sub-wrapper, #wpadminbar.nojs li:hover>.ab-sub-wrapper {
                /*display: none;*/
            }
            #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top, .folded #adminmenu li.wp-has-current-submenu {
                background: '.$active_color.' !important;
                color: #FFF !important;
            }
            #adminmenu .current div.wp-menu-image:before, #adminmenu .wp-has-current-submenu div.wp-menu-image:before, #adminmenu a.current:hover div.wp-menu-image:before, #adminmenu a.wp-has-current-submenu:hover div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu a:focus div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu.opensub div.wp-menu-image:before, #adminmenu li.wp-has-current-submenu:hover div.wp-menu-image:before {
                color: #FFF !important;
            }
            #adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus {
                color: '.$active_color.' !important;
            }
            #adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before {
                color: '.$active_color.' !important;
            }
            #adminmenu li.menu-top:hover,#adminmenu li.opensub>a.menu-top,#adminmenu li>a.menu-top:focus {
                color:'.$active_color.';
            }
            #adminmenu li a:focus div.wp-menu-image:before,#adminmenu li.opensub div.wp-menu-image:before,#adminmenu li:hover div.wp-menu-image:before {
                color:'.$active_color.';
            }
            a:active, a:hover {
                color: '.$inactive_color.' !important;
            }
            .wp-core-ui .button-primary {
                background: '.$active_color.' !important;
                border-color: '.$inactive_color.' !important;
                color: #FFF !important;
            }
            .view-switch {
                color: '.$active_color.' !important;
            }
            .view-switch a.current:before {
                color: '.$active_color.' !important;
            }
            .user-admin-color-wrap {
                display: none;
            }
            #wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon {
                color:#EEE !important;
            }
            #adminmenuwrap a {
                color: #EEE !important;
            }
            a {
                color:'.$active_color.' !important;
            }
            #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,#adminmenu .wp-menu-arrow,#adminmenu .wp-menu-arrow div,#adminmenu li.current a.menu-top,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,.folded #adminmenu li.current.menu-top,.folded #adminmenu li.wp-has-current-submenu {
                background:'.$active_color.';
            }
            #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
                color: '.$active_color.' !important;    
            }
            strong .post-com-count span {
                background-color:'.$active_color.';
            }
            strong .post-com-count:after {
                border-top:5px solid '.$active_color.';
            }
            .tablenav .next,.tablenav .prev {
                border-color:transparent;color:'.$active_color.';
            }
            .view-switch a.current:before {
                color:'.$active_color.';
            }
            .wp-slider .ui-slider-handle,.wp-slider .ui-slider-handle.focus,.wp-slider .ui-slider-handle.ui-state-hover {
                border:1px solid '.$active_color.';
            }
            .media-item .progress {
                background-color:'.$active_color.';
            }
            .theme-browser .theme.add-new-theme a:focus span:after,.theme-browser .theme.add-new-theme a:hover span:after {
                color:'.$active_color.';
            }
            .theme-browser .theme.add-new-theme a:focus:after,.theme-browser .theme.add-new-theme a:hover:after {
                background:'.$active_color.';
            }
            .theme-browser .theme .theme-installed {
                background:'.$active_color.';
            }
            .wp-full-overlay a.collapse-sidebar:hover {
                color:'.$active_color.'
            }
            .wp-badge {
                background:url(images/w-logo-white.png?ver=20131202) center 24px/85px 85px no-repeat '.$active_color.';
            }
            .nav-menus-php .submitbox .submitcancel {
                border-bottom:1px solid '.$active_color.';
                color:'.$active_color.';
            }
            .nav-menus-php .submitbox .submitcancel:hover {
                background:'.$active_color.';
            }
            .wp-core-ui .button-primary.focus,.wp-core-ui .button-primary.hover,.wp-core-ui .button-primary:focus,.wp-core-ui .button-primary:hover {
                background: '.$active_color.';
                border-color: '.$inactive_color.';
            }
            .wp-core-ui .button-primary.active,.wp-core-ui .button-primary.active:focus,.wp-core-ui .button-primary.active:hover,.wp-core-ui .button-primary:active {
                background: '.$active_color.';
                border-color: '.$inactive_color.';
            }
            #wp-auth-check-wrap .wp-auth-check-close:hover:before {
                color:'.$active_color.';
            }
            .wrap .add-new-h2:hover {
                background: '.$active_color.' !important;
                color: #FFF !important;
            }
            #collapse-menu:hover, #collapse-menu:hover #collapse-button div:after {
                color: '.$active_color.' !important;
            }
            #wpfooter #footer-left {
                font-size: 14px;
                line-height: 26px;
            }
            #wpfooter #footer-left a:hover {
                text-decoration: none;
            }
            #adminmenu .awaiting-mod, #adminmenu .update-plugins {
                background-color: '.$active_color.' !important;
            }
            #adminmenu li a.wp-has-current-submenu .update-plugins, #adminmenu li.current a .awaiting-mod {
                background-color: #FFF !important;
                color: '.$active_color.' !important;
            }
            #adminmenu li a.wp-has-current-submenu .update-plugins .plugin-count {
                color: '.$active_color.' !important;
            }
            .contextual-help-tabs .active {
                border-color: '.$active_color.' !important;
                background: #F0F0F0 !important;
            }
            #contextual-help-back {
                background: #F0F0F0 !important;
            }
            input[type=checkbox]:checked:before {
                color: '.$active_color.' !important;
            }
            input[type=radio]:checked:before {
                background-color: '.$active_color.' !important;   
            }
            /* Yoast SEO CHANGES */

            #sidebar-container #sidebar {
                display:none;
            }
            #adminmenu .wp-submenu a span {
                color: '.$active_color.' !important;
            }
            #adminmenu li .awaiting-mod span, #adminmenu li span.update-plugins span {
                color: #FFF !important;
            }

            /* ADVANCED CUSTOM FIELDS ADMIN STYLES */
            .acf-button {
                background: '.$active_color.' !important;
                border: 1px solid '.$inactive_color.' !important;
                color: #FFF !important;
            }
            .acf-button:hover {
                color: #FFF !important;
            }
            #acf_fields .table_footer {
                background: #F5F5F5 !important;
                border: 1px solid #DDD !important;
            }
            #acf_fields .table_footer .order_message {
                color: '.$active_color.' !important;
                font-family: "Open Sans",sans-serif !important;
            }
            #acf_fields .field.form_open > .field_meta {
                background: #F5F5F5 !important;
                background-image: -webkit-gradient(linear, left top, left bottom, from(#CCCCCC), to(#F5F5F5)) !important;
                background-image: -webkit-linear-gradient(top, #CCCCCC, #F5F5F5) !important;
                background-image: -moz-linear-gradient(top, #CCCCCC, #F5F5F5) !important;
                background-image: -o-linear-gradient(top, #CCCCCC, #F5F5F5) !important;
                background-image: linear-gradient(to bottom, #CCCCCC, #F5F5F5) !important;
                border: #DDD solid 1px !important;
                text-shadow: #999 0 1px 0 !important;
                box-shadow: inset #999 0 1px 0 0 !important;
                color: '.$inactive_color.' !important;
            }
            #acf_fields .field.form_open > .field_meta .circle {
                color: '.$inactive_color.' !important;
                border-color: '.$inactive_color.' !important;
            }
        </style>
    ';
    if($lcs == '1') {
        echo '
            <style>
                #wpadminbar {
                    background: #CCC !important;
                    color: '.$inactive_color.' !important;
                }
                #wpadminbar #adminbarsearch:before, #wpadminbar .ab-icon:before, #wpadminbar .ab-item:before {
                    color: '.$inactive_color.' !important;
                }
                #wpadminbar a.ab-item, #wpadminbar>#wp-toolbar span.ab-label, #wpadminbar>#wp-toolbar span.noticon {
                    color: '.$inactive_color.' !important;
                }
                #wpadminbar .ab-sub-wrapper, #wpadminbar ul{
                    background-color: #999 !important;
                }
                #wpadminbar .ab-top-secondary {
                    background-color: #CCC !important;
                }
                #wpadminbar .ab-submenu .ab-empty-item {
                    color: '.$inactive_color.' !important;
                }
                #adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before {
                    color: '.$active_color.' !important;
                }
                #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
                    color: '.$active_color.' !important;    
                }
                #adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
                    background-color: #999 !important;
                }
                #adminmenuwrap a {
                    color: '.$inactive_color.' !important;
                }
                #adminmenu div.wp-menu-image:before {
                    color: '.$inactive_color.' !important;
                }
                #adminmenu li.menu-top:hover, #adminmenu li.opensub>a.menu-top, #adminmenu li>a.menu-top:focus {
                    background-color: #7F7F7F !important;
                }
                #adminmenu .wp-submenu, .folded #adminmenu .wp-has-current-submenu .wp-submenu, .folded #adminmenu a.wp-has-current-submenu:focus+.wp-submenu {
                    background-color: #7F7F7F !important;
                }
            </style>
        ';
    }
    if($wp_yoast_seo == '0'){
        echo '<style>
                #postbox-container-1 #normal-sortables #wpseo-dashboard-overview {
                    display: none;
                }
              </style>
        ';
    }
}
add_action('admin_enqueue_scripts', 'custom_admin_logo');

// if( $current_user->user_login != 'webapps' && $current_user->user_login != 'project.team' ){
//     function hide_barracuda(){
//         echo '
//             <style type="text/css">
//                 #toplevel_page_ff-barracuda-forms-barracuda-settings-form {
//                     display: none;
//                 }
//                 .plugins #barracuda {
//                     display: none;
//                 }
//                 .plugin-title .row-actions {
//                     display:none;
//                 }
//                 .plugin-update-tr .update-message {
//                     display: none;
//                 }
//             </style>
//         ';
//     }
//     add_action('admin_enqueue_scripts', 'hide_barracuda');
// }


//****** END ADD CLIENT LOGO TO WP ADMIN BAR ON ADMIN PAGES ******//

function barracuda_login_logo() { 
    $active_color = get_option('barracuda_active_color');
    $inactive_color = get_option('barracuda_inactive_color');
    $header_img = get_header_image();
    echo '<style type="text/css">
        /*body {
            background: none repeat scroll 0 0 #000;
        }*/
        /*#login {
            width: 500px;
        }*/
        form#loginform {
            background: '. $inactive_color .' !important;
        }
        .login form {
            background: '. $inactive_color .' !important;
        }
        .login label {
            color: #FFF;
        }
        .login .message {
            border-left: 4px solid '. $active_color .' !important;
            background: '. $inactive_color .' !important;
            color: #FFF !important;
        }
        .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
            color: '. $active_color .';
        }
        #login #loginform .submit .button-primary {
            background: '. $active_color .';
            border-color: '. $inactive_color .';
        }
        .wp-core-ui .button-primary {
            background: '. $active_color .' !important;
            border-color: '. $inactive_color .' !important;
            color: #FFF !important;
        }
        .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
            background: '. $active_color .' !important;
            border-color: '. $inactive_color .' !important;
            color: #FFF !important;
        }
        body.login div#login h1 a {
            background-image: url(' . plugins_url('/img/header-logo.png', __FILE__ ) . ');
            background-size:100%;
            height:40px;
            width:230px;
            padding-bottom: 0px;
        }
        /*html {
            background: none repeat scroll 0 0 #000;
        }*/
    </style>';
}

add_action( 'login_enqueue_scripts', 'barracuda_login_logo' );


add_action('admin_enqueue_scripts', 'barracuda_styles');

function barracuda_styles(){
    wp_register_style('barracuda-style', plugins_url('css/style.css', __FILE__));
    wp_enqueue_style('barracuda-style');
}

function barracuda_manager_admin_scripts() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('jquery');
}

function barracuda_manager_admin_styles() {
    wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'barracuda_manager_admin_scripts');
add_action('admin_print_styles', 'barracuda_manager_admin_styles');

add_action('admin_footer', 'my_admin_footer_function');
function my_admin_footer_function() {
    echo '<script>
            jQuery(function(){
                jQuery("#wp-admin-bar-site-name > .ab-item").text("");
            })
          </script>';
}
?>