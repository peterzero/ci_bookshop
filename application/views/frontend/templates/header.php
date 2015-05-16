<header class="header">

		<nav class="navbar navbar-bookshop navbar-static-top" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-5 hidden-xs hidden-sm">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url(); ?>">Online Store</a></li>
                    <li><a href="<?php echo base_url(); ?>home/about">About Us</a></li>
                    <li><a href="index.php?page=about">Delivery</a></li>
                    <li><a href="index.php?page=contact">FAQs</a></li>
                    <li><a href="<?php echo base_url(); ?>home/contact">Contacts</a></li>
                </ul><!-- /.nav -->
            </div><!-- /.col -->
            <div class="col-md-3 col-xs-10 col-sm-10 navbar-left">

                <p class='text-center'><a href="index.php#"><span class="icon glyphicon glyphicon-earphone"></span> +1-234-567-8910</a></p>

            </div><!-- /.col -->
            <div class="col-md-4 col-sm-2">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden-xs hidden-sm"><a href="index.php?page=contact">Wishlist</a></li>
                    <li class="hidden-xs hidden-sm"><a href="index.php?page=single-book">Shopping Cart</a></li>
                    <?php if($this->session->userdata('is_logged_in')){

                        ?>
                    <li class="hidden-xs hidden-sm"><a href="<?= site_url("user/profile") ?>">My Account</a></li>
                    <li class="hidden-xs hidden-sm"><a href="<?= site_url("user/logout") ?>">Logout</a></li>
                    <?php }else{ ?>
                    <li class="icon icon-small hidden-xs"><a data-toggle="modal" data-target="#modal-login-big" href="index.php#"><i class="icon fa fa-lock"></i></a></li>
                    <li class="icon hidden-lg hidden-sm hidden-md"><a data-toggle="modal" data-target="#modal-login-small" href="index.php#"><i class="icon fa fa-lock"></i></a></li>
                    <?php } ?>
                </ul><!-- /.nav -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->


<!-- Modal -->
<div id="modal-login-big" class="modal login fade hidden-xs"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <ul class="login-list clearfix ">
                        <li class='active'>Login</li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('home/register') ?>">Sign Up</a></li>
                    </ul><!-- /.login-list -->
                    <form action="<?= site_url('user/login');?>" method="POST" role="form" class="inner-top-50">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email address</label>
                            <input type="email" name="email" class="form-control bookshop-form-control" id="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" class="form-control bookshop-form-control" id="password">
                        </div>

                        <button type="submit" name="submit_login" class="btn btn-primary btn-uppercase">Login</button>
                        <a href="index.php#" class='forgot-password'>forgot password</a>
                    </form>
                </div>
            </div><!-- /.modal-body -->
            <div class="modal-footer">
                <div class="text-center">
                    <ul class='social-list text-center'>
                        <li><a href="index.php#" class="facebook"></a></li>
                        <li><a href="index.php#" class="google-plus"></a></li>
                        <li><a href="index.php#" class="twitter"></a></li>
                        <li><a href="index.php#" class="pinterest"></a></li>
                    </ul><!-- /.social-list -->
                </div>
            </div><!-- /.modal-footer -->
            <a href="index.php#" data-dismiss="modal" class="remove-icon"><i class="fa fa-times"></i></a>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div id="modal-login-small" class="modal fade login login-xs hidden-sm hidden-lg"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div class="logo-holder">
                        <h1 class="logo">BookShop</h1>
                        <div class="logo-subtitle">
                            <span>World of books</span>
                        </div><!-- /.logo-subtitle -->
                    </div>

                    <form role="form" class="inner-top-50">
                        <div class="form-group">
                            <label for="entername" class="sr-only">Email</label>
                            <input type="email" class="form-control bookshop-form-control" id="entername" placeholder="Hezy Theme">
                        </div>
                        <div class="form-group">
                            <label for="enterpassword" class="sr-only">Password</label>
                            <input type="password" class="form-control bookshop-form-control" id="enterpassword">
                        </div>

                        <button type="button" class="btn btn-primary btn-block btn-uppercase">Login</button>
                        <a href="index.php#" class='forgot-password'>forgot password</a>
                    </form>
                </div>
            </div><!-- /.modal-body -->
            <div class="modal-footer">
                <div class="text-center">
                    <ul class='social-list text-center'>
                        <li><a href="index.php#" class="facebook"></a></li>
                        <li><a href="index.php#" class="google-plus"></a></li>
                        <li><a href="index.php#" class="twitter"></a></li>
                        <li><a href="index.php#" class="pinterest"></a></li>
                    </ul><!-- /.social-list -->
                </div>
            </div><!-- /.modal-footer -->
            <a href="index.php#" data-dismiss="modal" class="remove-icon"><i class="fa fa-times"></i></a>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
		<div class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-4 top-search-holder m-t-10">
						<!-- ============================================== SEARCH BAR ============================================== -->
                    <form class="search-form" role="search">
                        <div class="form-group" style="position: relative;">
                            <label class="sr-only" for="page-search">Type your search here</label>
                            <input id="page-search" class="search-input form-control" type="search" placeholder="Search product">

                                <div id="result"></div>

                        </div>
                        <button class="page-search-button">
                            <span class="fa fa-search">
                                <span class="sr-only">Search</span>
                            </span>
                        </button>
                    </form>

<!-- ============================================== SEARCH BAR : END ============================================== -->					</div><!-- /.top-search-holder -->

					<div class="col-xs-12 col-sm-4 col-md-4 text-center logo-holder">
						<!-- ============================================== LOGO ============================================== -->
<a href="index.php?page=home">
	<h1 class="logo">BookShop</h1>
	<div class="logo-subtitle">
		<span>World of books</span>
	</div><!-- /.logo-subtitle -->
</a>
<!-- ============================================== LOGO : END ============================================== -->					</div><!-- /.logo-holder -->

					<div class="col-xs-12  col-md-2 header-shippment hidden-sm m-t-10">
						<!-- ============================================== FREE DELIVERY ============================================== -->
<div class="media free-delivery hidden-xs ">
	<span class="media-left"><img src="<?php echo base_url(); ?>assets/home/images/delivery-icon.png" height="48" width="48" alt=""></span>
	<div class="media-body">
		<h5 class="media-heading">Free delivery</h5>
	</div>
</div>
<!-- ============================================== FREE DELIVERY : END ============================================== -->					</div><!-- /.header-shippment -->

					<div class="col-xs-12 col-sm-4 col-md-2 animate-dropdown1 top-cart-row m-t-10">
						<!-- ============================================== SHOPPING CART DROPDOWN ============================================== -->
<ul class="clearfix shopping-cart-block list-unstyled">
    <li class="dropdown">
        <a class="view_cart menu-toggle-right clearfix" href="javascript:void(0);">
            <span class="pull-right cart-right-block">
                <img src="<?php echo base_url(); ?>assets/home/images/cart-icon.png" alt="" width="46" height="39" />
            </span><!-- /.cart-right-block -->
            <span class="pull-right cart-left-block">
                <span class="cart-block-heading total_price"><?=number_format($this->cart->total()); ?></span>
                <span class="hidden-xs"><b id="total_items"><?=count($this->cart->contents()); ?></b><i> items</i></span>
            </span><!-- /.cart-left-block -->
        </a>
    </li>
</ul> <!-- /.list-unstyled -->
<!-- ============================================== SHOPPING CART DROPDOWN : END ============================================== -->					</div><!-- /.top-cart-row -->
				</div><!-- /.row -->

			</div><!-- /.container -->

		</div><!-- /.main-header -->




<!-- ============================================== NAVBAR ============================================== -->
<div class="header-nav animate-dropdown">
		<div class="container">
			<div class="nav-bg-class">
				<!-- ============================================================= NAVBAR PRIMARY ============================================================= -->
<nav class="yamm navbar navbar-primary animate-dropdown" role="navigation">
    <div class="navbar-header">
        <button id="btn-navbar-primary-collapse" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse" id="navbar-primary-collapse">
    <?php echo $navmenu; ?>
        <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?page=home">Books</a></li>
            <li class="dropdown yamm-fw"><a href="index.php#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Textbooks</a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="yamm-content">
                            <div class="row">
                                <div class="col-md-2 col-sm-6">
                                    <div class="section">
                                        <h5 class="title">History</h5>
                                        <ul class="links list-unstyled">
                                            <li><a href="index.php?page=books">Indian Independence</a></li>
                                            <li><a href="index.php?page=books">French Revolution</a></li>
                                            <li><a href="index.php?page=books">Industrial Revolution</a></li>
                                            <li><a href="index.php?page=books">Vietnam War</a></li>
                                            <li><a href="index.php?page=books">World War I &amp; II</a></li>
                                            <li><a href="index.php?page=books">Operation Desert Storm</a></li>
                                        </ul>
                                    </div>/.section
                                </div>/.col

                                <div class="col-md-2 col-sm-6">
                                    <div class="section">
                                        <h5 class="title">Science</h5>
                                        <ul class="links list-unstyled">
                                            <li><a href="index.php?page=books">Applied Science</a></li>
                                            <li><a href="index.php?page=books">Astronomy</a></li>
                                            <li><a href="index.php?page=books">Biotechnology</a></li>
                                            <li><a href="index.php?page=books">Chemistry</a></li>
                                            <li><a href="index.php?page=books">Cognitive Science</a></li>
                                            <li><a href="index.php?page=books">Cosmology</a></li>
                                        </ul>
                                    </div>/.section
                                </div>/.col

                                <div class="col-md-2 col-sm-6">
                                    <div class="section">
                                        <h5 class="title">History</h5>
                                        <ul class="links list-unstyled">
                                            <li><a href="index.php?page=books">Indian Independence</a></li>
                                            <li><a href="index.php?page=books">French Revolution</a></li>
                                            <li><a href="index.php?page=books">Industrial Revolution</a></li>
                                            <li><a href="index.php?page=books">Vietnam War</a></li>
                                            <li><a href="index.php?page=books">World War I &amp; II</a></li>
                                            <li><a href="index.php?page=books">Operation Desert Storm</a></li>
                                        </ul>
                                    </div>/.section
                                </div>/.col

                                <div class="col-md-2 col-sm-6">
                                    <div class="section">
                                        <h5 class="title">Science</h5>
                                        <ul class="links list-unstyled">
                                            <li><a href="index.php?page=books">Applied Science</a></li>
                                            <li><a href="index.php?page=books">Astronomy</a></li>
                                            <li><a href="index.php?page=books">Biotechnology</a></li>
                                            <li><a href="index.php?page=books">Chemistry</a></li>
                                            <li><a href="index.php?page=books">Cognitive Science</a></li>
                                            <li><a href="index.php?page=books">Cosmology</a></li>
                                        </ul>
                                    </div>/.section
                                </div>/.col

                                <div class="col-md-2 col-sm-6">
                                    <div class="section">
                                        <h5 class="title">History</h5>
                                        <ul class="links list-unstyled">
                                            <li><a href="index.php?page=books">Indian Independence</a></li>
                                            <li><a href="index.php?page=books">French Revolution</a></li>
                                            <li><a href="index.php?page=books">Industrial Revolution</a></li>
                                            <li><a href="index.php?page=books">Vietnam War</a></li>
                                            <li><a href="index.php?page=books">World War I &amp; II</a></li>
                                            <li><a href="index.php?page=books">Operation Desert Storm</a></li>
                                        </ul>
                                    </div>/.section
                                </div>/.col

                                <div class="col-md-2 col-sm-6">
                                    <div class="section">
                                        <h5 class="title">Science</h5>
                                        <ul class="links list-unstyled">
                                            <li><a href="index.php?page=books">Applied Science</a></li>
                                            <li><a href="index.php?page=books">Astronomy</a></li>
                                            <li><a href="index.php?page=books">Biotechnology</a></li>
                                            <li><a href="index.php?page=books">Chemistry</a></li>
                                            <li><a href="index.php?page=books">Cognitive Science</a></li>
                                            <li><a href="index.php?page=books">Cosmology</a></li>
                                        </ul>
                                    </div>/.section
                                </div>/.col
                            </div>
                        </div>

                    </li>
                </ul>
            </li>
             <li><a href="index.php?page=books">Nook Books</a></li>
             <li class="hidden-sm"><a href="index.php?page=books">Audiobooks</a></li>
             <li class="hidden-sm hidden-md"><a href="index.php?page=books">Magazines</a></li>
             <li class="hidden-sm hidden-md"><a href="index.php?page=books">Movies</a></li>
             <li><a href="index.php?page=books">Music</a></li>
             <li class="dropdown navbar-right"><a href="index.php#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                <ul class="dropdown-menu">
                    <li>
                        <div class="yamm-content">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <ul class="links">
                                        <li><a href="index.php?page=home">Home</a></li>
                                        <li><a href="index.php?page=home-2">Home II</a></li>
                                        <li><a href="index.php?page=books">Books</a></li>
                                        <li><a href="index.php?page=books-2">Books II</a></li>
                                        <li><a href="index.php?page=single-book">Book</a></li>
                                        <li><a href="index.php?page=blog">Blog</a></li>
                                        <li><a href="index.php?page=blog-post">Blog Post</a></li>
                                    </ul>
                                </div>
                            <div class="col-md-6 col-sm-6">
                                <ul class="links">
                                    <li><a href="index.php?page=about">About</a></li>
                                    <li><a href="index.php?page=contact">Contact</a></li>
                                    <li><a href="index.php?page=contact-2">Contact II</a></li>
                                    <li><a href="index.php?page=categories">Categories</a></li>
                                    <li><a href="index.php?page=magazine">Magazine</a></li>
                                    <li><a href="index.php?page=all-brands">All Brands</a></li>
                                    <li><a href="index.php?page=error">Error</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>


                </ul>
             </li>
        </ul> --><!-- /.nav -->
    </div><!-- /.collapse navbar-collapse -->
</nav><!-- /.yamm -->
<!-- ============================================================= NAVBAR PRIMARY : END ============================================================= -->			</div><!-- /.nav-bg-class -->
		</div><!-- /.container -->

</div><!-- /.header-nav -->
<!-- ============================================== NAVBAR : END ============================================== -->
	</header>