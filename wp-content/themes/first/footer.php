
<!-- footer -->
<footer class="row">

    <!-- navigation -->
    <!-- DESKTOP,LAPTOP,TABLET VERSION -->

    <nav class="hidden-xs nav navbar-inverse" id="footer-nav-laptop">

        <!-- nav links -->
        <div class="col-sm-15 col-md-17">
            <ul class="nav navbar-nav">
                <?php
                    $args = array (
                        'container' => false,
                        'items_wrap' => '%3$s',
                        'theme_location' => 'main_menu'
                    );
                    wp_nav_menu($args);
                ?>
            </ul>
        </div><!-- /. nav links -->

        <!-- search form -->
        <div class="form-search col-sm-9 col-md-7 pull-right">
            <form class="form" action="<?php echo home_url( '/' ); ?>" name="search" method="get">
                <div class="form-group">
                    <label class="sr-only" for="search-input-down">Search Our Site</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <img src="<?php the_field('search_icon', 'options'); ?>" alt="search icon">
                        </span>
                        <input type="search" name="s" id="search-input-down" class="form-control" placeholder="Search Our Site">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-search text-uppercase">
                                go
                            </button>
                        </span>
                    </div><!--/. input group -->
                </div>
            </form>
        </div><!--/. search form -->
    </nav>
    <!--/. DESKTOP,LAPTOP,TABLET VERSION -->
    <!--/. navigation -->

    <!-- navigation -->
    <!-- MOBILE VERSION -->
    <nav class="row visible-xs nav navbar-inverse" id="footer-nav-mobile">
        <div class="navbar-header">
            <button type="button"  data-toggle="collapse" data-target="#collapse-nav-links-footer">
                <div class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <a class="navbar-brand">Menu</a>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="collapse-nav-links-footer">

            <ul class="nav navbar-nav">
                <?php
                //show the menu
                $args = array(
                    'theme_location' => 'main_menu',
                    'items_wrap' => '%3$s',
                    'container' => false
                );
                wp_nav_menu($args);
                ?>
            </ul>
        </div>
    </nav>
    <!--/. MOBILE VERSION -->
    <!--/. navigation -->

    <div class="footer-container">

        <ul class="hidden-xs col-sm-17 col-md-10 col-lg-11 policy list-inline">
            <?php
            //show the menu
            $args = array(
                'theme_location' => 'policy_menu',
                'items_wrap' => '%3$s',
                'container' => false
            );
            wp_nav_menu($args);
            ?>
        </ul>

        <!-- mobile -->
        <small class="visible-xs-block text-center">
            <?php the_field('copyright', 'options'); ?>
        </small>
        <!-- /. mobile -->

        <!-- /. desktop+ -->
        <div class="cards col-md-4 col-lg-push-1"><img src="<?php the_field('cards', 'options'); ?>" alt=""></div>
        <div class="clearfix visible-sm"></div>

        <small class="hidden-xs col-sm-24 col-md-8">
            <?php the_field('copyright', 'options'); ?>
        </small>
        <!-- /. desktop+ -->
    </div>

</footer><!-- /. footer -->

</div>

<?php
    //link the js scripts
    wp_enqueue_script('panel-accordion');
?>

<?php
    //render the footer
    wp_footer();
?>

</body>
</html>