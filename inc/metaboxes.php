<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'ipsofacto_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function ipsofacto_register_meta_boxes( $meta_boxes )
{
  /**
   * prefix of meta keys (optional)
   * Use underscore (_) at the beginning to make keys hidden
   * Alt.: You also can make prefix empty to disable it
   */
  // Better has an underscore as last sign
  $prefix = 'ipsofacto_';

  // Metaboxes for team
  /*
  $meta_boxes[] = array(
    'title' => __( 'informations complémentaires', 'meta-box' ),
    'pages' => array( 'team' ),
    'context' => 'side',
    'autosave' => true,
    'priority' => 'low',
    'fields' => array(
      // EMAIL
      array(
        'name'  => __( 'Email', 'meta-box' ),
        'id'    => "{$prefix}email",
        'desc'  => __( 'Email description', 'meta-box' ),
        'type'  => 'email',
        'std'   => 'name@email.com',
      ),      
    ),
  );
  */

  // Metaboxes for pages
  $meta_boxes[] = array(
    'title' => __( 'Contenu gauche', 'meta-box' ),
    'pages' => array( 'page' ),
    'context' => 'normal',
    'autosave' => true,
    'priority' => 'low',
    'fields' => array(      
      // WYSIWYG/RICH TEXT EDITOR
      array(
        'name' => __( 'WYSIWYG / Rich Text Editor', 'meta-box' ),
        'id'   => "{$prefix}wysiwyg",
        'type' => 'wysiwyg',
        // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
        'raw'  => false,
        'std'  => __( 'WYSIWYG default value', 'meta-box' ),

        // Editor settings, see wp_editor() function: look4wp.com/wp_editor
        'options' => array(
          'textarea_rows' => 4,
          'teeny'         => true,
          'media_buttons' => false,
        ),
      ),
    ),
  );

  return $meta_boxes;
}


