<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\units;
use App\Models\sections;
use App\Models\levels;
use App\Models\lessons;
use App\User;

class DashController extends Controller
{
    public function index()
    {
        $units = units::count();
        $sections = sections::count();
        $levels = levels::count();
        $lessons = lessons::count();
        $users = User::count();
        return view('admin.index',[
            'units' => $units,
            'sections' => $sections,
            'levels' => $levels,
            'lessons' => $lessons,
            'users' => $users
        ]);
    }
}
