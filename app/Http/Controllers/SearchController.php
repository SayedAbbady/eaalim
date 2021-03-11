<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lessons;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return view('user.search',[
            'result' => lessons::where("l_name","LIKE","%$request->search%")->get(),
            'search' => $request->search

        ]);

        

    }
}
