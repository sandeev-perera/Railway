<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.admin-portal");
    }

    public function loadPage($page)
    {
        // List of valid pages to prevent unauthorized access
        $validPages = ['admin-manager', 'applicant-manager', 'passenger-manager', 'revenue-manager', 'ticket-validator', 'admin-dashboard'];

        // Check if the requested page is valid
        if (in_array($page, $validPages)) {
            return view('admin.' . $page);
        }        
        return response('Page not found', 404);
    }
}
