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
        $current_user_url =  current_url();

        $current_user_id = $this->app_user_model->get_user_by_live_preview_url($current_user_url);
        $admin_user_id = $current_user_id['admin_id'];
        $admin_user_id_enabled = $current_user_id['enabled'];
        //var_dump($current_user_id);
        $data['not_enabled'] = '';
        if(!$admin_user_id_enabled){
            $data['not_enabled'] = 'This User Is not enabled. Please enable the user from Admin.';
        }

        $geoplugin = new geoPlugin();
        //locate the IP and Country
        $geoplugin->locate();

        $country_code = $geoplugin->countryCode;
        if($country_code == null) $country_code = 'BD';
        $is_active = 1;
        $is_live = 1;
        $country_ID = $this->main_ui_model->get_country_id_by_country_code_is_active($country_code, $is_active, $admin_user_id);
        //multiple rows
        $single_country_image_slider = $this->main_ui_model->get_active_images_of_image_slider_by_country($country_ID['lander_country_id'], $is_active, $admin_user_id);

        $theme_ID = $this->main_ui_model->get_theme_id_by_country_is_live($country_ID['lander_country_id'], $is_live);
        if($theme_ID['lander_theme_country_them_id'] == null) $theme_ID['lander_theme_country_them_id'] = 1;


        $lander_theme_parameters = $this->main_ui_model->get_theme_css_by_theme_id_is_active($theme_ID['lander_theme_country_them_id'], $is_active, $admin_user_id);

        // device detection
        $tablet_browser = 0;
        $mobile_browser = 0;
        $current_device = 'desktop';

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-');

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }
        if($mobile_browser > 0){
            $current_device = 'mobile';
        } elseif ($tablet_browser > 0){
            $current_device = 'tab';
        }

        $current_device_id = $this->main_ui_model->get_current_device_id_device_code($current_device, $admin_user_id);

        $button_link_by_device_country = $this->main_ui_model->get_last_btn_link_by_device_country_id($country_ID['lander_country_id'], $current_device_id['lander_device_id'], $admin_user_id);


        $data['single_country_image_slider'] = $single_country_image_slider;
       /* $data['lander_theme_css'] = $lander_theme_css['lander_theme_css'];
        $data['lander_theme_html'] = $lander_theme_css['lander_theme_html'];
        $data['lander_theme_js'] = $lander_theme_css['lander_theme_js'];
        $data['lander_theme_add_bootstrap'] = $lander_theme_css['lander_theme_add_bootstrap'];
        $data['lander_theme_images'] = $lander_theme_css['lander_theme_image_file_name'];
        $data['theme_name'] = $lander_theme_css['lander_theme_name'];*/
        $data['lander_theme_parameters'] = $lander_theme_parameters;
        $data['button_link_by_device_country'] = $button_link_by_device_country;
        $data['title'] = $country_ID['lander_country_site_title'];
        $data['full_name'] = $current_user_id['full_name'];

        $this->load->view('main/header_view', $data);
        $this->load->view('main/body_view', $data);
        $this->load->view('main/footer_view', $data);
    }

    function admin_user()
    {
        $current_user_url =  current_url();

        $current_user_id = $this->app_user_model->get_user_by_live_preview_url($current_user_url);
        $admin_user_id = $current_user_id['admin_id'];
        $admin_user_id_enabled = $current_user_id['enabled'];
        $data['not_enabled'] = '';
        if(!$admin_user_id_enabled){
            $data['not_enabled'] = 'This User Is not enabled. Please enable the user from Admin.';
        }

        $geoplugin = new geoPlugin();
        //locate the IP and Country
        $geoplugin->locate();

        $country_code = $geoplugin->countryCode;
        if($country_code == null){
            $country_code = 'BD';
        }

        $is_active = 1;
        $is_live = 1;
        $country_ID = $this->main_ui_model->get_country_id_by_country_code_is_active($country_code, $is_active, $admin_user_id);
        //multiple rows
        $single_country_image_slider = $this->main_ui_model->get_active_images_of_image_slider_by_country($country_ID['lander_country_id'], $is_active, $admin_user_id);

        $theme_ID = $this->main_ui_model->get_theme_id_by_country_is_live($country_ID['lander_country_id'], $is_live);
        if($theme_ID['lander_theme_country_them_id'] == null) $theme_ID['lander_theme_country_them_id'] = 1;


        $lander_theme_parameters = $this->main_ui_model->get_theme_css_by_theme_id_is_active($theme_ID['lander_theme_country_them_id'], $is_active, $admin_user_id);

        // device detection
        $tablet_browser = 0;
        $mobile_browser = 0;
        $current_device = 'desktop';

        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }

        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }

        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }

        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda ', 'xda-');

        if (in_array($mobile_ua, $mobile_agents)) {
            $mobile_browser++;
        }

        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'opera mini') > 0) {
            $mobile_browser++;
            //Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }
        if($mobile_browser > 0){
            $current_device = 'mobile';
        } elseif ($tablet_browser > 0){
            $current_device = 'tab';
        }

        $current_device_id = $this->main_ui_model->get_current_device_id_device_code($current_device, $admin_user_id);

        $button_link_by_device_country = $this->main_ui_model->get_last_btn_link_by_device_country_id($country_ID['lander_country_id'], $current_device_id['lander_device_id'], $admin_user_id);

        $data['single_country_image_slider'] = $single_country_image_slider;
       /* $data['lander_theme_css'] = $lander_theme_css['lander_theme_css'];
        $data['lander_theme_html'] = $lander_theme_css['lander_theme_html'];
        $data['lander_theme_js'] = $lander_theme_css['lander_theme_js'];
        $data['lander_theme_add_bootstrap'] = $lander_theme_css['lander_theme_add_bootstrap'];
        $data['lander_theme_images'] = $lander_theme_css['lander_theme_image_file_name'];
        $data['theme_name'] = $lander_theme_css['lander_theme_name'];*/
        $data['lander_theme_parameters'] = $lander_theme_parameters;
        $data['button_link_by_device_country'] = $button_link_by_device_country;
        $data['title'] = $country_ID['lander_country_site_title'];
        $data['full_name'] = $current_user_id['full_name'];


        $this->load->view('main/header_view', $data);
        $this->load->view('main/body_view', $data);
        $this->load->view('main/footer_view', $data);
    }
}