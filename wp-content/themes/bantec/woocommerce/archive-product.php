<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

get_template_part('template-parts/default-options/' . 'breadcrumb');

do_action('woocommerce_before_main_content');

?>
<div class="product-archive section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php

                if (woocommerce_product_loop()) {

                    ?>
                    <div class="row al-center mb-50">
                        <div class="col-xl-7 col-lg-6 col-sm-6">
                            <div class="product__top-result">
                                <?php
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action('woocommerce_before_shop_loop');
                                ?>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 col-sm-6">
                            <div class="product__top-select">
                                <?php woocommerce_catalog_ordering(); ?>
                            </div>
                        </div>
                    </div>

                    <?php


                    woocommerce_product_loop_start();

                    if (wc_get_loop_prop('total')) {
                        while (have_posts()) {
                            the_post();
                            echo '<div class="col">';
                            do_action('woocommerce_shop_loop');

                            wc_get_template_part('content', 'product');
                            echo '</div>';
                        }
                    }

                    woocommerce_product_loop_end();


                    do_action('woocommerce_after_shop_loop');
                } else {

                    do_action('woocommerce_no_products_found');
                }

                ?>
            </div>
        </div>
    </div>
</div>
<?php


do_action('woocommerce_after_main_content');


get_footer('shop');