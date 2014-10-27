<?php 


// Register Custom Post Type
function job_post_type() {

  $labels = array(
    'name'                => _x( 'Emploi', 'Post Type General Name', 'ipsofacto' ),
    'singular_name'       => _x( 'Offre', 'Post Type Singular Name', 'ipsofacto' ),
    'menu_name'           => __( 'Emploi', 'ipsofacto' ),
    'parent_item_colon'   => __( 'Parent Item:', 'ipsofacto' ),
    'all_items'           => __( 'Toutes les offres', 'ipsofacto' ),
    'view_item'           => __( 'Voir', 'ipsofacto' ),
    'add_new_item'        => __( 'Ajouter une offre', 'ipsofacto' ),
    'add_new'             => __( 'Ajouter une offre', 'ipsofacto' ),
    'edit_item'           => __( 'Editer', 'ipsofacto' ),
    'update_item'         => __( 'Mettre à jour', 'ipsofacto' ),
    'search_items'        => __( 'Rechercher', 'ipsofacto' ),
    'not_found'           => __( 'Aucun résultat', 'ipsofacto' ),
    'not_found_in_trash'  => __( 'Aucun résultat dans la corbeille', 'ipsofacto' ),
  );
  $rewrite = array(
    'slug'                => 'emploi',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'job', 'ipsofacto' ),
    'description'         => __( 'Offres d\'emploi', 'ipsofacto' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', ),
    'taxonomies'          => array( ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 6,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'rewrite'             => $rewrite,
    'capability_type'     => 'page',
  );
  register_post_type( 'job', $args );

}

// Hook into the 'init' action
add_action( 'init', 'job_post_type', 0 );

