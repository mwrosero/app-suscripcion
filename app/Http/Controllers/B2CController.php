<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class B2CController extends Controller
{
    public function index() {
        return view('verislife.b2c.index');
    }
}
