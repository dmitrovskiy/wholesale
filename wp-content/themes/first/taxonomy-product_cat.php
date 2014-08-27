<?php
/*
 * Template Name: Categories
 */
    global $wp_query;
    //render header
    get_header();
?>

<!-- left column -->
<div class="col-md-17 col-content">

    <?php

        $root = get_post(90);
        $term_link = get_page_link($root->ID);
        $term_content =  $root->post_title;

        $title_header = "<a href=\"$term_link\"> <span class=\"link-content\">$term_content</span>".
                            " <span class=\"link-arrow\"></span></a>";

        if( is_page() ) {
            $title_header = get_post(90)->post_title;
            $parent = '0';
        }
        else if( is_tax() ) {
            $category = $wp_query->get_queried_object();
            $parent = $category->term_id;

            $title_header .= get_my_breadcrumbs($category);
        }

    ?>

    <!-- page thumbnail -->
    <div class="thumbnail thumbnail-page-name">

        <!-- title background of the categories page -->
        <img src="<?php the_field('title_background', 90); ?>" alt=""/>
        <h1 class="caption"><?php echo $title_header; ?></h1>

    </div> <!-- /. page thumbnail -->

    <!-- decription -->
    <article class="cat-decription">

        <?php
            $taxonomy     = 'product_cat';
            $orderby      = 'name';
            $show_count   = 0;      // 1 for yes, 0 for no
            $pad_counts   = 0;      // 1 for yes, 0 for no
            $hierarchical = 1;      // 1 for yes, 0 for no
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
                'parent'     => $parent,
            );

            //get categories or subcategories
            $all_categories = get_categories( $args );

            if( ! empty($all_categories) ) :
                foreach ($all_categories as $cat) :
         ?>

                <div class="category <?php
                    if( empty($cat->description) )
                        echo 'without-description';
                ?>">
                    <div class="col-xs-24 col-sm-9 col-md-9 col-lg-8 category-image-container">

                        <?php #get the image
                            $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
                            $image = wp_get_attachment_url( $thumbnail_id );
                        ?>
                        <img src="<?php echo $image; ?>" alt="">
                    </div>
                    <div class="col-xs-17 col-sm-10 col-md-10 col-lg-12">

                        <h2 class="category-name">
                            <a href="<?php echo get_term_link($cat->slug, 'product_cat'); ?>">

                                <?php echo $cat->name; ?>

                            </a>
                        </h2>

                        <?php if ( !empty($cat->description) ) : ?>
                            <p class="category-description">

                                <?php echo $cat->description; ?>

                            </p>
                        <?php endif; ?>

                    </div>
                    <div class="col-xs-7 col-sm-5 col-md-5 col-lg-4">
                        <a href="<?php echo get_term_link($cat->slug, 'product_cat') ?>" class="btn-group browse-group">
                            <span class="btn btn-browse">Browse</span>
                            <span class="btn arrow-addon"><img src="<?php the_field('browse-arrow', 'options'); ?>" alt="Button arrow"></span>
                        </a>
                    </div>
                </div>

        <?php endforeach;
            elseif( is_tax() && isset($category) ) : //there is any categories but it's a category
        ?>

                <div class="category-text">
                    <h1>
                        <?php echo $category->name; ?>
                    </h1>
                    <p>
                        <?php echo $category->description; ?>
                    </p>
                </div>
                <div class="products-row">

            <?php
                //get the current page
                $paged = (get_query_var( 'paged' ))? get_query_var( 'paged' ) : 1;
                //max pages of the products
                $max_num_pages = $wp_query->max_num_pages;

                $args = array(
                    'post_type' => 'product',
                    'product_cat' => $category->slug,
                    'paged' => $paged
                );

                query_posts($args);
                while(have_posts()) : the_post();
                    //get the product preview image src
                    $img_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
                ?>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <a href="<?php the_permalink() ?>" class="thumbnail">
                        <img src="<?php echo $img_url; ?> " alt="">
                        <div class="caption">
                            <button type="button" class="btn btn-primary btn-block">Learn More</button>
                        </div>
                    </a>
                </div>

            <?php
                endwhile;
                wp_reset_query();
        ?>
            </div> <!-- /. products row -->

            <!-- Pagination -->
            <?php if($max_num_pages > 1):
                get_my_pagination();
            endif; ?><!-- /. pagination -->

        <?php  endif; ?>
        <!-- /. categories -->

    </article><!-- /. description -->


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
