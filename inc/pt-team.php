<?php 


// Register Custom Post Type
function team_post_type() {

  $labels = array(
    'name'                => _x( 'Equipe', 'Post Type General Name', 'ipsofacto' ),
    'singular_name'       => _x( 'Membre de l\'équipe', 'Post Type Singular Name', 'ipsofacto' ),
    'menu_name'           => __( 'Equipe', 'ipsofacto' ),
    'parent_item_colon'   => __( 'Parent Item:', 'ipsofacto' ),
    'all_items'           => __( 'Toute l\'équipe', 'ipsofacto' ),
    'view_item'           => __( 'Voir', 'ipsofacto' ),
    'add_new_item'        => __( 'Ajouter un membre', 'ipsofacto' ),
    'add_new'             => __( 'Ajouter un membre', 'ipsofacto' ),
    'edit_item'           => __( 'Editer', 'ipsofacto' ),
    'update_item'         => __( 'Mettre à jour', 'ipsofacto' ),
    'search_items'        => __( 'Rechercher', 'ipsofacto' ),
    'not_found'           => __( 'Aucun résultat', 'ipsofacto' ),
    'not_found_in_trash'  => __( 'Aucun résultat dans la corbeille', 'ipsofacto' ),
  );
  $rewrite = array(
    'slug'                => 'equipe',
    'with_front'          => true,
    'pages'               => true,
    'feeds'               => true,
  );
  $args = array(
    'label'               => __( 'team', 'ipsofacto' ),
    'description'         => __( 'Membres de l\'équipe', 'ipsofacto' ),
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
  register_post_type( 'team', $args );

}

// Hook into the 'init' action
add_action( 'init', 'team_post_type', 0 );




// Register Custom Taxonomy
function custom_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Signes astrologiques', 'Taxonomy General Name', 'ipsofacto' ),
        'singular_name'              => _x( 'Signe astrologique', 'Taxonomy Singular Name', 'ipsofacto' ),
        'menu_name'                  => __( 'Signes Astrologiques', 'ipsofacto' ),
        'all_items'                  => __( 'Tous les signes', 'ipsofacto' ),
        'parent_item'                => __( 'Parent Item', 'ipsofacto' ),
        'parent_item_colon'          => __( 'Parent Item:', 'ipsofacto' ),
        'new_item_name'              => __( 'Ajouter', 'ipsofacto' ),
        'add_new_item'               => __( 'Ajouter', 'ipsofacto' ),
        'edit_item'                  => __( 'Editer', 'ipsofacto' ),
        'update_item'                => __( 'Mettre à jour', 'ipsofacto' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'ipsofacto' ),
        'search_items'               => __( 'Search Items', 'ipsofacto' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'ipsofacto' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'ipsofacto' ),
        'not_found'                  => __( 'Not Found', 'ipsofacto' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'signe-astro', array( 'team' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy', 0 );


// Register Custom Taxonomy
function custom_taxonomy_2() {

    $labels = array(
        'name'                       => _x( 'Signes chinois', 'Taxonomy General Name', 'ipsofacto' ),
        'singular_name'              => _x( 'Signe chinois', 'Taxonomy Singular Name', 'ipsofacto' ),
        'menu_name'                  => __( 'Signes chinois', 'ipsofacto' ),
        'all_items'                  => __( 'Tous les signes', 'ipsofacto' ),
        'parent_item'                => __( 'Parent Item', 'ipsofacto' ),
        'parent_item_colon'          => __( 'Parent Item:', 'ipsofacto' ),
        'new_item_name'              => __( 'Ajouter', 'ipsofacto' ),
        'add_new_item'               => __( 'Ajouter', 'ipsofacto' ),
        'edit_item'                  => __( 'Editer', 'ipsofacto' ),
        'update_item'                => __( 'Mettre à jour', 'ipsofacto' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'ipsofacto' ),
        'search_items'               => __( 'Search Items', 'ipsofacto' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'ipsofacto' ),
        'choose_from_most_used'      => __( 'Choose from the most used items', 'ipsofacto' ),
        'not_found'                  => __( 'Not Found', 'ipsofacto' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'signe-chinois', array( 'team' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy_2', 0 );

