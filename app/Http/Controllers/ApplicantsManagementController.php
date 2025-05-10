<?php

namespace App\Http\Controllers;
use App\Mail\ApprovedMail;
use App\Mail\RejectedMail;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicantsManagementController extends Controller
{
    public function index($province = null){
        $province = strtolower($province);
        $validProvinces = [
            'central', 'eastern', 'northern', 'southern',
            'western', 'north western', 'north central', 'uva', 'sabaragamuwa', 'all'
        ];
    
        if (!in_array($province, $validProvinces)) {
            abort(403);
        }
    
        if ($province === 'all') {
            $applicants = Applicant::where('status', 'Pending')
                ->select(['id', 'full_name', 'district'])
                ->orderBy('created_at', 'asc')->get();
        } else {

            $applicants = Applicant::where('status', 'Pending')
                ->where('province', $province)
                ->select(['id', 'full_name', 'district'])
                ->orderBy('created_at', 'asc')
                ->get();
        }


        return view('admin.applicant-manager', compact("applicants" ));
    }
    
    public function show(Applicant $applicant) {
        return view("admin.singleapplicant", ["applicant" => $applicant]);
    }

    public function approve(Applicant $applicant)
    {
        $applicant->update(['status' => 'Approved']);
        $adminId = session('user');
        $applicant->update(['admin_id' => $adminId]);
        Mail::to($applicant->email)->send(new ApprovedMail());

        session()->flash('success', 'Applicant Approved');
        session(['activePage' => 'applicant-manager', 'province' => session("province")]);
        return redirect()->route('show.admin-portal');
    }

    public function reject(Applicant $applicant, Request $request)
    {

        $reasons = $request->input('reasons', []);
        $otherReason = $request->input('other_reason');
        if(empty($reasons) && empty($otherReason)){
            // return redirect()->route('admin.applications.show',[$applicant->id])->with('error', 'Please select a valid Reason');
            return back()->with('error', 'Please select a Valid Reason.');
        }

    if (!empty($otherReason)) {
        $reasons[] = $otherReason;
    }

    Mail::to($applicant->email)->send(new RejectedMail($applicant, $reasons));

    //Make sure uncomment this once testing ends 
    $applicant->delete();

    session()->flash('success', 'Applicant Rejected');
    session(['activePage' => 'applicant-manager', 'province' => session("province")]);
    return redirect()->route('show.admin-portal');
    }
}
