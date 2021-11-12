<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    function login(){
        $data = [
            'msg'  => '',
            'url' => base_url('dashboard')
        ];
        echo json_encode($data);
    }
}
