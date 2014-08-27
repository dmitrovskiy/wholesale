<?php
/*
 * Template Name: Basic Subpage
 */

    //reder the header
    get_header();

?>

<!-- left column -->
<div class="col-md-17 col-content">

    <?php //begin rendering the page content
        if(have_posts()):
            while(have_posts()): the_post();
    ?>

    <!-- page thumbnail -->
    <div class="thumbnail thumbnail-page-name">

        <img src="<?php the_field('title_background', get_the_ID()); ?>" alt=""/>
        <h1 class="caption"><?php the_title() ?></h1>

    </div> <!-- /. page thumbnail -->

    <!-- decription -->
    <article class="cat-decription">
        <div class="category-text">

            <?php the_content() ?>

        </div>
    </article>

    <?php
        endwhile;
        else:
    ?>

    <article class="cat-decription">
        <div class="category-text">
            This subpage doesn't contain the content.
        </div>
    </article>

    <?php
        endif;
    ?>

</div><!-- /. left column -->

<!-- right-column -->
<aside class="col-md-7 right-column">

    <?php get_sidebar('pageright'); ?>

</aside><!-- /. right column -->

<div class="clearfix"></div>

<?php
    // link the js scripts
    wp_enqueue_script('accordion-panel');
    wp_enqueue_script('start_panel-accordion');
?>

<?php
    //render the footer
    get_footer();
?>
