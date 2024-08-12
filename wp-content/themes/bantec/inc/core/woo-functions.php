<?php
// breadcrumb remove 
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// remove ordering
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
// action content product 
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
	return array(
		'width'  => 400,
		'height' => 400,
		'crop'   => 1,
	);
} );
function limit_related_products_number( $args ) {
    $args['posts_per_page'] = 4;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'limit_related_products_number' );
// shop/archive post per page 
function change_products_per_page( $products_per_page ) {
    return 8;
}
add_filter( 'loop_shop_per_page', 'change_products_per_page', 20 );





// product-content
if( !function_exists('bantec_loop_product_thumbnail') ) {
    function bantec_loop_product_thumbnail( ) {
        global $product;
        global $post;
        global $woocommerce;
        $rating = wc_get_rating_html($product->get_average_rating());
        $ratingcount = $product->get_review_count();
        ?>
        <div class="product__item text-center transition-3 mb-50">
           <div class="product__thumb p-relative mb-25 fix">
            <?php if( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail(); ?>
            <?php endif; ?>

            <div class="on-sale-wrap">
               <?php woocommerce_show_product_loop_sale_flash(); ?> 
            </div>
            
              
              <div class="product__icon">
                <?php 
                if( class_exists( 'WPCleverWoosq' ) ){
                        echo do_shortcode('[woosq]');
                     }
                ?>

                 <?php  woocommerce_template_loop_add_to_cart();?>

                 <?php 
                 if( class_exists( 'TInvWL_Admin_TInvWL' ) ){
                     echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                    }
                 ?>
              </div>
           </div>

           <div class="product__content">
              <h4 class="product__title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h4>
              <div class="product__price">
                 <?php echo woocommerce_template_loop_price();?>
              </div>
              <?php if(!empty($rating)) : ?>
              <div class="product__rating">
                  <?php echo bantech_kses($rating); ?> 
              </div> 
              <?php endif; ?>
           </div>
        </div>
        <?php
    }
}
add_action( 'woocommerce_before_shop_loop_item', 'bantec_loop_product_thumbnail', 10 );

add_filter( 'woosq_button_html', 'bantec_woosq_button_html', 10, 2 );
function bantec_woosq_button_html( $output , $prodid ) {
    return $output = '<a href="#" class="icon-btn woosq-btn woosq-btn-' . esc_attr( $prodid ) . ' ' . get_option( 'woosq_button_class' ) . '" data-id="' . esc_attr( $prodid ) . '" data-effect="mfp-3d-unfold"><i class="fal fa-eye"></i></a>';
}


