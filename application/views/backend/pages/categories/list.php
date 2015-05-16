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
              <?php echo ucfirst($this->uri->segment(2)); ?>
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
                Categories
                <a href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" title="" class="btn btn-success pull-right">Add a new</a>
              </h1>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <?php //flash messages
                $flash_message = $this->session->flashdata('flash_message'); if(isset($flash_message) && count($flash_message)){ if($flash_message['type'] == 'success'){ ?>

                  <div class="alert alert-success">
                          <a class="close" data-dismiss="alert">×</a>
                          <?php echo $flash_message['message'];?>
                   </div>
                <?php } else if($flash_message['type'] == 'error'){ ?>
                  <div class="alert alert-danger">
                          <a class="close" data-dismiss="alert">×</a>
                          <?php echo $flash_message['message'];?>
                  </div>
                <?php } } ?>
                <?php
                    $error = validation_errors();
                    echo (isset($error) && !empty($error))? $error :'';
                ?>
                <?php echo form_open(base_url().'admin_categories/del_checked'); ?>
                  <div>
                  <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="center">
                          <label class="pos-rel">
                            <input type="checkbox" class="ace" />
                            <span class="lbl"></span>
                          </label>
                        </th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="hidden-480">Parent ID</th>
                        <th>
                          <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                          Created
                        </th>

                        <th class="hidden-480">Status</th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                    if(is_array($categories) && !empty($categories)):
                     foreach ($categories as $row): ?>
                       <tr id="item_<?= $row['id']?>">
                        <td class="center">
                          <label class="pos-rel">
                            <input type="checkbox" name="chk[]" value="<?= $row['id']?>" class="ace" />
                            <span class="lbl"></span>
                          </label>
                        </td>
                        <td>
                          <a href="#"><?=$row['name'];?></a>
                        </td>
                        <td><?= $row['description']; ?></td>
                        <td class="hidden-480"><?= $row['parent_id'];?></td>
                        <td><?= $row['created_on']; ?></td>

                        <td class="hidden-480">
                          <!-- <span class="label label-sm label-success"><?= $row['status'] == 1 ? 'active' : 'inactive'?>
                          </span> -->
                          <a href="<?php echo site_url("admin_categories").'/'.'set/status/'.$row['id'] ?>" title="Trạng thái"><img src="<?= base_url();?>assets/admin/img/<?php echo ($row['status'] == 1)?'check':'uncheck';?>.png" title="Trạng thái" /></a>
                        </td>
                        <td>
                          <div class="hidden-sm hidden-xs action-buttons">
                            <a class="blue" href="#">
                              <i class="ace-icon fa fa-search-plus bigger-130"></i>
                            </a>
                            <a class="green" href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/update/'.$row['id'];?>">
                              <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>

                            <a class="delete_me red" href="javascript:void(0);" id="<?= $row['id'] ?>" >
                              <i class="ace-icon fa fa-trash-o bigger-130"></i>
                            </a>
                            <!-- <a class="red" href="<?php echo site_url("admin").'/'.$this->uri->segment(2).'/delete/'.$row['id'];?>"> -->
                          </div>
                          <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                              <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                              <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                <li>
                                  <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                    <span class="blue">
                                      <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                    </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                    <span class="green">
                                      <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                    </span>
                                  </a>
                                </li>
                                <li>
                                  <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                      <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach;
                        endif;
                      ?>
                    </tbody>

                  </table>
                </div>
                <div class="clearfix form-actions">
                    <div class="col-md-12">
                        <button type="submit" name="delete" class="btn btn-white btn-warning btn-bold pull-left"><i class="ace-icon fa fa-trash-o bigger-120 orange"></i>Delete selected</button>
                    </div>
                </div>
                <?php form_close(); ?>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->