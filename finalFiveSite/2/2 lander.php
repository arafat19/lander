body {
  background: #222222;
}
.container-class {
  margin: 90px auto;
  background: #fff;
  width: 90%;
}
.padding-off {
  padding: 0;
}
.top-part {
  background: #F7F7F7 none repeat scroll 0 0;
  border-bottom: 2px solid #EEEEEE;
}
.top-left h2, .top-right h2 {
  margin: 0;
  padding: 15px 0;
  font-size: 24px;
}
.top-left h2 {
  color: #000;
}
.top-right h2 {
  color: #777674;
}
.img-part img {
  margin: 25px auto 10px;
}
.content-part h4 {
  font-size: 24px;
  line-height: 1.5;
  margin: 60px 0 20px 25px;
  color: #181818;
}
.glyphicon {
  background: #6ca4ff;
  border-radius: 5px;
  color: #fff;
  font-size: 170px;
  padding: 20px 30px;
}
.glyphicon:hover {
  background: #528ae6;
}
.glyphicon-ok {
  margin-right: 20px;
}
.glyphicon-remove {
  margin-left: 20px;
}
.img-part p {
  color: #6ca4ff;
  font-weight: bold;
}

.custom_btn{
    border: 0;
   cursor: pointer;
    font-size: 30px;
    width: 80%;
    min-width: 200px;
    padding: 20px 0;
    margin: 50px auto;
    border-radius: 4px;
    display: block;
    text-align: center;
}
/* Tablet Layout: 1024px. */
@media only screen and (min-width: 1201px) and (max-width: 1920px) {
  .glyphicon {
    font-size: 120px;
  }
  .img-part img {
    margin: 25px auto 10px;
    width: 90%;
  }
  .content-part h4 {
    margin: 60px 0 20px 80px;
  }
}
/* Tablet Layout: 1024px. */
@media only screen and (min-width: 1024px) and (max-width: 1200px) {
  .glyphicon {
    font-size: 120px;
  }
  .img-part img {
    margin: 25px auto 10px;
    width: 85%;
  }
}
/* Tablet Layout: 1024px. */
@media only screen and (min-width: 992px) and (max-width: 1024px) {
  .glyphicon {
    font-size: 120px;
  }
  .img-part img {
    margin: 25px auto 10px;
    width: 65%;
  }
  .img-part img {
    margin: 25px auto 10px;
    width: 80%;
  }
}
/* Tablet Layout: 768px. */
@media only screen and (min-width: 768px) and (max-width: 991px) {
  .top-left h2, .top-right h2 {
    font-size: 20px;
  }
  .content-part h4 {
    font-size: 22px;
  }
  .glyphicon {
    font-size: 60px;
  }
  .img-part img {
    margin: 25px auto 10px;
    width: 85%;
  }
}

@media only screen and (max-width: 767px) {
  .top-left h2, .top-right h2 {
    font-size: 16px;
    padding: 15px 20px;
    line-height: 10px;
  }
  .top-left h2 {
    padding-bottom: 5px;
  }
  .content-part h4 {
    font-size: 18px;
    margin: 15px 0 20px 25px;
  }
  .glyphicon {
    font-size: 48px;
    padding: 18px 25px;
  }
  .content-part {
    padding-bottom: 50px;
  }
}


<body>
  <div class="container container-class">
    <div class="row">
      <div class="col-xs-12 col-sm-12 padding-off ">
        <div class="top-part">
          <div class="row">
            <div class="col-xs-12 col-sm-6 padding-off ">
              <div class="top-left  text-center">
                <h2>#1 HOOKUP DATING SITE</h2>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 padding-off ">
              <div class="top-right  text-center">
                <h2>PLAYFUL MEMBERS ARE ONLINE</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="img-part  text-center">
          <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_images; ?>" class="img-responsive" alt="cli-img">
          <p class="figure-caption">Buddy Name</p>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="content-part">
          <h4>Hello<br>I'm looking for a fuck buddy,<br>are you interested?</h4>
          <ul class="list-inline text-center">
            <li><a href="#"><span class="popup-close glyphicon glyphicon-ok"></span></a></li>
            <li><a href="#"><span class="popup-close glyphicon glyphicon-remove"></span></a></li>
          </ul>
        </div>
        <div id="results" style="display:none;">
                     <?php
                    $final_url = $button_link_by_device_country['lander_last_btn_link_url'];
                    ?>
                    <a class="results btn btn-primary custom_btn" href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country['lander_last_btn_name']; ?></a>
                   
              <!-- <a href="#" class="results btn btn-primary okay_btn">ko</a> -->
            </div>
      </div>
    </div>
  </div>

  $(document).ready(function(){
    $(".popup-close").click(function(){
       $(".list-inline").fadeOut();
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
              } else { ?>
              {
                  src: "<?php echo base_url(); ?>images/SG1.jpg"
              },
               {
                  src: "<?php echo base_url(); ?>images/SG2.jpg"
              }
              <?php
              }
              ?>
          ]
      });
});