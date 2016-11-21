<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('geoplugin.class.php');

class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('app_user_model');
        $this->load->model('main_ui_model');
    }

    function index()
    {


        $geoplugin = new geoPlugin();
        //locate the IP
        $geoplugin->locate();

        $country_code = $geoplugin->countryCode;
        if($country_code == null) $country_code = 'BD';
        $is_active = 1;
        $is_live = 1;
        $country_ID = $this->main_ui_model->get_country_id_by_country_code_is_active($country_code, $is_active);
        //multiple rows
        $single_country_image_slider = $this->main_ui_model->get_active_images_of_image_slider_by_country($country_ID['lander_country_id'], $is_active);

        $theme_ID = $this->main_ui_model->get_theme_id_by_country_is_live($country_ID['lander_country_id'], $is_live);


        $lander_theme_css = $this->main_ui_model->get_theme_css_by_theme_id_is_active($theme_ID['lander_theme_country_them_id'], $is_active);

        $data['single_country_image_slider'] = $single_country_image_slider;
        $data['lander_theme_css'] = $lander_theme_css['lander_theme_css'];
        $data['theme_name'] = $lander_theme_css['lander_theme_name'];

        $this->load->view('main/header_view', $data);
        $this->load->view('main/body_view', $data);
        $this->load->view('main/footer_view', $data);
    }
}