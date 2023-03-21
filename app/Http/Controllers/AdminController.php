<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $appointments = Appointment::simplePaginate(10);

        return view('admin', compact('appointments'));
    }
    public function approve($id){
        /*Appointment::whereId()->update([
            'status' => 'approved'
        ]);*/
        $approved = Appointment::findOrFail($id);
        $approved->status = 'approved';
        $approved->save();
    
        return redirect('/admin/home');
    }
}
