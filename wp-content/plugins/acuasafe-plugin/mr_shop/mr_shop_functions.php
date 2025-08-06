<?php
/**
 * Mrshop Settings
 *
 */



if ( ! function_exists( 'mr_product_rating' ) ) {

    function mr_product_rating() {
         global $product;
        $rating = intval( $product->get_average_rating() );

        if ( $rating && wc_review_ratings_enabled() ) {
            ?>
<ul class="mr_star_rating">
            <?php for ( $rs = 1; $rs <= $rating; $rs++ ) : ?>
    <li class="mr_star_full"><i class="fa fa-star"></i></li>
    <?php endfor; ?>
            <?php
            if ( ( 5 - $rating ) > 0 ) {
                for ( $rns = 1; $rns <= ( 5 - $rating ); $rns++ ) :
                    ?>
    <li class="mr_star_empty"><i class="fa fa-star-o"></i></li>
                    <?php
                    endfor;
            }
            ?>
</ul>
            <?php
        }
    }
}

//function for Hot Sale
function mr_product_cat_list( ) {
 
    $term_id = 'product_cat';
    $categories = get_terms( $term_id );
 
    $cat_array['all'] = "Categories";

    if ( !empty($categories) ) {
        foreach ( $categories as $cat ) {
            $cat_info = get_term($cat, $term_id);
            $cat_array[ $cat_info->slug ] = $cat_info->name;
        }
    }
 
    return $cat_array;
}


function mr_product_tag_list( ) {
 
    $term_id = 'product_tag';
    $tag = get_terms( $term_id );
 
    $tag_array['all'] = "Tags";

    if ( !empty($tag) ) {
        foreach ( $tag as $tag ) {
            $tag_info = get_term($tag, $term_id);
            $tag_array[ $tag_info->slug ] = $tag_info->name;
        }
    }
 
    return $tag_array;
}


function mrlab_get_product_prices( $product ) {

    $saleargs = array(
        'qty'   => '1',
        'price' => $product->get_sale_price(),
    );
    $args     = array(
        'qty'   => '1',
        'price' => $product->get_regular_price(),
    );

    $tax_display_mode      = get_option( 'woocommerce_tax_display_shop' );
    $display_price         = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product ) : wc_get_price_excluding_tax( $product );
    $display_regular_price = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product, $args ) : wc_get_price_excluding_tax( $product, $args );
    $display_sale_price    = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product, $saleargs ) : wc_get_price_excluding_tax( $product, $saleargs );
    switch ( $product->get_type() ) {
        case 'variable':
            $price = $product->get_variation_regular_price( 'min', true );
            $sale  = $display_price;
            break;
        case 'simple':
            $price = $display_regular_price;
            $sale  = $display_sale_price;
            break;
    }
    if ( isset( $sale ) && ! empty( $sale ) && isset( $price ) && ! empty( $price ) ) {
        return array(
            'sale'  => $sale,
            'price' => $price,
        );
    }
    return false;
}


function mrlab_product_special_price_calc( $data ) {
    // sale and price
    if ( ! empty( $data ) ) {
        extract( $data );
    }
    $prefix = '';
    if ( isset( $sale ) && ! empty( $sale ) && isset( $price ) && ! empty( $price ) ) {
        if ( $price > $sale ) {
            $prefix  = '-';
            $dval    = $price - $sale;
            $percent = ( $dval / $price ) * 100;
        }
    }

    if ( isset( $percent ) && ! empty( $percent ) ) {
        return array(
            'prefix'  => $prefix,
            'percent' => round( $percent ),
        );
    }
    return false;
}









