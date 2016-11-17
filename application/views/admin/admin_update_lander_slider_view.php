<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo base_url(); ?>admin" class="site_title">
                        <i class="fa fa-user"></i> <span><?php echo $navbar_title; ?></span>
                    </a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="<?php echo base_url(); ?>images/avatar.png" alt="<?php echo $full_name; ?>"
                             class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $full_name; ?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <?php $this->load->view('admin/admin_dashboard_navbar_view'); ?>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <!--<div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>-->
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('admin/admin_dashboard_top_nevigation_view'); ?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php echo $page_title; ?></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php if (validation_errors()) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo validation_errors(); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('file_errors')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('file_errors'); ?></strong>
                                    </div>
                                <?php } ?>

                                <br/>

                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                      enctype="multipart/form-data"
                                      method="post">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country_id">Select
                                            Country Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="country_id"
                                                    name="country_id" class="form-control" required="required">
                                                <option
                                                    value="">Please Select a Country
                                                </option>
                                                <?php if (isset($all_countries) && $all_countries->num_rows() > 0):
                                                    foreach ($all_countries->result() as $row): ?>
                                                        <option
                                                            value="<?php echo $row->lander_country_id ?>" <?php echo $single_image['lander_image_country_id'] == $row->lander_country_id ? 'selected' : ''; ?>>
                                                            <?php echo $row->lander_country_name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="userfile">Upload
                                            Image
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="uploadBtn" type="file" name="userFile"
                                                   class="form-control col-md-7 col-xs-12"/>
                                        </div>
                                        <div class="col-md-2">
                                            <img height="100" width="100"
                                                src="<?php echo base_url();?>uploaded/lander_slider_images/<?php echo $single_image['lander_image_file_name']? $single_image['lander_image_file_name']:'blank_person.png'; ?>"
                                                alt="<?php echo $single_image['lander_image_file_name']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="is_active"
                                                           name="is_active" value="1"  <?php echo $single_image['lander_image_is_active'] == 1 ? 'checked' : ''; ?>/> Is Active
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <a href="<?php echo base_url();?>admin/slider/image/create" class="btn btn-primary">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->