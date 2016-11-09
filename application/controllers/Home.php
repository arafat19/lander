<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');
    }

    function index($lang = '')
    {
        $this->lang->load('content', $lang == '' ? 'bn' : $lang);
        $this->lang->load('number', $lang == '' ? 'bn' : $lang);
        $this->lang->load('form_validation', $lang == '' ? 'bn' : $lang);

        $data['applicant_name'] = $this->lang->line('applicant_name');
        $data['applicant_father_name'] = $this->lang->line('applicant_father_name');
        $data['applicant_mother_name'] = $this->lang->line('applicant_mother_name');
        $data['applicant_village_name'] = $this->lang->line('applicant_village_name');
        $data['applicant_post_office_name'] = $this->lang->line('applicant_post_office_name');

        $data['title'] = $this->lang->line('site_title');
        $data['site_address'] = $this->lang->line('site_address');
        $data['form_top_title'] = $this->lang->line('form_top_title');
        $data['online_application'] = $this->lang->line('online_application');
        $data['one'] = $this->lang->line('one');
        $data['two'] = $this->lang->line('two');
        $data['three'] = $this->lang->line('three');
        $data['four'] = $this->lang->line('four');
        $data['step'] = $this->lang->line('step');
        $data['instructions'] = $this->lang->line('instructions');
        $data['application'] = $this->lang->line('application');
        $data['confirmation'] = $this->lang->line('confirmation');
        $data['submit'] = $this->lang->line('submit');
        $data['rules_for_submit_application_form'] = $this->lang->line('rules_for_submit_application_form');
        $data['rules_of_application_submission'] = $this->lang->line('rules_of_application_submission');
        $data['applicant_date_of_birth'] = $this->lang->line('applicant_date_of_birth');
        $data['application_for_training'] = $this->lang->line('application_for_training');
        $data['to'] = $this->lang->line('to');
        $data['department_head'] = $this->lang->line('department_head');
        $data['department_name'] = $this->lang->line('department_name');
        $data['department_address'] = $this->lang->line('department_address');
        $data['application_subject_cap'] = $this->lang->line('application_subject_cap');
        $data['application_subject_cap_cont'] = $this->lang->line('application_subject_cap_cont');
        $data['form_please_select'] = $this->lang->line('form_please_select');
        $data['sir'] = $this->lang->line('sir');
        $data['application_headline'] = $this->lang->line('application_headline');
        $data['national_id_no'] = $this->lang->line('national_id_no');
        $data['mobile_number'] = $this->lang->line('mobile_number');
        $data['district'] = $this->lang->line('district');
        $data['union'] = $this->lang->line('union');
        $data['village'] = $this->lang->line('village');
        $data['post_office'] = $this->lang->line('post_office');
        $data['application_footer'] = $this->lang->line('application_footer');
        $data['date'] = $this->lang->line('date');
        $data['name'] = $this->lang->line('name');
        $data['respectful'] = $this->lang->line('respectful');
        $data['yours'] = $this->lang->line('yours');
        $data['applicant_signature'] = $this->lang->line('applicant_signature');
        $data['form_validation_required'] = $this->lang->line('form_validation_required');
        $data['form_validation_is_date'] = $this->lang->line('form_validation_is_date');
        $data['form_validation_is_mobile_num'] = $this->lang->line('form_validation_is_mobile_num');
        $data['form_validation_required_village_po'] = $this->lang->line('form_validation_required_village_po');
        $data['form_validation_required_un_dis'] = $this->lang->line('form_validation_required_un_dis');
        $data['info_security'] = $this->lang->line('info_security');
        $data['form_validation_is_summation'] = $this->lang->line('form_validation_is_summation');
        $data['write_info_security'] = $this->lang->line('write_info_security');
        $data['cancel'] = $this->lang->line('cancel');
        $data['application_subject'] = $this->lang->line('application_subject');
        $data['attach_photo'] = $this->lang->line('attach_photo');
        $data['image_size_restrict_text'] = $this->lang->line('image_size_restrict_text');

        $all_courses = $this->app_user_model->get_all_courses(); // Reading and showing the courses list from DB
        $data['all_courses'] = $all_courses;

        $all_districts = $this->app_user_model->get_all_districts(); // Reading and showing the District list from DB
        $data['all_districts'] = $all_districts;

        $all_sub_districts = $this->app_user_model->get_all_sub_districts(); // Reading and showing the Sub District list from DB
        $data['all_sub_districts'] = $all_sub_districts;

        $digit1 = mt_rand(1, 20);
        $digit2 = mt_rand(1, 20);
        if (mt_rand(0, 1) === 1) {
            $math = "$digit1 + $digit2";
            $answer = $digit1 + $digit2;
        } else {
            $math = "$digit1 - $digit2";
            $answer = $digit1 - $digit2;
        }
        /*$newdata = array(
            'answer' => $answer
        );*/
        $data['math'] = $math;
        $data['answer'] = $answer;
        /*$this->session->set_userdata($newdata);*/

        $config['upload_path'] = './uploaded/applicants_photo';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 300;
        $config['max_width'] = 114;
        $config['max_height'] = 142;

//        $config['encrypt_name'] = TRUE;

        /*$new_name = $_FILES['userfile']['name'];
        $config['file_name'] = $new_name;*/

        $this->load->library('upload', $config);

        $this->load->library('Form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('applicant_name', 'The applicant name', 'trim|required');
        $this->form_validation->set_rules('applicant_father_name', 'Applicant father name', 'trim|required');
        $this->form_validation->set_rules('applicant_date_of_birth', 'Applicant date of birth', 'trim|required');
        $this->form_validation->set_rules('applicant_NID', 'Applicant NID', 'trim|required');
        $this->form_validation->set_rules('applicant_village', 'Applicant Village', 'trim|required');
        $this->form_validation->set_rules('applicant_post_office', 'Applicant Post Office', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $file_errors = '';
            $this->session->set_flashdata('file_errors', strip_tags($file_errors));
            $this->load->view('home/header', $data);
            $this->load->view('home/body', $data);
            $this->load->view('home/footer', $data);
            return false;
        }
        if (!$this->upload->do_upload()) {
            $file_errors = $this->upload->display_errors();
            $this->session->set_flashdata('file_errors', strip_tags($file_errors));
            $this->load->view('home/header', $data);
            $this->load->view('home/body', $data);
            $this->load->view('home/footer', $data);
            return false;
        } else {
            $db_data = array(
                'applicant_name' => $this->input->post('applicant_name'),
                'applicant_father_name' => $this->input->post('applicant_father_name'),
                'applicant_date_of_birth' => $this->input->post('applicant_date_of_birth'),
                'applicant_NID' => $this->input->post('applicant_NID'),
                'applicant_mobile' => $this->input->post('applicant_mobile'),
                'applicant_village' => $this->input->post('applicant_village'),
                'applicant_post_office' => $this->input->post('applicant_post_office'),
                'applicant_subdistrict_id' => $this->input->post('applicant_subdistrict_id'),
                'applicant_district_id' => $this->input->post('applicant_district_id'),
                'applicant_course_id' => $this->input->post('applicant_subject_id'),
                'applicant_photo' => $this->upload->data('file_name'),
                'application_date' => date("Y-m-d")
            );

            $this->lang->load('content', $lang == '' ? 'bn' : $lang);
            $form_submition_success = $this->lang->line('form_submition_success');
            $form_submition_failure = $this->lang->line('form_submition_failure');
            $math_answer_is_wrong = $this->lang->line('math_answer_is_wrong');

            $applicant_sum = $this->input->post('applicant_sum');
            $math_answer = $this->input->post('math_answer');
            if ($applicant_sum != $math_answer) {
                $this->session->set_flashdata('applicant_sum_wrong', $math_answer_is_wrong);
                $this->load->view('home/header', $data);
                $this->load->view('home/body', $data);
                $this->load->view('home/footer', $data);
                return false;
            } else {
                $is_created = $this->main_ui_model->add_application($db_data);
                if ($is_created) {
                    $applicant_name = $this->input->post('applicant_name');
                    $applicant_father_name = $this->input->post('applicant_father_name');
                    $applicant_mobile = $this->input->post('applicant_mobile');
                    $applicant_date_of_birth = $this->input->post('applicant_date_of_birth');

                    $single_applicant = $this->main_ui_model->get_applicant_by_phone_name_father_dob($applicant_mobile, $applicant_name, $applicant_father_name, $applicant_date_of_birth);
                    $applicant_id = base64_encode($single_applicant['applicant_id']);
                    redirect(base_url() . 'home/confirm/application/' . $applicant_id, 'refresh');
                    //$this->session->set_flashdata('applicant_create_success_message', $form_submition_success);
                } else {
                    $this->session->set_flashdata('applicant_create_failure_message', $form_submition_failure);
                }
            }
            redirect(base_url() . 'home', 'refresh');
        }
    }

    function edit_applicant_data($applicant_id)
    {
        $applicant_id_dec = base64_decode($applicant_id);
        $lang = '';
        $this->lang->load('content', $lang == '' ? 'bn' : $lang);
        $this->lang->load('number', $lang == '' ? 'bn' : $lang);
        $this->lang->load('form_validation', $lang == '' ? 'bn' : $lang);

        $data['applicant_name'] = $this->lang->line('applicant_name');
        $data['applicant_father_name'] = $this->lang->line('applicant_father_name');
        $data['applicant_mother_name'] = $this->lang->line('applicant_mother_name');
        $data['applicant_village_name'] = $this->lang->line('applicant_village_name');
        $data['applicant_post_office_name'] = $this->lang->line('applicant_post_office_name');

        $data['title'] = $this->lang->line('site_title');
        $data['site_address'] = $this->lang->line('site_address');
        $data['form_top_title'] = $this->lang->line('form_top_title');
        $data['online_application'] = $this->lang->line('online_application');
        $data['one'] = $this->lang->line('one');
        $data['two'] = $this->lang->line('two');
        $data['three'] = $this->lang->line('three');
        $data['four'] = $this->lang->line('four');
        $data['step'] = $this->lang->line('step');
        $data['instructions'] = $this->lang->line('instructions');
        $data['application'] = $this->lang->line('application');
        $data['confirmation'] = $this->lang->line('confirmation');
        $data['submit'] = $this->lang->line('submit');
        $data['rules_for_submit_application_form'] = $this->lang->line('rules_for_submit_application_form');
        $data['rules_of_application_submission'] = $this->lang->line('rules_of_application_submission');
        $data['applicant_date_of_birth'] = $this->lang->line('applicant_date_of_birth');
        $data['application_for_training'] = $this->lang->line('application_for_training');
        $data['to'] = $this->lang->line('to');
        $data['department_head'] = $this->lang->line('department_head');
        $data['department_name'] = $this->lang->line('department_name');
        $data['department_address'] = $this->lang->line('department_address');
        $data['application_subject_cap'] = $this->lang->line('application_subject_cap');
        $data['application_subject_cap_cont'] = $this->lang->line('application_subject_cap_cont');
        $data['form_please_select'] = $this->lang->line('form_please_select');
        $data['sir'] = $this->lang->line('sir');
        $data['application_headline'] = $this->lang->line('application_headline');
        $data['national_id_no'] = $this->lang->line('national_id_no');
        $data['mobile_number'] = $this->lang->line('mobile_number');
        $data['district'] = $this->lang->line('district');
        $data['union'] = $this->lang->line('union');
        $data['village'] = $this->lang->line('village');
        $data['post_office'] = $this->lang->line('post_office');
        $data['application_footer'] = $this->lang->line('application_footer');
        $data['date'] = $this->lang->line('date');
        $data['name'] = $this->lang->line('name');
        $data['respectful'] = $this->lang->line('respectful');
        $data['yours'] = $this->lang->line('yours');
        $data['applicant_signature'] = $this->lang->line('applicant_signature');
        $data['form_validation_required'] = $this->lang->line('form_validation_required');
        $data['form_validation_is_date'] = $this->lang->line('form_validation_is_date');
        $data['form_validation_is_mobile_num'] = $this->lang->line('form_validation_is_mobile_num');
        $data['form_validation_required_village_po'] = $this->lang->line('form_validation_required_village_po');
        $data['form_validation_required_un_dis'] = $this->lang->line('form_validation_required_un_dis');
        $data['info_security'] = $this->lang->line('info_security');
        $data['form_validation_is_summation'] = $this->lang->line('form_validation_is_summation');
        $data['write_info_security'] = $this->lang->line('write_info_security');
        $data['cancel'] = $this->lang->line('cancel');
        $data['application_subject'] = $this->lang->line('application_subject');
        $data['attach_photo'] = $this->lang->line('attach_photo');
        $data['image_size_restrict_text'] = $this->lang->line('image_size_restrict_text');

        $all_courses = $this->app_user_model->get_all_courses(); // Reading and showing the courses list from DB
        $data['all_courses'] = $all_courses;

        $all_districts = $this->app_user_model->get_all_districts(); // Reading and showing the District list from DB
        $data['all_districts'] = $all_districts;

        $all_sub_districts = $this->app_user_model->get_all_sub_districts(); // Reading and showing the Sub District list from DB
        $data['all_sub_districts'] = $all_sub_districts;

        $single_applicant = $this->main_ui_model->get_applicant_by_id($applicant_id_dec);
        $data['single_applicant'] = $single_applicant;

        $digit1 = mt_rand(1, 20);
        $digit2 = mt_rand(1, 20);
        if (mt_rand(0, 1) === 1) {
            $math = "$digit1 + $digit2";
            $answer = $digit1 + $digit2;
        } else {
            $math = "$digit1 - $digit2";
            $answer = $digit1 - $digit2;
        }
        /*$newdata = array(
            'answer' => $answer
        );*/
        $data['math'] = $math;
        $data['answer'] = $answer;
        /*$this->session->set_userdata($newdata);*/

        $config['upload_path'] = './uploaded/applicants_photo';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 300;
        $config['max_width'] = 114;
        $config['max_height'] = 142;

//        $config['encrypt_name'] = TRUE;
        /*$new_name = time().$_FILES['userfile']['name'];
        $config['file_name'] = $new_name;*/

        $this->load->library('upload', $config);


        $this->load->library('Form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('applicant_name', 'The applicant name', 'trim|required');
        $this->form_validation->set_rules('applicant_father_name', 'Applicant father name', 'trim|required');
        $this->form_validation->set_rules('applicant_date_of_birth', 'Applicant date of birth', 'trim|required');
        $this->form_validation->set_rules('applicant_NID', 'Applicant NID', 'trim|required');
        $this->form_validation->set_rules('applicant_village', 'Applicant Village', 'trim|required');
        $this->form_validation->set_rules('applicant_post_office', 'Applicant Post Office', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $file_errors = '';
            $this->session->set_flashdata('file_errors', strip_tags($file_errors));
            $this->load->view('home/header', $data);
            $this->load->view('home/edit_body', $data);
            $this->load->view('home/footer', $data);
            return false;
        }
        if ($single_applicant['applicant_photo'] == '') {
            if (!$this->upload->do_upload()) {
                $file_errors = $this->upload->display_errors();
                $this->session->set_flashdata('file_errors', strip_tags($file_errors));
                $this->load->view('home/header', $data);
                $this->load->view('home/edit_body', $data);
                $this->load->view('home/footer', $data);
                return false;
            }

        } else {
            $db_data = array(
                'applicant_name' => $this->input->post('applicant_name'),
                'applicant_father_name' => $this->input->post('applicant_father_name'),
                'applicant_date_of_birth' => $this->input->post('applicant_date_of_birth'),
                'applicant_NID' => $this->input->post('applicant_NID'),
                'applicant_mobile' => $this->input->post('applicant_mobile'),
                'applicant_village' => $this->input->post('applicant_village'),
                'applicant_post_office' => $this->input->post('applicant_post_office'),
                'applicant_subdistrict_id' => $this->input->post('applicant_subdistrict_id'),
                'applicant_district_id' => $this->input->post('applicant_district_id'),
                'applicant_course_id' => $this->input->post('applicant_subject_id'),
//                'applicant_photo' => $this->upload->data('file_name'),
                'applicant_photo' => ($single_applicant['applicant_photo'] != '') ? $single_applicant['applicant_photo'] : $this->upload->data('file_name') ,
                'application_date' => date("Y-m-d")
            );

            $this->lang->load('content', $lang == '' ? 'bn' : $lang);
            $form_submition_success = $this->lang->line('form_submition_success');
            $form_submition_failure = $this->lang->line('form_submition_failure');
            $math_answer_is_wrong = $this->lang->line('math_answer_is_wrong');

            $applicant_sum = $this->input->post('applicant_sum');
            $math_answer = $this->input->post('math_answer');
            if ($applicant_sum != $math_answer) {
                $this->session->set_flashdata('applicant_sum_wrong', $math_answer_is_wrong);
                $this->load->view('home/header', $data);
                $this->load->view('home/edit_body', $data);
                $this->load->view('home/footer', $data);
                return false;
            } else {
                $is_updated = $this->main_ui_model->update_applicant_info($db_data, $applicant_id_dec);
                if ($is_updated) {
                    $applicant_name = $this->input->post('applicant_name');
                    $applicant_father_name = $this->input->post('applicant_father_name');
                    $applicant_mobile = $this->input->post('applicant_mobile');
                    $applicant_date_of_birth = $this->input->post('applicant_date_of_birth');

                    /*$single_applicant = $this->main_ui_model->get_applicant_by_phone_name_father_dob($applicant_mobile, $applicant_name, $applicant_father_name, $applicant_date_of_birth);
                    $new_applicant_id = base64_encode($single_applicant['applicant_id']);*/
                    redirect(base_url() . 'home/confirm/application/' . $applicant_id, 'refresh');
                    //$this->session->set_flashdata('applicant_create_success_message', $form_submition_success);
                } else {
                    $this->session->set_flashdata('applicant_create_failure_message', $form_submition_failure);
                }
            }
            redirect(base_url() . 'home', 'refresh');
        }
    }

    public function confirm_applicant_submission($applicant_id)
    {
        $applicant_id_dec = base64_decode($applicant_id);
        $lang = '';
        $this->lang->load('content', $lang == '' ? 'bn' : $lang);
        $this->lang->load('number', $lang == '' ? 'bn' : $lang);
        $this->lang->load('form_validation', $lang == '' ? 'bn' : $lang);

        $data['applicant_name'] = $this->lang->line('applicant_name');
        $data['applicant_father_name'] = $this->lang->line('applicant_father_name');
        $data['applicant_mother_name'] = $this->lang->line('applicant_mother_name');
        $data['applicant_village_name'] = $this->lang->line('applicant_village_name');
        $data['applicant_post_office_name'] = $this->lang->line('applicant_post_office_name');

        $data['title'] = $this->lang->line('site_title');
        $data['site_address'] = $this->lang->line('site_address');
        $data['form_top_title'] = $this->lang->line('form_top_title');
        $data['online_application'] = $this->lang->line('online_application');
        $data['one'] = $this->lang->line('one');
        $data['two'] = $this->lang->line('two');
        $data['three'] = $this->lang->line('three');
        $data['four'] = $this->lang->line('four');
        $data['step'] = $this->lang->line('step');
        $data['instructions'] = $this->lang->line('instructions');
        $data['application'] = $this->lang->line('application');
        $data['confirmation'] = $this->lang->line('confirmation');
        $data['submit'] = $this->lang->line('submit');
        $data['rules_for_submit_application_form'] = $this->lang->line('rules_for_submit_application_form');
        $data['rules_of_application_submission'] = $this->lang->line('rules_of_application_submission');
        $data['applicant_date_of_birth'] = $this->lang->line('applicant_date_of_birth');
        $data['application_for_training'] = $this->lang->line('application_for_training');
        $data['to'] = $this->lang->line('to');
        $data['department_head'] = $this->lang->line('department_head');
        $data['department_name'] = $this->lang->line('department_name');
        $data['department_address'] = $this->lang->line('department_address');
        $data['application_subject_cap'] = $this->lang->line('application_subject_cap');
        $data['application_subject_cap_cont'] = $this->lang->line('application_subject_cap_cont');
        $data['form_please_select'] = $this->lang->line('form_please_select');
        $data['sir'] = $this->lang->line('sir');
        $data['application_headline'] = $this->lang->line('application_headline');
        $data['national_id_no'] = $this->lang->line('national_id_no');
        $data['mobile_number'] = $this->lang->line('mobile_number');
        $data['district'] = $this->lang->line('district');
        $data['union'] = $this->lang->line('union');
        $data['village'] = $this->lang->line('village');
        $data['post_office'] = $this->lang->line('post_office');
        $data['application_footer'] = $this->lang->line('application_footer');
        $data['date'] = $this->lang->line('date');
        $data['name'] = $this->lang->line('name');
        $data['respectful'] = $this->lang->line('respectful');
        $data['yours'] = $this->lang->line('yours');
        $data['applicant_signature'] = $this->lang->line('applicant_signature');
        $data['form_validation_required'] = $this->lang->line('form_validation_required');
        $data['form_validation_is_date'] = $this->lang->line('form_validation_is_date');
        $data['form_validation_is_mobile_num'] = $this->lang->line('form_validation_is_mobile_num');
        $data['form_validation_required_village_po'] = $this->lang->line('form_validation_required_village_po');
        $data['form_validation_required_un_dis'] = $this->lang->line('form_validation_required_un_dis');
        $data['info_security'] = $this->lang->line('info_security');
        $data['form_validation_is_summation'] = $this->lang->line('form_validation_is_summation');
        $data['write_info_security'] = $this->lang->line('write_info_security');
        $data['cancel'] = $this->lang->line('cancel');
        $data['application_subject'] = $this->lang->line('application_subject');
        $data['your_photo'] = $this->lang->line('your_photo');
        $data['edit'] = $this->lang->line('edit');
        $form_submition_success = $this->lang->line('form_submition_success');

        $single_applicant = $this->main_ui_model->get_applicant_by_id($applicant_id_dec);

        $data['single_applicant'] = $single_applicant;
        $db_data = array(
            'finally_submitted' => 1,
        );
        $this->session->set_flashdata('applicant_create_success_message', '');
        if (isset($_POST['confirm_submit'])) {
            $is_confirmed = $this->main_ui_model->add_application_confirmation($db_data, $applicant_id_dec);
            if ($is_confirmed) {
                $this->session->set_flashdata('applicant_create_success_message', $form_submition_success); ?>
                <meta http-equiv="refresh" content="4; url=<?php echo base_url(); ?>">
                <?php
            }
        }
        $this->load->view('home/header', $data);
        $this->load->view('home/confirm_body', $data);
        $this->load->view('home/confirm_footer', $data);
    }

    public function show_applicant_sub_district($lang = '')
    {
        $this->lang->load('content', $lang == '' ? 'bn' : $lang);
        $this->lang->load('number', $lang == '' ? 'bn' : $lang);
        $this->lang->load('form_validation', $lang == '' ? 'bn' : $lang);
        $districtId = $_POST['districtId'];
        echo "<option value=''>" . $this->lang->line('union') . ' ' . $this->lang->line('form_please_select') . "</option>";
        $all_sub_districts = $this->app_user_model->get_sub_district_by_district_id($districtId);
        if (isset($all_sub_districts) && $all_sub_districts->num_rows() > 0):
            foreach ($all_sub_districts->result() as $row): ?>
                <option
                    value="<?php echo $row->sub_district_id ?>"><?php echo $row->sub_district_name; ?></option>
                <?php
            endforeach;
        endif;
    }

    public function submit_application($lang = '')
    {
        $config['upload_path'] = './uploaded/applicants_photo';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = 300;

        $this->load->library('upload', $config);
        $this->load->library('Form_validation');
        // field name, error message, validation rules
        $this->form_validation->set_rules('applicant_name', 'The applicant name', 'trim|required');
        $this->form_validation->set_rules('applicant_father_name', 'Applicant father name', 'trim|required');
        $this->form_validation->set_rules('applicant_date_of_birth', 'Applicant date of birth', 'trim|required');
        $this->form_validation->set_rules('applicant_NID', 'Applicant NID', 'trim|required');
        $this->form_validation->set_rules('applicant_village', 'Applicant Village', 'trim|required');
        $this->form_validation->set_rules('applicant_post_office', 'Applicant Post Office', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $file_errors = '';
            $this->session->set_flashdata('file_errors', strip_tags($file_errors));
        }
        if (!$this->upload->do_upload()) {
            $file_errors = $this->upload->display_errors();
            $this->session->set_flashdata('file_errors', strip_tags($file_errors));
        } else {
            $data = array(
                'applicant_name' => $this->input->post('applicant_name'),
                'applicant_father_name' => $this->input->post('applicant_father_name'),
                'applicant_date_of_birth' => $this->input->post('applicant_date_of_birth'),
                'applicant_NID' => $this->input->post('applicant_NID'),
                'applicant_mobile' => $this->input->post('applicant_mobile'),
                'applicant_village' => $this->input->post('applicant_village'),
                'applicant_post_office' => $this->input->post('applicant_post_office'),
                'applicant_subdistrict_id' => $this->input->post('applicant_subdistrict_id'),
                'applicant_district_id' => $this->input->post('applicant_district_id'),
                'applicant_course_id' => $this->input->post('applicant_subject_id'),
                'applicant_photo' => $this->upload->data('file_name'),
            );

            $this->lang->load('content', $lang == '' ? 'bn' : $lang);
            $form_submition_success = $this->lang->line('form_submition_success');
            $form_submition_failure = $this->lang->line('form_submition_failure');
            $math_answer_is_wrong = $this->lang->line('math_answer_is_wrong');

            $applicant_sum = $this->input->post('applicant_sum');
            if ($applicant_sum != '' && $applicant_sum != $this->session->userdata('answer')) {
                $this->session->set_flashdata('applicant_sum_wrong', $math_answer_is_wrong);
            } else {
                $is_created = $this->main_ui_model->add_application($data);
                if ($is_created) {
                    $this->session->set_flashdata('applicant_create_success_message', $form_submition_success);
                } else {
                    $this->session->set_flashdata('applicant_create_failure_message', $form_submition_failure);
                }
            }
        }
        redirect(base_url(), 'refresh');

    }

    public function remove_session_data()
    {
        $session_data = array(
            'applicant_name' => '',
            'applicant_father_name' => '',
            'applicant_date_of_birth' => '',
            'applicant_NID' => '',
            'applicant_mobile' => '',
            'applicant_village' => '',
            'applicant_post_office' => '',
            'applicant_subdistrict_id' => '',
            'applicant_district_id' => '',
            'answer' => ''
        );
        $this->session->unset_userdata($session_data);
        $this->session->sess_destroy();
    }

}

