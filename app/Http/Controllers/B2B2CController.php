<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class B2B2CController extends Controller
{
    public function login() {
        return view('verislife.b2b2c.login');    
    }
    
    public function empresa() {
        return view('verislife.b2b2c.selectorEmpresa');    
    }
    
    public function centroMedico() {
        return view('verislife.b2b2c.centroMedico');    
    }
    
    public function planVeris() {
        return view('verislife.b2b2c.planes.veris');    
    }
    
    public function planParami() {
        return view('verislife.b2b2c.planes.parami');    
    }
}
