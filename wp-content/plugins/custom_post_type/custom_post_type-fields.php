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
function cdd_meta_callback($post){
    //se pasa como parámetro el post a crear
    //creamos un nonce:se usa para validar que el contenido de la petición viene de este sitio y no de otro
    //referencia:  https://codex.wordpress.org/Function_Reference/wp_nonce_field
    wp_nonce_field(basename(__FILE__),'cdd_jobs_nonce');
    //cogemos los datos del post según su ID, referencia: https://developer.wordpress.org/reference/functions/get_post_meta/
    $cdd_stored_meta=get_post_meta($post->ID);
    //var_dump($cdd_stored_meta);
    //global $post_data;
    //var_dump($_POST);
    //colocamos el código HTML fuera del bloque de código que sandrá en la meta-caja del formulario
    ?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="job-id" class="cdd-row-title">Identificativo de trabajo</label>
            </div>
            <div class="meta-td">
                <!-- con el esc_attr() limpiamos la salida para evitar mierdas varias, referencia: https://developer.wordpress.org/reference/functions/esc_attr/ -->
                <input type="text" name="job-id" id="job-id" value="<?php if(!empty($cdd_stored_meta['job-id'])) echo esc_attr($cdd_stored_meta['job-id'][0]); ?>"/>
            </div>
            <!-- Añadidos nuevos campos de fecha -->
            <div class="meta-th">
                <label for="job-date-listed" class="cdd-row-title">Fecha de publicación</label>
            </div>
            <div class="meta-td">
                <input type="text" name="job-date-listed" id="job-date-listed" value="<?php if(!empty($cdd_stored_meta['job-date-listed'])) echo esc_attr($cdd_stored_meta['job-date-listed'][0]); ?>"/>
            </div>
            <div class="meta-th">
                <label for="job-date-deadline" class="cdd-row-title">Fecha de finalización límite</label>
            </div>
            <div class="meta-td">
                <input type="text" name="job-date-deadline" id="job-date-deadline" value="<?php if(!empty($cdd_stored_meta['job-date-deadline'])) echo esc_attr($cdd_stored_meta['job-date-deadline'][0]); ?>"/>
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
        $content=get_post_meta($post->ID,'job-principle-duties',true);
        $editor="job-principle-duties";
        $settings=array(
            'textarea_rows'=>5,
            'media_buttons'=>true,

        );
        wp_editor($content,$editor,$settings);
        ?>
    </div>
    <!-- Añadidos otros campos de requisitos (textarea) y selección de relocalización(select) -->
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="job-min-req" class="cdd-row-title">Requisitos mínimos</label>
            </div>
            <div class="meta-td">
                <textarea name="job-min-req" id="job-min-req" class="cdd-textarea"><?php if(!empty($cdd_stored_meta['job-min-req'])) echo esc_attr($cdd_stored_meta['job-min-req'][0]); ?></textarea>
            </div>
            <div class="meta-th">
                <label for="job-pref-req" class="cdd-row-title">Requisitos preferidos</label>
            </div>
            <div class="meta-td">
                <textarea name="job-pref-req" id="job-pref-req" class="cdd-textarea" ><?php if(!empty($cdd_stored_meta['job-pref-req'])) echo esc_attr($cdd_stored_meta['job-pref-req'][0]); ?></textarea>
            </div>
            <div class="meta-th">
                <label for="job-relocation" class="cdd-row-title">Asistencia de Relocalización</label>
            </div>
            <div class="meta-td">
                <select name="job-relocation" id="job-relocation" >
                    <option value="select-yes">Sí</option>
                    <option value="select-no">No</option>
                </select>
            </div>
        </div>
    </div>
    <?php
}

//función que permite salvar los campos
function cdd_meta_save($post_id, $post){

    if($post->post-type!='job'){
        return;
    }
    /*
     * TODO: comprobar porqué este código comentado falla
     *
    //comprueba el estado de salvado
    $is_autosave=wp_is_post_autosave($post_id);
    $is_revision=wp_is_post_revision($post_id);
    $is_valid_nonce=(isset($_POST['cdd_jobs_nonce']) && wp_verify_nonce($_POST['cdd_jobs_nonce'],basename(__FILE__)))? 'true':'false';
    //Sale del script dependiendo del estado
    if($is_autosave || $is_revision || $is_valid_nonce){
        return;
    }
    */

    //si está presente el ID actualizamos, referencia: https://developer.wordpress.org/reference/functions/update_post_meta/
    // utilizamos sanitize_text_field() para validar que no nos metan mierdas por el campo de texto, referencia: https://codex.wordpress.org/Function_Reference/sanitize_text_field

    if(isset($_POST['job-id'])){
        update_post_meta($post_id,'job-id',sanitize_text_field( $_POST['job-id']));
    }
    if(isset($_POST['job-date-listed'])){
        update_post_meta($post_id,'job-date-listed',sanitize_text_field( $_POST['job-date-listed']));
    }
    if(isset($_POST['job-date-deadline'])){
        update_post_meta($post_id,'job-date-deadline',sanitize_text_field( $_POST['job-date-deadline']));
    }
    if(isset($_POST['job-principle-duties'])){
        update_post_meta($post_id,'job-principle-duties',sanitize_text_field( $_POST['job-principle-duties']));
    }
    if(isset($_POST['job-min-req'])){
        update_post_meta($post_id,'job-min-req',sanitize_text_field( $_POST['job-min-req']));
    }
    if(isset($_POST['job-pref-req'])){
        update_post_meta($post_id,'job-pref-req',sanitize_text_field( $_POST['job-pref-req']));
    }
}
//se utiliza el hook save_post
add_action('save_post','cdd_meta_save',10,2);