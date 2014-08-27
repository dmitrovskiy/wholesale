<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 20.08.14
 * Time: 1:10
 */

/**
 * @param $term term which parents we need
 * @return array array of parents
 */
function get_term_parents ( $term ) {
    $result = array();
    $current_term = $term;


    while( $current_term->parent != 0 ) {

        $current_term = get_term(
            $current_term->parent,
            'product_cat'
        );

        array_push( $result, $current_term );

    }

    return $result;
}

function get_my_breadcrumbs ( $category ) {
    $result = '';

    //getting hierarchy parents of the current term
    $term_parents = get_term_parents($category);
    $term_parents = array_reverse($term_parents);

    //building parent links (breadcrumbs)
    foreach ($term_parents as $parent_term) {
        $term_link = get_term_link($parent_term->slug, 'product_cat');
        $term_content = $parent_term->name;
        $result .= "<a href=\"$term_link\"><span class=\"link-content\">$term_content</span>".
                    " <span class=\"link-arrow\"></span></a>";
    }

    //child link
    $term_link = get_term_link( $category->slug, 'product_cat' );
    $term_content = $category->name;
    $result .= "<a href=\"$term_link\"><span class=\"link-content\">$term_content</span></a>";

    return $result;
}

function get_my_pagination() {

    get_template_part('ws', 'pagination');
}