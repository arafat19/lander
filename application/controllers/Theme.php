<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/28/16
 * Time: 2:08 PM
 */

class theme {
    public static $theme_name = array('Snap', 'HookUp', 'Light Peru', 'Pink Careful', 'Hot Offwhite');
    public static $theme_color = array('#453939', '#6ca4ff', '#e9895f', '#ed095f', '#f2dfdf');
    public static $theme_js = array(
        '$(document).ready(function(){
            $(".popup-close").click(function(){
               $("#sdil-lander-popup-wrapper").fadeOut();
                     $("#results").fadeIn();
            });

           $("#example, body").vegas({
                delay: 3500,
                shuffle: true,
                timer: true,
                transition: "fade",
                transitionDuration: 3000,
                align: "top",
                slides: [
                    <?php
                    if (isset($single_country_image_slider) && $single_country_image_slider->num_rows() > 0) {
                        foreach ($single_country_image_slider->result() as $row): ?>
                    {
                        src: "<?php echo base_url(); ?>uploaded/lander_slider_images/<?php echo $row->lander_image_file_name; ?>"
                    },
                    <?php
                        endforeach;
                    } else {  ?>
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
        });',

        '$(document).ready(function(){
            $(".popup-close").click(function(){
               $(".list-inline").fadeOut();
                     $("#results").fadeIn();
            });
             $("#example, body").vegas({
                  delay: 3500,
                  timer: false,
                  shuffle: true,
                  timer: true,
                  transition: "fade",
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
        });',

        '$(document).ready(function(){
                $(".popup-close").click(function(){
                   $(".ques").fadeOut();
                         $("#results").fadeIn();
                });
                 $("#example, body").vegas({
                      delay: 3500,
                      timer: false,
                      shuffle: true,
                      timer: true,
                      transition: "fade",
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
            });',
        '$(document).ready(function(){
            $(".popup-close").click(function(){
                $(".list-inline").fadeOut();
                $("#results").fadeIn();
            });
        });',

        '$(document).ready(function(){
            $(".popup-close").click(function(){
                $("#sdil-lander-popup-wrapper").fadeOut();
                $("#results").fadeIn();
            });
        });'
    );
    public static $theme_css = array(
                        'body {
                  background: #202020;
                 background-size: auto;
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
                  content: url("<?php echo base_url(); ?>/images/icon.png");
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
                }',

            'body {
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
            }',
        'body {
          background: #222;
        }
        .container-width {
          width: 90%;
          margin: 50px auto;
          background: #000;
          padding-bottom: 100px;
        }
        .image-part img {
          border: 10px solid #fff;
          border-radius: 5px;
          margin: 20px auto 0;
        }
        .ques-part {
          background: #fff;
          padding: 15px;
          border-radius: 3px;
          line-height: 1.5;
          margin-top: 30px;
        }
        .content-part h2 {
          color: #E9895F;
          line-height: 1.5;
          font-size: 28px;
        }
        .content-part h6 {
          color: #fff;
          line-height: 1.5;
          text-align: left;
        }
        .content-part p {
          color: #82724A;
          text-align: left;
          font-size: 13px;
          line-height: 1.5;
        }
        .content-part span {
          color: #E9895F;
        }
        .ques-part h3 {
          font-weight: bold;
          font-size: 22px;
        }
        .ques-part span {
          color: #E9895F;
          font-size: 28px;
        }
        .yes-btn, .no-btn, .custom_btn {
          padding: 10px 0;
          width: 100%;
          margin: 5px 0;
          background: #E9895F;
          border: 0px;
          color: #fff;
          font-weight: bold;
          font-size: 20px;
        }
        .yes-btn:hover, .no-btn:hover, .custom_btn:hover {
          background: #E09156;
        }
        /* Tablet Layout: 1024px. */
        @media only screen and (min-width: 992px) and (max-width: 1024px) {
          .container-width {
            width: 90%;
          }
          .content-part h2 {
            font-size: 26px;
          }
          .ques-part h3 {
            font-size: 18px;
          }
          .ques-part span {
            font-size: 22px;
          }
        }
        /* Tablet Layout: 768px. */
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .container-width {
            width: 90%;
          }
          .content-part h2 {
            font-size: 22px;
          }
          .ques-part h3 {
            font-size: 16px;
          }
          .ques-part span {
            font-size: 18px;
          }
        }
        @media only screen and (max-width: 767px) {
          .container-width {
            width: 90%;
          }
          .content-part h2 {
            font-size: 23px;
          }
          .ques-part h3 {
            font-size: 18px;
            line-height: 1.5;
          }
          .ques-part span {
            font-size: 22px;
          }
            .yes-btn {
                padding: 8px 0;
                width: 100%;
            }
        }',
        'body {
          background: #202020;
        }
        .container-img  {
          background: url(<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[\'lander_theme_image_file_name\'] ?$lander_theme_parameters[\'lander_theme_image_file_name\'] : \'blank_person.png\'; ?>) no-repeat;
          background-size:cover;
          margin: 48px auto;
        }
        .sitebody {
          background: #000;
          margin: 90px auto;
          opacity: 0.8;
          width: 43%;
        }
        .top-part {

        }
        .top-part h2 {
          margin: 0;
          padding-top: 30px;
          color: #ED01A7;
        }
        .top-part h4{
          font-size:24px;
          margin: 0;
          padding: 15px 30px;
          color: #fff;
        }
        .top-part p {
          color: #fff;
          padding: 0 30px;
        }
        .question-part {
          padding-bottom: 20px;
        }
        .question-part h3 {
          color: #fff;
        }
        .question-part p {
          color: #fff;
        }
        /* Tablet Layout: 1024px. */
        @media only screen and (min-width: 992px) and (max-width: 1024px) {
          .sitebody {
            width: 53%;
          }
        }
        /* Tablet Layout: 768px. */
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .sitebody {
            width: 60%;
          }
        }
        @media only screen and (max-width: 767px) {
          .sitebody {
            width: 80%;
          }
        }
        @media only screen and (min-width: 320px) and (max-width: 480px) {
          .sitebody {
            width: 100%;
          }
        }',
        'body {
          background: #202020;
        }
        .container-img  {
          background: url(<?php echo base_url(); ?>images/fourbg.jpg) no-repeat;
          background-size:cover;
          margin: 0px auto;
        }
        .client-part {
          margin: 50px auto;
          width: 57%;
          background-color:rgba(255,255,255,0.9);
          padding: 20px;
        }
        .client-part img {
          width: 50%;
          margin: 0 auto;
        }
        .client-part h4 {
          color: #000;
          font-size: 24px;
          font-weight: bold;
          line-height: 1.3;
          margin: 0;
          padding: 10px 0;
        }
        .custom-btn {
            padding: 10px 0;
            width: 100%;
            background: #15ACA3;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
            border: 0px;
          }
          .custom-btn:hover {
            background: #189F97;
          }
          /* Tablet Layout: 1024px. */
        @media only screen and (min-width: 992px) and (max-width: 1024px) {
          .client-part {
            width: 75%;
          }
        }
          /* Tablet Layout: 768px. */
        @media only screen and (min-width: 768px) and (max-width: 991px) {
          .client-part {
            width: 75%;
          }
        }
        @media only screen and (max-width: 767px) {
            .client-part {
            width: 90%;
          }
        }
        @media only screen and (min-width: 320px) and (max-width: 480px) {
          .client-part {
            width: 100%;
          }
          .client-part h4 {
            font-size: 22px;
          }
        }'
    );
    public static $theme_html = array(
        '<body>
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="client-part  text-center">
                  <div class="snaphead">
                    <h6><span>SnapSex</span></h6>
                  </div>
                  <div class="snapbody text-center">
                    <h2>This is NOT a dating site!</h2>
                    <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[\'lander_theme_image_file_name\'] ?$lander_theme_parameters[\'lander_theme_image_file_name\'] : \'blank_person.png\'; ?>" alt="top-img" class="img-responsive">
                    <h4><span>WARNING!</span> You will nude photos. Please be discreet.</h4>
                    <div id="test">
                      <div id="sdil-lander-popup-wrapper">
                        <button  class="popup-close btn btn-success custom-btn">OK</button>
                      </div>
                    </div>
                    <div id="results" style="display:none;">
                      <?php
                    $final_url = $button_link_by_device_country[\'lander_last_btn_link_url\'] ;
                    ?>
                    <a class="results btn btn-danger custom-btn" href="<?php echo $final_url; ?>">
                    <?php echo $button_link_by_device_country[\'lander_last_btn_name\']; ?></a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>',

        '<body>
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
                             <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[\'lander_theme_image_file_name\'] ?$lander_theme_parameters[\'lander_theme_image_file_name\'] : \'blank_person.png\'; ?>" alt="top-img" class="img-responsive">
                            <p class="figure-caption">Buddy Name</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="content-part">
                            <h4>Hello<br>Im looking for a fuck buddy,<br>are you interested?</h4>
                            <ul class="list-inline text-center">
                                <li><a href="#"><span class="popup-close glyphicon glyphicon-ok"></span></a></li>
                                <li><a href="#"><span class="popup-close glyphicon glyphicon-remove"></span></a></li>
                            </ul>
                        </div>
                        <div id="results" style="display:none;">
                                                 <?php
                                    $final_url = $button_link_by_device_country[\'lander_last_btn_link_url\'];
                                    ?>
        <a class="results btn btn-primary custom_btn" href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country[\'lander_last_btn_name\']; ?></a>

        <!-- <a href="#" class="results btn btn-primary okay_btn">ko</a> -->
        </div>
        </div>
        </div>
        </div>',

        '<body>
            <div class="container container-width">
                <div class="row">
                    <div class="col-sm-6 col-md-5 col-md-offset-1 col-xs-12">
                        <div class="image-part  text-center">
                             <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[\'lander_theme_image_file_name\'] ?$lander_theme_parameters[\'lander_theme_image_file_name\'] : \'blank_person.png\'; ?>" alt="top-img" class="img-responsive" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-5 col-xs-12">
                        <div class="content-part  text-center">
                            <h2>THIS SITE IS LIKELY TO CONTAIN PRIVATE PHOTOS OF SOMEONE YOU NOW</h2>
                            <h6>We have 36 female members within <span>10 miles of your location.</span> These women are ONLY looking for long-term relationships.</h6>
                            <p>You are luckyly; at the moment registration for men is open for another <span>few seconds.</span> All we ask from you is to answer 3 simple questions in order to see if you quality for our exclusive website.<br> Good luck!</p>
                        </div>
                        <div class="ques-part">
                            <h3><span>Question 1:</span> Are you older than 24?</h3>
                            <div class="ques">
                                <a href="#" class="popup-close btn btn-success yes-btn">YES</a>
                                <a href="#" class="popup-close btn btn-success no-btn">NO</a>
                            </div>


                            <div id="results" style="display:none;">
                                                 <?php
                                    $final_url = $button_link_by_device_country[\'lander_last_btn_link_url\'];
                                    ?>
            <a class="results btn btn-success custom_btn" href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country[\'lander_last_btn_name\']; ?></a>

            <!-- <a href="#" class="results btn btn-success custom_btn">ko</a> -->
        </div>
        </div>
        </div>
        </div>
        </div>',

        '<body>
            <div class="container-fluid container-img">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="sitebody">
                            <div class="top-part text-center">
                                <h2>BE CAREFUL</h2>
                                <h4>There are a lot of lonely women on this site that want to meet.</h4>

                                <p>This is a dating site that allows to make accuaintance with women quickly.Everyday we have
                                    thousands of new users, who want only one thing serious acquaintances.</p>

                                <p>Registration for men is open now!</p>
                            </div>
                            <div class="question-part  text-center">
                                <h3>Question 1</h3>

                                <p>Confirm your age</p>
                                <ul class="list-inline text-center">
                                    <li><a href="#" class="popup-close btn btn-default confirm-age-btn">30+</a></li>
                                    <li><a href="#" class="popup-close btn btn-default confirm-age-btn">18-29</a></li>
                                </ul>
                            </div>
                            <div id="results" style="display:none;">
                                <?php
                                        $final_url = $button_link_by_device_country[\'lander_last_btn_link_url\'];
                                        ?>
                                 <ul class="text-center">
                                <li><a class="results btn btn-default confirm-age-btn"
                                       href="<?php echo $final_url; ?>"><?php echo $button_link_by_device_country[\'lander_last_btn_name\']; ?></a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>',
        '<body>
            <div class="container-fluid  container-img">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="client-part  text-center">
                            <h4>You are vabout nto join the flirtiest online community.</h4>
                            <img src="<?php echo base_url(); ?>uploaded/lander_theme_images/<?php echo $lander_theme_parameters[\'lander_theme_image_file_name\'] ?$lander_theme_parameters[\'lander_theme_image_file_name\'] : \'blank_person.png\'; ?>" alt="top-img" class="img-responsive" />
                            <h4>Please answer a few simple questions to meet the most desirable members nearby.<br> Only 3 FREE
                                registration spots are left.</h4>

                            <div id="sdil-lander-popup-wrapper">
                                <a href="#" class="popup-close btn btn-success custom-btn">OK</a>
                            </div>
                            <div id="results" style="display:none;">
                                 <?php
                        $final_url = $button_link_by_device_country[\'lander_last_btn_link_url\'] ;
                        ?>
                        <a class="btn btn-danger custom-btn" href="<?php echo $final_url; ?>"><?php
            echo $button_link_by_device_country[\'lander_last_btn_name\']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>'

    );

}