<?php

namespace App\Http\Controllers;

use App\Livewire\TicketValidator;
use App\Models\Admin;
use App\Models\Applicant;
use App\Models\Passenger;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = Admin::find(session('user'));
        return view("admin.admin-portal", compact('user'));
    }

    public function loadPage($page)
    {
        // List of valid pages to prevent unauthorized access
        $validPages = ['admin-manager', 'applicant-manager', 'passenger-manager', 'revenue-manager', 'ticket-validator', 'admin-dashboard', 'edit-profile'];
        if (!in_array($page, $validPages)) {
            return response('Page not foundda', 404);
        }

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
    
            $query = Applicant::where('status', 'Pending');
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
            ->select('id', 'applicant_id', 'status')
            ->orderBy('id', 'asc')->get();
            //->simplePaginate(30);
        
            return view('admin.passenger-manager', ['passengers' => $passengers]);
        }

        if ($page === 'admin-manager') {
            //retrieve Card Details when Done
            $admins = Admin::with([
                'adminrole:id,role_name',
                'station:id,station_name'
            ])
            ->select('id', 'full_name', 'email', 'admin_role_id', 'station_id')
            ->orderBy('id', 'asc')->get();
            //->simplePaginate(30);
        
            return view('admin.admin-manager', ['admins' => $admins]);
        }

        if($page == 'revenue-manager'){
            $payments = Payment::with([
                'passenger:id',
            ])->select('id', 'passenger_id', 'payment_type', 'Amount', 'created_at')->orderBy('created_at', 'desc')->get();

            return view('admin.revenue-manager', compact('payments'));
        }

        if($page=='ticket-validator'){
            return view('admin.ticket-validator-alpha');
        }

        // Check if the requested page is valid
        $user = Admin::find(session('user'));
        if($page == "edit-profile"){
            $numbers = $user->contacts->keyBy('type');
            $personal_contact = $numbers['personal']->contact_value ?? '';
            $lan_contact = $numbers['lan']->contact_value ?? '';
            $work_contact = $numbers['work']->contact_value ?? '';
            return view('admin.' . $page,compact('user', 'lan_contact', 'personal_contact', 'work_contact'));
        }


        return view('admin.' . $page, compact("user"));
    }        
}

