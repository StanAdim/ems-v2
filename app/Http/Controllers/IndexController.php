<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function index():View
    {
        return view('index');
    }

    public function participant():View
    {
        return view('participant');
    }

    public function about():View
    {
        return view('about');
    }

    public function login():View
    {
        return view('participant.login');
    }
}
