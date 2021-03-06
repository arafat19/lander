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
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo validation_errors(); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_password_update_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_password_update_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_current_password_wrong_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_current_password_wrong_message'); ?></strong>
                                    </div>
                                <?php } ?>

                                <br/>
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="current_password">Current Password<span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" class="form-control" id="current_password" name="current_password" minlength="6"
                                                   pattern="^.*(?=.{6,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                                   placeholder="Letters,Numbers & Special Characters" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="password">New Password<span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" class="form-control" id="password" name="password" minlength="6"
                                                   pattern="^.*(?=.{6,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                                   placeholder="Letters,Numbers & Special Characters"  oninput="checkSamePassword(this)" required/>
                                            <script language='javascript' type='text/javascript'>
                                                function checkSamePassword(input) {
                                                    if (input.value == document.getElementById('current_password').value) {
                                                        input.setCustomValidity('New Password Must be Different form Current Password.');
                                                    } else {
                                                        // input is valid -- reset the error message
                                                        input.setCustomValidity('');
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-sm-3 col-xs-12 control-label" for="confirm_password">Confirm Your
                                            Password<span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" class="form-control" id="confirm_password"
                                                   name="confirm_password" minlength="6"
                                                   pattern="^.*(?=.{6,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                                   placeholder="Letters,Numbers & Special Characters" required
                                                   oninput="check(this)"/>

                                            <script language='javascript' type='text/javascript'>
                                                function check(input) {
                                                    if (input.value != document.getElementById('password').value) {
                                                        input.setCustomValidity('Password Must be Matching.');
                                                    } else {
                                                        // input is valid -- reset the error message
                                                        input.setCustomValidity('');
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <button type="reset" class="btn btn-primary">Cancel</button>
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