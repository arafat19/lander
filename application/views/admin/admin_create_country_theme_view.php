<body class="nav-md">
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected Country Theme?")) {
            return true;
        } else {
            return false;
        }
    }
</script>
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
                                if ($this->session->flashdata('admin_create_country_theme_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_create_country_theme_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_create_theme_error_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_create_theme_error_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_update_country_theme_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_update_country_theme_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_update_theme_error_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_update_theme_error_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('last_link_delete_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('last_link_delete_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('cant_delete_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('cant_delete_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_can_not_create_country_theme_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_can_not_create_country_theme_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_can_not_associate_country_theme_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_can_not_associate_country_theme_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('country_theme_delete_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('country_theme_delete_message'); ?></strong>
                                    </div>
                                <?php } ?>

                                <br/>

                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                      method="POST">

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
                                                <?php if (isset($all_active_countries) && $all_active_countries->num_rows() > 0):
                                                    foreach ($all_active_countries->result() as $row): ?>
                                                        <option
                                                            value="<?php echo $row->lander_country_id ?>" <?php echo $this->input->post('country_id') == $row->lander_country_id ? 'selected' : ''; ?>>
                                                            <?php echo $row->lander_country_name; ?>
                                                        </option>
                                                    <?php
                                                    endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="theme_id">Select
                                            Theme Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="theme_id"
                                                    name="theme_id" class="form-control" required="required">
                                                <option
                                                    value="">Please Select a Device
                                                </option>
                                                <?php if (isset($all_active_themes) && $all_active_themes->num_rows() > 0):
                                                    foreach ($all_active_themes->result() as $row): ?>
                                                        <option style="background-color: <?php echo $row->lander_theme_color_code; ?>;color:#fff;font-size: 1em; font-weight: bold"
                                                            value="<?php echo $row->lander_theme_id ?>" <?php echo $this->input->post('theme_id') == $row->lander_theme_id ? 'selected' : ''; ?>>
                                                            <?php echo $row->lander_theme_name; ?>
                                                        </option>
                                                    <?php
                                                    endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="is_live"
                                                           name="is_live" value="1"/> Is Live
                                                </label>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Create</button>
                                            <button type="reset" class="btn btn-primary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><?php echo $data_list_title; ?></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Theme Name</th>
                                        <th>Theme Color</th>
                                        <th>Country Name</th>
                                        <th>Is Live</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <?php $i = 1; ?>
                                    <?php if (isset($all_country_themes) && $all_country_themes->num_rows() > 0): ?>
                                    <tbody>
                                    <?php foreach ($all_country_themes->result() as $row): ?>


                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->lander_theme_name; ?></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar"
                                                         style="background-color:<?php echo $row->lander_theme_color_code; ?> !important; width: 100%;"></div>
                                                </div>
                                            </td>
                                            <td><?php echo $row->lander_country_name; ?></td>
                                            <td align="center"><?php if($row->sdil_lander_theme_country_is_live){ ?>
                                                    <a class="btn btn-warning" target="_blank"
                                                       href="<?php echo base_url(); ?>">Live Preview</span></a>
                                                   <?php
                                                    } else echo 'No'; ?></td>
                                            <td align="center"><a class="btn btn-success" title="Edit"
                                                                  href="<?php echo base_url(); ?>admin/country/theme/update/<?php echo base64_encode($row->sdil_lander_theme_country_ID); ?>"
                                                                  role="button"><span
                                                        class="glyphicon glyphicon-edit"></span></a>

                                                <a class="btn btn-danger"
                                                   href="<?php echo base_url(); ?>admin/country/theme/delete/<?php echo base64_encode($row->sdil_lander_theme_country_ID); ?>"
                                                   onclick="return checkMe()" title="Delete"
                                                   role="button"><span class="glyphicon glyphicon-trash"></span></a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php else: ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-info " role="alert">
                                            No Results were found.
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->