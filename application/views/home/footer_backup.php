<!-- footer content -->
<div class="footer_fixed">
    <footer>
        <div class="pull-right">
            পরিকল্পনা ও বাস্তবায়নে:<?php echo ' ' . $title; ?>
        </div>
        <div class="clearfix"></div>
    </footer>
</div>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>js/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>js/nprogress.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?= base_url() ?>js/jquery.smartWizard.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>js/custom.min.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--js/admin.js" type="text/javascript"></script>-->

<script type="text/javascript" src="<?php echo base_url(); ?>js/moment-with-locales.min.js"></script>
<script src="<?php echo base_url(); ?>js/daterangepicker.js"></script>
<script>
    $(document).ready(function () {
        moment.locale('en');
        $('#applicant_date_of_birth').daterangepicker({
            format: "DD-MM-YYYY",
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });

        moment.locale('bn');
        $('#application_date').daterangepicker({
            format: "DD-MM-YYYY",
            singleDatePicker: true,
            calender_style: "picker_4"
        });
    });
</script>
<!-- jQuery Smart Wizard -->
<!--<script>
    $(document).ready(function () {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
            transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
    });
</script>-->
<!-- /jQuery Smart Wizard -->
<link href="<?php echo base_url(); ?>css/custom.css" rel="stylesheet">
<script src="<?= base_url() ?>js/jquery.smartWizard.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        n1 = Math.round(Math.random() * 10 + 1);
        n2 = Math.round(Math.random() * 10 + 1);
        $("#sum").html(n1 + " + " + n2);

        // Smart Wizard
        $('#wizard').smartWizard({
            onLeaveStep: leaveAStepCallback,
            onFinish: onFinishCallback
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');

        function leaveAStepCallback(obj) {
            var step_num = obj.attr('rel');
            return validateSteps(step_num);
        }

        function onFinishCallback() {
            if (validateAllSteps()) {
                jQuery.ajax({
                    type: "POST",
                    url: "home/application",
                    dataType: 'json',
                    data: $('#applicant_form').serialize(),
                    success: function() {
                        //alert('<?php //echo $form_submition_success; ?>');
                        //window.location="<?php //echo base_url(); ?>";
                        document.getElementById("step-3").style.display = 'block';
                        $('#applicant_form')[0].reset();
                    }
                });
               // return false;
            }
        }
    });

    function validateAllSteps() {
        var isStepValid = true;

        /*if(validateStep1() == false){
         isStepValid = false;
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:true});
         }else{
         $('#wizard').smartWizard('setError',{stepnum:1,iserror:false});
         }*/

        if (validateStep2() == false) {
            isStepValid = false;
            $('#wizard').smartWizard('setError', {stepnum: 2, iserror: true});
        } else {
            $('#wizard').smartWizard('setError', {stepnum: 2, iserror: false});
        }

        if (!isStepValid) {
            $('#wizard').smartWizard('showMessage', 'Please correct the errors in the steps and continue');
        } else {
            $('.msgBox').remove();
        }

        return isStepValid;
    }


    function validateSteps(step) {
        var isStepValid = true;
        // validate step 1
        /*if(step == 1){
         if(validateStep1() == false ){
         isStepValid = false;
         $('#wizard').smartWizard('showMessage','Please correct the errors in step'+step+ ' and click next.');
         $('#wizard').smartWizard('setError',{stepnum:step,iserror:true});
         }else{
         $('#wizard').smartWizard('setError',{stepnum:step,iserror:false});
         }
         }*/

        // validate step2
        if (step == 2) {
            if (validateStep2() == false) {
                isStepValid = false;
                $('#wizard').smartWizard('showMessage', 'Please correct the errors in step' + step + ' and click next.');
                $('#wizard').smartWizard('setError', {stepnum: step, iserror: true});
            } else {
                $('#wizard').smartWizard('setError', {stepnum: step, iserror: false});
            }
        }

        return isStepValid;
    }


    function validateStep2() {
        var isValid = true;
        var itemAn = $('#item_an');
        var itemAfn = $('#item_afn');
        var item_adb = $('#item_adb');
        var item_amn = $('#item_amn');
        var item_av = $('#item_avpo');
        var item_un_dis = $('#item_un_dis');
        var item_sum = $('#item_sum');

        // sum validation
        var asum = $('#applicant_sum').val();
        if (asum && asum.length > 0) {
            var summation = n1 + n2;
            if (asum != summation) {
                isValid = false;
                if (!item_sum.hasClass('bad')) {
                    item_sum.addClass('bad');
                }
                if ($("#asum_alert_box").find('#msg_asum').length == 0) {
                    $('#asum_alert_box').append('<span class="alert" id="msg_asum"></span>');
                }
                $('#msg_asum').html('<?php echo $form_validation_is_summation; ?>').show();
            } else {
                $('#msg_asum').html('').hide();
                if (item_sum.hasClass('bad')) {
                    item_sum.removeClass('bad');
                }
                $('#msg_asum').removeClass('alert');
                $('#asum_alert_box').find("span").remove();
            }
        } else {
            isValid = false;
            if (!item_sum.hasClass('bad')) {
                item_sum.addClass('bad');
            }
            if ($("#asum_alert_box").find('#msg_asum').length == 0) {
                $('#asum_alert_box').append('<span class="alert" id="msg_asum"></span>');
            }

            $('#msg_asum').html('<?php echo $form_validation_required; ?>').show();
        }

        // applicant name validation
        var an = $('#applicant_name').val();
        if (!an && an.length <= 0) {
            isValid = false;
            if (!itemAn.hasClass('bad')) {
                itemAn.addClass('bad');
            }
            if ($("#an_alert_box").find('#msg_an').length == 0) {
                $('#an_alert_box').append('<span class="alert" id="msg_an"></span>');
            }
            $('#msg_an').html('<?php echo $form_validation_required; ?>').show();
        } else {
            $('#msg_an').html('').hide();
            if (itemAn.hasClass('bad')) {
                itemAn.removeClass('bad');
            }
            $('#msg_an').removeClass('alert');
            $('#an_alert_box').find("span").remove();
        }

        // applicant father name validation
        var afn = $('#applicant_father_name').val();
        if (!afn && afn.length <= 0) {
            isValid = false;
            if (!itemAfn.hasClass('bad')) {
                itemAfn.addClass('bad');
            }
            if ($("#afn_alert_box").find('#msg_afn').length == 0) {
                $('#afn_alert_box').append('<span class="alert" id="msg_afn"></span>');
            }

            $('#msg_afn').html('<?php echo $form_validation_required; ?>').show();
        } else {
            $('#msg_afn').html('').hide();
            if (itemAfn.hasClass('bad')) {
                itemAfn.removeClass('bad');
            }
            $('#msg_afn').removeClass('alert');
            $('#afn_alert_box').find("span").remove();
        }

        // applicant village and P.O. name validation
        var av = $('#applicant_village').val();
        var avpo = $('#applicant_post_office').val();
        if ((!av && av.length <= 0) || (!avpo && avpo.length <= 0)) {
            isValid = false;
            if (!item_av.hasClass('bad')) {
                item_av.addClass('bad');
            }
            if ($("#avpo_alert_box").find('#msg_avpo').length == 0) {
                $('#avpo_alert_box').append('<span class="alert" id="msg_avpo"></span>');
            }
            $('#msg_avpo').html('<?php echo $form_validation_required_village_po; ?>').show();
        } else {
            $('#msg_avpo').html('').hide();
            if (item_av.hasClass('bad')) {
                item_av.removeClass('bad');
            }
            $('#msg_avpo').removeClass('alert');
            $('#avpo_alert_box').find("span").remove();
        }

        // applicant union and District name validation
        var asubdis = $('#applicant_subdistrict_id').val();
        var adis = $('#applicant_district_id').val();
        if ((!asubdis && asubdis.length <= 0) || (!adis && adis.length <= 0)) {
            isValid = false;
            if (!item_un_dis.hasClass('bad')) {
                item_un_dis.addClass('bad');
            }
            if ($("#un_dis_alert_box").find('#msg_un_dis').length == 0) {
                $('#un_dis_alert_box').append('<span class="alert" id="msg_un_dis"></span>');
            }
            $('#msg_un_dis').html('<?php echo $form_validation_required_un_dis; ?>').show();
        } else {
            $('#msg_un_dis').html('').hide();
            if (item_un_dis.hasClass('bad')) {
                item_un_dis.removeClass('bad');
            }
            $('#msg_un_dis').removeClass('alert');
            $('#un_dis_alert_box').find("span").remove();
        }


        // applicant date of birth validation
        var dateOfBirth = $('#applicant_date_of_birth').val();
        if (dateOfBirth && dateOfBirth.length > 0) {
            if (!isDate(dateOfBirth)) {
                isValid = false;
                if (!item_adb.hasClass('bad')) {
                    item_adb.addClass('bad');
                }
                if ($("#adb_alert_box").find('#msg_adb').length == 0) {
                    $('#adb_alert_box').append('<span class="alert" id="msg_adb"></span>');
                }
                $('#msg_adb').html('<?php echo $form_validation_is_date; ?>').show();
            } else {
                $('#msg_adb').html('').hide();
                if (item_adb.hasClass('bad')) {
                    item_adb.removeClass('bad');
                }
                $('#msg_adb').removeClass('alert');
                $('#adb_alert_box').find("span").remove();
            }
        } else {
            isValid = false;
            if (!item_adb.hasClass('bad')) {
                item_adb.addClass('bad');
            }
            if ($("#adb_alert_box").find('#msg_adb').length == 0) {
                $('#adb_alert_box').append('<span class="alert" id="msg_adb"></span>');
            }

            $('#msg_adb').html('<?php echo $form_validation_required; ?>').show();
        }

        // applicant mobile number validation
        var mobileNumber = $('#applicant_mobile').val();
        if (mobileNumber && mobileNumber.length > 0) {
            if (!isMobileNumber(mobileNumber)) {
                isValid = false;
                if (!item_amn.hasClass('bad')) {
                    item_amn.addClass('bad');
                }
                if ($("#amn_alert_box").find('#msg_amn').length == 0) {
                    $('#amn_alert_box').append('<span class="alert" id="msg_amn"></span>');
                }
                $('#msg_amn').html('<?php echo $form_validation_is_mobile_num; ?>').show();
            } else {
                $('#msg_amn').html('').hide();
                if (item_amn.hasClass('bad')) {
                    item_amn.removeClass('bad');
                }
                $('#msg_amn').removeClass('alert');
                $('#amn_alert_box').find("span").remove();
            }
        } else {
            isValid = false;
            if (!item_amn.hasClass('bad')) {
                item_amn.addClass('bad');
            }
            if ($("#amn_alert_box").find('#msg_amn').length == 0) {
                $('#amn_alert_box').append('<span class="alert" id="msg_amn"></span>');
            }

            $('#msg_amn').html('<?php echo $form_validation_required; ?>').show();
        }
        return isValid;
    }

    function isMobileNumber(mobileNumber) {
        var pattern = new RegExp(/^(?:\+?88)?01[15-9]\d{8}$/);
        return pattern.test(mobileNumber);
    }
    function isDate(dateOfBirth) {
        var pattern = new RegExp(/^([0-9]{2})-([0-9]{2})-([0-9]{4})$/);
        return pattern.test(dateOfBirth);
    }
    // Email Validation
    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }


</script>

</body>
</html>