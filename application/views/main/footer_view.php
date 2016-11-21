<!-- jQuery -->
<script src="<?php echo base_url(); ?>js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>/js/lander_vegas.js"></script>
<script type="text/javascript">
    function clear_delay(timeoutID_here) {
        window.clearTimeout(timeoutID_here);
    }
    /* Run 1 */
    function run_loading_run_1(time_delay) {
        timeoutID1 = window.setTimeout(run_loading_1, time_delay);
    }

    function run_loading_1() {
        $('.thank_for_close, .run_loading_2').fadeIn();
        $('.main_review').hide();
    }
    /* Run 2 */
    function run_loading_run_2(time_delay) {
        timeoutID2 = window.setTimeout(run_loading_2, time_delay);
    }

    function run_loading_2() {
        $('.thank_for_close, .run_loading_2').hide();
        $('.run_loading_3, .li_run_loading_1, .li_run_loading_2').fadeIn();
    }
    /* Run 3 */
    function run_loading_run_3(time_delay) {
        timeoutID3 = window.setTimeout(run_loading_3, time_delay);
    }

    function run_loading_3() {
        $('.run_loading_3').hide();
        $('.run_loading_4, .li_run_loading_3').fadeIn();
    }
    /* Run 4 */
    function run_loading_run_4(time_delay) {
        timeoutID3 = window.setTimeout(run_loading_4, time_delay);
    }

    function run_loading_4() {
        $('.run_loading_4, .loading').hide();
        $('.li_run_loading_4, .li_run_loading_5, .run_loading_5, .show_end').fadeIn();
    }
    $(function () {
        $(document).on('click', '.next', function (e) {
            e.preventDefault();
            $(this).parent().hide().next().fadeIn();

        });
        $(document).on('click', '.run_loading', function (e) {
            e.preventDefault();
            $(this).parent().hide().next().fadeIn();
            $('.step4 .loading').show();
            run_loading_run_1('1000');
            run_loading_run_2('2250');
            run_loading_run_3('3000');
            run_loading_run_4('4000');

            window['optimizely'] = window['optimizely'] || [];
            window.optimizely.push(["", ""]);
        });
    });
    $(function () {

        $(".popup-close").on('click', function () {
            $("#sdil-lander-popup-wrapper").fadeOut();
            $('.radar_scanner').fadeIn(400, function () {
                $(this).delay(100).fadeOut(300, function () {
                    $("#popup2").fadeIn(300);
                });
            });
        });

        $(".ok").on('click', function () {
            $("#popup2").fadeOut();
            $(".step1").fadeIn();
        });

        $(".next").on('click', function () {
            $(this).parent().hide().next().fadeIn();
        });

        $(".steps-button").on('click', function () {
            $(this).parent().hide().next().fadeIn();
        });

        $(".option, .option1, .option2, .option3, .option4").on('click', function () {
            if ($(this).hasClass('selected'))
                $(this).removeClass('selected');
            else
            // if (.option.selected.length < 3) BUT .option has to be as first element in class="...
            if ($('.' + $(this).attr('class').split(' ')[0] + '.selected').length < 3)
                $(this).addClass('selected');
        });

        $(".steps-button-final").on('click', function () {
            $(".step8").fadeOut();
            $(".results").fadeIn();
        });
    });


    $("#example, body").vegas({
        delay: 3500,
        timer: false,
        shuffle: true,
        timer: true,
        transition: 'fade',
        transitionDuration: 3000,
        slides: [
            <?php
            if (isset($single_country_image_slider) && $single_country_image_slider->num_rows() > 0) {
                foreach ($single_country_image_slider->result() as $row): ?>
            {
                src: "<?php echo base_url(); ?>uploaded/lander_slider_images/<?php echo $row->lander_image_file_name; ?>"
            },
            <?php
                endforeach;
            }
            ?>
        ]
    });
</script>
</body>
</html>