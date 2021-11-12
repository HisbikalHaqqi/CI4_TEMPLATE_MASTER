<?php

class MySession{
    
    private $session;

    function __construct(){
        $this->session = \Config\Services::session($config);    
    }

    public function check_session_exist(){
        if($this->session->get('is_login')){
            redirect()->to('dashboard');
        }
    }

    public function check_no_session(){
        if(!$this->session->get('is_login')){
            echo "<script type='text/javascript'>";
			echo "window.location.href='".site_url('User/logout')."';";
			echo "</script>";
			die;
        }
    }
}
?>