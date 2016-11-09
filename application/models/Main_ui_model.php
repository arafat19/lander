<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_ui_model extends CI_Model
{

    public static $table_blri_applicant = 'blri_applicant';

    public function __construct()
    {
        parent::__construct();
    }

    public function add_application($data)
    {
        $is_created = $this->db->insert(Main_ui_model::$table_blri_applicant, $data);
        return $is_created;
    }

    public function add_application_confirmation($data, $applicant_id)
    {
        $this->db->where('applicant_id', $applicant_id);
        $is_updated = $this->db->update(App_user_model::$table_blri_applicant, $data);
        return $is_updated;
    }

    public function get_applicant_by_phone_name_father_dob($applicant_mobile, $applicant_name, $applicant_father_name, $applicant_date_of_birth)
    {
        $this->db->select('*');
        $this->db->where('applicant_mobile', $applicant_mobile);
        $this->db->where('applicant_name', $applicant_name);
        $this->db->where('applicant_father_name', $applicant_father_name);
        $this->db->where('applicant_date_of_birth', $applicant_date_of_birth);
        $query = $this->db->get(App_user_model::$table_blri_applicant);
        return $query->row_array();
    }

    public function get_applicant_by_id($applicant_id)
    {
        $this->db->select('*', 'course_name','district_name','sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_sub_district, 'blri_sub_district.sub_district_id = blri_applicant.applicant_subdistrict_id');
        $this->db->join(App_user_model::$table_blri_course, 'blri_course.course_id = blri_applicant.applicant_course_id');
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_applicant.applicant_district_id');
        $this->db->where('applicant_id', $applicant_id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_not_confirmed_applicants_list()
    {
        $this->db->select('*');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->where('finally_submitted', 0);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function delete_not_confirmed_applicant($applicant_id)
    {
        $this->db->where('applicant_id', $applicant_id);
        $this->db->where('finally_submitted', 0);
        $is_deleted = $this->db->delete(App_user_model::$table_blri_applicant);
        return $is_deleted;
    }

    public function update_applicant_info($db_data, $applicant_id)
    {
        $this->db->where('applicant_id', $applicant_id);
        $is_updated = $this->db->update(App_user_model::$table_blri_applicant, $db_data);
        return $is_updated;
    }


}