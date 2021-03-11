<?php

namespace App\Http\Controllers;

use App\Models\units;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function index()
    {
       return view('user.home');
    }

}
