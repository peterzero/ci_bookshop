<div class="content wow fadeInUp">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb text-center">
				<li><a href="index.php?page=home">Home</a></li>
				<li class="active">Books</li>
			</ul><!-- /.breadcrumb -->

			<div class="divider">
			      <img class="img-responsive" src="<?= base_url(); ?>assets/home/images/shadow.png" alt="">
			</div><!-- /.divider -->
		</div><!-- /.row -->

		<div class="row m-t-20 books-with-sidebar">
			<div class="col-md-9 col-md-push-3">

			    <!-- ========================================== SECTION – HERO : END========================================= -->



			<div class="module margin-top-10 wow fadeInUp" id="books-by-month">
	<div class="module-heading home-page-module-heading">
		<h2 class="module-title home-page-module-title"><span><?= $cat_name['name']; ?> mới phát hành</span></h2>
		<!-- <p class="see-all-link"><a href="index.php?page=books#">See All</a> &rarr;</p> -->
	</div><!-- /.module-heading -->
	<div class="module-body">
		<div class="row books">
			<div class="clearfix text-center">
				<!-- items -->
				<?php if(!empty($products)){
				foreach ($products as $key => $item) {
					$id = $item['id'];
	                $name = $item['name'];
	                $author = $item['author'];
	                $description = $item['description'];
	                $price = $item['cost_price'];
	                $img_thumb = $item['image_thumb'] ? base_url().'upload/book-covers/'.$item['image_thumb'] : "" ;
	                $sell_price = $item['sell_price'];
	                $stock = $item['stock'];

				?>
				<div class="col-md-3 col-sm-4">
					<div class="book">
						<div class="book-cover">
							<a href="<?php echo base_url(); ?>home/single_product/<?php echo $id; ?>">
							<img width="140" height="212" src="<?php echo base_url(); ?>assets/home/images/blank.gif" data-echo="<?php echo $img_thumb; ?>" alt="" />
							<?php if($sell_price != 0 || !empty($sell_price) ){ ?>
                                    <div class="tag">
                                        <span>sale</span>
                                    </div>
                            <?php } ?>
                        </a>
						</div>
						<div class="book-details clearfix">
							<div class="book-description">
								<h3 class="book-title"><a href="<?php echo base_url(); ?>home/single_product/<?php echo $id; ?>"><?= $name;  ?></a></h3>
								<p class="book-subtitle">by <a href="#"><?= $author ?></a></p>
							</div>
							<div class="actions">
								<span class="book-price price">$<?= number_format($price,0) ?></span>

								<div class="cart-action">
									<a class="add-to-cart" data-id="<?php echo $id; ?>" data-stock=<?php echo $stock; ?> title="Add to Cart" href="javascript:void(0);">Add to Cart</a>

								</div>
							</div>
						</div>
					</div>
				</div><!-- /.col -->

				<?php }
				}else {
					echo '<h3 class="text-center">Không có sản phẩm trong danh mục này.</h3>';
				} ?>

			</div><!-- /.text-center -->
		</div><!-- /.row -->
	</div><!-- /.module-body -->
</div><!-- /.module -->
			 <div class="divider">
			         <img class="img-responsive" src="<?= base_url() ?>assets/home/images/shadow.png" alt="">
			    </div><!-- /.divider -->

			</div><!-- /.col -->

			<div class="col-md-3 col-md-pull-9">
				<aside class="sidebar">

				     <!-- ============================================== CUSTOMER FAVOURITES ============================================== -->

<!-- ============================================== CUSTOMER FAVOURITES : END ============================================== -->
				     <!-- ============================================== BOOKS BY SUBJECT ============================================== -->
<div class="sidebar-module">
	<div class="sidebar-module-heading">
		<h4 class="sidebar-module-title">Danh mục</h4>
	</div>
	<div class="sidebar-module-body clearfix">
		<ul class="list-unstyled">
			<li><a href="index.php?page=single-book">Art, Architecture &amp; Photography</a></li>
			<li><a href="index.php?page=single-book">Bibles &amp; Bible Studies</a></li>
		</ul>
	</div>
</div>
<!-- ============================================== BOOKS BY SUBJECT : END ============================================== -->
				     <!-- ============================================== BEST BOOKS ============================================== -->

<!-- ============================================== BEST BOOKS : END ============================================== -->
				</aside>
			</div>
		</div><!-- /.row -->
	</div><!-- /.container -->

    <!-- ============================================== TESTIMONIAL ============================================== -->
<!-- ============================================== TESTIMONIAL : END ============================================== -->
	<!-- ============================================== FROM BLOG ============================================== -->

<!-- ============================================== FROM BLOG : END ============================================== -->
</div><!-- /.content -->