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
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_name', 'Country name', 'trim|required|min_length[2]|callback_unique_country_name');
            $this->form_validation->set_rules('country_code', 'Country code', 'trim|required|min_length[2]|callback_unique_country_code');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Country List - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Create Country';
                $data['navbar_title'] = Admin::$navbar_title;
                $data['data_list_title'] = 'All Countries List';
                $data['footer_title'] = Admin::$footer_title;

                $all_countries = $this->app_user_model->get_all_countries(); // Reading and showing the countries list from DB
                $data['all_countries'] = $all_countries;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_country_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'lander_country_name' => $this->input->post('country_name'),
                    'lander_country_code' => $this->input->post('country_code'),
                    'is_active' => $is_active
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
        $country_id_dec = base64_decode($country_id);
        $single_country = $this->app_user_model->get_single_country_by_id($country_id_dec);
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_name', 'Country name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('country_code', 'Country code', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Country - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Country';
                $data['navbar_title'] = Admin::$navbar_title;
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
                    'is_active' => $is_active
                );
                $is_updated = FALSE;
                $check_country_name_is_unique = TRUE;
                $check_country_code_is_unique = TRUE;
                if ($country_name == $single_country['lander_country_name'] && $country_code == $single_country['lander_country_code']) {
                    $is_updated = $this->app_user_model->update_country($data, $country_id_dec);
                } else {
                    // Country name and code unique check during update
                    if ($country_name != $single_country['lander_country_name'] && $country_code != $single_country['lander_country_code']) {
                        $check_country_name_is_unique = $this->app_user_model->unique_lander_country_name($country_name);
                        if ($check_country_name_is_unique) {
                            $this->session->set_flashdata('admin_country_name_not_unique_message', "Given Country name is already exist");
                        }
                        $check_country_code_is_unique = $this->app_user_model->unique_lander_country_code($country_code);
                        if ($check_country_code_is_unique) {
                            $this->session->set_flashdata('admin_country_code_not_unique_message', "Given Country code is already exist");
                        }
                        if ($check_country_name_is_unique || $check_country_code_is_unique) {
                            redirect(base_url() . 'admin/country/update/' . $country_id, 'refresh');
                        }
                    } else if ($country_name != $single_country['lander_country_name'] && $country_code == $single_country['lander_country_code']) {
                        $check_country_name_is_unique = $this->app_user_model->unique_lander_country_name($country_name);
                        if ($check_country_name_is_unique) {
                            $this->session->set_flashdata('admin_country_name_not_unique_message', "Given Country name is already exist");
                            $check_country_name_is_unique = FALSE;
                            $check_country_code_is_unique = FALSE;
                            redirect(base_url() . 'admin/country/update/' . $country_id, 'refresh');
                        }
                    } else if ($country_name == $single_country['lander_country_name'] && $country_code != $single_country['lander_country_code']) {
                        $check_country_code_is_unique = $this->app_user_model->unique_lander_country_code($country_code);
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
        $country_id_dec = base64_decode($country_id);
        $single_country = $this->app_user_model->get_single_country_by_id($country_id_dec);
        $is_active = $single_country["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Country can not be deleted.');
        } else {
            $this->app_user_model->delete_country($country_id_dec);
            $this->session->set_flashdata('country_delete_message', 'Selected Country is successfully deleted');
        }

        redirect(base_url() . 'admin/country/create');
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
            $all_countries = $this->app_user_model->get_all_countries(); // Reading and showing the country list from DB

            $all_slider_images = $this->app_user_model->get_all_slider_images(); // Reading and showing the countries list from DB
            $data['all_slider_images'] = $all_slider_images;
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_id', 'Selected Country', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Lander Images Upload - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Upload Slider Images';
                $data['navbar_title'] = Admin::$navbar_title;
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
                    $data['navbar_title'] = Admin::$navbar_title;
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
        $single_image = $this->app_user_model->get_single_image_by_id($image_id_dec);
        $data['single_image'] = $single_image;
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $all_countries = $this->app_user_model->get_all_countries(); // Reading and showing the country list from DB

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('country_id', 'Selected Country', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Lander Images Upload - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Slider Images';
                $data['navbar_title'] = Admin::$navbar_title;
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
                    $data['navbar_title'] = Admin::$navbar_title;
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
        $image_id_dec = base64_decode($image_id);
        $single_image = $this->app_user_model->get_single_image_by_id($image_id_dec);
        $is_active = $single_image["lander_image_is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Image can not be deleted.');
        } else {
            $image_name = $single_image["lander_image_file_name"];
            $path = "./uploaded/lander_slider_images/" . $image_name;
            $is_deleted = $this->app_user_model->delete_lander_slider_image($image_id_dec);
            if ($is_deleted) {
                unlink($path);
            }
            $this->session->set_flashdata('slider_image_delete_message', 'Selected Image is successfully deleted');
        }

        redirect(base_url() . 'admin/slider/image/create');
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
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('device_name', 'Device name', 'trim|required|min_length[2]|callback_unique_device_name');
            $this->form_validation->set_rules('device_code', 'Device code', 'trim|required|min_length[2]|callback_unique_device_code');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'SDIL Lander Device List - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Create Device';
                $data['navbar_title'] = Admin::$navbar_title;
                $data['data_list_title'] = 'All Devices List';
                $data['footer_title'] = Admin::$footer_title;

                $all_devices = $this->app_user_model->get_all_devices(); // Reading and showing the devices list from DB
                $data['all_devices'] = $all_devices;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_device_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_active = $this->input->post('is_active') ? 1 : 0;
                $data = array(
                    'lander_device_name' => $this->input->post('device_name'),
                    'lander_device_code' => strtolower($this->input->post('device_code')),
                    'lander_device_is_active' => $is_active
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
        $single_device = $this->app_user_model->get_single_device_by_id($device_id_dec);
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('device_name', 'Device name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('device_code', 'Device code', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('is_active', 'Is Active');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Device - SDIL Lander';
                $data['full_name'] = $this->session->userdata('full_name');
                $data['page_title'] = 'Update Device';
                $data['navbar_title'] = Admin::$navbar_title;
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
                    'lander_device_is_active' => $is_active
                );
                $is_updated = FALSE;
                $check_device_name_is_unique = TRUE;
                $check_device_code_is_unique = TRUE;
                if ($device_name == $single_device['lander_device_name'] && $device_code == $single_device['lander_device_code']) {
                    $is_updated = $this->app_user_model->update_device($data, $device_id_dec);
                } else {
                    // Country name and code unique check during update
                    if ($device_name != $single_device['lander_device_name'] && $device_code != $single_device['lander_device_code']) {
                        $check_device_name_is_unique = $this->app_user_model->unique_lander_device_name($device_name);
                        if ($check_device_name_is_unique) {
                            $this->session->set_flashdata('admin_device_name_not_unique_message', "Given Device name is already exist");
                        }
                        $check_device_code_is_unique = $this->app_user_model->unique_lander_device_code($device_code);
                        if ($check_device_code_is_unique) {
                            $this->session->set_flashdata('admin_device_code_not_unique_message', "Given Device code is already exist");
                        }
                        if ($check_device_name_is_unique || $check_device_code_is_unique) {
                            redirect(base_url() . 'admin/device/update/' . $device_id, 'refresh');
                        }
                    } else if ($device_name != $single_device['lander_device_name'] && $device_code == $single_device['lander_device_code']) {
                        $check_device_name_is_unique = $this->app_user_model->unique_lander_device_name($device_name);
                        if ($check_device_name_is_unique) {
                            $this->session->set_flashdata('admin_device_name_not_unique_message', "Given Device name is already exist");
                            $check_device_name_is_unique = FALSE;
                            $check_device_code_is_unique = FALSE;
                            redirect(base_url() . 'admin/device/update/' . $device_id, 'refresh');
                        }
                    } else if ($device_name == $single_device['lander_device_name'] && $device_code != $single_device['lander_device_code']) {
                        $check_device_code_is_unique = $this->app_user_model->unique_lander_device_code($device_code);
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
        $device_id_dec = base64_decode($device_id);
        $single_device = $this->app_user_model->get_single_device_by_id($device_id_dec);
        $is_active = $single_device["lander_device_is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Device can not be deleted.');
        } else {
            $this->app_user_model->delete_device($device_id_dec);
            $this->session->set_flashdata('device_delete_message', 'Selected Device is successfully deleted');
        }

        redirect(base_url() . 'admin/device/create');
    }

    /*
   * **********************************************************************************
   * Lander Devices Create (upload), Read (List), Update & Delete Implementation Finish
   * **********************************************************************************
   */
    public function welcome_admin_dashboard()
    {
        $data['title'] = 'Welcome SDIL Lander Admin Panel';
        $data['navbar_title'] = Admin::$navbar_title;
        $data['full_name'] = $this->session->userdata('full_name');
        $data['active'] = 'dashboard';
        $data['footer_title'] = Admin::$footer_title;
        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_dashboard_view', $data);
        $this->load->view('admin/admin_dashboard_footer_view', $data);
    }

    public function admin_registration()
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
                $data['navbar_title'] = Admin::$navbar_title;
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
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|min_length[6]|max_length[32]|callback_exist_password');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update SDIL Lander Admin Password';
                $data['footer_title'] = Admin::$footer_title;
                $data['page_title'] = 'Update Your Password';
                $data['navbar_title'] = Admin::$navbar_title;
                $data['full_name'] = $this->session->userdata('full_name');

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_password_update_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_updated = $this->app_user_model->admin_password_update($sd_lander_admin_id, $sd_lander_admin_email);
                if ($is_updated) {
                    $this->session->set_flashdata('admin_password_update_message', "Your Password is updated successfully.");
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
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_country_code($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_country_code', "%s {$str} already exist!");
            return FALSE;
        }
    }

    function unique_country_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_country_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_country_name', "%s {$str} already exist!");
            return FALSE;
        }
    }
    function unique_device_name($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_device_name($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_device_name', "%s {$str} already exist!");
            return FALSE;
        }
    }


    function unique_device_code($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->unique_lander_device_code($str)) {
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

    function exist_password($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_admin_password($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('exist_password', "Sorry! Your current Password doesn't match");
            return FALSE;
        }
    }

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