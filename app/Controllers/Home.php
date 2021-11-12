<?php

namespace App\Controllers;

class Home extends BaseController
{
    function __construct(){
        helper(['form','url']);
    }
    public function index()
    {
        return view('page/admin/login');
    }
}
