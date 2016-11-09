<body>
<div class="container">
    <div class="modal-body">
        <div class="login-panel panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title align-left">Create User</h3>
                <h5 class="align-right">
                        <?php echo anchor('home/index/english', 'EN'); ?> |
                        <?php echo anchor('home/index/bn', 'BN'); ?>
                </h5>
            </div>
            <form name='userForm' id='userForm' enctype="multipart/form-data" class="form-horizontal form-widgets"
                  role="form" method="post">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-10">
                            <fieldset>
                                <?php if (validation_errors()) { ?>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                <a href="#" class="close" data-dismiss="alert"
                                                   aria-label="close">&times;</a>
                                                <?php echo validation_errors(); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>


                                <div class="form-group">
                                    <label class="col-md-3 control-label"
                                           for="applicant_name"><?php echo $applicant_name; ?>:</label>

                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="applicant_name"
                                               id="applicant_name"
                                               placeholder="<?php echo $applicant_name; ?>" required autofocus/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"
                                           for="applicant_father_name"><?php echo $applicant_father_name; ?>:</label>

                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="applicant_father_name"
                                               id="applicant_father_name"
                                               placeholder="<?php echo $applicant_father_name; ?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"
                                           for="applicant_mother_name"><?php echo $applicant_mother_name; ?>:</label>

                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="applicant_mother_name"
                                               id="applicant_mother_name"
                                               placeholder="<?php echo $applicant_mother_name; ?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"
                                           for="applicant_village_name"><?php echo $applicant_village_name; ?>:</label>

                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="applicant_village_name"
                                               id="applicant_village_name"
                                               placeholder="<?php echo $applicant_village_name; ?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"
                                           for="applicant_post_office_name"><?php echo $applicant_post_office_name; ?>
                                        :</label>

                                    <div class="col-md-7">
                                        <input type="text" class="form-control" name="applicant_post_office_name"
                                               id="applicant_post_office_name"
                                               placeholder="<?php echo $applicant_post_office_name; ?>" required/>
                                    </div>
                                </div>
                                <!--<div class="form-group">
                                    <label class="col-md-3 control-label" for="email">Email:</label>
                                    <div class="col-md-7">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email"
                                               pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                               required="required"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="password">Password:</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" id="password" name="password" value="arafat@123"
                                               pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                               placeholder="Letters,Numbers & Special Characters" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="confirm_password">Confirm Your Password:</label>
                                    <div class="col-md-7">
                                        <input type="password" class="form-control" id="confirm_password" value="arafat@123"
                                               name="confirm_password"
                                               pattern="^.*(?=.{8,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                               placeholder="Letters,Numbers & Special Characters" required oninput="check(this)"/>

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
                                <div class="form-group">
                                    <label class="col-md-3 control-label label-required" for="cell_number">Cell Number:</label>
                                    <div class="col-md-7">
                                        <input type="tel" class="form-control" id="cell_number" name="cell_number"
                                               pattern="[0][1-9]{4}[-][0-9]{6}"
                                               placeholder="Mobile Number (Format: 01XXX-XXXXXX)"/>
                                    </div>
                                </div>-->
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="panel-footer panel-info">

                    <button id="create" name="create" type="submit" data-role="button"
                            class="btn btn-submit btn-success"><span class="glyphicon glyphicon-plus"></span>Create
                    </button>

                    <button id="clearFormButton" name="clearFormButton" type="reset"
                            class="btn btn-submit btn-danger"><span class="glyphicon glyphicon-remove">Cancel
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>


<!-- Custom Theme JavaScript -->

<script src="<?php echo base_url(); ?>/js/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>js/admin.regis.js"></script>

<script>
    addEventListener('load', prettyPrint, false);
    $(document).ready(function () {
        $('pre').addClass('prettyprint linenums');
    });
</script>


</body>
