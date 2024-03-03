<?php

namespace App\Service\Api;

use App\Http\Resources\ContactResource;
use App\Models\Contact;

class ApiService
{
    public function store($data)
    {
        $create = Contact::create($data);
        return new ContactResource($create);
    }

    public function update($request ,$id, $contact)
    {

        $contact->name = $request['name'];
        $contact->phone = $request['phone'];
        $contact->category_id = $request['category_id'];

        $contact->save();

        return new ContactResource(Contact::findOrFail($id));
    }
}