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

//Recolocamos la función en su sitio
function cdd_meta_callback(){
    //colocamos el código HTML fuera del bloque de código que sandrá en la meta-caja del formulario
    ?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="job-id" class="cdd-row-title">Identificativo Trabajo</label>
            </div>
            <div class="meta-td">
                <input type="text" name="job-id" id="job-id" value=""/>
            </div>
        </div>
    </div>
    <div class="meta-row">
        <div class="meta-th">
            <span>Responsabilidades</span>
        </div>
    </div>
    <div class="meta-editor">
        <?php
        //incluimos un editor, referencia: https://codex.wordpress.org/Function_Reference/wp_editor
        $content=get_post_meta($post->ID,'principle_duties',true);
        $editor="principle_duties";
        $settings=array(
            'textarea_rows'=>5,
            'media_buttons'=>true,

        );
        wp_editor($content,$editor,$settings);
        ?>
    </div>
    <?php

}