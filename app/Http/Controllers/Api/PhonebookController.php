<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreRequest;
use App\Http\Requests\Api\UpdateRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Service\Api\ApiService;

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
    public function store(StoreRequest $request , ApiService $service)
    {
        $data = $request->validated();

        return $service->store($data);
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
    public function update(UpdateRequest $request, $id, ApiService $service)
    {
        $contact = Contact::findOrFail($id);
        $request->validated();

        return $service->update($request, $id, $contact );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::destroy($id);
    }
}
