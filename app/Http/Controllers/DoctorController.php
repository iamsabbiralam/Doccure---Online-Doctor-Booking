<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use App\Models\Category;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['doctors'] = Doctor::all();

        return view('admin.doctor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();

        return view('admin.doctor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\DoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        // dd($request->all());
        $doctor = Doctor::create([
            'cat_id' => $request->get('cat_id'),
            'name' => $request->get('name'),
            'specialist' => $request->get('specialist'),
            'chamber' => $request->get('chamber'),
            'cost' => $request->get('cost'),
        ]);
        //  dd($doctor);
        if(empty($doctor)) {
            return redirect()->back()->withInput()->with('ERROR', __('Failed to created'));
        }
        return redirect()->route('doctors.index')->with('SUCCESS', __('Doctor has been created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        dd('ok');
        $data['doctor'] = $doctor;

        return view('admin.doctor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        if($doctor->update([
            'cat_id' => $request->get('cat_id'),
            'name' => $request->get('name'),
            'specialist' => $request->get('specialist'),
            'chamber' => $request->get('chamber'),
            'cost' => $request->get('cost'),
        ])) {
            return redirect()->route('doctors.index')->with('SUCCESS', __('Doctor has been updated successfully'));
        }
        return redirect()->back()->withInput()->with('ERROR', __('Failed to updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        // dd($doctor);
        if($doctor->delete()) {
            return redirect()->route('doctors.index')->with("SUCCESS", __("Doctor has been deleted successfully"));
        }
        return redirect()->back()->withInput()->with("ERROR", __("Failed to deleted"));
    }
}