<body class="nav-md">
<script language="JavaScript">
    function name_create() {
        var f1 = document.getElementById("applicant_name");
        var f2 = document.getElementById("applicant_signature");

        f2.value = f1.value;
    }
</script>
<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3><?php echo $form_top_title; ?></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>
                                    <?php echo $online_application; ?>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form class="form-horizontal form-label-left" id="applicant_form" method="POST">
                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps">
                                            <li>
                                                <a href="#step-1">
                                                    <span class="step_no"><?php echo $one; ?></span>
                                                    <span class="step_descr">
                                                      <?php echo $step . ' ' . $one; ?><br/>
                                                      <strong><?php echo $instructions; ?></strong>
                                                </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-2">
                                                    <span class="step_no"><?php echo $two; ?></span>
                                                    <span class="step_descr">
                                                  <?php echo $step . ' ' . $two; ?><br/>
                                                      <strong><?php echo $application.' '.$submit; ?></strong>
                                                </span>
                                                </a>
                                            </li>
                                            <!--<li>
                                            <a href="#step-3">
                                                <span class="step_no"><?php /*echo $three; */ ?></span>
                                                <span class="step_descr">
                                                    <?php /*echo $step . ' ' . $three; */ ?><br/>
                                                    <strong><?php /*echo $submit; */ ?></strong>
                                                </span>
                                            </a>
                                        </li>-->
                                            <!--<li>
                                            <a href="#step-4">
                                                <span class="step_no"><?php /*echo $four; */ ?></span>
                                                <span class="step_descr">
                                              <?php /*echo $step . ' ' . $four; */ ?><br/>
                                              <strong><?php /*echo $confirmation; */ ?></strong>
                                          </span>
                                            </a>
                                        </li>-->
                                        </ul>
                                        <br/>

                                        <div id="step-1" class="step1">
                                            <h2 class="text-center"><?php echo $rules_of_application_submission; ?></h2>

                                            <div
                                                class="step1_text"> <?php echo $rules_for_submit_application_form; ?></div>
                                        </div>
                                        <div id="step-2" class="step2_text">
                                                <div class="step-3" id="step-3">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="alert alert-success" role="alert">
                                                                <a href="<?php echo base_url(); ?>" class="close" data-dismiss="alert"
                                                                   aria-label="close">&times;</a>
                                                                <?php echo $form_submition_success; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <h4 class=" text-center"><?php echo $application_for_training; ?></h4>

                                            <div class="row">
                                                <div class="col-md-1 col-xs-2 col-sm-1"><?php echo $to; ?>,</div>
                                                <div class="col-md-11 col-xs-10 col-sm-11"></div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-md-2 col-xs-2 col-sm-2"><?php echo $department_head; ?></div>
                                                <div class="col-md-10 col-xs-10 col-sm-10"></div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-md-11 col-xs-10 col-sm-11"><?php echo $department_name; ?></div>
                                                <div class="col-md-1 col-xs-2 col-sm-1"></div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-md-11 col-xs-10 col-sm-11"><?php echo $department_address; ?></div>
                                                <div class="col-md-1 col-xs-2 col-sm-1"></div>
                                            </div>

                                            <div class="row">
                                                <br/>

                                                <div class="col-md-1 col-xs-2 col-sm-3">
                                                    <span class=""><?php echo $application_subject_cap; ?>:</span>
                                                </div>
                                                <div class="col-md-4 col-xs-7 col-sm-6">
                                                    <select id="heard" class="form-control" required>
                                                        <!--<option value="">-->
                                                        <?php ////echo $application_subject_cap . ' ' . $form_please_select; ?><!--</option>-->
                                                        <option value="press">Press</option>
                                                        <option value="net">Internet</option>
                                                        <option value="mouth">Word of mouth</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7 col-xs-3 col-sm-3">
                                                    <strong><?php echo $application_subject_cap_cont; ?></strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-xs-12 col-sm-12"><?php echo $sir; ?>,</div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="col-md-12 col-xs-12 col-sm-12"><?php echo $application_headline; ?></div>
                                            </div>
                                            <br/>

                                            <div class="item form-group" id="item_an">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="applicant_name"><?php echo $applicant_name; ?> <span
                                                        class="required">*</span>
                                                </label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="applicant_name" required
                                                           name="applicant_name" onblur="name_create()"
                                                           placeholder="<?php echo $applicant_name; ?>"
                                                           class="form-control col-md-7 col-xs-12" autofocus/>
                                                </div>
                                                <div id="an_alert_box">
                                                </div>
                                            </div>
                                            <div class="item form-group" id="item_afn">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="applicant_father_name"><?php echo $applicant_father_name; ?>
                                                    <span class="required">*</span>
                                                </label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="applicant_father_name"
                                                           name="applicant_father_name" data-validate-length-range="6"
                                                           data-validate-words="2"
                                                           placeholder="<?php echo $applicant_father_name; ?>"
                                                           class="form-control col-md-7 col-xs-12" required="required"/>
                                                </div>
                                                <div id="afn_alert_box">
                                                </div>
                                            </div>
                                            <div class="item form-group" id="item_adb">
                                                <label for="applicant_date_of_birth"
                                                       class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $applicant_date_of_birth; ?>
                                                    <span class="required">*</span></label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input id="applicant_date_of_birth"
                                                           class="date-picker form-control col-md-7 col-xs-12"
                                                           placeholder="<?php echo $applicant_date_of_birth; ?>"
                                                           type="text" name="applicant_date_of_birth" required/>

                                                </div>
                                                <div id="adb_alert_box">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="applicant_NID"><?php echo $national_id_no; ?>
                                                </label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="applicant_NID"
                                                           name="applicant_NID"
                                                           placeholder="<?php echo $national_id_no; ?>"
                                                           class="form-control col-md-7 col-xs-12"/>
                                                </div>
                                            </div>
                                            <div class="item form-group" id="item_amn">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                       for="applicant_mobile"><?php echo $mobile_number; ?>
                                                    <span class="required">*</span>
                                                </label>

                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="text" id="applicant_mobile"
                                                           name="applicant_mobile"
                                                           placeholder="<?php echo $mobile_number; ?>"
                                                           class="form-control col-md-7 col-xs-12" required/>
                                                </div>
                                                <div id="amn_alert_box">
                                                </div>
                                            </div>
                                            <div class="item form-group" id="item_avpo">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                                       for="applicant_village"><?php echo $village; ?>
                                                    <span class="required">*</span>
                                                </label>

                                                <div class="col-md-2 col-sm-3 col-xs-6">
                                                    <input type="text" id="applicant_village"
                                                           name="applicant_village"
                                                           placeholder="<?php echo $village; ?>"
                                                           required="required"
                                                           class="form-control col-md-6 col-xs-12"/>
                                                </div>

                                                <label class="control-label col-md-2 col-sm-3 col-xs-6"
                                                       for="applicant_post_office"><?php echo $post_office; ?>
                                                    <span class="required">*</span>
                                                </label>

                                                <div class="col-md-2 col-sm-3 col-xs-6">
                                                    <input type="text" id="applicant_post_office"
                                                           name="applicant_post_office"
                                                           placeholder="<?php echo $post_office; ?>"
                                                           required="required" class="form-control col-md-6 col-xs-12"/>
                                                </div>
                                                <div id="avpo_alert_box">
                                                </div>
                                            </div>

                                            <div class="item form-group" id="item_un_dis">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-6"
                                                       for="applicant_subdistrict_id"><?php echo $union; ?>
                                                    <span class="required">*</span>
                                                </label>

                                                <div class="col-md-2 col-sm-3 col-xs-6">
                                                    <select id="applicant_subdistrict_id"
                                                            name="applicant_subdistrict_id" class="form-control"
                                                            required>
                                                        <option
                                                            value=""><?php echo $union . ' ' . $form_please_select; ?></option>
                                                        <option value="আমতলী ">আমতলী</option>
                                                        <option value="বামনা ">বামনা</option>
                                                        <option value="বরগুনা সদর ">বরগুনা সদর</option>
                                                        <option value="বেতাগী ">বেতাগী</option>
                                                        <option value="পাথরঘাটা ">পাথরঘাটা</option>
                                                        <option value="তালতলি ">তালতলি</option>
                                                    </select>

                                                </div>
                                                <label class="control-label col-md-2 col-sm-3 col-xs-6"
                                                       for="applicant_district_id"><?php echo $district; ?>
                                                    <span class="required">*</span>
                                                </label>

                                                <div class="col-md-2 col-sm-3 col-xs-6">
                                                    <select id="applicant_district_id"
                                                            name="applicant_district_id" class="form-control" required>
                                                        <option
                                                            value=""><?php echo $district . ' ' . $form_please_select; ?></option>
                                                        <option value="বরগুনা">বরগুনা</option>
                                                        <option value="বরিশাল">বরিশাল</option>
                                                        <option value="ভোলা">ভোলা</option>
                                                        <option value="ঝালকাঠি">ঝালকাঠি</option>
                                                        <option value="পটুয়াখালী ">পটুয়াখালী</option>
                                                        <option value="পিরোজপুর ">পিরোজপুর</option>
                                                        <option value="বান্দরবান">বান্দরবান</option>
                                                        <option value="ব্রাহ্মণবাড়িয়া">ব্রাহ্মণবাড়িয়া</option>
                                                        <option value="চাঁদপুর">চাঁদপুর</option>
                                                        <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                                                    </select>

                                                </div>
                                                <div id="un_dis_alert_box">
                                                </div>
                                            </div>


                                            <br/>
                                            <br/>

                                            <div class="row">
                                                <div class="form-group form-md-line-input has-danger">
                                                    <div
                                                        class="col-md-12 col-xs-12 col-sm-12"><?php echo $application_footer; ?></div>
                                                </div>
                                            </div>
                                            <br/>
                                            <br/>

                                            <div class="row form-group form-md-line-input">
                                                <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">
                                                    <div class="col-md-4 col-lg-3 col-xs-12 col-sm-6">
                                                        <?php echo $date; ?>:
                                                    </div>
                                                    <div class="col-md-8 col-lg-9 col-xs-12 col-sm-6">
                                                        <div class="form-group">
                                                            <div class="input-group ">
                                                                <input id="application_date"
                                                                       class="date-picker form-control col-md-7 col-xs-12"
                                                                       placeholder=""
                                                                       type="text" name="application_date">
                                                                <span class="input-group-addon hidden-print"
                                                                      style="background-color:  #e6f7ff">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5 col-sm-4 col-lg-4 col-xs-12"></div>
                                                <div class="col-md-3 col-sm-4 col-lg-4 col-xs-12 text-center">
                                                    <?php echo $respectful . ' ' . $yours; ?>
                                                    <br> <?php echo $applicant_signature; ?>
                                                    <div class="form-group">
                                                        <input
                                                            class="no-wrap form-control input-inline input-sm same_name"
                                                            id="applicant_signature"
                                                            placeholder="<?php echo $applicant_name; ?>" name=""
                                                            type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <br/>
                                            <br/>
                                            <div class="item form-group" id="item_sum">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <label class="control-label col-md-5 col-sm-5 col-xs-12"
                                                           for="applicant_sum"><?php echo $info_security; ?>
                                                        <span class="required">*</span>
                                                    </label>


                                                    <label class="control-label col-md-1 col-sm-1 col-xs-12"
                                                           for="applicant_sum">
                                                        <span id="sum"></span>
                                                    </label>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <input type="text" id="applicant_sum"
                                                               name="applicant_sum"
                                                               placeholder="<?php //echo $mobile_number; ?>"
                                                               class="form-control col-md-7 col-xs-12" required/>
                                                    </div>
                                                    <div id="asum_alert_box">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--<div id="step-4">
                                            <h2 class="StepTitle">Step 4 Content</h2>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat.
                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                dolore
                                                eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                proident,
                                                sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </p>

                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis aute irure dolor
                                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                qui
                                                officia deserunt mollit anim id est laborum.
                                            </p>

                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis aute irure dolor
                                                in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                qui
                                                officia deserunt mollit anim id est laborum.
                                            </p>
                                        </div>-->

                                    </div>
                                </form>
                                <!-- End SmartWizard Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->