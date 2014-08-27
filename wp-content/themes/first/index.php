
<?php get_header() ?>

<!-- slider -->
<div class="row list-slider">
    <div class="list-slider-window col-sm-16 col-md-16 col-lg-17">
        <ul class="slides">

            <?php
            //show existing slides
                $query_args = array (
                    'order' => 'ASC',
                    'post_type' => 'ws_slides'
                );
            
                $slides = get_posts($query_args);
                
                //show the slides
                foreach($slides as $slide): ?>
                    <li>
                        <img src="<?php the_field('slide_image', $slide->ID); ?>" alt="\"/>

                        <div class="slide-caption">
                            <div class="col-md-19">

                                <?php echo $slide->post_content; ?>

                            </div>
                            <p class="caction-col">
                                <a href="<?php the_field('learn_more_link', $slide->ID) ?>" class="btn-group browse-group">
                                    <span class="btn btn-learn">Learn More</span>
                                    <span class="arrow-addon">
                                        <img src="<?php the_field('browse-arrow', 'options'); ?>" alt=""/>
                                    </span>
                                </a>
                            </p>
                        </div>
                    </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="panel panel-list-slider col-sm-8 col-md-8 col-lg-7">
        <div class="panel-heading hidden-xs">
            <h2>Aluminum Products</h2>
        </div>
        <div class="panel-body">
            <ul class="list-unstyled">
                <?php
                //show the titles of the slides

                foreach($slides as $slide) : ?>
                    <li>
                        <span class="list-icon">
                            <img src="<?php the_field('preview_icon', $slide->ID) ?>" alt=""/>
                        </span> <?php echo $slide->post_title ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div><!--/. slider -->

<!-- about -->
<div class="row about-row">

    <?php get_sidebar('homeleft'); ?>


    <article class="col-sm-14 col-md-11 col-lg-12  about-content-col">

        <?php
            //print homepage content
            $homepage_info = get_post(47);

            echo $homepage_info->post_content;
        ?>
    </article>

    <!-- about links -->
    <aside class="col-sm-10 col-md-6 col-lg-5  about-aside-col">
        <div class="list-group">

            <?php //get the about-aside menu
                $menu_name = 'about_aside_menu';

                if(($locations = get_nav_menu_locations()) && isset($locations[$menu_name])):
                    $menu = wp_get_nav_menu_object($locations[$menu_name]);
                    $menu_items = wp_get_nav_menu_items($menu->term_id);

                    foreach($menu_items as $menu_item):
            ?>
                <a class="list-group-item" href="<?php echo $menu_item->url ?>">
                    <?php echo $menu_item->title ?>
                    <span class="link-arrow"></span>
                </a>
            <?php
                endforeach;
                endif;
            ?>

        </div>
    </aside><!-- /. about links -->
</div><!-- about -->

<div class="separator"></div>

<?php //loading the highest categories
        $taxonomy     = 'product_cat';
        $orderby      = 'name';
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 0;      // 1 for yes, 0 for no
        $title        = '';
        $empty        = 0;
        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty,
            'parent'     => 0,
        );

        //get categories or subcategories
        $all_categories = get_categories( $args );

        if( ! empty($all_categories) ) :
?>

<!-- Freatured products -->
<section class="row products-row">

    <header class="col-md-8 col-lg-7"><h1>Featured Products</h1></header>

    <!-- Filters nav -->
    <div class="nav-filters col-md-16 col-lg-17">
        <div class="row">
            <ul class="nav nav-tabs">

                <?php
                    $index = 0;
                    foreach($all_categories as $category) : $index++;
                ?>

                    <li <?php echo $index == 1? 'class="active"' : '' ?> >
                        <a href="<?php echo "#$category->slug"; ?>" role="tab" data-toggle="tab" >

                            <?php echo $category->name; ?>

                        </a>
                    </li>

                <?php endforeach; ?>

            </ul>
        </div>
    </div><!-- /. Filters nav -->

    <div class="clearfix"></div>

    <!-- Products -->
    <div class="tab-content products-row">

    <?php

        $index = 0;
        foreach($all_categories as $category) : $index++;
    ?>

        <div class="tab-pane fade <?php echo $index == 1? 'in active' : ''; ?>" id="<?php echo $category->slug ?>">

            <?php //get the products from current category
                $args = array(
                    'post_type' => 'product',
                    'meta_key' => '_featured',
                    'meta_value' => 'yes',
                    'product_cat' => $category->slug,
                    'posts_per_page' => 6,
                );

                query_posts($args);
                //show the products
                while (have_posts()) : the_post();
                    $img_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
            ?>

                <div class="col-xs-12 col-sm-4">
                    <a href="<?php the_permalink(); ?>" class="thumbnail">
                        <img src="<?php echo $img_url; ?>" alt="">
                        <div class="caption">
                            <button type="button" class="btn btn-primary btn-block">Learn More</button>
                        </div>
                    </a>
                </div>

            <?php
                //end of displaying products
                endwhile;
                wp_reset_query();
            ?>

        </div>
    <?php endforeach; ?>

    </div><!-- /. Products -->

</section><!-- Featured products -->

<?php endif; //featured products ?>

<?php
    // link the js scripts
    wp_enqueue_script('flexslider');
    wp_enqueue_script('start_flexslider');
?>

<?php
    //render the footer
    get_footer()
?>