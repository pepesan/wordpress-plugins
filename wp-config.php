<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wp');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'xampp');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '990dIGiy+wrp)Ue])LZYf*O6AidZlI41awX<Wj@<Db)L-:Y<<or{z.(fXi%,h=x&');
define('SECURE_AUTH_KEY', 'qx($:ycG|vihT`@nL5eF7t[Gkz)kPfnHZyr,g[>,UU s:+O6G`t+`&O5-0 6CAl~');
define('LOGGED_IN_KEY', 'LB^0-I2RwBlk>P_E4!J77N`dAs(GZG>m_/$xD`PXU}:@}=>+WZe]FxJ$^bB1w7&:');
define('NONCE_KEY', 'WS:|r#JGF[9v^Yvb;+;-e<H34ausV[.j>ZLdyCwC-{A8HiV97aks|x XB NoPq9]');
define('AUTH_SALT', 'p7PR8ldgo S.v$|HTov&|fmpu6&.u.+7:AD-T}MK`s pwT9p>2rrb1q^6pL=NKl^');
define('SECURE_AUTH_SALT', 'ZJg]=.fA%s][(y{F$Frz4DxY`@T(;QQfhcJH(`jG4YgBiz~aBk-i:we[RBS I[mN');
define('LOGGED_IN_SALT', '[b0s<DN]!o!AwU-aG@j%s3cPQ8{3T!40?4UjjDXs;*z}H;c>1Po.<-|W</|kK:41');
define('NONCE_SALT', 'bG]Cymg&fS mi&)=#_u_V9 ql<mBg8x^~J&ui2)4NOveq@tNK5k1h)SPMLj-c89g');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


