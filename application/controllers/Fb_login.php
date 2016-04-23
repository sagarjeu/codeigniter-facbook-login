<?php

class Fb_login extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('facebook');

    }

    public function login(){
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('me?fields=first_name,last_name,link,gender,email,cover,picture.type(large)');
//                echo '<pre>';
//                print_r($data);
//                exit;
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('fb_login/logout'); // Logs off application
            // OR
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('fb_login/login'),
                'scope' => array("public_profile","email") // permissions here
            ));
        }
        $this->load->view('login-layout',$data);


//        $data['facebook_login'] = $this->facebook->getLoginUrl(array(
//            'redirect_uri' => site_url('fb_login/test'),
//            'scope' => array("public_profile", "email")
//        ));
//        $this->load->view('login-layout',$data);//
//      }
//
//    function test()
////    {
//        $info = $this->facebook->api('me?fields=first_name,last_name,link,gender,email,cover,picture.type(large)');//
//        echo "<pre>";
//        print_r($info);
    }

    public function logout(){

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
//        $this->session->set_flashdata('info','Successfully Logout');
        redirect('fb_login/login');
    }

}
