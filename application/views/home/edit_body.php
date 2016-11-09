<body class="nav-md">
<!--<script language="JavaScript">

    function ValidateFileUpload() {

        var fuData = document.getElementById('uploadBtn');
        var FileUploadPath = fuData.value;
        alert(FileUploadPath);


        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();



            if (Extension == "png" || Extension == "jpeg" || Extension == "jpg") {


                if (fuData.files && fuData.files[0]) {

                    var size = fuData.files[0].size;

                    if(size > 300){
                        alert("Maximum file size exceeds");
                        return;
                    }else{
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#blah').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(fuData.files[0]);
                    }
                }

            }


            else {
                alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
            }
        }}
</script>-->
<div class="container body">
    <div class="main_containerFull">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <!--<div class="page-title">
                    <div class="title_left">
                        <h3><?php /*echo $form_top_title; */?></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                        </div>
                    </div>
                </div>-->
                <div class="row headerArea">
                    <div class="col-md-2 col-xs-12"><img class="img-responsive avatar-view" src="<?php echo base_url();?>images/blri.png" alt="" title="" /></div>
                    <div class="col-md-10 col-xs-12"><h1><?php echo $title; ?></h1>
                        <hr />
                        <span><?php echo $site_address; ?></span>
                    </div>
                </div>
                <br />
                <div class="clearfix"></div>
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h3>
                                    <?php echo $online_application; ?>
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                if ($this->session->flashdata('applicant_sum_wrong')) { ?>
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong><?php echo $this->session->flashdata('applicant_sum_wrong'); ?></strong>
                                </div>
                                <?php }
                                if ($this->session->flashdata('applicant_create_failure_message')) { ?>
                                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('applicant_create_failure_message'); ?></strong>
                                    </div>
                                <?php }
                                if ($this->session->flashdata('applicant_create_success_message')) { ?>
                                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong><?php echo $this->session->flashdata('applicant_create_success_message'); ?></strong>
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
<!--                                <form class="form-horizontal form-label-left"  method="post" enctype="multipart/form-data" action="--><?php //echo base_url();?><!--home/submit_application" novalidate>-->
                                <form class="form-horizontal form-label-left"  method="post"  enctype="multipart/form-data" novalidate>
                                    <span class="section"><h4
                                            class=" text-center"><?php echo $application_for_training; ?></h4></span>
                                    <input type="hidden" value="<?php echo $answer?>" name="math_answer"/>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="applicant_subject_id"><?php echo $application_subject; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="applicant_subject_id"
                                                    name="applicant_subject_id" class="form-control"
                                                    required autofocus>
                                                <option
                                                    value=""><?php echo $application_subject . ' ' . $form_please_select; ?></option>
                                                <?php if (isset($all_courses) && $all_courses->num_rows() > 0):
                                                    foreach ($all_courses->result() as $row): ?>
                                                        <option
                                                            value="<?php echo $row->course_id ?>" <?php if($single_applicant['applicant_course_id'] == $row->course_id) echo 'selected'; ?>><?php echo $row->course_name; ?></option>
                                                        <?php
                                                    endforeach;
                                                endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                               for="applicant_name"><?php echo $applicant_name; ?> <span
                                                class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="applicant_name" required
                                                   name="applicant_name" value="<?php echo $single_applicant['applicant_name'];?>"
                                                   placeholder="<?php echo $applicant_name; ?>"
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
                                                   name="applicant_father_name" data-validate-length-range="6"
                                                   placeholder="<?php echo $applicant_father_name; ?>"
                                                   value="<?php echo $single_applicant['applicant_father_name'];?>"
                                                   class="form-control col-md-7 col-xs-12" required="required"/>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="applicant_date_of_birth"
                                               class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $applicant_date_of_birth; ?>
                                            <span class="required">*</span></label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="applicant_date_of_birth"
                                                   class="date-picker form-control col-md-7 col-xs-12"
                                                   value="<?php echo $single_applicant['applicant_date_of_birth'];?>"
                                                   placeholder="<?php echo $applicant_date_of_birth; ?>"
                                                   type="text" name="applicant_date_of_birth" required/>

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
                                                   value="<?php echo $single_applicant['applicant_NID'];?>"
                                                   placeholder="<?php echo $national_id_no; ?>"
                                                   class="form-control col-md-7 col-xs-12" required/>
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
                                                   value="<?php echo $single_applicant['applicant_mobile'];?>"
                                                   placeholder="<?php echo $mobile_number; ?>"
                                                   class="form-control col-md-7 col-xs-12" required/>
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
                                                   value="<?php echo $single_applicant['applicant_village'];?>"
                                                   placeholder="<?php echo $village; ?>"
                                                   required="required"
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
                                                   value="<?php echo $single_applicant['applicant_post_office'];?>"
                                                   placeholder="<?php echo $post_office; ?>"
                                                   required="required" class="form-control col-md-7 col-xs-12"/>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="applicant_district_id"><?php echo $district; ?>
                                            <span class="required">*</span>
                                        </label>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="applicant_district_ids"
                                                    name="applicant_district_id" class="form-control" required>
                                                <option
                                                    value=""><?php echo $district . ' ' . $form_please_select; ?></option>
                                                <?php if (isset($all_districts) && $all_districts->num_rows() > 0):
                                                    foreach ($all_districts->result() as $row): ?>
                                                        <option
                                                            value="<?php echo $row->district_id ?>" <?php if($single_applicant['applicant_district_id'] == $row->district_id) echo 'selected'; ?>><?php echo $row->district_name; ?></option>
                                                    <?php
                                                    endforeach;
                                                endif; ?>
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
                                                    required>
                                                <?php
                                                    if($single_applicant['applicant_subdistrict_id']){
                                                        $query = $this->db->query("SELECT sub_district_id, sub_district_name FROM blri_sub_district WHERE district_id=".$single_applicant['district_id']);
                                                        foreach ($query->result() as $row): ?>
                                                            <option value="<?php echo $row->sub_district_id; ?>" <?php if($single_applicant['applicant_subdistrict_id'] == $row->sub_district_id) echo 'selected'; ?>><?php echo $row->sub_district_name; ?></option>
                                                <?php
                                                        endforeach;
                                                }
                                                ?>
                                                <!--<option value=""><?php /*echo $union . ' ' . $form_please_select; */?></option>
                                                <?php /*if (isset($all_sub_districts) && $all_sub_districts->num_rows() > 0):
                                                    foreach ($all_sub_districts->result() as $row): */?>
                                                        <option
                                                            value="<?php /*echo $row->sub_district_id */?>"><?php /*echo $row->sub_district_name; */?></option>
                                                        --><?php
/*                                                    endforeach;
                                                endif; */?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                               for="userfile"><?php echo $attach_photo; ?><span class="required">*</span><br/>
                                            <small>(<?php echo $image_size_restrict_text; ?>)</small>

                                        </label>

                                        <div class=<?php if ($single_applicant['applicant_photo']) echo "col-md-3 col-sm-3"; else echo "col-md-6 col-sm-6";?> col-xs-12">
                                            <input id="uploadBtn" name="userfile" type="file"
                                                   title="Allowed dimension: 300 Kb"
                                                   class="form-control col-md-7 col-xs-12" <?php if (!$single_applicant['applicant_photo']) echo "required"; ?>/>
                                        </div>
                                        <?php if ($single_applicant['applicant_photo']) { ?>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <img class="img-thumb" height="142px" width="114px"
                                                     src="<?php echo base_url(); ?>uploaded/applicants_photo/<?php echo $single_applicant['applicant_photo']; ?>"
                                                     alt="<?php echo $single_applicant['applicant_photo']; ?>"/>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="item form-group" id="item_sum">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                               for="applicant_sum"><?php echo $info_security; ?>
                                            <span class="required">*</span>
                                        </label>
                                        <label class="control-label col-md-1 col-sm-1 col-xs-12"
                                               for="applicant_sum">
                                            <!--<span id="sum"></span>-->
                                            <span><?php echo $math; ?></span>
                                        </label>
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <input type="number" id="applicant_sum"
                                                   name="applicant_sum" value="<?php //echo $answer; ?>"
                                                   placeholder="<?php echo $write_info_security; ?>"
                                                   class="form-control col-md-7 col-xs-12" required/>
                                        </div>
                                        <div id="asum_alert_box">
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="<?php echo base_url();?>" class="btn btn-primary"><?php echo $cancel; ?></a>
                                            <button id="send_submit_btn" type="submit" class="btn btn-success"><?php echo $submit; ?></button>
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