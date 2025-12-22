<?php

namespace App\Http\Controllers;

Use Illuminate\Http\Request;
//php artisan make:controller MyController
class MyController extends Controller
{
    function index(){
        return $this->MYFUNCTION();
    }
    function MYFUNCTION(){
        return view('myview.index');
    }

}
