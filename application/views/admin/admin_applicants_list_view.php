<body class="nav-md">
<script language="javascript">
    function checkMe() {
        if (confirm("Are you sure you want to delete the selected Course?")) {
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
                                <?php if (validation_errors()) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo validation_errors(); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('please_select_one')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('please_select_one'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('fare_date_selection')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('fare_date_selection'); ?></strong>
                                    </div>
                                <?php } ?>

                                <br/>
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                      method="POST">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="course_id">Select
                                            Course Name
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="course_id"
                                                    name="course_id" class="form-control">
                                                <option
                                                    value="">Please Select a Course Name
                                                </option>
                                                <?php if (isset($all_courses) && $all_courses->num_rows() > 0):
                                                    foreach ($all_courses->result() as $row): ?>
                                                        <option
                                                            value="<?php echo $row->course_id ?>" <?php if ($course_id_selected == $row->course_id) echo 'selected'; ?>>
                                                            <?php echo $row->course_name; ?>
                                                        </option>
                                                        <?php
                                                    endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district_id">Select
                                            District
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="district_ids"
                                                    name="district_id" class="form-control">
                                                <option
                                                    value="">Please Select a District
                                                </option>
                                                <?php if (isset($all_districts) && $all_districts->num_rows() > 0):
                                                    foreach ($all_districts->result() as $row): ?>
                                                        <option
                                                            value="<?php echo $row->district_id ?>" <?php if ($district_id_selected == $row->district_id) echo 'selected';?>><?php echo $row->district_name; ?></option>
                                                        <?php
                                                    endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_district_id">Select
                                            Sub District
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="sub_district_ids"
                                                    name="sub_district_id" class="form-control">
                                                <?php

                                                if ($sub_district_id_selected || $district_id_selected) {
                                                    echo "<option value=''>Please Select a Sub District</option>";
                                                    if (isset($all_sub_districts) && $all_sub_districts->num_rows() > 0):
                                                        foreach ($all_sub_districts->result() as $row): ?>
                                                            <option
                                                                value="<?php echo $row->sub_district_id ?>" <?php if($sub_district_id_selected == $row->sub_district_id) echo 'selected'; ?>><?php echo $row->sub_district_name; ?></option>
                                                            <?php
                                                        endforeach;
                                                    endif;
                                                }
                                                ?>
                                                <!--<option value="">Please Select a Sub District</option>
                                                <?php /*if (isset($all_sub_districts) && $all_sub_districts->num_rows() > 0):
                                                    foreach ($all_sub_districts->result() as $row): */ ?>
                                                        <option
                                                            value="<?php /*echo $row->sub_district_id */ ?>" <?php /*if($sub_district_id_selected == $row->sub_district_id) echo 'selected'; */ ?>><?php /*echo $row->sub_district_name; */ ?></option>
                                                        --><?php
                                                /*                                                    endforeach;
                                                                                                endif; */ ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                               for="from_date">From Date
                                        </label>
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <input id="from_date" name="from_date"
                                                   placeholder="Select From Date"
                                                   value="<?php if($from_date != '') echo $from_date; ?>"
                                                   class="date-picker form-control col-md-6 col-xs-12"type="text">
                                        </div>
                                        <label class="control-label col-md-1 col-sm-3 col-xs-12"
                                               for="to_date">To Date
                                        </label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <input id="to_date" name="to_date"
                                                   placeholder="Select To Date"
                                                   value="<?php if($to_date != '') echo $to_date; ?>"
                                                   class="date-picker form-control col-md-6 col-xs-12"type="text">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <a type="button" href="<?php echo base_url() ?>admin/show/applicants"
                                               class="btn btn-danger">Reset</a>
                                            <button type="submit" class="btn btn-success">Search</button>
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
                                        <th>Applicant Name</th>
                                        <th>Applicant Mobile</th>
                                        <?php
                                        if ($district_id_selected || $from_date || $to_date) {
                                            echo '<th>District Name</th>';
                                        }
                                        if ($sub_district_id_selected || $from_date || $to_date) {
                                            echo '<th>Sub District Name</th>';
                                        } ?>
                                        <th>Applicant Village</th>
                                        <th>Applicant Post Office</th>
                                        <?php
                                        if ($course_id_selected || $from_date || $to_date) {
                                            echo '<th>Course Name</th>';
                                        }

                                        ?>
                                        <th>Applicant Photo</th>
                                        <th>Apply Date</th>
                                    </tr>
                                    </thead>

                                    <?php $i = 1; ?>
                                    <?php if (isset($applicants_list) && $applicants_list->num_rows() > 0): ?>
                                    <tbody>
                                    <?php foreach ($applicants_list->result() as $row): ?>


                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->applicant_name; ?></td>
                                            <td><?php echo $row->applicant_mobile; ?></td>

                                            <?php
                                            if ($district_id_selected || $from_date || $to_date) {
                                                echo '<td>' . $row->district_name . '</td>';
                                            }
                                            if ($sub_district_id_selected || $from_date || $to_date) {
                                                echo '<td>' . $row->sub_district_name . '</td>';
                                            } ?>
                                            <td><?php echo $row->applicant_village; ?></td>
                                            <td><?php echo $row->applicant_post_office; ?></td>
                                            <?php
                                            if ($course_id_selected || $from_date || $to_date) {
                                                echo '<td>' . $row->course_name . '</td>';
                                            }

                                            ?>
                                            <td align="center">
                                                <img class="img-thumb" height="45px" width="45px"
                                                     src="<?php echo base_url(); ?>uploaded/applicants_photo/<?php echo $row->applicant_photo ? $row->applicant_photo : 'blank_person.png'; ?>"
                                                     alt="<?php echo $row->applicant_photo; ?>"/>
                                            </td>
                                            <td><?=$row->application_date?></td>

                                        </tr>

                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->