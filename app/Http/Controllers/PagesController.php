<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function about(){
        $title = 'Contact us';
        return view('pages/about')->with('title', $title);
    }

    public function error(){
        return view('pages.error');
    }
}
