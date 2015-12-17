<?php
/*
 Plugin Name: Plugin de Ejemplo
 Plugin URI: http://cursosdedesarrollo.com/
 Description: Plugin de Ejemplo
 Author URI: http://cursosdedesarrollo.com/
 Author: Pepesan
 Version: 1.0.0
 License: GPLv2 or later
 */
/*if (!class_exists(“Ejemplo)) {
 class Ejemplo {
 function Ejemplo() {//constructor

 }

 }

 }//End Class Ejemplo

 if (class_exists(“Ejemplo)) {
 $dl_pluginSeries = new Ejemplo();
 }
 //Actions and Filters
 if (isset($dl_pluginSeries)) {
 //Actions

 //Filters
 }

 */
if (is_admin()) {
	//funciones a añadir
	function cdd_add_ga_link() {
		global $wp_admin_bar;
		$args=array(
			'id'=>"google_analytics",
			'title'=>'Google Analytics',
			'href'=>'http://google.com/analytics'
		);
		$wp_admin_bar->add_menu($args);
	}

	//añadir acciones
	//add_action();
	//add_filter();
	add_action("wp_before_admin_bar_render", "cdd_add_ga_link");


}
//ejemplo de filtro
function modify_author_link( $link ) {
    $link = 'http://example.com/';
    return $link;
}
add_filter( 'author_link', 'modify_author_link', 10, 1 );
