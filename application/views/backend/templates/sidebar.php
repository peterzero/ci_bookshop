<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li <?php if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == ''){ echo 'class="active"';} ?>>
						<a href="<?php echo base_url(); ?>admin/">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li <?php if($this->uri->segment(2) == 'products' or $this->uri->segment(2) == 'categories'){ echo 'class="active open"';} ?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> Products / Categories </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if($this->uri->segment(2) == 'products'){ echo 'class="active"';} ?>>
								<a href="<?php echo base_url(); ?>admin/products">
									<i class="menu-icon fa fa-caret-right"></i>
									Quản lý sản phẩm
								</a>

								<b class="arrow"></b>
							</li>

							<li <?php if($this->uri->segment(2) == 'categories'){ echo 'class="active"';} ?>>
								<a href="<?php echo base_url(); ?>admin/categories">
									<i class="menu-icon fa fa-caret-right"></i>
									Quản lý danh mục
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li <?php if($this->uri->segment(2) == 'contact' or $this->uri->segment(2) == 'New'){ echo 'class="active open"';} ?>>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Contact </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li <?php if($this->uri->segment(2) == 'contact'){ echo 'class="active"';} ?>>
								<a href="<?php echo base_url('admin/contact'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Inbox
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									New
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="gallery.html">
							<i class="menu-icon fa fa-picture-o"></i>
							<span class="menu-text"> Gallery </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>