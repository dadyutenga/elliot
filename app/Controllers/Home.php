<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome');
    }
    
    public function welcome(): string
    {
        return view('welcome');
    }
}
