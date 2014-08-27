<!DOCTYPE html>
<html lang="ru">
<head>
    <title><?php wp_title(); ?></title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Ишак -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <?php wp_head() ?>

</head>
<body>

<div class="container">
    <header id="header">

        <!-- DESKTOP VERSION -->

        <div class="row visible-md visible-lg">
            <!-- logo -->
            <div class="col-logo col-md-5">
                <a href="<?php the_field('logo_link', 'options' ); ?>">
                    <img src="<?php the_field('logo', 'options'); ?>" alt="wholesale logo">
                </a>
            </div>

            <!-- toolbar & navbar -->
            <div class="col-md-19">

                <!-- toolbar -->
                <div class="row">
                    <div class="col-toolbar col-md-21 col-lg-18 pull-right">

                        <div class="col-toolbar-back">
                            <div class="call-col col-md-10">Give us a call:
                                <strong>
                                    <a class="phone" href="tel:<?php the_field('phone_number', 47); ?>">
                                        <?php the_field('phone_number', 47); ?>
                                    </a>
                                </strong>
                            </div>

                            <!-- search form -->
                            <div class="form-search col-md-14 pull-right">
                                <form action="<?php echo home_url( '/' ); ?>" name="search" method="get" class="form" role="search">
                                    <div class="form-group">
                                        <label class="sr-only" for="search-input-mob">Search Our Site</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <img src="<?php the_field('search_icon', 'options'); ?>" alt="search icon">
                                            </span>
                                            <input type="search" name="s" id="search-input-mob" class="form-control" placeholder="Search Our Site">
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-search text-uppercase">
                                                    go
                                                </button>
                                            </span>
                                        </div><!--/. input group -->
                                    </div>
                                </form>
                            </div><!--/. search form -->
                        </div>

                    </div>
                </div><!--/. toolbar -->


                <div class="row">

                    <!-- navbar -->
                    <div class="col-md-18 col-lg-19">
                        <nav class="navbar navbar-default navbar-main" role="navigation">
                            <div class="container-fluid">
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right">
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
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div><!--/. navbar -->

                    <!-- browse button -->
                    <div class="col-browse col-md-6 col-lg-5">
                        <a href="<?php the_field('browse_products_link', 47) ?>" class="btn-group browse-group">
                            <span class="btn btn-browse">Browse Products</span>
                            <span class="btn arrow-addon"><img src="<?php the_field('browse-arrow', 'options'); ?>" alt="Button arrow"></span>
                        </a>
                    </div><!--/. browse button -->

                </div>
            </div>
        </div>

        <!-- /. DESKTOP VERSION -->

        <!-- MOBILE VERSION -->

        <div class="visible-xs visible-sm">

            <!-- navbar -->
            <div class="col-xs-4 col-sm-5 navbar-mobile-col">
                <nav class="navbar navbar-default navbar-main" role="navigation">
                    <!--<div class="container-fluid">-->
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header visible-xs visible-sm pull-left">
                        <button type="button" data-toggle="collapse" data-target="#collapse-nav-links">
                            <div class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div>
                            <a class="navbar-brand visible-sm">Menu</a>
                        </button>
                    </div>

                </nav>
            </div><!--/. navbar -->

            <!-- toolbar -->
            <div class="col-toolbar col-xs-16 col-sm-19 toolbar-mobile-col">

                <div class="col-toolbar-back">
                    <div class="hidden-xs call-col col-sm-11">Give us a call: <strong><?php the_field('phone_number', 47); ?></strong></div>

                    <!-- search form -->
                    <div class="form-search col-xs-24 col-sm-13 pull-right">
                        <form action="<?php echo home_url( '/' ); ?>" name="search" method="get" class="form" role="search">
                            <div class="form-group">
                                <label class="sr-only" for="search-input">Search Our Site</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <img src="<?php the_field('search_icon', 'options'); ?>" alt="search icon">
                                    </span>
                                    <input type="search" name="s" id="search-input" class="form-control" placeholder="Search Our Site">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-search text-uppercase">
                                            go
                                        </button>
                                    </span>
                                </div><!--/. input group -->
                            </div>
                        </form>
                    </div><!--/. search form -->
                </div>

            </div><!--/. toolbar -->

            <a href="tel:<?php the_field('phone_number', 47); ?>" class="col-xs-4 visible-xs btn btn-call">
                <img src="<?php the_field('tube', 'options'); ?>" alt=""/>
            </a>

            <div class="clearfix"></div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="collapse-nav-links">
                <ul class="nav navbar-nav navbar-right">
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
            </div><!-- /.navbar-collapse -->

            <div class="clearfix"></div>

            <!-- logo -->
            <div class="col-logo">
                <a href="<?php the_field('logo_link', 'options' ); ?>">
                    <img src="<?php the_field('logo', 'options'); ?>" alt="wholesale logo">
                </a>
            </div><!--/. logo -->

            <!-- browse button -->
            <div class="hidden-xs col-browse col-sm-9 col-sm-push-3">
                <a href="<?php the_field('browse_products_link', 47) ?>" class="btn-group browse-group">
                    <span class="btn btn-browse">Browse Products</span>
                    <span class="btn arrow-addon"><img src="<?php the_field('browse-arrow', 'options'); ?>" alt="Button arrow"></span>
                </a>
            </div><!--/. browse button -->

        </div>

        <!-- /. MOBILE VERSION -->

    </header>