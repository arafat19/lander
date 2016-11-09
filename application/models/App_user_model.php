<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class app_user_model extends CI_Model
{

    public static $table_blri_district = 'blri_district';
    public static $table_blri_sub_district = 'blri_sub_district';
    public static $table_blri_course = 'blri_course';
    public static $table_blri_admin = 'blri_admin';
    public static $table_blri_instructor = 'blri_instructor';
    public static $table_blri_course_instructor = 'blri_course_instructor';
    public static $table_blri_applicant = 'blri_applicant';

    public function __construct()
    {
        parent::__construct();
    }

    function login($email, $password)
    {
        $this->db->where("blri_admin_username", $email);
        $this->db->where("blri_admin_password", $password);

        $query = $this->db->get("blri_admin");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                //add all data to session
                $newdata = array(
                    'blri_admin_id' => $rows->blri_admin_id,
                    'blri_admin_username' => $rows->blri_admin_username,
                    'blri_admin_name' => $rows->blri_admin_name,
                    'logged_in' => TRUE,
                );
            }
            $this->session->set_userdata($newdata);
            return true;
        }
        return false;
    }

    public function check_user_email($email)
    {
        $this->db->where('blri_admin_username', $email);
        $query = $this->db->get('blri_admin');
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function add_user()
    {
        $data = array(
            'blri_admin_name' => $this->input->post('name'),
            'blri_admin_username' => $this->input->post('email'),
            'blri_admin_password' => md5($this->input->post('password')),
            'blri_admin_phone_number' => $this->input->post('cell_number'),
            'blri_admin_NID' => $this->input->post('nid')
        );
        $this->db->insert('blri_admin', $data);
    }

    public function create_district()
    {
        $data = array(
            'district_name' => $this->input->post('district_name')
        );
        $is_created = $this->db->insert(App_user_model::$table_blri_district, $data);

        return $is_created;
    }

    public function assign_course($course_id, $instructor_id)
    {
        $data = array(
            'instructor_id' => $instructor_id,
            'course_id' => $course_id
        );
        $course_count = $this->get_course_count($instructor_id);
        $course_c = $course_count['course_count'] + 1;
        $course_counted = $this->update_course_count($course_c, $instructor_id);
        if ($course_counted) {
            $is_created = $this->db->insert(App_user_model::$table_blri_course_instructor, $data);
        } else {
            $is_created = FALSE;
        }
        return $is_created;
    }

    public function get_course_count($instructor_id)
    {
        $this->db->select('course_count');
        $this->db->where('instructor_id', $instructor_id);
        $query = $this->db->get(App_user_model::$table_blri_instructor);
        return $query->row_array();
    }

    public function update_course_count($course_count, $instructor_id)
    {
        $this->db->where('instructor_id', $instructor_id);
        $data = array(
            'course_count' => $course_count
        );
        $is_counted = $this->db->update(App_user_model::$table_blri_instructor, $data);
        return $is_counted;
    }

    public function remove_course($course_id, $instructor_id)
    {
        $course_count = $this->get_course_count($instructor_id);
        $course_c = $course_count['course_count'] - 1;
        $course_counted = $this->update_course_count($course_c, $instructor_id);
        $this->db->where('course_id', $course_id);
        $this->db->where('instructor_id', $instructor_id);
        if ($course_counted) {
            $is_deleted = $this->db->delete(App_user_model::$table_blri_course_instructor);
        } else {
            $is_deleted = FALSE;
        }
        return $is_deleted;
    }

    public function check_is_assigned($course_id, $instructor_id)
    {
        $this->db->where('course_id', $course_id);
        $this->db->where('instructor_id', $instructor_id);
        $query = $this->db->get(App_user_model::$table_blri_course_instructor);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function create_course($data)
    {
        $is_created = $this->db->insert(App_user_model::$table_blri_course, $data);
        return $is_created;
    }

    public function create_instructor($data)
    {
        $is_created = $this->db->insert(App_user_model::$table_blri_instructor, $data);
        return $is_created;
    }

    function update_single_image($instructor_id, $data)
    {
        $this->db->where('instructor_id', $instructor_id);
        $this->db->update(App_user_model::$table_blri_instructor, $data);
    }

    public function update_course($data, $course_id)
    {
        $this->db->where('course_id', $course_id);
        $is_updated = $this->db->update(App_user_model::$table_blri_course, $data);
        return $is_updated;
    }

    public function update_instructor($data, $instructor_id)
    {
        $this->db->where('instructor_id', $instructor_id);
        $is_updated = $this->db->update(App_user_model::$table_blri_instructor, $data);
        return $is_updated;
    }

    public function create_sub_district()
    {
        $data = array(
            'sub_district_name' => $this->input->post('sub_district_name'),
            'district_id' => $this->input->post('district_id')
        );
        $is_created = $this->db->insert(App_user_model::$table_blri_sub_district, $data);

        return $is_created;
    }

    public function update_sub_district($sub_district_id)
    {
        $data = array(
            'sub_district_name' => $this->input->post('update_sub_district_name'),
            'district_id' => $this->input->post('district_id')
        );
        $this->db->where('sub_district_id', $sub_district_id);
        $is_updated = $this->db->update(App_user_model::$table_blri_sub_district, $data);
        return $is_updated;
    }

    public function update_district($district_id)
    {
        $data = array(
            'district_name' => $this->input->post('update_district_name')
        );
        $this->db->where('district_id', $district_id);
        $is_updated = $this->db->update(App_user_model::$table_blri_district, $data);
        return $is_updated;
    }

    public function exist_user_email($email)
    {
        $this->db->where('blri_admin_username', $email);
        $query = $this->db->get(App_user_model::$table_blri_admin);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function exist_instructor_email($email)
    {
        $this->db->where('instructor_email', $email);
        $query = $this->db->get(App_user_model::$table_blri_instructor);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_instructor_phone($phone)
    {
        $this->db->where('instructor_phone_number', $phone);
        $query = $this->db->get(App_user_model::$table_blri_instructor);
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function exist_admin_email($email)
    {
        $this->db->where('blri_admin_username', $email);
        $query = $this->db->get('blri_admin');
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function get_all_districts()
    {
        $result = $this->db->get(App_user_model::$table_blri_district);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_all_courses()
    {
        $result = $this->db->get(App_user_model::$table_blri_course);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_all_sub_districts()
    {
        $result = $this->db->get(App_user_model::$table_blri_sub_district);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    function get_all_sub_districts_with_district()
    {
        $this->db->select('*', 'district_name');
        $this->db->from(App_user_model::$table_blri_sub_district);
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_sub_district.district_id');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    function get_all_instructors()
    {
        $result = $this->db->get(App_user_model::$table_blri_instructor);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function get_single_sub_district_by_id($sub_district_id)
    {
        $this->db->select('*');
        $this->db->where('sub_district_id', $sub_district_id);
        $query = $this->db->get(App_user_model::$table_blri_sub_district);

        return $query->row_array();
    }

    public function get_sub_district_by_district_id($district_id)
    {
        $this->db->select('*');
        $this->db->where('district_id', $district_id);
        $result = $this->db->get(App_user_model::$table_blri_sub_district);
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function get_single_course_by_id($course_id)
    {
        $this->db->select('*');
        $this->db->where('course_id', $course_id);
        $query = $this->db->get(App_user_model::$table_blri_course);

        return $query->row_array();
    }

    public function get_single_instructor_by_id($instructor_id)
    {
        $this->db->select('*');
        $this->db->where('instructor_id', $instructor_id);
        $query = $this->db->get(App_user_model::$table_blri_instructor);

        return $query->row_array();
    }

    public function get_single_district_by_id($district_id)
    {
        $this->db->select('*');
        $this->db->where('district_id', $district_id);
        $query = $this->db->get(App_user_model::$table_blri_district);

        return $query->row_array();
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

    public function get_applicants_list($course_id)
    {
        $this->db->select('*', 'course_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_course, App_user_model::$table_blri_course.'.course_id = '.App_user_model::$table_blri_applicant.'.applicant_course_id');
        $this->db->where('applicant_course_id', $course_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function get_applicants_list_by_district($district_id)
    {
        $this->db->select('*', 'district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_applicant.applicant_district_id');
        $this->db->where('applicant_district_id', $district_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function get_applicants_list_by_sub_district($sub_district_id)
    {
        $this->db->select('*', 'sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_sub_district, 'blri_sub_district.sub_district_id = blri_applicant.applicant_subdistrict_id');
        $this->db->where('applicant_subdistrict_id', $sub_district_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function get_applicants_list_by_course_sub_district($course_id,$sub_district_id)
    {
        $this->db->select('*', 'course_name','sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_sub_district, 'blri_sub_district.sub_district_id = blri_applicant.applicant_subdistrict_id');
        $this->db->join(App_user_model::$table_blri_course, 'blri_course.course_id = blri_applicant.applicant_course_id');
        $this->db->where('applicant_course_id', $course_id);
        $this->db->where('applicant_subdistrict_id', $sub_district_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function get_applicants_list_by_district_sub_district($district_id,$sub_district_id)
    {
        $this->db->select('*', 'district_name','sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_sub_district, 'blri_sub_district.sub_district_id = blri_applicant.applicant_subdistrict_id');
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_applicant.applicant_district_id');
        $this->db->where('applicant_district_id', $district_id);
        $this->db->where('applicant_subdistrict_id', $sub_district_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function get_applicants_list_by_course_district($course_id,$district_id)
    {
        $this->db->select('*', 'course_name','district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_course, 'blri_course.course_id = blri_applicant.applicant_course_id');
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_applicant.applicant_district_id');
        $this->db->where('applicant_district_id', $district_id);
        $this->db->where('applicant_course_id', $course_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function get_applicants_list_by_course_district_sub($course_id,$district_id, $sub_district_id)
    {
        $this->db->select('*', 'course_name','district_name','sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_sub_district, 'blri_sub_district.sub_district_id = blri_applicant.applicant_subdistrict_id');
        $this->db->join(App_user_model::$table_blri_course, 'blri_course.course_id = blri_applicant.applicant_course_id');
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_applicant.applicant_district_id');
        $this->db->where('applicant_district_id', $district_id);
        $this->db->where('applicant_course_id', $course_id);
        $this->db->where('applicant_subdistrict_id', $sub_district_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function get_applicants_list_by_course_district_daterange($course_id,$district_id,  $to_date, $from_date)
    {
        $this->db->select('*', 'course_name','district_name','sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_sub_district, 'blri_sub_district.sub_district_id = blri_applicant.applicant_subdistrict_id');
        $this->db->join(App_user_model::$table_blri_course, 'blri_course.course_id = blri_applicant.applicant_course_id');
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_applicant.applicant_district_id');
        $this->db->where('applicant_district_id', $district_id);
        $this->db->where('applicant_course_id', $course_id);
        $this->db->where('application_date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function get_applicants_list_by_course_daterange($course_id,  $to_date, $from_date)
    {
        $this->db->select('*', 'course_name','district_name','sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_course, 'blri_course.course_id = blri_applicant.applicant_course_id');
        $this->db->where('applicant_course_id', $course_id);
        $this->db->where('application_date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }
    public function get_applicants_list_by_district_daterange($district_id,  $to_date, $from_date)
    {
        $this->db->select('*', 'course_name','district_name','sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_sub_district, 'blri_sub_district.sub_district_id = blri_applicant.applicant_subdistrict_id');
        $this->db->join(App_user_model::$table_blri_course, 'blri_course.course_id = blri_applicant.applicant_course_id');
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_applicant.applicant_district_id');
        $this->db->where('applicant_district_id', $district_id);
        $this->db->where('application_date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function get_applicants_list_by_daterange($to_date, $from_date)
    {
        $this->db->select('*', App_user_model::$table_blri_course.'.course_name',App_user_model::$table_blri_district.'.district_name',App_user_model::$table_blri_sub_district.'.sub_district_name');
        $this->db->from(App_user_model::$table_blri_applicant);
        $this->db->join(App_user_model::$table_blri_sub_district, 'blri_sub_district.sub_district_id = blri_applicant.applicant_subdistrict_id');
        $this->db->join(App_user_model::$table_blri_course, 'blri_course.course_id = blri_applicant.applicant_course_id');
        $this->db->join(App_user_model::$table_blri_district, 'blri_district.district_id = blri_applicant.applicant_district_id');
        $this->db->where('application_date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return NULL;
        }
    }

    public function delete_course($course_id)
    {
        $this->db->where('course_id', $course_id);
        $is_deleted = $this->db->delete(App_user_model::$table_blri_course);
        return $is_deleted;
    }

    public function delete_instructor($instructor_id)
    {
        $this->db->where('instructor_id', $instructor_id);
        $is_deleted = $this->db->delete(App_user_model::$table_blri_instructor);
        return $is_deleted;
    }


}