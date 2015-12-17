<?php
//referencia principal: https://codex.wordpress.org/Function_Reference/register_post_type
function cdd_register_post_type(){
    $singular="Trabajo";
    $plural="Trabajos";
    //Define las etiquetas a utilizar por parte de este tipo de contenido, las visibles en menús y formularios
    $labels=array(
        'name'=>$plural,
        'singular_name'=>$singular,
        'menu_name'=>$plural,
        'name_admin_bar'=>$singular,
        'all_items'=>$plural,
        'add_new'=>"Añadir Nuevo",
        'add_new_item'=>"Añadir Nuevo ".$singular,
        'edit'=>"Editar",
        'edit_item'=>"Editar ".$singular,
        'new_item'=>"Nuevo ".$singular,
        'view'=>"Ver ".$singular,
        'view_item'=>"Ver ".$singular,
        'search_items'=>"Buscar ".$plural,
        'parent_item_color'=>$singular." Padre",
        'not_found'=>"No hay ".$plural,
        'not_found_in_trash'=>"No hay ".$plural." en la Papelera"

    );
    //define las opciones del tipo de contenido
    $args=array(
        'label'=>$plural,
        'labels'=>$labels,
        //permite que sea publicable
        'public'=>true,
        //permite que se pueda buscar por el buscador
        'publicly_queryable'=>true,
        //no lo excluye de los resultados del buscador
        'exclude_from_search'=>false,
        //permite meter enlaces en los menús desde el UI estándar de WP
        'show_in_nav_menus'=>true,
        //permite que esté disponible desde el menú principal de admin
        'show_ui'=>true,
        'show_in_menu'=>true,
        //permite mostrar desde el menú nuevo de la barra de arriba de admin
        'show_in_admin_bar'=>true,
        //configura la posición en el menú principal
        'menu_position'=>10,
        //configura el icono del menú principal más en: https://developer.wordpress.org/resource/dashicons/
        'menu_icon'=>'dashicons-businessman',
        //permite la exportación de los contenidos
        'can_export'=>true,
        //permite que cualquier usurio pueda borrar este contenido
        'delete_with_user'=>false,
        //define si el contenido tiene estructura jerárquica (tipo arbol)
        'hierarchical'=>false,
        //Define si el contenido debe tener una página de archivo (muestra todos los contenidos de ese tipo, como un archivo)
        'has_archive'=>true,
        //configura si se peude utilizar la variable de búsqueda en la URL
        'query_var'=>true,
        //permite definir quieres tienen acceso a este tipo de contenido, por lo que si alguien tiene un rol que le permite
        //acceder a page debería poder acceder a este tipo de contenido
        'capability_type'=>'page',
        //define que utilizamos los permisos por defecto
        'map_meta_cap'=>'true',
        //permite crear tus propias capacidades para el tipo de contenido (sus propios permisos para roles)
        //capabilities=>array(),
        //permite definir las generadores de enlaces
        'rewrite'=>array(
            //define el nombre para los enlaces permanentes
            'slug'=>'jobs',
            //permite definir si se tiene que tener en cuenta o no al crear la ruta al contenido la ruta principal del blog
            'with_front'=>true,
            //define si se debe generar una ruta para la paginación
            'pages'=>true,
            //permite definir si se debe generar una ruta al rss de este contenido
            'feeds'=>true
        ),
        //dice que campos maneja el tipo de contenido
        'supports'=>array(
            //título
            'title',
            //texto principal
            'editor',
            //autor
            'author',
            //Campos personalizados
            'custom-fields',
            //miniatura
            'thumbnail'
        ),
    );
    register_post_type("job",$args);
}

add_action("init","cdd_register_post_type");

//creación de una taxonomía explicado en https://developer.wordpress.org/reference/functions/register_taxonomy/
function cdd_registry_taxonomy(){
    $singular='Localización';
    $plural='Localizaciones';
    $labels=array(
        'name'=>$plural,
        'singular_name'=>$singular,
        'search_items'=>'Buscar '.$plural,
        'popular_items'=>$plural.' Populares',
        'all_items'=>'Todas las '.$plural,
        'parent_item'=>null,
        'parent_item_colon'=>null,
        'edit_item'=>'Editar '.$singular,
        'update_item'=>'Actualizar '.$singular,
        'add_new_item'=>'Añadir Nueva '.$singular,
        'new_item_name'=>'Nuemo Nombre de '.$singular,
        'separate_items_with_commas'=>$plural." separadas por comas",
        'add_or_remove_items'=>'Añadir o Borrar '.$plural,
        'choose_from_most_used'=>'Elegir entra las más usadas',
        'not_found'=>'No se han encontrado '.$plural,
        'menu_name'=>$plural
    );
    $args=array(
        //define si la taxonomía es jerárquica
        'hierarchical'=>true,
        //definición de la etiquetas ('literales de texto')
        'labels'=>$labels,
        //define si se ve en el admin
        'show_ui'=>true,
        //definición de confirmación de que se ve en el admin
        'show_admin_column'=>true,
        //método que se llamará cuando quiera saber cuantos términos hay en la taxonomía
        'update_count_callback'=>'_update_post_term_count',
        //Define si puede colocarse en la url como buscable
        'query_var'=>true,
        //reescritura de la ruta a /location
        'rewrite'=>array(
            'slug'=>'location',
        ),
    );
    //al registrar hay que colocar como segundo parámetro el mismo nombre que se ha utilizado en el register_post_type()
    register_taxonomy('location','job',$args);
}
add_action('init','cdd_registry_taxonomy');