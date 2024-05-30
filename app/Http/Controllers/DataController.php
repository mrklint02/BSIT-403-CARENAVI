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
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('index', compact('doctors', 'patients'));
    }

    public function store(Request $req) {
        // $newPatient = $req->validate([
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        //     'status' => 'required',
        //     'roomNumber' => 'required',
        //     'floorNumber' => 'required',
        //     'dateAdmitted' => 'required',
        //     'doctorName' => 'required',
        // ]);

        // Patient::create($newPatient);
        return redirect()->route('index');
    }
}
