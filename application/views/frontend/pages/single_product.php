<div class="content wow fadeInUp">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb text-center">
				<li><a href="index.php?page=home">Home</a></li>
				<li><a href="index.php?page=books">Books</a></li>
				<li class="active">Art,Architecture & Photography</li>
			</ul>

			<div class="divider">
			      <img class="img-responsive" src="<?php echo base_url(); ?>assets/home/images/shadow.png" alt="">
			</div><!-- /.divider -->
		</div>
		<div class="row inner-top-xs single-book-block">
			<div class="col-md-9 col-md-push-3">
				<!-- .primary block -->
				<?php
				$image = $product['image'] ? base_url().'upload/book-covers/'.$product['image'] : "" ;
				?>
				<div class="single-book primary-block">
	<div class="row">
		<div class="col-md-5 col-sm-5">
			<div class="book-cover">
				<img width="268" height="408" alt="" src="<?php echo base_url(); ?>assets/home/images/blank.gif" data-echo="<?=$image?>">
			</div><!-- /.book-cover -->
			<div class="share-button">

				<!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_native_toolbox inner-top-vs"></div>
			</div>
			<div class="list-unstyled link-block inner-top-50">
				<a href="#customer-reviews" class='customer-review'><i class="icon fa fa-comment"></i><span class="customer-review">Customer Reviews(<?php echo $count_comment ?>) &darr; </span></a>
			</div>
		</div>
		<div class="col-md-7 col-sm-7">
			<div class="featured-book-heading">
				<h1 class="title"><?=$product['name']?></h1>
				<p class="singl-book-author">
					by
					<a href="#"><?=$product['author']?></a>
				</p>
			</div>

			<div class="row">
				<div class="col-md-3">
					<p class="single-book-price">$<?=number_format($product['cost_price'])?></p>
				</div>
				<div class="col-md-9">
					<div class="add-cart-button btn-group">
						<button class="btn btn-single btn-sm" type="button" data-toggle="dropdown">
							<img src="<?php echo base_url(); ?>assets/home/images/add-to-cart.png" alt="">
						</button>
						<button class="btn btn-single btn-uppercase" type="button">Add to cart</button>
					</div>
				</div>
			</div>


			<div class="description"><p><?=$product['description']?></p></div>
				</div>
			</div>
		</div>			    <!-- /.primary block -->

				<div class="divider inner-top-xs">
                    <img src="<?php echo base_url(); ?>assets/home/images/shadow.png" class="img-responsive" alt=""/>
				</div>

				 <div class="module wow fadeInUp">
				    <div class="module-heading home-page-module-heading">
				        <h2 class="module-title home-page-module-title"><span>Related Products</span></h2>
				        <p class="see-all-link"><a href="index.php?page=single-book#">See All</a> &rarr;</p>
				    </div>
				    <div class="module-body">
					    <div class="row text-center">
					     <!-- .related product -->
					     <div class="col-md-3 col-sm-4">
	<div class="book">
		<a href="index.php?page=single-book"><div class="book-cover">
			<img width="140" height="212" alt="" src="<?php echo base_url(); ?>assets/home/images/blank.gif" data-echo="<?php echo base_url(); ?>assets/home/images/book-covers/01.jpg">
		</div></a>
		<div class="book-details clearfix">
			<div class="book-description">
				<h3 class="book-title"><a href="index.php?page=single-book">The Brief Wondrous Life of  Oscar Wao</a></h3>
				<p class="book-subtitle">by <a href="index.php?page=single-book">Cormac McCarthy</a></p>
			</div>
			<div class="actions">
				<span class="book-price price">$14.75</span>

				<div class="cart-action">
					<a class="add-to-cart" title="Add to Cart" href="javascript:void(0);">Add to Cart</a>

				</div>
			</div>
		</div>
	</div>
</div>

					    <!-- /.related product -->
					    </div>
					</div>
				 </div>

				 <div class="divider inner-top-xs">
                    <img src="<?php echo base_url(); ?>assets/home/images/shadow.png" class="img-responsive" alt="" />
				</div>

				<div class="module wow fadeInUp" id="customer-reviews">
				    <div class="module-heading home-page-module-heading margin-top-10">
				        <h2 class="module-title home-page-module-title "><span>Customer Reviews(<?php echo $count_comment; ?>)</span></h2>

				    </div>
				    <!-- .customer reviews -->
					    <div class="module-body inner-top-xs" id="reviews">
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<!-- comment form -->
	  <form id="form" method="post">
	    <!-- need to supply post id with hidden fild -->
	    <input type="hidden" name="postid" value="1">

	    <div class="form-group">
	    <label><span>Name *</span></label>
	      <input type="text" name="name" id="comment-name" class="form-control bookshop-form-control" placeholder="Your name here...." required>

	    </div>
	    <div class="form-group">
	    <label><span>Email *</span></label>
	      <input type="email" name="mail" id="comment-mail" class="form-control bookshop-form-control" placeholder="Your mail here...." required>

	    </div>

	    <div class="form-group">
	    <label><span>Your comment *</span></label>
	      <textarea name="comment" id="comment" class="form-control bookshop-form-control" cols="150" rows="5" placeholder="Type your comment here...." required></textarea>

	    </div>
	    <input type="submit" id="submit" class="btn btn-primary btn-uppercase" value="Submit Comment">
	  </form>

</div> <!-- ./col -->
</div> <!-- ./row -->
<div class="divider inner-top-xs">
                    <img src="http://localhost/ci_projects/my_ci/assets/home/images/shadow.png" class="img-responsive" alt="">
</div>

		<!-- <ul class="list-unstyled review-list"> -->
		<?php echo $showComment ?>

		<!-- </ul> -->
			</div>					<!-- /.customer reviews -->
				</div>

			</div><!-- /.col -->
			<div class="col-md-3 col-md-pull-9">
				<aside class="sidebar">
					<div class="sidebar-module">
						<div class="sidebar-module-heading">
							<h4 class="sidebar-module-title">You are looking at</h4>
						</div>
						<div class="sidebar-module-body clearfix">
							<ul class="list-unstyled filter-list">
								<li>
									<a class="pull-right remove-filter" title="Cancel" href="index.php?page=single-book#">
									<i class="fa fa-times"></i>
									</a>
									Art,Architecture & Photography
								</li>
							</ul>
						</div>
					</div>

					<!-- ============================================== BOOKS BY SUBJECT ============================================== -->
<div class="sidebar-module">
	<div class="sidebar-module-heading">
		<h4 class="sidebar-module-title">Books by Subject</h4>
	</div>
	<div class="sidebar-module-body clearfix">
		<ul class="list-unstyled">
			<li><a href="index.php?page=single-book">Art, Architecture &amp; Photography</a></li>
			<li><a href="index.php?page=single-book">Bibles &amp; Bible Studies</a></li>
			<li><a href="index.php?page=single-book">Biographies</a></li>
			<li><a href="index.php?page=single-book">Business &amp; Money</a></li>
			<li><a href="index.php?page=single-book">Children's Books</a></li>
			<li><a href="index.php?page=single-book">Computing &amp; Internet</a></li>
			<li><a href="index.php?page=single-book">Cookbooks, Food &amp; Wine</a></li>
			<li><a href="index.php?page=single-book">Crafts &amp; Hobbies</a></li>
			<li><a href="index.php?page=single-book">Diet &amp; Health</a></li>
			<li><a href="index.php?page=single-book">Education &amp; Teaching</a></li>
			<li><a href="index.php?page=single-book">Fiction &amp; Literature</a></li>
			<li><a href="index.php?page=single-book">Graphic Novels</a></li>
			<li><a href="index.php?page=single-book">History</a></li>
			<li><a href="index.php?page=single-book">Home &amp; Garden</a></li>
			<li><a href="index.php?page=single-book">Humor</a></li>
			<li><a href="index.php?page=single-book">Libros en espaсol</a></li>
			<li><a href="index.php?page=single-book">Medicine</a></li>
			<li><a href="index.php?page=single-book">Mystery &amp; Crime</a></li>
			<li><a href="index.php?page=single-book">Nonfiction</a></li>
			<li><a href="index.php?page=single-book">Politics &amp; Current Events</a></li>
			<li><a href="index.php?page=single-book">Psychology</a></li>
			<li><a href="index.php?page=single-book">Religion</a></li>
			<li><a href="index.php?page=single-book">Reference</a></li>
			<li><a href="index.php?page=single-book">Romance</a></li>
			<li><a href="index.php?page=single-book">Science &amp; Nature</a></li>
			<li><a href="index.php?page=single-book">Science Fiction &amp; Fantasy</a></li>
			<li><a href="index.php?page=single-book">Self-Improvement</a></li>
			<li><a href="index.php?page=single-book">Sports &amp; Adventure</a></li>

		</ul>
	</div>
</div>
<!-- ============================================== BOOKS BY SUBJECT : END ============================================== -->
				   <!-- ============================================== BEST BOOKS ============================================== -->
<div class="sidebar-module">
	<div class="sidebar-module-heading">
		<h4 class="sidebar-module-title">Best Books</h4>
	</div>
	<div class="sidebar-module-body clearfix">
		<ul class="list-unstyled">
			<li><a href="index.php?page=single-book">Art, Architecture &amp; Photography</a></li>
			<li><a href="index.php?page=single-book">Bibles &amp; Bible Studies</a></li>
			<li><a href="index.php?page=single-book">Biographies</a></li>
			<li><a href="index.php?page=single-book">Business &amp; Money</a></li>
			<li><a href="index.php?page=single-book">Children's Books</a></li>
			<li><a href="index.php?page=single-book">Computing &amp; Internet</a></li>
			<li><a href="index.php?page=single-book">Cookbooks, Food &amp; Wine</a></li>
			<li><a href="index.php?page=single-book">Crafts &amp; Hobbies</a></li>
			<li><a href="index.php?page=single-book">Diet &amp; Health</a></li>
			<li><a href="index.php?page=single-book">Education &amp; Teaching</a></li>
			<li><a href="index.php?page=single-book">Fiction &amp; Literature</a></li>
			<li><a href="index.php?page=single-book">Graphic Novels</a></li>
			<li><a href="index.php?page=single-book">History</a></li>
			<li><a href="index.php?page=single-book">Home &amp; Garden</a></li>
			<li><a href="index.php?page=single-book">Humor</a></li>

		</ul>
	</div>
</div>
<!-- ============================================== BEST BOOKS : END ============================================== -->				</aside>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.content -->