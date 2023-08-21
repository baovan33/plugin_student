<?php

/*
 * Plugin Name:       Zend Vn
 * Plugin URI:        #
 * Description:       Handle the basics with this plugin.
 */
/*=======================================*/ 


// $zend = new ZendMp();
define('ZEND_MP_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('ZEND_MP_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

define('ZEND_MP_VIEWS_DIR', ZEND_MP_PLUGIN_DIR .'views');
define('ZEND_MP_CSS_DIR', ZEND_MP_PLUGIN_URL .'css');
define('ZEND_MP_JS_DIR', ZEND_MP_PLUGIN_URL .'js');
define('ZEND_MP_INCLUDES_DIR', ZEND_MP_PLUGIN_DIR .'includes');
define('ZEND_MP_WIDGETS_DIR', ZEND_MP_PLUGIN_DIR .'widgets');
define('ZEND_MP_SHORTCODES_DIR', ZEND_MP_PLUGIN_DIR .'shortcodes');
define('ZEND_MP_METABOX_DIR', ZEND_MP_PLUGIN_DIR .'metabox');
define('ZEND_MP_SETTINGS_DIR', ZEND_MP_PLUGIN_DIR .'settings');




if ( !is_admin() ){
    require_once ZEND_MP_PLUGIN_DIR .'/public.php';
    $zend = new ZendMp();
} else {
    require_once ZEND_MP_PLUGIN_DIR .'/admin.php';
    $zend = new ZendMpAdmin();

    require_once ZEND_MP_INCLUDES_DIR .'/html.php';

    //widget
    require_once ZEND_MP_WIDGETS_DIR . '/db-simple.php';
    $zend_db = new Zend_Widget_DB_Simple();
    
    //Metabox
    require_once ZEND_MP_METABOX_DIR.'/main.php';
    new Zend_Metabox_Main();

   
}
// Add Widget Simple
require_once ZEND_MP_WIDGETS_DIR . '/simple.php';

add_action('widgets_init', 'zend_create_widget_simple');

function zend_create_widget_simple() {
    register_widget( 'Zend_Widget_Simple' );
}

// Add Widget Last post
require_once ZEND_MP_WIDGETS_DIR . '/last_post.php';

add_action('widgets_init', 'zend_create_widget_last_post');

function zend_create_widget_last_post() {
    register_widget( 'Zend_Widget_Last_Post' );
}

//Shortcode
require_once ZEND_MP_SHORTCODES_DIR . '/main.php';

new Zend_SC_Main();




/*=======================================*/ 

// if( is_admin() ) {
//     require_once dirname(__FILE__).'/includes/admin.php';
// } else {
//     require_once dirname(__FILE__).'/includes/public.php';
// }
/*=======================================*/ 

// register_activation_hook( __FILE__,  'zendvn_mp_active');

// function zendvn_mp_active() {
//     global $wpdb;
//     $table_name = $wpdb->prefix . "options";

//     $wpdb->update(
//         $table_name,
//         array( 'autoload'    => 'yes'),
//         array( 'option_name' => 'zendvn_mp_ver'),
//         array('%s'),
//         array('%s'),

//     );
// }
 
/*=======================================*/ 

// function zendvn_mp_db() {
//     global $wpdb;
//     $table_name = $wpdb->prefix . "zend_mp_test";
//     if ( $wpdb->get_var("SHOW TABLES LIKE '". $table_name. "' " ) != $table_name ) {
//         $sql = " CREATE TABLE `".$table_name."`(
//             `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
//             `name` varchar(50) DEFAULT NULL,
//             PRIMARY KEY (`id`)
//             ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;" ;
//     require_once  ABSPATH."wp-admin/includes/upgrade.php";
//     dbDelta($sql);
//     }
// }

/*=======================================*/ 

// function zendvn_mp_active() {
//     $zend_options = array(
//         'course'     => 'php',
//         'authot'     => 'zone',
//         'website'    => 'dsdsd.com'
//     );
//     add_option( 'zendvn_mp_options', $zend_options, '', 'yes' );
// }
/*=======================================*/ 

// if( is_admin() ) {
//     require_once dirname(__FILE__).'/includes/admin.php';
// } else {
//     require_once dirname(__FILE__).'/includes/public.php';
// }