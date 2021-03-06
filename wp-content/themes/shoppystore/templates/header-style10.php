<?php 
	$ya_colorset = ya_options()->getCpanelValue('scheme');
	$ya_phone = ya_options() ->getCpanelValue('phone');
	$email = ya_options() ->getCpanelValue('email');
	$ya_search = ya_options()->getCpanelValue('search');
	$meta_img_ID = get_post_meta( get_the_ID(), 'page_logo', true );
	$meta_img 	 = ( $meta_img_ID != '' ) ? wp_get_attachment_image_url( $meta_img_ID, 'full' ) : '';
	$meta_img_ID = get_post_meta( get_the_ID(), 'page_logo', true );
	$logo_select = ya_options()->getCpanelValue( 'sitelogo' );
	$main_logo	 = ( $meta_img != '' )? $meta_img : $logo_select;
	$ya_menu_item 	= ( ya_options()->getCpanelValue( 'menu_number_item' ) ) ? ya_options()->getCpanelValue( 'menu_number_item' ) : 12;
	$ya_more_text 	= ( ya_options()->getCpanelValue( 'menu_more_text' ) )	 ? ya_options()->getCpanelValue( 'menu_more_text' )		: esc_html__( 'See More', 'shoppystore' );
	$ya_less_text 	= ( ya_options()->getCpanelValue( 'menu_less_text' ) )	 ? ya_options()->getCpanelValue( 'menu_less_text' )		: esc_html__( 'See Less', 'shoppystore' );
	$ya_menu_text 	= ( ya_options()->getCpanelValue( 'menu_title_text' ) )	 ? ya_options()->getCpanelValue( 'menu_title_text' )		: esc_html__( 'Categories', 'shoppystore' );
?>
	<!-- BEGIN: Header -->
	<div id="yt_header" class="yt-header wrap">
		<div class="header-style10">
			<div class="yt-header-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 sl-header-text">
							<div class="offer-wrapper">
								<div class="offer-header">
									<ul id="offer-info">
										<li>
											<?php if($ya_phone != '') {?>
											<i class="sp-ic fa fa-phone">&nbsp;</i><?php esc_html_e('Telephone:','shoppystore') ;?> <a title="<?php echo esc_attr( $ya_phone ) ?>" href="#"><?php echo esc_html( $ya_phone ) ?></a> 
											<?php } ?>
										</li>
										<li>
											<?php if($email != '') {?>
											<i class="sp-ic fa fa-envelope">&nbsp;</i><?php esc_html_e('E-mail:','shoppystore') ;?> <a title="<?php echo esc_attr( $email ) ?>" href="mailto:<?php echo esc_attr( $email ) ?>"><?php echo esc_attr( $email ) ?></a>
											<?php } ?>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- LANGUAGE_CURENCY -->
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 top-links-action">
							<?php if (is_active_sidebar_YA('top2')) {?>
									<?php dynamic_sidebar('top2'); ?>
							<?php }?>
								<?php 
							if( function_exists( 'YITH_WCWL' ) ){
							    $wishlist_url = YITH_WCWL()->get_wishlist_url(); 
							}
						?>
							<div class="my-account block-action-header pull-right">
							    <ul>
							        <li>
							            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('My Account', 'shoppystore'); ?></a>
							        	<ul>
							        	<li><?php get_template_part('widgets/ya_top/login'); ?></li>
										   <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_html_e('My Account','shoppystore'); ?>"><?php esc_html_e('My Account','shoppystore'); ?></a></li>
										   <li><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>" title="<?php esc_attr_e( 'Cart', 'shoppystore' ) ?>"><?php esc_html_e('My Cart', 'shoppystore'); ?></a></li>
										   <li><a href="<?php echo get_permalink(get_option('woocommerce_checkout_page_id')); ?>" title="<?php esc_attr_e( 'Check Out', 'shoppystore' ) ?>"><?php esc_html_e('Checkout', 'shoppystore'); ?></a></li>
								        </ul>
							        </li>
							        
							    </ul>
							</div>
							<div class="my-wishlist pull-right">
								<a href="<?php echo $wishlist_url ?>" title="<?php esc_html_e('My Wishlist','shoppystore'); ?>"><?php esc_html_e('My Wishlist', 'shoppystore'); ?></a>
							</div>
						</div>
						<?php if( class_exists( 'WooCommerce' ) ){ ?>
							 <div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog block-popup-login">
											<a href="javascript:void(0)" title="Close" class="close close-login" data-dismiss="modal"><?php esc_html_e('Close','shoppystore') ?></a>
											<div class="tt_popup_login"><strong><?php esc_html_e('Sign in Or Register', 'shoppystore'); ?></strong></div>
											<?php get_template_part('woocommerce/myaccount/login-form'); ?>
										</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="yt-header-middle">
				<div class="container">
						<div class="logo-wrapper pull-left">
							<a  href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php if( $main_logo != '' ) { ?>
								   	<img src="<?php echo esc_url( $main_logo ); ?>" alt="<?php bloginfo('name'); ?>" width="140" height="57"/>
								<?php }else{
									if ($ya_colorset){$logo = get_template_directory_uri().'/assets/img/logo-index10.png';}
									else $logo = get_template_directory_uri().'/assets/img/logo-default.png';
								?>
									<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php bloginfo('name'); ?>"  width="140" height="57"/>
								<?php } ?>
							</a>
						</div>
						
						<div class="yt-megamenu pull-left">
							<div class="yt-header-under">
							<?php if ( has_nav_menu('primary_menu') ) {?>
							<nav id="primary-menu" class="primary-menu">
								<div class="yt-menu">
									<div class="navbar-inner navbar-inverse">
										<?php
											$menu_class = 'nav nav-pills';
											if ( 'mega' == ya_options()->getCpanelValue('menu_type') ){
												$menu_class .= ' nav-mega';
											} else $menu_class .= ' nav-css';
										?>
										<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $menu_class)); ?>
									</div>
								</div>
							</nav>
								<?php } ?>
								<?php if ( class_exists( 'WooCommerce' ) && !ya_options()->getCpanelValue( 'disable_cart' ) ) { ?>
									<div class="mini-cart-header">
									<?php get_template_part( 'woocommerce/minicart-ajax' ); ?>
									</div>
								<?php } ?>
							</div>	
						</div>
				</div>
			</div>
			<div class="yt-header-under-2">
				<div class="container">
					<div class="row yt-header-under-wrap">
						<div class="yt-main-menu col-md-12">
							<div class="header-under-2-wrapper">
								
								<div class="yt-searchbox-vermenu">
									
										<div class="vertical-mega">
											<div class="ver-megamenu-header">
												<div class="mega-left-title">
													 <strong><?php echo esc_html( $ya_menu_text ) ?></strong>
												</div>
												<?php
												if ( has_nav_menu( 'leftmenu' ) ) { ?>
												<div class="wrapper_vertical_menu vertical_megamenu" data-number="<?php echo esc_attr( $ya_menu_item ); ?>" data-moretext="<?php echo esc_attr( $ya_more_text ); ?>" data-lesstext="<?php echo esc_attr( $ya_less_text ); ?>">
													<?php  wp_nav_menu( array( 'theme_location' => 'leftmenu','menu_class' => 'vertical-megamenu' ) ); ?>
												</div>
													
											<?php } ?> 
											</div>
										</div>
									
										<div class="search-pro">
											<a class="phone-icon-search  fa fa-search" href="#" title="Search"></a>
												<div id="sm_serachbox_pro" class="sm-serachbox-pro">
													<?php if( $ya_search ) {
													     if (is_active_sidebar_YA('search')) { ?>
													        <?php dynamic_sidebar('search');
                                                         }else { ?>
													<div class="sm-searbox-content">
														 <?php get_template_part( 'widgets/ya_top/searchcate' ); ?>
													</div>
													<?php } } ?>
												</div>
										</div>
							
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="main" class="theme-clearfix" role="document">
	<?php

		if (function_exists('ya_breadcrumb')){
			ya_breadcrumb('<div class="breadcrumbs theme-clearfix"><div class="container">', '</div></div>');
		} 

	?>