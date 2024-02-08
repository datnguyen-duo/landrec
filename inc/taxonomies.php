<?php

function register_taxonomies() {
    register_taxonomy( 'project-type', 'projects', array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Project Type', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Project Type', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Project Types', 'textdomain' ),
            'all_items'         => __( 'All Project Types', 'textdomain' ),
            'parent_item'       => __( 'Parent Project Type', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Project Type:', 'textdomain' ),
            'edit_item'         => __( 'Edit Project Type', 'textdomain' ),
            'update_item'       => __( 'Update Project Type', 'textdomain' ),
            'add_new_item'      => __( 'Add New Project Type', 'textdomain' ),
            'new_item_name'     => __( 'New Project Type Name', 'textdomain' ),
            'menu_name'         => __( 'Project Types', 'textdomain' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-type' ),
    ) );

    register_taxonomy( 'project-client', 'projects', array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Project Client', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Project Client', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Project Clients', 'textdomain' ),
            'all_items'         => __( 'All Project Clients', 'textdomain' ),
            'parent_item'       => __( 'Parent Project Client', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Project Client:', 'textdomain' ),
            'edit_item'         => __( 'Edit Project Client', 'textdomain' ),
            'update_item'       => __( 'Update Project Client', 'textdomain' ),
            'add_new_item'      => __( 'Add New Project Client', 'textdomain' ),
            'new_item_name'     => __( 'New Project Client Name', 'textdomain' ),
            'menu_name'         => __( 'Project Clients', 'textdomain' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-client' ),
    ) );

    register_taxonomy( 'project-size', 'projects', array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Project Size', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Project Size', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Project Sizes', 'textdomain' ),
            'all_items'         => __( 'All Project Sizes', 'textdomain' ),
            'parent_item'       => __( 'Parent Project Size', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Project Size:', 'textdomain' ),
            'edit_item'         => __( 'Edit Project Size', 'textdomain' ),
            'update_item'       => __( 'Update Project Size', 'textdomain' ),
            'add_new_item'      => __( 'Add New Project Size', 'textdomain' ),
            'new_item_name'     => __( 'New Project Size Name', 'textdomain' ),
            'menu_name'         => __( 'Project Sizes', 'textdomain' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-size' ),
    ) );

    register_taxonomy( 'project-material', 'projects', array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Project Material', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Project Material', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Project Materials', 'textdomain' ),
            'all_items'         => __( 'All Project Materials', 'textdomain' ),
            'parent_item'       => __( 'Parent Project Material', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Project Material:', 'textdomain' ),
            'edit_item'         => __( 'Edit Project Material', 'textdomain' ),
            'update_item'       => __( 'Update Project Material', 'textdomain' ),
            'add_new_item'      => __( 'Add New Project Material', 'textdomain' ),
            'new_item_name'     => __( 'New Project Material Name', 'textdomain' ),
            'menu_name'         => __( 'Project Materials', 'textdomain' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-material' ),
    ) );

    register_taxonomy( 'product-type', 'product', array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Product Type', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Product Type', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Product Types', 'textdomain' ),
            'all_items'         => __( 'All Product Types', 'textdomain' ),
            'parent_item'       => __( 'Parent Product Type', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Product Type:', 'textdomain' ),
            'edit_item'         => __( 'Edit Product Type', 'textdomain' ),
            'update_item'       => __( 'Update Product Type', 'textdomain' ),
            'add_new_item'      => __( 'Add New Product Type', 'textdomain' ),
            'new_item_name'     => __( 'New Product Type Name', 'textdomain' ),
            'menu_name'         => __( 'Product Types', 'textdomain' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-type' ),
    ) );

    register_taxonomy( 'product-material', 'product', array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => _x( 'Product Material', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Product Material', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Product Materials', 'textdomain' ),
            'all_items'         => __( 'All Product Materials', 'textdomain' ),
            'parent_item'       => __( 'Parent Product Material', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Product Material:', 'textdomain' ),
            'edit_item'         => __( 'Edit Product Material', 'textdomain' ),
            'update_item'       => __( 'Update Product Material', 'textdomain' ),
            'add_new_item'      => __( 'Add New Product Material', 'textdomain' ),
            'new_item_name'     => __( 'New Product Material Name', 'textdomain' ),
            'menu_name'         => __( 'Product Materials', 'textdomain' ),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-material' ),
    ) );
}
// add_action( 'init', 'register_taxonomies', 0 );