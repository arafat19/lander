<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class app_user_model extends CI_Model
{

    public static $table_sdil_lander_admin = 'sdil_lander_admin';
    public static $table_sdil_lander_country = 'sdil_lander_country';
    public static $table_sdil_lander_country_wise_slider_image = 'sdil_lander_country_wise_slider_image';
    public static $table_sdil_lander_device = 'sdil_lander_device';
    public static $table_sdil_lander_last_button_link = 'sdil_lander_last_button_link';
    public static $table_sdil_lander_theme = 'sdil_lander_theme';
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

    public function unique_lander_country_code($country_code)
    {
        $this->db->where('lander_country_code', $country_code);
        $query = $this->db->get(App_user_model::$table_sdil_lander_country);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function unique_lander_country_name($country_name)
    {
        $this->db->where('lander_country_name', $country_name);
        $query = $this->db->get(App_user_model::$table_sdil_lander_country);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function unique_lander_theme_name($theme_name)
    {
        $this->db->where('lander_theme_name', $theme_name );
        $query = $this->db->get(App_user_model::$table_sdil_lander_theme);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function unique_lander_theme_color_code($theme_color_code)
    {
        $this->db->where('lander_theme_color_code', $theme_color_code );
        $query = $this->db->get(App_user_model::$table_sdil_lander_theme);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function unique_lander_device_name($device_name)
    {
        $this->db->where('lander_device_name', $device_name);
        $query = $this->db->get(App_user_model::$table_sdil_lander_device);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function unique_lander_device_code($device_code)
    {
        $this->db->where('lander_device_code', $device_code);
        $query = $this->db->get(App_user_model::$table_sdil_lander_device);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function unique_lander_url_link_button($btn_link)
    {
        $this->db->where('lander_last_btn_link_url', $btn_link);
        $query = $this->db->get(App_user_model::$table_sdil_lander_last_button_link);
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

    public function exist_admin_password($c_password)
    {
        $this->db->where('admin_password', md5($c_password));
        $query = $this->db->get(App_user_model::$table_sdil_lander_admin);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function update_admin_info($admin_id)
    {
        $data = array(
            'full_name' => $this->input->post('name'),
            'cell_number' => $this->input->post('cell_number')
        );

        $this->db->where('admin_id', $admin_id);
        $is_updated = $this->db->update(App_user_model::$table_sdil_lander_admin, $data);
        if ($is_updated) {
            $particular_user = $this->get_user_by_id($admin_id);
            $updated_data = array(
                'admin_id' => $admin_id,
                'admin_email' => $particular_user['admin_email'],
                'full_name' => $particular_user['full_name'],
                'logged_in' => TRUE,
            );
            $this->session->set_userdata($updated_data);
        }
    }

    public function admin_password_update($sd_lander_admin_id, $sd_lander_admin_email)
    {
        $data = array(
            'admin_password' => md5($this->input->post('password'))
        );
        $this->db->where('admin_id', $sd_lander_admin_id);
        $this->db->where('admin_email', $sd_lander_admin_email);
        $is_updated = $this->db->update(App_user_model::$table_sdil_lander_admin, $data);
        return $is_updated;
    }

    public function update_country($data, $country_id)
    {
        $this->db->where('lander_country_id', $country_id);
        $is_updated = $this->db->update(App_user_model::$table_sdil_lander_country, $data);
        return $is_updated;
    }

    public function update_device($data, $device_id)
    {
        $this->db->where('lander_device_id', $device_id);
        $is_updated = $this->db->update(App_user_model::$table_sdil_lander_device, $data);
        return $is_updated;
    }


    public function get_user_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->where('admin_id', $admin_id);
        $result = $this->db->get(App_user_model::$table_sdil_lander_admin);

        return $result->row_array();
    }

    public function get_single_country_by_id($country_id)
    {
        $this->db->select('*');
        $this->db->where('lander_country_id', $country_id);
        $result = $this->db->get(App_user_model::$table_sdil_lander_country);

        return $result->row_array();
    }

    public function get_single_link_by_id($last_btn_link_id)
    {
        $this->db->select('*');
        $this->db->where('lander_last_btn_link_id', $last_btn_link_id);
        $result = $this->db->get(App_user_model::$table_sdil_lander_last_button_link);

        return $result->row_array();
    }

    public function get_single_theme_by_id($theme_id)
    {
        $this->db->select('*');
        $this->db->where('lander_theme_id', $theme_id);
        $result = $this->db->get(App_user_model::$table_sdil_lander_theme);

        return $result->row_array();
    }

    public function get_associated_country_count($country_id)
    {
        $this->db->where('lander_image_country_id', $country_id);
        $result_country_wise_slider_image = $this->db->get(App_user_model::$table_sdil_lander_country_wise_slider_image);

        $this->db->where('lander_last_btn_country_id', $country_id);
        $result_lander_last_button_link = $this->db->get(App_user_model::$table_sdil_lander_last_button_link);

        $row_count = $result_country_wise_slider_image->num_rows() + $result_lander_last_button_link->num_rows();

        return $row_count;
    }
    public function get_associated_device_count($device_id)
    {
        $this->db->where('lander_last_btn_device_id', $device_id);
        $result_device_count = $this->db->get(App_user_model::$table_sdil_lander_last_button_link);

        $row_count = $result_device_count->num_rows();

        return $row_count;
    }



    public function check_existence_data($device_id, $country_id)
    {
        $this->db->where('lander_last_btn_country_id', $country_id);
        $this->db->where('lander_last_btn_device_id', $device_id);
        $result_lander_last_button_link = $this->db->get(App_user_model::$table_sdil_lander_last_button_link);

        $row_count = $result_lander_last_button_link->num_rows();

        return $row_count;
    }

    public function get_single_device_by_id($device_id)
    {
        $this->db->select('*');
        $this->db->where('lander_device_id', $device_id);
        $result = $this->db->get(App_user_model::$table_sdil_lander_device);

        return $result->row_array();
    }

    public function get_single_image_by_id($image_id)
    {
        $this->db->select('*');
        $this->db->where('lander_image_id', $image_id);
        $result = $this->db->get(App_user_model::$table_sdil_lander_country_wise_slider_image);

        return $result->row_array();
    }

    function get_all_countries()
    {
        $result = $this->db->get(App_user_model::$table_sdil_lander_country);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    function get_all_themes()
    {
        $result = $this->db->get(App_user_model::$table_sdil_lander_theme   );
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_all_last_btn_link()
    {
        $this->db->select('*');
        $this->db->from(App_user_model::$table_sdil_lander_last_button_link, App_user_model::$table_sdil_lander_device);
        $this->db->join(App_user_model::$table_sdil_lander_country, 'sdil_lander_country.lander_country_id = sdil_lander_last_button_link.lander_last_btn_country_id');
        $this->db->join(App_user_model::$table_sdil_lander_device, 'sdil_lander_device.lander_device_id = sdil_lander_last_button_link.lander_last_btn_device_id');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_all_active_countries()
    {
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $result = $this->db->get(App_user_model::$table_sdil_lander_country);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_all_devices()
    {
        $result = $this->db->get(App_user_model::$table_sdil_lander_device);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_all_active_devices()
    {
        $this->db->select('*');
        $this->db->where('lander_device_is_active', 1);
        $result = $this->db->get(App_user_model::$table_sdil_lander_device);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_all_slider_images()
    {
        $this->db->select('*');
        $this->db->from(App_user_model::$table_sdil_lander_country_wise_slider_image);
        $this->db->join(App_user_model::$table_sdil_lander_country, 'sdil_lander_country.lander_country_id = sdil_lander_country_wise_slider_image.lander_image_country_id');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function create_device($data)
    {
        $is_created = $this->db->insert(App_user_model::$table_sdil_lander_device, $data);
        return $is_created;
    }

    public function create_lander_theme($data)
    {
        $is_created = $this->db->insert(App_user_model::$table_sdil_lander_theme, $data);
        return $is_created;
    }

    public function create_last_btn_link($data)
    {
        $is_created = $this->db->insert(App_user_model::$table_sdil_lander_last_button_link, $data);
        return $is_created;
    }

    public function create_country($data)
    {
        $is_created = $this->db->insert(App_user_model::$table_sdil_lander_country, $data);
        return $is_created;
    }

    public function delete_country($country_id)
    {
        $this->db->where('lander_country_id', $country_id);
        $this->db->delete(App_user_model::$table_sdil_lander_country);
    }

    public function delete_device($device_id)
    {
        $this->db->where('lander_device_id', $device_id);
        $this->db->delete(App_user_model::$table_sdil_lander_device);
    }
    public function delete_lander_theme($theme_id)
    {
        $this->db->where('lander_theme_id', $theme_id);
        $this->db->delete(App_user_model::$table_sdil_lander_theme);
    }

    public function create_image_slider($data)
    {
        $is_created = $this->db->insert_batch(App_user_model::$table_sdil_lander_country_wise_slider_image, $data);
        return $is_created ? true : false;
    }

    public function update_image_slider($data, $image_id)
    {
        $this->db->where('lander_image_id', $image_id);
        $is_updated = $this->db->update(App_user_model::$table_sdil_lander_country_wise_slider_image, $data);
        return $is_updated;
    }

    public function update_last_btn_link($data, $last_btn_link_id)
    {
        $this->db->where('lander_last_btn_link_id', $last_btn_link_id);
        $is_updated = $this->db->update(App_user_model::$table_sdil_lander_last_button_link, $data);
        return $is_updated;
    }
    public function update_lander_theme($data, $theme_id)
    {
        $this->db->where('lander_theme_id', $theme_id);
        $is_updated = $this->db->update(App_user_model::$table_sdil_lander_theme, $data);
        return $is_updated;
    }

    public function delete_lander_slider_image($image_id)
    {
        $this->db->where('lander_image_id', $image_id);
        $is_deleted = $this->db->delete(App_user_model::$table_sdil_lander_country_wise_slider_image);
        return $is_deleted;
    }
    public function delete_last_button_link($last_btn_link_id)
    {
        $this->db->where('lander_last_btn_link_id', $last_btn_link_id);
        $is_deleted = $this->db->delete(App_user_model::$table_sdil_lander_last_button_link);
        return $is_deleted;
    }

}