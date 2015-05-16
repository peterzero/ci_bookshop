      <div class="main-content">
        <div class="main-content-inner">
          <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
              try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
              <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?php echo site_url("admin"); ?>"><?php echo ucfirst($this->uri->segment(1)); ?></a>
              </li>

              <li>
              <a href="<?php echo site_url("admin") . '/'. $this->uri->segment(2); ?>"><?php echo ucfirst($this->uri->segment(2)); ?></a>
              </li>

              <li class="active">
              <?php echo "New"; ?>
              </li>

            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
              <form class="form-search">
                <span class="input-icon">
                  <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                  <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
              </form>
            </div><!-- /.nav-search -->
          </div>

          <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
              <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                <i class="ace-icon fa fa-cog bigger-130"></i>
              </div>

              <div class="ace-settings-box clearfix" id="ace-settings-box">
                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <div class="pull-left">
                      <select id="skin-colorpicker" class="hide">
                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                      </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
                    <label class="lbl" for="ace-settings-add-container">
                      Inside
                      <b>.container</b>
                    </label>
                  </div>
                </div><!-- /.pull-left -->

                <div class="pull-left width-50">
                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
                    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                  </div>

                  <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
                    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                  </div>
                </div><!-- /.pull-left -->
              </div><!-- /.ace-settings-box -->
            </div><!-- /.ace-settings-container -->
            <div class="page-header">
              <h1>
                Add Product
              </h1>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php
                //flash messages
                if(isset($flash_message)){
                  if($flash_message == TRUE)
                  {
                    echo '<div class="alert alert-success">';
                      echo '<a class="close" data-dismiss="alert">×</a>';
                      echo '<strong>Well done!</strong> new product created with success.';
                    echo '</div>';
                  }else{
                    echo '<div class="alert alert-error">';
                      echo '<a class="close" data-dismiss="alert">×</a>';
                      echo '<strong>Oh snap!</strong> change a few things up and try submitting again.';
                    echo '</div>';
                  }
                }
                ?>
                  <!-- <form class="form-horizontal" role="form" enctype="multipart/form-data"> -->
                  <?php
                  //form data
                    $attributes = array('class' => 'form-horizontal', 'role' => 'form');
                    $options_categories = array('' => "Select");
                    foreach ($categories as $row)
                    {
                      $options_categories[$row['id']] = $row['name'];
                    }
                    //form validation
                    echo validation_errors();
                    echo form_open_multipart(base_url()."admin/products/add",$attributes);
                   ?>
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name </label>

                      <div class="col-sm-9">
                        <input type="text" id="name" name="name" class="col-xs-10 col-sm-5" value="<?php echo set_value('name'); ?>"/>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name Eng </label>

                      <div class="col-sm-9">
                        <input type="text" id="name_en" name="name_en" class="col-xs-10 col-sm-5" value="<?php echo set_value('name_en'); ?>"/>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Image </label>

                      <div class="col-sm-9">
                        <input type="file" id="iamge" name="image"  class="col-xs-10 col-sm-5" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Cost Price </label>

                      <div class="col-sm-9">
                        <input type="text" id="cost_price" name="cost_price" class="col-xs-10 col-sm-5" value="<?php echo set_value('cost_price'); ?>"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sell Price </label>

                      <div class="col-sm-9">
                        <input type="text" id="sell_price" name="sell_price" class="col-xs-10 col-sm-5" value="<?php echo set_value('sell_price'); ?>"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description </label>

                      <div class="col-sm-9">
                        <textarea class="form-control ckeditor" id="desc" name="desc" style="margin: 0px -0.015625px 0px 0px; width: 331px; height: 52px;"><?php echo set_value('desc'); ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Description En </label>

                      <div class="col-sm-9">
                        <textarea class="form-control ckeditor" id="desc_en" name="desc_en" style="margin: 0px -0.015625px 0px 0px; width: 331px; height: 52px;"><?php echo set_value('desc_en'); ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="author"> Author </label>

                      <div class="col-sm-9">
                        <input type="text" id="author" name="author" class="col-xs-10 col-sm-5" value="<?php echo set_value('author'); ?>"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="cat"> Category </label>

                      <div class="col-sm-9">
                        <!-- <input type="text" id="cat" name="cat" class="col-xs-10 col-sm-5" /> -->
                        <?php echo form_dropdown('cat', $options_categories, set_value('cat')); ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="stock"> Stock </label>

                      <div class="col-sm-9">
                        <input type="text" id="stock" name="stock" class="col-xs-10 col-sm-5" value="<?php echo set_value('stock'); ?>"/>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="status"> Status </label>
                    <div class="checkbox">
                      <label>
                            <input name="status" class="ace ace-switch" type="checkbox" checked>
                            <span class="lbl"></span>
                          </label>
                    </div>
                    </div>

                    <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                      <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                      </button>

                      &nbsp; &nbsp; &nbsp;
                      <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                      </button>
                    </div>
                  </div>
                  <?php form_close(); ?>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->