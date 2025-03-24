<?php

namespace App\Http\Controllers;
use App\Models\Applicant;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

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
            $pendingApplicants = Applicant::where('status', 'pending')
                ->select(['id', 'full_name', 'district', 'created_at'])
                ->orderBy('created_at', 'asc')
                ->simplePaginate(30);
        } else {

            $pendingApplicants = Applicant::where('status', 'pending')
                ->where('province', $province)
                ->select(['id', 'full_name', 'district', 'created_at'])
                ->orderBy('created_at', 'asc')
                ->simplePaginate(30);
        }


        return view('admin.applicant-manager', ["applicants" =>$pendingApplicants]);
    }

    public function show(Applicant $applicant) {
        return view("admin.singleapplicant", ["applicant" => $applicant]);
    }

    public function approve(Applicant $applicant)
    {
        $applicant->update(['status' => 'approved']);

        session()->flash('success', 'Applicant Approved');
        session(['activePage' => 'applicant-manager', 'province' => session("province")]);
        return redirect()->route('show.admin-portal');
}

    // $applicant->update(['status' => 'approved']);
    // return redirect()->route('admin.applicant-manager', ['province' => session('province')])
    // ->with('success', 'Applicant Approved');


    public function reject(Applicant $applicant)
    {
        $applicant->delete();
        session()->flash('success', 'Applicant Rejected');
        session(['activePage' => 'applicant-manager', 'province' => session("province")]);
        return redirect()->route('show.admin-portal');
        // return redirect()->route('admin.applications.index', ['province' => $applicant->province])
        // ->with('success', 'Applicant Removed');
    }
    // public function approve(Applicant $applicant)
    // {
    //     $applicant->update(['status' => 'approved']);
    //     return response()->json(['success' => true, 'message' => 'Applicant approved successfully!']);
    // }

    public function updateStatus(Applicant $applicant, $action)
    {

        if ($action === 'approve') {
            $applicant->update( ['status' => 'approved']);
        } elseif ($action === 'reject') {
            $applicant->update(['status' => 'rejected']);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid action.'], 400);
        }

        return response()->json(['success' => true, 'message' => "Applicant $action successfully."]);
    }

    // public function reject(Applicant $applicant)
    // {
    //     $applicant->update(['status' => 'rejected']);
    //     return back()->with('error', 'Applicant rejected.');
    // }
}
