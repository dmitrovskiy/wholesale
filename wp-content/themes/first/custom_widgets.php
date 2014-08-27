<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 26.08.14
 * Time: 16:59
 */

//Quick-ship widget
class WS_QS_Widget extends WP_Widget {

    protected $content;
    protected $get_started_link;

    public function __construct() {

        parent::__construct(
            'ws_qs_widget',
            'Quck ship widget',

            //widget description
            array ( 'description' => 'Quick ship homepage widget')
        );
    }

    //front-end rendering widget
    public function widget($args, $instance) {

        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $content = $instance['content'];
        $get_started_link = $instance['get_started_link'];

        //start rendering
        ?>

        <div class="panel about-aside-panel">
            <article class="panel-body">
                <header><h1><?php echo $title; ?></h1></header>

                <p>
                    <?php echo $content; ?>
                </p>

            </article>
            <div class="panel-footer">
                <a href="<?php echo $get_started_link; ?>" class="btn btn-browse">Get Started <span class="link-arrow"></span></a>
            </div>
        </div>

    <?php
    }


    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['name'] = strip_tags( $new_instance['name'] );
        $instance['show_info'] = $new_instance['show_info'];
        $instance['content'] = $new_instance['content'];
        $instance['get_started_link'] = $new_instance['get_started_link'];

        return $instance;
    }

    //admin-side render widget
    // Бек-энд виждета
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'new title', 'quick-ship-widget' );
        }

        if ( isset( $instance[ 'content' ] ) ) {
            $content = $instance[ 'content' ];
        }
        else {
            $content = __( 'new content', 'quick-ship-widget');
        }

        if ( isset( $instance[ 'content' ] ) ) {
            $get_started_link = $instance['get_started_link'];
        }
        else {
            $get_started_link = __( 'link address', 'quick-ship-widget');
        }

        // admin inputs
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>"
                   type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content: '); ?></label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id( 'content' ); ?>"
                   name="<?php echo $this->get_field_name( 'content'); ?>"
                   type="text"
                   value="<?php echo esc_attr( $content ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('get_started_link'); ?>"> <?php  _e( 'Get started link: ' ); ?></label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id('get_started_link'); ?>"
                   name="<?php echo $this->get_field_name('get_started_link'); ?>"
                   type="text"
                   value="<?php echo $get_started_link; ?>" />
        </p>
    <?php

    }
}//end of the class WS_QS_Widget

//Product resources widget
class WS_Resource_Widget extends WP_Widget {

    public function __construct () {
        parent::__construct(
            'ws_resources_widget',
            'Product resources widget',

            //widget description
            array ( 'description' => 'Resources widget for product pages' )
        );
    }

    //front-end rendering widget
    public function widget($args, $instance) {

        extract($args);

        $title = apply_filters('widget_title', $instance['title']);


        //start rendering
        ?>

        <div class="panel price-sheets-panel">
            <div class="panel-heading">
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="panel-body">

                <?php //getting the resurces and rendering it
                $args = array (
                    'post_type' => 'ws_resources'
                );

                $resources = get_posts( $args );
                foreach ($resources as $resource) :
                    ?>
                    <a href="<?php the_field( 'attachment', $resource->ID ); ?>" class="product-cost">

                        <img src="<?php the_field( 'attachment_icon', 'options' ); ?>" alt="">
                        <span class="product-name"> <?php echo $resource->post_title; ?> </span>

                    </a>
                <?php endforeach; ?>

            </div>
        </div>

    <?php
    }


    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        //Strip tags from title and name to remove HTML
        $instance['title'] = strip_tags( $new_instance['title'] );

        return $instance;
    }

    //admin-side render widget
    // Бек-энд виждета
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }

        // admin inputs
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat"
                   id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>"
                   type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php

    }

}//end of the class WS_Resources_Widget