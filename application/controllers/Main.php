<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
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

        $data['title'] = $this->lang->line('site_title');
        $data['site_address'] = $this->lang->line('site_address');
        $data['btn_form_download'] = $this->lang->line('btn_form_download');
        $data['btn_online_application'] = $this->lang->line('btn_online_application');

        $applicants_list = $this->main_ui_model->get_not_confirmed_applicants_list();

        if (isset($applicants_list) && $applicants_list->num_rows() > 0):
            foreach ($applicants_list->result() as $row):
                $applicant_image_name = $row->applicant_photo;
                $is_deleted = $this->main_ui_model->delete_not_confirmed_applicant($row->applicant_id);
                if($is_deleted){
                    $path = "./uploaded/applicants_photo/" . $applicant_image_name;
                    unlink($path);
                }
            endforeach;
        endif;


        $this->load->view('main/header', $data);
        $this->load->view('main/body', $data);
        $this->load->view('main/footer', $data);
    }
}