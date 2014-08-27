/**
 * Created by Vladimir on 15.08.14.
 */
$(function() {
   $( ".product-categories" ).accordion( {
            header: '> .cat-parent > a',
            openButton: '<div class="btn-dropdown"><span class="caret"></span></div>',
            openButtonSelector: '.btn-dropdown',
            onlyOpenButton: true
        });

        $( ".product-categories .children").accordion( {
            header: '> .cat-parent > a',
            openButton: '<div class="btn-dropdown"><span class="caret"></span></div>',
            openButtonSelector: '.btn-dropdown',
            onlyOpenButton: true
        })
});