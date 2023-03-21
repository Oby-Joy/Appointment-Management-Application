<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function book(Request $request){
        //Validation
        request()->validate([
            'full_name' => ['required', 'max:255', 'string'],
            'date' => ['required'],
            'body' => ['required', 'min:10'],
        ]);

        //Insert into database
        $appointment = new Appointment();
        $appointment->user = auth()->user()->email;
        $appointment->full_name = $request->full_name;
        $appointment->date = $request->date;
        $appointment->body = $request->body;
        $appointment->status = "pending";
        
        $appointment->save();

        return redirect("/home")->with("success", "Your Appointment has been boooked. Click on 'Appointment' to view your appointment status.");
    }

    public function appointments(){
        $appointments = Appointment::all();

        return view('appointments', compact('appointments'));
    }
}
