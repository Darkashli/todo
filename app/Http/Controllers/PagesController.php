<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'You lists';
        return view('pages/home', compact('title'));
    }

    public function about(){
        $title = 'About US';
        return view('pages/about')->with('title', $title);
    }
}
