<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        return view('home');
    }

    public function tasks() {
        return view('tasks.index');
    }

    public function about() {
        return view('about');
    }
}
