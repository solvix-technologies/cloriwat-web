<?php


/** Set ABSPATH for execution */
define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );
define( 'WPINC', 'wp-includes' );


/**
 * @ignore
 */
function add_filter() {}

/**
 * @ignore
 */
function esc_attr($str) {return $str;}

/**
 * @ignore
 */
function apply_filters() {}

/**
 * @ignore
 */
function get_option() {}

/**
 * @ignore
 */
function is_lighttpd_before_150() {}

/**
 * @ignore
 */
function add_action() {}

/**
 * @ignore
 */
function did_action() {}

/**
 * @ignore
 */
function do_action_ref_array() {}

/**
 * @ignore
 */
function get_bloginfo() {}

/**
 * @ignore
 */
function is_admin() {return true;}

/**
 * @ignore
 */
function site_url() {}

/**
 * @ignore
 */
function admin_url() {}

/**
 * @ignore
 */
function home_url() {}

/**
 * @ignore
 */
function includes_url() {}

/**
 * @ignore
 */
function wp_guess_url() {}

if ( ! function_exists( 'json_encode' ) ) :
/**
 * @ignore
 */
function json_encode() {}
endif;



/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
 
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}

$color = $_GET['main_color'];

ob_start(); ?>



/*** 
=====================================================
	Theme Main Color Css
=====================================================
***/

.title span,
.header-top .social-links li a:hover,
.header-top .info li i,
.header-top .info li span,
.header-top .info li a:hover,
.banner-style-four .banner-carousel .content-box h4,
.sec-title-two h5,
.feature-section-home4 .single-item .inner-box .icon-box,
.service-section-home4 .single-item .inner-box .icon-box,
.cta-section-home4 .content-box .list li:before,
.woocommerce a.added_to_cart,
.woocommerce .woocommerce-info a,
.woocommerce .woocommerce-info::before,
.woocommerce-privacy-policy-link,
.woocommerce-account .woocommerce-MyAccount-navigation ul li a,
.woocommerce-account .woocommerce-MyAccount-content p a,
.tag_post a,
.wp-block-group ul li a:hover,
.blog-sidebar .post-widget .post p

{
	color:#<?php echo esc_attr( $color ); ?>!important;
}


/*** 
=====================================================
	Theme Main Background Color Css
=====================================================
***/
.theme-btn.btn-one,
.banner-style-four .banner-carousel .content-box h4:before,
.banner-style-four .banner-carousel .content-box h4:after,
.banner-style-four .banner-carousel .content-box .btn-box .banner-btn:before,
.sec-title-two h5:before,
.sec-title-two h5:after,
.feature-section-home4 .single-item .inner-box .icon-box:before,
.service-section-home4 .single-item .inner-box:before,
.works-section-home4 .single-item .inner-box .icon-box,
.chooseus-section-home4 .single-item .icon-box,
.page-title:before,
span.page-numbers.current,
.team-member-info-box .social-links-style1 li a:hover i,
.resume .info-box .title:after,
.woocommerce a.button,
.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce nav.woocommerce-pagination ul li:hover a,
.woocommerce button.button,
.woocommerce button.button:disabled:hover, .woocommerce button.button[disabled]:disabled:hover,
.pagination li .dots:hover,
.tagcloud a:hover,
.wp-block-search .wp-block-search__button

{
	background: #<?php echo esc_attr( $color ); ?>!important;
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}


/************** border-color***************/

.project-page ,
.banner-style-four .banner-carousel .content-box .btn-box .banner-btn:hover,
.about-section-home4 .content-box .list li:before,
.image_block_2 .image-box .text,
span.page-numbers.current,
.woocommerce nav.woocommerce-pagination ul li:hover a,
.woocommerce nav.woocommerce-pagination ul li span,
.pagination li .dots:hover,
blockquote,
.tagcloud a:hover

{
	border-color:#<?php echo esc_attr( $color ); ?>!important;
}

/* ------------------////End of Section////--------------*/

/************** box-shadow***************/
.featured-three-column .column .inner-box:hover

/************** box-shadow***************/
{
	box-shadow:0px 0px 10px <?php echo esc_attr( hex2rgba($color, 0.8));?> !important;
}

/* ------------------////End of Section////--------------*/

/**************  border-color***************/

.latest_blog_wrapper .post .date:after,.blog_post_meta .post .date:after

/**************  border-color rgba***************/
{
    border-color: rgba(253, 199, 22, 0)!important;
}
/* ------------------////End of Section////--------------*/


/* template-color */

.scroll-top{
  background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.handle-preloader{
	background-color: #002c8f;
}

.preloader-close{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.theme-btn.btn-one{
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}



.main-header .nav-right .cart-box a span{
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.main-header .search-box-btn:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.main-header .nav-right .cart-box a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.main-menu .navigation > li.current > a,
.main-menu .navigation > li:hover > a{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.main-menu .navigation > li > ul > li > a:hover,
.main-menu .navigation > li > .megamenu li > a:hover{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.main-menu .navigation > li > ul > li > ul > li > a:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.banner-carousel .content-box .btn-box .theme-btn:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.feature-block-one .inner-box .icon-box{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.service-block-one .inner-box .icon-box{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.service-block-one .inner-box h4 a:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}



.content_block_2 .content-box .single-item .icon-box{
	background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.theme-btn.btn-two:before{
  background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.theme-btn.btn-two:hover{
	border-color: #<?php echo esc_attr( $color ); ?>!important;
}

.shop-block-one .inner-box .lower-content h4 a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.shop-block-one .inner-box .lower-content h6{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.testimonial-block-one .inner-box .rating li{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.testimonial-block-one .inner-box .designation{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.testimonial-section .owl-dots .owl-dot.active span,
.testimonial-section .owl-dots span:hover{
	background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.team-block-one .inner-box .image-box .social-links li a:hover{
	background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.team-block-one .inner-box .lower-content h4 a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.team-block-one .inner-box .lower-content .share-box a:hover{
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.content_block_3 .content-box .theme-btn:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.news-block-one .inner-box .lower-content .category a{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.news-block-one .inner-box .lower-content h4 a:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.news-block-one .inner-box .lower-content .post-info li a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.main-footer .footer-top .text h2 span{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.main-footer .footer-top .support-box a{
	background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.main-footer .contact-widget .info-list li a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.main-footer .contact-widget .info-list li i{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.main-footer .links-widget .links-list li a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.main-footer .links-widget .links-list li a:before{
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.main-footer .subscribe-widget .form-group button{
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.main-footer .subscribe-widget .form-group input:focus{
  border-color: #<?php echo esc_attr( $color ); ?>!important;
}

.footer-bottom .copyright p a{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.footer-bottom .social-links li a:hover{
  background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.footer-bottom .footer-nav li a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.banner-carousel .owl-nav button:hover{
  background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.banner-style-two .banner-carousel .content-box .btn-box .banner-btn:before{
  background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.banner-style-two .banner-carousel .content-box .btn-box .banner-btn:hover{
  border-color:#<?php echo esc_attr( $color ); ?>!important;
}

.content_block_4 .content-box .list li:before{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.content_block_5 .form-inner .form-group input:focus,
.content_block_5 .form-inner .form-group textarea:focus{
  border-color:#<?php echo esc_attr( $color ); ?>!important;
}

.image_block_2 .image-box .text h2{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.pricing-section .tab-btn-box .tab-btns li.active-btn{
  background-color:#<?php echo esc_attr( $color ); ?>!important;
  border-color:#<?php echo esc_attr( $color ); ?>!important;
}



.testimonial-style-two .owl-dots .owl-dot.active span,
.testimonial-style-two .owl-dots span:hover{
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}


.testimonial-block-two .inner-box .designation{
	color:#<?php echo esc_attr( $color ); ?>!important;
}




.testimonial-style-three .inner-box .rating li{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.testimonial-style-three .inner-box .designation{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.accordion-box .block .acc-btn.active h4{
  background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.faq-sidebar .form-inner form .form-group input:focus,
.faq-sidebar .form-inner form .form-group textarea:focus{
  border-color: #<?php echo esc_attr( $color ); ?>!important;
}

.sortable-masonry .filters .filter-tabs li.active{
  background-color:#<?php echo esc_attr( $color ); ?>!important;
  border-color:#<?php echo esc_attr( $color ); ?>!important;
}

.service-block-two .inner-box .icon-box .icon{
	background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.service-block-two .inner-box h4 a:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.service-details-content .content-two .inner-box .single-item .icon-box{
	background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.service-sidebar .category-list li a.current,
.service-sidebar .category-list li a:hover{
  border-color: #<?php echo esc_attr( $color ); ?>!important;
}

.service-sidebar .category-list li a:before{
	background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.default-sidebar .sidebar-search .form-group input:focus{
  border-color: #<?php echo esc_attr( $color ); ?>!important;
}

.default-sidebar .sidebar-search .form-group input:focus + button,
.default-sidebar .sidebar-search .form-group button:hover{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.default-sidebar .sidebar-category .category-list li a i{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.default-sidebar .sidebar-category .category-list li a:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.range-slider .filter-btn{
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.default-sidebar .tags-widget .tags-list li a:hover{
	border-color: #<?php echo esc_attr( $color ); ?>!important;
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.product-details-content .image-box .preview-link a:hover{
  border-color: #<?php echo esc_attr( $color ); ?>!important;
	background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.product-details-content .product-details .rating li{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.product-details-content .product-details .customer-rating .review a:hover{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.product-details-content .product-details .addto-cart-box .clearfix li a:hover{
  border-color:#<?php echo esc_attr( $color ); ?>!important;
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.product-details-content .product-details .other-option .social-links li a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.shop-details .product-discription .tabs-content .customer-review .single-review .inner .rating li{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.shop-details .product-discription .tabs-content .customer-comments .rating-box .rating li{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.shop-details .product-discription .tabs-content .customer-comments .comment-form .form-group input:focus,
.shop-details .product-discription .tabs-content .customer-comments .comment-form .form-group textarea:focus{
	border-color:#<?php echo esc_attr( $color ); ?>!important;
}

.cart-section .cart-table tbody tr .prod-column .column-box .remove-btn:hover{
	background-color: #<?php echo esc_attr( $color ); ?>!important;
	border-color: #<?php echo esc_attr( $color ); ?>!important;
}

.cart-section .othre-content .coupon-box button{
	background-color:#<?php echo esc_attr( $color ); ?>!important;
}

.checkout-section .upper-box .single-box a{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.checkout-section .billing-form .form-group input:focus{
  border-color: #<?php echo esc_attr( $color ); ?>!important;
}

.pagination li a:hover,
.pagination li a.current{
  background-color: #<?php echo esc_attr( $color ); ?>!important;
	border-color:#<?php echo esc_attr( $color ); ?>!important;
}

.blog-sidebar .post-widget .post h5 a:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.blog-sidebar .archives-widget .archives-list li a:hover{
  color: #<?php echo esc_attr( $color ); ?>!important;
}

.news-block-one .inner-box .lower-content h3 a:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.blog-details-content .content-one blockquote .icon-box{
	color: #<?php echo esc_attr( $color ); ?>!important;
}

.blog-details-content .post-share-option .social-links li a:hover{
  background-color: #<?php echo esc_attr( $color ); ?>!important;
}

.blog-details-content .comment-box .comment .reply-btn:hover{
  color:#<?php echo esc_attr( $color ); ?>!important;
}

.default-form .form-group input:focus,
.default-form .form-group textarea:focus{
  border-color: #<?php echo esc_attr( $color ); ?>!important;
}

.contact-style-two .info-list li i{
	color:#<?php echo esc_attr( $color ); ?>!important;
}

.contact-style-two .info-list li p a:hover{
color:#<?php echo esc_attr( $color ); ?>!important;
}


<?php 

$out = ob_get_clean();
$expires_offset = 31536000; // 1 year
header('Content-Type: text/css; charset=UTF-8');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");
header('Vary: Accept-Encoding'); // Handle proxies
header('Content-Encoding: gzip');

echo gzencode($out);
exit;