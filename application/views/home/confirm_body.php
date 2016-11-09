<body class="nav-md">
<div class="container body">
    <div class="main_containerFull">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <!--<div class="page-title">
                    <div class="title_left">
                        <h3><?php /*echo $form_top_title; */ ?></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                        </div>
                    </div>
                </div>-->
                <div class="row headerArea">
                    <div class="col-md-2 col-xs-12"><img class="img-responsive avatar-view"
                                                         src="<?php echo base_url(); ?>images/blri.png" alt=""
                                                         title=""/></div>
                    <div class="col-md-10 col-xs-12"><h1><?php echo $title; ?></h1>
                        <hr/>
                        <span><?php echo $site_address; ?></span>
                    </div>
                </div>
                <br/>
                <div class="clearfix"></div>
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>
                                    <?php echo $online_application . ' ' . $confirmation; ?>
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                if ($this->session->flashdata('applicant_create_success_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('applicant_create_success_message'); ?></strong>
                                    </div>
                                <?php } ?>
                                <!--                                <form class="form-horizontal form-label-left"  method="post" enctype="multipart/form-data" action="-->
                                <?php //echo base_url();?><!--home/submit_application" novalidate>-->
                                <form class="form-horizontal form-label-left" method="post"
                                      enctype="multipart/form-data" novalidate>
                                    <span class="section"><h4
                                            class=" text-center"><?php echo $application_for_training . ' ' . $confirmation; ?></h4></span>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="applicant_subject_id"><?php echo $application_subject; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="applicant_subject_id"
                                                    name="applicant_subject_id" class="form-control"
                                                    disabled="disabled">
                                                <option
                                                    value=""><?php echo $single_applicant['course_name']; ?></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                               for="applicant_name"><?php echo $applicant_name; ?> <span
                                                class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                                            <input type="text" id="applicant_name" disabled="disabled"
                                                   name="applicant_name"
                                                   value="<?php echo $single_applicant['applicant_name']; ?>"
                                                   class="form-control col-md-7 col-xs-12"/>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                               for="applicant_father_name"><?php echo $applicant_father_name; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="applicant_father_name"
                                                   name="applicant_father_name" disabled="disabled"
                                                   value="<?php echo $single_applicant['applicant_father_name']; ?>"
                                                   class="form-control col-md-7 col-xs-12"/>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="applicant_date_of_birth"
                                               class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $applicant_date_of_birth; ?>
                                            <span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="applicant_date_of_birth"
                                                   class="date-picker form-control col-md-7 col-xs-12"
                                                   value="<?php echo $single_applicant['applicant_date_of_birth']; ?>"
                                                   type="text" name="applicant_date_of_birth" disabled="disabled"/>

                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                               for="applicant_NID"><?php echo $national_id_no; ?> <span
                                                class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="applicant_NID"
                                                   name="applicant_NID"
                                                   value="<?php echo $single_applicant['applicant_NID']; ?>"
                                                   class="form-control col-md-7 col-xs-12" disabled="disabled"/>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                               for="applicant_mobile"><?php echo $mobile_number; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="tel" id="applicant_mobile"
                                                   name="applicant_mobile"
                                                   value="<?php echo $single_applicant['applicant_mobile']; ?>"
                                                   class="form-control col-md-7 col-xs-12" disabled="disabled"/>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="applicant_village"><?php echo $village; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="applicant_village"
                                                   name="applicant_village"
                                                   value="<?php echo $single_applicant['applicant_village']; ?>"
                                                   disabled="disabled"
                                                   class="form-control col-md-7 col-xs-12"/>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="applicant_post_office"><?php echo $post_office; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="applicant_post_office"
                                                   name="applicant_post_office"
                                                   value="<?php echo $single_applicant['applicant_post_office']; ?>"
                                                   disabled="disabled" class="form-control col-md-7 col-xs-12"/>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="applicant_district_id"><?php echo $district; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="applicant_district_ids"
                                                    name="applicant_district_id" class="form-control" disabled="disabled">
                                                <option
                                                    value=""><?php echo $single_applicant['district_name']; ?></option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="applicant_subdistrict_id"><?php echo $union; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="applicant_subdistrict_ids"
                                                    name="applicant_subdistrict_id" class="form-control"
                                                    disabled>
                                                <option
                                                    value=""><?php echo $single_applicant['sub_district_name']; ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="userfile"><?php echo $your_photo; ?><span
                                                class="required">*</span><br/>

                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <img class="img-thumb" height="142px" width="114px"
                                                 src="<?php echo base_url(); ?>uploaded/applicants_photo/<?php echo $single_applicant['applicant_photo']; ?>"
                                                 alt="<?php echo $single_applicant['applicant_photo']; ?>"/>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <input type="hidden" value="1" name="finally_submitted"/>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="<?php echo base_url();?>" class="btn btn-primary"><?php echo $cancel; ?></a>
                                            <a href="<?php echo base_url(); ?>home/edit/applicant/data/<?php echo base64_encode($single_applicant['applicant_id']); ?>" class="btn btn-warning"><?php echo $edit; ?></a>
                                            <button id="send_submit_btn" type="submit" name="confirm_submit"
                                                    class="btn btn-success"><?php echo $confirmation; ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
            <!-- /page content -->