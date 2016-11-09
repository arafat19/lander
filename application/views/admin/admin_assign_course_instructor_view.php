<body class="nav-md">
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to remove the selected Course?")) {
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
                        <img src="<?php echo base_url(); ?>images/avatar.png" alt="<?php echo $blri_admin_name; ?>"
                             class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <h2><?php echo $blri_admin_name; ?></h2>
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
                                <?php
                                if ($this->session->flashdata('admin_assign_course_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_assign_course_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_assign_course_error_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_assign_course_error_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_remove_course_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_remove_course_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('admin_remove_course_error_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('admin_remove_course_error_message'); ?></strong>
                                    </div>
                                <?php } ?>

                                <br/>

                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                      method="POST">

                                    <div class="form-group">
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="col-md-6 col-sm-6 col-xs-12"><strong>Instructor Name:</strong>
                                            </div>
                                            <div
                                                class="col-md-6 col-sm-6 col-xs-12"><?php echo $single_instructor['instructor_name']; ?></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="col-md-6 col-sm-6 col-xs-12"><strong>Instructor Email:</strong>
                                            </div>
                                            <div
                                                class="col-md-6 col-sm-6 col-xs-12"><?php echo $single_instructor['instructor_email']; ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="col-md-6 col-sm-6 col-xs-12"><strong>Instructor Phone
                                                    Number:</strong></div>
                                            <div
                                                class="col-md-6 col-sm-6 col-xs-12"><?php echo $single_instructor['instructor_phone_number']; ?></div>
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
                                        <th>Course Name</th>
                                        <th>Course Duration</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <?php $i = 1; ?>
                                    <?php if (isset($all_courses) && $all_courses->num_rows() > 0): ?>
                                    <tbody>
                                    <?php foreach ($all_courses->result() as $row): ?>


                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->course_name; ?></td>
                                            <td><?php echo $row->course_start_date; ?> --
                                                <?php echo $row->course_end_date; ?> (
                                                <?php
                                                $c_start_time = $row->course_start_date;
                                                $c_end_time = $row->course_end_date;
                                                $c_start = strtotime($c_start_time);
                                                $c_end = strtotime($c_end_time);
                                                $new_c_start = date('Y-m-d', $c_start);
                                                $new_c_end = date('Y-m-d', $c_end);
                                                $differenceFormat = '%a Day(s)';
                                                $interval = date_diff(date_create($new_c_start), date_create($c_end_time));
                                                echo $interval->format($differenceFormat);
                                                ?>)
                                            </td>
                                            <td align="center">
                                                <?php
                                                $this->load->model('app_user_model');
                                                $course_id = base64_encode($row->course_id);
                                                $instructor_id = base64_encode($single_instructor['instructor_id']);
                                                $is_assigned = $this->app_user_model->check_is_assigned($row->course_id, $single_instructor['instructor_id']);
                                                if ($is_assigned) { ?>
                                                    <a class="btn btn-danger"
                                                       href="<?php echo base_url(); ?>admin/course/remove/<?php echo $course_id; ?>/<?php echo $instructor_id; ?>"
                                                       onclick="return checkMe()" title="Remove"
                                                       role="button"><span class="glyphicon glyphicon-remove"></span>
                                                        Remove</a>

                                                <?php
                                                } else {
                                                    ?>
                                                    <a class="btn btn-success" title="Assign"
                                                       href="<?php echo base_url(); ?>admin/course/assign/<?php echo $course_id; ?>/<?php echo $instructor_id; ?>"
                                                       role="button"><span
                                                            class="glyphicon glyphicon-check"></span> Assign</a>
                                                <?php } ?>


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