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
        $doctorOptions = Doctor::selectRaw('CONCAT(firstName, " ", lastName) as fullName')->orderBy('fullName')->get();
        return view('index', compact('doctors', 'patients', 'doctorOptions'));
    }

    public function store(Request $request) {
        $newPatient = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'room' => 'required',
            'floor' => 'required',
            'status' => 'required',
            'dateAdmitted' => 'required',
            'doctorName' => 'required',
        ]);

        Patient::create($newPatient);

        return redirect()->route('index')->with('message', 'Patient admitted.');
    }

    public function updatePage($id) {
        $patient = Patient::find($id);
        return view('update', compact('patient'));
    }

    public function update(Request $request, $id) {
        $patient = Patient::find($id);

        if ($patient) {
            $patient->update($request->all());

            return redirect()->route('index')->with('message', 'Patient status changed.');
        }
    }

    public function updateDocPage($id) {
        $doctor = Doctor::find($id);
        return view('updateDoc', compact('doctor'));
    }

    public function updateDoc(Request $request, $id) {
        $doctor = Doctor::find($id);

        if ($doctor) {
            $doctor->update($request->all());

            return redirect()->route('index')->with('message', 'Doctor status changed.');;
        }
    }
}
