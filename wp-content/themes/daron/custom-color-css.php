<?php
//Default Theme Color
$daron_skin_theme_color = get_theme_mod('daron_skin_theme_color', '#F71735'); 
//Header
$banner 						= get_header_image(); 
$daron_header_height 			= get_theme_mod('daron_header_height', 400);
$daron_header_background_color 	= get_theme_mod('daron_header_background_color', '#000000');
$daron_theme_layout 			= get_theme_mod('daron_theme_layout', 'wide');

$hex = $daron_header_background_color;
$RGB_color = sscanf($hex, "#%02x%02x%02x");
$Final_Rgb_color = implode(", ", $RGB_color);
?>
<style>
/* genral
==================================== */
 body, h1,  h3, h4, h5, h6, p, div, ul, li, a, select, input, textarea {
	font-family: 'Lato', sans-serif;
} 

@media (max-width: 34em) {
	.site-description {
		display:none;
	}
}

.site-title {
 margin-bottom:0;	
}
.s-header-v2 {
position:absolute;
<?php
if($daron_theme_layout != 'boxed') {
?>
right:0;
left:0;
<?php } ?>
}

.site-title a {
	font-size: 27px;
    margin-bottom: 5px;
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.site-title:hover a {
	color:none;
}

@media (min-width: 62em) {
	.s-header__shrink .s-header-v2__navbar {
		box-shadow: 0 0 0.9375rem 0.25rem rgba(34, 35, 36, 0.05);
		background: #fff;
	}

	.s-header__shrink .s-header-v2__nav > li > a {
		color: #000;
	}
	.s-header__shrink .cd-search-trigger {
		color: #000;
	}

	.s-header-v2__nav > li > a, .cd-search-trigger {
		color: rgba(255, 255, 255, 1);
	}

	.no-padding {
		padding:.0rem 1.875rem
	}
	.daron-header-icon > li > a {
		margin: 0 0.5rem;
	}
	.s-header__shrink .site-description {
		color: #000;
	}
	
}
@media (max-width: 62em) {
	.header-icon {display:none;}
	#search {
		/* hide select element on small devices */
		display: none;
	}
}
.cd-search-trigger::after {
	/* icon lens */
	left: 50%;
	top: 50%;
	bottom: auto;
	right: auto;
	-webkit-transform: translateX(-50%) translateY(-50%);
	-moz-transform: translateX(-50%) translateY(-50%);
	-ms-transform: translateX(-50%) translateY(-50%);
	-o-transform: translateX(-50%) translateY(-50%);
	transform: translateX(-50%) translateY(-50%);
	height: 16px;
	width: 16px;
	background: url(<?php echo esc_url(DARON_THEME_URL) ?>/images/svg/cd-icons.svg) no-repeat -16px 0;
}
@media (max-width: 61.9em)
	.cd-main-search {
		display: none;
	}

/* home customizer
==================================== */
.info-box-icon {
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* menu Style
==================================== */
/* minimal header */
@media (min-width: 62em) {
	.s-header-v2__nav > li > a:hover {
	  color:#FFFFFF;
	}
	.s-header-v2__nav > li > a:focus {
	  color: rgba(255, 255, 255, 0.75);
	}
	.s-header-v2__nav > li > a.-is-active {
	  /*color:#FFFFFF;*/
	}
	.cd-search-trigger:hover {
		color:#FFFFFF;
	}
	.s-header-v2__dropdown-menu {
		border-top: 3px solid <?php echo esc_attr($daron_skin_theme_color); ?>;
	}
	.site-description {
		color:#FFFFFF;
	}
}

/* s-header shrink */
.s-header-v2__dropdown-menu > li > a:hover {
  color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
 .s-header-v2__nav > li > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.s-header-v2__nav > li > a:focus {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
 .s-header-v2__nav > li > a.-is-active {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.s-header-v2__dropdown-menu > li > a.-is-active {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
 .cd-search-trigger:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.daron-search-form-news li a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* primary color 
====================================*/
.g-color--primary { 
	color: <?php echo esc_attr($daron_skin_theme_color); ?>; 
}
.g-color-icon {
	color: #647b85; 
}
.s-btn--primary-bg {
    background: <?php echo esc_attr($daron_skin_theme_color); ?>;
	 border-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.single-link-color:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.menu--alonso .menu__item--current .menu__link {
    color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.menu__line {
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.s-btn--white-bg:focus, .s-btn--white-bg:hover {
	 color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
/* slider 
====================================*/

.s-icon--white-brd:focus, .s-icon--white-brd:hover {
	color: #fff;
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
	border-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.round-button:hover {
	border-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.swiper-pagination-bullet-active {
    opacity: 1;
    background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* back to top 
====================================*/
.s-back-to-top {
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.s-back-to-top:hover:before {
  color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* blog 
====================================*/
.read-more {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.author-color:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.categories-color-blog:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.blog-icon-color { 
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.logged-in-as > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.comment-reply-title > a:hover {
	color:<?php echo esc_attr($daron_skin_theme_color); ?>;
}
.comment-reply-title > small > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.formate-hading-color > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.commentmetadata > a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.metaInfo > span > a{
	color: #000000;
}
.post a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
} 

/* portfolio 
====================================*/
div.cbp-filter-item-active:after, .cbp-filter-item:hover:after {
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
	width: 100%;
} 
 div.cbp-filter-item-active {
   color: <?php echo esc_attr($daron_skin_theme_color); ?>; !important;
}
.s-portfolio__img-effect:after {
	background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
	opacity : 0.7;
}
.s-icon--white-bg:focus, .s-icon--white-bg:hover {
  color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* footer 
====================================*/
.footer-logo a:hover, .footer-bootom a:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.footer-admin {
	color: #fff;
}
.border-bootom-widget{
	color: #6a6a6a;
	border-bottom: 1px inset #6a6a6a;
} 
.title-t {
	color: #8e8d8d;
}
.title-t:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
footer.g-bg-color--dark {
 border-top:3px solid <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* breadcumb 
====================================*/
.js__parallax-window {
	position: relative;
	height:<?php echo esc_attr($daron_header_height); ?>px;
	<?php if($banner) { ?>
	background: rgba(0,0,0,0.38) url('<?php echo esc_url($banner); ?>') 50% 0 no-repeat fixed;
	<?php } else { ?>
	background: linear-gradient(to right,<?php echo esc_attr($daron_header_background_color); ?> 0%, rgb(<?php echo esc_attr($Final_Rgb_color). ',' . '0.48'; ?>) 100%);
	<?php } ?>
	transition: background-color 1s;
}
.js__parallax-window:before {
	position: absolute;
	top: 0; right: 0; bottom: 0; left: 0;
	background-color: inherit;
	content: ' ';
}
.daron-breadcrumb {
	position:relative;
}
.breadcumb-color,
.breadcumb-color:hover {
	color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* widgets
====================================*/
.widget ul li a:hover, .widget ul li a:focus, 
.widget table#wp-calendar tbody a:hover, .widget table#wp-calendar tbody a:focus, 
.footer .widget a, 
.copyright a:hover, .copyright a:focus, 
.site-url a, .site-url a:hover, .site-url a:focus {
    color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
#searchform #searchsubmit, .tagcloud a:hover  {
background-color :<?php echo esc_attr($daron_skin_theme_color); ?>;
}
.sidebar-widget > h1, .sidebar-widget > h2, .sidebar-widget > h3, .sidebar-widget > h4 {
	border-left: 2px solid <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.widget ul li a::before {
	color:<?php echo esc_attr($daron_skin_theme_color); ?>;
}

/* pagination
====================================*/
.daron-pagination .page-numbers.current {
	background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.daron-pagination .page-numbers:hover {
	background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

body.single-post .pager li>a:focus, .pager li>a:hover {
background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
color:#fff;
}


/*WOOCOMMERCE CSS----------------------------------------------------------------------------------------------------*/
/* Woocommerce Colors-------------------------------------------------------------------------------------------- */
.woocommerce .variations td.label, .woocommerce-cart table.cart td.actions .coupon .input-text, .select2-container .select2-choice { color: <?php echo esc_attr($daron_skin_theme_color); ?>; }
.woocommerce div.product span.price, .woocommerce .posted_in a, .woocommerce-product-rating a, .woocommerce .tagged_as a, .woocommerce div.product form.cart .variations td.label label, .woocommerce #reviews #comments ol.commentlist li .meta strong, .owl-item .item .cart .add_to_cart_button, .woocommerce ul.cart_list li a, .woocommerce-error, .woocommerce-info, .woocommerce-message { color: <?php echo esc_attr($daron_skin_theme_color); ?>; }
.woocommerce ul.products li.product .button { color: #fff; }
.woocommerce ul.product_list_widget li a:hover, .woocommerce ul.product_list_widget li a:focus, 
.woocommerce .posted_in a:hover, .woocommerce .posted_in a:focus { color: <?php echo esc_attr($daron_skin_theme_color); ?>; }
.woocommerce ul.products li.product:hover .button, 
.woocommerce ul.products li.product:focus .button, 
.woocommerce div.product form.cart .button:hover, 
.woocommerce div.product form.cart .button:focus, 
.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover,
 .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled], .woocommerce-EditAccountForm input.woocommerce-Button, .owl-item .item .cart .add_to_cart_button:hover, #add_payment_method table.cart img, .woocommerce-checkout table.cart img { border: 4px double #eee; }
.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, .woocommerce a.added_to_cart, .woocommerce table.my_account_orders .order-actions .button { color: #fff; }
.woocommerce ul.products li.product .button,  
 .owl-item .item .cart .add_to_cart_button { background: <?php echo esc_attr($daron_skin_theme_color); ?>; }
.woocommerce ul.products li.product .button, .woocommerce ul.products li.product .button:hover, .owl-item .item .cart .add_to_cart_button { border: 1px solid <?php echo esc_attr($daron_skin_theme_color); ?>; }
.woocommerce ul.products li.product, 
.woocommerce-page ul.products li.product { background-color: #ffffff; }
.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .sidebar a.button { background-color: <?php echo esc_attr($daron_skin_theme_color); ?>; }
.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover {
    background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
    color: #fff;
}
.woocommerce ul.products li.product:before, .woocommerce ul.products li.product:after, .woocommerce-page ul.products li.product:before, .woocommerce-page ul.products li.product:after {
    content: "";
    position: absolute;
    z-index: -1;
    top: 50%;
    bottom: 0;
    left: 10px;
    right: 10px;
    -moz-border-radius: 100px / 10px;
    border-radius: 100px / 10px;
}
.woocommerce ul.products li.product:before, .woocommerce ul.products li.product:after, .woocommerce-page ul.products li.product:before, .woocommerce-page ul.products li.product:after {
    -webkit-box-shadow: 0 0 15px rgba(0,0,0,0.8);
    -moz-box-shadow: 0 0 15px rgba(0,0,0,0.8);
    box-shadow: 0 0 15px rgba(0,0,0,0.8);
}
.woocommerce a.remove, .woocommerce .woocommerce-Button, .woocommerce .cart input.button, .woocommerce input.button.alt, .woocommerce button.button, .woocommerce #respond input#submit, .woocommerce .cart input.button:hover, 
.woocommerce .cart input.button:focus, 
.woocommerce input.button.alt:hover, 
.woocommerce input.button.alt:focus, 
.woocommerce input.button:hover, 
.woocommerce input.button:focus, 
.woocommerce button.button:hover, 
.woocommerce button.button:focus, 
.woocommerce #respond input#submit:hover, 
.woocommerce #respond input#submit:focus, 
.woocommerce ul.products li.product:hover .button, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce .return-to-shop a.button  { color: #ffffff !important; }
.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, .woocommerce a.button, .woocommerce .woocommerce-Button, .woocommerce .cart input.button, .woocommerce input.button.alt, .woocommerce button.button, .woocommerce #respond input#submit, .woocommerce .cart input.button:hover, .woocommerce .cart input.button:focus, 
.woocommerce input.button.alt:hover, .woocommerce input.button.alt:focus, 
.woocommerce input.button:hover, .woocommerce input.button:focus, 
.woocommerce button.button:hover, .woocommerce button.button:focus, 
.woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button { background: <?php echo esc_attr($daron_skin_theme_color); ?>; border: 1px solid transparent !important; }
.woocommerce-product-search button[type="submit"] {
    background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
    border: 2px solid <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.widget.woocommerce.widget_product_search .woocommerce-product-search button[type="submit"]:hover {
    background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.woocommerce-message, .woocommerce-info {
    border-top-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}
.woocommerce-message::before, .woocommerce-info::before { color: <?php echo esc_attr($daron_skin_theme_color); ?>; }
.woocommerce div.product div.summary {
    margin-bottom: 2em;
    padding: 0;
    background-color: #fff;
}

.woocommerce ul.products li.product .onsale, .woocommerce span.onsale {
	border: none;
	color:#fff
}

.products .onsale {
	background-color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

.price_label { color: #727272; }
.woocommerce a.added_to_cart { background: #21202e; border: 1px solid #ffffff; }
.woocommerce a.button { border-radius: 0px; box-shadow: none; }
.woocommerce #reviews #comments ol.commentlist li .comment-text { border: 1px solid #e4e1e3; }
.woocommerce #reviews #comments ol.commentlist li .meta time { color: #8f969c; }
.woocommerce #review_form #respond textarea, .woocommerce-cart table.cart td.actions .coupon .input-text { border: 1px solid #eee; }
.woocommerce-error, .woocommerce-info, .woocommerce-message { background-color: #fbfbfb; box-shadow: 0 7px 3px -5px #e0e0e0; }
.woocommerce table.shop_table, .woocommerce table.shop_table td { border: 1px solid rgba(0, 0, 0, .1); }
.woocommerce table.shop_table th { background-color: #fbfbfb; }
#add_payment_method table.cart img, .woocommerce-checkout table.cart img { border: 4px double #eee; }
.woocommerce a.remove { background: #555555; }
.woocommerce .checkout_coupon input.button, 
.woocommerce .woocommerce-MyAccount-content input.button, .woocommerce .login input.button { background-color: <?php echo esc_attr($daron_skin_theme_color); ?>; color: #ffffff; border: 1px solid transparent; }
.woocommerce-page #payment #place_order { border: 1px solid transparent; }
.select2-container .select2-choice, .select2-drop-active, .woocommerce .woocommerce-ordering select, .woocommerce .widget select { 
    border: 1px solid #eee;
}
.woocommerce-checkout #payment ul.payment_methods { background-color: #fbfbfb; border: 1px solid rgba(0, 0, 0, .1); }
#add_payment_method #payment div.payment_box, .woocommerce-cart #payment div.payment_box, .woocommerce-checkout #payment div.payment_box { background-color: #ebe9eb; }
#add_payment_method #payment div.payment_box:before, 
.woocommerce-cart #payment div.payment_box:before, 
.woocommerce-checkout #payment div.payment_box:before { 
    border: 1em solid #ebe9eb;
    border-right-color: transparent;
    border-left-color: transparent;
    border-top-color: transparent;
}   
.woocommerce nav.woocommerce-pagination ul li a, 
.woocommerce nav.woocommerce-pagination ul li span { background-color: #f5f6f9;
    border: 1px solid #e9e9e9; color: #2a2e34; }
.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current { background-color: <?php echo esc_attr($daron_skin_theme_color); ?>; border: 1px solid <?php echo esc_attr($daron_skin_theme_color); ?>; color: #ffffff; }
.woocommerce-MyAccount-navigation ul li { border-bottom: 1px solid #ebe9eb; }
.woocommerce-EditAccountForm input.woocommerce-Button { border: 1px solid #ffffff; }
.ui-slider .ui-slider-handle {
    border: 1px solid rgba(0, 0, 0, 0.25);
    background: #e7e7e7;
    background: -webkit-gradient(linear,left top,left bottom,from(#FEFEFE),to(#e7e7e7));
    background: -webkit-linear-gradient(#FEFEFE,#e7e7e7);
    background: -moz-linear-gradient(center top,#FEFEFE 0%,#e7e7e7 100%);
    background: -moz-gradient(center top,#FEFEFE 0%,#e7e7e7 100%);
    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.65) inset;
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.65) inset;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.65) inset;
}
.price_slider_wrapper .ui-widget-content {
    background: #1e1e1e;
    background: -webkit-gradient(linear,left top,left bottom,from(#1e1e1e),to(#6a6a6a));
    background: -webkit-linear-gradient(#1e1e1e,#6a6a6a);
    background: -moz-linear-gradient(center top,#1e1e1e 0%,#6a6a6a 100%);
    background: -moz-gradient(center top,#1e1e1e 0%,#6a6a6a 100%);
}
.sidebar-widget .widget-title { border-bottom: 2px solid #eeeeee; }
.sidebar-widget .woocommerce ul.cart_list li { border-bottom: 1px dotted #d1d1d1; }
.woocommerce div.product .woocommerce-tabs .panel { background: #fff; border: 1px solid #eee; }
.woocommerce .widget_price_filter .ui-slider .ui-slider-range { background-color: <?php echo esc_attr($daron_skin_theme_color); ?>; }
.add-to-cart a.added_to_cart, 
.add-to-cart a.added_to_cart:hover, 
.add-to-cart a.added_to_cart:focus { 
	background: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/*===================================================================================*/
/*	WOOCOMMERCE PRODUCT CAROUSEL
/*===================================================================================*/

.product_container { background-color: #ffffff; border: 1px solid #eee; }
.wpcs_product_carousel_slider .owl-item .item h4.product_name, .wpcs_product_carousel_slider .owl-item .item h4.product_name a, 
.wpcs_product_carousel_slider .owl-item .item .cart .add_to_cart_button { color: #0f0f16 !important; }
.wpcs_product_carousel_slider .owl-item .item .cart:hover .add_to_cart_button,
.testimonial-section .wpcs_product_carousel_slider .title, .top-header-detail .wpcs_product_carousel_slider .title { color: #ffffff !important; }
.woocommerce.rating span {
    color: <?php echo esc_attr($daron_skin_theme_color); ?>;
}

/*Woocommerce Section----------------------------------------------------------------------------------------*/
.woocommerce-section {  background-color: <?php echo esc_attr($daron_skin_theme_color); ?>; }
.rating li i { color: <?php echo esc_attr($daron_skin_theme_color); ?>; }

#wooproduct-slider .owl-prev:hover,
#wooproduct-slider .owl-next:hover {
	background-color: <?php echo esc_attr($daron_skin_theme_color); ?>; 
	color: #fff;
}
.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item a:hover, 
.woocommerce .woocommerce-widget-layered-nav-list .woocommerce-widget-layered-nav-list__item a:hover { 
	color: <?php echo esc_attr($daron_skin_theme_color); ?>; 
}
.cart-header > a .cart-total {
	background-color: <?php echo esc_attr($daron_skin_theme_color); ?>; 
}
</style>