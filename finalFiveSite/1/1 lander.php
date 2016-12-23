body {
background: #202020;
}

.client-part {
margin: 30px auto;
width: 80%;
}
.snaphead h6 {
background: #333 none repeat scroll 0 0;
color: #ff0000;
margin: 0;
padding: 15px 0;
}
.snaphead span {
color: #fff;
font-size: 16px;
font-weight: bold;
line-height: 1.5;
position: relative;
}
.snaphead span::before {
content: url("../images/icon.png");
left: -35px;
top: -7px;
position: absolute;
}
.snapbody {
background: #EFEC80;
padding-bottom: 220px;
}
.snapbody h2 {
color: #000;
font-weight: bold;
margin: 0;
padding: 15px 0;
}
.snapbody h4 {
margin: 15px 0;
}
.snapbody span {
color: #ED0A5F;
font-weight: bold;
}
.snapbody img {
width: 25%;
margin: 0 auto;
border: 2px solid #ddd;
border-radius: 15px;
}
.custom-btn {
padding: 10px 0;
width: 50%;
background: #29ACE0;
color: #fff;
font-weight: bold;
font-size: 20px;
border: 0px;
}
.custom-btn:hover {
background: #00BFF3;
}
@media only screen and (max-width: 767px) {
.snapbody {
background: #EFEC80;
padding-bottom: 18px;
}
.snapbody img {
width: 40%;
}
.custom-btn {
padding: 8px 0;
width: 80%;
}
.client-part {
margin: 5px auto;
width: 80%;
}
}
@media only screen and (min-width: 320px) and (max-width: 480px) {
.snapbody h2 {
font-size: 16px;
}
.snapbody h4 {
font-size: 15px;
line-height: 1.5;
}
.snapbody img {
width: 70%;
}
.client-part {
margin: 5px auto;
width: 80%;
}
}


<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="client-part  text-center">
                <div class="snaphead">
                    <h6><span>SnapSex</span></h6>
                </div>
                <div class="snapbody text-center">
                    <h2>This is NOT a dating site!</h2>
                    <img
                        src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_images['lander_theme_image_file_name']; ?>"
                        alt="top-img" class="img-responsive">
                    <h4><span>WARNING!</span> You will nude photos. Please be discreet.</h4>

                    <div id="test">
                        <div id="sdil-lander-popup-wrapper">
                            <button class="popup-close btn btn-success custom-btn">OK</button>
                        </div>
                    </div>
                    <div id="results" style="display:none;">
                        <a href="#" class="results btn btn-danger custom-btn">ko</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


$(document).ready(function(){
$(".popup-close").click(function(){
$("#sdil-lander-popup-wrapper").fadeOut();
$("#results").fadeIn();
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
});
