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

        return $roles[$role] ?? "";
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
        $admin = Admin::with('adminrole')->where('email', $credentials['email'])->first();        
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $provice = $this->getProvince($admin->admin_role_id);
            session(['role' => 'admin', 'user' => $admin->id, "province" => $provice, "roleID" =>  $admin->admin_role_id,  'role_name' => $admin->adminrole->role_name]);
            return redirect()->route('show.admin-portal');
        }

        // Check in Applicant table
        $user = Applicant::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            if($user->status =="Approved"){
                $passengerID = null;
                if($user->passenger){
                    $role = "passenger";
                    $passengerID = $user->passenger->id;
                }
                else{
                    $role = "applicant"; 

                } 
                session(['role' => $role, 'user' => $user->id, "passengerID" => $passengerID]);
                return redirect()->route('show.passenger.dashboard');
            }
            else{
                return back()->withErrors(['email' => 'Your application is still under review by the admin.']);

            }
            // $role = $user->passenger ? "passenger" : "applicant";
            
        }


        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('show.index');
    }
}