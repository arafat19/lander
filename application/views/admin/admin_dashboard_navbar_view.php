<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>SDIL Lander General Menu</h3>
        <ul class="nav side-menu">
            <li><a href="<?php echo base_url(); ?>admin/country/create"><i class="fa fa-globe"></i> Add Country</a></li>
            <li><a href="<?php echo base_url(); ?>admin/slider/image/create"><i class="fa fa-file-image-o"></i> Add Slider Images</a></li>
            <li><a href="<?php echo base_url(); ?>admin/device/create"><i class="fa fa-mobile-phone"></i> Add Device</a></li>
            <li><a href="<?php echo base_url(); ?>admin/last/button/link/create"><i class="fa fa-external-link"></i> Add Last Button Link</a></li>
            <li><a href="<?php echo base_url(); ?>admin/theme/create"><i class="fa fa-paint-brush"></i> Add Theme</a></li>
            <li><a href="<?php echo base_url(); ?>admin/country/theme/create"><i class="fa fa-cog"></i> Add Country Theme</a></li>
            <?php
                $is_super_admin = $this->session->userdata('is_super_admin');
                if($is_super_admin){
            ?>
                <li><a href="<?php echo base_url(); ?>admin/user/create"><i class="fa fa-group"></i> Add Admin User</a></li>
            <?php } ?>

            <!--<li><a><i class="fa fa-users"></i> Applicants <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?php /*echo base_url();*/?>admin/show/applicants">By Course</a></li>
                    <li><a href="index2.html">By District</a></li>
                    <li><a href="index3.html">By Sub District</a></li>
                </ul>
            </li>-->
            <!--<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="index2.html">Dashboard2</a></li>
                    <li><a href="index3.html">Dashboard3</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="form.html">General Form</a></li>
                    <li><a href="form_advanced.html">Advanced Components</a></li>
                    <li><a href="form_validation.html">Form Validation</a></li>
                    <li><a href="form_wizards.html">Form Wizard</a></li>
                    <li><a href="form_upload.html">Form Upload</a></li>
                    <li><a href="form_buttons.html">Form Buttons</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> UI Elements <span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="general_elements.html">General Elements</a></li>
                    <li><a href="media_gallery.html">Media Gallery</a></li>
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="icons.html">Icons</a></li>
                    <li><a href="glyphicons.html">Glyphicons</a></li>
                    <li><a href="widgets.html">Widgets</a></li>
                    <li><a href="invoice.html">Invoice</a></li>
                    <li><a href="inbox.html">Inbox</a></li>
                    <li><a href="calendar.html">Calendar</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="tables.html">Tables</a></li>
                    <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="chartjs.html">Chart JS</a></li>
                    <li><a href="chartjs2.html">Chart JS2</a></li>
                    <li><a href="morisjs.html">Moris JS</a></li>
                    <li><a href="echarts.html">ECharts</a></li>
                    <li><a href="other_charts.html">Other Charts</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                    <li><a href="fixed_footer.html">Fixed Footer</a></li>
                </ul>
            </li>-->
        </ul>
    </div>
    <!--<div class="menu_section">
        <h3>Live On</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> Additional Pages <span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="e_commerce.html">E-commerce</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="project_detail.html">Project Detail</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    <li><a href="profile.html">Profile</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="page_403.html">403 Error</a></li>
                    <li><a href="page_404.html">404 Error</a></li>
                    <li><a href="page_500.html">500 Error</a></li>
                    <li><a href="plain_page.html">Plain Page</a></li>
                    <li><a href="login.html">Login Page</a></li>
                    <li><a href="pricing_tables.html">Pricing Tables</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="#level1_1">Level One</a>
                    <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#level1_2">Level One</a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span
                        class="label label-success pull-right">Coming Soon</span></a></li>
        </ul>
    </div>-->

</div>
<!-- /sidebar menu -->