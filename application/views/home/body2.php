<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 8/4/16
 * Time: 8:34 PM
 */
?>
<div class="tab-content">
    <div class="tab-pane active" id="tab1" style="display: none;">
        <style>
            .green_bg {
                background-color: #8bc643;
            }

            .instruction_border {
                text-decoration: underline;
                color: #683091;
            }

            .instruction_page p {
                font-size: 16px !important;
            }
        </style>
        <div class="portlet box" id="form_wizard_1">
            <br>
            <h3 class="text-center instruction_border bold">আবেদন দাখিলের নিয়মাবলি</h3>
            <div class="portlet-body instruction_page">
                <p>অনলাইন আবেদনের সময় সতর্কতার সাথে ফরম পূরণের প্রতিটি ধাপ সম্পন্ন
                    করুন এবং প্রেরণ বাটনে ক্লিক করার পূর্বে ভালো করে যাচাই করে নিন।
                    অসতর্কতার জন্য কোন ভুল অথবা অসম্পূর্ণ আবেদন গ্রহণযোগ্য হবে না। একটি
                    ধাপে প্রয়োজনীয় তথ্য পূরণ করে পরবর্তী ধাপে প্রবেশ করুন। পরবর্তী ধাপে
                    প্রবেশের সাথে সাথে পূর্ববর্তী ধাপের পূরণকৃত তথ্যসমূহ স্বয়ংক্রিয়ভাবে
                    সিস্টেমে সংরক্ষিত হয়ে যাবে।</p>
                <p>১। আবেদন ফরমের লাল তারকা চিহ্নিত ঘরগুলো অবশ্যই পূরণ করুন। অন্যান্য
                    ঘরগুলো পুরণ ঐচ্ছিক।</p>
                <p>২। আবেদনের সময় যদি পেমেন্ট/ অর্থ পরিশোধের বিষয় থাকে তাহলে মোবাইল
                    ব্যাংকিং বা ই-চালানের মাধ্যমে পরিশোধ করুন।</p>
                <p>৩। আবেদন ফরমে ছবি (প্রযোজ্য হলে) ও স্বাক্ষর আপলোড করুন এবং যে সব
                    কাগজপত্র আবেদনের সাথে দাখিল করা প্রয়োজন (সাইজ নির্দিষ্ট করে দেয়া
                    হয়েছে ) সেগুলো “সংযুক্ত” অপশনে ক্লিক করে আপলোড করুন।</p>
                <p>৪। “অফিস বাছাই করুন” অপশন হতে আবেদনটি যে অফিসে পাঠাতে চান সেই অফিস
                    নির্বাচন করুন।</p>
                <p>৫। এরপর ‘প্রেরণ’ বাটনে ক্লিক করুন। “আপনার আবেদনটি সফলভাবে প্রেরণ
                    করা হয়েছে” মর্মে একটি বার্তা আসবে।</p>
                <p>৬। আবেদন প্রেরণের পর আপনি একটি প্রাপ্তি স্বীকারপত্র পাবেন। এটি
                    সংরক্ষণ করুন। পরবর্তীতে “আবেদনের সর্বশেষ অবস্থা” বাটনে ক্লিক করে এই
                    নম্বরটি দিয়ে সর্বশেষ অগ্রগতি জানতে পারবেন।</p>
                <p>৭। আপনি আবেদন প্রেরণ না করা পর্যন্ত আপনার সিস্টেমে তা খসড়া হিসেবে
                    সংরক্ষিত থাকবে। পরবর্তীতে তা আপনি প্রেরণ করতে পারবেন।</p>
            </div>
        </div>					</div>
    <div class="tab-pane" id="tab2" style="display: block;">
        <div class="portlet light col-md-12">
            <div class="portlet-body" id="">
                <div id="showhtml">

                    <style>
                        @import
                        url(http://online.forms.gov.bd/fonts/kalpurush/stylesheet.css);
                        .of-form-body {
                            font-size: 14px !important;
                            font-family: kalpurushregular !important;
                            margin-left: 30px;
                            margin-right: 30px;
                        }
                        .of-form-body .form-group {
                            margin-bottom: 0 !important;
                        }

                        .of-form-body .div_border {
                            border: 1px solid #eee
                        }

                        .of-form-body .blue_bg {
                            background: #e6f7ff;
                        }

                        .of-form-body .div_border>div {
                            padding-top: 5px;
                            padding-bottom: 5px;
                        }

                        .of-form-body h1,.of-form-body h2,.of-form-body h3,.of-form-body h4,.of-form-body h5,.of-form-body h6
                        {
                            font-family: kalpurushregular !important;
                            margin-bottom:0px;
                        }

                        .of-form-body .form-group.form-md-line-input, .form-control.input-sm {
                            font-size: 14px;
                            padding-top: 5px !important;
                        }
                        .of-form-body th, td
                        {
                            font-size: 14px !important;
                            font-family: kalpurushregular !important;
                        }

                        .of-form-body .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
                            border-top-color: #ddd;
                            border-top-style: solid;
                            border-top-width: 1px;
                            padding-bottom: 0px;
                            padding-left: 2px;
                            padding-right: 2px;
                            padding-top: 2px;
                            vertical-align: top;
                        }
                        .of-form-body .form-control {
                            height: 26px;
                            padding: 3px 6px;
                        }

                        .of-form-body .form_attachment .form-control {
                            height: 34px;
                            padding: 6px 12px;
                        }

                        .of-form-body .form-group.form-md-line-input .form-control {
                            background: #e6f7ff;
                            border: 0;
                            border: 1px solid #eee;
                            -webkit-border-radius: 0;
                            -moz-border-radius: 0;
                            -ms-border-radius: 0;
                            -o-border-radius: 0;
                            border-radius: 0;
                            color: #333;
                            box-shadow: none;
                            padding-left: 0;
                            padding-right: 0;
                            font-size: 14px;
                            margin-bottom: 2px;
                        }

                        .of-form-body .fileinput .thumbnail {
                            border:none !important;
                        }

                        .of-form-body .attachment .table>tbody>tr>td,.attachment .table>tbody>tr>th,.attachment .table>tfoot>tr>td,.attachment.table>tfoot>tr>th,.attachment .table>thead>tr>td,.attachment .table>thead>tr>th
                        {
                            border: none;
                            padding: 0px;
                            padding-left: 50px;
                        }

                        .of-form-body .formtable td,.formtable th {
                            vertical-align: middle !important;
                            padding: 2px;
                        }

                        .of-form-body .checkbox, .of-form-body .radio {
                            display: block;
                            margin-bottom: 0px;
                            margin-top: 0;
                            position: relative;
                        }

                        .input-group-addon{
                            padding: 0px;
                            border-bottom: 0px;
                            margin-bottom: 2px;
                        }

                        .glyphicon{
                            font-size: 16px;
                        }


                        @media print {
                            @page
                            {
                                size:  auto;   /* auto is the initial value */
                                /*         margin: 0mm;  /* this affects the margin in the printer settings */
                                margin-left: 20mm !important; /* margin you want for the content */
                                margin-right: 20mm !important; /* margin you want for the content */
                                margin-top: 0mm !important; /* margin you want for the content */
                                margin-bottom: 20mm !important; /* margin you want for the content */
                            }

                            html
                            {
                                margin: 20px;  /* this affects the margin on the html before sending to printer */
                            }

                            .of-form-body
                            {
                                /*          margin: 0mm 20mm 0mm 20mm !important; /* margin you want for the content */
                            }
                            .of-form-body .form-group.form-md-line-input .form-control {
                                font-size: 11px !important;
                            }
                            .of-form-body {
                                font-size: 11px !important;
                                padding:0 !important;
                            }
                            .of-form-body h1,.of-form-body h2,.of-form-body h3,.of-form-body h4,.of-form-body h5,.of-form-body h6
                            {
                                font-family: kalpurushregular !important;
                            }
                            .of-form-body {
                                font-family: kalpurushregular !important;
                            }
                            .of-form-body .form-control {
                                height: 20px;
                            }
                        }

                        @media print {
                            .of-form-body > .col-md-1,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-10,.col-md-11,.col-md-12
                            {
                                float: left;
                                font-size: 11px !important;
                            }
                            .of-form-body > .col-md-12 {
                                width: 100%;
                            }
                            .col-md-11 {
                                width: 91.66666667%;
                            }
                            .col-md-10 {
                                width: 83.33333333%;
                            }
                            .col-md-9 {
                                width: 75%;
                            }
                            .col-md-8 {
                                width: 66.66666667%;
                            }
                            .col-md-7 {
                                width: 58.33333333%;
                            }
                            .col-md-6 {
                                width: 50%;
                            }
                            .col-md-5 {
                                width: 41.66666667%;
                            }
                            .col-md-4 {
                                width: 33.33333333%;
                            }
                            .col-md-3 {
                                width: 25%;
                            }
                            .col-md-2 {
                                width: 16.66666667%;
                            }
                            .col-md-1 {
                                width: 8.33333333%;
                            }
                            .col-md-pull-12 {
                                right: 100%;
                            }
                            .col-md-pull-11 {
                                right: 91.66666667%;
                            }
                            .col-md-pull-10 {
                                right: 83.33333333%;
                            }
                            .col-md-pull-9 {
                                right: 75%;
                            }
                            .col-md-pull-8 {
                                right: 66.66666667%;
                            }
                            .col-md-pull-7 {
                                right: 58.33333333%;
                            }
                            .col-md-pull-6 {
                                right: 50%;
                            }
                            .col-md-pull-5 {
                                right: 41.66666667%;
                            }
                            .col-md-pull-4 {
                                right: 33.33333333%;
                            }
                            .col-md-pull-3 {
                                right: 25%;
                                padding-right: 5px;
                            }
                            .col-md-pull-2 {
                                right: 16.66666667%;
                                padding-right: 5px;
                            }
                            .col-md-pull-1 {
                                right: 8.33333333%;
                            }
                            .col-md-pull-0 {
                                right: auto;
                            }
                            .col-md-push-12 {
                                left: 100%;
                            }
                            .col-md-push-11 {
                                left: 91.66666667%;
                            }
                            .col-md-push-10 {
                                left: 83.33333333%;
                            }
                            .col-md-push-9 {
                                left: 75%;
                            }
                            .col-md-push-8 {
                                left: 66.66666667%;
                            }
                            .col-md-push-7 {
                                left: 58.33333333%;
                            }
                            .col-md-push-6 {
                                left: 50%;
                            }
                            .col-md-push-5 {
                                left: 41.66666667%;
                            }
                            .col-md-push-4 {
                                left: 33.33333333%;
                            }
                            .col-md-push-3 {
                                left: 25%;
                            }
                            .col-md-push-2 {
                                left: 16.66666667%;
                            }
                            .col-md-push-1 {
                                left: 8.33333333%;
                            }
                            .col-md-push-0 {
                                left: auto;
                            }
                            .col-md-offset-12 {
                                margin-left: 100%;
                            }
                            .col-md-offset-11 {
                                margin-left: 91.66666667%;
                            }
                            .col-md-offset-10 {
                                margin-left: 83.33333333%;
                            }
                            .col-md-offset-9 {
                                margin-left: 75%;
                            }
                            .col-md-offset-8 {
                                margin-left: 66.66666667%;
                            }
                            .col-md-offset-7 {
                                margin-left: 58.33333333%;
                            }
                            .col-md-offset-6 {
                                margin-left: 50%;
                            }
                            .col-md-offset-5 {
                                margin-left: 41.66666667%;
                            }
                            .col-md-offset-4 {
                                margin-left: 33.33333333%;
                            }
                            .col-md-offset-3 {
                                margin-left: 25%;
                            }
                            .col-md-offset-2 {
                                margin-left: 16.66666667%;
                            }
                            .col-md-offset-1 {
                                margin-left: 8.33333333%;
                            }
                            .col-md-offset-0 {
                                margin-left: 0%;
                            }
                            .visible-xs {
                                display: none !important;
                            }
                            .hidden-xs {
                                display: block !important;
                            }
                            table.hidden-xs {
                                display: table;
                            }
                            tr.hidden-xs {
                                display: table-row !important;
                            }
                            th.hidden-xs,td.hidden-xs {
                                display: table-cell !important;
                            }
                            .hidden-xs.hidden-print {
                                display: none !important;
                            }
                            .hidden-sm {
                                display: none !important;
                            }
                            .visible-sm {
                                display: block !important;
                            }
                            table.visible-sm {
                                display: table;
                            }
                            tr.visible-sm {
                                display: table-row !important;
                            }
                            th.visible-sm,td.visible-sm {
                                display: table-cell !important;
                            }

                            .of-form-body th, td
                            {
                                font-size: 11px !important;
                                font-family: kalpurushregular !important;
                            }

                            .of-form-body .table > tbody > tr > td,
                            .table > tbody > tr > th,
                            .table > tfoot > tr > td,
                            .table > tfoot > tr > th,
                            .table > thead > tr > td,
                            .table > thead > tr > th {
                                border-top-color: #ddd;
                                border-top-style: solid;
                                border-top-width: 1px;
                                padding-bottom: 0px;
                                padding-left: 2px;
                                padding-right: 2px;
                                padding-top: 2px;
                                vertical-align: top;
                                font-size: 11px!important;
                                font-family: kalpurushregular !important;
                            }
                        }
                    </style>
                    <div class="row of-form-body">
                        <h4 class=" text-center">তথ্য প্রাপ্তির আবেদনপত্র</h4>
                        <h6 class=" text-center">[তথ্য অধিকার (তথ্য প্রাপ্তি সংক্রান্ত)
                            বিধিমালার বিধি ৩ দ্রষ্টব্য]</h6>
                        <div class="">
                            <div class="row">
                                <div class="col-md-9 col-sm-8 col-xs-12">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-1 col-xs-2 col-sm-1">বরাবর,</div>
                                            <div class="col-md-11 col-xs-10 col-sm-11"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <input class="form-control input-inline blue_bg" placeholder="" type="text"> <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                <input class="form-control  input-inline blue_bg" type="text" placeholder="" name="">&nbsp; (নাম ও পদবী) <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">ও</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                দায়িত্বপ্রাপ্ত কর্মকর্তা,<br> <input class="form-control  input-inline blue_bg" type="text" placeholder="" name=""> &nbsp;(দপ্তরের নাম ও ঠিকানা)। <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group form-md-line-input">
                                                <br>
                                                <div class="input-group">
                                                    <span class="" for="districtname">বিষয়:</span>
                                                    <div class="input-group-control" style="padding-left: 5px; font-weight: bold;">
                                                        <p>ত‍থ‍্য প্রাপ্তির আবেদন।</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-4 col-xs-12 text-center">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput" style="display: none;">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 120px; vertical-align: middle !important; margin-top: -10px">
                                            </div>
                                            <div class="font-sm hidden-print">(সর্বোচ্চ ইমেজ সাইজ: ১০০
                                                কিলোবাইট)</div>
                                            <div>
                                    <span class="btn red btn-outline btn-file"> <span class="fileinput-new  hidden-print">ছবি সংযুক্ত করুন</span> <span class="fileinput-exists  hidden-print"> পরিবর্তন </span> <input name="applicant_photo_file" type="file">
                                    </span> <a href="javascript:;" class="btn red fileinput-exists  hidden-print" data-dismiss="fileinput"> বাতিল </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group" style="margin-top: -10px;">
                                <div class="col-md-12 col-xs-12 col-sm-12">জনাব,</div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">সবিনয় বিনীত নিবেদন এই
                                    যে, আমি নিম্নস্বাক্ষরকারী তথ‍্য প্রাপ্তির জন‍্য আবেদন করছি। আমার
                                    প্রয়োজনীয় তথ্যাদি নির্ধারিত ফরমে আপনার সদয় বিবেচনার জন্য উপস্থাপন
                                    করলাম।</div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="text-center">
                                    <div class="col-md-12  col-lg-12 col-xs-12 col-sm-12" style="margin-top: 0px; margin-bottom: 0px; line-height: .8em;">
                                        <p style="text-decoration: underline;">তথ‍্য প্রাপ্তির আবেদনপত্র</p>
                                        <p>[তথ্য অধিকার (তথ্য প্রাপ্তি সংক্রান্ত) বিধিমালার বিধি ৩
                                            দ্রষ্টব্য]</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group form-md-line-input has-danger">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-3">
                                                ০১। আবেদনকারীর নাম: <span class="text-danger hidden-print">*</span>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-12 col-sm-6">
                                                <input name="applicant_name" class="form-control" type="text">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-3" style="padding-right: 10px;">
                                                ০২। জাতীয় পরিচয়পত্র নম্বর:
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-12 col-sm-6">
                                                <input name="" class="form-control nid" type="text">
                                            </div>
                                            <div class="col-md-3 col-lg-4 col-xs-12 col-sm-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-3">
                                                ০৩। মোবাইল নম্বর: <span class="text-danger hidden-print">*</span>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-12 col-sm-6">
                                                <input name="" class="form-control mobile" type="text">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-3">
                                                ০৪। মাতার নাম: <span class="text-danger hidden-print">*</span>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-12 col-sm-6">
                                                <input name="" class="form-control" type="text">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-3"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-3">
                                                ০৫। <select class="">
                                                    <option value="পিতার">পিতার</option>
                                                    <option value="স্বামীর">স্বামীর</option>
                                                </select> নাম:<span class="text-danger hidden-print">*</span>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-12 col-sm-6">
                                                <input name="" class="form-control" type="text">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-3"></div>
                                        </div>                            <div class="row">
                                            <div class="col-md-3 col-lg-2 col-xs-12 col-sm-2">
                                                ০৬। স্থায়ী ঠিকানা: <span class="text-danger hidden-print">*</span>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xs-0 col-sm-0 hidden-print">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-5">
                                                গ্রাম: <input name="per_v" class="form-control input-inline no-wrap" type="text">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-5">
                                                ডাকঘর: <input name="per_p" class="form-control input-inline no-wrap" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1 col-lg-1 col-xs-0 col-sm-0 hidden-print">
                                            </div>
                                            <div class="col-sm-offset-2 col-md-offset-3 col-lg-offset-2 col-md-4 col-lg-4 col-xs-12 col-sm-5">
                                                উপজেলা: <div class="select2-container district form-control input-inline" id="s2id_per_u"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-1">উপজেলা বাছাই করুন</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen1" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-1" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen1_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-1" id="s2id_autogen1_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-1">   </ul></div></div><select id="per_u" name="per_u" class="district form-control input-inline select2-offscreen" tabindex="-1" title="">
                                                    <option value="">উপজেলা বাছাই করুন</option>
                                                    <option value="আমতলী ">আমতলী </option>
                                                    <option value="বামনা ">বামনা </option>
                                                    <option value="বরগুনা সদর ">বরগুনা সদর </option>
                                                    <option value="বেতাগী ">বেতাগী </option>
                                                    <option value="পাথরঘাটা ">পাথরঘাটা </option>
                                                    <option value="তালতলি ">তালতলি </option>
                                                    <option value="আগৈলঝাড়া">আগৈলঝাড়া</option>
                                                    <option value="বাবুগঞ্জ ">বাবুগঞ্জ </option>
                                                    <option value="বাকেরগঞ্জ">বাকেরগঞ্জ</option>
                                                    <option value="বানারীপাড়া ">বানারীপাড়া </option>
                                                    <option value="গৌরনদী ">গৌরনদী </option>
                                                    <option value="হিজলা ">হিজলা </option>
                                                    <option value="বরিশাল সদর (কোতোয়ালী)">বরিশাল সদর (কোতোয়ালী)</option>
                                                    <option value="মেহেন্দিগঞ্জ ">মেহেন্দিগঞ্জ </option>
                                                    <option value="মুলাদী  ">মুলাদী  </option>
                                                    <option value="উজিরপুর  ">উজিরপুর  </option>
                                                    <option value="ভোলা সদর">ভোলা সদর</option>
                                                    <option value="বোরহানউদ্দিন ">বোরহানউদ্দিন </option>
                                                    <option value="দৌলতখান">দৌলতখান</option>
                                                    <option value="লালমোহন ">লালমোহন </option>
                                                    <option value="মনপুরা ">মনপুরা </option>
                                                    <option value="তজুমদ্দিন ">তজুমদ্দিন </option>
                                                    <option value="ঝালকাঠি সদর">ঝালকাঠি সদর</option>
                                                    <option value="নলছিটি ">নলছিটি </option>
                                                    <option value="কাঠালিয়া">কাঠালিয়া</option>
                                                    <option value="বাউফল ">বাউফল </option>
                                                    <option value="দশমিনা ">দশমিনা </option>
                                                    <option value="দুমকি ">দুমকি </option>
                                                    <option value="কলাপাড়া ">কলাপাড়া </option>
                                                    <option value="মির্জাগঞ্জ">মির্জাগঞ্জ</option>
                                                    <option value="পটুয়াখালী সদর ">পটুয়াখালী সদর </option>
                                                    <option value="রাঙ্গাবালী ">রাঙ্গাবালী </option>
                                                    <option value="ভান্ডারিয়া ">ভান্ডারিয়া </option>
                                                    <option value="কাউখালী ">কাউখালী </option>
                                                    <option value="মঠবাড়ীয়া ">মঠবাড়ীয়া </option>
                                                    <option value="নাজিরপুর ">নাজিরপুর </option>
                                                    <option value="পিরোজপুর সদর ">পিরোজপুর সদর </option>
                                                    <option value="নেছারাবা ( স্বরুপকাঠী) ">নেছারাবা ( স্বরুপকাঠী) </option>
                                                    <option value="জিয়ানগর ">জিয়ানগর </option>
                                                    <option value="আলীকদম ">আলীকদম </option>
                                                    <option value="বান্দরবান সদর">বান্দরবান সদর</option>
                                                    <option value="লামা">লামা</option>
                                                    <option value="নাইক্ষ্যংছড়ি">নাইক্ষ্যংছড়ি</option>
                                                    <option value="রোয়াংছড়ি">রোয়াংছড়ি</option>
                                                    <option value="রুমা ">রুমা </option>
                                                    <option value="থানচি">থানচি</option>
                                                    <option value="আখাউড়া">আখাউড়া</option>
                                                    <option value="বাঞ্ছারামপুর ">বাঞ্ছারামপুর </option>
                                                    <option value="বিজয়নগর">বিজয়নগর</option>
                                                    <option value="ব্রাহ্মণবাড়িয়া সদর">ব্রাহ্মণবাড়িয়া সদর</option>
                                                    <option value="আশুগঞ্জ">আশুগঞ্জ</option>
                                                    <option value="কসবা">কসবা</option>
                                                    <option value="নবীনগর">নবীনগর</option>
                                                    <option value="নাসিরনগর">নাসিরনগর</option>
                                                    <option value="সরাইল">সরাইল</option>
                                                    <option value="চাঁদপুর সদর">চাঁদপুর সদর</option>
                                                    <option value="ফরিদগঞ্জ">ফরিদগঞ্জ</option>
                                                    <option value="হাইমচর">হাইমচর</option>
                                                    <option value="হাজীগঞ্জ">হাজীগঞ্জ</option>
                                                    <option value="কচুয়া">কচুয়া</option>
                                                    <option value="মতলব দক্ষিণ">মতলব দক্ষিণ</option>
                                                    <option value="মতলব উত্তর">মতলব উত্তর</option>
                                                    <option value="শাহরাস্তি">শাহরাস্তি</option>
                                                    <option value="আনোয়ারা">আনোয়ারা</option>
                                                    <option value="বাঁশখালী">বাঁশখালী</option>
                                                    <option value="বোয়ালখালী">বোয়ালখালী</option>
                                                    <option value="চন্দনাইশ">চন্দনাইশ</option>
                                                    <option value="ফটিকছড়ি">ফটিকছড়ি</option>
                                                    <option value="হাটহাজারী">হাটহাজারী</option>
                                                    <option value="লোহাগাড়া">লোহাগাড়া</option>
                                                    <option value="মীরসরাই">মীরসরাই</option>
                                                    <option value="পটিয়া">পটিয়া</option>
                                                    <option value="রাঙ্গুনিয়া">রাঙ্গুনিয়া</option>
                                                    <option value="রাউজান">রাউজান</option>
                                                    <option value="সন্দ্বীপ">সন্দ্বীপ</option>
                                                    <option value="সাতকানিয়া">সাতকানিয়া</option>
                                                    <option value="সীতাকুণ্ড">সীতাকুণ্ড</option>
                                                    <option value="বরুড়া">বরুড়া</option>
                                                    <option value="ব্রাহ্মণপাড়া">ব্রাহ্মণপাড়া</option>
                                                    <option value="বুড়িচং">বুড়িচং</option>
                                                    <option value="চান্দিনা">চান্দিনা</option>
                                                    <option value="চৌদ্দগ্রাম">চৌদ্দগ্রাম</option>
                                                    <option value="কুমিল্লা সদর দক্ষিণ">কুমিল্লা সদর দক্ষিণ</option>
                                                    <option value="দাউদকান্দি">দাউদকান্দি</option>
                                                    <option value="দেবিদ্বার">দেবিদ্বার</option>
                                                    <option value="হোমনা ">হোমনা </option>
                                                    <option value="কুমিল্লা সদর">কুমিল্লা সদর</option>
                                                    <option value="লাকসাম">লাকসাম</option>
                                                    <option value="মনোহরগঞ্জ">মনোহরগঞ্জ</option>
                                                    <option value="মেঘনা">মেঘনা</option>
                                                    <option value="মুরাদনগর">মুরাদনগর</option>
                                                    <option value="নাঙ্গলকোট">নাঙ্গলকোট</option>
                                                    <option value="তিতাস">তিতাস</option>
                                                    <option value="চকরিয়া">চকরিয়া</option>
                                                    <option value="কক্সবাজার সদর">কক্সবাজার সদর</option>
                                                    <option value="কুতুবদিয়া">কুতুবদিয়া</option>
                                                    <option value="মহেশখালী">মহেশখালী</option>
                                                    <option value="পেকুয়া">পেকুয়া</option>
                                                    <option value="রামু">রামু</option>
                                                    <option value="টেকনাফ">টেকনাফ</option>
                                                    <option value="উখিয়া">উখিয়া</option>
                                                    <option value="ছাগলনাইয়া">ছাগলনাইয়া</option>
                                                    <option value="দাগনভূঞা">দাগনভূঞা</option>
                                                    <option value="ফেনী সদর">ফেনী সদর</option>
                                                    <option value="ফুলগাজী">ফুলগাজী</option>
                                                    <option value="পরশুরাম">পরশুরাম</option>
                                                    <option value="সোনাগাজী">সোনাগাজী</option>
                                                    <option value="দিঘীনালা">দিঘীনালা</option>
                                                    <option value="মানিকছড়ি">মানিকছড়ি</option>
                                                    <option value="খাগড়াছড়ি সদর">খাগড়াছড়ি সদর</option>
                                                    <option value="লক্ষীছড়ি">লক্ষীছড়ি</option>
                                                    <option value="মহালছড়ি">মহালছড়ি</option>
                                                    <option value="মাটিরাঙ্গা">মাটিরাঙ্গা</option>
                                                    <option value="পানছড়ি">পানছড়ি</option>
                                                    <option value="রামগড়">রামগড়</option>
                                                    <option value="কমলনগর">কমলনগর</option>
                                                    <option value="লক্ষ্মীপুর সদর">লক্ষ্মীপুর সদর</option>
                                                    <option value="রায়পুর">রায়পুর</option>
                                                    <option value="রামগঞ্জ">রামগঞ্জ</option>
                                                    <option value="রামগতি ">রামগতি </option>
                                                    <option value="বেগমগঞ্জ">বেগমগঞ্জ</option>
                                                    <option value="চাটখিল">চাটখিল</option>
                                                    <option value="কোম্পানীগঞ্জ">কোম্পানীগঞ্জ</option>
                                                    <option value="হাতিয়া">হাতিয়া</option>
                                                    <option value="সেনবাগ">সেনবাগ</option>
                                                    <option value="সোনাইমুড়ী">সোনাইমুড়ী</option>
                                                    <option value="সুবর্ণচর">সুবর্ণচর</option>
                                                    <option value="নোয়াখালী ">নোয়াখালী </option>
                                                    <option value="বাঘাইছড়ি">বাঘাইছড়ি</option>
                                                    <option value="বরকল">বরকল</option>
                                                    <option value="কাউখালী">কাউখালী</option>
                                                    <option value="কাপ্তাই ">কাপ্তাই </option>
                                                    <option value="জুরাছড়ি">জুরাছড়ি</option>
                                                    <option value="লংগদু ">লংগদু </option>
                                                    <option value="নানিয়ারচর ">নানিয়ারচর </option>
                                                    <option value="রাঙ্গামাটি সদর">রাঙ্গামাটি সদর</option>
                                                    <option value="রাজস্থলী">রাজস্থলী</option>
                                                    <option value="বিলাইছড়ি">বিলাইছড়ি</option>
                                                    <option value="তেজগাঁও উন্নয়ন সার্কেল">তেজগাঁও উন্নয়ন সার্কেল</option>
                                                    <option value="বাড্ডা">বাড্ডা</option>
                                                    <option value="বংশাল">বংশাল</option>
                                                    <option value="বিমান বন্দর">বিমান বন্দর</option>
                                                    <option value="বনানী">বনানী</option>
                                                    <option value="সেনানিবাস">সেনানিবাস</option>
                                                    <option value="চকবাজার">চকবাজার</option>
                                                    <option value="দক্ষিনখান">দক্ষিনখান</option>
                                                    <option value="দারুস সালাম">দারুস সালাম</option>
                                                    <option value="ডেমরা">ডেমরা</option>
                                                    <option value="ধামরাই">ধামরাই</option>
                                                    <option value="দোহার">দোহার</option>
                                                    <option value="কেরাণীগঞ্জ">কেরাণীগঞ্জ</option>
                                                    <option value="নবাবগঞ্জ">নবাবগঞ্জ</option>
                                                    <option value="সাভার">সাভার</option>
                                                    <option value="আলফাডাঙ্গা">আলফাডাঙ্গা</option>
                                                    <option value="ভাঙ্গা">ভাঙ্গা</option>
                                                    <option value="বোয়ালমারী">বোয়ালমারী</option>
                                                    <option value="চরভদ্রাসন">চরভদ্রাসন</option>
                                                    <option value="ফরিদপুর সদর">ফরিদপুর সদর</option>
                                                    <option value="মধুখালী">মধুখালী</option>
                                                    <option value="নগরকান্দা">নগরকান্দা</option>
                                                    <option value="সদরপুর">সদরপুর</option>
                                                    <option value="সালথা">সালথা</option>
                                                    <option value="গাজীপুর সদর">গাজীপুর সদর</option>
                                                    <option value="কালিয়াকৈর">কালিয়াকৈর</option>
                                                    <option value="কালীগঞ্জ">কালীগঞ্জ</option>
                                                    <option value="কাপাসিয়া">কাপাসিয়া</option>
                                                    <option value="শ্রীপুর">শ্রীপুর</option>
                                                    <option value="গোপালগঞ্জ সদর">গোপালগঞ্জ সদর</option>
                                                    <option value="কাশিয়ানী">কাশিয়ানী</option>
                                                    <option value="কোটালীপাড়া">কোটালীপাড়া</option>
                                                    <option value="মুকসুদপুর">মুকসুদপুর</option>
                                                    <option value="টুংগীপাড়া">টুংগীপাড়া</option>
                                                    <option value="বকশীগঞ্জ">বকশীগঞ্জ</option>
                                                    <option value="দেওয়ানগঞ্জ">দেওয়ানগঞ্জ</option>
                                                    <option value="ইসলামপুর">ইসলামপুর</option>
                                                    <option value="জামালপুর সদর">জামালপুর সদর</option>
                                                    <option value="মাদারগঞ্জ">মাদারগঞ্জ</option>
                                                    <option value="মেলান্দহ">মেলান্দহ</option>
                                                    <option value="সরিষাবাড়ী">সরিষাবাড়ী</option>
                                                    <option value="অষ্টগ্রাম">অষ্টগ্রাম</option>
                                                    <option value="বাজিতপুর">বাজিতপুর</option>
                                                    <option value="ভৈরব">ভৈরব</option>
                                                    <option value="হোসেনপুর">হোসেনপুর</option>
                                                    <option value="ইটনা">ইটনা</option>
                                                    <option value="করিমগঞ্জ">করিমগঞ্জ</option>
                                                    <option value="কটিয়াদী">কটিয়াদী</option>
                                                    <option value="কিশোরগঞ্জ সদর">কিশোরগঞ্জ সদর</option>
                                                    <option value="কুলিয়ারচর">কুলিয়ারচর</option>
                                                    <option value="মিঠামইন">মিঠামইন</option>
                                                    <option value="নিকলী">নিকলী</option>
                                                    <option value="পাকুন্দিয়া">পাকুন্দিয়া</option>
                                                    <option value="তাড়াইল">তাড়াইল</option>
                                                    <option value="কালকিনি">কালকিনি</option>
                                                    <option value="মাদারীপুর সদর">মাদারীপুর সদর</option>
                                                    <option value="রাজৈর">রাজৈর</option>
                                                    <option value="শিবচর">শিবচর</option>
                                                    <option value="দৌলতপুর">দৌলতপুর</option>
                                                    <option value="ঘিওর">ঘিওর</option>
                                                    <option value="হরিরামপুর">হরিরামপুর</option>
                                                    <option value="মানিকগঞ্জ সদর">মানিকগঞ্জ সদর</option>
                                                    <option value="সাটুরিয়া">সাটুরিয়া</option>
                                                    <option value="শিবালয়">শিবালয়</option>
                                                    <option value="সিংগাইর">সিংগাইর</option>
                                                    <option value="গজারিয়া">গজারিয়া</option>
                                                    <option value="লৌহজং">লৌহজং</option>
                                                    <option value="মুন্সিগঞ্জ সদর">মুন্সিগঞ্জ সদর</option>
                                                    <option value="সিরাজদিখান">সিরাজদিখান</option>
                                                    <option value="শ্রীনগর">শ্রীনগর</option>
                                                    <option value="টংগিবাড়ী">টংগিবাড়ী</option>
                                                    <option value="ভালুকা">ভালুকা</option>
                                                    <option value="ধোবাউড়া">ধোবাউড়া</option>
                                                    <option value="ফুলবাড়ীয়া">ফুলবাড়ীয়া</option>
                                                    <option value="গফরগাঁও">গফরগাঁও</option>
                                                    <option value="গৌরীপুর">গৌরীপুর</option>
                                                    <option value="হালুয়াঘাট">হালুয়াঘাট</option>
                                                    <option value="ঈশ্বরগঞ্জ">ঈশ্বরগঞ্জ</option>
                                                    <option value="ময়মনসিংহ সদর">ময়মনসিংহ সদর</option>
                                                    <option value="মুক্তাগাছা">মুক্তাগাছা</option>
                                                    <option value="নান্দাইল">নান্দাইল</option>
                                                    <option value="ফুলপুর">ফুলপুর</option>
                                                    <option value="তারাকান্দা">তারাকান্দা</option>
                                                    <option value="ত্রিশাল">ত্রিশাল</option>
                                                    <option value="আড়াইহাজার">আড়াইহাজার</option>
                                                    <option value="সোনারগাঁ">সোনারগাঁ</option>
                                                    <option value="নারায়নগঞ্জ সদর">নারায়নগঞ্জ সদর</option>
                                                    <option value="রূপগঞ্জ">রূপগঞ্জ</option>
                                                    <option value="বেলাবো">বেলাবো</option>
                                                    <option value="মনোহরদী">মনোহরদী</option>
                                                    <option value="নরসিংদী ">নরসিংদী </option>
                                                    <option value="পলাশ">পলাশ</option>
                                                    <option value="রায়পুরা">রায়পুরা</option>
                                                    <option value="শিবপুর">শিবপুর</option>
                                                    <option value="আটপাড়া">আটপাড়া</option>
                                                    <option value="বারহাট্টা">বারহাট্টা</option>
                                                    <option value="দুর্গাপুর">দুর্গাপুর</option>
                                                    <option value="খালিয়াজুরী">খালিয়াজুরী</option>
                                                    <option value="কলমাকান্দা">কলমাকান্দা</option>
                                                    <option value="কেন্দুয়া">কেন্দুয়া</option>
                                                    <option value="মদন">মদন</option>
                                                    <option value="মোহনগঞ্জ">মোহনগঞ্জ</option>
                                                    <option value="নেত্রকোণা সদর">নেত্রকোণা সদর</option>
                                                    <option value="বালিয়াকান্দি">বালিয়াকান্দি</option>
                                                    <option value="গোয়ালন্দ">গোয়ালন্দ</option>
                                                    <option value="কালুখালী">কালুখালী</option>
                                                    <option value="পাংশা">পাংশা</option>
                                                    <option value="রাজবাড়ী সদর">রাজবাড়ী সদর</option>
                                                    <option value="ভেদরগঞ্জ">ভেদরগঞ্জ</option>
                                                    <option value="ডামুড্যা">ডামুড্যা</option>
                                                    <option value="গোসাইরহাট">গোসাইরহাট</option>
                                                    <option value="নড়িয়া">নড়িয়া</option>
                                                    <option value="শরিয়তপুর সদর">শরিয়তপুর সদর</option>
                                                    <option value="জাজিরা">জাজিরা</option>
                                                    <option value="ঝিনাইগাতী">ঝিনাইগাতী</option>
                                                    <option value="নকলা">নকলা</option>
                                                    <option value="নালিতাবাড়ী">নালিতাবাড়ী</option>
                                                    <option value="শেরপুর সদর">শেরপুর সদর</option>
                                                    <option value="শ্রীবরদী">শ্রীবরদী</option>
                                                    <option value="বাসাইল">বাসাইল</option>
                                                    <option value="ভুয়াপুর">ভুয়াপুর</option>
                                                    <option value="দেলদুয়ার">দেলদুয়ার</option>
                                                    <option value="ধনবাড়ী">ধনবাড়ী</option>
                                                    <option value="ঘাটাইল">ঘাটাইল</option>
                                                    <option value="গোপালপুর">গোপালপুর</option>
                                                    <option value="কালিহাতী">কালিহাতী</option>
                                                    <option value="মধুপুর">মধুপুর</option>
                                                    <option value="মির্জাপুর">মির্জাপুর</option>
                                                    <option value="নাগরপুর">নাগরপুর</option>
                                                    <option value="সখিপুর">সখিপুর</option>
                                                    <option value="টাঙ্গাইল সদর">টাঙ্গাইল সদর</option>
                                                    <option value="চিতলমারী ">চিতলমারী </option>
                                                    <option value="ফকিরহাট ">ফকিরহাট </option>
                                                    <option value="কচুয়া ">কচুয়া </option>
                                                    <option value="মোল্লাহাট ">মোল্লাহাট </option>
                                                    <option value="মোংলা ">মোংলা </option>
                                                    <option value="মোড়েলগঞ্জ ">মোড়েলগঞ্জ </option>
                                                    <option value="রামপাল ">রামপাল </option>
                                                    <option value="শরণখোলা">শরণখোলা</option>
                                                    <option value="আলমডাঙ্গা ">আলমডাঙ্গা </option>
                                                    <option value="চুয়াডাঙ্গা সদর ">চুয়াডাঙ্গা সদর </option>
                                                    <option value="দামুড়হুদা ">দামুড়হুদা </option>
                                                    <option value="জীবননগর ">জীবননগর </option>
                                                    <option value="অভয়নগর ">অভয়নগর </option>
                                                    <option value="বাঘারপাড়া ">বাঘারপাড়া </option>
                                                    <option value="চৌগাছা">চৌগাছা</option>
                                                    <option value="ঝিকরগাছা ">ঝিকরগাছা </option>
                                                    <option value="কেশবপুর ">কেশবপুর </option>
                                                    <option value="যশোর সদর ">যশোর সদর </option>
                                                    <option value="মণিরামপুর">মণিরামপুর</option>
                                                    <option value="শার্শা ">শার্শা </option>
                                                    <option value="হরিণাকুন্ডু ">হরিণাকুন্ডু </option>
                                                    <option value="ঝিনাইদহ সদর">ঝিনাইদহ সদর</option>
                                                    <option value="কালীগঞ্জ ">কালীগঞ্জ </option>
                                                    <option value="কোটচাঁদপুর ">কোটচাঁদপুর </option>
                                                    <option value="মহেশপুর ">মহেশপুর </option>
                                                    <option value="শৈলকুপা ">শৈলকুপা </option>
                                                    <option value="বটিয়াঘাটা ">বটিয়াঘাটা </option>
                                                    <option value="দাকোপ ">দাকোপ </option>
                                                    <option value="ডুমুরিয়া ">ডুমুরিয়া </option>
                                                    <option value="কয়রা ">কয়রা </option>
                                                    <option value="পাইকগাছা ">পাইকগাছা </option>
                                                    <option value="ফুলতলা ">ফুলতলা </option>
                                                    <option value="রূপসা ">রূপসা </option>
                                                    <option value="তেরখাদা ">তেরখাদা </option>
                                                    <option value="দিঘলিয়া">দিঘলিয়া</option>
                                                    <option value="ভেড়ামারা ">ভেড়ামারা </option>
                                                    <option value="দৌলতপুর ">দৌলতপুর </option>
                                                    <option value="খোকসা">খোকসা</option>
                                                    <option value="কুমারখালী ">কুমারখালী </option>
                                                    <option value="কুষ্টিয়া সদর ">কুষ্টিয়া সদর </option>
                                                    <option value="মিরপুর ">মিরপুর </option>
                                                    <option value="মাগুরা সদর ">মাগুরা সদর </option>
                                                    <option value="মহম্মদপুর ">মহম্মদপুর </option>
                                                    <option value="শালিখা ">শালিখা </option>
                                                    <option value="শ্রীপুর ">শ্রীপুর </option>
                                                    <option value="গাংনী ">গাংনী </option>
                                                    <option value="মুজিবনগর ">মুজিবনগর </option>
                                                    <option value="মেহেরপুর সদর">মেহেরপুর সদর</option>
                                                    <option value="কালিয়া">কালিয়া</option>
                                                    <option value="লোহাগড়া">লোহাগড়া</option>
                                                    <option value="নড়াইল সদর ">নড়াইল সদর </option>
                                                    <option value="আশাশুনি ">আশাশুনি </option>
                                                    <option value="দেবহাটা ">দেবহাটা </option>
                                                    <option value="কলারোয়া ">কলারোয়া </option>
                                                    <option value="কালিগঞ্জ ">কালিগঞ্জ </option>
                                                    <option value="সাতক্ষীরা সদর">সাতক্ষীরা সদর</option>
                                                    <option value="শ্যামনগর ">শ্যামনগর </option>
                                                    <option value="তালা ">তালা </option>
                                                    <option value="আদমদিঘি">আদমদিঘি</option>
                                                    <option value="বগুড়া  সদর">বগুড়া  সদর</option>
                                                    <option value="ধুনট">ধুনট</option>
                                                    <option value="দুপচাচিঁয়া">দুপচাচিঁয়া</option>
                                                    <option value="গাবতলি">গাবতলি</option>
                                                    <option value="কাহালু">কাহালু</option>
                                                    <option value="নন্দিগ্রাম">নন্দিগ্রাম</option>
                                                    <option value="সারিয়াকান্দি">সারিয়াকান্দি</option>
                                                    <option value="শাজাহানপুর">শাজাহানপুর</option>
                                                    <option value="শেরপুর">শেরপুর</option>
                                                    <option value="শিবগঞ্জ">শিবগঞ্জ</option>
                                                    <option value="সোনাতলা ">সোনাতলা </option>
                                                    <option value="আক্কেলপুর ">আক্কেলপুর </option>
                                                    <option value=" জয়পুরহাট সদর"> জয়পুরহাট সদর</option>
                                                    <option value="কালাই">কালাই</option>
                                                    <option value="আত্রাই">আত্রাই</option>
                                                    <option value="ধামইরহাট">ধামইরহাট</option>
                                                    <option value="মান্দা">মান্দা</option>
                                                    <option value="মহাদেবপুর">মহাদেবপুর</option>
                                                    <option value="নওগাঁ সদর">নওগাঁ সদর</option>
                                                    <option value="নিয়ামতপুর">নিয়ামতপুর</option>
                                                    <option value="পত্নীতলা">পত্নীতলা</option>
                                                    <option value="রাণীনগর">রাণীনগর</option>
                                                    <option value="সাপাহার">সাপাহার</option>
                                                    <option value="বদলগাছী">বদলগাছী</option>
                                                    <option value="পোরশা">পোরশা</option>
                                                    <option value="বাগাতিপাড়া">বাগাতিপাড়া</option>
                                                    <option value="বড়াইগ্রাম">বড়াইগ্রাম</option>
                                                    <option value="গুরুদাসপুর">গুরুদাসপুর</option>
                                                    <option value="লালপুর">লালপুর</option>
                                                    <option value="নাটোর সদর">নাটোর সদর</option>
                                                    <option value="সিংরা">সিংরা</option>
                                                    <option value="ভোলাহাট">ভোলাহাট</option>
                                                    <option value="গোমস্তাপুর">গোমস্তাপুর</option>
                                                    <option value="নাচোল">নাচোল</option>
                                                    <option value="চাঁপাই নাবাবগঞ্জ সদর">চাঁপাই নাবাবগঞ্জ সদর</option>
                                                    <option value="শিবগঞ্জ ">শিবগঞ্জ </option>
                                                    <option value="আটঘারিয়া">আটঘারিয়া</option>
                                                    <option value="বেড়া">বেড়া</option>
                                                    <option value="ভাঙ্গুরা">ভাঙ্গুরা</option>
                                                    <option value="চাটমোহর ">চাটমোহর </option>
                                                    <option value="ফরিদপুর">ফরিদপুর</option>
                                                    <option value="ঈশ্বরদী ">ঈশ্বরদী </option>
                                                    <option value="পাবনা সদর">পাবনা সদর</option>
                                                    <option value="সাঁথিয়া">সাঁথিয়া</option>
                                                    <option value="সুজানগর">সুজানগর</option>
                                                    <option value="বাঘা">বাঘা</option>
                                                    <option value="বাগমারা">বাগমারা</option>
                                                    <option value="চারঘাট ">চারঘাট </option>
                                                    <option value="দুর্গাপুর ">দুর্গাপুর </option>
                                                    <option value="গোদাগাড়ী ">গোদাগাড়ী </option>
                                                    <option value="মোহনপুর">মোহনপুর</option>
                                                    <option value="পবা">পবা</option>
                                                    <option value="পুথিয়া">পুথিয়া</option>
                                                    <option value="তানোর">তানোর</option>
                                                    <option value="বেলকুচি ">বেলকুচি </option>
                                                    <option value="চৌহালি">চৌহালি</option>
                                                    <option value="কামারখন্দ">কামারখন্দ</option>
                                                    <option value="কাজিপুর">কাজিপুর</option>
                                                    <option value="রাইগঞ্জ">রাইগঞ্জ</option>
                                                    <option value="শাহজাদপুর">শাহজাদপুর</option>
                                                    <option value="সিরাজগঞ্জ সদর">সিরাজগঞ্জ সদর</option>
                                                    <option value="তারাশ">তারাশ</option>
                                                    <option value="উল্লাহ পারা">উল্লাহ পারা</option>
                                                    <option value="বিরামপুর ">বিরামপুর </option>
                                                    <option value="বীরগঞ্জ">বীরগঞ্জ</option>
                                                    <option value="বিরল">বিরল</option>
                                                    <option value="বোচাগঞ্জ">বোচাগঞ্জ</option>
                                                    <option value="চিরিরবন্দর">চিরিরবন্দর</option>
                                                    <option value="ফুলবাড়ী">ফুলবাড়ী</option>
                                                    <option value="ঘোড়াঘাট">ঘোড়াঘাট</option>
                                                    <option value="হাকিমপুর">হাকিমপুর</option>
                                                    <option value="কাহারোল">কাহারোল</option>
                                                    <option value="খানসামা">খানসামা</option>
                                                    <option value="নবাবগঞ্জ">নবাবগঞ্জ</option>
                                                    <option value="পার্বতীপুর">পার্বতীপুর</option>
                                                    <option value="দিনাজপুর সদর">দিনাজপুর সদর</option>
                                                    <option value="ফুলছড়ি">ফুলছড়ি</option>
                                                    <option value="গাইবান্ধা সদর">গাইবান্ধা সদর</option>
                                                    <option value="গোবিন্দগঞ্জ">গোবিন্দগঞ্জ</option>
                                                    <option value="পলাশবাড়ী">পলাশবাড়ী</option>
                                                    <option value="সাদুল্লাপুর">সাদুল্লাপুর</option>
                                                    <option value="সাঘাটা">সাঘাটা</option>
                                                    <option value="সুন্দরগঞ্জ">সুন্দরগঞ্জ</option>
                                                    <option value="ভুরুঙ্গামারী">ভুরুঙ্গামারী</option>
                                                    <option value="চর রাজিবপুর">চর রাজিবপুর</option>
                                                    <option value="চিলমারী ">চিলমারী </option>
                                                    <option value="ফুলবাড়ী">ফুলবাড়ী</option>
                                                    <option value="কুড়িগ্রাম সদর">কুড়িগ্রাম সদর</option>
                                                    <option value="নাগেশ্বরী">নাগেশ্বরী</option>
                                                    <option value="রাজারহাট">রাজারহাট</option>
                                                    <option value="রৌমারী">রৌমারী</option>
                                                    <option value="উলিপুর">উলিপুর</option>
                                                    <option value="আদিতমারী">আদিতমারী</option>
                                                    <option value="হাতীবান্ধা">হাতীবান্ধা</option>
                                                    <option value="কালীগঞ্জ">কালীগঞ্জ</option>
                                                    <option value="লালমনিরহাট সদর">লালমনিরহাট সদর</option>
                                                    <option value="পাটগ্রাম">পাটগ্রাম</option>
                                                    <option value="ডোমার উপজেলা">ডোমার উপজেলা</option>
                                                    <option value="জলঢাকা">জলঢাকা</option>
                                                    <option value="কিশোরগঞ্জ">কিশোরগঞ্জ</option>
                                                    <option value="নীলফামারী সদর">নীলফামারী সদর</option>
                                                    <option value="সৈয়দপুর উপজেলা">সৈয়দপুর উপজেলা</option>
                                                    <option value="ডিমলা">ডিমলা</option>
                                                    <option value="আটোয়ারী">আটোয়ারী</option>
                                                    <option value="বোদা">বোদা</option>
                                                    <option value="দেবীগঞ্জ">দেবীগঞ্জ</option>
                                                    <option value="পঞ্চগড় সদর">পঞ্চগড় সদর</option>
                                                    <option value="তেতুলিয়া">তেতুলিয়া</option>
                                                    <option value="বদরগঞ্জ">বদরগঞ্জ</option>
                                                    <option value="কাউনিয়া">কাউনিয়া</option>
                                                    <option value="রংপুর সদর">রংপুর সদর</option>
                                                    <option value="মিঠাপুকুর">মিঠাপুকুর</option>
                                                    <option value="পীরগাছা">পীরগাছা</option>
                                                    <option value="পীরগঞ্জ ">পীরগঞ্জ </option>
                                                    <option value="তারাগঞ্জ">তারাগঞ্জ</option>
                                                    <option value="গঙ্গাচড়া">গঙ্গাচড়া</option>
                                                    <option value="বালিয়াডাঙ্গী">বালিয়াডাঙ্গী</option>
                                                    <option value="হরিপুর">হরিপুর</option>
                                                    <option value="পীরগঞ্জ">পীরগঞ্জ</option>
                                                    <option value="রাণীশংকৈল">রাণীশংকৈল</option>
                                                    <option value="ঠাকুরগাঁও সদর">ঠাকুরগাঁও সদর</option>
                                                    <option value="আজমিরীগঞ্জ">আজমিরীগঞ্জ</option>
                                                    <option value="বাহুবল ">বাহুবল </option>
                                                    <option value="বানিয়াচং ">বানিয়াচং </option>
                                                    <option value="চুনারুঘাট ">চুনারুঘাট </option>
                                                    <option value="হবিগঞ্জ সদর ">হবিগঞ্জ সদর </option>
                                                    <option value="লাখাই ">লাখাই </option>
                                                    <option value="মাধবপুর ">মাধবপুর </option>
                                                    <option value="নবীগঞ্জ ">নবীগঞ্জ </option>
                                                    <option value="বড়লেখা ">বড়লেখা </option>
                                                    <option value="জুড়ী ">জুড়ী </option>
                                                    <option value="কমলগঞ্জ ">কমলগঞ্জ </option>
                                                    <option value="কুলাউড়া ">কুলাউড়া </option>
                                                    <option value="মৌলভীবাজার সদর ">মৌলভীবাজার সদর </option>
                                                    <option value="রাজনগর ">রাজনগর </option>
                                                    <option value="শ্রীমঙ্গল">শ্রীমঙ্গল</option>
                                                    <option value="বিশ্বম্ভরপুর ">বিশ্বম্ভরপুর </option>
                                                    <option value="ছাতক ">ছাতক </option>
                                                    <option value="দিরাই ">দিরাই </option>
                                                    <option value="ধর্মপাশা ">ধর্মপাশা </option>
                                                    <option value="দোয়ারাবাজার ">দোয়ারাবাজার </option>
                                                    <option value="জগন্নাথপুর ">জগন্নাথপুর </option>
                                                    <option value="জামালগঞ্জ ">জামালগঞ্জ </option>
                                                    <option value="শাল্লা ">শাল্লা </option>
                                                    <option value="সুনামগঞ্জ সদর ">সুনামগঞ্জ সদর </option>
                                                    <option value="তাহিরপুর ">তাহিরপুর </option>
                                                    <option value="দক্ষিণ  সুনামগঞ্জ">দক্ষিণ  সুনামগঞ্জ</option>
                                                    <option value="বালাগঞ্জ ">বালাগঞ্জ </option>
                                                    <option value="বিয়ানীবাজার ">বিয়ানীবাজার </option>
                                                    <option value="বিশ্বনাথ ">বিশ্বনাথ </option>
                                                    <option value="কোম্পানীগঞ্জ ">কোম্পানীগঞ্জ </option>
                                                    <option value="দক্ষিণ সুরমা ">দক্ষিণ সুরমা </option>
                                                    <option value="ফেঞ্চুগঞ্জ ">ফেঞ্চুগঞ্জ </option>
                                                    <option value="গোলাপগঞ্জ ">গোলাপগঞ্জ </option>
                                                    <option value="গোয়াইনঘাট ">গোয়াইনঘাট </option>
                                                    <option value="জৈন্তাপুর ">জৈন্তাপুর </option>
                                                    <option value="কানাইঘাট ">কানাইঘাট </option>
                                                    <option value="সিলেট সদর ">সিলেট সদর </option>
                                                    <option value="জকিগঞ্জ ">জকিগঞ্জ </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-5">
                                                জেলা: <div class="select2-container district form-control input-inline" id="s2id_per_d"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-2">জেলা বাছাই করুন</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen2" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-2" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen2_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-2" id="s2id_autogen2_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-2">   </ul></div></div><select id="per_d" name="per_d" class="district form-control input-inline select2-offscreen" tabindex="-1" title="">
                                                    <option value="">জেলা বাছাই করুন</option>
                                                    <option value="বরগুনা">বরগুনা</option>
                                                    <option value="বরিশাল">বরিশাল</option>
                                                    <option value="ভোলা">ভোলা</option>
                                                    <option value="ঝালকাঠি">ঝালকাঠি</option>
                                                    <option value="পটুয়াখালী ">পটুয়াখালী </option>
                                                    <option value="পিরোজপুর ">পিরোজপুর </option>
                                                    <option value="বান্দরবান">বান্দরবান</option>
                                                    <option value="ব্রাহ্মণবাড়িয়া">ব্রাহ্মণবাড়িয়া</option>
                                                    <option value="চাঁদপুর">চাঁদপুর</option>
                                                    <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                                                    <option value="কুমিল্লা">কুমিল্লা</option>
                                                    <option value="কক্সবাজার ">কক্সবাজার </option>
                                                    <option value="ফেনী">ফেনী</option>
                                                    <option value="খাগড়াছড়ি">খাগড়াছড়ি</option>
                                                    <option value="লক্ষ্মীপুর">লক্ষ্মীপুর</option>
                                                    <option value="নোয়াখালী">নোয়াখালী</option>
                                                    <option value="রাঙ্গামাটি">রাঙ্গামাটি</option>
                                                    <option value="ঢাকা ">ঢাকা </option>
                                                    <option value="ফরিদপুর ">ফরিদপুর </option>
                                                    <option value="গাজীপুর ">গাজীপুর </option>
                                                    <option value="গোপালগঞ্জ">গোপালগঞ্জ</option>
                                                    <option value="জামালপুর ">জামালপুর </option>
                                                    <option value="কিশোরগঞ্জ ">কিশোরগঞ্জ </option>
                                                    <option value="মাদারীপুর ">মাদারীপুর </option>
                                                    <option value="মানিকগঞ্জ ">মানিকগঞ্জ </option>
                                                    <option value="মুন্সিগঞ্জ ">মুন্সিগঞ্জ </option>
                                                    <option value="ময়মনসিংহ ">ময়মনসিংহ </option>
                                                    <option value="নারায়ণগঞ্জ ">নারায়ণগঞ্জ </option>
                                                    <option value="নরসিংদী ">নরসিংদী </option>
                                                    <option value="নেত্রকোণা ">নেত্রকোণা </option>
                                                    <option value="রাজবাড়ী ">রাজবাড়ী </option>
                                                    <option value="শরীয়তপুর  ">শরীয়তপুর  </option>
                                                    <option value="শেরপুর ">শেরপুর </option>
                                                    <option value="টাঙ্গাইল ">টাঙ্গাইল </option>
                                                    <option value="বাগেরহাট">বাগেরহাট</option>
                                                    <option value="চুয়াডাঙ্গা ">চুয়াডাঙ্গা </option>
                                                    <option value="যশোর ">যশোর </option>
                                                    <option value="ঝিনাইদহ ">ঝিনাইদহ </option>
                                                    <option value="খুলনা ">খুলনা </option>
                                                    <option value="কুষ্টিয়া ">কুষ্টিয়া </option>
                                                    <option value="মাগুরা">মাগুরা</option>
                                                    <option value="মেহেরপুর ">মেহেরপুর </option>
                                                    <option value="নড়াইল ">নড়াইল </option>
                                                    <option value="সাতক্ষীরা ">সাতক্ষীরা </option>
                                                    <option value="বগুড়া ">বগুড়া </option>
                                                    <option value="জয়পুরহাট">জয়পুরহাট</option>
                                                    <option value="নওগাঁ ">নওগাঁ </option>
                                                    <option value="নাটোর ">নাটোর </option>
                                                    <option value="চাঁপাই নাবাবগঞ্জ ">চাঁপাই নাবাবগঞ্জ </option>
                                                    <option value="পাবনা">পাবনা</option>
                                                    <option value="রাজশাহী ">রাজশাহী </option>
                                                    <option value="সিরাজগঞ্জ">সিরাজগঞ্জ</option>
                                                    <option value="দিনাজপুর ">দিনাজপুর </option>
                                                    <option value="গাইবান্ধা ">গাইবান্ধা </option>
                                                    <option value="কুড়িগ্রাম ">কুড়িগ্রাম </option>
                                                    <option value="লালমনিরহাট ">লালমনিরহাট </option>
                                                    <option value="নীলফামারী">নীলফামারী</option>
                                                    <option value="পঞ্চগড় ">পঞ্চগড় </option>
                                                    <option value="রংপুর ">রংপুর </option>
                                                    <option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
                                                    <option value="হবিগঞ্জ ">হবিগঞ্জ </option>
                                                    <option value="মৌলভীবাজার ">মৌলভীবাজার </option>
                                                    <option value="সুনামগঞ্জ ">সুনামগঞ্জ </option>
                                                    <option value="সিলেট">সিলেট</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-lg-2 col-xs-6 col-sm-2">০৭। বর্তমান ঠিকানা:</div>
                                            <div class="col-md-1 col-lg-1 col-xs-6 col-sm-2 hidden-print">
                                                (ঐ<div class="checker inline"><span><input class="inline" type="checkbox" name="same_address_checkbox"></span></div>)
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">
                                                গ্রাম: <input name="p_v" class="form-control input-inline no-wrap" type="text">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">
                                                ডাকঘর: <input name="p_p" class="form-control input-inline no-wrap" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1 col-lg-1 col-xs-0 col-sm-0 hidden-print">
                                            </div>
                                            <div class="col-sm-offset-2 col-md-offset-3 col-lg-offset-2 col-md-4 col-lg-4 col-xs-12 col-sm-5">
                                                উপজেলা: <div class="select2-container district form-control input-inline" id="s2id_p_u"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-3">উপজেলা বাছাই করুন</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen3" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-3" id="s2id_autogen3"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen3_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-3" id="s2id_autogen3_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-3">   </ul></div></div><select id="p_u" name="p_u" class="district form-control input-inline select2-offscreen" tabindex="-1" title="">
                                                    <option value="">উপজেলা বাছাই করুন</option>
                                                    <option value="আমতলী ">আমতলী </option>
                                                    <option value="বামনা ">বামনা </option>
                                                    <option value="বরগুনা সদর ">বরগুনা সদর </option>
                                                    <option value="বেতাগী ">বেতাগী </option>
                                                    <option value="পাথরঘাটা ">পাথরঘাটা </option>
                                                    <option value="তালতলি ">তালতলি </option>
                                                    <option value="আগৈলঝাড়া">আগৈলঝাড়া</option>
                                                    <option value="বাবুগঞ্জ ">বাবুগঞ্জ </option>
                                                    <option value="বাকেরগঞ্জ">বাকেরগঞ্জ</option>
                                                    <option value="বানারীপাড়া ">বানারীপাড়া </option>
                                                    <option value="গৌরনদী ">গৌরনদী </option>
                                                    <option value="হিজলা ">হিজলা </option>
                                                    <option value="বরিশাল সদর (কোতোয়ালী)">বরিশাল সদর (কোতোয়ালী)</option>
                                                    <option value="মেহেন্দিগঞ্জ ">মেহেন্দিগঞ্জ </option>
                                                    <option value="মুলাদী  ">মুলাদী  </option>
                                                    <option value="উজিরপুর  ">উজিরপুর  </option>
                                                    <option value="ভোলা সদর">ভোলা সদর</option>
                                                    <option value="বোরহানউদ্দিন ">বোরহানউদ্দিন </option>
                                                    <option value="দৌলতখান">দৌলতখান</option>
                                                    <option value="লালমোহন ">লালমোহন </option>
                                                    <option value="মনপুরা ">মনপুরা </option>
                                                    <option value="তজুমদ্দিন ">তজুমদ্দিন </option>
                                                    <option value="ঝালকাঠি সদর">ঝালকাঠি সদর</option>
                                                    <option value="নলছিটি ">নলছিটি </option>
                                                    <option value="কাঠালিয়া">কাঠালিয়া</option>
                                                    <option value="বাউফল ">বাউফল </option>
                                                    <option value="দশমিনা ">দশমিনা </option>
                                                    <option value="দুমকি ">দুমকি </option>
                                                    <option value="কলাপাড়া ">কলাপাড়া </option>
                                                    <option value="মির্জাগঞ্জ">মির্জাগঞ্জ</option>
                                                    <option value="পটুয়াখালী সদর ">পটুয়াখালী সদর </option>
                                                    <option value="রাঙ্গাবালী ">রাঙ্গাবালী </option>
                                                    <option value="ভান্ডারিয়া ">ভান্ডারিয়া </option>
                                                    <option value="কাউখালী ">কাউখালী </option>
                                                    <option value="মঠবাড়ীয়া ">মঠবাড়ীয়া </option>
                                                    <option value="নাজিরপুর ">নাজিরপুর </option>
                                                    <option value="পিরোজপুর সদর ">পিরোজপুর সদর </option>
                                                    <option value="নেছারাবা ( স্বরুপকাঠী) ">নেছারাবা ( স্বরুপকাঠী) </option>
                                                    <option value="জিয়ানগর ">জিয়ানগর </option>
                                                    <option value="আলীকদম ">আলীকদম </option>
                                                    <option value="বান্দরবান সদর">বান্দরবান সদর</option>
                                                    <option value="লামা">লামা</option>
                                                    <option value="নাইক্ষ্যংছড়ি">নাইক্ষ্যংছড়ি</option>
                                                    <option value="রোয়াংছড়ি">রোয়াংছড়ি</option>
                                                    <option value="রুমা ">রুমা </option>
                                                    <option value="থানচি">থানচি</option>
                                                    <option value="আখাউড়া">আখাউড়া</option>
                                                    <option value="বাঞ্ছারামপুর ">বাঞ্ছারামপুর </option>
                                                    <option value="বিজয়নগর">বিজয়নগর</option>
                                                    <option value="ব্রাহ্মণবাড়িয়া সদর">ব্রাহ্মণবাড়িয়া সদর</option>
                                                    <option value="আশুগঞ্জ">আশুগঞ্জ</option>
                                                    <option value="কসবা">কসবা</option>
                                                    <option value="নবীনগর">নবীনগর</option>
                                                    <option value="নাসিরনগর">নাসিরনগর</option>
                                                    <option value="সরাইল">সরাইল</option>
                                                    <option value="চাঁদপুর সদর">চাঁদপুর সদর</option>
                                                    <option value="ফরিদগঞ্জ">ফরিদগঞ্জ</option>
                                                    <option value="হাইমচর">হাইমচর</option>
                                                    <option value="হাজীগঞ্জ">হাজীগঞ্জ</option>
                                                    <option value="কচুয়া">কচুয়া</option>
                                                    <option value="মতলব দক্ষিণ">মতলব দক্ষিণ</option>
                                                    <option value="মতলব উত্তর">মতলব উত্তর</option>
                                                    <option value="শাহরাস্তি">শাহরাস্তি</option>
                                                    <option value="আনোয়ারা">আনোয়ারা</option>
                                                    <option value="বাঁশখালী">বাঁশখালী</option>
                                                    <option value="বোয়ালখালী">বোয়ালখালী</option>
                                                    <option value="চন্দনাইশ">চন্দনাইশ</option>
                                                    <option value="ফটিকছড়ি">ফটিকছড়ি</option>
                                                    <option value="হাটহাজারী">হাটহাজারী</option>
                                                    <option value="লোহাগাড়া">লোহাগাড়া</option>
                                                    <option value="মীরসরাই">মীরসরাই</option>
                                                    <option value="পটিয়া">পটিয়া</option>
                                                    <option value="রাঙ্গুনিয়া">রাঙ্গুনিয়া</option>
                                                    <option value="রাউজান">রাউজান</option>
                                                    <option value="সন্দ্বীপ">সন্দ্বীপ</option>
                                                    <option value="সাতকানিয়া">সাতকানিয়া</option>
                                                    <option value="সীতাকুণ্ড">সীতাকুণ্ড</option>
                                                    <option value="বরুড়া">বরুড়া</option>
                                                    <option value="ব্রাহ্মণপাড়া">ব্রাহ্মণপাড়া</option>
                                                    <option value="বুড়িচং">বুড়িচং</option>
                                                    <option value="চান্দিনা">চান্দিনা</option>
                                                    <option value="চৌদ্দগ্রাম">চৌদ্দগ্রাম</option>
                                                    <option value="কুমিল্লা সদর দক্ষিণ">কুমিল্লা সদর দক্ষিণ</option>
                                                    <option value="দাউদকান্দি">দাউদকান্দি</option>
                                                    <option value="দেবিদ্বার">দেবিদ্বার</option>
                                                    <option value="হোমনা ">হোমনা </option>
                                                    <option value="কুমিল্লা সদর">কুমিল্লা সদর</option>
                                                    <option value="লাকসাম">লাকসাম</option>
                                                    <option value="মনোহরগঞ্জ">মনোহরগঞ্জ</option>
                                                    <option value="মেঘনা">মেঘনা</option>
                                                    <option value="মুরাদনগর">মুরাদনগর</option>
                                                    <option value="নাঙ্গলকোট">নাঙ্গলকোট</option>
                                                    <option value="তিতাস">তিতাস</option>
                                                    <option value="চকরিয়া">চকরিয়া</option>
                                                    <option value="কক্সবাজার সদর">কক্সবাজার সদর</option>
                                                    <option value="কুতুবদিয়া">কুতুবদিয়া</option>
                                                    <option value="মহেশখালী">মহেশখালী</option>
                                                    <option value="পেকুয়া">পেকুয়া</option>
                                                    <option value="রামু">রামু</option>
                                                    <option value="টেকনাফ">টেকনাফ</option>
                                                    <option value="উখিয়া">উখিয়া</option>
                                                    <option value="ছাগলনাইয়া">ছাগলনাইয়া</option>
                                                    <option value="দাগনভূঞা">দাগনভূঞা</option>
                                                    <option value="ফেনী সদর">ফেনী সদর</option>
                                                    <option value="ফুলগাজী">ফুলগাজী</option>
                                                    <option value="পরশুরাম">পরশুরাম</option>
                                                    <option value="সোনাগাজী">সোনাগাজী</option>
                                                    <option value="দিঘীনালা">দিঘীনালা</option>
                                                    <option value="মানিকছড়ি">মানিকছড়ি</option>
                                                    <option value="খাগড়াছড়ি সদর">খাগড়াছড়ি সদর</option>
                                                    <option value="লক্ষীছড়ি">লক্ষীছড়ি</option>
                                                    <option value="মহালছড়ি">মহালছড়ি</option>
                                                    <option value="মাটিরাঙ্গা">মাটিরাঙ্গা</option>
                                                    <option value="পানছড়ি">পানছড়ি</option>
                                                    <option value="রামগড়">রামগড়</option>
                                                    <option value="কমলনগর">কমলনগর</option>
                                                    <option value="লক্ষ্মীপুর সদর">লক্ষ্মীপুর সদর</option>
                                                    <option value="রায়পুর">রায়পুর</option>
                                                    <option value="রামগঞ্জ">রামগঞ্জ</option>
                                                    <option value="রামগতি ">রামগতি </option>
                                                    <option value="বেগমগঞ্জ">বেগমগঞ্জ</option>
                                                    <option value="চাটখিল">চাটখিল</option>
                                                    <option value="কোম্পানীগঞ্জ">কোম্পানীগঞ্জ</option>
                                                    <option value="হাতিয়া">হাতিয়া</option>
                                                    <option value="সেনবাগ">সেনবাগ</option>
                                                    <option value="সোনাইমুড়ী">সোনাইমুড়ী</option>
                                                    <option value="সুবর্ণচর">সুবর্ণচর</option>
                                                    <option value="নোয়াখালী ">নোয়াখালী </option>
                                                    <option value="বাঘাইছড়ি">বাঘাইছড়ি</option>
                                                    <option value="বরকল">বরকল</option>
                                                    <option value="কাউখালী">কাউখালী</option>
                                                    <option value="কাপ্তাই ">কাপ্তাই </option>
                                                    <option value="জুরাছড়ি">জুরাছড়ি</option>
                                                    <option value="লংগদু ">লংগদু </option>
                                                    <option value="নানিয়ারচর ">নানিয়ারচর </option>
                                                    <option value="রাঙ্গামাটি সদর">রাঙ্গামাটি সদর</option>
                                                    <option value="রাজস্থলী">রাজস্থলী</option>
                                                    <option value="বিলাইছড়ি">বিলাইছড়ি</option>
                                                    <option value="তেজগাঁও উন্নয়ন সার্কেল">তেজগাঁও উন্নয়ন সার্কেল</option>
                                                    <option value="বাড্ডা">বাড্ডা</option>
                                                    <option value="বংশাল">বংশাল</option>
                                                    <option value="বিমান বন্দর">বিমান বন্দর</option>
                                                    <option value="বনানী">বনানী</option>
                                                    <option value="সেনানিবাস">সেনানিবাস</option>
                                                    <option value="চকবাজার">চকবাজার</option>
                                                    <option value="দক্ষিনখান">দক্ষিনখান</option>
                                                    <option value="দারুস সালাম">দারুস সালাম</option>
                                                    <option value="ডেমরা">ডেমরা</option>
                                                    <option value="ধামরাই">ধামরাই</option>
                                                    <option value="দোহার">দোহার</option>
                                                    <option value="কেরাণীগঞ্জ">কেরাণীগঞ্জ</option>
                                                    <option value="নবাবগঞ্জ">নবাবগঞ্জ</option>
                                                    <option value="সাভার">সাভার</option>
                                                    <option value="আলফাডাঙ্গা">আলফাডাঙ্গা</option>
                                                    <option value="ভাঙ্গা">ভাঙ্গা</option>
                                                    <option value="বোয়ালমারী">বোয়ালমারী</option>
                                                    <option value="চরভদ্রাসন">চরভদ্রাসন</option>
                                                    <option value="ফরিদপুর সদর">ফরিদপুর সদর</option>
                                                    <option value="মধুখালী">মধুখালী</option>
                                                    <option value="নগরকান্দা">নগরকান্দা</option>
                                                    <option value="সদরপুর">সদরপুর</option>
                                                    <option value="সালথা">সালথা</option>
                                                    <option value="গাজীপুর সদর">গাজীপুর সদর</option>
                                                    <option value="কালিয়াকৈর">কালিয়াকৈর</option>
                                                    <option value="কালীগঞ্জ">কালীগঞ্জ</option>
                                                    <option value="কাপাসিয়া">কাপাসিয়া</option>
                                                    <option value="শ্রীপুর">শ্রীপুর</option>
                                                    <option value="গোপালগঞ্জ সদর">গোপালগঞ্জ সদর</option>
                                                    <option value="কাশিয়ানী">কাশিয়ানী</option>
                                                    <option value="কোটালীপাড়া">কোটালীপাড়া</option>
                                                    <option value="মুকসুদপুর">মুকসুদপুর</option>
                                                    <option value="টুংগীপাড়া">টুংগীপাড়া</option>
                                                    <option value="বকশীগঞ্জ">বকশীগঞ্জ</option>
                                                    <option value="দেওয়ানগঞ্জ">দেওয়ানগঞ্জ</option>
                                                    <option value="ইসলামপুর">ইসলামপুর</option>
                                                    <option value="জামালপুর সদর">জামালপুর সদর</option>
                                                    <option value="মাদারগঞ্জ">মাদারগঞ্জ</option>
                                                    <option value="মেলান্দহ">মেলান্দহ</option>
                                                    <option value="সরিষাবাড়ী">সরিষাবাড়ী</option>
                                                    <option value="অষ্টগ্রাম">অষ্টগ্রাম</option>
                                                    <option value="বাজিতপুর">বাজিতপুর</option>
                                                    <option value="ভৈরব">ভৈরব</option>
                                                    <option value="হোসেনপুর">হোসেনপুর</option>
                                                    <option value="ইটনা">ইটনা</option>
                                                    <option value="করিমগঞ্জ">করিমগঞ্জ</option>
                                                    <option value="কটিয়াদী">কটিয়াদী</option>
                                                    <option value="কিশোরগঞ্জ সদর">কিশোরগঞ্জ সদর</option>
                                                    <option value="কুলিয়ারচর">কুলিয়ারচর</option>
                                                    <option value="মিঠামইন">মিঠামইন</option>
                                                    <option value="নিকলী">নিকলী</option>
                                                    <option value="পাকুন্দিয়া">পাকুন্দিয়া</option>
                                                    <option value="তাড়াইল">তাড়াইল</option>
                                                    <option value="কালকিনি">কালকিনি</option>
                                                    <option value="মাদারীপুর সদর">মাদারীপুর সদর</option>
                                                    <option value="রাজৈর">রাজৈর</option>
                                                    <option value="শিবচর">শিবচর</option>
                                                    <option value="দৌলতপুর">দৌলতপুর</option>
                                                    <option value="ঘিওর">ঘিওর</option>
                                                    <option value="হরিরামপুর">হরিরামপুর</option>
                                                    <option value="মানিকগঞ্জ সদর">মানিকগঞ্জ সদর</option>
                                                    <option value="সাটুরিয়া">সাটুরিয়া</option>
                                                    <option value="শিবালয়">শিবালয়</option>
                                                    <option value="সিংগাইর">সিংগাইর</option>
                                                    <option value="গজারিয়া">গজারিয়া</option>
                                                    <option value="লৌহজং">লৌহজং</option>
                                                    <option value="মুন্সিগঞ্জ সদর">মুন্সিগঞ্জ সদর</option>
                                                    <option value="সিরাজদিখান">সিরাজদিখান</option>
                                                    <option value="শ্রীনগর">শ্রীনগর</option>
                                                    <option value="টংগিবাড়ী">টংগিবাড়ী</option>
                                                    <option value="ভালুকা">ভালুকা</option>
                                                    <option value="ধোবাউড়া">ধোবাউড়া</option>
                                                    <option value="ফুলবাড়ীয়া">ফুলবাড়ীয়া</option>
                                                    <option value="গফরগাঁও">গফরগাঁও</option>
                                                    <option value="গৌরীপুর">গৌরীপুর</option>
                                                    <option value="হালুয়াঘাট">হালুয়াঘাট</option>
                                                    <option value="ঈশ্বরগঞ্জ">ঈশ্বরগঞ্জ</option>
                                                    <option value="ময়মনসিংহ সদর">ময়মনসিংহ সদর</option>
                                                    <option value="মুক্তাগাছা">মুক্তাগাছা</option>
                                                    <option value="নান্দাইল">নান্দাইল</option>
                                                    <option value="ফুলপুর">ফুলপুর</option>
                                                    <option value="তারাকান্দা">তারাকান্দা</option>
                                                    <option value="ত্রিশাল">ত্রিশাল</option>
                                                    <option value="আড়াইহাজার">আড়াইহাজার</option>
                                                    <option value="সোনারগাঁ">সোনারগাঁ</option>
                                                    <option value="নারায়নগঞ্জ সদর">নারায়নগঞ্জ সদর</option>
                                                    <option value="রূপগঞ্জ">রূপগঞ্জ</option>
                                                    <option value="বেলাবো">বেলাবো</option>
                                                    <option value="মনোহরদী">মনোহরদী</option>
                                                    <option value="নরসিংদী ">নরসিংদী </option>
                                                    <option value="পলাশ">পলাশ</option>
                                                    <option value="রায়পুরা">রায়পুরা</option>
                                                    <option value="শিবপুর">শিবপুর</option>
                                                    <option value="আটপাড়া">আটপাড়া</option>
                                                    <option value="বারহাট্টা">বারহাট্টা</option>
                                                    <option value="দুর্গাপুর">দুর্গাপুর</option>
                                                    <option value="খালিয়াজুরী">খালিয়াজুরী</option>
                                                    <option value="কলমাকান্দা">কলমাকান্দা</option>
                                                    <option value="কেন্দুয়া">কেন্দুয়া</option>
                                                    <option value="মদন">মদন</option>
                                                    <option value="মোহনগঞ্জ">মোহনগঞ্জ</option>
                                                    <option value="নেত্রকোণা সদর">নেত্রকোণা সদর</option>
                                                    <option value="বালিয়াকান্দি">বালিয়াকান্দি</option>
                                                    <option value="গোয়ালন্দ">গোয়ালন্দ</option>
                                                    <option value="কালুখালী">কালুখালী</option>
                                                    <option value="পাংশা">পাংশা</option>
                                                    <option value="রাজবাড়ী সদর">রাজবাড়ী সদর</option>
                                                    <option value="ভেদরগঞ্জ">ভেদরগঞ্জ</option>
                                                    <option value="ডামুড্যা">ডামুড্যা</option>
                                                    <option value="গোসাইরহাট">গোসাইরহাট</option>
                                                    <option value="নড়িয়া">নড়িয়া</option>
                                                    <option value="শরিয়তপুর সদর">শরিয়তপুর সদর</option>
                                                    <option value="জাজিরা">জাজিরা</option>
                                                    <option value="ঝিনাইগাতী">ঝিনাইগাতী</option>
                                                    <option value="নকলা">নকলা</option>
                                                    <option value="নালিতাবাড়ী">নালিতাবাড়ী</option>
                                                    <option value="শেরপুর সদর">শেরপুর সদর</option>
                                                    <option value="শ্রীবরদী">শ্রীবরদী</option>
                                                    <option value="বাসাইল">বাসাইল</option>
                                                    <option value="ভুয়াপুর">ভুয়াপুর</option>
                                                    <option value="দেলদুয়ার">দেলদুয়ার</option>
                                                    <option value="ধনবাড়ী">ধনবাড়ী</option>
                                                    <option value="ঘাটাইল">ঘাটাইল</option>
                                                    <option value="গোপালপুর">গোপালপুর</option>
                                                    <option value="কালিহাতী">কালিহাতী</option>
                                                    <option value="মধুপুর">মধুপুর</option>
                                                    <option value="মির্জাপুর">মির্জাপুর</option>
                                                    <option value="নাগরপুর">নাগরপুর</option>
                                                    <option value="সখিপুর">সখিপুর</option>
                                                    <option value="টাঙ্গাইল সদর">টাঙ্গাইল সদর</option>
                                                    <option value="চিতলমারী ">চিতলমারী </option>
                                                    <option value="ফকিরহাট ">ফকিরহাট </option>
                                                    <option value="কচুয়া ">কচুয়া </option>
                                                    <option value="মোল্লাহাট ">মোল্লাহাট </option>
                                                    <option value="মোংলা ">মোংলা </option>
                                                    <option value="মোড়েলগঞ্জ ">মোড়েলগঞ্জ </option>
                                                    <option value="রামপাল ">রামপাল </option>
                                                    <option value="শরণখোলা">শরণখোলা</option>
                                                    <option value="আলমডাঙ্গা ">আলমডাঙ্গা </option>
                                                    <option value="চুয়াডাঙ্গা সদর ">চুয়াডাঙ্গা সদর </option>
                                                    <option value="দামুড়হুদা ">দামুড়হুদা </option>
                                                    <option value="জীবননগর ">জীবননগর </option>
                                                    <option value="অভয়নগর ">অভয়নগর </option>
                                                    <option value="বাঘারপাড়া ">বাঘারপাড়া </option>
                                                    <option value="চৌগাছা">চৌগাছা</option>
                                                    <option value="ঝিকরগাছা ">ঝিকরগাছা </option>
                                                    <option value="কেশবপুর ">কেশবপুর </option>
                                                    <option value="যশোর সদর ">যশোর সদর </option>
                                                    <option value="মণিরামপুর">মণিরামপুর</option>
                                                    <option value="শার্শা ">শার্শা </option>
                                                    <option value="হরিণাকুন্ডু ">হরিণাকুন্ডু </option>
                                                    <option value="ঝিনাইদহ সদর">ঝিনাইদহ সদর</option>
                                                    <option value="কালীগঞ্জ ">কালীগঞ্জ </option>
                                                    <option value="কোটচাঁদপুর ">কোটচাঁদপুর </option>
                                                    <option value="মহেশপুর ">মহেশপুর </option>
                                                    <option value="শৈলকুপা ">শৈলকুপা </option>
                                                    <option value="বটিয়াঘাটা ">বটিয়াঘাটা </option>
                                                    <option value="দাকোপ ">দাকোপ </option>
                                                    <option value="ডুমুরিয়া ">ডুমুরিয়া </option>
                                                    <option value="কয়রা ">কয়রা </option>
                                                    <option value="পাইকগাছা ">পাইকগাছা </option>
                                                    <option value="ফুলতলা ">ফুলতলা </option>
                                                    <option value="রূপসা ">রূপসা </option>
                                                    <option value="তেরখাদা ">তেরখাদা </option>
                                                    <option value="দিঘলিয়া">দিঘলিয়া</option>
                                                    <option value="ভেড়ামারা ">ভেড়ামারা </option>
                                                    <option value="দৌলতপুর ">দৌলতপুর </option>
                                                    <option value="খোকসা">খোকসা</option>
                                                    <option value="কুমারখালী ">কুমারখালী </option>
                                                    <option value="কুষ্টিয়া সদর ">কুষ্টিয়া সদর </option>
                                                    <option value="মিরপুর ">মিরপুর </option>
                                                    <option value="মাগুরা সদর ">মাগুরা সদর </option>
                                                    <option value="মহম্মদপুর ">মহম্মদপুর </option>
                                                    <option value="শালিখা ">শালিখা </option>
                                                    <option value="শ্রীপুর ">শ্রীপুর </option>
                                                    <option value="গাংনী ">গাংনী </option>
                                                    <option value="মুজিবনগর ">মুজিবনগর </option>
                                                    <option value="মেহেরপুর সদর">মেহেরপুর সদর</option>
                                                    <option value="কালিয়া">কালিয়া</option>
                                                    <option value="লোহাগড়া">লোহাগড়া</option>
                                                    <option value="নড়াইল সদর ">নড়াইল সদর </option>
                                                    <option value="আশাশুনি ">আশাশুনি </option>
                                                    <option value="দেবহাটা ">দেবহাটা </option>
                                                    <option value="কলারোয়া ">কলারোয়া </option>
                                                    <option value="কালিগঞ্জ ">কালিগঞ্জ </option>
                                                    <option value="সাতক্ষীরা সদর">সাতক্ষীরা সদর</option>
                                                    <option value="শ্যামনগর ">শ্যামনগর </option>
                                                    <option value="তালা ">তালা </option>
                                                    <option value="আদমদিঘি">আদমদিঘি</option>
                                                    <option value="বগুড়া  সদর">বগুড়া  সদর</option>
                                                    <option value="ধুনট">ধুনট</option>
                                                    <option value="দুপচাচিঁয়া">দুপচাচিঁয়া</option>
                                                    <option value="গাবতলি">গাবতলি</option>
                                                    <option value="কাহালু">কাহালু</option>
                                                    <option value="নন্দিগ্রাম">নন্দিগ্রাম</option>
                                                    <option value="সারিয়াকান্দি">সারিয়াকান্দি</option>
                                                    <option value="শাজাহানপুর">শাজাহানপুর</option>
                                                    <option value="শেরপুর">শেরপুর</option>
                                                    <option value="শিবগঞ্জ">শিবগঞ্জ</option>
                                                    <option value="সোনাতলা ">সোনাতলা </option>
                                                    <option value="আক্কেলপুর ">আক্কেলপুর </option>
                                                    <option value=" জয়পুরহাট সদর"> জয়পুরহাট সদর</option>
                                                    <option value="কালাই">কালাই</option>
                                                    <option value="আত্রাই">আত্রাই</option>
                                                    <option value="ধামইরহাট">ধামইরহাট</option>
                                                    <option value="মান্দা">মান্দা</option>
                                                    <option value="মহাদেবপুর">মহাদেবপুর</option>
                                                    <option value="নওগাঁ সদর">নওগাঁ সদর</option>
                                                    <option value="নিয়ামতপুর">নিয়ামতপুর</option>
                                                    <option value="পত্নীতলা">পত্নীতলা</option>
                                                    <option value="রাণীনগর">রাণীনগর</option>
                                                    <option value="সাপাহার">সাপাহার</option>
                                                    <option value="বদলগাছী">বদলগাছী</option>
                                                    <option value="পোরশা">পোরশা</option>
                                                    <option value="বাগাতিপাড়া">বাগাতিপাড়া</option>
                                                    <option value="বড়াইগ্রাম">বড়াইগ্রাম</option>
                                                    <option value="গুরুদাসপুর">গুরুদাসপুর</option>
                                                    <option value="লালপুর">লালপুর</option>
                                                    <option value="নাটোর সদর">নাটোর সদর</option>
                                                    <option value="সিংরা">সিংরা</option>
                                                    <option value="ভোলাহাট">ভোলাহাট</option>
                                                    <option value="গোমস্তাপুর">গোমস্তাপুর</option>
                                                    <option value="নাচোল">নাচোল</option>
                                                    <option value="চাঁপাই নাবাবগঞ্জ সদর">চাঁপাই নাবাবগঞ্জ সদর</option>
                                                    <option value="শিবগঞ্জ ">শিবগঞ্জ </option>
                                                    <option value="আটঘারিয়া">আটঘারিয়া</option>
                                                    <option value="বেড়া">বেড়া</option>
                                                    <option value="ভাঙ্গুরা">ভাঙ্গুরা</option>
                                                    <option value="চাটমোহর ">চাটমোহর </option>
                                                    <option value="ফরিদপুর">ফরিদপুর</option>
                                                    <option value="ঈশ্বরদী ">ঈশ্বরদী </option>
                                                    <option value="পাবনা সদর">পাবনা সদর</option>
                                                    <option value="সাঁথিয়া">সাঁথিয়া</option>
                                                    <option value="সুজানগর">সুজানগর</option>
                                                    <option value="বাঘা">বাঘা</option>
                                                    <option value="বাগমারা">বাগমারা</option>
                                                    <option value="চারঘাট ">চারঘাট </option>
                                                    <option value="দুর্গাপুর ">দুর্গাপুর </option>
                                                    <option value="গোদাগাড়ী ">গোদাগাড়ী </option>
                                                    <option value="মোহনপুর">মোহনপুর</option>
                                                    <option value="পবা">পবা</option>
                                                    <option value="পুথিয়া">পুথিয়া</option>
                                                    <option value="তানোর">তানোর</option>
                                                    <option value="বেলকুচি ">বেলকুচি </option>
                                                    <option value="চৌহালি">চৌহালি</option>
                                                    <option value="কামারখন্দ">কামারখন্দ</option>
                                                    <option value="কাজিপুর">কাজিপুর</option>
                                                    <option value="রাইগঞ্জ">রাইগঞ্জ</option>
                                                    <option value="শাহজাদপুর">শাহজাদপুর</option>
                                                    <option value="সিরাজগঞ্জ সদর">সিরাজগঞ্জ সদর</option>
                                                    <option value="তারাশ">তারাশ</option>
                                                    <option value="উল্লাহ পারা">উল্লাহ পারা</option>
                                                    <option value="বিরামপুর ">বিরামপুর </option>
                                                    <option value="বীরগঞ্জ">বীরগঞ্জ</option>
                                                    <option value="বিরল">বিরল</option>
                                                    <option value="বোচাগঞ্জ">বোচাগঞ্জ</option>
                                                    <option value="চিরিরবন্দর">চিরিরবন্দর</option>
                                                    <option value="ফুলবাড়ী">ফুলবাড়ী</option>
                                                    <option value="ঘোড়াঘাট">ঘোড়াঘাট</option>
                                                    <option value="হাকিমপুর">হাকিমপুর</option>
                                                    <option value="কাহারোল">কাহারোল</option>
                                                    <option value="খানসামা">খানসামা</option>
                                                    <option value="নবাবগঞ্জ">নবাবগঞ্জ</option>
                                                    <option value="পার্বতীপুর">পার্বতীপুর</option>
                                                    <option value="দিনাজপুর সদর">দিনাজপুর সদর</option>
                                                    <option value="ফুলছড়ি">ফুলছড়ি</option>
                                                    <option value="গাইবান্ধা সদর">গাইবান্ধা সদর</option>
                                                    <option value="গোবিন্দগঞ্জ">গোবিন্দগঞ্জ</option>
                                                    <option value="পলাশবাড়ী">পলাশবাড়ী</option>
                                                    <option value="সাদুল্লাপুর">সাদুল্লাপুর</option>
                                                    <option value="সাঘাটা">সাঘাটা</option>
                                                    <option value="সুন্দরগঞ্জ">সুন্দরগঞ্জ</option>
                                                    <option value="ভুরুঙ্গামারী">ভুরুঙ্গামারী</option>
                                                    <option value="চর রাজিবপুর">চর রাজিবপুর</option>
                                                    <option value="চিলমারী ">চিলমারী </option>
                                                    <option value="ফুলবাড়ী">ফুলবাড়ী</option>
                                                    <option value="কুড়িগ্রাম সদর">কুড়িগ্রাম সদর</option>
                                                    <option value="নাগেশ্বরী">নাগেশ্বরী</option>
                                                    <option value="রাজারহাট">রাজারহাট</option>
                                                    <option value="রৌমারী">রৌমারী</option>
                                                    <option value="উলিপুর">উলিপুর</option>
                                                    <option value="আদিতমারী">আদিতমারী</option>
                                                    <option value="হাতীবান্ধা">হাতীবান্ধা</option>
                                                    <option value="কালীগঞ্জ">কালীগঞ্জ</option>
                                                    <option value="লালমনিরহাট সদর">লালমনিরহাট সদর</option>
                                                    <option value="পাটগ্রাম">পাটগ্রাম</option>
                                                    <option value="ডোমার উপজেলা">ডোমার উপজেলা</option>
                                                    <option value="জলঢাকা">জলঢাকা</option>
                                                    <option value="কিশোরগঞ্জ">কিশোরগঞ্জ</option>
                                                    <option value="নীলফামারী সদর">নীলফামারী সদর</option>
                                                    <option value="সৈয়দপুর উপজেলা">সৈয়দপুর উপজেলা</option>
                                                    <option value="ডিমলা">ডিমলা</option>
                                                    <option value="আটোয়ারী">আটোয়ারী</option>
                                                    <option value="বোদা">বোদা</option>
                                                    <option value="দেবীগঞ্জ">দেবীগঞ্জ</option>
                                                    <option value="পঞ্চগড় সদর">পঞ্চগড় সদর</option>
                                                    <option value="তেতুলিয়া">তেতুলিয়া</option>
                                                    <option value="বদরগঞ্জ">বদরগঞ্জ</option>
                                                    <option value="কাউনিয়া">কাউনিয়া</option>
                                                    <option value="রংপুর সদর">রংপুর সদর</option>
                                                    <option value="মিঠাপুকুর">মিঠাপুকুর</option>
                                                    <option value="পীরগাছা">পীরগাছা</option>
                                                    <option value="পীরগঞ্জ ">পীরগঞ্জ </option>
                                                    <option value="তারাগঞ্জ">তারাগঞ্জ</option>
                                                    <option value="গঙ্গাচড়া">গঙ্গাচড়া</option>
                                                    <option value="বালিয়াডাঙ্গী">বালিয়াডাঙ্গী</option>
                                                    <option value="হরিপুর">হরিপুর</option>
                                                    <option value="পীরগঞ্জ">পীরগঞ্জ</option>
                                                    <option value="রাণীশংকৈল">রাণীশংকৈল</option>
                                                    <option value="ঠাকুরগাঁও সদর">ঠাকুরগাঁও সদর</option>
                                                    <option value="আজমিরীগঞ্জ">আজমিরীগঞ্জ</option>
                                                    <option value="বাহুবল ">বাহুবল </option>
                                                    <option value="বানিয়াচং ">বানিয়াচং </option>
                                                    <option value="চুনারুঘাট ">চুনারুঘাট </option>
                                                    <option value="হবিগঞ্জ সদর ">হবিগঞ্জ সদর </option>
                                                    <option value="লাখাই ">লাখাই </option>
                                                    <option value="মাধবপুর ">মাধবপুর </option>
                                                    <option value="নবীগঞ্জ ">নবীগঞ্জ </option>
                                                    <option value="বড়লেখা ">বড়লেখা </option>
                                                    <option value="জুড়ী ">জুড়ী </option>
                                                    <option value="কমলগঞ্জ ">কমলগঞ্জ </option>
                                                    <option value="কুলাউড়া ">কুলাউড়া </option>
                                                    <option value="মৌলভীবাজার সদর ">মৌলভীবাজার সদর </option>
                                                    <option value="রাজনগর ">রাজনগর </option>
                                                    <option value="শ্রীমঙ্গল">শ্রীমঙ্গল</option>
                                                    <option value="বিশ্বম্ভরপুর ">বিশ্বম্ভরপুর </option>
                                                    <option value="ছাতক ">ছাতক </option>
                                                    <option value="দিরাই ">দিরাই </option>
                                                    <option value="ধর্মপাশা ">ধর্মপাশা </option>
                                                    <option value="দোয়ারাবাজার ">দোয়ারাবাজার </option>
                                                    <option value="জগন্নাথপুর ">জগন্নাথপুর </option>
                                                    <option value="জামালগঞ্জ ">জামালগঞ্জ </option>
                                                    <option value="শাল্লা ">শাল্লা </option>
                                                    <option value="সুনামগঞ্জ সদর ">সুনামগঞ্জ সদর </option>
                                                    <option value="তাহিরপুর ">তাহিরপুর </option>
                                                    <option value="দক্ষিণ  সুনামগঞ্জ">দক্ষিণ  সুনামগঞ্জ</option>
                                                    <option value="বালাগঞ্জ ">বালাগঞ্জ </option>
                                                    <option value="বিয়ানীবাজার ">বিয়ানীবাজার </option>
                                                    <option value="বিশ্বনাথ ">বিশ্বনাথ </option>
                                                    <option value="কোম্পানীগঞ্জ ">কোম্পানীগঞ্জ </option>
                                                    <option value="দক্ষিণ সুরমা ">দক্ষিণ সুরমা </option>
                                                    <option value="ফেঞ্চুগঞ্জ ">ফেঞ্চুগঞ্জ </option>
                                                    <option value="গোলাপগঞ্জ ">গোলাপগঞ্জ </option>
                                                    <option value="গোয়াইনঘাট ">গোয়াইনঘাট </option>
                                                    <option value="জৈন্তাপুর ">জৈন্তাপুর </option>
                                                    <option value="কানাইঘাট ">কানাইঘাট </option>
                                                    <option value="সিলেট সদর ">সিলেট সদর </option>
                                                    <option value="জকিগঞ্জ ">জকিগঞ্জ </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-5">
                                                জেলা: <div class="select2-container district form-control input-inline" id="s2id_p_d"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen" id="select2-chosen-4">জেলা বাছাই করুন</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen4" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-4" id="s2id_autogen4"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <label for="s2id_autogen4_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-4" id="s2id_autogen4_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-4">   </ul></div></div><select id="p_d" name="p_d" class="district form-control input-inline select2-offscreen" tabindex="-1" title="">
                                                    <option value="">জেলা বাছাই করুন</option>
                                                    <option value="বরগুনা">বরগুনা</option>
                                                    <option value="বরিশাল">বরিশাল</option>
                                                    <option value="ভোলা">ভোলা</option>
                                                    <option value="ঝালকাঠি">ঝালকাঠি</option>
                                                    <option value="পটুয়াখালী ">পটুয়াখালী </option>
                                                    <option value="পিরোজপুর ">পিরোজপুর </option>
                                                    <option value="বান্দরবান">বান্দরবান</option>
                                                    <option value="ব্রাহ্মণবাড়িয়া">ব্রাহ্মণবাড়িয়া</option>
                                                    <option value="চাঁদপুর">চাঁদপুর</option>
                                                    <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                                                    <option value="কুমিল্লা">কুমিল্লা</option>
                                                    <option value="কক্সবাজার ">কক্সবাজার </option>
                                                    <option value="ফেনী">ফেনী</option>
                                                    <option value="খাগড়াছড়ি">খাগড়াছড়ি</option>
                                                    <option value="লক্ষ্মীপুর">লক্ষ্মীপুর</option>
                                                    <option value="নোয়াখালী">নোয়াখালী</option>
                                                    <option value="রাঙ্গামাটি">রাঙ্গামাটি</option>
                                                    <option value="ঢাকা ">ঢাকা </option>
                                                    <option value="ফরিদপুর ">ফরিদপুর </option>
                                                    <option value="গাজীপুর ">গাজীপুর </option>
                                                    <option value="গোপালগঞ্জ">গোপালগঞ্জ</option>
                                                    <option value="জামালপুর ">জামালপুর </option>
                                                    <option value="কিশোরগঞ্জ ">কিশোরগঞ্জ </option>
                                                    <option value="মাদারীপুর ">মাদারীপুর </option>
                                                    <option value="মানিকগঞ্জ ">মানিকগঞ্জ </option>
                                                    <option value="মুন্সিগঞ্জ ">মুন্সিগঞ্জ </option>
                                                    <option value="ময়মনসিংহ ">ময়মনসিংহ </option>
                                                    <option value="নারায়ণগঞ্জ ">নারায়ণগঞ্জ </option>
                                                    <option value="নরসিংদী ">নরসিংদী </option>
                                                    <option value="নেত্রকোণা ">নেত্রকোণা </option>
                                                    <option value="রাজবাড়ী ">রাজবাড়ী </option>
                                                    <option value="শরীয়তপুর  ">শরীয়তপুর  </option>
                                                    <option value="শেরপুর ">শেরপুর </option>
                                                    <option value="টাঙ্গাইল ">টাঙ্গাইল </option>
                                                    <option value="বাগেরহাট">বাগেরহাট</option>
                                                    <option value="চুয়াডাঙ্গা ">চুয়াডাঙ্গা </option>
                                                    <option value="যশোর ">যশোর </option>
                                                    <option value="ঝিনাইদহ ">ঝিনাইদহ </option>
                                                    <option value="খুলনা ">খুলনা </option>
                                                    <option value="কুষ্টিয়া ">কুষ্টিয়া </option>
                                                    <option value="মাগুরা">মাগুরা</option>
                                                    <option value="মেহেরপুর ">মেহেরপুর </option>
                                                    <option value="নড়াইল ">নড়াইল </option>
                                                    <option value="সাতক্ষীরা ">সাতক্ষীরা </option>
                                                    <option value="বগুড়া ">বগুড়া </option>
                                                    <option value="জয়পুরহাট">জয়পুরহাট</option>
                                                    <option value="নওগাঁ ">নওগাঁ </option>
                                                    <option value="নাটোর ">নাটোর </option>
                                                    <option value="চাঁপাই নাবাবগঞ্জ ">চাঁপাই নাবাবগঞ্জ </option>
                                                    <option value="পাবনা">পাবনা</option>
                                                    <option value="রাজশাহী ">রাজশাহী </option>
                                                    <option value="সিরাজগঞ্জ">সিরাজগঞ্জ</option>
                                                    <option value="দিনাজপুর ">দিনাজপুর </option>
                                                    <option value="গাইবান্ধা ">গাইবান্ধা </option>
                                                    <option value="কুড়িগ্রাম ">কুড়িগ্রাম </option>
                                                    <option value="লালমনিরহাট ">লালমনিরহাট </option>
                                                    <option value="নীলফামারী">নীলফামারী</option>
                                                    <option value="পঞ্চগড় ">পঞ্চগড় </option>
                                                    <option value="রংপুর ">রংপুর </option>
                                                    <option value="ঠাকুরগাঁও">ঠাকুরগাঁও</option>
                                                    <option value="হবিগঞ্জ ">হবিগঞ্জ </option>
                                                    <option value="মৌলভীবাজার ">মৌলভীবাজার </option>
                                                    <option value="সুনামগঞ্জ ">সুনামগঞ্জ </option>
                                                    <option value="সিলেট">সিলেট</option>
                                                </select>
                                            </div>
                                        </div>                            <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                ০৮। কি ধরনের তথ‍্য: <span class="text-danger hidden-print">*</span>
                                                <input name="" class="form-control input-inline input-large" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                ০৯। কোন পদ্ধতিতে তথ‍্য পেতে আগ্রহী:&nbsp; <select class="">
                                                    <option value="ছাপানো">ছাপানো</option>
                                                    <option value="ফটোকপি">ফটোকপি</option>
                                                    <option value="লিখিত">লিখিত</option>
                                                    <option value="ই-মেইল">ই-মেইল</option>
                                                    <option value="ফ্যাক্স">ফ্যাক্স</option>
                                                    <option value="সিডি">সিডি</option>
                                                    <option value="অন‍্যান‍্য">অন্যান্য</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                ১০। তথ‍্য গ্রহণকারীর নাম ও ঠিকানা: <span class="text-danger hidden-print">*</span> <input name="" class="form-control input-inline input-large" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                                ১১। প্রযোজ‍্যক্ষেত্রে সহায়তাকারীর নাম ও ঠিকানা: <span class="text-danger hidden-print">*</span> <input name="" class="form-control input-inline input-large" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="form-group form-md-line-input has-danger">
                                    <div class="col-md-12 col-xs-12 col-sm-12">আমি এই মর্মে ঘোষণা করছি
                                        যে, উপরে বর্ণিত সমুদয় তথ্যাদি সঠিক। অতএব, মহোদয়ের নিকট বিনীত
                                        নিবেদন আমাকে তথ‍্য প্রাপ্তির অনুমতি প্রদান করার জন্য প্রয়োজনীয়
                                        ব্যবস্থা গ্রহণে আপনার একান্ত মর্জি হয়।</div>
                                </div>
                            </div>

                            <br>

                            <div class="row form-group form-md-line-input">
                                <div class="row col-md-4 col-sm-4 col-lg-4 col-xs-12">
                                    <div class="col-md-4 col-lg-3 col-xs-12 col-sm-6">
                                        তারিখ:
                                    </div>
                                    <div class="col-md-8 col-lg-9 col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group date date-picker">
                                                <input type="text" class="form-control" readonly="readonly">
                                    <span class="input-group-addon hidden-print" style="background-color:  #e6f7ff">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-4 col-lg-4 col-xs-12"></div>
                                <div class="col-md-3 col-sm-4 col-lg-4 col-xs-12 text-center" style="margin-left: 30px !important;">
                                    বিনীত নিবেদক <br> আবেদনকারীর স্বাক্ষর
                                    <div class="form-group ">
                                        <div class="fileinput fileinput-new" data-provides="fileinput" style="display: none;">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 120px !important; height: 60px !important; border: none !important; vertical-align: middle !important;">
                                            </div>
                                            <div class="font-sm hidden-print">(সর্বোচ্চ ইমেজ সাইজ: ১০০ কিলোবাইট)</div>
                                            <div>
                                    <span class="btn red btn-outline btn-file">
                                        <span class="fileinput-new hidden-print">স্বাক্ষর সংযুক্ত করুন</span>
                                        <span class="fileinput-exists hidden-print"> পরিবর্তন </span>
                                        <input name="applicant_signature_file" type="file">
                                    </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> বাতিল </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        নাম:
                                        <input class="no-wrap form-control input-inline input-sm same_name" placeholder="" name="" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row" id="nagorik_tothyo">
            <form id="nagorik_tothyo_form">
                <div class="col-md-12 form-body">
                    <h4 class="caption font-red-sunglo">
                        <i class="icon-user-plus font-red-sunglo"></i> <span class="caption-subject bold uppercase"> আবেদনকারীর তথ্য </span>
                    </h4>
                    <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        <label class="col-md-12"> <span class="text-danger">*</span>&nbsp;জন্ম
                            তারিখ (দিন-মাস-বছর)
                        </label>
                        <div class="col-md-12">
                            <input type="text" class="date-picker dob form-control validate[required, minSize[10]]" name="nagorik_dob" id="nagorik_dob" placeholder="dd-mm-yyyy" value="">
                        </div>
                    </div>

                    <div class="form-group col-md-3 col-lg-2 col-sm-3 col-xs-12">
                        <label class="col-md-12"> <span class="text-danger">*</span>&nbsp;মোবাইল
                            নম্বর
                        </label>
                        <div class="col-md-12">
                            <input type="text" class="form-control validate[required, minSize[11], maxSize[11]]" name="nagorik_mobile" id="nagorik_mobile" value="">
                        </div>
                    </div>

                    <div class="form-group col-md-3 col-lg-4 col-sm-3 col-xs-12">
                        <label class="col-md-12"> <span class="text-danger">*</span>&nbsp;ইমেইল
                        </label>
                        <div class="col-md-12">
                            <input type="text" class="form-control validate[required, custom[email]]" name="nagorik_email" id="nagorik_email" value="">
                        </div>
                    </div>

                    <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        <label class="col-md-11"> জাতীয় পরিচয়পত্র নম্বর </label>
                        <div class="col-md-12">
                            <input type="text" class="form-control validate[minSize[13], maxSize[17]]" name="nagorik_nid" id="nagorik_nid" value="">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row captcha_selection text-center">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <h4 class="text-center">
                    <span class="text-danger">*</span>&nbsp; আপনার তথ্যের নিরাপত্তার
                    স্বার্থে নিচের সংখ্যা দুটির যোগফল লিখুন ।
                </h4>
                <h4>
                    <span id="captcha_first">১</span> <span>+</span> <span id="captcha_second">২</span> <span>&nbsp;=&nbsp;</span><input class="input-sm" type="text" id="captcha_result">
                </h4>
            </div>
        </div>

        <script type="text/javascript">

            var FormSubmission = {
                captcha_result_bng : 0,
                captcha_result_eng : 0,
                bangla_arr :['১','২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০'],
                english_arr :[1,2,3,4,5,6,7,8,9,0],

                captcha_form_data:function()
                {
                    var first_value = Math.floor(Math.random() * (4 - 0 + 1)) + 0;
                    var second_value = Math.floor(Math.random() * (5 - 1 + 1)) + 1;
                    FormSubmission.captcha_result_eng = first_value + second_value;

                    var first_value = FormSubmission.bangla_arr[FormSubmission.english_arr.indexOf(first_value)];
                    var second_value = FormSubmission.bangla_arr[FormSubmission.english_arr.indexOf(second_value)];
                    FormSubmission.captcha_result_bng = FormSubmission.bangla_arr[FormSubmission.english_arr.indexOf(FormSubmission.captcha_result_eng)];

                    $("#captcha_first").html(first_value);
                    $("#captcha_second").html(second_value);
                },

                match_captcha:function(captcha_result)
                {
                    if(captcha_result == FormSubmission.captcha_result_eng || captcha_result == FormSubmission.captcha_result_bng)
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                },

                preparePdfView:function(_div_id){
                    $("#"+_div_id+" input,select,textarea").each(function() {
                        if($(this).is("[type='checkbox']") || $(this).is("[type='radio']")) {

                        }
                        else
                        {
                            var field_data = $(this).val();
                            $(this).replaceWith(field_data);
                        }
                    });
                    $("#"+_div_id).find('.fileinput-preview').next().replaceWith('');
                    return _user_from_data = $("#"+_div_id).html();
                },

            };

            $(function()
            {
                $('select.district').select2({
                    allowClear: true
                });
                $(".fileinput").hide();
                $(".form_attachment").hide();
                FormSubmission.captcha_form_data();

                $("#form_draft_btn").bind('click', function(e){
                    FormSubmission.draftForm(0);
                });

                $("#form_draft_edit_btn").bind('click', function(e){
                    FormSubmission.draftForm(1);
                });

                $("#showhtml").find('.portlet').each(function(){
                    $(this).removeClass('portlet').removeClass('light bordered');
                });
                $("#showhtml input[name='applicant_name']").bind('keyup',function(){
                    $('.same_name').val($(this).val());
                });
                $("#showhtml .nid").bind('keyup',function(){
                    $('#nagorik_nid').val($(this).val());
                });
                $("#showhtml .mobile").bind('keyup',function(){
                    $('#nagorik_mobile').val($(this).val());
                });
                $("#showhtml .dob").bind('blur',function(){
                    var dob = $(this).val();
                    dob = PROJAPOTI.englishToBangla(dob);
                    $('#nagorik_dob').val($(this).val());
                });
                $("#showhtml input[name='same_address_checkbox']").bind('click', function(){
                    if($(this).is(':checked'))
                    {
                        $("input[name='p_v'").val($("input[name='per_v'").val());
                        $("input[name='p_p'").val($("input[name='per_p'").val());
                        $("#p_u").select2("val", $("#per_u").val());
                        $("#p_d").select2("val", $("#per_d").val());
                    }
                    else
                    {
                        $("input[name='p_v'").val("");
                        $("input[name='p_p'").val("");
                        $("#p_u").select2("val", "");
                        $("#p_d").select2("val", "");
                    }
                });
            });
        </script>

        <script>
            $('.date-picker').find('input').not('#nagorik_dob').attr('readonly', 'readonly');
            $('.date-picker')
                .datepicker({
                    format:'dd-mm-yyyy',
                    startView: "decade"
                }).on('changeDate', function(e){
                    $(this).datepicker('hide');
                    var dob = $(this).find('input').val();
                    dob = PROJAPOTI.englishToBangla(dob);
                    $(this).find('input').val(dob);
                    if($(this).find('input').hasClass('dob'))
                    {
                        $(".dob").val(dob);
                    }
                });
            $('.date-picker').find('input').val(PROJAPOTI.englishToBangla('04-08-2016'));
            $(".dob").val('');
        </script>
    </div>
    <div class="tab-pane" id="tab3" style="display: none;"></div>
    <div class="tab-pane" id="tab4" style="display: none;"></div>
    <div class="tab-pane" id="tab5" style="display: none;"></div>
</div>