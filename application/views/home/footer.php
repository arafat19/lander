<!-- footer content -->
<div class="footer">
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
<!--<script src="--><?//= base_url() ?><!--js/jquery.min.js"></script>-->
<script src="<?php echo base_url();?>js/jquery-1.12.4.js"></script>
<!---->
<script src="<?php echo  base_url(); ?>js/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#applicant_date_of_birth" ).datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            yearRange: "-120:+0"

          /*  onSelect: function(date) {

                var dateSplit = date.split("-");
                var dob = new Date(dateSplit[1] + " " + dateSplit[0] + " " + dateSplit[2]);
                var today = new Date();
                if (dob.getFullYear() + 18 > today.getFullYear())
                {
                    alert("You must be atleast 18 years old.");
                    $(".dob").val("");
                }
            }*/
        });
    });
</script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>js/fastclick.js"></script>
<!-- NProgress -->
<script src="<?= base_url() ?>js/nprogress.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?= base_url() ?>js/validator.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= base_url() ?>js/custom.min.js"></script>
<!--<script src="--><?//= base_url() ?><!--js/bootstrap-datepicker.js"></script>-->

<script type="text/javascript">
    $(document).ready(function () {

        $('#applicant_district_ids').on("change", function () {
            var districtId = $(this).find('option:selected').val();
            $.ajax({
                url: "<?php echo base_url();?>home/show/applicant/sub/district",
                type: "POST",
                data: "districtId=" + districtId,
                success: function (response) {
                    console.log(response);
                    $("#applicant_subdistrict_ids").html(response);
                },
            });
        });

    });

</script>

<!-- validator -->
<script>
   /* $('#applicant_date_of_birth').datepicker({
        format: "dd/mm/yyyy"
    });*/

   /*$( function() {
       $( "#applicant_date_of_birth" ).datepicker({
           changeMonth: true,
           changeYear: true
       });
   } );*/

    // initialize the validator function
    validator.message.date = 'not a real date';

    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required').on('keyup blur', 'input', function () {
        validator.checkField.apply($(this).siblings().last()[0]);
    });


    $('form').submit(function (e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();

        /*jQuery.ajax({
         type: "POST",
         url: "home/application",
         dataType: 'json',
         data: $('#applicant_form').serialize(),
         success: function() {
         document.getElementById("step-3").style.display = 'block';
         $('#applicant_form')[0].reset();
         }
         });*/

        return false;
    });
</script>
<!-- /validator -->

<!--<script type="text/javascript" src="<?php /*echo base_url(); */ ?>js/moment-with-locales.min.js"></script>
<script src="<?php /*echo base_url(); */ ?>js/daterangepicker.js"></script>
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
<script type="text/javascript">
    $(document).ready(function () {
        n1 = Math.round(Math.random() * 10 + 1);
        n2 = Math.round(Math.random() * 10 + 1);
        $("#sum").html(n1 + " + " + n2);
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
                $('#msg_asum').html('<?php /*echo $form_validation_is_summation; */ ?>').show();
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

            $('#msg_asum').html('<?php /*echo $form_validation_required; */ ?>').show();
        }
    });


</script>-->

</body>
</html>