<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    
    public function __construct(){
        helper(['form','url']);
    }

    public function index()
    {
        echo view("layout/index");
    }
}
