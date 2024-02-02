<?php
/* Template Name: FAQ */
get_header(); 

$headline = get_field('headline');
$subheading = get_field('subheading');

$faq = get_field('faq');

$image = get_field('image');
$title = get_field('title');
$button = get_field('button');

?>

<section class="faq__banner">
    <?php if ($headline): ?>
        <h1><?php echo $headline; ?></h1>
    <?php endif; ?>
    <?php if ($subheading): ?>
        <p><?php echo $subheading; ?></p>
    <?php endif; ?>
</section>


<?php if ($faq): ?>
<section class="faq__content">
    <?php foreach ($faq as $item): ?>
        <?php if ($item['category']): ?>
            <h3><?php echo $item['category'] ?></h3>
            <?php if ($item['accordions']): ?>
                <div class="accordion">
                    <?php foreach($item['accordions'] as $qa): ?>
                        <div class="accordion__item">
                            <p class="question">
                                <?php echo $qa['question'] ?>
                            </p>
                            <div class="answer">
                                <div class="inner">
                                    <?php echo $qa['answer'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?> 
</section>

<?php endif; ?>

<?php get_template_part('template-parts/img-with-desc',null, array(
    'data' => array(
        'image' => $image,
        'title' => $title,
        'button' => $button,
    ),
    'border' => array(
        'color' => '#06b6b3',
        'background-color' => '#F0F0F0'
    )
))
?>
<?php get_footer(); ?>