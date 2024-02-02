<?php
//$per_page = get_option( 'projects_per_page' );
$projects_per_page = 1;

function projects_filter() {
    $project_type = $_GET['project-type'];
    $project_client = $_GET['project-client'];
    $project_size = $_GET['project-size'];
    $project_material = $_GET['project-material'];

    $projects_args = array(
        'post_type' => 'projects',
        'post_status' => array( 'publish' ),
        'projects_per_page' => $GLOBALS['projects_per_page'],
        'tax_query' => array(
            'relation' => 'AND',
        )
    );

    if( $project_type ) {
        array_push($projects_args['tax_query'],array(
            'taxonomy' => 'project-type',
            'field' => 'slug',
            'terms' => $project_type
        ));
    }

    if( $project_client ) {
        array_push($projects_args['tax_query'],array(
            'taxonomy' => 'project-client',
            'field' => 'slug',
            'terms' => $project_client
        ));
    }

    if( $project_size ) {
        array_push($projects_args['tax_query'],array(
            'taxonomy' => 'project-size',
            'field' => 'slug',
            'terms' => $project_size
        ));
    }

    if( $project_material ) {
        array_push($projects_args['tax_query'],array(
            'taxonomy' => 'project-material',
            'field' => 'slug',
            'terms' => $project_material
        ));
    }

    $projects = new WP_Query($projects_args);

    print_projects($projects);
    die;
}
add_action('wp_ajax_projects_filter', 'projects_filter');
add_action('wp_ajax_nopriv_projects_filter', 'projects_filter');

function print_projects( $query = '' ) {
    $counter = 0;
    if( !$query ) {
        $query = new WP_Query(array(
            'post_type' => 'projects',
            'post_status' => array( 'publish' ),
            'posts_per_page' => $GLOBALS['products_per_page'],
        ));
    }
    if( $query->have_posts() ): ?>
        <div class="projects">
            <?php while( $query->have_posts() ): $query->the_post(); $counter++; ?>
                <div class="project-holder">
                    <?php get_template_part('template-parts/project') ?>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <?php else: ?>
        <div class="no-results">
            <h2>No projects found.</h2>
        </div>
    <?php endif;
}