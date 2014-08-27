/**
* Created by Vladimir on 15.08.14.
*/
$(function() {
    $(".list-slider-window" ).flexslider( {
        animation: 'slide',
        slideshow: true,
        slideshowSpeed: 5000,
        touch: true,
        directionNav: false,
        manualControls: '.panel-list-slider .panel-body ul li'
    } );
});
