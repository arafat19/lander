<body>
<div class="container">
    <div class="row">
        <div class="blri-header-bar  centered">
            <div class="header content clearfix">
                <div class="logo logo-w" aria-label="Blri"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"><?php echo $login_title; ?></h1>
            <div class="account-wall">
                <div class="circle-mask">
                    <canvas id="canvas" class="circle"></canvas>
                </div>
                <?php if (validation_errors()) { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <a href="#" class="close" data-dismiss="alert"
                               aria-label="close">&times;</a>
                            <?php echo validation_errors(); ?>
                        </div>
                    </div>
                <?php }
                if ($this->session->flashdata('wrong_login_message')) { ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <a href="#" class="close" data-dismiss="alert"
                               aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('wrong_login_message'); ?>
                        </div>
                    </div>
                <?php } ?>
                <form class="form-signin" method="post">
                    <input class="form-control" placeholder="E-mail" name="email" type="email" id="email" value=""
                           pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                           required="required" autofocus>
                    <input type="password" class="form-control" id="password" name="password" value=""
                           pattern="^.*(?=.{6,})(((?=.*[a-z])(?=.*[A-Z])(?=.*[\d]))|((?=.*[a-z])(?=.*[A-Z])(?=.*[\W]))|((?=.*[a-z])(?=.*[\d])(?=.*[\W]))|((?=.*[A-Z])(?=.*[\d])(?=.*[\W]))).*$"
                           placeholder="Password" required
                           data-required-msg="Required"/>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Sign in
                    </button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">
                        Remember me
                    </label>
                    <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <!--<a href="#" class="text-center new-account">Create an account </a>-->
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>js/admin.js"></script>

</body>