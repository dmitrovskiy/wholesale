<?php
/*
 * Template Name: Search Page
 */
    global $query_string;
    global $wp_query;

    $query_args = explode( '&', $query_string );

    $search_params = array();

    foreach( $query_args as $query_param ) {
        $query_split = explode( '=', $query_param );

        $search_params[ $query_split[0] ] = urldecode( $query_split[1] );
    }
    //render header
    get_header();
?>


<!-- left column -->
<div class="col-md-17 col-content">

    <?php
    //if we're really want to find something
    if( isset($search_params['s']) ) {
    ?>

    <!-- page thumbnail -->
    <div class="thumbnail thumbnail-page-name">

        <!-- title background of the categories page -->
        <img src="<?php the_field('title_background', 154 ); ?>" alt=""/>
        <h1 class="caption"> Searching for: <?php echo $search_params['s']; ?></h1>

    </div> <!-- /. page thumbnail -->

    <!-- decription -->
    <article class="cat-decription">

            <?php
                //get the current page
                $paged = (get_query_var( 'paged' ))? get_query_var( 'paged' ) : 1;
                //max pages of the products
                $max_num_pages = $wp_query->max_num_pages;

                //try to search it
                $args = array(
                    'post_type' => 'product',
                    's' => $search_params['s'],
                    'paged' => $paged
                );

                query_posts( $args );

                if( have_posts() ) : ?>

                    <div class="products-row">

                    <?php   while( have_posts() ): the_post();
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
                    <?php endwhile;
                        wp_reset_query();
                    ?>

                    </div> <!-- /. products-row -->

                    <!-- Pagination -->
                    <?php if($max_num_pages > 1):
                        get_my_pagination();
                    endif; ?><!-- /. pagination -->

                <?php else: ?>
                    <div class="category-text">
                        There is no search results.
                    </div>

                <?php endif;
            }
        ?>

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

