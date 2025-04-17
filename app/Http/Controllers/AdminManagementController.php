<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Services\ContactService;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{
    private $contactService;
    

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function update(Request $request, Admin $admin){
        $contacts = $this->contactService->validateContacts($request);
        $this->contactService->updateContacts($contacts, $admin);
        return $this->redirectWithSuccess('show.admin-portal', "Your Personal Details Has been Updated");
    }
}
