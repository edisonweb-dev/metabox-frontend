<?php
/*
    Plugin Name: GA Enviar tu receta
    Plugin URI:
    Description: Añade funcionalidad de enviar post desde el front end
    Version: 1.0
    Author: Edison Perdomo
    Author URI:
    License: GLP2
    Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// REgistramos los input cmb2
/** Formulario y campos para enviar receta **/
function ga_campos_formulario() {
  $cmb = new_cmb2_box(array(
      'id'           => 'ga_enviar_receta', 
      'object_types' => array('page'), 
      'hookup'       => false, // Si se va a guardar el post como borrador en la página principal
      'save_fields'  => false, // Sino va a guardar los campos durante el hookup
  ));
  $cmb->add_field(array(
      'name' => 'Datos Generales de la Receta',
      'type' => 'title',
      'id'   => 'titulo_receta_encabezado'
  ));
  $cmb->add_field( array(
      'name' => 'Nombre Receta',
      'id'   => 'titulo_receta',
      'type' => 'text'
  ));
  $cmb->add_field(array(
      'name' => 'Subtitulo',
      'id'   => 'subtitulo',
      'type' => 'text'  
   ));
   $cmb->add_field(array(
       'name' => 'Receta',
       'id'   => 'contenido_receta',
       'type' => 'wysiwyg',
       'options' => array(
          'textarea_rows' => 12,
          'media_buttons' => false 
       ),  
    ));
    $cmb->add_field(array(
        'name' => 'Calorias',
        'id'   => 'calorias',
        'type' => 'text'  
    ));
    
    $cmb->add_field(array(
        'name' => 'Imagen del Platillo',
        'id'   => 'imagen_destacada',
        'type' => 'text',
        'attributes' => array(
            'type' => 'file'
        ),
     ));
     $cmb->add_field(array(
         'name' => 'Información Extra',
         'id'   => 'otra_informacion',
         'type' => 'title',
     ));
     $cmb->add_field(array(
         'name' => 'Precio',
         'id'   => 'precio-receta',
         'type' => 'taxonomy_select',
         'taxonomy' => 'precio_receta'  
     ));
     $cmb->add_field(array(
         'name' => 'Tipo',
         'id'   => 'tipo-comida',
         'type' => 'taxonomy_select',
         'taxonomy' => 'tipo-comida',
     ));
     $cmb->add_field(array(
         'name' => 'Hora',
         'id'   => 'horario-menu',
         'type' => 'taxonomy_select',
         'taxonomy' => 'horario-menu',
     ));
     $cmb->add_field(array(
         'name' => 'Etiquetas',
         'id'   => 'etiquetas',
         'type' => 'text',
         'description' => 'Agrega las etiquetas separadas por coma',
         'taxonomy' => 'estado',
     ));
     $cmb->add_field(array(
         'name' => 'Tu Información',
         'id'   => 'informacion_autor',
         'type' => 'title'  
     ));
     
     $cmb->add_field(array(
         'name' => 'Tu Nombre',
         'desc' => 'Coloca tu nombre para atribuirte esta receta',
         'id'   => 'autor_receta',
         'type' => 'text'  
     ));
     $cmb->add_field(array(
         'name' => 'Tu Email',
         'desc' => 'Coloca tu email para contactarte en caso de ser necesario',
         'id'   => 'autor_email_receta',
         'type' => 'text_email'  
     ));
}
add_action('cmb2_init', 'ga_campos_formulario');


// hacemos el llamado de la funcion crear metaboxes para incluirlo shortcode
/** Obtiene la instancia del formulario **/
function ga_formulario_instancia() {
  // ID del metabox
  $metabox_id = 'ga_enviar_receta';
  
  // No aplica el object_id ya que se va a generar automaticamente al crearlo.
  $object_id = 'fake-object-id';
  
  return cmb2_get_metabox($metabox_id, $object_id);
}

/** Crear shortcode, utiliza [ga_enviar_receta_shortcode] */
function ga_formulario_enviar_receta_shortcode() {
  $cmb = ga_formulario_instancia();
}
add_shortcode('ga_enviar_receta_shortcode', 'ga_formulario_enviar_receta_shortcode');