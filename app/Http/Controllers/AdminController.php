<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Applicant;
use App\Models\Passenger;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("admin.admin-portal");
    }

    public function loadPage($page)
    {
        // List of valid pages to prevent unauthorized access
        $validPages = ['admin-manager', 'applicant-manager', 'passenger-manager', 'revenue-manager', 'ticket-validator', 'admin-dashboard', 'edit-profile'];

        if ($page === 'applicant-manager') {
            $province = session('province');
            $province = strtolower($province);
            $validProvinces = [
                'central', 'eastern', 'northern', 'southern',
                'western', 'north western', 'north central', 'uva', 'sabaragamuwa', 'all'
            ];
    
            if (!in_array($province, $validProvinces)) {
                abort(403);
            }
    
            $query = Applicant::where('status', 'pending');
            if ($province !== 'all') {
                $query->where('province', $province);
            }
            
            $applicants = $query->select(['id', 'full_name', 'district', 'created_at'])
                                ->orderBy('created_at', 'asc')->get();
                                //->simplePaginate(30);
    
            return view('admin.applicant-manager', ['applicants' => $applicants]);
        }

        if ($page === 'passenger-manager') {
            //retrieve Card Details when Done
            $passengers = Passenger::with(['Applicant:id,full_name,email'])
            ->select('id', 'applicant_id')
            ->orderBy('id', 'asc')->get();
            //->simplePaginate(30);
        
            return view('admin.passenger-manager', ['passengers' => $passengers]);
        }

        if ($page === 'admin-manager') {
            //retrieve Card Details when Done
            $admins = Admin::with([
                'adminrole:id,role_name',
                'station:station_id,Station_Name'
            ])
            ->select('id', 'full_name', 'email', 'admin_role_id', 'station_id')
            ->orderBy('id', 'asc')->get();
            //->simplePaginate(30);
        
            return view('admin.admin-manager', ['admins' => $admins]);
        }

        // Check if the requested page is valid
        if (in_array($page, $validPages)) {
            return view('admin.' . $page);
        }        
        return response('Page not found', 404);
    }
}
