<?php
$options = acuasafe_WSH()->option(); 
$allowed_html = wp_kses_allowed_html( 'post' );

//Logo Settings
$image_logo = $options->get( 'image_normal_logo' );
$logo_dimension = $options->get( 'normal_logo_dimension' );

$image_logo2 = $options->get( 'image_normal_logo2' );
$logo_dimension2 = $options->get( 'normal_logo_dimension2' );

$image_logo3 = $options->get( 'image_normal_logo3' );
$logo_dimension3 = $options->get( 'normal_logo_dimension3' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

        <!-- main header -->
        <header class="main-header header-style-two">
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo"><?php echo acuasafe_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?></figure>
                    </div>
                    <div class="menu-area clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbarSupportedContent',
									'container_class'=>'collapse navbar-collapse sub-menu-bar',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false, 
									'add_li_class'  => 'nav-item',
									'items_wrap' => '%3$s', 
									'container'=>false,
									'depth'=>'3',
									'walker'=> new Bootstrap_walker()  
									) ); ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <ul class="nav-right">
                        <li class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                                <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                                    <div class="form-container">
                                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                            <div class="form-group">
                                                <input type="search" name="s" value="" placeholder="<?php echo wp_kses( $options->get( 'search_text_v2'), $allowed_html ); ?>" required="">
                                                <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
<li class="cart-box">
				
					<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
					$count = WC()->cart->cart_contents_count;
					?>
				
					<a href="<?php echo WC()->cart->get_cart_url(); ?>">
					
					<i class="fal fa-shopping-cart"></i>
					
					<?php 
					if ( $count > 0 ) {
						?>
					
					<span><?php echo esc_html( $count ); ?></span>
					
					<?php
						}
							?>
					
					</a>
					
					<?php } ?>
					
				</li>
                        <li class="btn-box">
                            <a href="<?php echo wp_kses( $options->get( 'quote_link_v2'), $allowed_html ); ?>" class="theme-btn btn-one"><?php echo wp_kses( $options->get( 'quote_v2'), $allowed_html ); ?></a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-box">
                    <div class="logo-box">
                        <figure class="logo"><?php echo acuasafe_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?></figure>
                    </div>
                    <div class="menu-area clearfix">
                        <nav class="main-menu clearfix">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                    <ul class="nav-right">
                        <li class="search-box-outer">
                            <div class="dropdown">
                                <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                                <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">
                                    <div class="form-container">
                                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<div class="form-group">
										<input type="search" name="s" value="" placeholder="<?php echo wp_kses( $options->get( 'search_text_v2'), $allowed_html ); ?>" required="">
										<button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
									</div>
								</form>
                                    </div>
                                </div>
                            </div>
                        </li>
<li class="cart-box">
				
					<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
					$count = WC()->cart->cart_contents_count;
					?>
				
					<a href="<?php echo WC()->cart->get_cart_url(); ?>">
					
					<i class="fal fa-shopping-cart"></i>
					
					<?php 
					if ( $count > 0 ) {
						?>
					
					<span><?php echo esc_html( $count ); ?></span>
					
					<?php
						}
							?>
					
					</a>
					
					<?php } ?>
					
				</li>
                        <li class="btn-box">
                            <a href="<?php echo wp_kses( $options->get( 'quote_link_v2'), $allowed_html ); ?>" class="theme-btn btn-one"><?php echo wp_kses( $options->get( 'quote_v2'), $allowed_html ); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- main-header end -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><?php echo acuasafe_logo( $logo_type, $image_logo2, $logo_dimension2, $logo_text, $logo_typography ); ?></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
			<h4><?php echo wp_kses( $options->get( 'address_title_v1'), $allowed_html ); ?></h4>
			<ul>
				<li><?php echo wp_kses( $options->get( 'address_v1'), $allowed_html ); ?></li>
				<li><a href="tel:<?php echo wp_kses( $options->get( 'phone_link_v1'), $allowed_html ); ?>"><?php echo wp_kses( $options->get( 'phone_v1'), $allowed_html ); ?></a></li>
				<li><a href="<?php echo wp_kses( $options->get( 'email_link_v1'), $allowed_html ); ?>"><?php echo wp_kses( $options->get( 'email_v1'), $allowed_html ); ?></a></li>
			</ul>
		</div>
		<div class="social-links">
		  <?php echo wp_kses( $options->get( 'social_profile'), $allowed_html ); ?>
		</div>
            </nav>
        </div><!-- End Mobile Menu -->