<?php
//permite presentar una caja extra en el formulario
function cdd_add_custom_metabox(){
    add_meta_box(
        //id de la caja
        'cdd_meta',
        //título
        'Trabajo',
        //nombre de la función de callback
        'cdd_meta_callback',
        //tipo de post, en este caso el mismo que estamos creando el el plugin en el register_post_type()
        'job',
        //contexto: localización de la caja en el formulario
        'normal',
        //prioridad de presentación
        'low'
    );
}

add_action('add_meta_boxes','cdd_add_custom_metabox');