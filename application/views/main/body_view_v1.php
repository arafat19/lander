<body>
<div id="pageBackground">
    <?php
    if ($not_enabled) { ?>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong><?php echo $not_enabled; ?></strong>
    </div>
    <?php } ?>

    <div id="sdil-lander-popup-wrapper">
        <div id="popup" class="sdil-lander-popup_alert">
            <div class="top"></div>
            <div class="alert_icon"></div>
            <div class="copy_area">
                <h5><?php echo $full_name; ?> 43 wants to share her nude private pictures with you.</h5>
                <p>Do you accept?</p>
                <button class="navbtn popup-close"><span>YES</span>
                </button>
                <button class="navbtn popup-close"><span>NO</span>
                </button>
            </div>
        </div>
    </div>
    <div class="radar_scanner hidden">
    </div>
</div>

<div class="wrapper">
    <div id="final" class="results marker_show hidden">
        <h3 class="boxheader">Thank you.</h3>
        <div class="box_copy">You may now see our list and photos of women who are in your area. Again, please keep
            their identity a secret.
            <p>Click on the "Continue" button and search on the basis of your answers.</p>
            <!------------------------------------------------------
              ------------------------------------------------------
                Code block for device detection - start
              ------------------------------------------------------
              -------------------------------------------------------->
            <?php
            $final_url = $button_link_by_device_country['lander_last_btn_link_url'];
            ?>
            <a class="steps-button-agree buttons" href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country['lander_last_btn_name']; ?></a>
            <!------------------------------------------------------
              ------------------------------------------------------
                Code block for device detection - End
              ------------------------------------------------------
              -------------------------------------------------------->
        </div>
    </div>
</div>