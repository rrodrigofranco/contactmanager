<?php

namespace App\Http\Services;

use App\Models\Contact;

class ContactService
{
    public function list()
    {
        // List all contacts
        return Contact::all();
    }

    public function create(array $data): Contact
    {
        // Creating new contact
        return Contact::create($data);
    }

    public function update(Contact $contact, array $data): Contact
    {
        // Updating the contact
        $contact->update($data);
        return $contact;
    }

    public function delete(Contact $contact): void
    {
        // Deleting the contact
        $contact->delete(); // soft delete
    }
}