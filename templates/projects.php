<?php
/* Template Name: Projects */
get_header();

$projects_args = array(
    'post_type' => 'projects',
    'posts_per_page' => -1,
    'post_status' => array( 'publish' ),
    'tax_query' => array()
);

$projects = new WP_Query( $projects_args );

$project_type = get_terms(array(
    'taxonomy' => 'project-type'
));

$project_client = get_terms(array(
    'taxonomy' => 'project-client'
));

$project_size = get_terms(array(
    'taxonomy' => 'project-size'
));

$project_material = get_terms(array(
    'taxonomy' => 'project-material'
));

$filter_section_headline = get_field('filter_section_headline');
$filter_section_description = get_field('filter_section_description');
$second_quote_description = get_field('second_quote_description');
$contact_small_headline = get_field('contact_small_headline');
$contact_headline = get_field('contact_headline');
?>
    <div class="projects-page-container">
        <?php get_template_part('template-parts/hero',null, array(
            'data' => array(
                'image' => get_the_post_thumbnail(),
                'title' => get_field('hero_section')['title'],
                'description' => get_field('hero_section')['description'],
            ),
        )) ?>

        <section class="projects-section">
            <form class="section-content" id="projects-form">
                <input type="hidden" name="action" value="projects_filter">
                <input type="hidden" name="quote" value="<?php echo $quote_description; ?>">

                <div id="projects-response">
                    <?php print_projects() ?>
                </div>
            </form>
        </section>

        <?php if($second_quote_description): ?>
            <section class="quote-section">
                <div class="section-content">
                    <h2 class="section-title"><?php echo $second_quote_description; ?></h2>
                </div>
            </section>
        <?php endif; ?>

        <section class="form-section">
            <?php wave_border('#06B6B3', '#F0F0F0') ?>
            <?php if($contact_headline): ?>
                <h2 class="section-title">
                    <?php echo $contact_headline; ?>
                </h2>
            <?php endif; ?>
            <div class="form-holder">
                <?= do_shortcode('[contact-form-7 id="255" title="Contact form 1"]') ?>
            </div>
        </section>
    </div>
<?php get_footer(); ?>