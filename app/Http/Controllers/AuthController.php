<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Applicant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private function getProvince($role): string|null{
        $roles = [
            1 => 'all',
            2 => 'eastern',
            3 => 'northern',
            4 => 'southern',
            5 => 'western',
            6 => 'north western',
            7 => 'north central',
            8 => 'uva',
            9 => 'sabaragamuwa',
            10 => 'central',
        ];
               
        return $roles[$role] ?? null;
    }


    public function index(){
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $credentials['email'] = strtolower($credentials['email']);
        // Check in Admin table
        $admin = Admin::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $provice = $this->getProvince($admin->adminrole);
            session(['role' => 'admin', 'user' => $admin, "province" => $provice]);
            return redirect()->route('admin.dashboard');
        }

        // Check in Applicant table
        $user = Applicant::where('email', $credentials['email'])->first();
        if ($user && $user->status =="approved" && Hash::check($credentials['password'], $user->password)) {
            // $role = $user->passenger ? "passenger" : "applicant";
            $passengerID = null;
            if($user->passenger){
                $role = "passenger";
                $passengerID = $user->passenger->id;
            }
            else{
                $role = "applicant"; 

            }
            session(['role' => $role, 'user' => $user, "passengerID" => $passengerID]);
            return redirect()->route('show.passenger.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('show.login');
    }
}