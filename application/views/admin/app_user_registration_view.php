<body>
<div class="container">
    <form name='userForm' id='userForm' enctype="multipart/form-data" class="form-horizontal"
          role="form" method="post">
        <h2 class="text-center">BLRI Admin Registration</h2>
        <hr class="soften" />
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
                    <?php }
                    if ($this->session->flashdata('admin_regis_comp_message')) { ?>
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">
                                <a href="#" class="close" data-dismiss="alert"
                                   aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('admin_regis_comp_message'); ?>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Full Name:</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" id="name"
                                   placeholder="Full Name" required autofocus/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email">Email:</label>

                        <div class="col-md-7">
                            <input class="form-control" placeholder="Email" name="email" type="email"
                                   pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                   required="required"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password">Password:</label>

                        <div class="col-md-7">
                            <input type="password" class="form-control" id="password" name="password" minlength="6"
                                   pattern="^.*(?=.{6,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                                   placeholder="Letters,Numbers & Special Characters" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="confirm_password">Confirm Your
                            Password:</label>

                        <div class="col-md-7">
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
                    <div class="form-group">
                        <label class="col-md-3 control-label label-required" for="nid">National ID Number:</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" id="nid" name="nid"
                                   placeholder="Write your NID"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label label-required" for="cell_number">Cell
                            Number:</label>

                        <div class="col-md-7">
                            <input type="tel" class="form-control" id="cell_number" name="cell_number"
                                   pattern="[0][1-9]{4}[-][0-9]{6}"
                                   placeholder="Mobile Number (Format: 01XXX-XXXXXX)"/>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-10 col-sm-offset-3">

                <button id="create" name="create" type="submit" data-role="button"
                        class="btn btn-success">Register
                </button>

                <button id="clearFormButton" name="clearFormButton" type="reset"
                        class="btn  btn-danger">Cancel
                </button>
                <a class="btn btn-warning" href="<?php echo base_url()?>admin">Admin Login</a>
            </div>
        </div>
    </form>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>


</body>
