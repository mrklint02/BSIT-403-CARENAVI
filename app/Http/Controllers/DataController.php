<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function view() 
    {
        $doctors = Doctor::all()->sortBy('lastName');
        $patients = Patient::all()->sortBy('lastName');
        return view('view', compact('patients', 'doctors'));
    }

    public function index() {
        return view('index');
    }
}
