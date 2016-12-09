<?php
/**
 * Created by PhpStorm.
 * User: arafat
 * Date: 4/26/16
 * Time: 4:05 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public static $title = 'Admin LogIn - SDIL Lander';
    public static $wrong_title = 'Wrong Email or Password - SDIL Lander';
    public static $wrong_login_message = 'Wrong Email or Password';
    public static $login_title = 'Sign in to continue to SDIL Lander';
    public static $footer_title = 'Shwapnoduar IT Ltd.';
    public static $navbar_title = 'SDIL Lander Admin Panel';
    public static $navbar_super_title = 'SDIL Lander Super Admin Panel';

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
    }

    function index()
    {
        if (($this->session->userdata('admin_email') != "")) {
            $this->welcome_admin_dashboard();
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules

            $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email|callback_not_found_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = Admin::$title;
                $data['login_title'] = Admin::$login_title;
                $this->load->view('admin/header_view', $data);
                $this->load->view('admin/admin_login_index_view', $data);
                $this->load->view('admin/footer_view', $data);
            } else {
                $email = stripslashes($this->input->post('email'));
                $password = stripslashes(md5($this->input->post('password')));

                $result = $this->app_user_model->login_check($email, $password);
                //echo $result;
                if ($result) {
                    $this->welcome_admin_dashboard();
                } else {
                    $data['title'] = Admin::$wrong_title;
                    $this->session->set_flashdata('wrong_login_message', Admin::$wrong_login_message);
                    redirect(base_url() . 'admin/index', 'refresh');
                }
            }

        }
    }

    /*
     * *************************************************************************
     * Lander Country Create, Read (List), Update & Delete Implementation Start
     * *************************************************************************
     */

    public function admin_create_lander_country()
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $created_by = $this->session->userdata('admin_id');
            $is_super_admin = $this->session->userdata('is_super_admin');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_name', 'Country name', 'trim|required|min_length[2]|callback_unique_country_name');
            $this->form_validation->set_rules('country_code', 'Country code', 'trim|required|min_length[2]|callback_unique_country_code');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Country List - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Create Country';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['data_list_title'] = 'All Countries List';
                $data['footer_title'] = Admin::$footer_title;

                $all_countries = $this->app_user_model->get_all_countries($created_by); // Reading and showing the countries list from DB
                $data['all_countries'] = $all_countries;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_country_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;

                $data = array(
                    'lander_country_name' => $this->input->post('country_name'),
                    'lander_country_code' => $this->input->post('country_code'),
                    'is_active' => $is_active,
                    'created_by' => $created_by
                );
                $is_created = $this->app_user_model->create_country($data);
                if ($is_created) {
                    $this->session->set_flashdata('admin_create_country_message', "Country is created successfully.");
                } else {
                    $this->session->set_flashdata('admin_create_country_error_message', "Country is not created successfully. Please try again.");
                }

                redirect(base_url() . 'admin/country/create', 'refresh');
            }
        }
    }

    public function admin_update_lander_country($country_id)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $country_id_dec = base64_decode($country_id);
            $created_by = $this->session->userdata('admin_id');
            $is_super_admin = $this->session->userdata('is_super_admin');
            $single_country = $this->app_user_model->get_single_country_by_id($country_id_dec, $created_by);
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_name', 'Country name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('country_code', 'Country code', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Country - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Country';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['footer_title'] = Admin::$footer_title;


                $data['single_country'] = $single_country;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_country_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $country_name = $this->input->post('country_name');
                $country_code = $this->input->post('country_code');
                $is_active = $this->input->post('is_active') ? 1 : 0;

                $data = array(
                    'lander_country_name' => $country_name,
                    'lander_country_code' => $country_code,
                    'is_active' => $is_active,
                    'modified_by' => $created_by
                );
                $is_updated = FALSE;
                $check_country_name_is_unique = TRUE;
                $check_country_code_is_unique = TRUE;
                if ($country_name == $single_country['lander_country_name'] && $country_code == $single_country['lander_country_code']) {
                    $is_updated = $this->app_user_model->update_country($data, $country_id_dec);
                } else {
                    // Country name and code unique check during update
                    if ($country_name != $single_country['lander_country_name'] && $country_code != $single_country['lander_country_code']) {
                        $check_country_name_is_unique = $this->app_user_model->unique_lander_country_name($country_name, $created_by);
                        if ($check_country_name_is_unique) {
                            $this->session->set_flashdata('admin_country_name_not_unique_message', "Given Country name is already exist");
                        }
                        $check_country_code_is_unique = $this->app_user_model->unique_lander_country_code($country_code, $created_by);
                        if ($check_country_code_is_unique) {
                            $this->session->set_flashdata('admin_country_code_not_unique_message', "Given Country code is already exist");
                        }
                        if ($check_country_name_is_unique || $check_country_code_is_unique) {
                            redirect(base_url() . 'admin/country/update/' . $country_id, 'refresh');
                        }
                    } else if ($country_name != $single_country['lander_country_name'] && $country_code == $single_country['lander_country_code']) {
                        $check_country_name_is_unique = $this->app_user_model->unique_lander_country_name($country_name, $created_by);
                        if ($check_country_name_is_unique) {
                            $this->session->set_flashdata('admin_country_name_not_unique_message', "Given Country name is already exist");
                            $check_country_name_is_unique = FALSE;
                            $check_country_code_is_unique = FALSE;
                            redirect(base_url() . 'admin/country/update/' . $country_id, 'refresh');
                        }
                    } else if ($country_name == $single_country['lander_country_name'] && $country_code != $single_country['lander_country_code']) {
                        $check_country_code_is_unique = $this->app_user_model->unique_lander_country_code($country_code, $created_by);
                        if ($check_country_code_is_unique) {
                            $this->session->set_flashdata('admin_country_code_not_unique_message', "Given Country code is already exist");
                            $check_country_code_is_unique = FALSE;
                            $check_country_name_is_unique = FALSE;
                            redirect(base_url() . 'admin/country/update/' . $country_id, 'refresh');
                        }
                    }
                    if (!$check_country_name_is_unique || !$check_country_code_is_unique) {
                        $is_updated = $this->app_user_model->update_country($data, $country_id_dec);
                    }
                }


                if ($is_updated) {
                    $this->session->set_flashdata('admin_update_country_message', "Selected Country is Updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_update_country_error_message', "Selected Country is not Updated successfully. Please try again.");
                }

                redirect(base_url() . 'admin/country/create', 'refresh');
            }
        }
    }

    public function admin_delete_lander_country($country_id)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $created_by = $this->session->userdata('admin_id');
            $country_id_dec = base64_decode($country_id);
            $single_country = $this->app_user_model->get_single_country_by_id($country_id_dec, $created_by);
            $country_association_count = $this->app_user_model->get_associated_country_count($country_id_dec, $created_by);
            $is_active = $single_country["is_active"];
            if ($country_association_count > 0) {
                $this->session->set_flashdata('cant_delete_associate_message', 'Country ' . $single_country['lander_country_name'] . ' can not be deleted. It has ' . $country_association_count . ' association(s).');
            } else {
                if ($is_active) {
                    $this->session->set_flashdata('cant_delete_message', 'Active Country can not be deleted.');
                } else {
                    $this->app_user_model->delete_country($country_id_dec, $created_by);
                    $this->session->set_flashdata('country_delete_message', 'Selected Country is successfully deleted');
                }
            }

            redirect(base_url() . 'admin/country/create');
        }
    }

    /*
     * *************************************************************************
     * Lander Country Create, Read (List), Update & Delete Implementation Finish
     * *************************************************************************
     */

    /*
     * ************************************************************************************************
     * Lander Slider Multiple Image Create (upload), Read (List), Update & Delete Implementation Start
     * ************************************************************************************************
     */

    public function admin_create_lander_slider_image()
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $created_by = $this->session->userdata('admin_id');
            $all_countries = $this->app_user_model->get_all_active_countries($created_by); // Reading and showing the country list from DB

            $all_slider_images = $this->app_user_model->get_all_slider_images($created_by); // Reading and showing the countries list from DB
            $data['all_slider_images'] = $all_slider_images;
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_id', 'Selected Country', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Lander Images Upload - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Upload Slider Images';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['data_list_title'] = 'All Slider Images';
                $data['footer_title'] = Admin::$footer_title;

                $file_errors = '';
                $this->session->set_flashdata('file_errors', strip_tags($file_errors));


                $data['all_countries'] = $all_countries;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_lander_slider_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
                return false;
            }
            if (!empty($_FILES['userFiles']['name'])) {
                $filesCount = count($_FILES['userFiles']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                    $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                    $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                    $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                    $uploadPath = './uploaded/lander_slider_images/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2000';

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('userFile')) {
                        $fileData = $this->upload->data();
                        $uploadData[$i]['lander_image_file_name'] = $fileData['file_name'];
                        $uploadData[$i]['lander_image_file_created'] = date("Y-m-d H:i:s");
                        $uploadData[$i]['lander_image_file_modified'] = date("Y-m-d H:i:s");
                        $uploadData[$i]['lander_image_country_id'] = $this->input->post('country_id');
                        $uploadData[$i]['lander_image_is_active'] = $this->input->post('is_active') ? 1 : 0;
                        $uploadData[$i]['lander_image_created_by'] = $created_by;
                    } else {
                        $file_errors = $this->upload->display_errors();
                        $this->session->set_flashdata('file_errors', strip_tags($file_errors));
                    }
                }

                if (!empty($uploadData)) {
                    //Insert file information into the database
                    $is_created = $this->app_user_model->create_image_slider($uploadData);
                    if ($is_created) {
                        $this->session->set_flashdata('slider_created_success', "Slider is created successfully.");
                    } else {
                        $this->session->set_flashdata('slider_created_error', "Slider is not created successfully. Please try again.");
                    }
                    redirect(base_url() . 'admin/slider/image/create', 'refresh');
                } else {
                    $data['title'] = 'Lander Images Upload - SDIL Lander';
                    $data['full_name'] = $this->session->userdata('full_name');
                    $data['page_title'] = 'Upload Slider Images';
                    $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                    $data['data_list_title'] = 'All Slider Images';
                    $data['footer_title'] = Admin::$footer_title;


                    $data['all_countries'] = $all_countries;

                    $this->load->view('admin/admin_dashboard_header_view', $data);
                    $this->load->view('admin/admin_create_lander_slider_view', $data);
                    $this->load->view('admin/admin_dashboard_footer_view', $data);
                }

            }
        }
    }

    public function admin_update_lander_slider_image($image_id)
    {
        $image_id_dec = base64_decode($image_id);
        $created_by = $this->session->userdata('admin_id');
        $single_image = $this->app_user_model->get_single_image_by_id($image_id_dec, $created_by);
        $data['single_image'] = $single_image;
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $all_countries = $this->app_user_model->get_all_active_countries($created_by); // Reading and showing the country list from DB

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_id', 'Selected Country', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Lander Images Upload - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Slider Images';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['footer_title'] = Admin::$footer_title;

                $file_errors = '';
                $this->session->set_flashdata('file_errors', strip_tags($file_errors));


                $data['all_countries'] = $all_countries;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_lander_slider_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
                return false;
            }
            if (empty($_FILES['userFile']['tmp_name'])) {
                $uploadData['lander_image_country_id'] = $this->input->post('country_id');
                $uploadData['lander_image_is_active'] = $this->input->post('is_active') ? 1 : 0;
                $uploadData['lander_image_file_name'] = $single_image['lander_image_file_name'];
                $uploadData['lander_image_file_created'] = $single_image['lander_image_file_created'];
                $uploadData['lander_image_file_modified'] = date("Y-m-d H:i:s");
                $uploadData['lander_image_modified_by'] = $created_by;
                //Insert file information into the database
                $is_updated = $this->app_user_model->update_image_slider($uploadData, $image_id_dec);
                if ($is_updated) {
                    $this->session->set_flashdata('slider_update_success', "Selected Image is update successfully.");
                } else {
                    $this->session->set_flashdata('slider_update_error', "Selected Image is not created successfully. Please try again.");
                }
                redirect(base_url() . 'admin/slider/image/create', 'refresh');

            } else {
                $uploadPath = './uploaded/lander_slider_images/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2000';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('userFile')) {
                    $fileData = $this->upload->data();
                    $uploadData['lander_image_file_name'] = $fileData['file_name'];
                    $uploadData['lander_image_file_created'] = $single_image['lander_image_file_created'];
                    $uploadData['lander_image_file_modified'] = date("Y-m-d H:i:s");
                    $uploadData['lander_image_country_id'] = $this->input->post('country_id');
                    $uploadData['lander_image_is_active'] = $this->input->post('is_active') ? 1 : 0;
                    $uploadData['lander_image_modified_by'] = $created_by;
                } else {
                    $file_errors = $this->upload->display_errors();
                    $this->session->set_flashdata('file_errors', strip_tags($file_errors));
                }

                if (!empty($uploadData)) {
                    //Insert file information into the database
                    $is_created = $this->app_user_model->update_image_slider($uploadData, $image_id_dec);
                    if ($is_created) {
                        $this->session->set_flashdata('slider_update_success', "Selected Image is update successfully.");
                    } else {
                        $this->session->set_flashdata('slider_update_error', "Selected Image is not created successfully. Please try again.");
                    }
                    redirect(base_url() . 'admin/slider/image/create', 'refresh');
                } else {
                    $data['title'] = 'Update Lander Images Upload - SDIL Lander';
                    $data['full_name'] = $this->session->userdata('full_name');
                    $data['page_title'] = 'Update Slider Images';
                    $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                    $data['footer_title'] = Admin::$footer_title;


                    $data['all_countries'] = $all_countries;

                    $this->load->view('admin/admin_dashboard_header_view', $data);
                    $this->load->view('admin/admin_update_lander_slider_view', $data);
                    $this->load->view('admin/admin_dashboard_footer_view', $data);
                }
            }

        }
    }

    public function admin_delete_lander_slider_image($image_id)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $created_by = $this->session->userdata('admin_id');
            $image_id_dec = base64_decode($image_id);
            $single_image = $this->app_user_model->get_single_image_by_id($image_id_dec, $created_by);
            $is_active = $single_image["lander_image_is_active"];
            if ($is_active) {
                $this->session->set_flashdata('cant_delete_message', 'Active Image can not be deleted.');
            } else {
                $image_name = $single_image["lander_image_file_name"];
                $path = "./uploaded/lander_slider_images/" . $image_name;
                $is_deleted = $this->app_user_model->delete_lander_slider_image($image_id_dec, $created_by);
                if ($is_deleted) {
                    unlink($path);
                }
                $this->session->set_flashdata('slider_image_delete_message', 'Selected Image is successfully deleted');
            }

            redirect(base_url() . 'admin/slider/image/create');
        }
    }

    /*
    * *************************************************************************************************
    * Lander Slider Multiple Image Create (upload), Read (List), Update & Delete Implementation Finish
    * *************************************************************************************************
    */

    /*
    * **********************************************************************************
    * Lander Devices Create (upload), Read (List), Update & Delete Implementation Start
    * **********************************************************************************
    */
    public function admin_create_device()
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $created_by = $this->session->userdata('admin_id');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('device_name', 'Device name', 'trim|required|min_length[2]|callback_unique_device_name');
            $this->form_validation->set_rules('device_code', 'Device code', 'trim|required|min_length[2]|callback_unique_device_code');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Device List - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Create Device';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['data_list_title'] = 'All Devices List';
                $data['footer_title'] = Admin::$footer_title;

                $all_devices = $this->app_user_model->get_all_devices($created_by); // Reading and showing the devices list from DB
                $data['all_devices'] = $all_devices;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_device_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'lander_device_name' => $this->input->post('device_name'),
                    'lander_device_code' => strtolower($this->input->post('device_code')),
                    'lander_device_is_active' => $is_active,
                    'lander_device_created_by' => $created_by
                );
                $is_created = $this->app_user_model->create_device($data);
                if ($is_created) {
                    $this->session->set_flashdata('admin_create_device_message', "Device is created successfully.");
                } else {
                    $this->session->set_flashdata('admin_create_device_error_message', "Device is not created successfully. Please try again.");
                }

                redirect(base_url() . 'admin/device/create', 'refresh');
            }
        }
    }

    public function admin_update_device($device_id)
    {
        $device_id_dec = base64_decode($device_id);
        $created_by = $this->session->userdata('admin_id');
        $single_device = $this->app_user_model->get_single_device_by_id($device_id_dec, $created_by);
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('device_name', 'Device name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('device_code', 'Device code', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Device - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Device';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['footer_title'] = Admin::$footer_title;


                $data['single_device'] = $single_device;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_device_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $device_name = $this->input->post('device_name');
                $device_code = strtolower($this->input->post('device_code'));
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'lander_device_name' => $device_name,
                    'lander_device_code' => $device_code,
                    'lander_device_is_active' => $is_active,
                    'lander_device_modified_by' => $created_by
                );
                $is_updated = FALSE;
                $check_device_name_is_unique = TRUE;
                $check_device_code_is_unique = TRUE;
                if ($device_name == $single_device['lander_device_name'] && $device_code == $single_device['lander_device_code']) {
                    $is_updated = $this->app_user_model->update_device($data, $device_id_dec);
                } else {
                    // Country name and code unique check during update
                    if ($device_name != $single_device['lander_device_name'] && $device_code != $single_device['lander_device_code']) {
                        $check_device_name_is_unique = $this->app_user_model->unique_lander_device_name($device_name, $created_by);
                        if ($check_device_name_is_unique) {
                            $this->session->set_flashdata('admin_device_name_not_unique_message', "Given Device name is already exist");
                        }
                        $check_device_code_is_unique = $this->app_user_model->unique_lander_device_code($device_code, $created_by);
                        if ($check_device_code_is_unique) {
                            $this->session->set_flashdata('admin_device_code_not_unique_message', "Given Device code is already exist");
                        }
                        if ($check_device_name_is_unique || $check_device_code_is_unique) {
                            redirect(base_url() . 'admin/device/update/' . $device_id, 'refresh');
                        }
                    } else if ($device_name != $single_device['lander_device_name'] && $device_code == $single_device['lander_device_code']) {
                        $check_device_name_is_unique = $this->app_user_model->unique_lander_device_name($device_name, $created_by);
                        if ($check_device_name_is_unique) {
                            $this->session->set_flashdata('admin_device_name_not_unique_message', "Given Device name is already exist");
                            $check_device_name_is_unique = FALSE;
                            $check_device_code_is_unique = FALSE;
                            redirect(base_url() . 'admin/device/update/' . $device_id, 'refresh');
                        }
                    } else if ($device_name == $single_device['lander_device_name'] && $device_code != $single_device['lander_device_code']) {
                        $check_device_code_is_unique = $this->app_user_model->unique_lander_device_code($device_code, $created_by);
                        if ($check_device_code_is_unique) {
                            $this->session->set_flashdata('admin_device_code_not_unique_message', "Given Device code is already exist");
                            $check_device_code_is_unique = FALSE;
                            $check_device_name_is_unique = FALSE;
                            redirect(base_url() . 'admin/device/update/' . $device_id, 'refresh');
                        }
                    }
                    if (!$check_device_name_is_unique || !$check_device_code_is_unique) {
                        $is_updated = $this->app_user_model->update_device($data, $device_id_dec);
                    }
                }


                if ($is_updated) {
                    $this->session->set_flashdata('admin_update_device_message', "Selected Device is Updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_update_device_error_message', "Selected Device is not Updated successfully. Please try again.");
                }

                redirect(base_url() . 'admin/device/create', 'refresh');
            }
        }
    }

    public function admin_delete_device($device_id)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $created_by = $this->session->userdata('admin_id');
            $device_id_dec = base64_decode($device_id);
            $single_device = $this->app_user_model->get_single_device_by_id($device_id_dec, $created_by);
            $device_association_count = $this->app_user_model->get_associated_device_count($device_id_dec, $created_by);
            if ($device_association_count > 0) {
                $this->session->set_flashdata('cant_delete_associate_message', 'Device ' . $single_device['lander_device_name'] . ' can not be deleted. It has ' . $device_association_count . ' association(s).');
            } else {
                $is_active = $single_device["lander_device_is_active"];
                if ($is_active) {
                    $this->session->set_flashdata('cant_delete_message', 'Active Device can not be deleted.');
                } else {
                    $this->app_user_model->delete_device($device_id_dec, $created_by);
                    $this->session->set_flashdata('device_delete_message', 'Selected Device is successfully deleted');
                }
            }
            redirect(base_url() . 'admin/device/create');
        }
    }

    /*
   * **********************************************************************************
   * Lander Devices Create (upload), Read (List), Update & Delete Implementation Finish
   * **********************************************************************************
   */

    /*
   * **********************************************************************************
   * Lander Last Button Link Create, Read (List), Update & Delete Implementation Start
   * **********************************************************************************
   */

    public function admin_create_last_btn_link()
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $created_by = $this->session->userdata('admin_id');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_id', 'Selected Country', 'trim|required');
            $this->form_validation->set_rules('device_id', 'Selected Device', 'trim|required');
            $this->form_validation->set_rules('button_name', 'Button name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('button_link_url', 'Button Link URL', 'trim|required|min_length[2]|callback_unique_url_link_button');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Last Button Link List - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Create Last Button Link';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['data_list_title'] = 'All Buttons URL List';
                $data['footer_title'] = Admin::$footer_title;

                $all_active_countries = $this->app_user_model->get_all_active_countries($created_by); // Reading and showing the countries list from DB
                $data['all_active_countries'] = $all_active_countries;

                $all_active_devices = $this->app_user_model->get_all_active_devices($created_by); // Reading and showing the devices list from DB
                $data['all_active_devices'] = $all_active_devices;

                $all_last_btn_links = $this->app_user_model->get_all_last_btn_link($created_by); // Reading and showing the devices list from DB
                $data['all_last_btn_links'] = $all_last_btn_links;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_last_btn_link_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $button_name = $this->input->post('button_name');
                $button_link_url = $this->input->post('button_link_url');
                $country_id = $this->input->post('country_id');
                $device_id = $this->input->post('device_id');
                $data = array(
                    'lander_last_btn_name' => $button_name,
                    'lander_last_btn_link_url' => $button_link_url,
                    'lander_last_btn_country_id' => $country_id,
                    'lander_last_btn_device_id' => $device_id,
                    'lander_last_btn_is_active' => $is_active,
                    'lander_last_btn_created_by' => $created_by
                );
                $is_exist = $this->app_user_model->check_existence_data($device_id, $country_id, $created_by);
                if ($is_exist > 0) {
                    $this->session->set_flashdata('admin_create_last_btn_link_error_message', "Sorry! You can not create last button link using same Country and Device for two times. Please try again.");
                } else {
                    $is_created = $this->app_user_model->create_last_btn_link($data);
                    if ($is_created) {
                        $this->session->set_flashdata('admin_create_last_btn_link_message', "Last Button link is created successfully.");
                    } else {
                        $this->session->set_flashdata('admin_create_last_btn_link_error_message', "Last Button link is not created successfully. Please try again.");
                    }
                }
                redirect(base_url() . 'admin/last/button/link/create', 'refresh');
            }
        }
    }

    public function admin_update_last_button_link($last_btn_link_id)
    {
        $created_by = $this->session->userdata('admin_id');
        $last_btn_link_id_dec = base64_decode($last_btn_link_id);
        $single_link = $this->app_user_model->get_single_link_by_id($last_btn_link_id_dec, $created_by);

        $all_active_countries = $this->app_user_model->get_all_active_countries($created_by); // Reading and showing the countries list from DB
        $data['all_active_countries'] = $all_active_countries;

        $all_active_devices = $this->app_user_model->get_all_active_devices($created_by); // Reading and showing the devices list from DB
        $data['all_active_devices'] = $all_active_devices;

        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('button_name', 'Button name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('button_link_url', 'Button Link URL', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Lander Last Button Link - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Lander Last Button Link';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['footer_title'] = Admin::$footer_title;


                $data['single_link'] = $single_link;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_last_btn_link_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $button_name = $this->input->post('button_name');
                $button_link_url = strtolower($this->input->post('button_link_url'));
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'lander_last_btn_name' => $button_name,
                    'lander_last_btn_link_url' => $button_link_url,
                    'lander_last_btn_is_active' => $is_active,
                    'lander_last_btn_modified_by' => $created_by
                );
                $is_updated = FALSE;
                $check_last_btn_link_is_unique = TRUE;
                if ($button_link_url == $single_link['lander_last_btn_link_url']) {
                    $is_updated = $this->app_user_model->update_last_btn_link($data, $last_btn_link_id_dec, $created_by);
                } else {
                    if ($button_link_url != $single_link['lander_last_btn_link_url']) {
                        $check_last_btn_link_is_unique = $this->app_user_model->unique_lander_url_link_button($button_link_url);
                        if ($check_last_btn_link_is_unique) {
                            $this->session->set_flashdata('admin_last_btn_link_is_unique_not_unique_message', "Given Last Button link is already exist");
                        }
                        if ($check_last_btn_link_is_unique) {
                            redirect(base_url() . 'admin/last/button/link/update/' . $last_btn_link_id, 'refresh');
                        }
                    }
                    if (!$check_last_btn_link_is_unique) {
                        $is_updated = $this->app_user_model->update_last_btn_link($data, $last_btn_link_id_dec, $created_by);
                    }
                }


                if ($is_updated) {
                    $this->session->set_flashdata('admin_update_last_btn_link_message', "Selected Last Button link is Updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_update_last_btn_link_error_message', "Selected Last Button link is not Updated successfully. Please try again.");
                }

                redirect(base_url() . 'admin/last/button/link/create', 'refresh');
            }
        }
    }

    public function admin_delete_last_button_link($last_btn_link_id)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $created_by = $this->session->userdata('admin_id');
            $last_btn_link_id_dec = base64_decode($last_btn_link_id);
            $single_link = $this->app_user_model->get_single_link_by_id($last_btn_link_id_dec, $created_by);

            $is_active = $single_link["lander_last_btn_is_active"];
            if ($is_active) {
                $this->session->set_flashdata('cant_delete_message', 'Active Button Link can not be deleted.');
            } else {
                $this->app_user_model->delete_last_button_link($last_btn_link_id_dec, $created_by);
                $this->session->set_flashdata('last_link_delete_message', 'Selected Button Link is successfully deleted');
            }

            redirect(base_url() . 'admin/last/button/link/create');
        }
    }

    /*
     * **********************************************************************************
     * Lander Last Button Link Create, Read (List), Update & Delete Implementation Finish
     * **********************************************************************************
     */

    /*
     * *************************************************************************************
     * Lander Theme Create, Read (List), Update & Delete Implementation Start
     * *************************************************************************************
     */

    public function admin_create_theme()
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $created_by = $this->session->userdata('admin_id');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('theme_name', 'Theme name', 'trim|required|min_length[2]|callback_unique_theme_name');
            $this->form_validation->set_rules('theme_color_code', 'Theme Color Code', 'trim|required|min_length[2]|callback_unique_theme_color_code');
            $this->form_validation->set_rules('theme_css', 'Theme CSS', 'trim|required');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Theme List - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Create Theme';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['data_list_title'] = 'All Themes List';
                $data['footer_title'] = Admin::$footer_title;

                $all_themes = $this->app_user_model->get_all_themes($created_by); // Reading and showing the devices list from DB
                $data['all_themes'] = $all_themes;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_theme_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $theme_name = $this->input->post('theme_name');
                $theme_color_code = $this->input->post('theme_color_code');
                $theme_css = $this->input->post('theme_css');
                $data = array(
                    'lander_theme_name' => $theme_name,
                    'lander_theme_color_code' => $theme_color_code,
                    'lander_theme_css' => $theme_css,
                    'lander_theme_is_active' => $is_active,
                    'lander_theme_created_by' => $created_by
                );
                $is_created = $this->app_user_model->create_lander_theme($data);
                if ($is_created) {
                    $this->session->set_flashdata('admin_create_theme_message', "Theme is created successfully.");
                } else {
                    $this->session->set_flashdata('admin_create_theme_error_message', " Theme is not created successfully. Please try again.");
                }

                redirect(base_url() . 'admin/theme/create', 'refresh');
            }
        }
    }

    public function admin_update_theme($theme_id)
    {
        $theme_id_dec = base64_decode($theme_id);
        $created_by = $this->session->userdata('admin_id');
        $single_theme = $this->app_user_model->get_single_theme_by_id($theme_id_dec, $created_by);
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('theme_name', 'Theme name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('theme_color_code', 'Theme Color Code', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('theme_css', 'Theme CSS', 'trim|required');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Theme - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Theme';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['footer_title'] = Admin::$footer_title;


                $data['single_theme'] = $single_theme;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_theme_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $theme_name = $this->input->post('theme_name');
                $theme_color_code = $this->input->post('theme_color_code');
                $theme_css = $this->input->post('theme_css');
                $data = array(
                    'lander_theme_name' => $theme_name,
                    'lander_theme_color_code' => $theme_color_code,
                    'lander_theme_css' => $theme_css,
                    'lander_theme_is_active' => $is_active,
                    'lander_theme_modified_by' => $created_by
                );
                $is_updated = FALSE;
                $check_theme_name_is_unique = TRUE;
                $check_theme_color_code_is_unique = TRUE;
                if ($theme_name == $single_theme['lander_theme_name'] && $theme_color_code == $single_theme['lander_theme_color_code']) {
                    $is_updated = $this->app_user_model->update_lander_theme($data, $theme_id_dec);
                } else {
                    // Country name and code unique check during update
                    if ($theme_name != $single_theme['lander_theme_name'] && $theme_color_code != $single_theme['lander_theme_color_code']) {
                        $check_theme_name_is_unique = $this->app_user_model->unique_lander_theme_name($theme_name, $created_by);
                        if ($check_theme_name_is_unique) {
                            $this->session->set_flashdata('admin_theme_name_not_unique_message', "Given Theme name is already exist");
                        }
                        $check_theme_color_code_is_unique = $this->app_user_model->unique_lander_theme_color_code($theme_color_code, $created_by);
                        if ($check_theme_color_code_is_unique) {
                            $this->session->set_flashdata('admin_theme_color_code_not_unique_message', "Given Theme Color code is already exist");
                        }
                        if ($check_theme_name_is_unique || $check_theme_color_code_is_unique) {
                            redirect(base_url() . 'admin/theme/update/' . $theme_id, 'refresh');
                        }
                    } else if ($theme_name != $single_theme['lander_theme_name'] && $theme_color_code == $single_theme['lander_theme_color_code']) {
                        $check_theme_name_is_unique = $this->app_user_model->unique_lander_theme_name($theme_name, $created_by);
                        if ($check_theme_name_is_unique) {
                            $this->session->set_flashdata('admin_theme_name_not_unique_message', "Given Theme name is already exist");
                            $check_theme_name_is_unique = FALSE;
                            $check_theme_color_code_is_unique = FALSE;
                            redirect(base_url() . 'admin/theme/update/' . $theme_id, 'refresh');
                        }
                    } else if ($theme_name == $single_theme['lander_theme_name'] && $theme_color_code != $single_theme['lander_theme_color_code']) {
                        $check_theme_color_code_is_unique = $this->app_user_model->unique_lander_theme_color_code($theme_color_code, $created_by);
                        if ($check_theme_color_code_is_unique) {
                            $this->session->set_flashdata('admin_theme_color_code_not_unique_message', "Given Theme code is already exist");
                            $check_theme_name_is_unique = FALSE;
                            $check_theme_color_code_is_unique = FALSE;
                            redirect(base_url() . 'admin/theme/update/' . $theme_id, 'refresh');
                        }
                    }
                    if (!$check_theme_name_is_unique || !$check_theme_color_code_is_unique) {
                        $is_updated = $this->app_user_model->update_lander_theme($data, $theme_id_dec);
                    }
                }


                if ($is_updated) {
                    $this->session->set_flashdata('admin_update_theme_message', "Selected Theme is Updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_update_theme_error_message', "Selected Theme is not Updated successfully. Please try again.");
                }

                redirect(base_url() . 'admin/theme/create', 'refresh');
            }
        }
    }

    public function admin_delete_theme($theme_id)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $created_by = $this->session->userdata('admin_id');
            $theme_id_dec = base64_decode($theme_id);
            $single_theme = $this->app_user_model->get_single_theme_by_id($theme_id_dec, $created_by);

            $is_active = $single_theme["lander_theme_is_active"];
            if ($is_active) {
                $this->session->set_flashdata('cant_delete_message', 'Active Theme can not be deleted.');
            } else {
                $this->app_user_model->delete_lander_theme($theme_id_dec, $created_by);
                $this->session->set_flashdata('theme_delete_message', 'Selected Theme is successfully deleted');
            }

            redirect(base_url() . 'admin/theme/create');
        }
    }


    /*
    * *************************************************************************************
    * Lander Theme Create, Read (List), Update & Delete Implementation Finish
    * *************************************************************************************
    */

    /*
     * *************************************************************************************
     * Lander Country Theme Create, Read (List), Update & Delete Implementation Start
     * *************************************************************************************
     */

    public function admin_create_country_theme()
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $created_by = $this->session->userdata('admin_id');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('theme_id', 'Selected Theme', 'trim|required');
            $this->form_validation->set_rules('country_id', 'Selected Country', 'trim|required');
            $this->form_validation->set_rules('is_live', 'Is Live');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Country Theme List - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Create Country Theme';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['data_list_title'] = 'All Country Themes List';
                $data['footer_title'] = Admin::$footer_title;

                $all_country_themes = $this->app_user_model->get_all_country_themes($created_by); // Reading and showing the devices list from DB
                $data['all_country_themes'] = $all_country_themes;

                $all_active_countries = $this->app_user_model->get_all_active_countries($created_by); // Reading and showing the country list from DB
                $data['all_active_countries'] = $all_active_countries;

                $all_active_themes = $this->app_user_model->get_all_active_themes($created_by); // Reading and showing the devices list from DB
                $data['all_active_themes'] = $all_active_themes;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_country_theme_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $country_id = $this->input->post('country_id');
                $theme_id = $this->input->post('theme_id');
                $is_live = $this->input->post('is_live') ? 1 : 0;
                $data = array(
                    'lander_theme_country_id' => $country_id,
                    'lander_theme_country_them_id' => $theme_id,
                    'sdil_lander_theme_country_is_live' => $is_live,
                    'lander_theme_country_created_by' => $created_by
                );
                $country_theme_association_count_all = $this->app_user_model->get_associated_country_theme_count_all($theme_id, $country_id, $created_by);
                $country_theme_association_count = $this->app_user_model->get_associated_country_theme_count($country_id, $created_by);
                if ($country_theme_association_count >= 1) {
                    $this->session->set_flashdata('admin_can_not_associate_country_theme_message', "Sorry! Selected Country is already associated with a Theme.");
                } else {
                    if ($country_theme_association_count_all) {
                        $this->session->set_flashdata('admin_can_not_create_country_theme_message', "Sorry! These theme is already associated with the selected Country.");
                    } else {
                        $is_created = $this->app_user_model->create_lander_country_theme($data);
                        if ($is_created) {
                            $this->session->set_flashdata('admin_create_country_theme_message', "Country Theme is created successfully.");
                        } else {
                            $this->session->set_flashdata('admin_create_theme_error_message', " Country Theme is not created successfully. Please try again.");
                        }
                    }
                }
                redirect(base_url() . 'admin/country/theme/create', 'refresh');
            }
        }
    }

    public function admin_update_country_theme($sdil_lander_theme_country_ID)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $created_by = $this->session->userdata('admin_id');
            $sdil_lander_theme_country_ID_dec = base64_decode($sdil_lander_theme_country_ID);
            $single_theme_country = $this->app_user_model->get_single_theme_country_by_id($sdil_lander_theme_country_ID_dec);
            $data['single_theme_country'] = $single_theme_country;
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('theme_id', 'Selected Theme', 'trim|required');
            $this->form_validation->set_rules('country_id', 'Selected Country', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Country Theme Update - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Country Theme';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['footer_title'] = Admin::$footer_title;


                $all_active_countries = $this->app_user_model->get_all_active_countries($created_by); // Reading and showing the country list from DB
                $data['all_active_countries'] = $all_active_countries;

                $all_active_themes = $this->app_user_model->get_all_active_themes($created_by); // Reading and showing the devices list from DB
                $data['all_active_themes'] = $all_active_themes;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_country_theme_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $country_id = $this->input->post('country_id');
                $theme_id = $this->input->post('theme_id');
                $is_live = $this->input->post('is_live') ? 1 : 0;
                $data = array(
                    'lander_theme_country_id' => $country_id,
                    'lander_theme_country_them_id' => $theme_id,
                    'sdil_lander_theme_country_is_live' => $is_live,
                    'lander_theme_country_modified_by' => $created_by
                );

                $is_created = $this->app_user_model->update_lander_country_theme($sdil_lander_theme_country_ID_dec, $data);
                if ($is_created) {
                    $this->session->set_flashdata('admin_update_country_theme_message', "Country Theme is updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_update_theme_error_message', " Country Theme is not update successfully. Please try again.");
                }


                redirect(base_url() . 'admin/country/theme/create', 'refresh');
            }
        }
    }

    public function admin_delete_country_theme($sdil_lander_theme_country_ID)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $sdil_lander_theme_country_ID_dec = base64_decode($sdil_lander_theme_country_ID);
            $single_theme_country = $this->app_user_model->get_single_theme_country_by_id($sdil_lander_theme_country_ID_dec);

            $is_live = $single_theme_country["sdil_lander_theme_country_is_live"];
            if ($is_live) {
                $this->session->set_flashdata('cant_delete_message', 'Live Country Theme can not be deleted.');
            } else {
                $is_deleted = $this->app_user_model->delete_lander_country_theme($sdil_lander_theme_country_ID_dec);
                if ($is_deleted) {
                    $this->session->set_flashdata('country_theme_delete_message', 'Selected Country Theme is successfully deleted.');
                }

            }

            redirect(base_url() . 'admin/country/theme/create', 'refresh');
        }

    }


    /*
    * *************************************************************************************
    * Lander Country Theme Create, Read (List), Update & Delete Implementation Finish
    * *************************************************************************************
    */

    /*
     * *************************************************************************************
     * Admin user Create, Read (List), Update & Delete Implementation Start
     * *************************************************************************************
     */

    public function super_admin_create_user()
    {
        $is_super_admin = $this->session->userdata('is_super_admin');
        if (($this->session->userdata('admin_email') == "") && !$is_super_admin) {
            $this->logout();
        } else {
            $created_by = $this->session->userdata('admin_id');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('admin_live_preview_url', 'Admin Live Preview URL', 'required|trim|min_length[4]|callback_unique_live_preview_url');
            $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email|callback_unique_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
            $this->form_validation->set_rules('cell_number', 'Your Mobile Number', 'trim|min_length[4]|max_length[11]');
            $this->form_validation->set_rules('is_enabled', 'Is Enabled');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Admin User List - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Create Admin User';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['data_list_title'] = 'All Admins List';
                $data['footer_title'] = Admin::$footer_title;

                $all_admins = $this->app_user_model->get_all_admins(); // Reading and showing the devices list from DB
                $data['all_admins'] = $all_admins;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_user_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_enabled = $this->input->post('is_enabled') ? 1 : 0;
                $email = filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL);
                $password = md5(filter_var($this->input->post('password')));
                $data = array(
                    'full_name' => $this->input->post('name'),
                    'admin_live_preview_url' => $this->input->post('admin_live_preview_url'),
                    'cell_number' => $this->input->post('cell_number'),
                    'enabled' => $is_enabled,
                    'admin_password' => $password,
                    'admin_password_backup' => filter_var($this->input->post('password')),
                    'password_expired' => $this->input->post('password_expired'),
                    'password_reset_validity' => $this->input->post(date("Y-m-d")),
                    'admin_created_by' => $created_by,
                    'admin_email' => $email

                );
                $is_created = $this->app_user_model->create_admin_user($data);
                if ($is_created) {
                    $get_created_user_id = $this->app_user_model->get_user_by_email_pass($email,$password);
                    $now_created_admin_id = $get_created_user_id['admin_id'];
                    $data_create_reserved_country = array(
                        'lander_country_name' => 'Bangladesh',
                        'lander_country_code' => 'BD',
                        'is_active' => 1,
                        'is_country_reserved' => 1,
                        'created_by' => $now_created_admin_id
                    );
                    $this->app_user_model->create_country($data_create_reserved_country);

                    $device_name = array('Mobile', 'Tab', 'Desktop');
                    $device_code = array('mobile', 'tab', 'desktop');
                    for($i = 0; $i< 3; $i++){
                        $data_sdil_lander_device = array(
                            'lander_device_name' => $device_name[$i],
                            'lander_device_code' => $device_code[$i],
                            'lander_device_is_active' => 1,
                            'lander_device_is_reserved' => 1,
                            'lander_device_created_by' => $now_created_admin_id
                        );
                        $this->app_user_model->create_device($data_sdil_lander_device);
                    }
                    $theme_css = '#sdil-lander-popup-wrapper, body, html {\r\n    width: 100%;\r\n    height: 100%\r\n}\r\n\r\nbody, html {\r\n    margin: 0;\r\n    padding: 0;\r\n    border: 0;\r\n    font-size: 100%\r\n}\r\n\r\nimg {\r\n    border: none\r\n}\r\n\r\n.hidden {\r\n    display: none\r\n}\r\n\r\nbody {\r\n    background: #fff;\r\n    font-family: Helvetica, Arial, sans-serif;\r\n    color: #ff0060;\r\n    background-size: cover\r\n}\r\n\r\n#sdil-lander-popup-wrapper {\r\n    position: fixed;\r\n    top: 0;\r\n    left: 0;\r\n    z-index: 10;\r\n}\r\n\r\n.sdil-lander-popup_alert {\r\n    position: relative;\r\n    width: 380px;\r\n    left: 50%;\r\n    top: 50%;\r\n    margin-left: -210px;\r\n    margin-top: -90px;\r\n    z-index: 100;\r\n    padding: 20px;\r\n    overflow: hidden;\r\n    background: rgba(225,225,225,.8);\r\n    border-radius: 10px;\r\n    box-shadow: 0 0 18px rgba(156, 32, 109, 0.4);\r\n    border: 11px solid #ff0060;\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area {\r\n    display: block;\r\n    padding-top: 0;\r\n    position: relative;\r\n    left: 8%;\r\n    width: 80%;\r\n    margin-bottom: 17px\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area h5 {\r\n    font-size: 22px;\r\n    margin: 10px 0 0\r\n}\r\n\r\n.sdil-lander-popup_alert .copy_area p {\r\n    font-size: 17px;\r\n    margin-top: 5px\r\n}\r\n\r\n.sdil-lander-popup_alert .navbtn {\r\n    margin-top: 10px;\r\n    width: 140px;\r\n    height: 70px;\r\n    border-radius: 9px !important;\r\n    border: 4px solid #ff0060;\r\n    background: #fff;\r\n    font-size: 20px;\r\n    cursor: pointer;\r\n    font-weight: 600;\r\n    color: #ff0060;\r\n}\r\n\r\n.radar_scanner {\r\n    display: block;\r\n    margin: 0 auto;\r\n    text-align: center;\r\n    height: 100%;\r\n    width: 100%;\r\n    color: #fff;\r\n    position: fixed;\r\n}\r\n\r\nh3.radar_title {\r\n    font-size: 110%;\r\n    line-height: 100px\r\n}\r\n\r\n.circle1 {\r\n    color: #ff0060;\r\n    background: #fff;\r\n}\r\n\r\n.circle2 {\r\n    color: rgba(255, 255, 255, .8);\r\n    background: #555;\r\n    text-shadow: 0 1px #666\r\n}\r\n\r\n.circle1, .circle2 {\r\n    font-weight: 400;\r\n    margin-left: 0;\r\n    font-size: 23px;\r\n    border-radius: 100px;\r\n    padding: 5px 15px\r\n}\r\n\r\n.box, .marker_show {\r\n    background: rgba(225,225,225,1);\r\n    border-radius: 10px;\r\n    color: #ff0060;\r\n    border: 4px solid #ff0060;\r\n    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);\r\n    box-shadow: 0 5px 15px rgba(0, 0, 0, .5);\r\n    width: 600px;\r\n    position: absolute;\r\n    left: 50%;\r\n    top: 50%;\r\n    margin-top: -185px;\r\n    margin-left: -300px;\r\n    line-height: 28px;\r\n    font-size: 22px;\r\n    text-align: center;\r\n    font-weight: 300;\r\n}\r\n\r\n.box {\r\n    display: none\r\n}\r\n\r\n.box .ok, .buttons {\r\n    background-color: #fff;\r\n    color: #ff0060;\r\n    cursor: pointer;\r\n    font-size: 30px;\r\n    width: 40%;\r\n    min-width: 200px;\r\n    padding: 15px 0;\r\n    margin: 20px auto;\r\n    border-radius: 6px;\r\n    display: block;\r\n    text-align: center;\r\n    text-decoration: none;\r\n    border: 4px solid #ff0060;\r\n}\r\n\r\n.boxheader {\r\n    background: #ff0060;\r\n    width: 100%;\r\n    min-height: 20px;\r\n    color: #fff;\r\n    font-size: 23px;\r\n    padding: 22px 0;\r\n    margin: 0 auto;\r\n    text-align: center\r\n}\r\n\r\n.box_copy {\r\n    padding: 10px 30px 20px;\r\n    text-align: left;\r\n}\r\n\r\n.stepinfo {\r\n    font-size: 18px;\r\n    margin: 10px 0;\r\n    text-align: center\r\n}\r\n\r\n#agree, .next {\r\n    text-align: center;\r\n    font-size: 30px;\r\n    padding: 12px;\r\n    display: inline-block;\r\n    width: 40%;\r\n    background: #ff0060;\r\n    text-decoration: none;\r\n    color: #fff;\r\n    margin-right: -6px;\r\n    border-radius: 4px 0 0 4px;\r\n    margin-bottom: 20px;\r\n    font-weight: 700\r\n}\r\n\r\n.next.step_button_2 {\r\n    background: #56575B;\r\n    color: #fff;\r\n    border-radius: 0 4px 4px 0\r\n}\r\n\r\n.option, .option2, .option3, .option4 {\r\n    width: 60%;\r\n    padding: 5px;\r\n    text-align: left;\r\n    cursor: pointer;\r\n    margin: 0 auto 5px;\r\n    background: url("http://localhost/lander/images/unchecked_checkbox.png") 10px center no-repeat\r\n}\r\n\r\n.selected, .selected2, .selected3, .selected4 {\r\n    background: url("http://localhost/lander/images/checked_checkbox.png") 10px center no-repeat\r\n}\r\n\r\n.option-title {\r\n    color: #eb0060;\r\n    display: block;\r\n    padding: 0;\r\n    margin-left: 50px\r\n}\r\n\r\n@media screen and (max-width: 640px) {\r\n    .box, .marker_show {\r\n        width: 95%;\r\n        left: 0;\r\n        margin: -200px 2.5%\r\n    }\r\n}\r\n\r\n@media screen and (max-width: 480px) {\r\n    .sdil-lander-popup_alert {\r\n        width: 80%;\r\n        left: 0;\r\n        margin: -90px 6%\r\n    }\r\n\r\n    .box, .marker_show {\r\n        font-size: 20px;\r\n        line-height: 25px\r\n    }\r\n\r\n    #radar img, .option, .option2, .option3, .option4 {\r\n        width: 80%\r\n    }\r\n\r\n    h3.radar_title {\r\n        margin-bottom: -20px\r\n    }\r\n\r\n    .box_copy {\r\n        padding: 10px\r\n    }\r\n\r\n    .boxheader {\r\n        font-size: 22px\r\n    }\r\n}';
                    $data_create_lander_theme = array(
                        'lander_theme_name' => 'Pink',
                        'lander_theme_color_code' => '#ff0060',
                        'lander_theme_css' => $theme_css,
                        'lander_theme_is_active' => 1,
                        'is_lander_theme_reserved' => 1,
                        'lander_theme_created_by' => $now_created_admin_id
                    );
                    $this->app_user_model->create_lander_theme($data_create_lander_theme);

                    $this->session->set_flashdata('admin_create_user_message', "Admin User is created successfully.");
                } else {
                    $this->session->set_flashdata('admin_create_user_error_message', "Admin User is not created successfully. Please try again.");
                }

                redirect(base_url() . 'admin/user/create', 'refresh');
            }
        }
    }

    public function admin_update_user($admin_user_id)
    {
        $is_super_admin = $this->session->userdata('is_super_admin');
        $admin_user_id_dec = base64_decode($admin_user_id);
        $created_by = $this->session->userdata('admin_id');
        $single_admin_user = $this->app_user_model->get_user_by_id($admin_user_id_dec);
        if (($this->session->userdata('admin_email') == "") && !$is_super_admin) {
            $this->logout();
        } else {
            $is_super_admin = $this->session->userdata('is_super_admin');
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('admin_live_preview_url', 'Admin Live Preview URL', 'required|trim|min_length[4]');
            $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]|max_length[32]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|matches[password]');
            $this->form_validation->set_rules('cell_number', 'Your Mobile Number', 'trim|min_length[4]|max_length[11]');
            $this->form_validation->set_rules('is_enabled', 'Is Enabled');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Admin User - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Admin User';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['footer_title'] = Admin::$footer_title;


                $data['single_admin_user'] = $single_admin_user;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_user_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_enabled = $this->input->post('is_enabled') ? 1 : 0;
                $email = filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL);
                $password = md5(filter_var($this->input->post('password')));
                $admin_password_backup = filter_var($this->input->post('password'));
                if($password == ''){
                    $password = $single_admin_user['admin_password'];
                    $admin_password_backup = $single_admin_user['admin_password_backup'];
                }
                $data = array(
                    'full_name' => $this->input->post('name'),
                    'admin_live_preview_url' => $this->input->post('admin_live_preview_url'),
                    'cell_number' => $this->input->post('cell_number'),
                    'enabled' => $is_enabled,
                    'admin_password' => $password,
                    'admin_password_backup' => $admin_password_backup,
                    'password_expired' => $this->input->post('password_expired'),
                    'password_reset_validity' => $this->input->post(date("Y-m-d")),
                    'admin_modified_by' => $created_by,
                    'admin_email' => $email

                );
                $is_updated = FALSE;
                $check_admin_email_is_unique = TRUE;
                if ($email == $single_admin_user['admin_email']) {
                    $is_updated = $this->app_user_model->update_admin_user($data, $admin_user_id_dec);
                } else {
                    // Country name and code unique check during update
                    if ($email != $single_admin_user['admin_email']) {
                        $check_admin_email_is_unique = $this->app_user_model->unique_admin_email($email);
                        if ($check_admin_email_is_unique) {
                            $this->session->set_flashdata('admin_user_email_not_unique_message', "Sorry! Given Email address is already exist. Please try another one.");
                        }

                        if ($check_admin_email_is_unique) {
                            redirect(base_url() . 'admin/user/update/' . $admin_user_id, 'refresh');
                        }
                    }
                    if (!$check_admin_email_is_unique) {
                        $is_updated = $this->app_user_model->update_admin_user($data, $admin_user_id_dec);
                    }
                }
                if ($is_updated) {
                    $this->session->set_flashdata('admin_create_user_message', "Selected Admin User is Updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_create_user_error_message', "Selected Admin User is not Updated successfully. Please try again.");
                }

                redirect(base_url() . 'admin/user/create', 'refresh');
            }
        }
    }

    public function admin_delete_user($admin_user_id)
    {
        $admin_user_id_dec = base64_decode($admin_user_id);
        $created_by = $this->session->userdata('admin_id');
        $single_admin_user = $this->app_user_model->get_user_by_id($admin_user_id_dec);
        $is_super_admin = $this->session->userdata('is_super_admin');
        if (($this->session->userdata('admin_email') == "") && !$is_super_admin) {
            $this->logout();
        } else {
            $admin_user_association_count = $this->app_user_model->get_associated_admin_user_count($admin_user_id_dec);
            if ($admin_user_association_count > 0) {
                $this->session->set_flashdata('cant_delete_associate_message', 'Selected Admin ' . $single_admin_user['full_name'] . ' can not be deleted. Admin has ' . $admin_user_association_count . ' association(s).');
            } else {
                $is_enabled = $single_admin_user["enabled"];
                if ($is_enabled) {
                    $this->session->set_flashdata('cant_delete_message', 'Enabled Admin User can not be deleted.');
                } else {
                    $this->app_user_model->delete_admin_iser($admin_user_id_dec);
                    $this->session->set_flashdata('device_delete_message', 'Selected Admin User is successfully deleted');
                }
            }
            redirect(base_url() . 'admin/user/create');
        }
    }

    /*
     * *************************************************************************************
     * Admin user Create, Read (List), Update & Delete Implementation Finish
     * *************************************************************************************
     */

    public function admin_show_preview($theme_id)
    {
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $created_by = $this->session->userdata('admin_id');
            $theme_id_dec = base64_decode($theme_id);
            $single_theme = $this->app_user_model->get_single_theme_by_id($theme_id_dec, $created_by);
            $data['theme_name'] = $single_theme['lander_theme_name'];
            $data['lander_theme_css'] = $single_theme['lander_theme_css'];

            $this->load->view('preview/preview_header_view', $data);
            $this->load->view('preview/preview_body_view', $data);
            $this->load->view('preview/preview_footer_view', $data);
        }
    }

    public function welcome_admin_dashboard()
    {
        $is_super_admin = $this->session->userdata('is_super_admin');
        $data['title'] = 'Welcome SDIL Lander Admin Panel';
        $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
        $data['full_name'] = $this->session->userdata('full_name');
        $data['active'] = 'dashboard';
        $data['footer_title'] = Admin::$footer_title;
        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_dashboard_view', $data);
        $this->load->view('admin/admin_dashboard_footer_view', $data);
    }

    public function super_admin_registration()
    {
        $this->load->library('Form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email|callback_unique_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('cell_number', 'Your Mobile Number', 'trim|min_length[4]|max_length[11]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin Registration- SDIL Lander';
            $this->load->view('admin/header_view', $data);
            $this->load->view('admin/app_user_registration_view', $data);
            $this->load->view('admin/footer_view', $data);
        } else {
            $this->app_user_model->create_sdil_lander_admin();
            $this->session->set_flashdata('admin_regis_comp_message', "Your registration is successfully completed.");
            redirect(base_url() . 'admin/register', 'refresh');

        }
    }

    public function update_admin_user()
    {
        $sd_lander_admin_id = $this->session->userdata('admin_id');
        $is_super_admin = $this->session->userdata('is_super_admin');
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {

            $this->load->library('Form_validation');

            // field name, error message, validation rules
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('cell_number', 'Your Mobile Number', 'trim|min_length[11]');

            $particular_user = $this->app_user_model->get_user_by_id($sd_lander_admin_id);

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update SDIL Lander Admin Profile';
                $data['page_title'] = 'Update Your Profile';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['full_name'] = $this->session->userdata('full_name');
                $data['particular_user'] = $particular_user;
                $data['footer_title'] = Admin::$footer_title;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_profile_update_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $this->app_user_model->update_admin_info($sd_lander_admin_id);
                $this->session->set_flashdata('admin_info_update_message', "Your information is updated successfully.");
                redirect(base_url() . 'admin/profile/update', 'refresh');
            }
        }
    }

    public function update_admin_password()
    {
        $sd_lander_admin_id = $this->session->userdata('admin_id');
        $sd_lander_admin_email = $this->session->userdata('admin_email');
        $is_super_admin = $this->session->userdata('is_super_admin');
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|min_length[6]|max_length[32]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update SDIL Lander Admin Password';
                $data['footer_title'] = Admin::$footer_title;
                $data['page_title'] = 'Update Your Password';
                $data['navbar_title'] = $is_super_admin ? Admin::$navbar_super_title : Admin::$navbar_title;
                $data['full_name'] = $this->session->userdata('full_name');

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_password_update_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $current_password = md5($this->input->post('current_password'));
                $get_current_password_db = $this->app_user_model->get_user_current_password($sd_lander_admin_id);
                print_r($current_password);
                print_r($get_current_password_db);
                if($current_password == $get_current_password_db['admin_password']){
                    $is_updated = $this->app_user_model->admin_password_update($sd_lander_admin_id, $sd_lander_admin_email, $is_super_admin);
                    if ($is_updated) {
                        $this->session->set_flashdata('admin_password_update_message', "Your Password is updated successfully.");
                    }
                } else {
                    $this->session->set_flashdata('admin_current_password_wrong_message', "Sorry!   Your Current Password is Wrong.");
                }

                redirect(base_url() . 'admin/password/update', 'refresh');
            }
        }
    }


    function not_found_email($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->check_admin_email($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('not_found_email', "%s '{$str}' is not found!");
            return FALSE;
        }
    }

    function unique_email($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_admin_email($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_email', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_country_code($str)
    {
        $created_by = $this->session->userdata('admin_id');
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_country_code($str, $created_by)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_country_code', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_url_link_button($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_url_link_button($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_url_link_button', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_country_name($str)
    {
        $created_by = $this->session->userdata('admin_id');
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_country_name($str, $created_by)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_country_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_device_name($str)
    {
        $created_by = $this->session->userdata('admin_id');
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_device_name($str, $created_by)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_device_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_live_preview_url($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_admin_live_preview_url($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_live_preview_url', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_theme_name($str)
    {
        $created_by = $this->session->userdata('admin_id');
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_theme_name($str, $created_by)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_theme_name', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_theme_color_code($str)
    {
        $created_by = $this->session->userdata('admin_id');
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_theme_color_code($str, $created_by)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_theme_color_code', "%s {$str} already exist!");
            return FALSE;
        }
    }


    function unique_device_code($str)
    {
        $created_by = $this->session->userdata('admin_id');
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_device_code($str, $created_by)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_device_code', "%s {$str} already exist!");
            return FALSE;
        }
    }


    function exist_email($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_admin_email($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('exist_email', "%s {$str} doesn't exist");
            return FALSE;
        }
    }

   /* function exist_password($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_admin_password($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('exist_password', "Sorry! Your current Password doesn't match");
            return FALSE;
        }
    }*/

    public function logout()
    {
        $newdata = array(
            'admin_id' => '',
            'admin_email' => '',
            'full_name' => '',
            'logged_in' => FALSE
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('/admin', 'refresh');
    }
}