function getLatestProducts(int $howMany)
{
    $args = array(
        'post_type' => 'product',
        'stock' => 1,
        'posts_per_page' => $howMany,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $query = new \WP_Query($args);
    return $query;
}

function getAllWooCategories() {
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
           'hide_empty'   => $empty
    );
   $all_categories = get_categories( $args );
   return $all_categories;
}

function getNumItemsCart() {
    global $woocommerce;
    return $woocommerce->cart->cart_contents_count;
}
