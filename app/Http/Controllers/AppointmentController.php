<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['appointments'] = Appointment::with(['user', 'doctor'])->get();
        // dd($data);

        return view('admin.appointment.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['doctor_id'] = $id;

        return view('appointment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'date' => 'required',
        ]);

        $user = Auth::user()->id;
        $id = $request->doctor_id;

        $appointment = Appointment::create([
            'user_id' => $user,
            'doctor_id' => $id,
            'date' => $request->get('date'),
        ]);

        // $user = User::find($user);

        // $data = [
        //   'name' => $user->name,
        //   'email' => $user->email,
        // ];

        //     Mail::send('email-template', $data, function($message) use ($data) {
        //       $message->to($data['email'])
        //       ->subject('Appointment Details');
        //     });
        if(empty($appointment)) {
            return redirect()->back()->withInput()->with("ERROR", __('Appointment failed'));
        }
        return redirect()->route('doctors')->with("SUCCESS", __('Appointment has been booked'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
