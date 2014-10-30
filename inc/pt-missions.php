<?php 


// Register Custom Post Type
function mission_post_type() {

  $labels = array(
    'name'                => _x( 'missions', 'Post Type General Name', 'ipsofacto' ),
    'singular_name'       => _x( 'mission', 'Post Type Singular Name', 'ipsofacto' ),
    'menu_name'           => __( 'missions', 'ipsofacto' ),
    'parent_item_colon'   => __( 'Parent Item:', 'ipsofacto' ),
    'all_items'           => __( 'Toutes les missions', 'ipsofacto' ),
    'view_item'           => __( 'Voir', 'ipsofacto' ),
    'add_new_item'        => __( 'Ajouter une mission', 'ipsofacto' ),
    'add_new'             => __( 'Ajouter une mission', 'ipsofacto' ),
    'edit_item'           => __( 'Editer', 'ipsofacto' ),
    'update_item'         => __( 'Mettre à jour', 'ipsofacto' ),
    'search_items'        => __( 'Rechercher', 'ipsofacto' ),
    'not_found'           => __( 'Aucun résultat', 'ipsofacto' ),
    'not_found_in_trash'  => __( 'Aucun résultat dans la corbeille', 'ipsofacto' ),
  );
  $rewrite = array(
    'slug'                => 'missions',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'missions', 'ipsofacto' ),
    'description'         => __( 'Missions Ipso Facto', 'ipsofacto' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', ),
    'taxonomies'          => array( ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  );
  register_post_type( 'missions', $args );

}

// Hook into the 'init' action
add_action( 'init', 'mission_post_type', 0 );
