<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index() 
    {
        $patients = Patient::all()->sortBy('lastName');
        return view('index', compact('patients'));
    }
}
