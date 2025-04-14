<?php

namespace App\Http\Controllers;

use App\Models\Applicant;

class PassengerController extends Controller
{
    public function showpassenger()
{
    $passenger = session('user'); 
    if (!$passenger) {
        return redirect()->route('show.login')->with('error', 'Please login first.');
    }
    $user = Applicant::with('passenger')->find(session('user')->id);
    return view("passenger.passenger_dashboard", compact('user'));
}

    public function loadPage($page)
    {
        // List of valid pages to prevent unauthorized access
        $validPages = ['dashboard', 'renew_ticket', 'support', 'view_ticket', 'cancel_season', 'edit_profile'];

        // Check if the requested page is valid
        if (in_array($page, $validPages)) {
            $user = Applicant::with('passenger')->find(session('user')->id);
            return view('passenger.' . $page,compact('user'));
        }
        
        return response('Page not found', 404);
    }
}