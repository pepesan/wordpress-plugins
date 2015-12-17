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

function cdd_register_post_type(){
    $args=array(
        'public'=>true,
        'label'=>'Trabajos'
    );
    register_post_type("job",$args);
}

add_action("init","cdd_register_post_type");