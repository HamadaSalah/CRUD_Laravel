<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = [
            'title' => 'Hello Title Hereeeeeeee',
            'services' => ['serv 1','serv 2', 'serv3']
        ];
    	return view('index')->with($title);
    }
    public function about() {
    	return view('about');
    }
    public function services() {
    	return view('services');
    }
}
