<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class app_user_model extends CI_Model
{

    public static $table_sdil_lander_admin = 'sdil_lander_admin';
    public static $table_blri_district = 'blri_district';
    public static $table_blri_sub_district = 'blri_sub_district';
    public static $table_blri_course = 'blri_course';
    public static $table_blri_instructor = 'blri_instructor';
    public static $table_blri_course_instructor = 'blri_course_instructor';
    public static $table_blri_applicant = 'blri_applicant';

    public function __construct()
    {
        parent::__construct();
    }

    function login_check($email, $password)
    {
        $this->db->where("admin_email", $email);
        $this->db->where("admin_password", $password);

        $query = $this->db->get(App_user_model::$table_sdil_lander_admin);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                //add all data to session
                $newdata = array(
                    'admin_id' => $rows->admin_id,
                    'admin_email' => $rows->admin_email,
                    'full_name' => $rows->full_name,
                    'logged_in' => TRUE,
                );
            }
            $this->session->set_userdata($newdata);
            return true;
        }
        return false;
    }

    public function check_admin_email($email)
    {
        $this->db->where('admin_email', $email);
        $query = $this->db->get(App_user_model::$table_sdil_lander_admin);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function create_sdil_lander_admin()
    {
        $data = array(
            'full_name' => $this->input->post('name'),
            'cell_number' => $this->input->post('cell_number'),
            'enabled' => $this->input->post('enabled'),
            'admin_password' => md5(filter_var($this->input->post('password'))),
            'password_expired' => $this->input->post('password_expired'),
            'password_reset_validity' => $this->input->post(date("Y-m-d")),
            'admin_email' => filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL)

        );
        $this->db->insert(App_user_model::$table_sdil_lander_admin, $data);
    }
    public function unique_admin_email($email)
    {
        $this->db->where('admin_email', $email);
        $query = $this->db->get(App_user_model::$table_sdil_lander_admin);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_admin_email($email)
    {
        $this->db->where('admin_email', $email);
        $query = $this->db->get(App_user_model::$table_sdil_lander_admin);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function update_admin_info($user_id)
    {
        $data = array(
            'blri_admin_name' => $this->input->post('name'),
            'blri_admin_phone_number' => $this->input->post('cell_number'),
            'blri_admin_NID' => $this->input->post('nid')
        );

        $this->db->where('blri_admin_id', $user_id);
        $this->db->update('blri_admin', $data);
    }

    public function admin_password_update($user_id, $blri_admin_username)
    {
        $data = array(
            'blri_admin_password' => md5($this->input->post('password'))
        );
        $this->db->where('blri_admin_id', $user_id);
        $this->db->where('blri_admin_username', $blri_admin_username);
        $this->db->update('blri_admin', $data);
    }


    public function get_user_by_id($user_id)
    {
        $this->db->select('*');
        $this->db->where('blri_admin_id', $user_id);
        $result = $this->db->get('blri_admin');

        return $result->row_array();
    }
}