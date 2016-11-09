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

    public static $title = 'Admin LogIn - BLRI Training Application Management';
    public static $wrong_title = 'Wrong Email or Password - BLRI Training Application Management';
    public static $wrong_login_message = 'Wrong Email or Password';
    public static $login_title = 'Sign in to continue to BLRI Training Application Management';
    public static $footer_title = 'বাংলাদেশ প্রাণিসম্পদ গবেষণা ইনস্টিটিউট';

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
    }

    function index()
    {
        if (($this->session->userdata('blri_admin_username') != "")) {
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
                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));

                $result = $this->app_user_model->login($email, $password);
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
        $data['title'] = 'Welcome BLRI Admin Panel';
        $data['navbar_title'] = 'BLRI Admin Panel';
        $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
        $data['active'] = 'dashboard';
        $data['footer_title'] = Admin::$footer_title;
        $this->load->view('admin/admin_dashboard_header_view', $data);
        $this->load->view('admin/admin_dashboard_view', $data);
        $this->load->view('admin/admin_dashboard_footer_view', $data);
    }

    public function registration()
    {
        $this->load->library('Form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('email', 'This Email', 'trim|required|valid_email|callback_unique_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');
        $this->form_validation->set_rules('nid', 'Your NID', 'trim');
        $this->form_validation->set_rules('cell_number', 'Your Mobile Number', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin Registration- BLRI Training Application Management';
            $this->load->view('admin/header_view', $data);
            $this->load->view('admin/app_user_registration_view', $data);
            $this->load->view('admin/footer_view', $data);
        } else {
            $this->app_user_model->add_user();
            $this->session->set_flashdata('admin_regis_comp_message', "Your registration is successfully completed.");
            redirect(base_url() . 'admin/register', 'refresh');

        }
    }

    public function admin_create_district()
    {
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('district_name', 'This district', 'trim|required|min_length[2]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Create District - BLRI Training Application Management';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Create District';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['data_list_title'] = 'All Districts List';
                $data['footer_title'] = Admin::$footer_title;

                $all_districts = $this->app_user_model->get_all_districts(); // Reading and showing the District list from DB
                $data['all_districts'] = $all_districts;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_district_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_created = $this->app_user_model->create_district();
                if ($is_created) {
                    $this->session->set_flashdata('admin_create_district_message', "District is created successfully.");
                } else {
                    $this->session->set_flashdata('admin_create_district_error_message', "District is not created successfully. Please try again.");
                }
                redirect(base_url() . 'admin/district/create', 'refresh');
            }
        }
    }

    public function admin_create_sub_district()
    {
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('district_id', 'This district', 'trim|required');
            $this->form_validation->set_rules('sub_district_name', 'This sub-district', 'trim|required|min_length[2]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Create Sub-district - BLRI Training Application Management';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Create Sub-district';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['data_list_title'] = 'All Sub-districts List';
                $data['footer_title'] = Admin::$footer_title;

                $all_districts = $this->app_user_model->get_all_districts(); // Reading and showing the District list from DB
                $data['all_districts'] = $all_districts;

                $all_sub_districts = $this->app_user_model->get_all_sub_districts_with_district(); // Reading and showing the Sub District list from DB
                $data['all_sub_districts'] = $all_sub_districts;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_sub_district_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_created = $this->app_user_model->create_sub_district();
                if ($is_created) {
                    $this->session->set_flashdata('admin_create_sub_district_message', "Sub district is created successfully.");
                } else {
                    $this->session->set_flashdata('admin_create_sub_district_error_message', "Sub district is not created successfully. Please try again.");
                }
                redirect(base_url() . 'admin/sub/district/create', 'refresh');
            }
        }
    }


    public function admin_create_course()
    {
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('course_name', 'This course name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('course_description', 'Course description', 'trim');
            $this->form_validation->set_rules('course_start_date', 'Course start date', 'trim|required');
            $this->form_validation->set_rules('course_end_date', 'Course end date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'BLRI Course List - BLRI Training Application Management System';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Create Course';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['data_list_title'] = 'All Courses List';
                $data['footer_title'] = Admin::$footer_title;

                $all_courses = $this->app_user_model->get_all_courses(); // Reading and showing the courses list from DB
                $data['all_courses'] = $all_courses;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_course_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $start_date = date_create($this->input->post('course_start_date'));
                $end_date = date_create($this->input->post('course_end_date'));
                if ($end_date < $start_date) {
                    $this->session->set_flashdata('course_date_selection_error', "End Date never be smaller than the Start Date.");
                } else {
                    $data = array(
                        'course_name' => $this->input->post('course_name'),
                        'course_description' => $this->input->post('course_description'),
                        'course_start_date' => $this->input->post('course_start_date'),
                        'course_end_date' => $this->input->post('course_end_date')
                    );
                    $is_created = $this->app_user_model->create_course($data);
                    if ($is_created) {
                        $this->session->set_flashdata('admin_create_course_message', "Course is created successfully.");
                    } else {
                        $this->session->set_flashdata('admin_create_course_error_message', "Course is not created successfully. Please try again.");
                    }
                }
                redirect(base_url() . 'admin/course/create', 'refresh');
            }
        }
    }

    public function admin_create_instructor()
    {
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {
            $config['upload_path'] = './uploaded/instructors_photo';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['overwrite'] = TRUE;
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('instructor_name', 'The instructor name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('instructor_designation', 'Instructor designation', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('instructor_email', 'Instructor email', 'trim|required|valid_email|callback_unique_inst_email');
            $this->form_validation->set_rules('instructor_phone_number', 'Instructor phone number', 'trim|required|max_length[12]|callback_unique_inst_phone');
            $this->form_validation->set_rules('instructor_organization', 'Instructor Organization', 'trim|required|min_length[4]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Create Instructor - BLRI Training Application Management System';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Create Instructor';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['data_list_title'] = 'All Instructors List';
                $data['footer_title'] = Admin::$footer_title;

                $file_errors = '';
                $this->session->set_flashdata('file_errors', strip_tags($file_errors));

                $all_instructors = $this->app_user_model->get_all_instructors(); // Reading and showing the instructor list from DB
                $data['all_instructors'] = $all_instructors;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_instructor_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
                return false;
            }
            if (!$this->upload->do_upload()) {
                $data['title'] = 'Create Instructor - BLRI Training Application Management System';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Create Instructor';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['data_list_title'] = 'All Instructors List';
                $data['footer_title'] = Admin::$footer_title;

                $file_errors = $this->upload->display_errors();
                $this->session->set_flashdata('file_errors', strip_tags($file_errors));

                $all_instructors = $this->app_user_model->get_all_instructors(); // Reading and showing the instructor list from DB
                $data['all_instructors'] = $all_instructors;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_create_instructor_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);

            } else {
                $data = array(
                    'instructor_name' => $this->input->post('instructor_name'),
                    'instructor_designation' => $this->input->post('instructor_designation'),
                    'instructor_email' => $this->input->post('instructor_email'),
                    'instructor_phone_number' => $this->input->post('instructor_phone_number'),
                    'instructor_organization' => $this->input->post('instructor_organization'),
                    'instructor_photo' => $this->upload->data('file_name'),
                );
                $is_created = $this->app_user_model->create_instructor($data);
                if ($is_created) {
                    $this->session->set_flashdata('admin_create_instructor_message', "Instructor is created successfully.");
                } else {
                    $this->session->set_flashdata('admin_create_instructor_error_message', "Instructor is not created successfully. Please try again.");
                }
                redirect(base_url() . 'admin/instructor/create', 'refresh');
            }
        }
    }

    public function update_instructor_photo($instructor_id)
    {
        $instructor_id_dec = base64_decode($instructor_id);
        $config['upload_path'] = './uploaded/instructors_photo';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 2000;

        $this->load->library('upload', $config);

        $single_instructor = $this->app_user_model->get_single_instructor_by_id($instructor_id_dec);
        $data['single_instructor'] = $single_instructor;


        $file_errors = '';
        $this->session->set_flashdata('file_errors', strip_tags($file_errors));

        if (!$this->upload->do_upload()) {
            $data['title'] = 'Update Instructor Photo - BLRI Training Application Management System';
            $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
            $data['page_title'] = 'Update Instructor Photo';
            $data['navbar_title'] = 'BLRI Admin Panel';
            $data['footer_title'] = Admin::$footer_title;

            $file_errors = $this->upload->display_errors();
            $this->session->set_flashdata('file_errors', strip_tags($file_errors));

            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_update_instructor_photo_view', $data);
            $this->load->view('admin/admin_dashboard_footer_view', $data);
            return false;
        } else {
            $file = array(
                'instructor_photo' => $this->upload->data('file_name')
            );
            $this->app_user_model->update_single_image($instructor_id_dec, $file);
            $this->session->set_flashdata('upload_ins_photo_success', 'Selected Instructor photo is successfully updated');
            redirect(base_url() . 'admin/instructor/create');
        }

    }

    public function admin_update_instructor($instructor_id)
    {
        $instructor_id_dec = base64_decode($instructor_id);
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {
            $single_instructor = $this->app_user_model->get_single_instructor_by_id($instructor_id_dec);
            $data['single_instructor'] = $single_instructor;

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('instructor_name', 'The instructor name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('instructor_designation', 'Instructor designation', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('instructor_phone_number', 'Instructor phone number', 'trim|required|max_length[12]');
            $this->form_validation->set_rules('instructor_organization', 'Instructor Organization', 'trim|required|min_length[4]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Instructor - BLRI Training Application Management System';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Update Instructor';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['data_list_title'] = 'All Instructors List';
                $data['footer_title'] = Admin::$footer_title;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_instructor_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
                return false;
            } else {
                $data = array(
                    'instructor_name' => $this->input->post('instructor_name'),
                    'instructor_designation' => $this->input->post('instructor_designation'),
                    'instructor_phone_number' => $this->input->post('instructor_phone_number'),
                    'instructor_organization' => $this->input->post('instructor_organization')
                );
                $is_updated = $this->app_user_model->update_instructor($data, $instructor_id_dec);
                if ($is_updated) {
                    $this->session->set_flashdata('admin_update_instructor_message', "Instructor is updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_update_instructor_error_message', "Instructor is not update successfully. Please try again.");
                }
                redirect(base_url() . 'admin/instructor/create/', 'refresh');
            }
        }
    }

    public function admin_assign_course_instructor($instructor_id)
    {
        $instructor_id_dec = base64_decode($instructor_id);
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {
            $data['title'] = 'Assign Course to Instructor - BLRI Training Application Management System';
            $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
            $data['page_title'] = 'Instructor Information';
            $data['navbar_title'] = 'BLRI Admin Panel';
            $data['data_list_title'] = 'Assign Course to Instructor';
            $data['footer_title'] = Admin::$footer_title;
            $data['is_assigned'] = 0;

            $single_instructor = $this->app_user_model->get_single_instructor_by_id($instructor_id_dec);
            $data['single_instructor'] = $single_instructor;

            $assign_data = array(
                'is_assigned' => FALSE
            );
            $this->session->set_userdata($assign_data);

            $all_courses = $this->app_user_model->get_all_courses(); // Reading and showing the courses list from DB
            $data['all_courses'] = $all_courses;


            $this->load->view('admin/admin_dashboard_header_view', $data);
            $this->load->view('admin/admin_assign_course_instructor_view', $data);
            $this->load->view('admin/admin_dashboard_footer_view', $data);

        }
    }

    public function admin_course_assign($course_id, $instructor_id)
    {
        $course_id_dec = base64_decode($course_id);
        $instructor_id_dec = base64_decode($instructor_id);
        $is_assigned = $this->app_user_model->assign_course($course_id_dec, $instructor_id_dec);
        if ($is_assigned) {
            $this->session->set_flashdata('admin_assign_course_message', "Your Selected Course is Assigned successfully.");
        } else {
            $this->session->set_flashdata('admin_assign_course_error_message', "Your Selected Course is not assigned successfully. Please try again.");
        }
        redirect(base_url() . 'admin/assign/course/to/instructor/' . $instructor_id);
    }

    public function admin_course_remove($course_id, $instructor_id)
    {
        $course_id_dec = base64_decode($course_id);
        $instructor_id_dec = base64_decode($instructor_id);
        $is_removed = $this->app_user_model->remove_course($course_id_dec, $instructor_id_dec);
        if ($is_removed) {
            $this->session->set_flashdata('admin_remove_course_message', "Your Selected Course is removed successfully.");
        } else {
            $this->session->set_flashdata('admin_remove_course_error_message', "Your Selected Course is not removed successfully. Please try again.");
        }
        redirect(base_url() . 'admin/assign/course/to/instructor/' . $instructor_id);
    }

    public function admin_update_course($course_id)
    {
        $course_id_dec = base64_decode($course_id);
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {
            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('course_name', 'This course name', 'trim|required|min_length[2]');
            $this->form_validation->set_rules('course_description', 'Course description', 'trim');
            $this->form_validation->set_rules('course_start_date', 'Course start date', 'trim|required');
            $this->form_validation->set_rules('course_end_date', 'Course end date', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Course - BLRI Training Application Management';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Update Course';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['footer_title'] = Admin::$footer_title;

                $single_course = $this->app_user_model->get_single_course_by_id($course_id_dec);
                $data['single_course'] = $single_course;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_course_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $start_date = date_create($this->input->post('course_start_date'));
                $end_date = date_create($this->input->post('course_end_date'));
                if ($end_date < $start_date) {
                    $this->session->set_flashdata('course_date_selection_error', "End Date never be smaller than the Start Date.");
                } else {
                    $data = array(
                        'course_name' => $this->input->post('course_name'),
                        'course_description' => $this->input->post('course_description'),
                        'course_start_date' => $this->input->post('course_start_date'),
                        'course_end_date' => $this->input->post('course_end_date')
                    );
                    $is_updated = $this->app_user_model->update_course($data, $course_id_dec);
                    if ($is_updated) {
                        $this->session->set_flashdata('admin_update_course_message', "Selected Course is Updated successfully.");
                    } else {
                        $this->session->set_flashdata('admin_update_course_error_message', "Selected Course is not Updated successfully. Please try again.");
                    }
                }
                redirect(base_url() . 'admin/course/create', 'refresh');
            }
        }
    }

    public function admin_delete_course($course_id)
    {
        $course_id_dec = base64_decode($course_id);
        /*$single_course = $this->app_user_model->get_single_course_by_id($course_id_dec);
        $is_active = $single_partner["is_active"];
        if ($is_active) {
            $this->session->set_flashdata('cant_delete_message', 'Active Partner can not be deleted');
        } else {
            $this->app_user_model->delete_partner($partner_id_dec);
            $this->session->set_flashdata('partner_delete_message', 'Selected Partner is successfully deleted');
        }*/

        $is_deleted = $this->app_user_model->delete_course($course_id_dec);
        if ($is_deleted) {
            $this->session->set_flashdata('admin_delete_course_message', "Your Selected Course is Deleted successfully.");
        } else {
            $this->session->set_flashdata('admin_delete_course_error_message', "Your Selected Course is not Deleted successfully. Please try again.");
        }
        redirect(base_url() . 'admin/course/create');
    }


    public function admin_delete_instructor($instructor_id)
    {
        $instructor_id_dec = base64_decode($instructor_id);

        $single_instructor = $this->app_user_model->get_single_instructor_by_id($instructor_id_dec);


        $course_count = $single_instructor['course_count'];
        if ($course_count > 0) {
            $this->session->set_flashdata('admin_delete_instructor_error_message', "Your Selected Instructor can't be deleted due to assigned course(s).");
        } else {
            $is_deleted = $this->app_user_model->delete_instructor($instructor_id_dec);
            if ($is_deleted) {
                $instructor_image_name = $single_instructor['instructor_photo'];
                $path = "./uploaded/instructors_photo/" . $instructor_image_name;
                unlink($path);
                $this->session->set_flashdata('admin_delete_instructor_message', "Your Selected Instructor is Deleted successfully.");
            } else {
                $this->session->set_flashdata('admin_delete_instructor_error_message', "Your Selected Instructor is not Deleted successfully. Please try again.");
            }

        }
        redirect(base_url() . 'admin/instructor/create');
    }


    public function admin_update_sub_district($sub_district_id)
    {
        $sub_district_id_dec = base64_decode($sub_district_id);
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('update_sub_district_name', 'This sub district', 'trim|required|min_length[2]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update Sub District - BLRI Training Application Management';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Update Sub District';
                $data['navbar_title'] = 'BLRI Admin Panel';

                $all_districts = $this->app_user_model->get_all_districts(); // Reading and showing the District list from DB
                $data['all_districts'] = $all_districts;

                $single_sub_district = $this->app_user_model->get_single_sub_district_by_id($sub_district_id_dec);

                $data['single_sub_district'] = $single_sub_district;
                $data['footer_title'] = Admin::$footer_title;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_sub_district_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_updated = $this->app_user_model->update_sub_district($sub_district_id_dec);
                if ($is_updated) {
                    $this->session->set_flashdata('admin_update_sub_district_message', "Your Selected Sub District is updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_update_sub_district_error_message', "Your Selected Sub District is not updated successfully. Please try again.");
                }
                redirect(base_url() . 'admin/sub/district/create', 'refresh');
            }
        }
    }

    public function admin_update_district($district_id)
    {
        $district_id_dec = base64_decode($district_id);
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('update_district_name', 'This district', 'trim|required|min_length[2]');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update District - BLRI Training Application Management';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Update District';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $single_district = $this->app_user_model->get_single_district_by_id($district_id_dec);
                $data['single_district'] = $single_district;
                $data['footer_title'] = Admin::$footer_title;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_update_district_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $is_updated = $this->app_user_model->update_district($district_id_dec);
                if ($is_updated) {
                    $this->session->set_flashdata('admin_update_district_message', "Your Selected District is updated successfully.");
                } else {
                    $this->session->set_flashdata('admin_update_district_error_message', "Your Selected District is not updated successfully. Please try again.");
                }
                redirect(base_url() . 'admin/district/create', 'refresh');
            }
        }
    }

    public function admin_show_applicants()
    {
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {
            $this->load->library('Form_validation');

            $all_courses = $this->app_user_model->get_all_courses(); // Reading and showing the courses list from DB
            $data['all_courses'] = $all_courses;

            $all_districts = $this->app_user_model->get_all_districts(); // Reading and showing the District list from DB
            $data['all_districts'] = $all_districts;

            /*$all_sub_districts = $this->app_user_model->get_all_sub_districts(); // Reading and showing the Sub District list from DB
            $data['all_sub_districts'] = $all_sub_districts;*/
            $data['all_sub_districts'] = null;
            $all_sub_districts = null;
            // field name, error message, validation rules
            $this->form_validation->set_rules('course_id', 'Selected Course', 'trim');
            $this->form_validation->set_rules('district_id', 'Selected District', 'trim');
            $this->form_validation->set_rules('sub_district_id', 'Selected Sub District', 'trim');
            $this->form_validation->set_rules('from_date', 'Selected From Date', 'trim');
            $this->form_validation->set_rules('to_date', 'Selected To Date', 'trim');
            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'List of Applicants - BLRI Training Application Management';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Search Applicants';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['footer_title'] = Admin::$footer_title;
                $data['data_list_title'] = 'Applicants List';
                $data['course_id_selected'] = 0;
                $data['district_id_selected'] = 0;
                $data['sub_district_id_selected'] = 0;
                $data['from_date'] = '';
                $data['to_date'] = '';

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_applicants_list_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
                return false;
            } else {
                $course_id = $this->input->post('course_id');
                $district_id = $this->input->post('district_id');
                $sub_district_id = $this->input->post('sub_district_id');
                $from_date = $this->input->post('from_date');
                $to_date = $this->input->post('to_date');
                $this->session->set_flashdata('please_select_one', "");
                $this->session->set_flashdata('fare_date_selection', "");
                $data['course_id_selected'] = 0;
                $data['district_id_selected'] = 0;
                $data['sub_district_id_selected'] = 0;
                $data['from_date'] = '';
                $data['to_date'] = '';
                if (date_create($to_date) < date_create($from_date)) {
                    $this->session->set_flashdata('fare_date_selection', "To date never be smaller than From date");
                }
                if ($course_id > 0 && $district_id == 0 && $sub_district_id == 0  && $to_date == '' && $from_date == '') {
                    $data['course_id_selected'] = $course_id;
                    $data['district_id_selected'] = 0;
                    $data['sub_district_id_selected'] = 0;
                    $data['from_date'] = '';
                    $data['to_date'] = '';
                    $applicants = $this->app_user_model->get_applicants_list($course_id);
                } elseif ($district_id > 0 && $course_id == 0 && $sub_district_id == 0 && $to_date == '' && $from_date == '') {
                    $data['course_id_selected'] = 0;
                    $data['district_id_selected'] = $district_id;
                    $data['sub_district_id_selected'] = 0;
                    $data['from_date'] = '';
                    $data['to_date'] = '';
                    $all_sub_districts = $this->app_user_model->get_sub_district_by_district_id($district_id);
                    $applicants = $this->app_user_model->get_applicants_list_by_district($district_id);
                } elseif ($sub_district_id > 0 && $course_id == 0 && $district_id == 0) {
                    $data['course_id_selected'] = 0;
                    $data['district_id_selected'] = 0;
                    $data['sub_district_id_selected'] = $sub_district_id;
                    //$single_sub_district = $this->app_user_model->get_single_sub_district_by_id($sub_district_id);
                    $applicants = $this->app_user_model->get_applicants_list_by_sub_district($sub_district_id);
                } elseif ($sub_district_id > 0 && $course_id > 0 && $district_id == 0) {
                    $data['course_id_selected'] = $course_id;
                    $data['district_id_selected'] = 0;
                    $data['sub_district_id_selected'] = $sub_district_id;
                    $applicants = $this->app_user_model->get_applicants_list_by_course_sub_district($course_id, $sub_district_id);
                } elseif ($district_id > 0 && $sub_district_id > 0 && $course_id == 0 && $to_date == '' && $from_date == '') {
                    $data['course_id_selected'] = 0;
                    $data['district_id_selected'] = $district_id;
                    $data['sub_district_id_selected'] = $sub_district_id;
                    $data['from_date'] = '';
                    $data['to_date'] = '';
                    $all_sub_districts = $this->app_user_model->get_sub_district_by_district_id($district_id);
                    $applicants = $this->app_user_model->get_applicants_list_by_district_sub_district($district_id, $sub_district_id);
                } elseif ($course_id > 0 && $district_id > 0 && $sub_district_id == 0  && $to_date == '' && $from_date == '') {
                    $data['course_id_selected'] = $course_id;
                    $data['district_id_selected'] = $district_id;
                    $data['sub_district_id_selected'] = 0;
                    $data['from_date'] = '';
                    $data['to_date'] = '';
                    $applicants = $this->app_user_model->get_applicants_list_by_course_district($course_id, $district_id);
                    $all_sub_districts = $this->app_user_model->get_sub_district_by_district_id($district_id);
                } elseif ($course_id > 0 && $district_id > 0 && $sub_district_id > 0 && $to_date == '' && $from_date == '') {
                    $data['course_id_selected'] = $course_id;
                    $data['district_id_selected'] = $district_id;
                    $data['sub_district_id_selected'] = $sub_district_id;
                    $data['from_date'] = '';
                    $data['to_date'] = '';
                    $all_sub_districts = $this->app_user_model->get_sub_district_by_district_id($district_id);
                    $applicants = $this->app_user_model->get_applicants_list_by_course_district_sub($course_id, $district_id, $sub_district_id);

                } elseif ($course_id > 0 && $district_id > 0 && $to_date != '' && $from_date != '') {
                    $data['course_id_selected'] = $course_id;
                    $data['district_id_selected'] = $district_id;
                    $data['sub_district_id_selected'] = $sub_district_id;
                    $data['from_date'] = $from_date;
                    $data['to_date'] = $to_date;
                    $all_sub_districts = $this->app_user_model->get_sub_district_by_district_id($district_id);
                    $applicants = $this->app_user_model->get_applicants_list_by_course_district_daterange($course_id, $district_id, $to_date, $from_date);

                } elseif ($course_id > 0 && $district_id == 0 && $to_date != '' && $from_date != '') {
                    $data['course_id_selected'] = $course_id;
                    $data['district_id_selected'] = 0;
                    $data['from_date'] = $from_date;
                    $data['to_date'] = $to_date;
                    $applicants = $this->app_user_model->get_applicants_list_by_course_daterange($course_id, $to_date, $from_date);
                } elseif ($course_id == 0 && $district_id > 0 && $to_date != '' && $from_date != '') {
                    $data['course_id_selected'] = 0;
                    $data['district_id_selected'] = $district_id;
                    $data['from_date'] = $from_date;
                    $data['to_date'] = $to_date;
                    $applicants = $this->app_user_model->get_applicants_list_by_district_daterange($district_id, $to_date, $from_date);

                } elseif ($course_id == 0 && $district_id == 0 && $sub_district_id == 0 && $to_date == '' && $from_date == '') {
                    $this->session->set_flashdata('please_select_one', "Please Select At least one parameter");
                    $data['course_id_selected'] = 0;
                    $data['district_id_selected'] = 0;
                    $data['sub_district_id_selected'] = 0;
                    $data['from_date'] = '';
                    $data['to_date'] = '';
                    $applicants = null;
                }elseif ($course_id == 0 && $district_id == 0 && $sub_district_id == 0 && $to_date != '' && $from_date != '') {
                    $data['course_id_selected'] = 0;
                    $data['district_id_selected'] = 0;
                    $data['from_date'] = $from_date;
                    $data['to_date'] = $to_date;
                    $applicants = $this->app_user_model->get_applicants_list_by_daterange($to_date, $from_date);
                } elseif ($course_id == 0 && $district_id == 0 && $sub_district_id == 0 && (date_create($to_date) < date_create($from_date))) {
                    $this->session->set_flashdata('fare_date_selection', "From date never be bigger than To date");
                    $data['course_id_selected'] = 0;
                    $data['district_id_selected'] = 0;
                    $data['sub_district_id_selected'] = 0;
                    $data['from_date'] = '';
                    $data['to_date'] = '';
                    $applicants = null;
                }
                $data['applicants_list'] = $applicants;
                $data['all_sub_districts'] = $all_sub_districts;
                $data['title'] = 'List of Applicants - BLRI Training Application Management';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['page_title'] = 'Search Applicants';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['footer_title'] = Admin::$footer_title;
                $data['data_list_title'] = 'Applicants List';

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_applicants_list_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            }
        }
    }

    public function show_sub_district()
    {
        $districtId = $_POST['districtId'];
        echo "<option value=''>Please Select a Sub District</option>";
        $all_sub_districts = $this->app_user_model->get_sub_district_by_district_id($districtId);
        if (isset($all_sub_districts) && $all_sub_districts->num_rows() > 0):
            foreach ($all_sub_districts->result() as $row): ?>
                <option
                    value="<?php echo $row->sub_district_id ?>"><?php echo $row->sub_district_name; ?></option>
                <?php
            endforeach;
        endif;
    }

    public function update_admin_user()
    {
        $blri_admin_id = $this->session->userdata('blri_admin_id');
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('nid', 'Your NID', 'trim');
            $this->form_validation->set_rules('cell_number', 'Your Mobile Number', 'trim');

            $particular_user = $this->app_user_model->get_user_by_id($blri_admin_id);

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update BLRI Admin Profile';
                $data['page_title'] = 'Update Your Profile';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');
                $data['particular_user'] = $particular_user;
                $data['footer_title'] = Admin::$footer_title;

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_profile_update_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $this->app_user_model->update_admin_info($blri_admin_id);
                $this->session->set_flashdata('admin_info_update_message', "Your information is updated successfully.");
                redirect(base_url() . 'admin/profile/update', 'refresh');
            }
        }
    }

    public function update_admin_password()
    {
        $blri_admin_id = $this->session->userdata('blri_admin_id');
        $blri_admin_username = $this->session->userdata('blri_admin_username');
        if (($this->session->userdata('blri_admin_username') == "")) {
            $this->logout();
        } else {

            $this->load->library('Form_validation');
            // field name, error message, validation rules
            $this->form_validation->set_rules('email', 'Sorry! Your Email address', 'trim|required|valid_email|callback_exist_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['title'] = 'Update BLRI Admin Password';
                $data['footer_title'] = Admin::$footer_title;
                $data['page_title'] = 'Update Your Password';
                $data['navbar_title'] = 'BLRI Admin Panel';
                $data['blri_admin_name'] = $this->session->userdata('blri_admin_name');

                $this->load->view('admin/admin_dashboard_header_view', $data);
                $this->load->view('admin/admin_password_update_view', $data);
                $this->load->view('admin/admin_dashboard_footer_view', $data);
            } else {
                $this->app_user_model->admin_password_update($blri_admin_id, $blri_admin_username);
                $this->session->set_flashdata('admin_password_update_message', "Your Password is updated successfully.");
                redirect(base_url() . 'admin/password/update', 'refresh');
            }
        }
    }


    function not_found_email($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->check_user_email($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('not_found_email', "%s {$str} not found!");
            return FALSE;
        }
    }

    function unique_email($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_user_email($str)) {
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

    function unique_inst_email($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_instructor_email($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_inst_email', "%s {$str} already exist");
            return FALSE;
        }
    }

    function unique_inst_phone($str)
    {
        $this->load->model('app_user_model');
        if (!$this->app_user_model->exist_instructor_phone($str)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('unique_inst_phone', "%s {$str} already exist");
            return FALSE;
        }
    }

    public function logout()
    {
        $newdata = array(
            'blri_admin_id' => '',
            'blri_admin_username' => '',
            'blri_admin_name' => '',
            'logged_in' => FALSE,
        );
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        redirect('/admin', 'refresh');
    }
}