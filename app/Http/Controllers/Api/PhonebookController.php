<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreRequest;
use App\Http\Requests\Api\UpdateRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;

class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ContactResource::collection(Contact::paginate(10));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request )
    {
        $create = Contact::create($request -> validated());
        return new ContactResource($create);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new ContactResource(Contact::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id,)
    {
        $contact = Contact::findOrFail($id);
        $request->validated();

        $contact->name = $request['name'];
        $contact->phone = $request['phone'];
        $contact->category_id = $request['category_id'];


        $contact->save();


        return  new ContactResource(Contact::findOrFail($id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::destroy($id);
    }
}
