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

    public function welcome_admin_dashboard()
    {
        $data['title'] = 'Welcome SDIL Lander Admin Panel';
        $data['navbar_title'] = 'SDIL Lander Admin Panel';
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
            $this->form_validation->set_rules('nid', 'Your NID', 'trim');
            $this->form_validation->set_rules('cell_number', 'Your Mobile Number', 'trim');

            $particular_user = $this->app_user_model->get_user_by_id($sd_lander_admin_id);

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update SDIL Lander Admin Profile';
                $data['page_title'] = 'Update Your Profile';
                $data['navbar_title'] = 'SDIL Lander Admin Panel';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
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
        $blri_admin_username = $this->session->userdata('admin_email');
        if (($this->session->userdata('admin_email') == "")) {
            $this->logout();
        } else {

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('email', 'Sorry! Your Email address', 'trim|required|valid_email|callback_exist_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update SDIL Lander Admin Password';
                $data['footer_title'] = Admin::$footer_title;
                $data['page_title'] = 'Update Your Password';
                $data['navbar_title'] = 'SDIL Lander Admin Panel';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_password_update_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $this->app_user_model->admin_password_update($sd_lander_admin_id, $blri_admin_username);
                $this->session->set_flashdata('admin_password_update_message', "Your Password is updated successfully.");
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