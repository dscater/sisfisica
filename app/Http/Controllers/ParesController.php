<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;

class ParesController extends Controller
{
    public function index(){
        return view('pares.index');
    }
}
