<?php

    global $wp_query;

    //get the queried object info
    $product_info = $wp_query->get_queried_object();

    //render header
    get_header();
?>

    <!-- left column -->
    <div class="col-md-17 col-content">

        <!-- decription -->
        <article class="cat-decription">

            <!-- sub product header -->
            <header class="row product-header">
                <div class="col-xs-19 col-sm-8 col-lg-7">

                    <img src="<?php the_field('featured_image', $product_info->ID); ?>" alt="">

                </div>


                <!-- Pool Code -->
                <div class="col-xs-5 col-sm-4 col-md-3 pool-code pull-right">

                    <?php
                        $pool_code_arr = get_field( 'pool_code', $product_info->ID );

                        if( isset($pool_code_arr) && is_array($pool_code_arr) && in_array( 'pool_code', $pool_code_arr, true ) ):
                    ?>

                        <img class="pull-right" src="<?php the_field( 'pool_code_image', 'options' ); ?>" alt="">

                    <?php endif; ?>

                </div>

                <div class="clearfix visible-xs visible-sm"></div>

                <div class="col-xs-24 col-md-13 col-lg-14 product-name">
                    <h1><?php echo $product_info->post_title ?></h1>
                </div>
            </header><!-- /. sub roduct header -->

            <!-- product accodrion -->
            <div class="product-accordion">
                <h4>Details</h4>
                <div class="details">

                    <?php //render the details information
                        if( have_rows( 'details_info', $product_info->ID ) ):
                    ?>
                    <table class="table">

                        <?php while( have_rows( 'details_info', $product_info->ID ) ):  the_row(); ?>
                        <tr>

                            <td><?php the_sub_field( 'details_key' ); ?></td>
                            <td><?php the_sub_field( 'details_value' ); ?></td>

                        </tr>
                        <?php endwhile; ?>

                    </table>
                    <?php endif; ?>

                </div>

                <h4>Available Colors</h4>
                <div class="colors">

                    <?php //render available colors
                        while( have_rows( 'available_colors', $product_info->ID ) ) : the_row(); ?>
                    <div class="thumbnail">

                        <span class="thumbnail-color" style="background-color: <?php the_sub_field( 'color_value' ); ?>"></span>
                        <div class="caption"> <?php the_sub_field( 'color_name' ); ?> </div>

                    </div>
                    <?php endwhile; ?>

                </div>

                <h4>Pricing</h4>
                <div class="pricing">

                    <?php //rendering the pricing table
                        if( have_rows( 'pricing_info', $product_info->ID ) ) :
                    ?>
                    <table class="table">
                        <?php while( have_rows( 'pricing_info', $product_info->ID ) ) : the_row(); ?>
                        <tr>

                            <td> <?php the_sub_field( 'pricing_key' ); ?> </td>
                            <td> <?php the_sub_field( 'pricing_value' ); ?> </td>

                        </tr>
                        <?php endwhile; ?>
                    </table>
                    <?php endif; ?>

                </div>

                <h4>Available Gates</h4>
                <div class="gates">

                    <?php //rendering available gates info ?
                        while( have_rows( 'available_gates', $product_info->ID ) ) : the_row();
                    ?>
                    <div class="gate-item clearfix">

                        <div class="col-md-9 col-lg-8 gate-photo">
                            <img src="<?php the_sub_field( 'gate_image' ); ?>" alt="">
                        </div>
                        <div class="col-md-15 col-lg-16 gate-description">

                            <?php the_sub_field( 'gate_content' ); ?>

                        </div>

                    </div>
                    <?php endwhile; ?>
                </div>

                <h4>Photo Gallery</h4>
                <div class="gallery">

                    <?php //render the gallery
                            while( have_rows( 'product_gallery', $product_info->ID ) ) : the_row();
                                $img_url = get_sub_field( 'gate_photo' );
                    ?>
                        <a href="<?php echo $img_url; ?>" rel="shadowbox">

                            <img src="<?php echo $img_url; ?>" alt=""/>

                        </a>
                    <?php endwhile; ?>

                </div>
            </div><!-- /. product accordion -->

        </article><!-- /. decription -->

    </div><!-- /. left column -->

    <!-- right-column -->
    <aside class="col-md-7 right-column">

        <?php get_sidebar('productright'); ?>

    </aside><!-- /. right column -->

    <div class="clearfix"></div>

<?php
    // link the js scripts
    wp_enqueue_script('accordion-panel');
    wp_enqueue_script('start_panel-accordion');
    wp_enqueue_script('start_product_accordion');

    wp_enqueue_script('shadowbox');
    wp_enqueue_script('start_shadowbox');
?>

<?php
    //render the footer
    get_footer();
?>