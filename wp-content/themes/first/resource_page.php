<?php
/*
 * Template Name: Resource Page
 */

    //render the header
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

    <?php
        endwhile; endif;
    ?>

    <!-- decription -->
    <article class="cat-decription">

        <!-- Resources -->

        <?php
            //getting the resources and rendering it
            $args = array (
                'post_type' => 'ws_resources'
            );

            $resources = get_posts($args);
            foreach ($resources as $resource):
        ?>

            <a href="<?php the_field( 'attachment', $resource->ID ); ?>" class="resource">
                <div class="col-xs-2 resource-icon-container">

                    <img src="<?php the_field( 'attachment_icon', 'options' ); ?>" alt="">

                </div>
                <div class="col-xs-21 col-xs-push-1 col-sm-22 col-sm-push-0">

                    <h5 class="resource-name">
                        <?php echo $resource->post_title; ?>
                    </h5>

                    <p class="resource-description">
                        <?php echo $resource->post_content; ?>
                    </p>

                </div>
            </a>

        <?php endforeach; ?>

        <!-- /. resources -->

    </article><!-- /. decription -->


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
