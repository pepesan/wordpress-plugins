<?php
/*
 Plugin Name: Plugin de Ejemplo de Custom Post Type
 Plugin URI: http://cursosdedesarrollo.com/
 Description: Plugin de Ejemplo de Custom Post Type
 Author URI: http://cursosdedesarrollo.com/
 Author: Pepesan
 Version: 1.0.0
 License: GPLv2 or later
 */

//Comprobación de un acceso correcto
if(!defined('ABSPATH')){
    exit;
}
$dir=plugin_dir_path(__FILE__);
require_once ($dir.'custom_post_type-cpt.php');
require_once ($dir.'custom_post_type-render-admin.php');