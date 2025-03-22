<?php
namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class ContactService
{
    private $contact_rule = 'regex:/^(0\d{9}|\+94\d{9})$/';
    public function validateContacts(Request $request, $request_type="person"): array
    {
        if($request_type == "person"){
            $validated = $request->validate([
                'personal_contact' => ['required', $this->contact_rule],
                'work_contact' => ['nullable', $this->contact_rule],
                'lan_contact' => ['nullable', $this->contact_rule],
            ]);
        }
        else{
            $validated = $request->validate([
                'station' => ['required', $this->contact_rule],                
            ]);
        }
                
        // Convert +94 to 0
        foreach ($validated as $key => $contact) {
            if (str_starts_with($contact, '+94')) {
                $validated[$key] = '0' . substr($contact, 3); // Replace +94 with 0
            }
        }
        return $validated;
    }
    public function createContacts(Model $contactable, array $contacts)
    {
        $contactData = [];

        if (isset($contacts['personal_contact']) && !empty($contacts['personal_contact'])) {
            $contactData[] = ['type' => 'mobile', 'contact_value' => $contacts['personal_contact']];
        }

        if (isset($contacts['work_contact']) && !empty($contacts['work_contact'])) {
            $contactData[] = ['type' => 'work', 'contact_value' => $contacts['work_contact']];
        }

        if (isset($contacts['lan_contact']) && !empty($contacts['lan_contact'])) {
            $contactData[] = ['type' => 'home', 'contact_value' => $contacts['lan_contact']];
        }

        if (isset($contacts['station']) && !empty($contacts['station'])) {
            $contactData[] = ['type' => 'station', 'contact_value' => $contacts['station']];
        }

        if (!empty($contactData)) {
            $contactable->contacts()->createMany($contactData);
        }
    }
}
