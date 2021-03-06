<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_ui_model extends CI_Model
{

    public static $table_sdil_lander_country = 'sdil_lander_country';
    public static $table_sdil_lander_country_wise_slider_image = 'sdil_lander_country_wise_slider_image';
    public static $table_sdil_lander_device = 'sdil_lander_device';
    public static $table_sdil_lander_last_button_link = 'sdil_lander_last_button_link';
    public static $table_sdil_lander_theme = 'sdil_lander_theme';
    public static $table_sdil_lander_theme_country = 'sdil_lander_theme_country';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_theme_id_by_country_is_live($country_code, $is_live)
    {
        $this->db->select('*');
        $this->db->where('lander_theme_country_id', $country_code);
        $this->db->where('sdil_lander_theme_country_is_live', $is_live);
        $result = $this->db->get(Main_ui_model::$table_sdil_lander_theme_country);
        return $result->row_array();
    }
    public function get_last_btn_link_by_device_country_id($country_ID, $current_device_id, $created_by)
    {
        $this->db->select('*');
        $this->db->where('lander_last_btn_country_id', $country_ID);
        $this->db->where('lander_last_btn_device_id', $current_device_id);
        $this->db->where('lander_last_btn_is_active', 1);
        $this->db->where('lander_last_btn_created_by', $created_by);
        $result = $this->db->get(Main_ui_model::$table_sdil_lander_last_button_link);
        return $result->row_array();
    }
    public function get_current_device_id_device_code($current_device_code, $created_by)
    {
        $this->db->select('*');
        $this->db->where('lander_device_code', $current_device_code);
        $this->db->where('lander_device_is_active', 1);
        $this->db->where('lander_device_created_by', $created_by);
        $result = $this->db->get(Main_ui_model::$table_sdil_lander_device);
        return $result->row_array();
    }
    public function get_country_id_by_country_code_is_active($country_code, $is_active, $created_by)
    {
        $this->db->select('*');
        $this->db->where('lander_country_code', $country_code);
        $this->db->where('is_active', $is_active);
        $this->db->where('created_by', $created_by);
        $result = $this->db->get(Main_ui_model::$table_sdil_lander_country);
        return $result->row_array();
    }
    public function get_theme_css_by_theme_id_is_active($theme_ID, $is_active, $created_by)
    {
        $this->db->select('*');
        $this->db->where('lander_theme_id', $theme_ID);
        $this->db->where('lander_theme_is_active', $is_active);
        $this->db->where('lander_theme_created_by', $created_by);
        $result = $this->db->get(Main_ui_model::$table_sdil_lander_theme);
        return $result->row_array();
    }

    public function get_active_images_of_image_slider_by_country($country_ID, $is_active, $created_by)
    {
        $this->db->select('*');
        $this->db->where('lander_image_is_active', $is_active);
        $this->db->where('lander_image_country_id', $country_ID);
        $this->db->where('lander_image_created_by', $created_by);
        $result = $this->db->get(App_user_model::$table_sdil_lander_country_wise_slider_image);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

}