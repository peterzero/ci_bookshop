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

							<li class="active">Contact - Inbox</li>
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
								Inbox
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<div class="tabbable">
											<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
												<li class="li-new-mail pull-right">
													<a data-toggle="tab" href="#write" data-target="write" class="btn-new-mail">
														<span class="btn btn-purple no-border">
															<i class="ace-icon fa fa-envelope bigger-130"></i>
															<span class="bigger-110">Write Mail</span>
														</span>
													</a>
												</li><!-- /.li-new-mail -->

												<li class="active">
													<a data-toggle="tab" href="#inbox" data-target="inbox">
														<i class="blue ace-icon fa fa-inbox bigger-130"></i>
														<span class="bigger-110">Inbox</span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#sent" data-target="sent">
														<i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
														<span class="bigger-110">Sent</span>
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#draft" data-target="draft">
														<i class="green ace-icon fa fa-pencil bigger-130"></i>
														<span class="bigger-110">Draft</span>
													</a>
												</li>

												<li class="dropdown">
													<a data-toggle="dropdown" class="dropdown-toggle" href="#">
														<i class="pink ace-icon fa fa-tags bigger-130"></i>

														<span class="bigger-110">
															Tags
															<i class="ace-icon fa fa-caret-down"></i>
														</span>
													</a>

													<ul class="dropdown-menu dropdown-light-blue dropdown-125">
														<li>
															<a data-toggle="tab" href="#tag-1">
																<span class="mail-tag badge badge-pink"></span>
																<span class="pink">Tag#1</span>
															</a>
														</li>

														<li>
															<a data-toggle="tab" href="#tag-family">
																<span class="mail-tag badge badge-success"></span>
																<span class="green">Family</span>
															</a>
														</li>

														<li>
															<a data-toggle="tab" href="#tag-friends">
																<span class="mail-tag badge badge-info"></span>
																<span class="blue">Friends</span>
															</a>
														</li>

														<li>
															<a data-toggle="tab" href="#tag-work">
																<span class="mail-tag badge badge-grey"></span>
																<span class="grey">Work</span>
															</a>
														</li>
													</ul>
												</li><!-- /.dropdown -->
											</ul>

											<div class="tab-content no-border no-padding">
												<div id="inbox" class="tab-pane in active">
													<div class="message-container">
														<div id="id-message-list-navbar" class="message-navbar clearfix">
															<div class="message-bar">
																<div class="message-infobar" id="id-message-infobar">
																	<span class="blue bigger-150">Inbox</span>
																	<span class="grey bigger-110 unread">(<?php echo $new_contact; ?> unread messages)</span>
																</div>

																<div class="message-toolbar hide">
																	<div class="inline position-relative align-left">
																		<button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
																			<span class="bigger-110">Action</span>

																			<i class="ace-icon fa fa-caret-down icon-on-right"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-mail-reply blue"></i>&nbsp; Reply
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-mail-forward green"></i>&nbsp; Forward
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-folder-open orange"></i>&nbsp; Archive
																				</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-eye blue"></i>&nbsp; Mark as read
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-eye-slash green"></i>&nbsp; Mark unread
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-flag-o red"></i>&nbsp; Flag
																				</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-trash-o red bigger-110"></i>&nbsp; Delete
																				</a>
																			</li>
																		</ul>
																	</div>

																	<div class="inline position-relative align-left">
																		<button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
																			<i class="ace-icon fa fa-folder-o bigger-110 blue"></i>
																			<span class="bigger-110">Move to</span>

																			<i class="ace-icon fa fa-caret-down icon-on-right"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-stop pink2"></i>&nbsp; Tag#1
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-stop blue"></i>&nbsp; Family
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-stop green"></i>&nbsp; Friends
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-stop grey"></i>&nbsp; Work
																				</a>
																			</li>
																		</ul>
																	</div>

																	<button type="button" class="btn btn-xs btn-white btn-primary">
																		<i class="ace-icon fa fa-trash-o bigger-125 orange"></i>
																		<span class="bigger-110">Delete</span>
																	</button>
																</div>
															</div>

															<div>
																<div class="messagebar-item-left">
																	<label class="inline middle">
																		<input type="checkbox" id="id-toggle-all" class="ace" />
																		<span class="lbl"></span>
																	</label>

																	&nbsp;
																	<div class="inline position-relative">
																		<a href="#" data-toggle="dropdown" class="dropdown-toggle">
																			<i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
																		</a>

																		<ul class="dropdown-menu dropdown-lighter dropdown-100">
																			<li>
																				<a id="id-select-message-all" href="#">All</a>
																			</li>

																			<li>
																				<a id="id-select-message-none" href="#">None</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a id="id-select-message-unread" href="#">Unread</a>
																			</li>

																			<li>
																				<a id="id-select-message-read" href="#">Read</a>
																			</li>
																		</ul>
																	</div>
																</div>

																<div class="messagebar-item-right">
																	<div class="inline position-relative">
																		<a href="#" data-toggle="dropdown" class="dropdown-toggle">
																			Sort &nbsp;
																			<i class="ace-icon fa fa-caret-down bigger-125"></i>
																		</a>

																		<ul class="dropdown-menu dropdown-lighter dropdown-menu-right dropdown-100">
																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-check green"></i>
																					Date
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-check invisible"></i>
																					From
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-check invisible"></i>
																					Subject
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>

																<div class="nav-search minimized">
																	<form class="form-search">
																		<span class="input-icon">
																			<input type="text" autocomplete="off" class="input-small nav-search-input" placeholder="Search inbox ..." />
																			<i class="ace-icon fa fa-search nav-search-icon"></i>
																		</span>
																	</form>
																</div>
															</div>
														</div>

														<div id="id-message-item-navbar" class="hide message-navbar clearfix">
															<div class="message-bar">
																<div class="message-toolbar">
																	<div class="inline position-relative align-left">
																		<button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
																			<span class="bigger-110">Action</span>

																			<i class="ace-icon fa fa-caret-down icon-on-right"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-mail-reply blue"></i>&nbsp; Reply
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-mail-forward green"></i>&nbsp; Forward
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-folder-open orange"></i>&nbsp; Archive
																				</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-eye blue"></i>&nbsp; Mark as read
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-eye-slash green"></i>&nbsp; Mark unread
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-flag-o red"></i>&nbsp; Flag
																				</a>
																			</li>

																			<li class="divider"></li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-trash-o red bigger-110"></i>&nbsp; Delete
																				</a>
																			</li>
																		</ul>
																	</div>

																	<div class="inline position-relative align-left">
																		<button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
																			<i class="ace-icon fa fa-folder-o bigger-110 blue"></i>
																			<span class="bigger-110">Move to</span>

																			<i class="ace-icon fa fa-caret-down icon-on-right"></i>
																		</button>

																		<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-stop pink2"></i>&nbsp; Tag#1
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-stop blue"></i>&nbsp; Family
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-stop green"></i>&nbsp; Friends
																				</a>
																			</li>

																			<li>
																				<a href="#">
																					<i class="ace-icon fa fa-stop grey"></i>&nbsp; Work
																				</a>
																			</li>
																		</ul>
																	</div>

																	<button type="button" class="btn btn-xs btn-white btn-primary">
																		<i class="ace-icon fa fa-trash-o bigger-125 orange"></i>
																		<span class="bigger-110">Delete</span>
																	</button>
																</div>
															</div>

															<div>
																<div class="messagebar-item-left">
																	<a href="#" class="btn-back-message-list">
																		<i class="ace-icon fa fa-arrow-left blue bigger-110 middle"></i>
																		<b class="bigger-110 middle">Back</b>
																	</a>
																</div>

																<div class="messagebar-item-right">
																	<i class="ace-icon fa fa-clock-o bigger-110 orange"></i>
																	<span class="grey"><?php echo date('Y:m:d H:i:s'); ?></span>
																</div>
															</div>
														</div>

														<div id="id-message-new-navbar" class="hide message-navbar clearfix">
															<div class="message-bar">
																<div class="message-toolbar">
																	<button type="button" class="btn btn-xs btn-white btn-primary">
																		<i class="ace-icon fa fa-floppy-o bigger-125"></i>
																		<span class="bigger-110">Save Draft</span>
																	</button>

																	<button type="button" class="btn btn-xs btn-white btn-primary">
																		<i class="ace-icon fa fa-times bigger-125 orange2"></i>
																		<span class="bigger-110">Discard</span>
																	</button>
																</div>
															</div>

															<div>
																<div class="messagebar-item-left">
																	<a href="#" class="btn-back-message-list">
																		<i class="ace-icon fa fa-arrow-left bigger-110 middle blue"></i>
																		<b class="middle bigger-110">Back</b>
																	</a>
																</div>

																<div class="messagebar-item-right">
																	<span class="inline btn-send-message">
																		<button type="button" class="btn btn-sm btn-primary no-border btn-white btn-round">
																			<span class="bigger-110">Send</span>

																			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																		</button>
																	</span>
																</div>
															</div>
														</div>

														<div class="message-list-container">
															<div class="message-list" id="message-list">
															<?php foreach ($contacts as $key => $value) { ?>
																<div class="message-item <?php echo $value['isRead'] == 0 ? 'message-unread' : '' ?>" id="item-<?php echo $value['contact_id']?>">
																	<label class="inline">
																		<input type="checkbox" class="ace" />
																		<span class="lbl"></span>
																	</label>

																	<i class="message-star ace-icon fa fa-star orange2"></i>
																	<span class="sender" title="Alex John Red Smith"><?php echo $value['contact_name'] ?> </span>
																	<span class="time"><?php echo $value['created_on'] ?></span>

																	<span class="summary">
																		<span class="text" id="msg-<?php echo $value['contact_id'] ?>" data-id="<?php echo $value['contact_id'] ?>">
																			<?php echo $value['contact_subject'] ?>
																		</span>
																	</span>
																</div>
															<?php } ?>

															</div>
														</div>

														<div class="message-footer clearfix">
															<div class="pull-left msg_total"> <?php echo $all_contact; ?> messages total </div>

															<div class="pull-right">
																<div class="inline middle"> page 1 of 16 </div>

																&nbsp; &nbsp;
																<ul class="pagination middle">
																	<li class="disabled">
																		<span>
																			<i class="ace-icon fa fa-step-backward middle"></i>
																		</span>
																	</li>

																	<li class="disabled">
																		<span>
																			<i class="ace-icon fa fa-caret-left bigger-140 middle"></i>
																		</span>
																	</li>

																	<li>
																		<span>
																			<input value="1" maxlength="3" type="text" />
																		</span>
																	</li>

																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-caret-right bigger-140 middle"></i>
																		</a>
																	</li>

																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-step-forward middle"></i>
																		</a>
																	</li>
																</ul>
															</div>
														</div>

														<div class="hide message-footer message-footer-style2 clearfix">
															<div class="pull-left"> simpler footer </div>

															<div class="pull-right">
																<div class="inline middle"> message 1 of 151 </div>

																&nbsp; &nbsp;
																<ul class="pagination middle">
																	<li class="disabled">
																		<span>
																			<i class="ace-icon fa fa-angle-left bigger-150"></i>
																		</span>
																	</li>

																	<li>
																		<a href="#">
																			<i class="ace-icon fa fa-angle-right bigger-150"></i>
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.tab-content -->
										</div><!-- /.tabbable -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<!-- form-new-mail-content -->
								<form id="id-message-form" class="hide form-horizontal message-form col-xs-12">
									<div>
										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-recipient">Recipient:</label>

											<div class="col-sm-9">
												<span class="input-icon">
													<input type="email" name="recipient" id="form-field-recipient" data-value="alex@doe.com" value="" placeholder="Recipient(s)" />
													<i class="ace-icon fa fa-user"></i>
												</span>
											</div>
										</div>

										<div class="hr hr-18 dotted"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right" for="form-field-subject">Subject:</label>

											<div class="col-sm-6 col-xs-12">
												<div class="input-icon block col-xs-12 no-padding">
													<input maxlength="100" type="text" class="col-xs-12" name="subject" id="form-field-subject" placeholder="Subject" />
													<i class="ace-icon fa fa-comment-o"></i>
												</div>
											</div>
										</div>

										<div class="hr hr-18 dotted"></div>

										<div class="form-group">
											<label class="col-sm-3 control-label no-padding-right">
												<span class="inline space-24 hidden-480"></span>
												Message:
											</label>

											<div class="col-sm-9">
												<div class="wysiwyg-editor"></div>
											</div>
										</div>

										<div class="hr hr-18 dotted"></div>

										<div class="form-group no-margin-bottom">
											<label class="col-sm-3 control-label no-padding-right">Attachments:</label>

											<div class="col-sm-9">
												<div id="form-attachments">
													<input type="file" name="attachment[]" />
												</div>
											</div>
										</div>

										<div class="align-right">
											<button id="id-add-attachment" type="button" class="btn btn-sm btn-danger">
												<i class="ace-icon fa fa-paperclip bigger-140"></i>
												Add Attachment
											</button>
										</div>

										<div class="space"></div>
									</div>
								</form>
								<!-- /.form-new-mail-content -->

								<!-- .message-content -->
								<div class="hide message-content" id="id-message-content">
									<div class="message-header clearfix">
										<div class="pull-left">
											<span class="blue bigger-125" id="subject"></span>

											<div class="space-4"></div>

											<i class="ace-icon fa fa-star orange2"></i>

											&nbsp;
											<img class="middle" alt="John's Avatar" src="<?php echo base_url(); ?>assets/admin/avatars/avatar.png" width="32" />
											&nbsp;
											<a href="#" class="sender" id="sender"></a>

											&nbsp;
											<i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
											<span class="time grey" id="time"></span>
										</div>

										<div class="pull-right action-buttons">
											<a href="#">
												<i class="ace-icon fa fa-reply green icon-only bigger-130"></i>
											</a>

											<a href="#">
												<i class="ace-icon fa fa-mail-forward blue icon-only bigger-130"></i>
											</a>

											<a href="javascript:void(0);" class="delete-me" id="delete-me" data-id="">
												<i class="ace-icon fa fa-trash-o red icon-only bigger-130"></i>
											</a>
										</div>
									</div>

									<div class="hr hr-double"></div>

									<div class="message-body">
									</div>
									</div>
								<!-- /.message-content -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-tag.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/jquery.hotkeys.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-wysiwyg.min.js"></script>