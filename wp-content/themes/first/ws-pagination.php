<?php
/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 26.08.14
 * Time: 14:43
 *
 * This is a pagination part
 */
    global $wp_query;

    //get the current page
    $paged = (get_query_var( 'paged' ))? get_query_var( 'paged' ) : 1;
    //get count of the posts per page
    $posts_per_page = get_query_var( 'posts_per_page' );
    //max pages of the products
    $max_num_pages = $wp_query->max_num_pages;

    //scope offset
    $left_scope_offset = 2;
    $right_scope_offset = 2;

    //scope indexes
    $left_scope = 1;
    $right_scope = $max_num_pages;

    //left scope with offset
    if($paged - $left_scope_offset > 1)
        $left_scope = $paged - $left_scope_offset;
    else // expanding right scope
        $right_scope_offset += ($left_scope_offset - $paged) + 1;

    //right scope with offset
    if($paged + $right_scope_offset < $max_num_pages)
        $right_scope = $paged + $right_scope_offset;
    else
       $left_scope -= ($paged + $right_scope_offset) - $max_num_pages;

    //recheck left scope
    if($left_scope < 1)
        $left_scope = 1;

?>



<?php
//get the next and previous page links
$next_link = get_next_posts_link('&raquo;') ? get_next_posts_link('&raquo;') : '';
$previous_link = get_previous_posts_link('&laquo;')? get_previous_posts_link('&laquo;') : '';

?>
<ul class="pagination">
    <?php //previous link building
    if( empty($previous_link) ):
        ?>
        <li class="disabled">
            <a href="#"> <?php echo '&laquo;'; ?> </a>
        </li>
    <?php else: ?>
        <li>
            <?php echo $previous_link; ?>
        </li>
    <?php endif; ?>



    <?php //numbered links
    for( $i=$left_scope ; $i <= $right_scope; $i++ ): ?>
        <li <?php echo $i == $paged? 'class="active"' : ''; ?>>
            <a href="<?php echo get_pagenum_link($i); ?>">
                <?php echo $i; ?>
            </a>
        </li>
    <?php endfor; ?>




    <?php // '...' link
        if($right_scope != $max_num_pages):
    ?>
        <li class="disabled">
            <a>...</a>
        </li>
    <?php endif; ?>




    <?php //next link building
    if( empty($next_link) ):
        ?>
        <li class="disabled">
            <a href="#"> <?php echo '&raquo;'; ?> </a>
        </li>
    <?php else: ?>
        <li>
            <?php echo $next_link; ?>
        </li>
    <?php endif; ?>
</ul>